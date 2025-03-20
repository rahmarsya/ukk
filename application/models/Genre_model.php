<?php
class Genre_model extends CI_Model
{
    public function get_genre_by_id($id)
    {
        return $this->db->get_where('genre', ['id_genre' => $id])->row_array();
    }

    public function getAllGenre()
    {
        return $this->db->get('genre')->result();
    }

    public function update_genre($id, $data)
    {
        $this->db->where('id_genre', $id);
        return $this->db->update('genre', $data);
    }

    public function delete_genre($id)
    {
        return $this->db->delete('genre', ['id_genre' => $id]);
    }

    public function insert_genre($data)
    {
        return $this->db->insert('genre', $data); 
    }
    
}
