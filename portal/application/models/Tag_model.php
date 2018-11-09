<?php

class Tag_model extends CI_model
{
	function __construct()
	{
		$this->load->database();
	}


	public function ObtenerPorEmpresa($idEmpresa)
	{
		$query = "SELECT 
            t.id_tag, t.nombre
            from tb_empresa_tag e
            inner join tb_tag t on e.id_tag = t.id_tag
            where e.id_empresa = $idEmpresa";

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