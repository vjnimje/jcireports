<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporting extends CI_Controller {
    public function index()
	{
		$this->load->model('reporting_model');
		$data['regions']= $this->reporting_model->get_regions();
		$this->load->view('user/test',$data);
		
	}
	function get_loms(){
		$region_id = $this->input->post('region_id');
		$this->load->model('reporting_model');
		$lom = $this->reporting_model->fetch_loms($region_id);
		if (count($lom)>0) {

			$pro_select_box .= '';
			echo "<option value=''>Select LOM</option>";
			foreach ($lom as $lom) {
				echo "<option value='".$lom->lom_id."'>".$lom->lom_name."</option>";
			}
			echo json_encode($pro_select_box);
		}
		else{
			$this->session->set_flashdata('error', 'Something is wrong.');
		}
	}
	function test(){
		$region = $this->input->post('region');
		$lom = $this->input->post('lom');
		echo $region;
		echo "<br>";
		echo $lom;
	}
	function report(){
		$region_id = $this->input->post('region');
		$lom_id = $this->input->post('lom');
		$this->load->model('reporting_model');
		$data['lom'] = $this->reporting_model->get_lom_name($region_id, $lom_id);
		$data['head'] = $this->reporting_model->fetch_head($region_id);
		$data['title']="Reporting";
		$data['heading']="Reporting";
		$data['subheading']="JCI Zone IX";
		$this->load->view('user/include/header', $data);
		$this->load->view('user/ins_report');
		$this->load->view('user/include/footer');
	}
	function insert_report(){
		$test="vijay";
		$data = array(
			'region_name' => $this->input->post('region_name'),
			'region_head' => $this->input->post('region_head'),
			'head_email' => $this->input->post('head_email'),
			'lom_name' => $this->input->post('lom_name'),
			'lom_head' => $this->input->post('lom_head'),
			'lom_email' => $this->input->post('lom_email'),
			'project_category' => $this->input->post('project_category'),
			'project_title' => $this->input->post('project_title'),
			'reporting_month' => $this->input->post('reporting_month'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'attended_no' => $this->input->post('attended_no'),
			'budget' => $this->input->post('budget'),
			'under_activity' => $this->input->post('under_activity'),
			'goal' => $this->input->post('goal'),
			'target_population' => $this->input->post('target_population'),
			'purpose' => $this->input->post('purpose'),
			'overview' => $this->input->post('overview'),
			'images' => $this->input->post('images'),
			'videos' => $this->input->post('videos'),
			'remarks' => $this->input->post('remarks'),
			'submitter_name' => $this->input->post('submitter_name'),
			'submitter_designation' => $this->input->post('submitter_designation'),
			'submitter_email' => $this->input->post('submitter_email')
		);
		echo "<pre>";
		print_r($data);
	}
}