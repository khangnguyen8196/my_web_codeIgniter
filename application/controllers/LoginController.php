<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
    public function __construct(){
        parent::__construct();
       
    }
	public function index()
	{
		$this->load->view('admin/template/header');
        $this->load->view('admin/login/login');
        $this->load->view('admin/template/footer');
	}
    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required',['required'=>'Email không được để trống']);
        $this->form_validation->set_rules('password', 'Password', 'required',['required'=>'Mật khẩu không được để trống']);
        if ($this->form_validation->run())
        {
              $email= $this->input->post('email');
              $password = md5($this->input->post('password'));
              $this->load->model('LoginModel');
              $result =$this->LoginModel->checkLogin($email,$password);
              if(!empty($result)){
                $session_array=[
                    'id' => $result[0]->id,
                    'username' => $result[0]->username,
                    'email' => $result[0]->email,
                ];
                $this->session->set_userdata('LoggedIn',$session_array);
                $this->session->set_flashdata('success','Login Successfully');
                redirect(base_url('/dashboard'));
              }else {
                $this->session->set_flashdata('error','Wrong Email or Password please login again');
                redirect(base_url('login'));
              }
        }
        else
        {
            $this->index();
        }
    }
}
