<?php

class EmpresaImagen_model extends CI_model
{
	function __construct()
	{
		$this->load->database();
	}


	function ObtenerPorIDEmpresa($idEmpresa)
	{
		$query = "SELECT 
            *
            from tb_empresa_imagen e
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

	function Guardar($id_empresa, $imagen)
	{
	
		$array = array(
			'id_empresa' => $id_empresa,
			'url_imagen' => $imagen
		);

		$this->db->set($array);
		$this->db->insert('tb_empresa_imagen');
		
		if($this->db->affected_rows() >0)
		{
			return $this->db->insert_id();
		}
		else
		{
			return 0;
		} 
	}

	function ObtenerPorID($id)
	{
		$query = "SELECT 
            *
            from tb_empresa_imagen e
            where e.id_empresa_imagen = ". $id;


		$query=$this->db->query($query);

		if($query->num_rows() >0)
		{
		 	return $query->row();
		}
		else
		{
		 	return null;
		} 
	}

	function Eliminar($id)
	{
		$this->db->where('id_empresa_imagen', $id);
		$this->db->delete('tb_empresa_imagen');

		if($this->db->affected_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	


}



?>