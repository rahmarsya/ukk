<?php
class Upload_model extends CI_Model
{
    public function insert_film($data)
    {
        return $this->db->insert('film', $data); // Ganti `$this->film` menjadi `'film'`
    }
}