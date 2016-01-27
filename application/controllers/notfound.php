<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NotFound extends CI_Controller
{
	public function index()
	{
		$this->load->view("header");
		$this->load->view('404');
		$this->load->view("footer");
	}
}
