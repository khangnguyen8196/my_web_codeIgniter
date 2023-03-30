<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {
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

        $this->load->model('ProductModel');
        $data['product']=$this->ProductModel->selectAllProduct();

        $this->load->view('admin/product/list',$data);
        $this->load->view('admin/layout/footer');
	}
    public function create()
	{
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
        // get brand
        $this->load->model('BrandModel');
        $data['brand']=$this->BrandModel->selectBrand();
        //get category
        $this->load->model('CategoryModel');
        $data['category']=$this->CategoryModel->selectCategory();
        $this->load->view('admin/product/create',$data);
        $this->load->view('admin/layout/footer');
	}
    public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'required',['required'=>'Vui lòng nhập %s']);
        $this->form_validation->set_rules('slug', 'Slug', 'required',['required'=>'Vui lòng nhập %s']);
        $this->form_validation->set_rules('price', 'Price', 'required',['required'=>'Vui lòng nhập %s']);
        $this->form_validation->set_rules('price_discount', 'Price_discount', 'required',['required'=>'Vui lòng nhập %s']);
        $this->form_validation->set_rules('quantity', 'Quantity', 'required',['required'=>'Vui lòng nhập %s']);
        $this->form_validation->set_rules('description', 'Description', 'required',['required'=>'Vui lòng nhập %s']);
        if ($this->form_validation->run()==TRUE)
        {   
            // upload image
            $ori_filename =$_FILES['image']['name'];
            $new_name = time()."".str_replace(' ','-',$ori_filename);
            $config =[
                'upload_path' => './uploads/product',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];
            $this->load->library('upload',$config);

            if ( ! $this->upload->do_upload('image'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('admin/layout/header');
                        $this->load->view('admin/layout/navbar');
                        $this->load->view('admin/product/create',$error);
                        $this->load->view('admin/layout/footer');
                }
                else
                {
                        $brand_filename= $this->upload->data('file_name');
                        $data=[
                            'title'=> $this->input->post('title'),
                            'description'=> $this->input->post('description'),
                            'slug'=> $this->input->post('slug'),
                            'price'=> $this->input->post('price'),
                            'price_discount'=> $this->input->post('price_discount'),
                            'quantity'=> $this->input->post('quantity'),
                            'category_id'=> $this->input->post('category_id'),
                            'brand_id'=> $this->input->post('brand_id'),
                            'image'=> $brand_filename,
                            'status'=> $this->input->post('status')
                        ];
                        $this->load->model('ProductModel');
                        $this->ProductModel->insertProduct($data);
                        $this->session->set_flashdata('success','Add Success Product');
                        redirect(base_url('product/list')); 
                }
        }else{
            $this->session->set_flashdata('error','Add faild Product');
            $this->create();
        }
        
	}
    public function edit($id)
	{
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
        // get brand
        $this->load->model('BrandModel');
        $data['brand']=$this->BrandModel->selectBrand();
        //get category
        $this->load->model('CategoryModel');
        $data['category']=$this->CategoryModel->selectCategory();
        
        $this->load->model('ProductModel');
        $data['product']=$this->ProductModel->selectProductById($id);

        $this->load->view('admin/product/edit',$data);
        $this->load->view('admin/layout/footer');
	}

    public function update($id)
    {
        $this->form_validation->set_rules('title', 'Title', 'required',['required'=>'Vui lòng nhập %s']);
        $this->form_validation->set_rules('slug', 'Slug', 'required',['required'=>'Vui lòng nhập %s']);
        $this->form_validation->set_rules('quantity', 'Quantity', 'required',['required'=>'Vui lòng nhập %s']);
        $this->form_validation->set_rules('description', 'Description', 'required',['required'=>'Vui lòng nhập %s']);
        if ($this->form_validation->run()==TRUE)
        {   
            if(!empty($_FILES['image']['name'])){
                if ($this->input->post('delete_image')) {
                    unlink('./uploads/product/'.$this->input->post('old_image'));
                    $data['image'] = '';
                }
                // upload image
                $ori_filename =$_FILES['image']['name'];
                $new_name = time()."".str_replace(' ','-',$ori_filename);
                $config =[
                    'upload_path' => './uploads/product',
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    'file_name' => $new_name,
                ];

                $this->load->library('upload',$config);
                if ( ! $this->upload->do_upload('image'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('admin/layout/header');
                    $this->load->view('admin/layout/navbar');
                    $this->load->view('admin/product/create',$error);
                    $this->load->view('admin/layout/footer');
                }
                else
                {
                    $brand_filename= $this->upload->data('file_name');
                    $data=[
                        'title'=> $this->input->post('title'),
                        'description'=> $this->input->post('description'),
                        'slug'=> $this->input->post('slug'),
                        'price'=> $this->input->post('price'),
                        'price_discount'=> $this->input->post('price_discount'),
                        'quantity'=> $this->input->post('quantity'),
                        'category_id'=> $this->input->post('category_id'),
                        'brand_id'=> $this->input->post('brand_id'),
                        'image'=> $brand_filename,
                        'status'=> $this->input->post('status')
                    ];        
                    
                }
            }else{
                $data=[
                    'title'=> $this->input->post('title'),
                    'description'=> $this->input->post('description'),
                    'slug'=> $this->input->post('slug'),
                    'price'=> $this->input->post('price'),
                    'price_discount'=> $this->input->post('price_discount'),
                    'quantity'=> $this->input->post('quantity'),
                    'category_id'=> $this->input->post('category_id'),
                    'brand_id'=> $this->input->post('brand_id'),
                    'status'=> $this->input->post('status')
                ];
            }
            $this->load->model('ProductModel');
            $this->ProductModel->updateProduct($id,$data);
            $this->session->set_flashdata('success','Update Success Product');
            redirect(base_url('product/list')); 
        }else{
            $this->session->set_flashdata('error','Update faild Product');
            $this->edit($id);
        }
    } 

    public function delete($id)
    {
        $this->load->model('ProductModel');
        $this->ProductModel->deleteProduct($id);
        $this->session->set_flashdata('success','Delete Success Product');
        redirect(base_url('product/list')); 
    }
}
