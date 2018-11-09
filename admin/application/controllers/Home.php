<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {

	public function Index()
	{
		if($this->session->userdata('logueado'))
		{
			$this->load->model("Menu_model");

			$rol = $this->session->userdata('rol');
			if($rol == 2)
			{
			   header('Location: empresas');
			}

			$menus = $this->Menu_model->ObtenerPorRol($rol);

	         $data = array();
	         $data['nombre'] = $this->session->userdata('nombre');
			 $data['menus'] = $menus;
			 
			

			$this->load->view('home', $data);

	         
	         
	    }		
	    else
	    {
	    	header('Location: /admin/login');
	    }

		//$this->load->view("home", $datos);
	}

	public function EnviarPromociones()
	{
		
	}

}






?>