<?php

class MLokasi extends CI_Model {

    public function get_all() {
        return $this->db->get('lokasi')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('lokasi', ['id_lokasi' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('lokasi', $data);
    }

    public function update($id, $data) {
        return $this->db->update('lokasi', $data, ['id_lokasi' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('lokasi', ['id_lokasi' => $id]);
    }
}
?>