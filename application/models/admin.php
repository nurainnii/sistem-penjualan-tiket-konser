<?php

class admin extends CI_Model {

    public function jumlah_konser_aktif() {
        return $this->db
        ->where('status', 'aktif')
        ->from('konser')
        ->count_all_results();
    }

    public function total_tiket_terjual() {
        return $this->db
        ->select_sum('jumlah')
        ->where('status', 'selesai') 
        ->get('tiket')
        ->row()
        ->jumlah ?? 0;
    }

    public function total_revenue() {
        $this->db->select('SUM(t.jumlah * k.harga) AS total');
        $this->db->from('tiket t');
        $this->db->join('kategori_tiket k', 't.id_kategori = k.id_kategori');
        $this->db->where('t.status', 'selesai'); 

        $query = $this->db->get();
        return $query->row()->total ?? 0;
    }

    public function get_pembayaran_masuk() {
        $this->db->select('
            konser.nama_konser,
            users.nama AS nama_pembeli,
            pembayaran.tanggal_bayar,
            kategori_tiket.harga,
            pembayaran.status
        ');
        $this->db->from('pembayaran');
        $this->db->join('tiket', 'tiket.id_tiket = pembayaran.id_tiket');
        $this->db->join('users', 'users.id_user = tiket.id_user');
        $this->db->join('jadwal', 'jadwal.id_jadwal = tiket.id_jadwal');
        $this->db->join('konser', 'konser.id_konser = jadwal.id_konser');
        $this->db->join('kategori_tiket', 'kategori_tiket.id_kategori = tiket.id_kategori');
        $this->db->order_by('pembayaran.tanggal_bayar', 'DESC');
        $this->db->limit(5);

        return $this->db->get()->result();
    }

    public function get_recent_tiket($limit = 5) {
        $this->db->select('
            t.*, 
            n.id_nota,
            n.kode_nota, 
            n.tanggal_terbit, 
            u.nama AS nama_user, 
            k.nama_kategori, 
            ks.nama_konser, 
            j.tanggal, 
            j.waktu
        ');
        $this->db->from('tiket t');
        $this->db->join('nota n', 'n.id_tiket = t.id_tiket', 'left');
        $this->db->join('users u', 'u.id_user = t.id_user');
        $this->db->join('jadwal j', 'j.id_jadwal = t.id_jadwal');
        $this->db->join('konser ks', 'ks.id_konser = j.id_konser');
        $this->db->join('kategori_tiket k', 'k.id_kategori = t.id_kategori');
        $this->db->join('lokasi l', 'l.id_lokasi = j.id_lokasi');
        $this->db->order_by('n.tanggal_terbit', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    public function get_recent_laporan($limit = 5) {
        $this->db->select('report_user.*, users.nama');
        $this->db->from('report_user');
        $this->db->join('users', 'users.id_user = report_user.id_user');
        $this->db->order_by('report_user.tanggal_report', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }
}
?>