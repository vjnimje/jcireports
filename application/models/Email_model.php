<?php
	class Email_model extends CI_Model{
		function get_sender(){
			$query = $this->db->get('jci_email_data');  
         	return $query->result();
		}
	}