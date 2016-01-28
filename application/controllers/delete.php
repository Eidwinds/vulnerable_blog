<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete extends CI_Controller
{
	public function index()
	{
		$this->load->view("header");
		$this->load->view('delete');
		$this->load->view("footer");
	}

	public function confirm()
	{
		if(isset($_POST["del_key"]))
		{
			$blog = $this->db->query("SELECT * FROM blogs WHERE (del_key = '{$_POST["del_key"]}') ORDER BY id DESC LIMIT 1")->result();
		}
		else
		{
			$blog = null;
		}

		$this->load->view("header");
		$this->load->view('delete_confirm', [
			"blog" => $blog
		]);
		$this->load->view("footer");
	}

	public function finish()
	{
		if(isset($_POST["id"]))
		{
			$this->db->query("DELETE FROM blogs WHERE id = {$_POST["id"]}");
		}

		$this->load->view("header");
		$this->load->view('delete_finish');
		$this->load->view("footer");
	}
}
