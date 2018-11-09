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
            *
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

	public function Obtener()
	{
		$query = $this->db->get("tb_tag");
		return $query->result_array();
	}

	function Eliminar($id)
	{
		$this->db->where('id_empresa_tag', $id);
		$this->db->delete('tb_empresa_tag');

		if($this->db->affected_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function GuardarTagEmpresa($id_empresa, $id_tag)
	{
	
		$array = array(
			'id_empresa' => $id_empresa,
			'id_tag' => $id_tag
		);

		$this->db->set($array);
		$this->db->insert('tb_empresa_tag');
		
		if($this->db->affected_rows() >0)
		{
			return $this->db->insert_id();
		}
		else
		{
			return 0;
		} 
	}
	


}



?>