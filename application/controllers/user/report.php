<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MReport');
        if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata('error', 'Anda harus login untuk mengakses halaman ini.');
            redirect('Welcome');
        }
    }

    public function index() {
        $id_user_sekarang = $this->session->userdata('id_user');
        
        $data['riwayat_laporan'] = $this->MReport->get_laporan_by_user($id_user_sekarang);
        
        $user = $this->db->get_where('users', ['id_user' => $id_user_sekarang])->row();
        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        
        $this->load->view('user/template/header');
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar', $data);
        $this->load->view('user/report', $data);
        $this->load->view('user/template/footer');
    }

    public function tambah() {
        $id_user_sekarang = $this->session->userdata('id_user');

        $user = $this->db->get_where('users', ['id_user' => $id_user_sekarang])->row();
        $data['nama'] = $user->nama;
        $data['email'] = $user->email;

        $this->load->view('user/template/header');
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar', $data);
        $this->load->view('user/tambah_report', $data);
        $this->load->view('user/template/footer');
    }

    public function simpan() {
        $id_user_sekarang = $this->session->userdata('id_user');
        
        $data_laporan = [
            'id_user'        => $id_user_sekarang,
            'judul_report'   => $this->input->post('judul'),
            'isi_report'     => $this->input->post('isi_laporan'),
            'tanggal_report' => date('Y-m-d H:i:s'),
            'status'         => 'pending'
        ];

        $this->MReport->simpan_laporan($data_laporan);
        
        $this->session->set_flashdata('success', 'Laporan Anda berhasil dikirim. Mohon tunggu balasan dari admin.');
        redirect('user/report');
    }

    public function hapus($id_report) {
        $id_user_sekarang = $this->session->userdata('id_user');

        $laporan = $this->MReport->get_laporan_by_id($id_report);

        if ($laporan && $laporan->id_user == $id_user_sekarang) {
            
            if (strtolower($laporan->status) == 'pending') {
                $this->MReport->hapus_laporan($id_report, $id_user_sekarang);
                $this->session->set_flashdata('success', 'Laporan berhasil dihapus.');
            } else {
                $this->session->set_flashdata('error', 'Laporan yang sudah ditangani tidak bisa dihapus.');
            }
        } else {
            $this->session->set_flashdata('error', 'Aksi tidak diizinkan.');
        }

        redirect('user/report/laporan');
    }

}