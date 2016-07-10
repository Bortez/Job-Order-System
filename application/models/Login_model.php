<?php
class Login_model extends CI_model{
	private $main_tbl;
	function __construct(){
		parent::__construct();
		$this->main_tbl = 'user';
	}
	function get_user($post){
		$query = $this->db->get_where($this->main_tbl, array('username'=>$post['username'],'password'=>md5($post['password'])),1);

		return $query->num_rows() > 0 ? $query->row() : FALSE;
	}
}