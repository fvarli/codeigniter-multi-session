<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("user_model");
    }

    public function index()
    {
        $user_list = $this->session->userdata("user_list");

        if($user_list){
            $user = reset($user_list);
            // print_r($user);
            redirect(base_url("home/" . md5($user->email)));
        }else{
            redirect(base_url("login"));
        }
    }

    public function login()
    {

        $this->load->view('login');
    }

    public function user_login()
    {
        // print_r($_POST);

        $this->load->library('form_validation');

        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email");
        $this->form_validation->set_rules("password", "Password", "required|trim");

        if($this->form_validation->run() === FALSE){

            $view_data = new stdClass();
            $view_data->form_error = true;

            $this->load->view('login', $view_data);
        }else{

            $user = $this->user_model->get_user(
                array(
                    "email" => $this->input->post("email"),
                    "password" => md5($this->input->post("password"))
                )
            );

            // print_r($user);

            if($user){
                if($this->session->userdata("user_list")){
                    $user_list = $this->session->userdata("user_list");
                }else{
                    $user_list = [];
                }
                $user_list[md5($user->email)] = $user;

                $this->session->set_userdata("user_list", $user_list);

                // print_r($user_list);
                redirect(base_url("home/" . md5($user->email )));

            }else{
                $this->load->view('login');
            }
        }

    }

    public function logout($id)
    {
        // echo $id;
        $user_list = $this->session->userdata("user_list");

        unset($user_list[$id]);

        $this->session->set_userdata("user_list", $user_list);
        redirect(base_url("login"));
    }

    public function list(){
        print_r($this->session->userdata("user_list"));
    }
}
