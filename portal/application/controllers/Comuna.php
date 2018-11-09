<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Comuna extends CI_Controller {

	public function CargarComunasAutocompletado()
	{
		$this->load->model("Comuna_model");
		
		$result = $this->Comuna_model->ObtenerComunas();

		$resultAux = array();
		

		foreach ($result as $key)
		{
			array_push($resultAux, $key["nombre"]);
		}

		echo json_encode($resultAux);
	}
}






?>