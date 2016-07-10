<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller{
	function __construct(){
		parent::__construct();
	}
	function _remap($method){
		if(!$this->session->is_login){
			if(method_exists($this,$method)){
				$this->$method();
				$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
				$this->output->set_header("Pragma: no-cache");	
			}else{
				show_404();
			}
		}else{
			redirect('/');
		}
	}
	function index(){
		$this->load->view('login/login');
	}
	public function authenticate(){
		$this->load->model('login_model','login');
		$post = $this->input->post();
		
		$validate = $this->login->get_user($post);
		$json = array();

		if($validate){
			$user = $validate;
			$userdata = array(
				'user_id'=>$this->encrypt->encode($user->id),
				'username'=>$this->encrypt->encode($user->username),
				'access'=>$this->encrypt->encode($user->access_level),
				'is_login'=>$this->encrypt->encode(TRUE)
			);

			$this->session->set_userdata($userdata);
			$json['status'] = TRUE;
			$json['msg'] = "Successfully login.";
		}else{
			$json['status'] = FALSE;
			$json['msg'] = "Invalid credentials, Please try again.";
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
}