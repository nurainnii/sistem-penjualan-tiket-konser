<?php
class MUser extends CI_Model {
    public function get_user_by_email($email) {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }
    
    public function register_user($data) {
        return $this->db->insert('users', $data);
    }

    public function hitung_users() {
        return $this->db->count_all('users');
    }
    
    public function get_all() {
        return $this->db->get('users')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('users', ['id_user' => $id])->row();
    }

    public function insert($data) {
        $this->db->insert('users', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_user', $id);
        $this->db->update('users', $data);
    }

    public function delete($id) {
        $this->db->where('id_user', $id);
        $this->db->delete('users');
    }
}
?>