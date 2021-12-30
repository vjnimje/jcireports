<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function index()
	{
		$this->load->view('user/include/header');
		$this->load->view('user/home');
		$this->load->view('user/include/footer');
	}
}