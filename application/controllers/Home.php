<?php

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function home($id)
    {
        // echo $id;

        $user_list = $this->session->userdata("user_list");
        $active_user = $user_list[$id];

        // print_r($active_user);

        $view_data = new stdClass();
        $view_data->user = $active_user;
        $view_data->user_list = $user_list;

        $this->load->model("user_product_model");

        $view_data->products = $this->user_product_model->get_user_products(
            array(
                "user_id" => $active_user->id
            )
        );

        $this->load->view('home', $view_data );
    }
}