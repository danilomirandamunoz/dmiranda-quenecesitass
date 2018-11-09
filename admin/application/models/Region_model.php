<?php

class Region_model extends CI_model
{
	function __construct()
	{
		$this->load->database();
		$this->load->helper("funciones_generales_helper");
	}

	function Obtener()
	{

	    $query = "SELECT * FROM  tb_region where vigente = 1";

     	$query=$this->db->query($query);

		if($query->num_rows() >0)
		{
		 	return $query->result_array();
		}
		else
		{
		 	return null;
		} 
	}





	


}



?>