<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Image_model extends MY_Model
{

    public function avatar($accountid)
    {
        $this->db->where("accountid", $accountid);
        $this->db->limit(1);
        $query = $this->db->get("avatar");
        return $query->result()[0];
    }

}
