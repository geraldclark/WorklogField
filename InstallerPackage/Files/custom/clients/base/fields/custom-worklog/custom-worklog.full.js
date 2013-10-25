/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/

({
    fieldTag : "textarea",
    maxDisplayLength: 450,
    isTruncated: false,
    lastMode: null,
    plugins: ['EllipsisInline'],
    events: {
        'click .show-more-text': 'toggleMoreText'
    },
    /**
     * Base initialization
     * @param  {Object} options the options
     */
    initialize: function(options) {
        this.userTimePrefs  = app.user.getPreference('timepref');
        this.userDatePrefs = app.user.getPreference('datepref');
        this.userTzPrefs = app.user.getPreference('tz_offset');

        //handle worklog users
        if (_.isUndefined(this.model.worklogUsers))
        {
            this.model.worklogUsers = null;
        }

        app.view.Field.prototype.initialize.call(this, options);
    },
    format: function(value) {
        var tempValue = value;
        var tempObjValue = this.value;

        //format line spacing
        if (typeof tempObjValue == 'string')
        {
            tempObjValue = tempObjValue.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '<br>');
        }

        if (typeof tempValue == 'string')
        {
            tempValue = tempValue.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '<br>');
        }

        //replace timestamp tags
        var timestampResult;
        timestampReg = new RegExp(/<timestamp[^>]*>(.*?)<\/timestamp>/gm);
        while(!_.isNull(timestampResult = timestampReg.exec(value)))
        {
            jsDate = new Date(parseInt(timestampResult[1].trim()) * 1000);
            jsdate = app.date.UTCtoTimezone(jsDate, this.userTzPrefs);

            matchText = timestampResult[0].trim();
            displayTime = app.date.format(jsDate, this.userDatePrefs)+' at '+app.date.format(jsDate, this.userTimePrefs);

            if (typeof tempObjValue == 'string')
            {
                tempObjValue = tempObjValue.replace(matchText, '<strong>on '+displayTime+'</strong>');
            }

            if (typeof tempValue == 'string')
            {
                tempValue = tempValue.replace(matchText, '<strong>'+displayTime+'</strong>');
            }
        }

        //replace user tags
        for (var userId in this.model.worklogUsers)
        {
            displayName = this.model.worklogUsers[userId];
            userURL = '<a href="#bwc/index.php?module=Employees&action=DetailView&record='+userId+'" data-original-title="'+displayName+'">'+displayName+'</a>';
            replacement = '<strong>'+userURL+'</strong> ';
            search = '<user>'+userId+'</user>';

            if (typeof tempObjValue == 'string')
            {
                tempObjValue = tempObjValue.split(search).join(replacement);
            }

            if (typeof tempValue == 'string')
            {
                tempValue = tempValue.split(search).join(replacement);
            }
        }

        this.value = tempObjValue;
        value = tempValue;

        //We mutate this.value to match whatever is appropriate given we're in a
        //"more" or "less" state (original is always in model.get(this.name))
        //So, here, we try to return whatever we've set this.value to first.
        return this.value || value || '';
    },
    unformat: function(value) {
        //add line breaks
        if (this.storedValue != '')
        {
            this.storedValue = this.storedValue + '\n\n';
        }

        //get UTC second timestamp
        utcStamp = new Date().valueOf()/1000;

        return this.storedValue+'<user>'+App.user.attributes.id+'</user><timestamp>'+utcStamp+'</timestamp>\n'+value;
    },
    _render: function() {
        var value = this.model.get(this.name);

        if (_.isNull(this.model.worklogUsers) && !_.isNull(this.model) && this.context.isDataFetched())
        {
            userIds = new Array();
            userReg = new RegExp(/<user[^>]*>(.*?)<\/user>/gm);
            while(!_.isNull(userResult = userReg.exec(value)))
            {
                userId = userResult[1].trim();
                if (userIds.indexOf(userId) == -1)
                {
                    if (userId != App.user.attributes.id)
                    {
                        userIds[userIds.length] = userId;
                    }
                }
            }

            //if no content, ignore request
            if (userIds.length == 0)
            {
                //add current user
                this.model.worklogUsers = new Object;
                this.model.worklogUsers[App.user.attributes.id] = App.user.attributes.full_name;

                app.view.Field.prototype._render.call(this);
                return;
            }

            data = new Object();
            data.ids = userIds;

            var self = this;
            App.api.call('create', App.api.buildURL('worklog/users'), data, {
                success: function(data) {
                    self.model.worklogUsers = data;
                    self.model.worklogUsers[App.user.attributes.id] = App.user.attributes.full_name;
                    self._renderField();
                },
                error: function(err) {
                    app.error.handleHttpError(err);
                    if (callback) callback(err);
                }
            });

            this.value = '<i class="icon-spinner icon-spin"></i>';
            app.view.Field.prototype._render.call(this);
            return;
        }

        this._renderField();
    },
    _renderField: function() {
        //Attempt to pick up css class from defs but fallback
        this.def.css_class = this.def.css_class || 'textarea-text';

        //Figure out if we need to display the show more link
        var value = this.model.get(this.name);
        this.storedValue = value;

        if ((!_.isUndefined(value)) && (value.length > this.maxDisplayLength)) {
            this.isTooLong = true;
        } else {
            this.isTooLong = false;
            this.lastMode = null;
            this.value = value;
        }

        //Check if we've blur'd out from textarea edit mode. If so, we check "last mode"
        //we were in before entering the edit mode. We show more or less based on that.
        if (this.lastMode && this.tplName === 'edit') {
            if (this.lastMode === 'more') {
                this.showMore();
                return;
            }
            this.showLess();
            return;
        }

        app.view.Field.prototype._render.call(this);
        //Dynamically add the appropriate css class to this.$el (avoids extra spans)
        this.$el.addClass(this.def.css_class);

        //More|less not appropriate for list views (they use "overflow ellipsis")
        if (this._notListView()) {

            if (this.tplName !== 'edit') {
                if (this.isTooLong) {
                    this.showLess();
                }
                if(this.tplName === 'disabled') {
                    this.$(this.fieldTag).attr("disabled", "disabled");
                }
            } else {
                // Ensure that when we go to edit more textarea we have full text
                this.value = value;
                // Re render w/full text. tplName will not change to 'edit' until
                // after we _render (chicken / egg); so if we don't do this and we're
                // in the 'show more' state, we could get truncated text in our textarea!
                app.view.Field.prototype._render.call(this);
            }
        }
    },
    _notListView: function() {
        if (this.view.name !== 'list' || (this.view.meta && this.view.meta.type !== 'list')) {
            return true;
        }
        return false;
    },
    toggleMoreText: function() {
        if (this.isTruncated) {
            this.showMore();
        } else {
            this.showLess();
        }
    },
    showMore: function() {
        this._toggleTextLength('more');
    },
    showLess: function() {
        this._toggleTextLength('less');
    },
    _toggleTextLength: function(mode) {
        var displayValue, newLinkLabel, originalValue;
        originalValue = this.model.get(this.name);
        if (mode === "more") {
            displayValue = originalValue.trim() + '...';
            this.isTruncated = false;
            newLinkLabel = app.lang.get('LBL_LESS', this.module).toLocaleLowerCase();
        } else {
            displayValue = originalValue.substring(0, this.maxDisplayLength).trim() + '...';
            this.isTruncated = true;
            newLinkLabel = app.lang.get('LBL_MORE', this.module).toLocaleLowerCase();
        }
        this.value = displayValue;
        this.$el.empty();
        app.view.Field.prototype._render.call(this);
        this.$('.show-more-text').text(newLinkLabel);
        this.lastMode = mode;
    }

})
