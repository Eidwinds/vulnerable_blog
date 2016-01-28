<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submit extends CI_Controller
{
	public function index()
	{
		if(isset($_POST["title"]))
		{
			$this->db->query("INSERT INTO `blogs` (`title`, `del_key`, `body`, `created_at`) VALUES ('" . $_POST["title"] . "','" . $_POST["key"] . "', '" . $_POST["body"] . "', " . time() . ");");
			$this->load->view("header");
			$this->load->view('submit_finish');
			$this->load->view("footer");
		}
		else
		{
			$this->load->view("header");
			$this->load->view('submit');
			$this->load->view("footer");
		}
	}
}
