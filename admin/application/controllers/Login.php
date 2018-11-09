<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

	public function Index()
	{
		$this->load->helper("funciones_generales_helper");
		// echo 1234;
		// echo "______";
		// echo crearParametroUrl("1234");
		// echo "______";
        //echo desencriptarParametroURL(crearParametroUrl("1234"));
		//echo $this->config->item('base_url');
		if($this->session->userdata('logueado'))
		{
			   header('Location: home');
			}


        $this->load->view("login");
	}

	public function Validar()
	{
		$this->load->model("Usuario_model");

		$username =  $this->input->post("username");
		$password =  $this->input->post("password");
        $ObjetoRespuesta = [];

		if (empty($username) || empty($password)) 
	    {
			$ObjetoRespuesta["URL"] = "";
			$ObjetoRespuesta["Mensaje"] = "Usuario y/o Contraseña Vacias";
			$ObjetoRespuesta["Codigo"] = 1;
		} 
		else 
		{
			// To protect MySQL injection for Security purpose
			//$username = stripslashes($username);
			//$password = stripslashes($password);
	        
	        //Log_Guardar("Login","Login","Se intento logear usuario:".$username,2);
	        
			$usuario = $this->Usuario_model->ObtenerPorUsername($username);

			//var_dump($usuario);

			if(!$usuario)
			{
				$ObjetoRespuesta["URL"] = "";
				$ObjetoRespuesta["Mensaje"] = "Usuario y/o Contraseña Incorrectos";
				$ObjetoRespuesta["Codigo"] = 1;
			}
			else
			{
				if($usuario->vigente != 1)
				{
					$ObjetoRespuesta["URL"] = "";
                	$ObjetoRespuesta["Mensaje"] = "El Usuario se encuentra inactivo";
                	$ObjetoRespuesta["Codigo"] = 1;
				}
				else
				{
					if($usuario->EsPrimeraSession == 1)
					{
						if($usuario->clave_inicial == $password) 
	                    {
                            //$this->load->model("Institucion_model");
                            //$resultInst = $this->Institucion_model->ObtenerPorId($usuario->id_institucion);
                            $usuario_data = array(
                                                           'nombre' => $usuario->rut
                                                           //'id_institucion' => $usuario->id_institucion,
                                                           //'institucion' => $resultInst,
                                                        );


	                    	$usuario->logeado = TRUE;
	                        $this->session->set_userdata($usuario_data);
	                        $_SESSION['start'] = time();
	                        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);

                            $ObjetoRespuesta["URL"] = $this->config->item('base_url')."admin/login/cambiarpass";;
	                        $ObjetoRespuesta["Mensaje"] = "ok";
	                        $ObjetoRespuesta["Codigo"] = 0;

	                    }
	                    else
	                    {
	                        //Log_Guardar("Login","Login","Se logeo usuario:".$username." primera session clave incorrecta",2);
	                        
	                        $ObjetoRespuesta["URL"] = "";
	                        $ObjetoRespuesta["Mensaje"] = "Usuario y/o Contraseña Incorrectos";
	                        $ObjetoRespuesta["Codigo"] = 1;
	                        
	                    }
					}
					else
					{
						if(crypt($password, $usuario->pass) == $usuario->pass) 
	                    {
	                        //Log_Guardar("Login","Login","Logeo usuario:".$username." correcto",2);
                            
                            //$this->load->model("Institucion_model");
                            //$resultInst = $this->Institucion_model->ObtenerPorId($usuario->id_institucion);
                            
	                    	$usuario_data = array(
				               'id' => $usuario->IDUsuario,
							   'nombre' => $usuario->rut,
							   'nombre_completo' => $usuario->Nombres." ".$usuario->PrimerApellido." ".$usuario->SegundoApellido,
				               'rol' => $usuario->rol,
                               'id_empresa' => $usuario->id_empresa,
                               //'institucion' => $resultInst,
				               'logueado' => TRUE
				            );
	                    	$this->session->set_userdata($usuario_data);
	              

	                        $_SESSION['start'] = time();
	                        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
	                        $ObjetoRespuesta['URL']=$this->config->item('base_url')."admin/home";
	                        $ObjetoRespuesta['Codigo']= 0;

	                        
	                    }
	                    else
	                    {
	                        //Log_Guardar("Login","Login","Logeo usuario:".$username." contrasena incorrecta",2);
	                        $ObjetoRespuesta["URL"] = "";
	                        $ObjetoRespuesta["Mensaje"] = "Usuario y/o Contraseña Incorrectos";
	                        $ObjetoRespuesta["Codigo"] = 1;
	                        
	                    }
					}
				}
			}


	    }

	    echo json_encode($ObjetoRespuesta); 

	}
    
    public function recuperar()
	{
		$this->load->model("Usuario_model");

		$username =  $this->input->post("rut");
		$email =  $this->input->post("email");



		if (empty($username)) 
	    {
			$ObjetoRespuesta["URL"] = "";
			$ObjetoRespuesta["Mensaje"] = "Usuario Vacío";
			$ObjetoRespuesta["Codigo"] = 1;
		} 
		else 
		{
			// To protect MySQL injection for Security purpose
			//$username = stripslashes($username);
			//$password = stripslashes($password);
	        
	        //Log_Guardar("Login","Login","Se intento logear usuario:".$username,2);
	        
			$usuario = $this->Usuario_model->ObtenerPorUsername($username);

			//var_dump($usuario);

            $ObjetoRespuesta = [];
            
			if(!$usuario || $usuario->email != $email)
			{
				$ObjetoRespuesta["URL"] = "";
				$ObjetoRespuesta["Mensaje"] = "El Usuario no existe.";
				$ObjetoRespuesta["Codigo"] = 1;
			}
			else
			{
				if($usuario->vigente != 1)
				{
					$ObjetoRespuesta["URL"] = "";
                	$ObjetoRespuesta["Mensaje"] = "El Usuario se encuentra inactivo";
                	$ObjetoRespuesta["Codigo"] = 1;
				}
				else
				{                  
                    $newPass = encriptar_pass(substr($usuario->rut, 0, 4));              
                    $this->Usuario_model->ActualizarPass($newPass, 1, substr($usuario->rut, 0, 4), $usuario->IDUsuario);
                    
                    $ObjetoRespuesta["URL"] = "";
                	$ObjetoRespuesta["Mensaje"] = "La contraseña se ha reiniciado exitosamente, esta consiste en los 4 primeros dí­gitos de su RUT. Presione Aceptar o espere 5 segundos y será dirigido a la página de login.";
                	$ObjetoRespuesta["Codigo"] = 0;
				}
			}


	    }

	    echo json_encode($ObjetoRespuesta); 

	}

	public function cambiarpass()
	{
		$data["ad"] =1;
		$this->load->view('cambiarpass',$data);
	}
    
    public function cambiarClave()
	{
		$this->load->model("Usuario_model");
		$this->load->helper("funciones_generales_helper");

		$passO =  $this->input->post("passO");
		$passN =  $this->input->post("passN");
		$passR =  $this->input->post("passR");

        $ObjetoRespuesta = [];

		if (empty($passO) || empty($passN) || empty($passR)) 
	    {
			$ObjetoRespuesta["URL"] = "";
			$ObjetoRespuesta["Mensaje"] = "Ingrese los Datos";
			$ObjetoRespuesta["Codigo"] = 1;
		} 
		else 
		{
			$username =   $this->session->userdata('nombre');

			// To protect MySQL injection for Security purpose
			//$username = stripslashes($username);
			//$password = stripslashes($password);
	        
	        //Log_Guardar("Login","Login","Se intento logear usuario:".$username,2);
	        
			$usuario = $this->Usuario_model->ObtenerPorUsername($username);

	

            $ObjetoRespuesta = [];
            
            if($passO != $usuario->clave_inicial)
            {
                $ObjetoRespuesta["Mensaje"] = "La contraseña anterior no coincide";
				$ObjetoRespuesta["Codigo"] = 1;
            }
            else{
                if($passN != $passR)
                {
                    $ObjetoRespuesta["Mensaje"] = "Las nuevas contraseñas no coinciden";
                    $ObjetoRespuesta["Codigo"] = 1;
                }
                else
                {
                    $newPass = encriptar_pass($passN);              
                    $this->Usuario_model->ActualizarPass($newPass, 0, "", $usuario->IDUsuario);


                    $this->session->sess_destroy();
                    $ObjetoRespuesta['URL']=$this->config->item('base_url')."admin/login";
                    $ObjetoRespuesta['Codigo']= 0;
                }
            }            
			


	    }

	    echo json_encode($ObjetoRespuesta); 

	}
}
?>