{*
/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/06_Customer_Center/10_Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */
*}


{include file="modules/DynamicFields/templates/Fields/Forms/coreTop.tpl"}
<tr>
    <td class='mbLBL'>{sugar_translate module="DynamicFields" label="COLUMN_TITLE_LABEL_ROWS"}:</td>
    <td>
        {if $hideLevel < 4}
            <input id ="rows" type="text" name="rows" value="{$vardef.rows|default:4}">
        {else}
            <input id ="rows" type="hidden" name="rows" value="{$vardef.rows}">{$vardef.rows}
        {/if}
    </td>
</tr>
<tr>
    <td class='mbLBL'>{sugar_translate module="DynamicFields" label="COLUMN_TITLE_LABEL_COLS"}:</td>
    <td>
        {if $hideLevel < 4}
            <input id ="cols" type="text" name="cols" value="{$vardef.cols|default:20}">
        {else}
            <input id ="cols" type="hidden" name="cols" value="{$vardef.displayParams.cols}">{$vardef.cols}
        {/if}
    </td>
</tr>
{include file="modules/DynamicFields/templates/Fields/Forms/coreBottom.tpl"}