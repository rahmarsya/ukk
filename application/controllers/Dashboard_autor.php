<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_autor extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Film_model'); // Load model Genre_model
		// check_access('autor');
	}


	public function index()
	{
		$data['title'] = 'Dashboard autor';
		$data['detail_film'] = $this->Film_model->getAllFilm();
		$this->load->view('template_autor/header', $data);
		$this->load->view('template_autor/sidebar');
		$this->load->view('Autor/dashboard', $data);
		$this->load->view('template_autor/footer');
	}

	public function daftar_film()
	{
		$id_user = $this->session->userdata('id_user'); // Ambil ID user yang login
		$data['detail_film'] = $this->Film_model->get_film_by_user($id_user); // Panggil model
		$this->load->view('dashboard', $data);
	}
}
