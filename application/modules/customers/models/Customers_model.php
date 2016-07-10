<?php
class Customers_model extends CI_Model{
	private $main_tbl,$type_tbl;

	function __construct(){
		parent::__construct();

		$this->main_tbl = 'customer';
	}
	function get_collection($id = ''){
		if($id){
			$sql = "Select *,".$this->main_tbl.".id as row_id From ".$this->main_tbl." Where ".$this->main_tbl.".id = ".$id;
		}else{
			$sql = "Select *,".$this->main_tbl.".id as row_id From ".$this->main_tbl;
		}

		$query = $this->db->query($sql);

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
}