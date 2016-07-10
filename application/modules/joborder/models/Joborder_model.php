<?php
class Joborder_model extends CI_Model{
	private $main_tbl,$meta_tbl,$cus_tbl,$stat_tbl;

	function __construct(){
		parent::__construct();

		$this->main_tbl = 'job_order';
		$this->cus_tbl = 'customer';
		$this->meta_tbl = 'job_order_meta';
		$this->stat_tbl = 'order_status';
	}
	function get_collection($id = ''){
		if($id){
			$sql = "Select
				  ".$this->main_tbl.".*,
				  ".$this->main_tbl.".id as row_id,
				  ".$this->cus_tbl.".name,
				  ".$this->cus_tbl.".email,
				  ".$this->cus_tbl.".address,
				  ".$this->cus_tbl.".telephone
				From
				  ".$this->main_tbl." Inner Join
				  ".$this->cus_tbl." On ".$this->main_tbl.".customer_id = ".$this->cus_tbl.".id
				Where
				  ".$this->main_tbl.".id = ".$id." Limit 1";
		}else{
			$sql = "Select
				  ".$this->main_tbl.".*,
				  ".$this->main_tbl.".id as row_id,
				  ".$this->cus_tbl.".name,
				  ".$this->cus_tbl.".email,
				  ".$this->cus_tbl.".address,
				  ".$this->cus_tbl.".telephone
				From
				  ".$this->main_tbl." Inner Join
				  ".$this->cus_tbl." On ".$this->main_tbl.".customer_id = ".$this->cus_tbl.".id";
		}

		$query = $this->db->query($sql);

		return $query->num_rows() > 0 ? $query : FALSE;
	}
	function get_meta($id){
		$query = $this->db->get_where($this->meta_tbl,array('reference_id'=>$id));
	
		return $query->num_rows() > 0 ? $query : FALSE;
	}
	function insert($data){
		$query = $this->db->insert($this->main_tbl,$data);
		
		return $query ? $this->db->insert_id() : FALSE;
	}
	function update($id,$data){
		$this->db->where('id',$id);
		$query = $this->db->update($this->main_tbl,$data);

		return $query ? TRUE : FALSE;
	}
	function delete($id){
		$this->db->where('id', $id);
		$query = $this->db->delete($this->main_tbl);

		return $query ? TRUE : FALSE;
	}
	function insert_meta($data){	
		$query = $this->db->insert_batch($this->meta_tbl,$data);
		
		return $query ? TRUE : FALSE;
	}
	function update_meta($data){

		foreach($data as $row){
			$ref_id = $row['reference_id'];
			$key = $row['meta_field'];
			$val = $row['meta_value'];

			$this->db->where('reference_id', $ref_id);
			$this->db->where('meta_field', $key);
			$this->db->update($this->meta_tbl,array('meta_value'=>$val)); 

		}

		return TRUE; 

		
	}
	function insert_status($id,$data){
		$data['order_id'] = $id;
		
		$query = $this->db->insert($this->stat_tbl,$data);
		
		return $query ? TRUE : FALSE;
	}
	function update_status($id,$data){
		$data['order_id'] = $id;


		$sql ="select * from ".$this->stat_tbl." order by id DESC limit 1";
    	$select_query = $this->db->query($sql);

		if($select_query->num_rows() > 0){
			$rows = $select_query->row();
			
			if($rows->status_id !== $data['status_id'] || $rows->remarks !== $data['remarks']){
				$query = $this->db->insert($this->stat_tbl,$data);
			}
		}

		return TRUE;
	}
}