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

	function Guardar($id_empresa, $nombre, $imagen)
	{
	
		$array = array(
			'id_empresa' => $id_empresa,
			'nombre' => $nombre,
			'imagen' => $imagen
		);

		$this->db->set($array);
		$this->db->insert('tb_empresa_producto');
		
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
            from tb_empresa_producto e
            where e.id_empresa_producto = ". $id;


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
		$this->db->where('id_empresa_producto', $id);
		$this->db->delete('tb_empresa_producto');

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