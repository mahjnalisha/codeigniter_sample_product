<?php if (!defined('BASEPATH')) {
		exit('No direct script access allowed');
}

	class Product_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		

		public function getAllProducts( $start, $length, $order_by,  &$count)
		{
			

			$this->db->select("tbl_product.*")
			->from('tbl_product');


			if (!is_null($order_by)) {
				$this->db->order_by($order_by, $dir);
			} else {
				$this->db->order_by("id", "ASC");
			}
			if (!is_null($length) AND $length > 0) {
				$this->db->limit($length, $start);
			} else {
				$this->db->limit($start);
			}
			$sn=1;
			$array_list=array();

			$query = $this->db->get()->result_array(); 
			foreach ($query as $key => $val) {
			$p_url=base_url().'product/detail/'.$val['id'];
				$p_edit=base_url().'product/edit/'.$val['id'];
				$product['sn'] = $sn;
				$product['pr_name'] = $val['pr_name'];
				$product['pr_image'] ='<a href="'.$p_url.'"><img src="'.base_url().'assets/uploads/products/' . $val['pr_image'] . '" width="90px" height="90px;"/></a>';
				$product['pr_price'] =$val['pr_price'] ;

				$product['pr_description'] = char_limit($val['pr_description'], 40, '...');
				$product['action'] = '<a id="' . $val['id'] . '" href="'.$p_url.'" class=" btn btn-success btn-xs"><i class="fa fa-eye fa-lg"></i>View </a><a id="' . $val['id'] . '" href="'.$p_edit.'" class=" btn btn-success btn-xs"><i class="fa fa-pencil fa-lg"></i>Edit </a><a id="' . $val['id'] . '" href="#" class=" del_product btn btn-danger btn-xs" data-product_id="'.$val['id'].'"><i class="fa fa-trash fa-lg"></i>Delete </a>';
				array_push($array_list, $product);
					$sn++;
			}
			return $array_list;
		}

		public function getProductDetail($id){
			$this->db->select("tbl_product.*")
			->from('tbl_product')
			->where('tbl_product.id',$id);
			$query = $this->db->get()->row_array(); 
			return $query;
		}

	

	}
