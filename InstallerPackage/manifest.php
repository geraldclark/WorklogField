<?php

$manifest = array (
  'acceptable_sugar_versions' => 
  array (
    'exact_matches' => 
    array (
      1 => '7.5.0.0beta1',
      2 => '7.5.0.0beta2',
      3 => '7.5.0.0beta3',
      4 => '7.5.0.0beta4',
      5 => '7.5.0.0RC1',
      6 => '7.5.0.0RC2',
      7 => '7.5.0.0RC3',
      8 => '7.5.0.0RC4',
    ),
    'regex_matches' => array (
      0 => '7\\.2\\.2\\.(.*?)', 
      1 => '7\\.5\\.(.*?)\\.(.*?)', 
      2 => '7\\.6\\.(.*?)\\.(.*?)'
    ),
  ),
  'acceptable_sugar_flavors' => 
  array (
    0 => 'CE',
    1 => 'PRO',
    2 => 'CORP',
    3 => 'ENT',
    4 => 'ULT',
  ),
  'readme' => '',
  'key' => 1410796385,
  'author' => 'jclark',
  'description' => 'Worklog field for Sugar 7.2.2.0+',
  'icon' => '',
  'is_uninstallable' => true,
  'name' => 'SugarWorklogField',
  'published_date' => '2014-09-15 15:53:05',
  'type' => 'module',
  'version' => '2.0',
  'remove_tables' => '',
);

$installdefs = array (
  'id' => 1410796385,
  'copy' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/copy/custom/Extension/application/Ext/Language/en_us.worklog.php',
      'to' => 'custom/Extension/application/Ext/Language/en_us.worklog.php',
    ),
    1 => 
    array (
      'from' => '<basepath>/copy/custom/Extension/modules/DynamicFields/Ext/Language/en_us.worklog.php',
      'to' => 'custom/Extension/modules/DynamicFields/Ext/Language/en_us.worklog.php',
    ),
    2 => 
    array (
      'from' => '<basepath>/copy/custom/Extension/modules/ModuleBuilder/Ext/Language/en_us.worklog.php',
      'to' => 'custom/Extension/modules/ModuleBuilder/Ext/Language/en_us.worklog.php',
    ),
    3 => 
    array (
      'from' => '<basepath>/copy/custom/clients/base/fields/worklog/detail.hbs',
      'to' => 'custom/clients/base/fields/worklog/detail.hbs',
    ),
    4 => 
    array (
      'from' => '<basepath>/copy/custom/clients/base/fields/worklog/disabled.hbs',
      'to' => 'custom/clients/base/fields/worklog/disabled.hbs',
    ),
    5 => 
    array (
      'from' => '<basepath>/copy/custom/clients/base/fields/worklog/edit.hbs',
      'to' => 'custom/clients/base/fields/worklog/edit.hbs',
    ),
    6 => 
    array (
      'from' => '<basepath>/copy/custom/clients/base/fields/worklog/list.hbs',
      'to' => 'custom/clients/base/fields/worklog/list.hbs',
    ),
    7 => 
    array (
      'from' => '<basepath>/copy/custom/clients/base/fields/worklog/readme.txt',
      'to' => 'custom/clients/base/fields/worklog/readme.txt',
    ),
    8 => 
    array (
      'from' => '<basepath>/copy/custom/clients/base/fields/worklog/worklog.js',
      'to' => 'custom/clients/base/fields/worklog/worklog.js',
    ),
    9 => 
    array (
      'from' => '<basepath>/copy/custom/clients/base/filters/operators/worklog.php',
      'to' => 'custom/clients/base/filters/operators/worklog.php',
    ),
    10 => 
    array (
      'from' => '<basepath>/copy/custom/include/SugarFields/Fields/Worklog/ClassicEditView.tpl',
      'to' => 'custom/include/SugarFields/Fields/Worklog/ClassicEditView.tpl',
    ),
    11 => 
    array (
      'from' => '<basepath>/copy/custom/include/SugarFields/Fields/Worklog/DetailView.tpl',
      'to' => 'custom/include/SugarFields/Fields/Worklog/DetailView.tpl',
    ),
    12 => 
    array (
      'from' => '<basepath>/copy/custom/include/SugarFields/Fields/Worklog/EditView.tpl',
      'to' => 'custom/include/SugarFields/Fields/Worklog/EditView.tpl',
    ),
    13 => 
    array (
      'from' => '<basepath>/copy/custom/include/SugarFields/Fields/Worklog/SugarFieldWorklog.php',
      'to' => 'custom/include/SugarFields/Fields/Worklog/SugarFieldWorklog.php',
    ),
    14 => 
    array (
      'from' => '<basepath>/copy/custom/include/SugarFields/Fields/Worklog/SugarFieldWorklogHelpers.php',
      'to' => 'custom/include/SugarFields/Fields/Worklog/SugarFieldWorklogHelpers.php',
    ),
    15 => 
    array (
      'from' => '<basepath>/copy/custom/include/SugarFields/Fields/Worklog/WirelessDetailView.tpl',
      'to' => 'custom/include/SugarFields/Fields/Worklog/WirelessDetailView.tpl',
    ),
    16 => 
    array (
      'from' => '<basepath>/copy/custom/include/SugarFields/Fields/Worklog/WirelessEditView.tpl',
      'to' => 'custom/include/SugarFields/Fields/Worklog/WirelessEditView.tpl',
    ),
    17 => 
    array (
      'from' => '<basepath>/copy/custom/include/generic/SugarWidgets/SugarWidgetFieldWorklog.php',
      'to' => 'custom/include/generic/SugarWidgets/SugarWidgetFieldWorklog.php',
    ),
    18 => 
    array (
      'from' => '<basepath>/copy/custom/modules/DynamicFields/templates/Fields/Forms/worklog.php',
      'to' => 'custom/modules/DynamicFields/templates/Fields/Forms/worklog.php',
    ),
    19 => 
    array (
      'from' => '<basepath>/copy/custom/modules/DynamicFields/templates/Fields/Forms/worklog.tpl',
      'to' => 'custom/modules/DynamicFields/templates/Fields/Forms/worklog.tpl',
    ),
    20 => 
    array (
      'from' => '<basepath>/copy/custom/modules/DynamicFields/templates/Fields/TemplateWorklog.php',
      'to' => 'custom/modules/DynamicFields/templates/Fields/TemplateWorklog.php',
    ),
    21 => 
    array (
      'from' => '<basepath>/copy/custom/vendor/Smarty/plugins/function.convert_worklog.php',
      'to' => 'custom/vendor/Smarty/plugins/function.convert_worklog.php',
    ),
    22 => 
    array (
      'from' => '<basepath>/copy/custom/include/SugarFields/Fields/Worklog/ListView.tpl',
      'to' => 'custom/include/SugarFields/Fields/Worklog/ListView.tpl',
    ),
  ),
  'post_execute' => 
  array (
    0 => '<basepath>/post_execute/0.php',
  ),
  'post_uninstall' => 
  array (
    0 => '<basepath>/post_uninstall/0.php',
  ),
);

?>
