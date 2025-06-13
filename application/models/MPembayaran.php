<?php

class MPembayaran extends CI_Model
{
    public function get_all(){
        $this->db->select('
            pembayaran.id_pembayaran,
            users.nama AS nama_pembeli,
            konser.nama_konser,
            pembayaran.bukti_transfer,
            pembayaran.status,
            pembayaran.tanggal_bayar
        ');
        $this->db->from('pembayaran');
        $this->db->join('tiket', 'tiket.id_tiket = pembayaran.id_tiket');
        $this->db->join('users', 'users.id_user = tiket.id_user');
        $this->db->join('jadwal', 'jadwal.id_jadwal = tiket.id_jadwal');
        $this->db->join('konser', 'konser.id_konser = jadwal.id_konser');
        $this->db->order_by('pembayaran.tanggal_bayar', 'DESC');
        return $this->db->get()->result();
    }

    public function update_status($id_pembayaran, $status){
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->update('pembayaran', ['status' => $status]);
    }

    public function hapus($id) {
        return $this->db->delete('pembayaran', ['id_pembayaran' => $id]);
    }

    public function get_detail_pembayaran($id_tiket){
        $this->db->select('t.*, k.nama_konser, j.tanggal, j.waktu, kat.nama_kategori, kat.harga');
        $this->db->from('tiket t');
        $this->db->join('jadwal j', 'j.id_jadwal = t.id_jadwal');
        $this->db->join('konser k', 'k.id_konser = j.id_konser');
        $this->db->join('kategori_tiket kat', 'kat.id_kategori = t.id_kategori');
        $this->db->where('t.id_tiket', $id_tiket);
        return $this->db->get()->row();
    }

    public function upload_bukti($data) {
        return $this->db->insert('pembayaran', $data);
    }

    public function get_pembayaran_by_user($id_user) {
        $this->db->select('p.*, t.id_kategori, t.status as status_tiket');
        $this->db->from('pembayaran p');
        $this->db->join('tiket t', 'p.id_tiket = t.id_tiket');
        $this->db->where('t.id_user', $id_user);
        return $this->db->get()->result();
    }
    
    public function simpan_bukti($data) {
        return $this->db->insert('pembayaran', $data);
    }
}
?>