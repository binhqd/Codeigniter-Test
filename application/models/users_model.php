<?php
use GuzzleHttp\Client;

class Users_model extends MyExtendedModel
{

    const LOGIN_URL = 'http://adminretail.yainsights.com/ws/useraccounthandle/getAccountByUsername';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This method is used to login with given credential
     *
     * @param string $username            
     * @param string $password            
     */
    public function login($username, $password)
    {
        $this->client = new GuzzleHttp\Client();
        $response = $this->client->post(self::LOGIN_URL, array(
            'body' => array(
                'username' => $username,
                'password' => $password,
                'server' => $_SERVER['SERVER_NAME']
            )
        ));
        
        // Get content return after post
        $content = $response->getBody()->getContents();
        
        $ret = json_decode($content, true);
        $this->session->set_userdata('userinfo', $ret);
        
        if (! empty($ret['result'])) {
            return $ret['result'];
        } else {
            return false;
        }
    }

    /**
     * This method is used to return current user information.
     * Null if user is not log in
     * 
     * @return NULL|array
     */
    public function currentUser()
    {
        $userinfo = $this->session->userdata('userinfo');
        
        $user = $userinfo['result'];
        if (empty($user)) {
            return null;
        } else {
            return $user;
        }
    }
}