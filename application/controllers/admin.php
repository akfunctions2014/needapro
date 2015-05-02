<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->authAdmin())
        {
            redirect("home");
        }

        $this->load->model("admin_model");
    }

    public function index()
    {
        $this->accounts();
    }

    public function accounts($field = "", $value = "")
    {
        $accounts = $this->admin_model->accounts($field, $value, $this->input->get("search"));
        $this->load->view("admin/accounts", [
            "accounts" => $accounts["accounts"],
            "totalcount" => $accounts["totalcount"],
            "field"=> $field,
            "value" => $value
        ]);
    }

}
