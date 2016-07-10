<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Check_account extends MX_Controller{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$json = array();
		$post = $this->input->post();

		echo $post['fields'];
		
		die;
		if($this->encrypt->decode($this->session->is_login)){
			$session = $this->encrypt->decode($this->session->access);

			if($session == 1){ //if admin
				$json['restrict'] = FALSE;
			}elseif($session == 2){ //if standard user
				$json['restrict'] = TRUE;
			}else{ //view user
				$json['restrict'] = TRUE;
			}

		}
		
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	public function check_password(){
		$post = $this->input->post();
		$json = array();

		$this->load->model('login_model','login');

		$validate = $this->login->get_user($post);

		if($validate){
			$json['status'] = TRUE;
		}else{
			$json['status'] = FALSE;
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
}