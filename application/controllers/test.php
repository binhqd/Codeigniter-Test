<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends CI_Controller
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('IpadTest_model', 'dropTest');
    }
    
    public function index()
    {
        $noIpads = $username = $this->input->get('noIpads');
        $noStories = $username = $this->input->get('noStories');
        $result = $username = $this->input->get('result');
        
        if (empty($noIpads) || empty($noStories) || empty($result)) {
            exit("Invalid parameters");
        }
        
        $n = $this->dropTest->test($noIpads, $noStories, $result);
        echo "<h1>Need {$n} test to determine the highest storey ({$result}) that Ipad still survive";
    }
}