<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link_m extends CI_Model {
		
	function get_url($kode)
	{
		$this->db->from('tb_link');
		$this->db->where('kode',$kode);
		$query = $this->db->get();
		return $query;
	}

	function simpan($post)
	{		  
	  $params['id'] =  "";	    
	  $params['kode'] =  $post['kode'];	  
	  $params['link'] =  $post['link'];	  
	  $params['created'] =  date("Y-m-d H:i:sa");	  
	  $this->db->insert('tb_link',$params);
	}

	function countTotalLink()
	{
		$this->db->from("tb_link");
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function countTotalHits()
	{
		$this->db->from("tmp_link_hits");
		$query = $this->db->get()->num_rows();
		return $query;
	}

	function saveHits($link)
	{		  
	  $params['id'] =  "";	    
	  $params['ip'] =  $this->input->ip_address();	  
	  $params['link_id'] =  $link;	  
	  $params['created'] =  date("Y-m-d H:i:sa");	  
	  $this->db->insert('tmp_link_hits',$params);
	}


}
