<?php

class Comuna_model extends CI_model
{
	function __construct()
	{
		$this->load->database();
	}


	public function ObtenerComunas()
	{
		$query = $this->db->get("tb_comuna");
		return $query->result_array();
	}

	


}



?>