<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("account_model");
    }
    
    public function authSession($session_id)
    {
        $this->form_validation->set_message("authSession", "Invalid Client");
        return $this->session->userdata("session_id") == $session_id;
    }
    
    public function auth()
    {
        return $this->session->userdata("connected");
    }
    
    public function authAdmin()
    {
        return $this->session->userdata("type") === "ADMIN";
    }
    
    public function emailExists($email)
    {
        $this->form_validation->set_message('emailExists', 'The email you provided does not exist');        
        return $this->account_model->emailExists($email);
    }

 
    
}
