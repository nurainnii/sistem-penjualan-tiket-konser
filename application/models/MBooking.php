<?php
class MBooking extends CI_Model {

    public function get_all_konser(){
        $this->db->select('konser.*, jadwal.tanggal, lokasi.nama_tempat, lokasi.alamat');
        $this->db->from('konser');
        $this->db->join('jadwal', 'jadwal.id_konser = konser.id_konser', 'inner'); 
        $this->db->join('lokasi', 'lokasi.id_lokasi = jadwal.id_lokasi', 'left'); 
        $this->db->where('konser.status', 'aktif');
        return $this->db->get()->result();
    }

    public function getActiveKonserWithSchedule($limit = 2){
        return $this->db
        ->select('konser.*, jadwal.tanggal, jadwal.waktu, lokasi.nama_tempat, lokasi.kota')
        ->from('konser')
        ->join('jadwal', 'jadwal.id_konser = konser.id_konser')
        ->join('lokasi', 'jadwal.id_lokasi = lokasi.id_lokasi')
        ->where('konser.status', 'aktif')
        ->order_by('jadwal.tanggal', 'ASC')
        ->limit($limit)
        ->get()
        ->result();
    }   

    public function get_konser_by_id($id_konser) {
        return $this->db->get_where('konser', ['id_konser' => $id_konser])->row();
    }

    public function get_jadwal_kategori($id_konser) {
        $this->db->select('j.id_jadwal, j.tanggal, j.waktu, l.nama_tempat, kt.id_kategori, kt.nama_kategori, kt.harga, kt.stok, l.nama_tempat, l.alamat');
        $this->db->from('jadwal j');
        $this->db->join('lokasi l', 'j.id_lokasi = l.id_lokasi');
        $this->db->join('kategori_tiket kt', 'j.id_konser = kt.id_konser');
        $this->db->where('j.id_konser', $id_konser);
        return $this->db->get()->result();
    }

    public function simpan_booking($data_booking) {
        $this->db->insert('tiket', $data_booking); 
        return $this->db->insert_id(); 
    }

    public function simpan_pembayaran($id_tiket, $data_pembayaran) {
        $cek = $this->db->get_where('pembayaran', ['id_tiket' => $id_tiket])->num_rows();

        if ($cek > 0) {
            $this->db->where('id_tiket', $id_tiket);
            $this->db->update('pembayaran', $data_pembayaran);
        } else {
            $data_pembayaran['id_tiket'] = $id_tiket;
            $this->db->insert('pembayaran', $data_pembayaran);
        }
    }
    
    public function get_booking_by_id($id_tiket) {
        $this->db->select('
        t.id_tiket, t.id_user, t.id_kategori, t.jumlah, t.waktu_kedaluwarsa,
        t.status as status_booking,
        k.nama_konser,
        kt.nama_kategori,
        j.tanggal, j.waktu,
        l.nama_tempat, l.alamat,
        (t.jumlah * kt.harga) as total_harga,
        t.id_tiket as id_booking,
        p.status as status_pembayaran
        ');
        $this->db->from('tiket t');
        $this->db->join('kategori_tiket kt', 't.id_kategori = kt.id_kategori');
        $this->db->join('jadwal j', 't.id_jadwal = j.id_jadwal');
        $this->db->join('konser k', 'kt.id_konser = k.id_konser');
        $this->db->join('lokasi l', 'j.id_lokasi = l.id_lokasi');
        $this->db->join('pembayaran p', 't.id_tiket = p.id_tiket', 'left');
        $this->db->where('t.id_tiket', $id_tiket);
    
        return $this->db->get()->row();
    }

    public function buat_booking_transaksional($data_booking){
        $this->db->trans_begin();

        $id_kategori = $data_booking['id_kategori'];
        $jumlah_pesan = $data_booking['jumlah'];
        
        $query = "SELECT stok FROM kategori_tiket WHERE id_kategori = ? FOR UPDATE";
        $kategori = $this->db->query($query, [$id_kategori])->row();

        if (!$kategori || $kategori->stok < $jumlah_pesan) {
            $this->db->trans_rollback();
            return FALSE; 
        }
        
        $this->db->insert('tiket', $data_booking);
        $id_tiket_baru = $this->db->insert_id(); 

        $this->db->set('stok', 'stok - ' . (int)$jumlah_pesan, FALSE);
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori_tiket');

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return $id_tiket_baru; 
        }
    }
}
?>