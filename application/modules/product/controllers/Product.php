<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->helper('my_helper');
	} 
	public function index()
	{
		$data = array();
			if($this->input->is_ajax_request()){
				$start = null;
				$length = null;
				$order_by = null;
				$count = 0;
				$data = array();
				$filter=array();
				$this->db->select("DISTINCT(tbl_product.id) as p_id", FALSE)
				->from('tbl_product');
					$recordsTotal = $this->db->count_all_results();
					
				$data['data'] = $this->product_model->getAllProducts($start, $length, $order_by, $count);
				$data['recordsFiltered'] = $count;
				$data['recordsTotal'] = $recordsTotal;
				echo json_encode($data);
			} else {
				
		$data = array();
		$this->template->build('product', $data);
			}

	}
	public function detail($pid){
		$p_id=$pid;
		$data['product'] = $this->product_model->getProductDetail($p_id);
		$this->template->build('product_detail', $data);
	}

	public function create(){
		$pid="";
		$data=array();
		$this->template->build('product_form', $data);
	}

	public function edit($p_id){
		$product = $this->product_model->getProductDetail($p_id);
		$data['product']=$product;
		$this->template->build('product_form', $data);
	}
	public function save(){

		 $data = array();
        if ($this->input->post()) {
        	$this->form_validation->set_rules('pr_name', 'Product Name', 'required');
            $this->form_validation->set_rules('pr_description', 'Product Description', 'required');
            $this->form_validation->set_rules('pr_price', 'Product Price', 'required');
  			$p_id = $this->input->post('product_id');
  			$pr_name = $this->input->post('pr_name');
  			$pr_description = $this->input->post('pr_description');
  			$pr_price = $this->input->post('pr_price');

            $file_upload_data = array();
            //config for upload logic
            $config['upload_path'] = 'assets/uploads/products';
            // $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';

            $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
            $config['max_size'] = '5120';
            $config['max_width'] = '';
            $config['max_height'] = '';
            $config['overwrite'] = true;
            $config['remove_spaces'] = true;

            $this->load->library('upload', $config);
            if ($this->form_validation->run() == False) {
                $this->session->set_flashdata('errorMessage', validation_errors());
                // redirect(base_url('product/create'));
                if($p_id!==""){
                	$edit_url=base_url().'product/edit/'.$p_id;
                	 redirect($edit_url);
                }else{
                	 redirect(base_url('product/create'));
                }

            } elseif ($this->form_validation->run() == TRUE) {
            	
                $config['file_name'] =date('his');
                $this->upload->initialize($config);
                if ( !$this->upload->do_upload('pr_image'))
                {
                     
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());
                    redirect(base_url('product/create'));
                }
                else
                {
                    $uploaded_image =  $this->upload->data('pr_image');
                    $image_data = $this->upload->data(); 
                  
				$user_data = array(
				'pr_name' => $pr_name,
				'pr_description' => $pr_description,
				'pr_price' => $pr_price,
				'pr_image' => $config['file_name'].$image_data['file_ext']
				);
                }
                if($p_id!==""){
                	$this->db->where('tbl_product.id', $p_id);
                	$this->db->update('tbl_product', $user_data);
                }else{
                	$this->db->insert('tbl_product', $user_data);
                }
			 }
            	$this->session->set_flashdata('successMessage', 'Profile updated successfully.');
                redirect('product');
            }
        } 

	public function delete(){
		$pid=$this->input->post('proid');
		$this->db->where('tbl_product.id', $pid);
		$this->db->delete('tbl_product');
		$data['message']='Deleted successfully';
		$data['status']='success';
		echo json_encode($data);
		die;
	}
		
}
