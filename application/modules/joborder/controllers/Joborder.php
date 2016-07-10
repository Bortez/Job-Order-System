<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Joborder extends MY_Controller{
	function __construct(){
		parent::__construct();
		/* load model */
		$this->load->model('joborder_model','jo');
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
		$collection = $this->jo->get_collection($id);
		if($collection){
			$return = array();

			$row = $collection->row();

			$return['customer_id'] = $row->customer_id;
			$return['row_id'] = $row->row_id;

			$meta = $this->jo->get_meta($row->row_id);


			foreach($meta->result() as $meta_row){
				$return[$meta_row->meta_field] = $meta_row->meta_value;
			}

			return $return;
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

		$post['status_id'] = 1; /* set status meta to default */	

		$process_jo = $this->jo->insert(elements(array('customer_id'),$post));


		if($process_jo){

			$process_status = $this->jo->insert_status($process_jo,elements(array('remarks','status_id'),$post));

			if($process_status){
				unset($post['customer_id']);
				$metadata = array();

				foreach($post as $key=>$value) {
					$metadata[] = array(
						'reference_id'=>$process_jo,
						'meta_field'=>$key,
						'meta_value'=>$value
					);
				}

				$process_meta = $this->jo->insert_meta($metadata);

				if($process_meta){
					$json['status'] = TRUE;
					$json['msg'] = "Data successfully added.";
				}else{
					$json['status'] = FALSE;
				}
			}
		}else{
			$json['status'] = FALSE;
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	public function update(){
		$id = $this->uri->segment(3);
		$post = $this->input->post();
		$json = array();

		$process_jo = $this->jo->update($id,elements(array('customer_id'),$post));

		if($process_jo){

			$process_status = $this->jo->update_status($id,elements(array('remarks','status_id'),$post));

			if($process_status){
				unset($post['customer_id']);
				$metadata = array();

				foreach($post as $key=>$value) {
					$metadata[] = array(
						'reference_id'=>$id,
						'meta_field'=>$key,
						'meta_value'=>$value
					);
				}

				$process_meta = $this->jo->update_meta($metadata);

				if($process_meta){
					$json['status'] = TRUE;
					$json['msg'] = "Data successfully updated.";
				}else{
					$json['status'] = FALSE;
				}
				
			}
		}else{
			$json['status'] = FALSE;
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	public function remove(){
		$id = $this->uri->segment(3);
		$json = array();

		$delete = $this->jo->delete($id);

		if($delete){
			$json['status'] = TRUE;
			$json['msg'] = "Data successfully removed.";
		}else{
			$json['status'] = FALSE;
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	public function print_preview(){
		$id = $this->uri->segment(3);	
		$data = array();
		$data['content'] = $this->load->view('print/print',array('data'=>$this->get_edited($id)),TRUE);
		$this->load->view('print/container',$data);
	}
	public function get_records(){

		$column = array('name','jo_number','serial','model','brand','date_due','costing','status_id');
		$status = array(
			'',
			'<span class="label label-sm label-warning">pending</span>',
			'<span class="label label-sm label-success">completed</span>',
			'<span class="label label-sm label-success">released</span>',
			'<span class="label label-sm label-success">pullout</span>',
			'<span class="label label-sm label-success">paid</span>',
			'<span class="label label-sm label-warning">collectable</span>',
			'<span class="label label-sm label-info">on-process</span>',
			'<span class="label label-sm label-danger">follow-up</span>'
		);
		$main = array();
		$json = array();

		$collection = $this->jo->get_collection();
		if($collection){
			$i = 0;
			foreach($collection->result() as $row){
				$id = $row->row_id;
				$json[$i]["name"] = $row->name;
				$meta = $this->jo->get_meta($id);	

				foreach($meta->result() as $meta_row){
					$field = $meta_row->meta_field;
					$value = $meta_row->meta_value;
					if(in_array($field,$column)){
						if($field == "status_id"){
							$json[$i][$field] = $status[$value];
						}elseif($field == "costing"){
							$json[$i][$field] = '&#8369; '.number_format($value,2);
						}elseif($field == "date_due"){
							$json[$i][$field] = $value ? date("F j, Y",strtotime($value)) : 'N/A';
						}else{
							$json[$i][$field] = $value ? $value : 'N/A';
						}
					}
				}
				if($this->sess_acces == 1 || $this->sess_acces == 2){
				$json[$i]["actions"] = '<a onClick="Global.delete_data(this,\'joborder\')" row_id="'.$id.'" class="btn default btn-xs red remove" data-toggle="confirmation" data-placement="left" data-original-title="Are you sure ?"><i class="fa fa-trash"></i> Remove </a>
										<a class="btn default btn-xs purple" href="'.base_url('joborder/edit/'.$id).'"><i class="fa fa-edit"></i> Edit </a> 
										<a target="_blank" class="btn default btn-xs blue" href="'.base_url('joborder/print_preview/'.$id).'"><i class="fa fa-print"></i> Print </a>
										<a class="btn default btn-xs gray" href="'.base_url('joborder/view/'.$id).'">View </a>';
				}else{
					$json[$i]["actions"] = '<a class="btn default btn-xs gray" href="'.base_url('joborder/view/'.$id).'">View </a>';
				}						
				$i++;
			}
		}

		$main['data'] = $json;
		
		$this->output->set_content_type('application/json')->set_output(json_encode($main));
	}
}