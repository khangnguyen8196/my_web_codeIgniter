<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller {
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

        $this->load->model('CategoryModel');
        $data['category']=$this->CategoryModel->selectCategory();

        $this->load->view('admin/category/list',$data);
        $this->load->view('admin/layout/footer');
	}
    public function create()
	{
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
        $this->load->view('admin/category/create');
        $this->load->view('admin/layout/footer');
	}
    public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'required',['required'=>'Vui lòng nhập %s']);
        $this->form_validation->set_rules('slug', 'Slug', 'required',['required'=>'Vui lòng nhập %s']);
        $this->form_validation->set_rules('description', 'Description', 'required',['required'=>'Vui lòng nhập %s']);
        if ($this->form_validation->run()==TRUE)
        {   
            // upload image
            $ori_filename =$_FILES['image']['name'];
            $new_name = time()."".str_replace(' ','-',$ori_filename);
            $config =[
                'upload_path' => './uploads/category',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];
            $this->load->library('upload',$config);

            if ( ! $this->upload->do_upload('image'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('admin/layout/header');
                        $this->load->view('admin/layout/navbar');
                        $this->load->view('admin/category/create',$error);
                        $this->load->view('admin/layout/footer');
                }
                else
                {
                        $category_filename= $this->upload->data('file_name');
                        $data=[
                            'title'=> $this->input->post('title'),
                            'description'=> $this->input->post('description'),
                            'slug'=> $this->input->post('slug'),
                            'image'=> $category_filename,
                            'status'=> $this->input->post('status')
                        ];
                        $this->load->model('CategoryModel');
                        $this->CategoryModel->insertCategory($data);
                        $this->session->set_flashdata('success','Add Success category');
                        redirect(base_url('category/list')); 
                }
        }else{
            $this->session->set_flashdata('error','Add faild category');
            $this->create();
        }
        
	}
    public function edit($id)
	{
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');

        $this->load->model('CategoryModel');
        $data['category']=$this->CategoryModel->selectCategoryById($id);

        $this->load->view('admin/category/edit',$data);
        $this->load->view('admin/layout/footer');
	}

    public function update($id)
    {
        $this->form_validation->set_rules('title', 'Title', 'required',['required'=>'Vui lòng nhập %s']);
        $this->form_validation->set_rules('slug', 'Slug', 'required',['required'=>'Vui lòng nhập %s']);
        $this->form_validation->set_rules('description', 'Description', 'required',['required'=>'Vui lòng nhập %s']);
        if ($this->form_validation->run()==TRUE)
        {   
            if(!empty($_FILES['image']['name'])){
                // xoá ảnh củ
                if ($this->input->post('delete_image')) {
                    unlink('./uploads/category/'.$this->input->post('old_image'));
                    $data['image'] = '';
                }
                // upload image
                $ori_filename =$_FILES['image']['name'];
                $new_name = time()."".str_replace(' ','-',$ori_filename);
                $config =[
                    'upload_path' => './uploads/category',
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    'file_name' => $new_name,
                ];

                $this->load->library('upload',$config);
                if ( ! $this->upload->do_upload('image'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('admin/layout/header');
                    $this->load->view('admin/layout/navbar');
                    $this->load->view('admin/category/create',$error);
                    $this->load->view('admin/layout/footer');
                }
                else
                {
                    $category_filename= $this->upload->data('file_name');
                    $data=[
                        'title'=> $this->input->post('title'),
                        'description'=> $this->input->post('description'),
                        'slug'=> $this->input->post('slug'),
                        'image'=> $category_filename,
                        'status'=> $this->input->post('status')
                    ];        
                    
                }
            }else{
                $data=[
                    'title'=> $this->input->post('title'),
                    'description'=> $this->input->post('description'),
                    'slug'=> $this->input->post('slug'),
                    'status'=> $this->input->post('status')
                ];
            }
            $this->load->model('CategoryModel');
            $this->CategoryModel->updateCategory($id,$data);
            $this->session->set_flashdata('success','Update Success category');
            redirect(base_url('category/list')); 
        }else{
            $this->session->set_flashdata('error','Update faild category');
            $this->edit($id);
        }
    } 

    public function delete($id)
    {
        $this->load->model('CategoryModel');
        $this->CategoryModel->deleteCategory($id);
        $this->session->set_flashdata('success','Delete Success category');
        redirect(base_url('category/list')); 
    }
}
