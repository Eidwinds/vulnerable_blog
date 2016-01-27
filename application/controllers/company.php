<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller
{
	public function index()
	{
		$this->load->view("header");
		$this->load->view('company');
		$this->load->view("footer");
	}
}
