<?php

class Customers_model extends MyExtendedModel
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This method is used to return all customers
     *
     * @param unknown $user_id            
     * @return NULL
     */
    function all()
    {
        $this->db->select('*');
        $this->db->from('customermasters');
        $this->db->order_by('firstname', 'asc');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return null;
    }
}