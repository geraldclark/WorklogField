Once installed, you will need to implement a custom vardef extension in:

./custom/Extension/modules/{module}/Ext/Vardefs/{filename}.php

Containing the following:

<?php

    $dictionary[<singular module name>]['fields'][<field name>]['type']='custom-worklog';

Where:

<singular module name> is the singular name of your module. The example being to use "Account" not "Accounts".
<field name> is the name of the text field to place the worklog UI over.
