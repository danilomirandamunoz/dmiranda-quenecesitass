<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Cercanos extends CI_Controller {

	public function Index()
	{
		$this->load->view("cercanos");
	}

	public function Busqueda()
	{
		$this->load->helper("funciones_generales_helper");

		$param =  $this->input->post("param");
		$comuna =  $this->input->post("comuna");
		$latitud =  $this->input->post("latitud");
		$longitud =  $this->input->post("longitud");

		$this->load->model("Empresa_model");


		$result = $this->Empresa_model->ObtenerCercanas($param, $comuna, $latitud, $longitud);

		for ($i = 0; $i < count($result); $i++)
	    {
	        
	        $result[$i]["url"] = "/portal/local/".$result[$i]["codigo"]."";
	    }


		$ObjetoRespuesta["codigo"] = 0;
	    $ObjetoRespuesta["data"] = $result;
		echo json_encode($ObjetoRespuesta);
	}



}






?>