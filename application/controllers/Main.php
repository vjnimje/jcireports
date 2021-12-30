<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function index()
	{
		$data['title']="Home";
		$data['heading']="JCI Zone IX";
		$data['subheading']="";
		$this->load->view('user/include/header', $data);
		$this->load->view('user/home');
		$this->load->view('user/include/footer');
	}
	public function about()
	{
		$data['title']="About Us";
		$data['heading']="About Us";
		$data['subheading']="JCI Zone IX";
		$this->load->view('user/include/header', $data);
		$this->load->view('user/about');
		$this->load->view('user/include/footer');
	}
	public function reporting()
	{
		$data['title']="Reporting";
		$data['heading']="Reporting";
		$data['subheading']="JCI Zone IX";
		$this->load->view('user/include/header', $data);
		$this->load->view('user/reporting');
		$this->load->view('user/include/footer');
	}
	public function careers()
	{
		$data['title']="Careers";
		$data['heading']="Careers";
		$data['subheading']="JCI Zone IX";
		$this->load->view('user/include/header', $data);
		$this->load->view('user/careers');
		$this->load->view('user/include/footer');
	}
	public function contact()
	{
		$data['title']="Contact Us";
		$data['heading']="Contact Us";
		$data['subheading']="JCI Zone IX";
		$this->load->view('user/include/header', $data);
		$this->load->view('user/contact');
		$this->load->view('user/include/footer');
	}
}