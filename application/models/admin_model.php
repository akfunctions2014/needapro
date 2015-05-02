<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends MY_Model
{
    public function accounts($field = "", $value = "")
    {   
        if($field !== "" && $value !== "")
        {
            $this->db->where($field, $value);
        }
        
        if($this->input->get("search"))
        {
            $this->db->like("email", $this->input->get("search"));
            $this->db->or_like("fullname", $this->input->get("search"));
        }
        
        $this->db->order_by("id", "DESC");
        $query = $this->db->get("account");        
        return [
            "totalcount" =>  $query->num_rows,
            "accounts" => $query->result()
        ];
    }
}