<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('HomeModel');
		$this->data['category']=$this->HomeModel->getCategoryHome();
		$this->data['brand']=$this->HomeModel->getBrandHome();
	}
	public function index()
	{
		$this->data['product_all']=$this->HomeModel->getAllProduct();
		$this->load->view('pages/template/header',$this->data);
		$this->load->view('pages/template/slider');
		$this->load->view('pages/home',$this->data);
		$this->load->view('pages/template/footer');
	}
	public function category($id)
	{
		$this->load->view('pages/template/header');
		$this->load->view('pages/template/slider');
		$this->load->view('pages/category');
		$this->load->view('pages/template/footer');
	}
	public function brand($id)
	{
		$this->load->view('pages/template/header');
		$this->load->view('pages/template/slider');
		$this->load->view('pages/brand');
		$this->load->view('pages/template/footer');
	}
	public function product($id)
	{
		$this->load->view('pages/template/header');
		$this->load->view('pages/template/slider');
		$this->load->view('pages/product_detail');
		$this->load->view('pages/template/footer');
	}
	public function cart()
	{
		$this->load->view('pages/template/header');
		$this->load->view('pages/template/slider');
		$this->load->view('pages/cart');
		$this->load->view('pages/template/footer');
	}
	public function login()
	{
		$this->load->view('pages/template/header');
		$this->load->view('pages/template/slider');
		$this->load->view('pages/login');
		$this->load->view('pages/template/footer');
	}
}
