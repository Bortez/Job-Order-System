<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller{
	function index(){
		$this->main();
	}
	private function main(){
		$this->load->view('container');
	}
}