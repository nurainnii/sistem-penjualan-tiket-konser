<?php

class MKategori extends CI_Model {

    public function get_all_with_konser() {
        $this->db->select('kategori_tiket.*, konser.nama_konser');
        $this->db->from('kategori_tiket');
        $this->db->join('konser', 'konser.id_konser = kategori_tiket.id_konser');
        return $this->db->get()->result();
    }

    public function insert($data) {
        $this->db->insert('kategori_tiket', $data);
    }

    public function get_kategori_by_id($id) {
        return $this->db->get_where('kategori_tiket', ['id_kategori' => $id])->row();
    }

    public function update($id, $data){
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori_tiket', $data);
    }

    public function hapus($id){
        $this->db->delete('kategori_tiket', ['id_kategori' => $id]);
    }
}
?>