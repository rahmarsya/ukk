<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Film extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Film_model'); // Pastikan model di-load dengan benar
        $this->load->helper('url');
        $this->load->library('form_validation'); // Load library untuk validasi
    }

    public function index()
    {
        $data['title'] = 'Daftar Film';
        $data['film'] = $this->Film_model->getAllFilm();
        $data['genre'] = $this->Film_model->getAllGenre(); // Ambil daftar genre dari database
        $data['tahun'] = $this->Film_model->getAllTahun(); // Ambil daftar tahun dari database
        $data['negara'] = $this->Film_model->getAllNegara(); // Ambil daftar negara dari database
        

        $this->load->view('template/header', $data);
        $this->load->view('admin/Film', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data = [
            'nama_film'  => $this->input->post('nama_film', true),
            'thriller'   => $this->input->post('thriller', true),
            'gambar_film'=> $this->input->post('gambar_film', true),
            'deskripsi'  => $this->input->post('deskripsi', true),
            'id_genre'   => $this->input->post('id_genre', true),
            'id_tahun'   => $this->input->post('id_tahun', true),
            'id_negara'  => $this->input->post('id_negara', true),
            'id_rating'  => $this->input->post('rating', true),
            'durasi'     => $this->input->post('durasi', true)
        ];
        
        // var_dump($data);
        // Simpan ke database
        if ($this->Film_model->insert_film($data)) {
            $this->session->set_flashdata('success', 'Film berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan film!');
        }
        redirect('film'); // Kembali ke halaman film

    }

    public function edit($id)
    {
        $updateData = [
            'nama_film'  => $this->input->post('nama_film', true),
            'thriller' => $this->input->post('thriller', true),
            'gambar_film'  => $this->input->post('gambar_film', true),
            'deskripsi'  => $this->input->post('deskripsi', true),
            'id_genre'  => $this->input->post('id_genre', true),
            'id_tahun'  => $this->input->post('id_tahun', true),
            'id_negara'  => $this->input->post('id_negara', true),
            'id_rating'  => $this->input->post('rating', true),
            'durasi'  => $this->input->post('durasi', true),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->Film_model->update_film($id, $updateData)) {
            $this->session->set_flashdata('success', 'Data berhasil diperbarui');
            redirect('film');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan perubahan');
            redirect('film');
        }
    }

    public function delete($id)
    {
        $film = $this->Film_model->get_film_by_id($id);
        if (!$film) {
            $this->session->set_flashdata('error', 'Film tidak ditemukan!');
            redirect('film');
        }

        if ($this->Film_model->delete_film($id)) {
            $this->session->set_flashdata('success', 'Film berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus film');
        }
        redirect('film');
    }

    public function search()
    {
        $query = $this->input->get('query');

        $data['movies'] = $this->Film_model->search_film($query);

        $this->load->view('search_results', $data);
    }

   
}
