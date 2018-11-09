<?php

class Usuario_model extends CI_model
{
	function __construct()
	{
		$this->load->database();
		$this->load->helper("funciones_generales_helper");
	}


	public function ObtenerPorUsername($username)
	{
		$query = "SELECT * from tb_usuario where rut = '$username' ";

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

	public function ActualizarPass($pass, $primera, $claveinicial, $idusuario)
	{
		$data = array(
			'pass' => $pass,
			'clave_inicial' => $primera,
			'EsPrimeraSession' => $claveinicial
		);

		$this->db->where('IDUsuario', $idusuario);
		$this->db->update('tb_usuario', $data); 
	}

	

}

	?>