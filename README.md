WorklogField
============

This is a module loadable field type for use with Sugar 7. The key features of this field type is that worklog entries will be adjusted by the current users display preferences for user names, timezones, and date formats.
This field was created as a replacement for the original worklog field by Jon Whitcraft ( http://h2ik.co/2012/02/sugarfield-worklog-v1-0-released/ ) as it is not currently being adapted from 6.x.

Installation & Setup
============
The 'InstallerPackage' directory contains the files for the actual installer package. To create an installer, you will need to zip the contents of this directory excluding the base 'InstallerPackage' directory. 

Once installed, Administrators can navigate to Admin / Studio / <module> / Fields and create a new database field with the type of 'Worklog'.


If you are a developer and would like to convert an existing field to a worklog type field, you will need to implement a custom vardef extension in ./custom/Extension/modules/<module>/Ext/Vardefs/<filename>.php that contains:

```php
<?php
    //<singular module name> is the singular name of your module. The example being to use "Account" not "Accounts".
    //<field name> is the name of the text field to place the worklog UI over.
    $dictionary[<singular module name>]['fields'][<field name>]['type']='worklog';
    $dictionary[<singular module name>]['fields'][<field name>]['dbType']='text';

    //for elastic search
    $dictionary[<singular module name>]['fields'][<field name>]['full_text_search']['type'] = 'text';
    $dictionary[<singular module name>]['fields'][<field name>]['full_text_search']['boost'] = '3';
    $dictionary[<singular module name>]['fields'][<field name>]['full_text_search']['enabled'] = true;
?>
```


- This field does not currently support being sent in a stock email template.
- If you need to decode the history json, you can do:

```php
<?php
    require_once('custom/include/SugarFields/Fields/Worklog/SugarFieldWorklogHelpers.php');
    //you can pass in a user object as a second parameter to decodeJsonValue to convert the timestamps to a specific users timezone
    $displayValue = SugarFieldWorklogHelpers::decodeJsonValue($bean-><field name>));
?>
```

To Do
============
- Implement mobile layouts

Credits
============
<a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_US"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/80x15.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_US">Creative Commons Attribution-ShareAlike 3.0 Unported License</a> with original attribution remaining with Gerald Clark (https://github.com/geraldclark/WorklogField/). This field type originated from the stock 7.x textarea field type by SugarCRM.
