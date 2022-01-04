<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporting extends CI_Controller {
    public function index()
	{
		echo "Not Permitted";
		
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
				if(!empty($_FILES['images']['name'])){
	        		
	        		$img_name 					= time().$_FILES['images']['name'];
	            	$config['file_name']		= str_replace(' ', '_', $img_name);
	            	$config['upload_path']      = './assets/uploads/reports/';
		            $config['allowed_types']    = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG","mp4","MP4");
		            $config['max_size']         = 5000;
		            $config['max_width']        = 5000;
		            $config['max_height']       = 5000;
		            $this->load->library('upload', $config);
		            $this->upload->initialize($config);
		            $image_data = $this->upload->data();
		            $imagename = $image_data['file_name'];
	        	}
	        	else{
	        		$imagename='';
	        	}
	        	if(!empty($_FILES['videos']['name'])){
	        			$videoname='';
	        			$vid_name 					= time().$_FILES['videos']['name'];
	            		$config2['file_name']		= str_replace(' ', '_', $vid_name);
	            		$config2['upload_path']     = './assets/uploads/reports/';
		                $config2['allowed_types']   = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG","mp4","MP4");
		                $config2['max_size']        = 5000;
		                $config2['max_width']       = 5000;
		                $config2['max_height']      = 5000;
		                $this->load->library('upload', $config2);
		                $this->upload->initialize($config2);
		                $video_data = $this->upload->data();
		                $videoname = $video_data['file_name'];
	        	}
	        	else{
	        		$videoname='';
	        	}

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
					'images' => $imagename,
					'videos' => $videoname,
					'remarks' => $this->input->post('remarks'),
					'submitter_name' => $this->input->post('submitter_name'),
					'submitter_designation' => $this->input->post('submitter_designation'),
					'submitter_email' => $this->input->post('submitter_email'),
					'ip_address'=> $ip
				);
				// $this->reporting_model->insert_report($data);
				// $this->upload_videos($videoname);
				// $this->upload_images($imagename);
				$this->sendmail($data);
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
	function test_mail(){
		$report_id = "JCI-".mdate('%d%m%Y%H%i').rand(10000,99999);
		$this->sendmail($report_id);
	}
	function sendmail($data){
		$this->load->model('email_model');
		$email_data = $this->email_model->get_sender();
		foreach ($email_data as $row) {
			$email_id = $row->email_id;
			$password = $row->password;
			$sender = $row->sender;
			$smtp_port = $row->smtp_port;
			$smtp_server = $row->smtp_server;
		}
		$report_id = $data['report_id'];
		echo $email_id;
		echo "<br>";
		echo $report_id;
		echo "<pre>";
		print_r($data);
		$to = "vjnimje@yahoo.com";
		$cc = "vijay.nimje@adikar.com";
		$subject = "Email Test from website";
		$emailContent = "hello".$data['region_head'];
		$this->load->library('email');
		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = $smtp_server;
		$config['smtp_port'] = $smtp_port;
		$config['smtp_timeout'] = '60';
		
		$config['smtp_user'] = $email_id;
		$config['smtp_pass'] = $password;
		$config['charset'] = 'utf-8';
		$config['newline'] = "\r\n";
		$config['validation'] = TRUE;
		
		$this->email->initialize($config);
		$this->email->from($email_id);
		$this->email->to($to);
		$this->email->cc($cc);
		$this->email->subject($subject);
		$this->email->message($emailContent);
		$this->email->send();
	}
	function upload_videos($videoname){
		$config2['file_name']			= $videoname;
		$config2['upload_path']          = './assets/uploads/reports/';
        $config2['allowed_types']        = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG","mp4","MP4");
        $config2['max_size']             = 5000;
        $config2['max_width']            = 5000;
        $config2['max_height']           = 5000;

        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);
        if ( ! $this->upload->do_upload('videos'))
        {
           	$error = array('error' => $this->upload->display_errors());
            $this->load->view('user/error_report', $error);
        }
        else
        {
        	$this->session->set_flashdata('success_msg', 'Report Added Sucessfully');
            $this->final_report();
        }
	}
	function upload_images($imagename){
		$config['file_name']			= $imagename;
		$config['upload_path']          = './assets/uploads/reports/';
        $config['allowed_types']        = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG","mp4","MP4");
        $config['max_size']             = 5000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('images'))
        {
           	$error = array('error' => $this->upload->display_errors());

            $this->load->view('user/error_report', $error);
        }
        else
        {
        	$this->session->set_flashdata('success_msg', 'Report Added Sucessfully');
            $this->final_report();
        }
	}
	
	function final_report(){
		$this->load->view('user/final_report');
	}
	function error_report(){
		$this->load->view('user/error_report');
	}
}