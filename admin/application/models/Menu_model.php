<?php

class Menu_model extends CI_model
{
	function __construct()
	{
		$this->load->database();
		$this->load->helper("funciones_generales_helper");
	}

	function ObtenerPorRol($rol)
	{

	    $query = "";
	    
	    if($rol == 1)
	    {
	        $query = "SELECT 
	            e.*
	            from tb_menu e
	            where e.vigente = 1";
	    }
	    else
	    {
	        $query = "SELECT 
	            e.*
	            from tb_menu e
	            where e.vigente = 1
	            and e.rol = $rol";
	    }

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