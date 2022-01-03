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
	// function test(){
	// 	$region = $this->input->post('region');
	// 	$lom = $this->input->post('lom');
	// 	echo $region;
	// 	echo "<br>";
	// 	echo $lom;
	// }
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
		//CHECK PREFILLD VALUES
		$this->form_validation->set_rules("region_name", "Region Name", 'required');
		$this->form_validation->set_rules("lom_name", "Lom Name", 'required');
		if ($this->form_validation->run()) {
				//CHECK FORM VALIDATIONS
			$this->form_validation->set_rules("project_category", "Project Category", 'required');
			$this->form_validation->set_rules("project_title", "Project Title", 'required');
			$this->form_validation->set_rules("start_date","Start Date",'required');
			$this->form_validation->set_rules("end_date","End Date",'required');
			$this->form_validation->set_rules("attended_no"," Members Attended",'required|numeric');
			$this->form_validation->set_rules("budget","Budget",'numeric');
			$this->form_validation->set_rules("under_activity","Activity/Events under ZP Plan of Action",'required');
			$this->form_validation->set_rules("goal","Sustainable Development Goal ",'required');
			$this->form_validation->set_rules("target_population","Target Population",'required|numeric');
			$this->form_validation->set_rules("overview","Overview",'required');
			$this->form_validation->set_rules("purpose","Purpose",'required');
			// $this->form_validation->set_rules("images","Event Images ",'file_required');
			$this->form_validation->set_rules("submitter_name","Report Submitter Name",'required');
			$this->form_validation->set_rules("submitter_designation","Report Submitter Designation",'required');
			$this->form_validation->set_rules("submitter_email","Report Submitter Email",'required|valid_email');
			if($this->form_validation->run()){
				$activity = $this->input->post('under_activity');
				$other_under_activity = $this->input->post('other_under_activity');
				if ($activity == 'Yes') {
					$under_activity = 'Yes';
				}elseif ($activity == 'No') {
					$under_activity = 'No';
				}else{
					$under_activity = $activity."-".$other_under_activity;
				}
				date_default_timezone_set("Asia/Kolkata");
				$report_id = "JCI-".mdate('%d%m%Y%H%i').rand(10000,99999);
				$ip = $_SERVER['REMOTE_ADDR'];


				$data = array(
					'report_id'=>$report_id,
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
					'under_activity' => $under_activity,
					'goal' => $this->input->post('goal'),
					'target_population' => $this->input->post('target_population'),
					'purpose' => $this->input->post('purpose'),
					'overview' => $this->input->post('overview'),
					'images' => $this->input->post('images'),
					'videos' => $this->input->post('videos'),
					'remarks' => $this->input->post('remarks'),
					'submitter_name' => $this->input->post('submitter_name'),
					'submitter_designation' => $this->input->post('submitter_designation'),
					'submitter_email' => $this->input->post('submitter_email'),
					// 'ip_address'=> $ip
				);
				$this->reporting_model->insert_report($data);
				$this->session->set_flashdata('success_msg', 'Report Added Sucessfully');
				// echo "<pre>";
				// print_r($data);
			}
			else{

				$this->report();
			}
		}
		else{
		echo "prefilled Values not found";
			
		}
	}
	function sendmail(){
		$this->load->model('email_model');
		$data = $this->email_model->get_sender();
		foreach ($data as $row) {
			$email_id = $row->email_id;
			$password = $row->password;
			$sender = $row->sender;
			$smtp_port = $row->smtp_port;
			$smtp_server = $row->smtp_server;
		}
	}
	function upload_images(){

	}
	function upload_videos(){

	}
}