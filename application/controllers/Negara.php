<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Negara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Negara_model'); // Load model Negara_model
        $this->load->helper('url'); // Load helper URL
        $this->load->library('form_validation'); // Load library form validation
    }

    public function index()
    {
        $data['title'] = 'Daftar Negara';
        $data['negara'] = $this->Negara_model->getAllNegara(); // Ambil semua negara dari model
        $this->load->view('template/header', $data);
        $this->load->view('admin/negara', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }

    public function tambah()
    {
            $data = [
                'nama_negara' => $this->input->post('nama_negara', true)
            ];

            if ($this->Negara_model->insert_negara($data)) {
                $this->session->set_flashdata('success', 'Negara berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan negara');
            }
            redirect(base_url('negara'));
        // }
    }

    public function edit($id)
    {
        // Validasi input
        $this->form_validation->set_rules('nama_negara', 'Nama Negara', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('negara'));
        } else {
            $updateData = [
                'nama_negara' => $this->input->post('nama_negara', true),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            if ($this->Negara_model->update_negara($id, $updateData)) {
                $this->session->set_flashdata('success', 'Negara berhasil diperbarui');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui negara');
            }
            redirect(base_url('negara'));
        }
    }

    public function delete($id)
    {
        // Cek apakah negara ada
        $negara = $this->Negara_model->get_negara_by_id($id);
        if (!$negara) {
            $this->session->set_flashdata('error', 'Negara tidak ditemukan!');
            redirect(base_url('negara'));
        }

        // Hapus data
        if ($this->Negara_model->delete_negara($id)) {
            $this->session->set_flashdata('success', 'Negara berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus negara');
        }
        redirect(base_url('negara'));
    }
}
