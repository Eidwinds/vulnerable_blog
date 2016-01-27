<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Term extends CI_Controller
{
	public function index()
	{
		$this->load->view("header");
		$this->load->view('term');
		$this->load->view("footer");
	}
}
