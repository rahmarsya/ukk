<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Komentar_model');
    }

    public function add()
    {
        $this->form_validation->set_rules('komentar', 'Komentar', 'required');
        
        if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata('error', 'Anda harus login untuk memberikan komentar.');
            redirect($_SERVER['HTTP_REFERER']); // Kembali ke halaman sebelumnya
        }


        $data = [
            'id_film'   => $this->input->post('id_film'),
            'id_user'   => $this->session->userdata('id_user'),
            'komentar'  => $this->input->post('komentar'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->Komentar_model->add_comment($data);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
