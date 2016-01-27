<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete extends CI_Controller
{
	public function index()
	{
		$this->load->view("header");
		$this->load->view('delete');
		$this->load->view("footer");
	}
}
