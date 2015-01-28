<?php

class MyExtendedModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        
        $userinfo = $this->session->userdata('userinfo');
        
        $user = $userinfo['result'];
        if (empty($user)) {
            // donothing
        } else {
            // connect to database
            $db['hostname'] = '116.12.54.144';
            $db['username'] = 'inspireposroot';
            $db['password'] = 'ab123456';
            $db['database'] = 'inspireposrt_' . $userinfo['result']['username'];
            $db['dbdriver'] = 'mysql';
            $db['dbprefix'] = '';
            $db['pconnect'] = TRUE;
            $db['db_debug'] = TRUE;
            $db['cache_on'] = FALSE;
            $db['cachedir'] = '';
            $db['char_set'] = 'utf8';
            $db['dbcollat'] = 'utf8_general_ci';
            $db['swap_pre'] = '';
            $db['autoinit'] = TRUE;
            $db['stricton'] = FALSE;
            //var_dump($db);exit;
            $this->load->database($db, FALSE, TRUE);
        }
    }
}