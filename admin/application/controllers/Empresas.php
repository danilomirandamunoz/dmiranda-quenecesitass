<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Empresas extends CI_Controller {

	public function Index()
	{
        $this->load->helper("funciones_generales_helper"); 
		if($this->session->userdata('logueado'))
		{

            $idempresa = $this->session->userdata('id_empresa');


			$this->load->model("Menu_model");

			$rol = $this->session->userdata('rol');
            
			$menus = $this->Menu_model->ObtenerPorRol($rol);

	         $data = array();
	         $data['nombre'] = $this->session->userdata('nombre');
	         $data['menus'] = $menus;
             
             
             $this->load->model("Empresa_model");
             
            
             
             $result = $this->Empresa_model->ObtenerPorUsuario($idempresa);
             
             for ($i = 0; $i < count($result); $i++)
             {
             	$result[$i]["id_empresa"] = crearParametroUrl($result[$i]["id_empresa"]);
             }
             

             $data["empresas"] = $result;
             $data['rol'] = $rol;
	         $this->load->view('empresas', $data);
	    }		
	    else
	    {
	    	header('Location: /admin/login'); 
	    }

		//$this->load->view("home", $datos);
	}
    
    
    public function Detalle($idempresa = NULL)
    {
        if(!$this->session->userdata('logueado'))
		{
            header('Location: /admin/login'); 
            return;
        }

        $this->load->model("Menu_model");
        $this->load->model("Categoria_model");
        $this->load->model("Empresa_model");
        $this->load->model("EmpresaDireccion_model");
        $this->load->model("EmpresaImagen_model");
        $this->load->model("Tag_model");
        $this->load->model("EmpresaProducto_model");
        $this->load->model("Region_model");
        
        $data = array();
        $empresa = NULL;
        $rol = $this->session->userdata('rol');
        $menus = $this->Menu_model->ObtenerPorRol($rol);
        $categorias = $this->Categoria_model->CategoriasObtener();
        $regiones = $this->Region_model->Obtener();
        $tags = $this->Tag_model->Obtener();
        $data['menus'] = $menus;
        $data['categorias'] = $categorias;
        $data['regiones'] = $regiones;
        $data['tag'] = $tags;
        

        if($idempresa != NULL)
        {
            $data['idEmpresa'] = $idempresa;
            $idempresa = desencriptarParametroURL($idempresa);
            
            if(is_numeric ($idempresa))
            {
                $empresa = $this->Empresa_model->ObtenerPorID($idempresa);
                $resultDirecciones = $this->EmpresaDireccion_model->ObtenerPorIDEmpresa($empresa->id_empresa);
                $data['direcciones'] = $resultDirecciones;


                $data['empresa'] = $empresa;
                $data['tags'] = $this->Tag_model->ObtenerPorEmpresa($idempresa);
                $data['imagenes'] = $this->EmpresaImagen_model->ObtenerPorIDEmpresa($empresa->id_empresa);
                $data['productos'] = $this->EmpresaProducto_model->ObtenerPorEmpresa($idempresa);
                $data["urlRedesSociales"] = $this->config->item('base_url')."portal/local/".urls_amigables($empresa->nombre);
            }
        }
        else
        {
            $data['idEmpresa'] = 0;
        }

        $data['existe'] = isset($empresa)? 1 : 0;
       

        $this->load->view('detalle_empresa',$data);
        
        
    }




    public function GuardarInfoBasica()
    {

        if(!$this->session->userdata('logueado'))
		{
            header('Location: /admin/login'); 
            return;
        }
        // try 
        // {
            $this->load->helper("funciones_generales_helper");
            $this->load->model("Empresa_model");
    
            $nombre = $this->input->post('nombre');
            $descCorta = $this->input->post('descCorta');
            $descLarga = $this->input->post('descLarga');
            $urlF = $this->input->post('urlF');
            $urlT = $this->input->post('urlT');
            $urlI = $this->input->post('urlI');
            $idEmpresa = DesencriptarParametroURL($this->input->post('idEmpresa'));
            // echo $this->input->post('idEmpresa');
            // echo $idEmpresa;
            $vigente = $this->input->post('vigente');
            $idCategoria = $this->input->post('idCategoria');    
            $imagenActual;

            $basePath = '../portal/img/locales/'.urls_amigables($nombre);

            if (!file_exists($basePath)) {
                mkdir($basePath, 0777, true);
            }
    
            $uploads_dir = $basePath.'/'.RandomString();
            if($idEmpresa > 0)
            {
                
                if($this->input->post("cambiarImagen") == 'true')
                {
    
                    $tmp_name = $_FILES["fileImage"]["tmp_name"];
                    $name = $_FILES["fileImage"]["name"];
                    $nuevaRuta = $uploads_dir.'_'.$name;
                    
                    move_uploaded_file($tmp_name, $nuevaRuta);
                    $imagenActual = $uploads_dir.'_'.$name;
                    $imagenActual = $this->config->item('base_url')."/".str_replace("../","",$imagenActual);
            
                }
                else
                {
                    $imagenActual = $this->input->post("imagenActual");
                }
            }
            else
            {
                $tmp_name = $_FILES["fileImage"]["tmp_name"];
                $name = $_FILES["fileImage"]["name"];
                $nuevaRuta = $uploads_dir.'_'.$name;
                //echo $nuevaRuta;
                
                move_uploaded_file($tmp_name, $nuevaRuta);
                $imagenActual = $uploads_dir.'_'.$name;
                $imagenActual = $this->config->item('base_url')."/".str_replace("../","",$imagenActual);
            
            }
            
            
            $result = $this->Empresa_model->GuardarInformacionBasica(
                $nombre,
                $descCorta,
                $descLarga, 
                $urlF,
                $imagenActual, 
                $urlT, 
                $idEmpresa,
                $vigente,
                $idCategoria,
                $urlI);
            $ObjetoRespuesta['UrlRedesSociales'] = $this->config->item('base_url')."portal/local/".urls_amigables($nombre);
            $ObjetoRespuesta["codigo"] = 0;
            $ObjetoRespuesta["idEmpresa"] = crearParametroUrl($result);

            $idempresa = $this->session->userdata('id_empresa');
            


            echo json_encode($ObjetoRespuesta);
        // } 
        // catch (Exception $ex) 
        // {
        //     console.error($ex)
        // }

    } 


    public function GuardarDireccion()
    {

        if(!$this->session->userdata('logueado'))
		{
            header('Location: /admin/login'); 
            return;
        }
        $this->load->helper("funciones_generales_helper");
        $this->load->model("EmpresaDireccion_model");
        $idEmpresa = DesencriptarParametroURL($this->input->post('idEmpresa'));

        $resultDirecciones = $this->EmpresaDireccion_model->ObtenerPorIDEmpresa($idEmpresa);

        if($resultDirecciones != null )
        {
            if(count($resultDirecciones) >= CANTIDAD_DIRECCIONES)
            {
                $ObjetoRespuesta["codigo"] = 2;
                $ObjetoRespuesta["mensaje"] = "No puede cargar más de ".CANTIDAD_DIRECCIONES." direcciones.";
                echo json_encode($ObjetoRespuesta);
                return;
            }
        }



        $idEmpresaDireccion = $this->input->post('idEmpresaDireccion');
        $region = $this->input->post('region');
        $comuna = $this->input->post('comuna');
        $calle = $this->input->post('calle');
        $numero = $this->input->post('numero');
        $departamento = $this->input->post('departamento');
        $piso = $this->input->post('piso');
        $emails = $this->input->post('emails');
        $telefonos = $this->input->post('telefonos');
        $latitud = $this->input->post('latitud');
        $longitud = $this->input->post('longitud');
        
        $nombreComuna = $this->input->post('nombreComuna');
        $nombreRegion = $this->input->post('nombreRegion');

        $result = $this->EmpresaDireccion_model->Guardar(
            $idEmpresaDireccion,
            $region,
            $comuna,
            $calle,
            $numero,
            $departamento,
            $piso,
            $emails,
            $telefonos,
            $latitud,
            $longitud,
            $idEmpresa,
            $nombreComuna,
            $nombreRegion
            
        );
        if($result> 0)
        {
            $ObjetoRespuesta["codigo"] = 0;
        }
        else{
            $ObjetoRespuesta["codigo"] = 1;
        }
        
        echo json_encode($ObjetoRespuesta);
    }

    public function CargarComunasPorRegion()
    {
        $this->load->helper("funciones_generales_helper");
        $this->load->model("Comuna_model");

        $region = $this->input->post('idRegion');

       
        $result = $this->Comuna_model->ObtenerPorRegion($region);

        $ObjetoRespuesta["codigo"] = 0;
        $ObjetoRespuesta["data"] = $result;
        echo json_encode($ObjetoRespuesta);
    }

    public function ObtenerDireccionPorID()
    {
        $this->load->helper("funciones_generales_helper");
        $this->load->model("EmpresaDireccion_model");

        $idDireccion = DesencriptarParametroURL($this->input->post('idDireccion'));

        $result = $this->EmpresaDireccion_model->ObtenerPorID($idDireccion);

        $ObjetoRespuesta["codigo"] = 0;
        $ObjetoRespuesta["data"] = $result;
        echo json_encode($ObjetoRespuesta);
    }

    public function RecargarDirecciones()
    {
        $this->load->model("EmpresaDireccion_model");

        $idEmpresa = DesencriptarParametroURL($this->input->post('idEmpresa'));

        $result = $this->EmpresaDireccion_model->ObtenerPorIDEmpresa($idEmpresa);

        if($result != null)
        {
            for ($i=0; $i < count($result); $i++) { 
               $result[$i]["id_empresa_direccion"]  = crearParametroUrl($result[$i]["id_empresa_direccion"]);
            }
        }

        $ObjetoRespuesta["codigo"] = 0;
        $ObjetoRespuesta["data"] = $result;
        echo json_encode($ObjetoRespuesta);

    }

    public function EliminarDireccion()
    {
        $this->load->model("EmpresaDireccion_model");
        $ID = DesencriptarParametroURL($this->input->post('ID'));

        $result = $this->EmpresaDireccion_model->Eliminar($ID);

        $ObjetoRespuesta["codigo"] = 0;
        $ObjetoRespuesta["data"] = $result;
        echo json_encode($ObjetoRespuesta);
    }

    public function RecargarTag()
    {
        $this->load->model("Tag_model");

        $idEmpresa = DesencriptarParametroURL($this->input->post('idEmpresa'));

        $result = $this->Tag_model->ObtenerPorEmpresa($idEmpresa);

        if($result != null)
        {
            for ($i=0; $i < count($result); $i++) { 
               $result[$i]["id_empresa_tag"]  = crearParametroUrl($result[$i]["id_empresa_tag"]);
            }
        }

        $ObjetoRespuesta["codigo"] = 0;
        $ObjetoRespuesta["data"] = $result;
        echo json_encode($ObjetoRespuesta);

    }

    public function EliminarTag()
    {
        $this->load->model("Tag_model");

        $ID = DesencriptarParametroURL($this->input->post('ID'));

        $result = $this->Tag_model->Eliminar($ID);

        $ObjetoRespuesta["codigo"] = 0;
        $ObjetoRespuesta["data"] = $result;
        echo json_encode($ObjetoRespuesta);
    }

    public function GuardarTag()
    {

        if(!$this->session->userdata('logueado'))
		{
            header('Location: /admin/login'); 
            return;
        }
        $this->load->helper("funciones_generales_helper");
        $this->load->model("Tag_model");
        $idEmpresa = DesencriptarParametroURL($this->input->post('idEmpresa'));

        $resultTags = $this->Tag_model->ObtenerPorEmpresa($idEmpresa);

        if($resultTags != null )
        {
            if(count($resultTags) >= CANTIDAD_TAGS)
            {
                $ObjetoRespuesta["codigo"] = 2;
                $ObjetoRespuesta["mensaje"] = "No puede cargar más de ".CANTIDAD_TAGS." tag(s).";
                echo json_encode($ObjetoRespuesta);
                return;
            }
        }

        $idTag = $this->input->post('idTag');
        


        $result = $this->Tag_model->GuardarTagEmpresa(
            $idEmpresa,
            $idTag
            
        );
        if($result> 0)
        {
            $ObjetoRespuesta["codigo"] = 0;
        }
        else{
            $ObjetoRespuesta["codigo"] = 1;
        }
        
        echo json_encode($ObjetoRespuesta);
    }


    public function GuardarImagen()
    {
        if(!$this->session->userdata('logueado'))
		{
            header('Location: /admin/login'); 
            return;
        }
        $this->load->helper("funciones_generales_helper");
        $this->load->model("EmpresaImagen_model");

        $idEmpresa = DesencriptarParametroURL($this->input->post('idEmpresa'));
        $resultImagenes = $this->EmpresaImagen_model->ObtenerPorIDEmpresa($idEmpresa);;

        if($resultImagenes != null )
        {
            if(count($resultImagenes) >= CANTIDAD_IMAGENES)
            {
                $ObjetoRespuesta["codigo"] = 2;
                $ObjetoRespuesta["mensaje"] = "No puede cargar más de ".CANTIDAD_IMAGENES." imagen(es)).";
                echo json_encode($ObjetoRespuesta);
                return;
            }
        }


        $nombre = $this->input->post('nombre');

        $basePath = '../portal/img/locales/'.urls_amigables($nombre)."/imagenes";

        if (!file_exists($basePath)) {
            mkdir($basePath, 0777, true);
        }

        $uploads_dir = $basePath.'/'.RandomString();
        $tmp_name = $_FILES["fileImage"]["tmp_name"];
        $name = $_FILES["fileImage"]["name"];
        $nuevaRuta = $uploads_dir.'_'.$name;
        
        move_uploaded_file($tmp_name, $nuevaRuta);
        $imagenActual = $uploads_dir.'_'.$name;

        $imagenActual = $this->config->item('base_url')."/".str_replace("../","",$imagenActual);
            


        $result = $this->EmpresaImagen_model->Guardar(
            $idEmpresa,
            $imagenActual
        );

        if($result> 0)
        {
            $ObjetoRespuesta["codigo"] = 0;
        }
        else{
            $ObjetoRespuesta["codigo"] = 1;
        }
        
        echo json_encode($ObjetoRespuesta);
    }

    public function RecargarImagenes()
    {
        $this->load->model("EmpresaImagen_model");

        $idEmpresa = DesencriptarParametroURL($this->input->post('idEmpresa'));

        $result = $this->EmpresaImagen_model->ObtenerPorIDEmpresa($idEmpresa);

        if($result != null)
        {
            for ($i=0; $i < count($result); $i++) { 
               $result[$i]["id_empresa_imagen"]  = crearParametroUrl($result[$i]["id_empresa_imagen"]);
            }
        }

        $ObjetoRespuesta["codigo"] = 0;
        $ObjetoRespuesta["data"] = $result;
        echo json_encode($ObjetoRespuesta);

    }

    public function EliminarImagen()
    {
        $this->load->model("EmpresaImagen_model");

        $ID = DesencriptarParametroURL($this->input->post('ID'));
        try
        {
            $empresaImagen = $this->EmpresaImagen_model->ObtenerPorID($ID);
            if($empresaImagen != null)
            {
                if(AMBIENTE == 0)
                {
                    $imagen = str_replace($this->config->item('base_url'),"",$empresaImagen->url_imagen);
                    $imagen = str_replace("/","\\",$imagen);
                    $imagen = FCPATH."..".str_replace($this->config->item('base_url'),"",$imagen);
                    unlink($imagen);
                }
                else
                {
                    $imagen = str_replace($this->config->item('base_url'),"",$empresaImagen->url_imagen);
                    $imagen = str_replace("/","\\",$imagen);
                    $imagen = FCPATH."..".str_replace($this->config->item('base_url'),"",$imagen);
                    unlink($imagen);
                }
            }
            
        }
        catch(Exception $ex){

        }
        

        $result = $this->EmpresaImagen_model->Eliminar($ID);

        $ObjetoRespuesta["codigo"] = 0;
        $ObjetoRespuesta["data"] = $result;
        echo json_encode($ObjetoRespuesta);
    }

    public function GuardarProducto()
    {
        if(!$this->session->userdata('logueado'))
		{
            header('Location: /admin/login'); 
            return;
        }
        $this->load->helper("funciones_generales_helper");
        $this->load->model("EmpresaProducto_model");

        $idEmpresa = DesencriptarParametroURL($this->input->post('idEmpresa'));
        

        $resultProductos = $this->EmpresaProducto_model->ObtenerPorEmpresa($idEmpresa);
        if($resultProductos != null )
        {
            if(count($resultProductos) >= CANTIDAD_PRODUCTOS)
            {
                $ObjetoRespuesta["codigo"] = 2;
                $ObjetoRespuesta["mensaje"] = "No puede cargar más de ".CANTIDAD_PRODUCTOS." productos.";
                echo json_encode($ObjetoRespuesta);
                return;
            }
        }

        $nombre = $this->input->post('nombre');
        $nombreEmpresa = $this->input->post('nombreEmpresa');

        $basePath = '../portal/img/locales/'.urls_amigables($nombreEmpresa)."/productos";

        if (!file_exists($basePath)) {
            mkdir($basePath, 0777, true);
        }

        $uploads_dir = $basePath.'/'.RandomString();
        $tmp_name = $_FILES["fileImage"]["tmp_name"];
        $name = $_FILES["fileImage"]["name"];
        $nuevaRuta = $uploads_dir.'_'.$name;
        
        move_uploaded_file($tmp_name, $nuevaRuta);
        $imagenActual = $uploads_dir.'_'.$name;

        $imagenActual = $this->config->item('base_url')."/".str_replace("../","",$imagenActual);
            


        $result = $this->EmpresaProducto_model->Guardar(
            $idEmpresa,
            $nombre,
            $imagenActual
        );

        if($result> 0)
        {
            $ObjetoRespuesta["codigo"] = 0;
        }
        else{
            $ObjetoRespuesta["codigo"] = 1;
        }
        
        echo json_encode($ObjetoRespuesta);
    }

    public function RecargarProductos()
    {
        $this->load->model("EmpresaProducto_model");

        $idEmpresa = DesencriptarParametroURL($this->input->post('idEmpresa'));

        $result = $this->EmpresaProducto_model->ObtenerPorEmpresa($idEmpresa);

        if($result != null)
        {
            for ($i=0; $i < count($result); $i++) { 
               $result[$i]["id_empresa_producto"]  = crearParametroUrl($result[$i]["id_empresa_producto"]);
            }
        }

        $ObjetoRespuesta["codigo"] = 0;
        $ObjetoRespuesta["data"] = $result;
        echo json_encode($ObjetoRespuesta);

    }

    public function EliminarProducto()
    {
        $this->load->model("EmpresaProducto_model");

        $ID = DesencriptarParametroURL($this->input->post('ID'));

        try
        {
            $empresaProducto = $this->EmpresaProducto_model->ObtenerPorID($ID);
            if($empresaProducto != null)
            {
                if(AMBIENTE == 0)
                {
                    $imagen = str_replace($this->config->item('base_url'),"",$empresaProducto->imagen);
                    $imagen = str_replace("/","\\",$imagen);
                    $imagen = FCPATH."..".str_replace($this->config->item('base_url'),"",$imagen);
                    unlink($imagen);
                }
                else
                {
                    $imagen = str_replace($this->config->item('base_url'),"",$empresaProducto->imagen);
                    $imagen = str_replace("/","\\",$imagen);
                    $imagen = FCPATH."..".str_replace($this->config->item('base_url'),"",$imagen);
                    unlink($imagen);
                }
            }
            
        }
        catch(Exception $ex){

        }


        $result = $this->EmpresaProducto_model->Eliminar($ID);

        $ObjetoRespuesta["codigo"] = 0;
        $ObjetoRespuesta["data"] = $result;
        echo json_encode($ObjetoRespuesta);
    }



}






?>