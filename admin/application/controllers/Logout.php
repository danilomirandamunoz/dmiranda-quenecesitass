<?php


class Logout extends CI_Controller
{
    public function Index()
	{
		$this->session->sess_destroy();
        header('Location: '.$this->config->item('base_url').'admin/login');
	}
    
}
