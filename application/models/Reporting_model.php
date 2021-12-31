<?php
	class Reporting_model extends CI_Model{
		function get_regions(){
			$query = $this->db->get('jci_regions');  
         	return $query;
		}
		function fetch_loms($region_id)
		{
		$query = $this->db->get_where('jci_loms', array('region_id' => $region_id));
		return $query->result();
		}
		function get_lom_name($region_id, $lom_id)
		{
		$query = $this->db->get_where('jci_loms', array('region_id' => $region_id, 'lom_id' => $lom_id));
		return $query->result();
		}
		function fetch_head($region_id){
			$query = $this->db->get_where('jci_regions', array('region_id' => $region_id));
			return $query->result();
		}
	}