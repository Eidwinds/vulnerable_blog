<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Top extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$config['base_url'] = base_url() . "index.php?a=1";
		$config['total_rows'] = $this->db->get("blogs")->num_rows();
		$config['per_page'] = 3;
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
		$config['page_query_string'] = true;

		$this->pagination->initialize($config);

		if(!isset($_GET["per_page"]))
		{
			$_GET["per_page"] = 0;
		}

		$offset = $_GET["per_page"];

		$limit = $config['per_page'];

		$this->load->view("header");
		$this->load->view('index', [
			"pager" => $this->pagination->create_links(),
			"blogs" => $this->db->query("SELECT * FROM blogs ORDER BY id DESC LIMIT $offset,$limit")->result()
		]);
		$this->load->view("footer");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */