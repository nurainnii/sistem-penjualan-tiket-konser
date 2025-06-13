<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MBooking');
    }

    public function index($id_tiket) {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();
            
        $data['email'] = $user->email;
        $data['nama'] = $user->nama;
        $data['booking'] = $this->MBooking->get_booking_by_id($id_tiket);
        $booking = $this->MBooking->get_booking_by_id($id_tiket);

        if (!$data['booking']) {
            show_404();
        }

        if ($booking->status_booking !== 'dipesan') {
            $this->session->set_flashdata('error', 'Pesanan ini sudah tidak valid atau sudah dibayar.');
            redirect('user/dashboard'); 
            return;
        }

        $waktu_sekarang = new DateTime();
        $waktu_kedaluwarsa = new DateTime($booking->waktu_kedaluwarsa);


        if ($waktu_sekarang > $waktu_kedaluwarsa) {
            
            $this->db->where('id_tiket', $id_tiket)->update('tiket', ['status' => 'kadaluwarsa']);
            
            $this->db->set('stok', 'stok + ' . (int)$booking->jumlah, FALSE);
            $this->db->where('id_kategori', $booking->id_kategori);
            $this->db->update('kategori_tiket');

            $this->session->set_flashdata('error', 'Waktu pembayaran untuk pesanan ini telah habis.');
            redirect('user/dashboard');
            return;
        }

        $data['booking'] = $booking;

        $this->load->view('user/template/header');
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar', $data);
        $this->load->view('user/form_pembayaran', $data);
        $this->load->view('user/template/footer');
    }

    public function proses() {
        $id_tiket = $this->input->post('id_tiket'); 
        
        $config['upload_path']   = './uploads/bukti/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 2048; 
        $config['file_name']     = 'bukti-' . $id_tiket;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('bukti_transfer')) {
        $upload_data = $this->upload->data();
        $data_pembayaran = [
            'nama_pengirim'  => $this->input->post('nama_pengirim'),
            'bank'           => $this->input->post('bank'),
            'bukti_transfer' => $upload_data['file_name'],
            'status'         => 'pending', 
            'tanggal_bayar'  => date('Y-m-d H:i:s')
        ];

        $this->MBooking->simpan_pembayaran($id_tiket, $data_pembayaran);

        $this->db->where('id_tiket', $id_tiket);
        $this->db->update('tiket', ['status' => 'dibayar']);

        redirect('user/pembayaran/status/' . $id_tiket);
        } else {
            $data['error'] = $this->upload->display_errors();
            $data['booking'] = $this->MBooking->get_booking_by_id($id_tiket);
            $this->load->view('user/form_pembayaran', $data);
        }
    }

    public function status($id_tiket){
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();
        
        $data['booking'] = $this->MBooking->get_booking_by_id($id_tiket);
        $data['nama'] = $user->nama;
        $data['email'] = $user->email;

        if (!$data['booking']) {
            show_404();
        }

        $this->load->view('user/template/header');
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar', $data);
        $this->load->view('user/status', $data);
        $this->load->view('user/template/footer');
    }
}
?>