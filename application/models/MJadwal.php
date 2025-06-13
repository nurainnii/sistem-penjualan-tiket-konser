<?php

class MJadwal extends CI_Model {
    public function get_all_jadwal() {
        $this->db->select('jadwal.*, konser.nama_konser, lokasi.nama_tempat');
        $this->db->from('jadwal');
        $this->db->join('konser', 'konser.id_konser = jadwal.id_konser');
        $this->db->join('lokasi', 'lokasi.id_lokasi = jadwal.id_lokasi');
        return $this->db->get()->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('jadwal', ['id_jadwal' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('jadwal', $data);
    }

    public function update($id, $data) {
        return $this->db->update('jadwal', $data, ['id_jadwal' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('jadwal', ['id_jadwal' => $id]);
    }
}
?>