<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Image extends MY_Controller
{
    public function index()
    {
        $this->avatar();
    }
    
    public function avatar($accountid)
    {
        $this->load->model("image_model");        
        $this->load->view("image/avatar", [
            "avatar" => $this->image_model->avatar($accountid)
        ]);
    }
}

