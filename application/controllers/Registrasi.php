<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property CI_Form_validation $form_validation
 */

class Registrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'Registrasi';
        $this->load->view('auth/registrasi', $data);
    }
    public function registrasi()
    {
        // Validasi form
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('usia', 'Usia', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $profileImage = 'default.png';

            // Cek apakah ada file yang diupload
            if (!empty($_FILES['profile']['name'])) {
                $uploadPath = './uploads/profiles/';

                // Buat folder jika belum ada
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                $config['upload_path']   = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = 2048;
                $config['file_name']     = time() . '-' . $_FILES['profile']['name'];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('profile')) {
                    $uploadData = $this->upload->data();
                    $profileImage = $uploadData['file_name'];
                }
            }

            // Simpan data ke database
            $userData = [
                'nama'       => $this->input->post('nama'),
                'usia'       => $this->input->post('usia'),
                'email'      => $this->input->post('email'),
                'nomor_tlp'      => $this->input->post('nomor_tlp'),
                'password'   => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role'       => $this->input->post('role'),
                'profile'    => $profileImage,
                'created_at' => date('Y-m-d H:i:s')
            ];
            var_dump($userData);
            // Masukkan ke database
            if ($this->User_model->insert_user($userData)) {
                $this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
                redirect('auth'); // Redirect ke halaman login
            } else {
                $this->session->set_flashdata('error', 'Registrasi gagal. Silakan coba lagi.');
                // redirect('registrasi'); // Redirect kembali jika gagal
            }
        }
    }
}
