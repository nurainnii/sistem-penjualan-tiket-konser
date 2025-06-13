<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLaporan extends CI_Model {

    public function get_laporan_penjualan() {
        $this->db->select('
            laporan_penjualan.*,
            users.nama as nama_admin,
            konser.nama_konser
        ');
        $this->db->from('laporan_penjualan');
        $this->db->join('users', 'users.id_user = laporan_penjualan.id_user');
        $this->db->join('konser', 'konser.id_konser = laporan_penjualan.id_konser');
        $this->db->order_by('laporan_penjualan.tanggal_laporan', 'DESC');
        return $this->db->get()->result();
    }


    public function insert_laporan($data) {
        return $this->db->insert('laporan_penjualan', $data);
    }

    public function delete_laporan($id) {
        return $this->db->delete('laporan_penjualan', ['id_laporan' => $id]);
    }

    public function get_laporan_pendapatan() {
        $this->db->select(
            'konser.id_konser, 
            konser.nama_konser, 
            COALESCE(SUM(tiket.jumlah), 0) AS total_terjual,
            COALESCE(SUM(tiket.jumlah * kategori_tiket.harga), 0) AS total_pendapatan'
        );
        $this->db->from('konser');
        $this->db->join('kategori_tiket', 'kategori_tiket.id_konser = konser.id_konser', 'inner');
        $this->db->join('tiket', 'tiket.id_kategori = kategori_tiket.id_kategori', 'inner');
        $this->db->join('pembayaran', 'pembayaran.id_tiket = tiket.id_tiket', 'inner');
        $this->db->where('tiket.status', 'selesai');
        $this->db->where('pembayaran.status', 'valid');
        $this->db->group_by('konser.id_konser, konser.nama_konser');
        $this->db->order_by('konser.nama_konser', 'ASC');
        return $this->db->get()->result();
    }
}
?>