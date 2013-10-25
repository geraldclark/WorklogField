<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class WorklogApi extends SugarApi
{
    public function registerApiRest()
    {
        return array(
            //POST
            'GetUsers' => array(
                //request type
                'reqType' => 'POST',

                //endpoint path
                'path' => array('worklog', 'users'),

                //endpoint variables
                'pathVars' => array('', '', ''),

                //method to call
                'method' => 'loadUserNames',

                //short help string to be displayed in the help documentation
                'shortHelp' => 'Retrieves user display names for worklog fields.',

                //long help to be displayed in the help documentation
                'longHelp' => 'custom/clients/base/api/help/worklog_users_post_help.html',
            ),
        );
    }

    /**
     * Method to be used for the worklog/users endpoint
     */
    public function loadUserNames($api, $args)
    {
        $users = array();

        if (isset($args['ids']))
        {
            foreach ($args['ids'] as $id)
            {
                $user = BeanFactory::getBean("Users", $id);
                if (isset($user->id))
                {
                    $users[$user->id] = $user->full_name;
                }
            }
        }

        return $users;
    }

}

?>