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


}
