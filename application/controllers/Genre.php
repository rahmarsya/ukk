<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Genre extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Genre_model'); // Load model Genre_model
        $this->load->helper('url'); // Load helper URL untuk base_url()
    }

    public function index()
    {
        $data['title'] = 'Daftar Pengguna';
        $data['genre'] = $this->Genre_model->getAllgenre(); // Pastikan data diambil dari model
        $this->load->view('template/header', $data);
        $this->load->view('Admin/Genre', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        // Data yang akan diupdate
        $updateData = [
            'nama_genre'  => $this->input->post('nama_genre', true),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->Genre_model->update_genre($id, $updateData)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data berhasil diperbarui'
            ]);
            redirect('genre');
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menyimpan perubahan'
            ]);
        }
    }

    public function delete($id)
    {
        // Cek apakah ID pengguna valid
        $genre = $this->Genre_model->get_genre_by_id($id);
        if (!$genre) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Pengguna tidak ditemukan!'
            ]);
            return;
        }

        // Hapus data pengguna
        if ($this->Genre_model->delete_genre($id)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Pengguna berhasil dihapus'
            ]);
            redirect('genre');
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus pengguna'
            ]);
        }
    }

    public function tambah()
    {
        $data = [
            'nama_genre' => $this->input->post('nama_genre', true)
        ];

        if ($this->Genre_model->insert_genre($data)) {
            $this->session->set_flashdata('success', 'Negara berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan negara');
        }
        redirect(base_url('genre'));
    }
}
