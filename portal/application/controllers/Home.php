<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {

	public function Index()
	{
		$datos = array(
    	'param' => '',
    		'place' => '',
    		'accion' => ''
    	);
		$this->load->view("home", $datos);
	}

	public function CargarCategoriasDisponibles()
	{
		$this->load->model("Categoria_model");
		$result = $this->Categoria_model->CategoriasObtener();

		$html = "<li id='categoria0' class='categorias active'><a href='javascript:CargarEmpresasCategoria(0,1,1,true,true,true);'> <i class='fa fa-ticket'></i>Todas</a></li>";
	    for ($i = 0; $i < count($result); $i++)
	    {
	        $html .= "<li id='categoria".$result[$i]["id_categoria"]."' class='categorias'><a href='javascript:CargarEmpresasCategoria(".$result[$i]["id_categoria"].",1, 1,true,true,true);'><i class='".$result[$i]["icono"]."'></i>".$result[$i]["nombre"]."</a></li>";
	    }

    	$ObjetoRespuesta["codigo"] = 0;
	    $ObjetoRespuesta["data"] = $html;

		echo json_encode($ObjetoRespuesta);
	}

	public function Busqueda($param= NULL, $comuna = NULL)
	{
		$texto = $param;
	    $comuna = $comuna;
	    $pagina = 1;

	    if($comuna == "todos") $comuna = "";
		if($texto == "todos") $texto = "";

	    $datos = array(
    	
    		'param' => $texto,
    		'place' => $comuna,
    		'accion' => 'busqueda'
    	);

		$this->load->view("home", $datos);
	}


	public function CargarEmpresasCategoria()
	{
		$idCategoria =  $this->input->post("idCategoria");
		$pagina =  $this->input->post("pagina");

		$this->load->model("Empresa_model");
		$this->load->model("EmpresaDireccion_model");

		$result = $this->Empresa_model->ObtenerPorCategoria($idCategoria,$pagina);

	    $registrosObtenidos = $this->Empresa_model->ObtenerNroRegistrosPorCategoria($idCategoria);



	    //echo var_dump($result[0]);
	    $html = "<div class='alert alert-info' role='alert'><strong>Hemos encontrado ".$registrosObtenidos->total." registros para tu b&uacute;squeda. </strong> </div>";
		
		if($registrosObtenidos->total > 0)
		{
			for ($i = 0; $i < count($result); $i++)
			{
				$result[$i]["direcciones"] = $this->EmpresaDireccion_model->ObtenerPorIDEmpresa($result[$i]["id_empresa"]);
	
			   $html .= $this->Empresa_model->ObtenerHtmlEmpresa($result[$i]);
				
			}
		}
		

	    $ObjetoRespuesta["codigo"] = 0;
	    $ObjetoRespuesta["data"] = $html;
	    $ObjetoRespuesta["CantidadRegistros"] = $registrosObtenidos->total;
	    $ObjetoRespuesta["CantidadRegistrosPorPagina"] = CANTIDAD_PRODUCTOS_PAGINA;
		echo json_encode($ObjetoRespuesta);
	}


	public function BuscarEmpresasBuscador()
	{
		$texto = $this->input->post('parametroBusqueda');
	    $comuna = $this->input->post('comuna');
	    $pagina = $this->input->post('pagina');

	    $this->load->model("Empresa_model");
		$this->load->model("EmpresaDireccion_model");

		$result = $this->Empresa_model->ObtenerPorBuscador($texto,$pagina, $comuna);
	    $registrosObtenidos = $this->Empresa_model->ObtenerNroRegistrosPorBuscador($texto, $comuna);
	    $html = "<div class='alert alert-info' role='alert'><strong>Hemos encontrado ".$registrosObtenidos->total." registros para tu b&uacute;squeda. </strong> </div>";

	    for ($i = 0; $i < count($result); $i++)
	    {
	        $result[$i]["direcciones"] = $this->EmpresaDireccion_model->ObtenerPorIDEmpresa($result[$i]["id_empresa"]);

	        $html .= $this->Empresa_model->ObtenerHtmlEmpresa($result[$i]);
	        
	    }

	    $ObjetoRespuesta["codigo"] = 0;
	    $ObjetoRespuesta["data"] = $html;
	    $ObjetoRespuesta["CantidadRegistros"] = $registrosObtenidos->total;
	    $ObjetoRespuesta["CantidadRegistrosPorPagina"] = CANTIDAD_PRODUCTOS_PAGINA;
		echo json_encode($ObjetoRespuesta);
	}

}






?>