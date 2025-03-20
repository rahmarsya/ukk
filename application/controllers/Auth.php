<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); // Load model user
        $this->load->library(['form_validation', 'session']); // Load library form validation & session
        $this->load->helper(['url', 'form']); // Load helper untuk URL & form
    }

    public function index()
    {

        $data['title'] = 'Login';
        $this->load->view('auth/login', $data);
    }

    public function login()
    {
        // Set rules validasi form
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password');

            
            // Cek apakah email ada di database
            $user = $this->User_model->get_user_by_email($email);
            var_dump($email, $password);
            // var_dump($session_data);

            if ($user && password_verify($password, $user['password'])) {
                // Simpan data session
                $session_data = [
                    'logged_in' => true,
                    'id_user'   => $user['id_user'],
                    'nama'      => $user['nama'],
                    'email'     => $user['email'],
                    'nomor_tlp' => $user['nomor_tlp'],
                    'role'      => $user['role']
                ];
                $this->session->set_userdata($session_data);
                // Redirect sesuai role
                if ($user['role'] == 'admin') {
                    $this->session->set_userdata('access', 'admin');
                    $this->session->set_userdata('id_user', $user['id_user']);
                    $this->session->set_userdata('username', $user['nama']);
                    redirect('Dashboard');
                } elseif ($user['role'] == 'user') {
                    $this->session->set_userdata('access', 'user');
                    $this->session->set_userdata('id_user', $user['id_user']);
                    $this->session->set_userdata('username', $user['nama']);
                    redirect('Dashboard_user');
                } elseif ($user['role'] == 'autor') {
                    $this->session->set_userdata('access', 'autor');
                    $this->session->set_userdata('id_user', $user['id_user']);
                    $this->session->set_userdata('username', $user['nama']);
                    redirect('Dashboard_autor');
                } else {
                    // Jika role tidak dikenali, kembalikan ke halaman login
                    // redirect('auth/login');
                    var_dump($email, $password);
                }
            } else {
                $this->session->set_flashdata('error', 'Email atau password salah!');
                // redirect('auth/login');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user'); // Hapus session user
        $this->session->sess_destroy(); // Hancurkan semua session
        redirect(base_url('dashboard_user')); // Redirect ke halaman login
    }
}
