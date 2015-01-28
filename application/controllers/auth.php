<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('Users_model', 'users');
        $this->load->library('session');
    }

    private function checkAuth($callback)
    {
        $user = $this->users->currentUser();
        if (! empty($user)) {
            // $this->session->set_flashdata('error', 'Invalid username or password');
            $callback($user);
        }
    }

    /**
     * This action is used to control login function
     */
    public function login()
    {
        // If user already logged in, then redirect user to his/her profile page
        $this->checkAuth(function ($user)
        {
            redirect('/profile');
        });
        
        // Perform login action
        if (strtoupper($this->input->server('REQUEST_METHOD')) == 'POST') {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            try {
                if ($this->users->login($username, $password)) {
                    $this->session->set_flashdata('message', 'Login successful');
                    redirect('/profile');
                } else {
                    $this->session->set_flashdata('error', 'Invalid username or password');
                    redirect('/login');
                }
            } catch (Exception $ex) {
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('/login');
            }
        } else {
            
            $this->load->view('login');
        }
    }

    /**
     * This action is used to perform logout action
     */
    public function logout()
    {
        $this->session->unset_userdata('userinfo');
        redirect('/login');
    }
}
