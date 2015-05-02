<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends MY_Controller
{

    public function index()
    {
        $this->load->view('category/list');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */