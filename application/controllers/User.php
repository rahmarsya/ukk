<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); // Load model User_model
        $this->load->helper('url'); // Load helper URL untuk base_url()
    }

    public function index()
    {
        $data['title'] = 'Daftar Pengguna';
        $data['user'] = $this->User_model->get_all_users(); // Pastikan ini sesuai dengan model
        $this->load->view('template/header', $data);
        $this->load->view('admin/User', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        // // Validasi data input
        // $this->form_validation->set_rules('name', 'Nama', 'trim|required');
        // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        // $this->form_validation->set_rules('usia', 'Usia', 'trim|required|numeric');
        // $this->form_validation->set_rules('role', 'Role', 'trim|required');

        // Data yang akan diupdate
        $updateData = [
            'nama'  => $this->input->post('name', true),
            'email' => $this->input->post('email', true),
            'nomor_tlp' => $this->input->post('nomor_tlp', true),
            'usia'  => $this->input->post('usia', true),
            'role'  => $this->input->post('role', true),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->User_model->update_user($id, $updateData)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data berhasil diperbarui'
            ]);
            redirect('user');
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
        $user = $this->User_model->get_user_by_id($id);
        if (!$user) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Pengguna tidak ditemukan!'
            ]);
            return;
        }

        // Hapus data pengguna
        if ($this->User_model->delete_user($id)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Pengguna berhasil dihapus'
            ]);
            redirect('user');
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
                'nama' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'nomor_tlp' => $this->input->post('nomor_tlp', true),
                'usia' => $this->input->post('usia', true),
                'role' => $this->input->post('role', true),
                // 'profile' => 'default.png' // Set default profile image
            ];

            $this->User_model->insert_user($data);
            $this->session->set_flashdata('success', 'User berhasil ditambahkan');
            redirect(base_url('user'));
        
    }
}
