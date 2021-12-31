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
}