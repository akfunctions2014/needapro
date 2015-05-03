<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends MY_Controller
{

    public function index()
    {
        if ($this->auth())
        {
            redirect("account/profile");
        }
        else
        {
            redirect("account/login");
        }
    }

    public function profile()
    {
        if ($this->auth())
        {
            $this->load->view("account/profile", [
                "account"=> $this->account_model->getAccountInfo()
            ]);
        }
        else
        {
            redirect("account/login");
        }
    }

    public function login()
    {
        if ($this->auth())
        {
            redirect("account/profile");
        }
        else
        {
            if ($this->input->post("session_id"))
            {
                $this->authLogin();
            }
            else
            {
                $this->load->view("account/login");
            }
        }
    }

    private function authLogin()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("session_id", "session_id", "required|callback_authSession");
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|max_length[30]|min_length[3]");
        $this->form_validation->set_rules("password", "Password", "trim|required|max_length[15]|min_length[5]");
        if ($this->form_validation->run())
        {            
            if ($this->account_model->login())
            {
                redirect("account/profile");
            }
            else
            {
                $this->load->view("account/login", [
                    "loginerror" => "Wrong Credentials or inactive account"
                ]);
            }
        }
        else
        {
            $this->load->view("account/login");
        }
    }

    public function register()
    {
        if ($this->auth())
        {
            redirect("account/profile");
        }
        else
        {
            if ($this->input->post("session_id"))
            {
                $this->doRegister();
            }
            else
            {
                $this->load->view("account/register");
            }
        }
    }

    private function doRegister()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("session_id", "session_id", "required|callback_authSession");
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|max_length[30]|min_length[3]|is_unique[account.email]");
        $this->form_validation->set_rules("fullname", "Name", "trim|required|max_length[50]|min_length[5]");
        if ($this->form_validation->run())
        {            
            $this->account_model->register();
        }
        else
        {
            $this->load->view("account/register");
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("connected");
        $this->session->unset_userdata("avatar");
        $this->session->unset_userdata("fullname");
        $this->session->unset_userdata("email");
        $this->session->unset_userdata("accountid");
        $this->session->unset_userdata("type");
        redirect("account/login");
    }
    
    public function forgotpassword()
    {
        if($this->auth())
        {
            redirect("account/profile");
        }
        else
        {
            if($this->input->post("session_id"))
            {
                $this->load->library("form_validation");
                $this->form_validation->set_rules("session_id", "session_id", "required|callback_authSession");
                $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|max_length[30]|min_length[3]|callback_emailExists");
                if($this->form_validation->run())
                {                    
                    $this->account_model->forgotpassword();
                }
                else
                {
                    $this->load->view("account/forgotpassword");
                }
            }
            else
            {
                $this->load->view("account/forgotpassword");
            }            
        }
    }
    
    public function changepassword()
    {
        if($this->auth())
        {
            if($this->input->post("session_id"))
            {
                $this->load->library("form_validation");
                $this->form_validation->set_rules("session_id", "session_id", "required|callback_authSession");
                $this->form_validation->set_rules("oldpassword", "Current Password", "trim|required|max_length[15]|min_length[5]|callback_compareCurrentPassword");
                $this->form_validation->set_rules("newpassword", "New password", "trim|required|max_length[15]|min_length[5]");
                $this->form_validation->set_rules("newpassword2", "Repeat your new password", "trim|required|max_length[15]|min_length[5]|matches[newpassword]");
                if($this->form_validation->run())
                {                    
                    $this->account_model->changepassword();
                }
                else
                {
                    $this->load->view("account/changepassword");
                }
            }
            else
            {
                $this->load->view("account/changepassword");
            }            
        }
        else
        {
            redirect("account/login");
        }
    }
    
    public function compareCurrentPassword($password)
    {
        $this->form_validation->set_message('compareCurrentPassword', 'Your current password is not correct');        
        return $this->account_model->compareCurrentPassword($password);
    }
    
    public function editprofile()
    {
        if($this->auth())
        {
            if($this->input->post("session_id"))
            {
                $this->load->library("form_validation");
                $this->form_validation->set_rules("session_id", "session_id", "required|callback_authSession");
                $this->form_validation->set_rules("fullname", "My name", "trim|required|max_length[50]|min_length[3]");
                $this->form_validation->set_rules("cellphone", "Cell phone", "trim|required|exact_length[10]|numeric");
                $this->form_validation->set_rules("homephone", "Home phone", "trim|exact_length[10]|numeric");
                $this->form_validation->set_rules("notes", "Notes", "trim|max_length[500]");
                $account = $this->account_model->getAccountInfo();
                if($this->input->post("email") !== $account->email)
                {
                    $this->form_validation->set_rules("email", "Email address", "trim|required|max_length[30]|min_length[3]|is_unique[account.email]");
                }
                if($this->form_validation->run())
                {
                    $this->account_model->editprofile();                    
                }                                
                else
                {
                    $this->load->view("account/editprofile", [
                        "account"=> $this->account_model->getAccountInfo()
                    ]);
                }                
            }
            else
            {
                $this->load->view("account/editprofile", [
                        "account"=> $this->account_model->getAccountInfo()
                ]);
            }            
        }
        else
        {
            redirect("account/login");
        }
    }
    
    public function avatar()
    {
        if($this->auth())
        {
            if($this->input->post("session_id"))
            {
                $this->uploadAvatar();
            }
            else
            {
                $this->load->view("account/avatar", [
                    "account"=>$this->account_model->getAccountInfo()
                ]);
            }            
        }
        else
        {
            redirect("account/login");
        }
    }
    
    private function uploadAvatar()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("session_id", "session_id", "required|callback_authSession");
        if($this->form_validation->run())
        {                    
            $this->load->library("upload", [
                "upload_path"=> "uploads/",
                "allowed_types" => "png|jpg|jpeg",
                "max_size"=>1024,
                "encrypt_name"=> TRUE
            ]);

            if(!$this->upload->do_upload())
            {
                $this->load->view("account/avatar", [
                    "account"=>$this->account_model->getAccountInfo(),
                    "errormessage" => $this->upload->display_errors()                   
                ]);
            }
            else
            {
                $this->account_model->updateAvatar($this->upload->data());                                
            }
        }
        else
        {
            $this->load->view("account/avatar", [
                "account"=>$this->account_model->getAccountInfo()
            ]);
        }
    }
    
    public function categories()
    {
        if($this->auth())
        {
            $this->load->view("account/categories", [
                "categories" => $this->account_model->categories()
            ]);
        }
        else
        {
            redirect("account/login");
        }
    }
    
    public function updatecategories()
    {
        if($this->auth())
        {
            if($this->input->post("session_id"))
            {
                $this->load->library("form_validation");
                $this->form_validation->set_rules("session_id", "session_id", "required|callback_authSession");
                if($this->form_validation->run())
                {
                   $this->account_model->updatecategories();
                }
                else
                {
                    redirect("account/categories");
                }
            }
        }
        else
        {
            redirect("account/login");
        }
    }

}
