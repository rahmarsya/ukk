<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $table = 'user';

    public function insert_user($data)
    {
        return $this->db->insert('user', $data);
    }

    public function get_user_by_email($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function get_all_users()
    {
        return $this->db->get('user')->result_array();
    }

    public function update_user($id, $data)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('user', $data);
    }

    public function delete_user($id)
    {
        return $this->db->delete('user', ['id_user' => $id]);
    }
    
    public function get_user_by_id ($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }
}
