<?php
class Komentar_model extends CI_Model
{

    public function get_comments_by_film($id_film)
    {
        $this->db->select('komentar.*, user.username'); // Mengambil data komentar & username
        $this->db->from('komentar');
        $this->db->join('user', 'user.id_user = komentar.id_user'); // Join dengan tabel user
        $this->db->where('komentar.id_film', $id_film);
        $this->db->order_by('komentar.created_at', 'DESC'); // Urutkan dari yang terbaru
        return $this->db->get()->result_array();
    }

    public function insert_comment($data)
    {
        return $this->db->insert('komentar', $data);
    }


    public function get_comments($id_film)
    {
        return $this->db->where('id_film', $id_film)
            ->order_by('created_at', 'DESC')
            ->get('komentar')
            ->result();
    }

    public function add_comment($data)
    {
        return $this->db->insert('komentar', $data);
    }


    public function getKomentarByFilm($id_film)
    {
        $this->db->select('komentar.*, user.nama'); // Ambil komentar & nama user
        $this->db->from('komentar');
        $this->db->join('user', 'komentar.id_user = user.id_user', 'left');
        $this->db->where('komentar.id_film', $id_film);
        $this->db->order_by('komentar.created_at', 'DESC'); // Urutkan terbaru ke atas
        $query = $this->db->get();

        return $query->result(); //  Pakai result() agar bisa diakses sebagai objek
    }
}
