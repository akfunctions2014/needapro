<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends MY_Model
{

    public function accounts($field = "", $value = "")
    {
        if ($field !== "" && $value !== "")
        {
            $this->db->where($field, $value);
        }

        if ($this->input->get("search"))
        {
            $this->db->like("email", $this->input->get("search"));
            $this->db->or_like("fullname", $this->input->get("search"));
        }

        $this->db->order_by("id", "DESC");
        $query = $this->db->get("account");
        return [
            "totalcount" => $query->num_rows,
            "accounts" => $query->result()
        ];
    }

    public function categories()
    {
        $this->db->where("parent", 1429189456);
        $this->db->order_by("description", "ASC");
        $query = $this->db->get("lookup");
        return [
            "totalcount" => $query->num_rows,
            "categories" => $query->result()
        ];
    }

    public function addcategory()
    {
        $id = time();
        $this->db->insert("lookup", [
            "id" => $id,
            "description"=> $this->input->post("description"),
            "parent" => 1429189456,
            "createdBy" => $this->session->userdata("accountid"),
            "createdOn" => $this->now_datetime()
        ]);

        redirect("admin/categories");
    }

    public function editcategory($id)
    {
        $this->db->where("id", $id);
        $this->db->update("lookup", [
            "description" => $this->input->post("description"),
            "updatedBy" => $this->session->userdata("accountid"),
            "updatedOn" => $this->now_datetime()
        ]);

        redirect("admin/categories");
    }

    public function deletecategory($id)
    {
        $this->db->delete("lookup", ["id" => $id]);
        redirect("admin/categories");
    }

}
