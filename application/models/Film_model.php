<?php
class Film_model extends CI_Model
{
    public function insert_film($data)
    {
        return $this->db->insert('film', $data);
    }

    public function getAllFilm()
    {
        $query = $this->db->get('film'); // Ambil semua film dari tabel
        return $query->result();
    }

    public function update_film($id, $data)
    {
        $this->db->where('id_film', $id);
        return $this->db->update('film', $data);
    }

    public function delete_film($id)
    {
        return $this->db->delete('film', ['id_film' => $id]);
    }

    public function get_film_by_id($id_film)
    {
        $this->db->select('film.*, genre.nama_genre, tahun.tahun_rilis, negara.nama_negara');
        $this->db->from('film');
        $this->db->join('genre', 'film.id_genre = genre.id_genre', 'left');
        $this->db->join('tahun', 'film.id_tahun = tahun.id_tahun', 'left');
        $this->db->join('negara', 'film.id_negara = negara.id_negara', 'left');
        // $this->db->join('rating', 'film.id_rating = rating.id_rating', 'left');
        $this->db->where('film.id_film', $id_film);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_film_rating_data($id_film)
    {
        $this->db->select('COUNT(id_rating) AS jumlah_rating, AVG(rating) AS rata_rata');
        $this->db->where('id_film', $id_film);
        $query = $this->db->get('rating');

        return $query->row();
    }

    public function getFilmByUser($id_user)
    {
        return $this->db->get_where('film', ['id_user' => $id_user])->result();
    }


    public function getAllGenre()
    {
        return $this->db->get('genre')->result();
    }

    public function getAllNegara()
    {
        return $this->db->get('negara')->result();
    }

    public function getAllTahun()
    {
        return $this->db->get('tahun')->result();
    }

    public function getFilmByGenre($id_genre)
    {
        $this->db->select('*');
        $this->db->from('film');
        $this->db->join('genre', 'film.id_genre = genre.id_genre');
        $this->db->where('film.id_genre', $id_genre);
        return $this->db->get()->result();
    }

    public function getFilmByNegara($id_negara)
    {
        $this->db->select('*');
        $this->db->from('film');
        $this->db->join('negara', 'film.id_negara = negara.id_negara');
        $this->db->where('film.id_negara', $id_negara);
        return $this->db->get()->result();
    }

    public function getFilmByTahun($id_tahun)
    {
        $this->db->select('*');
        $this->db->from('film');
        $this->db->join('tahun', 'film.id_tahun = tahun.id_tahun');
        $this->db->where('film.id_tahun', $id_tahun);
        return $this->db->get()->result();
    }

    public function get_film_by_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->get('film')->result();
    }
    
    public function getFilmById($id_film)
    {
        return $this->db->get_where('film', ['id_film' => $id_film])->row();
    }
}
