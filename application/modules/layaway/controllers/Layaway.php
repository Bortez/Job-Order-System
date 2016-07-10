<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Layaway extends MY_Controller{
	function __construct(){
		parent::__construct();
		/* load model */
		$this->load->model('layaway_model','item');
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

		$column = array('name','description','status');
		$main = array();
		$json = array();
		$status = array(
			'<span class="label label-sm label-info">Active</span>',
			'<span class="label label-sm label-danger">Canceled</span>',
			'<span class="label label-sm label-success">Claimed</span>',
		);

		$collection = $this->item->get_collection();

		
		if($collection){
			$i = 0;
			foreach($collection->result_array() as $row){
				$id = $row['row_id'];
				foreach($row as $k=>$v){
					if(in_array($k,$column)){
						
						if($k == "status"){
							$json[$i][$k] = $status[$v];
						}else{
							$json[$i][$k] = $v;
						}
					}
				}

				$payment = $this->item->get_payment($id);


				// var_dump($payment);
				// die;
				//if($payment){
					$json[$i]['or_number'] = $payment['or_number'] ? $payment['or_number'] : 'N/A';
					$json[$i]['date'] = $payment['payment_date'] ? date("F j, Y",strtotime($payment['payment_date'])) : 'N/A';
					$json[$i]['amount'] = $payment['total_amount'] ? '&#8369; '.number_format($payment['total_amount'],2) : 'N/A';
				//}

				if($this->sess_acces == 1 || $this->sess_acces == 2){
				$json[$i]["actions"] = '<a onClick="Global.delete_data(this,\'layaway\')" row_id="'.$id.'" class="btn default btn-xs red remove" data-toggle="confirmation" data-placement="left" data-original-title="Are you sure ?"><i class="fa fa-trash"></i> Remove </a>
										<a class="btn default btn-xs purple" href="'.base_url('layaway/edit/'.$id).'">Edit </a>
										<a class="btn default btn-xs" href="'.base_url('layaway/view/'.$id).'">View </a>';
				}else{
					$json[$i]["actions"] = '<a class="btn default btn-xs" href="'.base_url('layaway/view/'.$id).'">View </a>';
				}				

				$i++;
			}
		}

		$main['data'] = $json;
		
		$this->output->set_content_type('application/json')->set_output(json_encode($main));
	}
	public function add_payment(){
		$post = $this->input->post();
		$json = array();

		if(empty($post['amount']) && empty($post['or_number']) && empty($post['payment_date	']))
		{
			$json['status'] = FALSE;
			$json['msg'] = "All fields are required.";
		}
		else
		{
			if(intval($post['amount']))
			{
				$post['lay_away_id'] = $this->uri->segment(3);

				if($this->item->add_payment($post))
				{
					$json['status'] = TRUE;
					$json['msg'] = 'Data successfully added.';
				}
				else
				{
					$json['status'] = FALSE;
					$json['msg'] = 'There was an error during the transaction. Please check your internet connection.';
				}
			}
			else
			{
				$json['status'] = FALSE;
				$json['msg'] = 'amount should be integer or decimal.';
			}
		}

		

		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
	public function update_payment(){
		$post = $this->input->post();

		$up = $this->item->update_payment($post);
		

		$this->output->set_content_type('application/json')->set_output(json_encode(array(
			'status'=>TRUE,
			'total'=>number_format($up['total_amount'],2),
			'date'=> date("F j, Y",strtotime($post['payment_date']))
		)));
	}
	public function delete_payment(){
		$post = $this->input->post();
		$json = array();

		$delete = $this->item->delete_payment($post);
		if($delete['status']){
			if($delete['recent']){
				$json['status'] = TRUE;
				$json['total_amount'] = $delete['recent']['total_amount'];
			}else{
				$json['status'] = TRUE;
				$json['total_amount'] = 0;
			}
		}else{
			$json['status'] = FALSE;
		}
		
		$this->output->set_content_type('application/json')->set_output(json_encode($json));
	}
}