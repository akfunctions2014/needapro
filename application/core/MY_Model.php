<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    public $controller;
    
    public function __construct()
    {
        parent::__construct();
        $this->controller =& get_instance();
    }
    
    public function now_datetime()
    {
        return date($this->config->item("log_date_format"));
    }
    
    public function emailExists($email)
    {
        $this->db->where("email", $email);        
        $this->db->limit(1);
        $query = $this->db->get("account");        
        return $query->num_rows == 1;
    }
    
    public function getAccountInfo()
    {
        $this->db->where("id", $this->session->userdata("accountid"));
        $this->db->limit(1);
        $query = $this->db->get("account");
        return $query->result()[0];
    }
}

