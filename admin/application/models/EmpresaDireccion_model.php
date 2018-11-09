<?php

class EmpresaDireccion_model extends CI_model
{
	function __construct()
	{
		$this->load->database();
	}


	function ObtenerPorIDEmpresa($idEmpresa)
	{
		$query = "SELECT 
            *
            from tb_empresa_direccion e
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

	function ObtenerPorID($id)
	{
		$query = "SELECT 
            *
            from tb_empresa_direccion e
            where e.id_empresa_direccion = ". $id;


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

	function Guardar($idEmpresaDireccion,$region,$comuna,$calle,$numero,$departamento,$piso,$emails,$telefonos,$latitud,$longitud,$idEmpresa,$nombreComuna, $nombreRegion)
{
	$sql = "";
	
	$array = array(
		'id_empresa' => $idEmpresa,
		'calle' => $calle,
		'numero' => $numero,
		'departamento' => $departamento,
		'piso' => $piso,
		'id_comuna' => $comuna,
		'id_region' => $region,
		'telefonos' => $telefonos,
		'emails' => $emails,
		'latitud' => $latitud,
		'longitud' => $longitud,
		'comuna_nombre' => $nombreComuna,
		'region_nombre' => $nombreRegion,
	);
    
    if($idEmpresaDireccion == 0)
    {
        // $sql = "INSERT INTO `tb_empresa_direccion`
        // (`id_empresa_direccion`, `id_empresa`, `calle`, `numero`, 
        // `departamento`, `piso`, `id_comuna`, `id_region`, `telefonos`, `emails`, `latitud`, `longitud`, 
        // `comuna_nombre`, `region_nombre`) 
        // VALUES (null,$idEmpresa,'$calle','$numero','$departamento','$piso',$comuna,
		// $region,'$telefonos','$emails','$latitud','$longitud','$nombreComuna','$nombreRegion')";
		
		

		$this->db->set($array);
		$this->db->insert('tb_empresa_direccion');


    }
    else{
        
        // $sql = "UPDATE 
        // `tb_empresa_direccion`
        // SET `id_empresa`=$idEmpresa,`calle`='$calle',`numero`='$numero',
        // `departamento`='$departamento',`piso`='$piso',`id_comuna`=$comuna,`id_region`=$region,`telefonos`='$telefonos',
        // `emails`='$emails',`latitud`='$latitud',`longitud`='$longitud',`comuna_nombre`='$nombreComuna',`region_nombre`='$nombreRegion' 
		// WHERE id_empresa_direccion = $idEmpresaDireccion";
		

		$this->db->where('id_empresa_direccion', $idEmpresaDireccion);
		$this->db->update('tb_empresa_direccion', $array);

    }

	if($this->db->affected_rows() >0)
	{
		if($idEmpresaDireccion == 0)
		{
			$idEmpresaDireccion = $this->db->insert_id();
		}
	}
	else
	{
		return 0;
	} 

	return $idEmpresaDireccion;
}

function Eliminar($id)
{
	$this->db->where('id_empresa_direccion', $id);
	$this->db->delete('tb_empresa_direccion');

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