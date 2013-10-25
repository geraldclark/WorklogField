<?php

   $manifest =array(
       'acceptable_sugar_flavors' => array ('CE','PRO','CORP','ENT','ULT'),
       'acceptable_sugar_versions' => array(
           'regex_matches' => array ('7\\.(.*?)\\.(.*?)','7\\.(.*?)\\.(.*?)\\.(.*?)'),
       ),
       'author' => 'jclark',
       'description' => 'Installs the custom-worklog field type.',
       'icon' => '',
       'is_uninstallable' => true,
       'name' => 'Worklog Field Type',
       'published_date' => '2013-10-25 02:49:53',
       'type' => 'module',
       'version' => '1',
   );

   $installdefs =array(
       'id' => 'package_1',
       'copy' => array(
            0 => array(
                'from' => '<basepath>/Files/custom/clients/base/fields/custom-worklog/custom-worklog.full.js',
	            'to' => 'custom/clients/base/fields/custom-worklog/custom-worklog.full.js',
	        ),
            1 => array(
                'from' => '<basepath>/Files/custom/clients/base/fields/custom-worklog/custom-worklog.js',
	            'to' => 'custom/clients/base/fields/custom-worklog/custom-worklog.js',
	        ),
            2 => array(
                'from' => '<basepath>/Files/custom/clients/base/fields/custom-worklog/detail.hbs',
	            'to' => 'custom/clients/base/fields/custom-worklog/detail.hbs',
	        ),
            3 => array(
                'from' => '<basepath>/Files/custom/clients/base/fields/custom-worklog/edit.hbs',
	            'to' => 'custom/clients/base/fields/custom-worklog/edit.hbs',
	        ),
            4 => array(
                'from' => '<basepath>/Files/custom/clients/base/fields/custom-worklog/list.hbs',
	            'to' => 'custom/clients/base/fields/custom-worklog/list.hbs',
	        ),
            5 => array(
                'from' => '<basepath>/Files/custom/clients/base/api/help/worklog_users_post_help.html',
	            'to' => 'custom/clients/base/api/help/worklog_users_post_help.html',
	        ),
            6 => array(
                'from' => '<basepath>/Files/custom/clients/base/api/WorklogApi.php',
	            'to' => 'custom/clients/base/api/WorklogApi.php',
	        ),
	    ),
	);

?>