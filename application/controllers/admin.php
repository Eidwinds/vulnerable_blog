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

				$this->db->query("INSERT INTO `logs` (`ip`, `ua`, `created_at`, `result`) VALUES ('" . $_SERVER["REMOTE_ADDR"] . "', '" . $_SERVER["HTTP_USER_AGENT"] . "', " . time() . ", '1');");

				redirect("admin");
			}
			else
			{
				$this->db->query("INSERT INTO `logs` (`ip`, `ua`, `created_at`, `result`) VALUES ('" . $_SERVER["REMOTE_ADDR"] . "', '" . $_SERVER["HTTP_USER_AGENT"] . "', " . time() . ", '0');");

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

	public function log()
	{
		$this->checkAuth();

		if(!$this->is_signin)
		{
			$this->redirect();
		}

		$config['base_url'] = base_url() . 'admin/log';
		$config['total_rows'] = $this->db->get("logs")->num_rows();
		$config['per_page'] = 20;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);

		$offset = $this->uri->segment(3);
		if($offset == null)
		{
			$offset = 0;
		}
		$limit = $config['per_page'];

		$this->load->view("admin/header", ["is_signin" => $this->is_signin]);
		$this->load->view('admin/log', [
			"pager" => $this->pagination->create_links(),
			"logs" => $this->db->query("SELECT ua, created_at, ip, result FROM logs ORDER BY id DESC LIMIT $offset,$limit")->result()
		]);
		$this->load->view("admin/footer");
	}

	public function inquiry()
	{
		$this->checkAuth();

		if(!$this->is_signin)
		{
			$this->redirect();
		}

		$config['base_url'] = base_url() . 'admin/inquiry';
		$config['total_rows'] = $this->db->get("inquiries")->num_rows();
		$config['per_page'] = 20;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);

		$offset = $this->uri->segment(3);
		if($offset == null)
		{
			$offset = 0;
		}
		$limit = $config['per_page'];

		$this->load->view("admin/header", ["is_signin" => $this->is_signin]);
		$this->load->view('admin/inquiry', [
			"pager" => $this->pagination->create_links(),
			"inquiries" => $this->db->query("SELECT id, name, email, body, created_at FROM inquiries ORDER BY id DESC LIMIT $offset,$limit")->result()
		]);
		$this->load->view("admin/footer");
	}

	public function blog()
	{
		$this->checkAuth();

		if(!$this->is_signin)
		{
			$this->redirect();
		}

		$config['base_url'] = base_url() . 'admin/blog';
		$config['total_rows'] = $this->db->get("blogs")->num_rows();
		$config['per_page'] = 20;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);

		$offset = $this->uri->segment(3);
		if($offset == null)
		{
			$offset = 0;
		}
		$limit = $config['per_page'];

		$this->load->view("admin/header", ["is_signin" => $this->is_signin]);
		$this->load->view('admin/blog', [
			"pager" => $this->pagination->create_links(),
			"blogs" => $this->db->query("SELECT * FROM blogs ORDER BY id DESC LIMIT $offset,$limit")->result()
		]);
		$this->load->view("admin/footer");
	}

	public function delinquiry()
	{
		$this->checkAuth();

		$id = $this->uri->segment(3);
		$this->db->query("DELETE FROM inquiries WHERE id = {$id}");

		$this->load->view("admin/header", ["is_signin" => $this->is_signin]);
		$this->load->view('admin/delinquiry');
		$this->load->view("admin/footer");
	}


	public function logout()
	{
		setcookie("auth", '', time()+3600, "/");
		$this->redirect();
	}
}
