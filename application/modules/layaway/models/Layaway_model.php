<?php
class Layaway_model extends CI_Model{
	private $main_tbl,$payment_tbl;

	function __construct(){
		parent::__construct();

		$this->main_tbl = 'lay_away';
		$this->payment_tbl = 'payment';
	}
	function get_collection($id = ''){
		if($id){
			$sql = "Select
					  lay_away.*,
					  lay_away.id as row_id,
					  customer.name
					From
					  lay_away Inner Join
					  customer On lay_away.customer_id = customer.id Where lay_away.id = ".$id;
		}else{
			$sql = "Select
					  lay_away.*,
					  lay_away.id as row_id,
					  customer.name
					From
					  lay_away Inner Join
					  customer On lay_away.customer_id = customer.id";
		}

		$query = $this->db->query($sql);

		return $query->num_rows() > 0 ? $query : FALSE;
	}
	function get_recent_payment($id){
		$query = $this->db->query("Select *,SUM(amount) as total_amount,MAX(payment_date) as p_date From ".$this->payment_tbl." Where lay_away_id = ".$id);

		return $query->num_rows() > 0 ? $query->row_array() : FALSE;
	}
	function get_payment($id){
		$query = $this->db->query("Select * From payment Where `payment_date` = (Select Max(trans2.`payment_date`) From payment trans2 Where `lay_away_id` = ".$id.") Limit 1");
		
		if( $query->num_rows() > 0 ){
			$query_amount = $this->db->query("Select Sum(amount) as total_amount From payment Where lay_away_id = ".$id);

			if($query_amount->num_rows() > 0){
				$return_array = array();
				$amm = $query_amount->row()->total_amount;
				
				$return_array = $query->row_array();

				$return_array['total_amount'] = $amm;


				return $return_array;
			}
		}

		//return $query->num_rows() > 0 ? $query->row_array() : FALSE;
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
	function update_payment($post){
		$this->db->where('id',$post['id']);
		$query = $this->db->update($this->payment_tbl,elements(array('or_number','amount','payment_date'),$post));

		if($query){
			$query_select = $this->db->query("Select * From ".$this->payment_tbl." Where id = ".$post['id']." Limit 1");
			$row = $query_select->row();
			$recent = $this->get_recent_payment($row->lay_away_id);
			if($recent){
				return $recent;
			}
		}
	}
	function delete_payment($post){
		$this->db->where('id',$post['id']);
		$query = $this->db->delete($this->payment_tbl);
		$return = array();

		if($query){
			$recent = $this->get_recent_payment($post['layaway_id']);
			if($recent['id']){
				$return['status'] = TRUE;
				$return['recent'] = $recent;
			}else{
				$return['status'] = TRUE;
				$return['recent'] = FALSE;
			}
		}else{
			$return['status'] = FALSE;
		}

		return $return;
	}
	function add_payment($data){
		$query = $this->db->insert($this->payment_tbl,$data);

		return $query ? TRUE : FALSE;
	}
}