<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// $this->load->model('m_wisata');

		$status = $this->session->userdata('status');
		if (isset($status) != "login") {
			redirect(base_url("auth"));
		}
	}

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$fotoprofil = $this->session->userdata('gambar');
		$nama = $this->session->userdata('nama');

		$data['foto'] = $fotoprofil;
		$data['nama'] = $nama;

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('dashboard');
		$this->load->view('template/footer');
	}

	public function Register()
	{
		$this->load->view('dashboard');
	}
}
