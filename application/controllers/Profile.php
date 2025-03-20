<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

        // Cek apakah user sudah login
        if (!$this->session->userdata('email')) {
            redirect('auth/login'); // Redirect ke halaman login jika belum login
        }
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->User_model->get_user_by_email($email);

        $this->load->view('template_user/header');
		$this->load->view('User/profile', $data);
		$this->load->view('template_user/footer');
    }
}
