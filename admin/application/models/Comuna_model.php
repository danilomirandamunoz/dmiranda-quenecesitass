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

	function ObtenerPorRegion($idRegion)
	{
		$sql = "SELECT * FROM  tb_comuna where id_region = $idRegion and vigente= 1";

		$query=$this->db->query($sql);

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