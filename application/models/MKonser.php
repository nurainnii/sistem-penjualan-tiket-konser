<?php
class MKonser extends CI_Model {

    public function get_all_konser() {
        return $this->db->get('konser')->result_array();
    }

    public function get_all() {
        return $this->db->get('konser')->result();
    }

    public function get_konser_by_id($id) {
        return $this->db->get_where('konser', ['id_konser' => $id])->row_array();
    }

    public function insert_konser($data) {
        $this->db->insert('konser', $data);
    }

    public function update_konser($id, $data) {
        $this->db->where('id_konser', $id);
        $this->db->update('konser', $data);
    }

    public function delete_konser($id) {
        $this->db->where('id_konser', $id);
        $this->db->delete('konser');
    }
}
?>