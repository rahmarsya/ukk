<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tahun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tahun_model'); // Load model Tahun_model
        $this->load->helper('url'); // Load helper URL untuk base_url()
    }

    public function index()
    {
        $data['title'] = 'Daftar Pengguna';
        $data['tahun'] = $this->Tahun_model->getAlltahun(); // Pastikan data diambil dari model
        $this->load->view('template/header', $data);
        $this->load->view('admin/tahun', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }

    public function edit_tahun($id)
    {
        // Data yang akan diupdate
        $updateData = [
            'nama_tahun'  => $this->input->post('nama_tahun', true),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->Tahun_model->update_tahun($id, $updateData)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data berhasil diperbarui'
            ]);
            redirect('tahun');
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menyimpan perubahan'
            ]);
        }
    }

    public function delete_tahun($id)
    {
        // Cek apakah ID pengguna valid
        $tahun = $this->Tahun_model->get_tahun_by_id($id);
        if (!$tahun) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Pengguna tidak ditemukan!'
            ]);
            return;
        }

        // Hapus data pengguna
        if ($this->Tahun_model->delete_tahun($id)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Pengguna berhasil dihapus'
            ]);
            redirect('tahun');
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
            'tahun_rilis' => $this->input->post('tahun_rilis', true)
        ];

        if ($this->Tahun_model->insert_tahun($data)) {
            $this->session->set_flashdata('success', 'Negara berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan negara');
        }
        redirect(base_url('tahun'));
       
    }
}
