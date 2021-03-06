<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('Users_model', 'users');
        $this->load->model('Customers_model', 'customers');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * http://example.com/index.php/welcome
     * - or -
     * http://example.com/index.php/welcome/index
     * - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     *
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $currentUser = $this->users->currentUser();
        if (empty($currentUser)) {
            redirect('/login');
        }
        
        $data['userdata'] = $currentUser;
        
        $customers = $this->customers->all();
        $data['customers'] = $customers;
        
        $this->load->view('profile', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */