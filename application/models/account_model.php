<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account_model extends MY_Model
{
    public function login()
    {
        $this->db->where("email", $this->input->post("email"));
        $this->db->limit(1);
        $query = $this->db->get("account");
        
        if($query->num_rows !== 1)
        {
            return false;
        }
        else
        {
            $account = $query->result();
            $account = $account[0];
            $hashedPassword = hash("sha512", $this->input->post("password"));            
            
            if($account->password == hash("sha512", $account->salt.$hashedPassword))
            {
                $this->session->set_userdata("connected", TRUE);
                $this->session->set_userdata("accountid", $account->id);
                $this->session->set_userdata("email", $account->email);
                $this->session->set_userdata("fullname", $account->fullname);
                $this->session->set_userdata("avatar", $account->avatar);
                $this->session->set_userdata("type", $account->type);
                return true;
            }
            else
            {
                return false;
            }
        }  
    }
    
    public function register()
    {
        $id = time();

        $this->load->library("credentials");
        
        $this->db->insert("account", [
            "id" => $id,
            "active" => 1,
            "fullname" => $this->input->post("fullname"),
            "salt" => $this->credentials->newHashedSalt,
            "password" => $this->credentials->newHashedPassword,
            "email" => $this->input->post("email"),
            "type" => "PRO",
            "createdOn" => $this->now_datetime(),
            "createdBy" => $id
        ]);

        $subject = "Welcome to needapro";
        $message = "Your account has been created<br />";
        $message .= "Your credentials are <br />";
        $message .= "email: " . $this->input->post("email") . "<br />";
        $message .= "password: " . $this->credentials->newPasswordString . "<br />";


        /*$this->load->library("email");
        $this->email->from($this->config->item("email_from_address"), $this->config->item("email_from_name"));
        $this->email->to($this->input->post("email"));
        $this->email->subject($subject);
        $this->email->message($message);
        //$this->email->send();*/
        $data = [
            "infomessage"=> "[ {$this->credentials->newPasswordString} ]Your account has been created. An email has been sent to you at <b>{$this->input->post("email")}</b> with your credentials"
        ];
        $this->load->view("account/register", $data);
    }
    
    public function forgotpassword()
    {
        $this->db->where("email", $this->input->post("email"));
        $this->db->where("active", 1);
        $this->db->limit(1);
        
        $this->load->library("credentials");
        
        $this->db->update("account", [
            "salt" => $this->credentials->newHashedSalt,
            "password" => $this->credentials->newHashedPassword,
            "updatedOn"=> $this->now_datetime()
        ]);
        
        $subject = "needapro password reset";
        $message = "Your password was reset successfully<br />";
        $message .= "Your credentials are <br />";
        $message .= "email: " . $this->input->post("email") . "<br />";
        $message .= "password: " . $this->credentials->newPasswordString . "<br />";


        /*$this->load->library("email");
        $this->email->from($this->config->item("email_from_address"), $this->config->item("email_from_name"));
        $this->email->to($this->input->post("email"));
        $this->email->subject($subject);
        $this->email->message($message);
        //$this->email->send();*/
        $data = [
            "infomessage"=> "[ {$this->credentials->newPasswordString} ]Your password was reset successfully. An email has been sent to you at <b>{$this->input->post("email")}</b> with your new credentials"
        ];
        $this->load->view("account/forgotpassword", $data);
    }
    
    public function compareCurrentPassword($password)
    {
        $account = $this->getAccountInfo();       
        $hashedPassword = hash("sha512", $password);
        return $account->password == hash("sha512", $account->salt.$hashedPassword);        
    }
    
    public function changepassword()
    {
        $account = $this->getAccountInfo();        
        
        $this->db->where("id", $this->session->userdata("accountid"));
        $this->db->limit(1);
        
        $dbpassword = hash("sha512", $this->input->post("newpassword"));
        
        $this->db->update("account", [
            "password"=> hash("sha512", $account->salt.$dbpassword),
            "updatedOn"=> $this->now_datetime(),
            "updatedBy"=>$this->session->userdata("accountid")
        ]);
        
        $data = [
            "infomessage"=> "Your password has been successfully changed"
        ];
        $this->load->view("account/changepassword", $data);
    }
    
    public function editprofile()
    {
        $this->db->where("id", $this->session->userdata("accountid"));
        $this->db->limit(1);
        
        $this->db->update("account", [
            "fullname"=> $this->input->post("fullname"),
            "email"=> $this->input->post("email"),
            "cellphone"=> $this->input->post("cellphone"),
            "homephone"=> $this->input->post("homephone"),
            "notes"=> $this->input->post("notes"),
            "updatedOn"=> $this->now_datetime(),
            "updatedBy"=>$this->session->userdata("accountid")
        ]);
        $this->load->view("account/editprofile", [
            "account"=> $this->account_model->getAccountInfo()
        ]);
    }
    
    
    public function updateAvatar($filedata)
    {
        $this->db->delete("avatar", ["accountid"=>$this->session->userdata("accountid")]);
        
        $this->db->insert("avatar", [
            "accountid"=>$this->session->userdata("accountid"),
            "name"=>$filedata["file_name"],
            "ext"=>$filedata["file_ext"],
            "size"=> $filedata["file_size"],
            "data" => base64_encode(file_get_contents($filedata["full_path"])),
            "createdOn"=> $this->now_datetime(),
            "createdBy" => $this->session->userdata("accountid")
        ]);
        
        $this->db->where("id", $this->session->userdata("accountid"));        
        $this->db->update("account", [
            "avatar" => "image/avatar/{$this->session->userdata("accountid")}"
        ]);
        
        unlink($filedata["full_path"]);
        $this->load->view("account/avatar", [
            "account"=>$this->account_model->getAccountInfo()                   
        ]);
    }

}