<?php

class MReport extends CI_Model {
    public function get_all_laporan() {
        $this->db->select('report_user.*, users.nama');
        $this->db->from('report_user');
        $this->db->join('users', 'users.id_user = report_user.id_user');
        return $this->db->get()->result();
    }

    public function get_by_id($id) {
        $this->db->select('report_user.*, users.nama');
        $this->db->from('report_user');
        $this->db->join('users', 'users.id_user = report_user.id_user');
        $this->db->where('id_report', $id);
        return $this->db->get()->row();
    }

    public function update_laporan($id, $data) {
        $this->db->where('id_report', $id);
        $this->db->update('report_user', $data);
    }
    public function hapus($id) {
        return $this->db->delete('report_user', ['id_report' => $id]);
    }

    public function get_laporan_by_id($id_report){
        return $this->db->get_where('report_user', ['id_report' => $id_report])->row();
    }


    public function get_laporan_by_user($id_user) {
        $this->db->where('id_user', $id_user);
        $this->db->order_by('tanggal_report', 'DESC'); 
        return $this->db->get('report_user')->result();
    }

    public function simpan_laporan($data) {
        return $this->db->insert('report_user', $data);
    }

    public function hapus_laporan($id_report, $id_user) {
        $this->db->where('id_report', $id_report);
        $this->db->where('id_user', $id_user);
        return $this->db->delete('report_user');
    }
}
?>