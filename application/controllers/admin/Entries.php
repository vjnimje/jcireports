<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entries extends CI_Controller {
    public function index(){
    	$this->load->model('entries_model');
    	$data['entries'] = $this->entries_model->get_entries();
    	$this->load->view('admin/view_reports', $data);

    }
}