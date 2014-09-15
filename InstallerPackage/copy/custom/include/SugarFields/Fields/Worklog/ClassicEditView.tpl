{if !empty($displayParams.maxlength)}
<textarea id="{$prefix}{$name}" name="{$prefix}{$name}" maxlength="{$displayParams.maxlength}" cols="{$displayParams.cols|default:60}" rows="{$displayParams.rows|default:4}" tabindex="{$tabindex}">{$value}</textarea>
{else}
<textarea id="{$prefix}{$name}" name="{$prefix}{$name}" cols="{$displayParams.cols|default:60}" rows="{$displayParams.rows|default:4}" tabindex="{$tabindex}">{$value}</textarea>
{/if}


