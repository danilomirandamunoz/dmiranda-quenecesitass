<?php

class Categoria_model extends CI_model
{
	function __construct()
	{
		$this->load->database();
	}


	function CategoriasObtener()
	{
        $query = "SELECT  
	                * from tb_categoria
                    where vigente = 1";
	    
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