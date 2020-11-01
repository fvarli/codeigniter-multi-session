<?php

class User_product_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_user_products($where=array())
    {
        return $this->db->where($where)->get("user_products")->result();
    }
}