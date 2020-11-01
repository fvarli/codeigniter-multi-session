<?php

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_user($where=array())
    {
        return $this->db->where($where)->get("users")->row();
    }
}