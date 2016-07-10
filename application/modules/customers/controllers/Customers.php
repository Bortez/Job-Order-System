<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends MY_Controller{
	function __construct(){
		parent::__construct();
		/* load model */
		$this->load->model('customers_model','item');
	}
	function index(){
		$this->grid();
	}
	private function grid(){
		$data = array();
		$data['content'] = $this->load->view('grid/grid','',TRUE);
		$this->load->view('grid/container',$data);
	}
	public function add(){
		$data = array();
		$data['content'] = $this->load->view('form/form',array('type'=>'add'),TRUE);
		$this->load->view('form/container',$data);
	}
	public function edit(){
		$data = array();
		$id = $this->uri->segment(3);
		if($id){
			$data['content'] = $this->load->view('form/form',array('type'=>'edit','data'=>$this->get_edited($id)),TRUE);;
			$this->load->view('form/container',$data);
		}else{
			show_404();
		}
		
	}
	private function get_edited($id){
		$collection = $this->item->get_collection($id);
		if($collection){
			$return = array();

			return $collection->row_array();
		}else{
			show_404();
		}
	}
	public function view(){
		$data = array();
		$id = $this->uri->segment(3);
		if($id){
			$data['content'] = $this->load->view('form/form',array('type'=>'view','data'=>$this->get_edited($id)),TRUE);;
			$this->load->view('form/container',$data);
		}else{
			show_404();
		}
	}
	public function save(){
		$post = $this->input->post();
		$json = array();

		$process_jo = $this->item->insert($post);


		if($process_jo){
			$json['status'] = TRUE;
			$json['msg'] = "Data successfully added.";
		}else{
			$json['status'] = FALSE;
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	public function update(){
		$id = $this->uri->segment(3);
		$post = $this->input->post();
		$json = array();

		$process_jo = $this->item->update($id,$post);

		if($process_jo){
			$json['status'] = TRUE;
			$json['msg'] = "Data successfully updated.";
		}else{
			$json['status'] = FALSE;
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	public function remove(){
		$id = $this->uri->segment(3);
		$json = array();

		$delete = $this->item->delete($id);

		if($delete){
			$json['status'] = TRUE;
			$json['msg'] = "Data successfully removed.";
		}else{
			$json['status'] = FALSE;
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	public function get_records(){

		$column = array('name','email','address','telephone');
		$main = array();
		$json = array();

		$collection = $this->item->get_collection();
		if($collection){
			$i = 0;
			foreach($collection->result_array() as $row){
				$id = $row['row_id'];
				foreach($row as $k=>$v){
					if(in_array($k,$column)){
						$json[$i][$k] = $v;
					}
				}

				if($this->sess_acces == 1 || $this->sess_acces == 2){
					$json[$i]["actions"] = '<a onClick="Global.delete_data(this,\'customers\')" row_id="'.$id.'" class="btn default btn-xs red remove" data-toggle="confirmation" data-placement="left" data-original-title="Are you sure ?"><i class="fa fa-trash"></i> Remove </a>
										<a class="btn default btn-xs purple" href="'.base_url('customers/edit/'.$id).'"><i class="fa fa-edit"></i> Edit </a>';
				}else{
					$json[$i]["actions"] = '';
				}
			

				$i++;
			}
		}

		$main['data'] = $json;
		
		$this->output->set_content_type('application/json')->set_output(json_encode($main));
	}
}