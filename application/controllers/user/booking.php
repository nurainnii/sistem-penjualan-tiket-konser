<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class booking extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MBooking');
    }

    public function index() {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        $data['konser_list'] = $this->MBooking->get_all_konser();

        $this->load->view('user/template/header');
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar', $data);
        $this->load->view('user/list_konser', $data);
        $this->load->view('user/template/footer');
    }

    public function detail($id_konser) {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        $data['konser'] = $this->MBooking->get_konser_by_id($id_konser);
        $data['jadwal_kategori'] = $this->MBooking->get_jadwal_kategori($id_konser);

        $this->load->view('user/template/header');
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar', $data);
        $this->load->view('user/detail_konser', $data);
        $this->load->view('user/template/footer');
    }

    public function proses_booking(){
        if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata('error', 'Anda harus login untuk memesan tiket.');
            redirect('login');
            return;
        }

        $waktu_kedaluwarsa = date('Y-m-d H:i:s', strtotime('+12 hours'));

        $data_booking = [
            'id_user'       => $this->session->userdata('id_user'),
            'id_jadwal'     => $this->input->post('id_jadwal'),
            'id_kategori'   => $this->input->post('id_kategori'),
            'jumlah'        => $this->input->post('jumlah'),
            'status'        => 'dipesan',
            'tanggal_pesan' => date('Y-m-d H:i:s'),
            'waktu_kedaluwarsa' => $waktu_kedaluwarsa
        ];

        $hasil_booking = $this->MBooking->buat_booking_transaksional($data_booking);

        if ($hasil_booking) {
            $this->session->set_flashdata('success', 'Booking berhasil! Stok telah diperbarui. Silakan lanjutkan pembayaran.');
            redirect('user/pembayaran/index/' . $hasil_booking);
        } else {
            $this->session->set_flashdata('error', 'Maaf, stok tiket tidak mencukupi atau terjadi kesalahan.');
            redirect('user/booking/detail/' . $this->input->post('id_konser'));
        }
    }

    public function sukses($id_tiket) {
        $data['booking'] = $this->MBooking->get_booking_by_id($id_tiket);
        $this->load->view('user/sukses', $data);
    }
}