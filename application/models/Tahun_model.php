<?php
class Tahun_model extends CI_Model
{
    public function get_tahun_by_id($id)
    {
        return $this->db->get_where('tahun', ['id_tahun' => $id])->row_array();
    }

    public function getAlltahun()
    {
        return $this->db->get('tahun')->result_array(); // Ambil semua data dari tabel 'film'
    }

    public function update_tahun($id, $data)
    {
        $this->db->where('id_tahun', $id);
        return $this->db->update('tahun', $data);
    }

    public function delete_tahun($id)
    {
        return $this->db->delete('tahun', ['id_tahun' => $id]);
    }

    public function insert_tahun($data)
    {
        return $this->db->insert('tahun', $data); // Ganti `$this->film` menjadi `'film'`
    }
}
