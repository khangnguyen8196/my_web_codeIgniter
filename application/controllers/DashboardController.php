<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('LoggedIn')){
            redirect(base_url('/login'));
        }
       
    }
	public function index()
	{
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
        $this->load->view('admin/dashboard/dashboard');
        $this->load->view('admin/layout/footer');
	}

    public function logout()
    {
        $this->session->unset_userdata('LoggedIn');
        $this->session->set_flashdata('message', 'Logout Successfully');
        redirect(base_url('/login'));
    }
    
}
