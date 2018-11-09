<?php

class EmpresaProducto_model extends CI_model
{
	function __construct()
	{
		$this->load->database();
	}


	public function ObtenerPorEmpresa($idEmpresa)
	{
		$query = "SELECT 
            *
            from tb_empresa_producto e
            where e.id_empresa = ". $idEmpresa;


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