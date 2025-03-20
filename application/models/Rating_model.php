<?php
class Rating_model extends CI_Model
{


        public function cek_rating_user($id_film, $id_user) {
            return $this->db->get_where('rating', ['id_film' => $id_film, 'id_user' => $id_user])->row();
        }
    
        public function update_rating($id_film, $id_user, $rating) {
            $this->db->where('id_film', $id_film);
            $this->db->where('id_user', $id_user);
            $this->db->update('rating', ['rating' => $rating]);
        }
    
        public function insert_rating($id_film, $id_user, $rating) {
            $this->db->insert('rating', [
                'id_film' => $id_film,
                'id_user' => $id_user,
                'rating' => $rating
            ]);
        }
    
        public function get_rating_by_film($id_film) {
            $this->db->select('AVG(rating) as rata_rata, COUNT(*) as jumlah_rating');
            $this->db->where('id_film', $id_film);
            return $this->db->get('rating')->row();
        }
}