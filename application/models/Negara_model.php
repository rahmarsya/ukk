<?php
class Negara_model extends CI_Model
{
    public function get_negara_by_id($id)
    {
        return $this->db->get_where('negara', ['id_negara' => $id])->row_array();
    }

    public function getAllnegara()
    {
        return $this->db->get('negara')->result_array(); // Ambil semua data dari tabel 'film'
    }

    public function update_negara($id, $data)
    {
        $this->db->where('id_negara', $id);
        return $this->db->update('negara', $data);
    }

    public function delete_negara($id)
    {
        return $this->db->delete('negara', ['id_negara' => $id]);
    }
    
    public function insert_negara($data)
    {
        return $this->db->insert('negara', $data); // Ganti `$this->film` menjadi `'film'`
    }
}
