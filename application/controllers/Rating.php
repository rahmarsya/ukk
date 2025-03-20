<?php
class Rating extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Film_model');
        $this->load->model('Rating_model');
    }

   public function rate_ajax() {
        if (!$this->session->userdata('id_user')) {
            echo json_encode(["status" => "error", "message" => "Harus login"]);
            return;
        }

        $id_film = $this->input->post('id_film');
        $id_user = $this->session->userdata('id_user');
        $rating = $this->input->post('rating');

        $this->load->model('Rating_model');
        $cek_rating = $this->Rating_model->cek_rating_user($id_film, $id_user);

        if ($cek_rating) {
            $this->Rating_model->update_rating($id_film, $id_user, $rating);
        } else {
            $this->Rating_model->insert_rating($id_film, $id_user, $rating);
        }

        // Ambil data terbaru setelah update
        $rating_data = $this->Rating_model->get_rating_by_film($id_film);
        $new_stars = "";
        $new_avg = number_format($rating_data->rata_rata, 1);
        $new_count = $rating_data->jumlah_rating;

        for ($i = 1; $i <= 5; $i++) {
            $new_stars .= ($i <= round($rating_data->rata_rata)) ? '⭐' : '☆';
        }

        echo json_encode([
            "status" => "success",
            "new_stars" => $new_stars,
            "new_avg" => $new_avg,
            "new_count" => $new_count
        ]);
    }
}

