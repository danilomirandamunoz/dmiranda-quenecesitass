<?php

class Categoria_model extends CI_model
{
	function __construct()
	{
		$this->load->database();
	}


	function CategoriasObtener()
	{
		$query = $this->db->get("tb_categoria");
		return $query->result_array();
	}

	


}



?>