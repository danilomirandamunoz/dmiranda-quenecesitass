<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Local extends CI_Controller {

	public function Index($nombre= null)
	{
		if($nombre != null)
		{
			$this->load->helper('funciones_generales_helper');
			$this->load->model("Empresa_model");
			$this->load->model("Tag_model");
			$this->load->model("EmpresaProducto_model");


			$empresa = $this->Empresa_model->ObtenerPorCodigo($nombre);

			//echo var_dump($empresa);

			$id = $empresa['id_empresa'];
			
			$tags = $this->Tag_model->ObtenerPorEmpresa($id);
			$productos = $this->EmpresaProducto_model->ObtenerPorEmpresa($id);

			$datos = array(
	    	
	    		'empresa' => $empresa,
	    		'tags' => $tags,
				'productos' => $productos,
				'urlRedesSociales' => currentPageURL()
	    	);

			$this->load->view("local", $datos);
		}
		else
		{
			$this->load->view("404");
		}
	}


	public function Detalle()
	{

		$idEmpresa =  $this->input->post("id");
		$this->load->model("Empresa_model");
		$this->load->model("EmpresaDireccion_model");
		$this->load->model("EmpresaImagen_model");


		$empresa = $this->Empresa_model->ObtenerPorID($idEmpresa);

		$ObjetoRespuesta["codigo"] = 0;
		$ObjetoRespuesta["Direcciones"] = $this->EmpresaDireccion_model->ObtenerPorIDEmpresa($empresa->id_empresa);
        
        $imagenes = $this->EmpresaImagen_model->ObtenerPorIDEmpresa($empresa->id_empresa);
		
        
        // for ($i = 0; $i < count($imagenes); $i++)
        // {
	        
        //     $imagenes[$i]["url_imagen"] = $this->config->item('base_url')."portal/".$imagenes[$i]["url_imagen"]."";
        // }
        
        $ObjetoRespuesta["Imagenes"] = $imagenes;
        
	    $ObjetoRespuesta["data"] = $empresa;

		echo json_encode($ObjetoRespuesta); 

	}


}






?>