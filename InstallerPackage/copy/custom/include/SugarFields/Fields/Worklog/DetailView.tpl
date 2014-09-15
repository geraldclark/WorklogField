<span class="sugar_field" id="{{sugarvar key='name'}}">{{if empty($displayParams.textonly)}}{{sugarvar key='value' htmlentitydecode='true'}}{{else}}{{sugarvar key='value'}}{{/if}}</span>
{{if !empty($displayParams.enableConnectors)}}
{assign var="value" value={{sugarvar key='value' string='true'}} }
{if !empty($value)}
{{sugarvar_connector view='DetailView'}}
{/if}
{{/if}}