Once installed, you will need to implement a custom vardef extension in:

./custom/Extension/modules/{module}/Ext/Vardefs/{filename}.php

Containing the following:

<?php

    $dictionary[<singular module name>]['fields'][<field name>]['type']='custom-worklog';
