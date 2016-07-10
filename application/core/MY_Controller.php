<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller{
	public $sess_acces;
	function __construct(){
		parent::__construct();

		$this->sess_acces = $this->encrypt->decode($this->session->access);
	}
	function _remap($method){
		if($this->encrypt->decode($this->session->is_login)){
			if(method_exists($this,$method)){
				
				if($this->encrypt->decode($this->session->access) == 1){
					$this->$method();
					$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
					$this->output->set_header("Pragma: no-cache");	
				}else{
					$controller = $this->uri->segment(1);
					if($controller == "accounts"){
						show_404();
					}else{
						$this->$method();
						$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
						$this->output->set_header("Pragma: no-cache");	
					}
				}

			}else{
				show_404();
			}
		}else{
			redirect('/login/');
		}
	}
}