<?php

class Empresa_model extends CI_model
{
	function __construct()
	{
		$this->load->database();
		$this->load->helper("funciones_generales_helper");
	}


	function CategoriasObtener()
	{
		$query = $this->db->get("tb_categoria");
		return $query->result_array();
	}

	

	function ObtenerNroRegistrosPorCategoria($idCategoria)
	{
		$query="";
	    if($idCategoria == 0)
	    {
	        $query = "SELECT 
	            count(*) total
	            from tb_empresa e
	            where  e.vigente = 1";
	    }
	    else
	    {
	        $query = "SELECT DISTINCT
	            count(*) total
	            from tb_empresa e
	            where e.id_categoria = $idCategoria
	             and e.vigente = 1";
	    }
	    
	    

		$query=$this->db->query($query);

		if($query->num_rows() >0)
		{
			return $query->row();
		}
		else
		{
		 	return false;
		} 
	}

	function ObtenerPorCategoria($idCategoria,$pagina)
	{
		$CantidadRegistrosProductos = CANTIDAD_PRODUCTOS_PAGINA;
    
	    $limite1 = 0;
	    $limite2= $CantidadRegistrosProductos;
	    
	    if($pagina != 1)
	    {
	        $limite1 = $CantidadRegistrosProductos * ($pagina-1);
	        $limite2 = $CantidadRegistrosProductos;
	    }
	    $query = "";
	    
	    if($idCategoria == 0)
	    {
	        $query = "SELECT 
	            e.*
	            from tb_empresa e
	            where e.vigente = 1
	            limit $limite1, $limite2";
	    }
	    else
	    {
	        $query = "SELECT 
	            e.*
	            from tb_empresa e
	            where e.id_categoria = $idCategoria
	             and e.vigente = 1
	            limit $limite1, $limite2";
	    }

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


	function ObtenerHtmlEmpresa($obj)
	{

	    $html = "<a class='product-thumb product-thumb-horizontal' href='".$this->config->item('base_url')."portal/local/".urls_amigables(($obj["nombre"]))."'>
	            <header class='product-header'>
	            <img src='".$obj["url_imagen"]."' alt='".html_entity_decode($obj["nombre"])."' title='".html_entity_decode($obj["nombre"])."'>
	            </header>
	            <div class='product-inner'>
	            <h5 class='product-title'>".$obj["nombre"]."</h5>
	            <div class='product-desciption'>".$obj["descripcion_corta"]."</div>
	            <div class='product-meta'>
	            </div>
	            @Direcciones
	            </div>
	            </a>
	            ";
		$htmlAux = "";
		
		if($obj["direcciones"] != null)
		{
			for ($i = 0; $i < count($obj["direcciones"]); $i++) {
				$htmlAux .= '<p class="product-location"><i class="fa fa-map-marker"></i> '.$obj["direcciones"][$i]["calle"].' #'.$obj["direcciones"][$i]["numero"].', '.$obj["direcciones"][$i]["comuna_nombre"].', '.$obj["direcciones"][$i]["region_nombre"].'</p>';
			}
		}
		

	    $html = str_replace("@Direcciones", $htmlAux, $html);
	    return $html;
	}

	public function ObtenerPorBuscador($texto,$pagina, $comuna)
	{
	    
	    $limite1 = 0;
	    $limite2= CANTIDAD_PRODUCTOS_PAGINA;
	    
	    if($pagina != 1)
	    {
	        $limite1 = CANTIDAD_PRODUCTOS_PAGINA * ($pagina-1);
	        $limite2 = CANTIDAD_PRODUCTOS_PAGINA;
	    }
	    
	    $query = "SELECT 
	            e.id_empresa, e.nombre, e.descripcion_corta, e.descripcion_larga, e.url_facebook, e.url_twitter, e.url_imagen
	            from tb_empresa e
	            left join tb_empresa_direccion ed on ed.id_empresa = e.id_empresa
	            left join tb_comuna c on c.id_comuna= ed.id_comuna
				left join tb_empresa_tag et on et.id_empresa = e.id_empresa
				left join tb_tag t on t.id_tag = et.id_tag
	            left join tb_categoria cat on cat.id_categoria = e.id_categoria
	            left join tb_empresa_producto ep on ep.id_empresa = e.id_empresa
	            where ((e.nombre like '%$texto%') or (t.nombre like '%$texto%' )  or (cat.nombre like '%$texto%' ) or (ep.nombre like '%$texto%' ) or('$texto'= ''))
	                        and ((UPPER(c.nombre) = UPPER('$comuna'))or('$comuna' = ''))
	                         and e.vigente = 1
	            group by e.id_empresa, e.nombre, e.descripcion_corta, e.descripcion_larga, e.url_facebook, e.url_twitter, e.url_imagen
	            limit $limite1, $limite2";
	    
	    //echo $sql;
        $query=$this->db->query($query);

		return $query->result_array();
	}

	function ObtenerNroRegistrosPorBuscador($texto,$comuna)
	{

	    $query = "SELECT 
            count( distinct e.id_empresa) total
            from tb_empresa e
            left join tb_empresa_direccion ed on ed.id_empresa = e.id_empresa
            left join tb_comuna c on c.id_comuna= ed.id_comuna
			left join tb_empresa_tag et on et.id_empresa = e.id_empresa
			left join tb_tag t on t.id_tag = et.id_tag 
            left join tb_categoria cat on cat.id_categoria = e.id_categoria
            left join tb_empresa_producto ep on ep.id_empresa = e.id_empresa
            where ((e.nombre like '%$texto%') or (t.nombre like '%$texto%' ) or (cat.nombre like '%$texto%' )  or (ep.nombre like '%$texto%' ) or('$texto'= ''))
            and ((UPPER(c.nombre) = UPPER('$comuna'))or('$comuna' = ''))
             and e.vigente = 1";

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


	public function ObtenerPorID($idEmpresa)
	{
		$query = "SELECT 
            *
            from tb_empresa e
            where e.id_empresa = $idEmpresa";

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

	public function ObtenerPorCodigo($codigo)
	{
		$query = "SELECT 
            *
            from tb_empresa e
            where UPPER(e.codigo) = UPPER('$codigo')";

		$query=$this->db->query($query);



		if($query->num_rows() >0)
		{
			return $query->row_array();
		}
		else
		{
		 	return null;
		} 
	}

	function ObtenerCercanas($texto, $comuna, $latitud, $longitud)
	{



	    $query = "SELECT  
	                ed.latitud AS lat, 
	                ed.longitud AS lng, 
	                ed.calle, 
	                ed.numero,
	                e.nombre,
	                e.codigo,
	                e.id_empresa,
	                ( 
	                    6371 *  
	                    acos(  
	                        cos( radians($latitud) )  
	                            *  
	                        cos( radians( ed.latitud ) )  
	                            *  
	                        cos( radians( ed.longitud ) - radians($longitud) )  
	                            +  
	                        sin( radians($latitud) )  
	                            *  
	                        sin( radians( ed.latitud ) )  
	                    )  
	                ) AS distancia  
	            FROM  
	                tb_empresa e
	            inner join tb_empresa_direccion ed on ed.id_empresa = e.id_empresa
	            inner join tb_comuna c on c.id_comuna= ed.id_comuna
				left join tb_empresa_tag et on et.id_empresa = e.id_empresa
				left join tb_tag t on t.id_tag = et.id_tag
	            inner join tb_categoria cat on cat.id_categoria = e.id_categoria
	            left join tb_empresa_producto ep on ep.id_empresa = e.id_empresa
	            where ((e.nombre like '%$texto%') or (t.nombre like '%$texto%' )  or (cat.nombre like '%$texto%' ) or (ep.nombre like '%$texto%' ) or (ed.calle like '%$texto%' ) or('$texto'= ''))
	               and ((UPPER(c.nombre) = UPPER('$comuna'))or('$comuna' = ''))
	               and e.vigente = 1
	               group by ed.latitud, ed.longitud,ed.calle, distancia,e.id_empresa
	            ORDER by  
	                distancia ASC  
	            LIMIT  
	                100 ";
	    
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
	


}



?>