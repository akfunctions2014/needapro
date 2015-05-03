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
    
    public function categories()
    {
        $categories = $this->admin_model->categories();
        $this->load->view("admin/categories", $categories);
    }
    
    public function addcategory()
    {
        if($this->input->post("session_id"))
        {
            $this->load->library("form_validation");
            $this->form_validation->set_rules("session_id", "session_id", "required|callback_authSession");
            $this->form_validation->set_rules("description", "Name", "trim|required|max_length[100]|is_unique[lookup.description]");
            if($this->form_validation->run())
            {
                $this->admin_model->addcategory();
            }
            else
            {
                redirect("admin/categories");
            }
        }
    }
    
    public function editcategory($id)
    {
        if($this->input->post("session_id"))
        {
           
            $category = $this->admin_model->getRow("lookup", $id);            
            if($category->description != $this->input->post("description"))
            {
                $this->load->library("form_validation");
                $this->form_validation->set_rules("session_id", "session_id", "required|callback_authSession");
                $this->form_validation->set_rules("description", "Description", "trim|required|is_unique[lookup.description]");
                if($this->form_validation->run())
                {
                    $this->admin_model->editcategory((int)$id);
                }
                else
                {
                    redirect("admin/categories");
                }                
            }
            else
            {
                redirect("admin/categories");
            }
            
        }        
    }
    
    public function deletecategory($id)
    {
        $this->admin_model->deletecategory((int)$id);
    }

}
