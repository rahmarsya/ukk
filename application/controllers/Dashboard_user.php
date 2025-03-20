<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_user extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Film_model'); // Load model Genre_model
		$this->load->model('Rating_model'); // Load model Genre_model
		$this->load->model('Genre_model'); // Load model Genre_model

	}


	public function index()
	{
		$id_user = $this->session->userdata('id_user');  // Ambil ID User yang login
		$data['detail_film'] = $this->Film_model->get_film_by_user($id_user);
		$data['title'] = 'Dashboard';
		$data['detail_film'] = $this->Film_model->getAllFilm();
		$data['genre'] = $this->Film_model->getAllGenre(); // Ambil data genre
		$data['negara'] = $this->Film_model->getAllNegara(); // Untuk navbar tetap bisa akses genre


		$this->load->view('template_user/header', $data);
		$this->load->view('User/dashboard', $data);
		$this->load->view('template_user/footer');
	}

	public function detail($id_film = null)
	{
		if (!$this->session->userdata('logged')) {
			// redirect('login');
		}

		if ($id_film === null) {
			show_404();
		}

		$data['title'] = 'Detail film';
		$data['detail_film'] = $this->Film_model->get_film_by_id($id_film);
		$data['rating_data'] = $this->Rating_model->get_rating_by_film($id_film);
		$data['komentar'] = $this->Komentar_model->getKomentarByFilm($id_film); // ✅ Hanya panggil 1x
		$data['genre'] = $this->Film_model->getAllGenre(); // Ambil data genre
		$data['negara'] = $this->Film_model->getAllNegara(); // Untuk navbar tetap bisa akses genre

		$this->load->view('template_user/header', $data);
		$this->load->view('User/detail_film', $data);
		$this->load->view('template_user/footer');
	}

	public function filter_by_genre()
	{
		$id_genre = $this->input->get('genre');

		if ($id_genre) {
			$data['film'] = $this->Film_model->getFilmByGenre($id_genre);
		} else {
			$data['film'] = $this->Film_model->getAllFilm();
		}

		$data['genre'] = $this->Film_model->getAllGenre(); // Untuk navbar tetap bisa akses genre
		$data['negara'] = $this->Film_model->getAllNegara(); // Untuk navbar tetap bisa akses genre
		$this->load->view('template_user/header', $data);
		$this->load->view('User/list_film', $data);
		$this->load->view('template_user/footer');
	}

	public function filter_by_negara()
	{
		$id_negara = $this->input->get('negara');

		if ($id_negara) {
			$data['film'] = $this->Film_model->getFilmByNegara($id_negara);
		} else {
			$data['film'] = $this->Film_model->getAllFilm();
		}

		$data['genre'] = $this->Film_model->getAllGenre(); // Untuk navbar tetap bisa akses genre
		$data['negara'] = $this->Film_model->getAllNegara(); // Untuk navbar tetap bisa akses genre

		$this->load->view('template_user/header', $data);
		$this->load->view('User/list_film', $data);
		$this->load->view('template_user/footer');
	}

	public function get_film_filtered($id_genre = null, $negara = null)
	{
		$this->db->select('film.*, genre.nama_genre');
		$this->db->from('film');
		$this->db->join('genre', 'genre.id_genre = film.id_genre', 'left');

		// Filter berdasarkan genre jika ada
		if (!empty($id_genre)) {
			$this->db->where('film.id_genre', $id_genre);
		}

		// Filter berdasarkan negara jika ada
		if (!empty($negara)) {
			$this->db->where('film.negara', $negara);
		}

		return $this->db->get()->result();
	}


	public function detail_list($id_film = null)
	{
		if (!$this->session->userdata('logged')) {
			// redirect('login');
		}

		if ($id_film === null) {
			show_404();
		}


		$data['title'] = 'Detail film';
		$data['detail_film'] = $this->Film_model->get_film_by_id($id_film);
		$data['rating_data'] = $this->Film_model->get_film_rating_data($id_film);
		$data['komentar'] = $this->Komentar_model->getKomentarByFilm($id_film);
		$data['genre'] = $this->Film_model->getAllGenre(); // Untuk navbar tetap bisa akses genre
		$data['negara'] = $this->Film_model->getAllNegara(); // Untuk navbar tetap bisa akses genre

		$this->load->view('template_user/header', $data);
		$this->load->view('user/detail_list', $data);
		$this->load->view('template_user/footer');
	}

	public function trailer($id_film)
	{
		$data['film'] = $this->Film_model->getFilmById($id_film);
		$data['genre'] = $this->Film_model->getAllGenre(); // Untuk navbar tetap bisa akses genre
		$data['negara'] = $this->Film_model->getAllNegara(); // Untuk navbar tetap bisa akses genre

		if (!$data['film']) {
			show_404(); // Tampilkan error jika film tidak ditemukan
		}

		$this->load->view('template_user/header', $data);
		$this->load->view('user/trailer', $data);
		$this->load->view('template_user/footer');
	}
}
