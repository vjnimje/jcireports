<?php
	class Entries_model extends CI_Model{
		function get_entries(){
			$query = $this->db->get('jci_reports');  
         	return $query;
		}
	}