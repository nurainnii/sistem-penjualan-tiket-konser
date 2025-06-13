<?php
class MTiket extends CI_Model {

    public function get_last_tickets($id_user, $limit = 5) {
        return $this->db
            ->select('tiket.*, konser.nama_konser, jadwal.tanggal, kategori_tiket.nama_kategori')
            ->from('tiket')
            ->join('jadwal', 'tiket.id_jadwal = jadwal.id_jadwal')
            ->join('konser', 'jadwal.id_konser = konser.id_konser')
            ->join('kategori_tiket', 'tiket.id_kategori = kategori_tiket.id_kategori')
            ->where('tiket.id_user', $id_user)
            ->order_by('tiket.tanggal_pesan', 'DESC')
            ->limit($limit)
            ->get()
            ->result();
    }

    public function get_all_tiket_with_nota() {
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
        return $this->db->get()->result();
    }

    public function get_tiket_by_id($id) {
        $this->db->select('
            t.*, 
            u.nama AS nama_user, 
            ks.nama_konser, 
            j.tanggal, 
            j.waktu, 
            k.nama_kategori,
            l.nama_tempat AS nama_lokasi
        ');
        $this->db->from('tiket t');
        $this->db->join('users u', 'u.id_user = t.id_user');
        $this->db->join('jadwal j', 'j.id_jadwal = t.id_jadwal');
        $this->db->join('konser ks', 'ks.id_konser = j.id_konser');
        $this->db->join('kategori_tiket k', 'k.id_kategori = t.id_kategori');
        $this->db->join('lokasi l', 'l.id_lokasi = j.id_lokasi'); 
        $this->db->where('t.id_tiket', $id);
        return $this->db->get()->row();
    }

    public function update_status($id_tiket, $status) {
        $this->db->where('id_tiket', $id_tiket);
        return $this->db->update('tiket', ['status' => $status]);
    }

    public function insert_nota($data) {
        return $this->db->insert('nota', $data);
    }

    public function get_nota_by_id($id_tiket) {
        return $this->db->get_where('nota', ['id_tiket' => $id_tiket])->row();
    }

    public function delete_nota_by_tiket($id_tiket) {
        return $this->db->delete('nota', ['id_tiket' => $id_tiket]);
    }

    public function delete_pembayaran_by_tiket($id_tiket) {
        return $this->db->delete('pembayaran', ['id_tiket' => $id_tiket]);
    }

    public function delete_tiket($id_tiket) {
        return $this->db->delete('tiket', ['id_tiket' => $id_tiket]);
    }

    public function get_all_tickets_by_user($id_user) {
        return $this->db
            ->select('tiket.*, konser.nama_konser, jadwal.tanggal, kategori_tiket.nama_kategori')
            ->from('tiket')
            ->join('jadwal', 'tiket.id_jadwal = jadwal.id_jadwal')
            ->join('konser', 'jadwal.id_konser = konser.id_konser')
            ->join('kategori_tiket', 'tiket.id_kategori = kategori_tiket.id_kategori')
            ->where('tiket.id_user', $id_user)
            ->order_by('tiket.tanggal_pesan', 'DESC')
            ->get()
            ->result();
    }

}
?>