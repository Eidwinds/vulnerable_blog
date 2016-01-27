<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public $is_signin = false;

	public static function redirect()
	{
		redirect("admin/signin");
	}

	public function checkAuth()
	{
		$true_key = trim(file_get_contents(dirname(__FILE__) . "/../../keycode"));

		if($_COOKIE["auth"] == md5($true_key))
		{
			$this->is_signin = true;
		}
		else
		{
			$this->is_signin = false;
		}
	}


	public function index()
	{
		$this->checkAuth();

		if(!$this->is_signin)
		{
			$this->redirect();
		}

		$this->load->view("admin/header", ["is_signin" => $this->is_signin]);
		$this->load->view('admin/index');
		$this->load->view("admin/footer");
	}

	public function signin()
	{
		$data["error"] = false;
		if(isset($_POST["key"]))
		{
			$data["key"] = $_POST["key"];
			$true_key = trim(file_get_contents(dirname(__FILE__) . "/../../keycode"));
			if($true_key == $data["key"])
			{
				setcookie("auth", md5($true_key),time()+3600, "/");
				redirect("admin");
			}
			else
			{
				$data["error"] = true;
			}
		}

		$this->load->view("admin/header", ["is_signin" => $this->is_signin]);
		$this->load->view('admin/signin', $data);
		$this->load->view("admin/footer");
	}

	public function key()
	{
		$this->checkAuth();

		if(!$this->is_signin)
		{
			$this->redirect();
		}

		if(isset($_POST["key"]))
		{
			file_put_contents(dirname(__FILE__) . "/../../keycode", $_POST["key"]);
			redirect("admin/signin");
		}

		$this->load->view("admin/header", ["is_signin" => $this->is_signin]);
		$this->load->view('admin/key');
		$this->load->view("admin/footer");
	}

	public function logout()
	{
		setcookie("auth", '', time()+3600, "/");
		$this->redirect();
	}
}
