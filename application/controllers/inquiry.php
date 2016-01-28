<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inquiry extends CI_Controller
{
	public function index()
	{
		if(isset($_POST["name"]))
		{
			$this->db->query("INSERT INTO `inquiries` (`name`, `email`, `body`, `created_at`) VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "', '" . $_POST["body"] . "', " . time() . ");");
			$this->load->view("header");
			$this->load->view('inquiry_finish');
			$this->load->view("footer");
		}
		else
		{
			$this->load->view("header");
			$this->load->view('inquiry');
			$this->load->view("footer");
		}
	}
}
