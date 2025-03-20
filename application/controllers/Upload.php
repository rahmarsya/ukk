    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Upload extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            // $this->load->library('form_validation');
            $this->load->model('Film_model');
            // Additional initialization code
        }

        public function index()
        {
            $data['title'] = 'Upload';
            $data['film'] = $this->Film_model->getAllFilm();

            $this->load->view('template_autor/header', $data);
            $this->load->view('template_autor/sidebar');
            $this->load->view('Autor/upload', $data);
            $this->load->view('template_autor/footer');
        }

        public function tambah()
        {

            $data = [
                'nama_film'  => $this->input->post('nama_film'),
                'thriller'   => $this->input->post('thriller'),
                'gambar_film' => $this->input->post('gambar_film'),
                'id_genre'   => $this->input->post('id_genre'),
                'deskripsi'  => $this->input->post('deskripsi'),
                'id_tahun'   => $this->input->post('id_tahun'),
                'id_negara'  => $this->input->post('id_negara'),
                'id_rating'  => $this->input->post('rating'),
                'durasi'     => $this->input->post('durasi')
            ];
            // var_dump($data);
            // Simpan ke database
            if ($this->Film_model->insert_film($data)) {
                $this->session->set_flashdata('success', 'Film berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan film!');
            }
            redirect('upload'); // Kembali ke halaman film

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
                redirect('upload');
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan perubahan');
                redirect('upload');
            }
        }

        public function delete($id)
        {
            $film = $this->Film_model->get_film_by_id($id);
            if (!$film) {
                $this->session->set_flashdata('error', 'Film tidak ditemukan!');
                redirect('upload');
            }

            if ($this->Film_model->delete_film($id)) {
                $this->session->set_flashdata('success', 'Film berhasil dihapus');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus film');
            }
            redirect('upload');
        }
    }
