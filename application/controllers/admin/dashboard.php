<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if (!$this->session->userdata('email')) {
            redirect('login');
        }
    }

    public function index() {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['nama'] = $user->nama;
        $data['email'] = $user->email;

        $this->load->model('MUser');
        $this->load->model('admin');

        $data['total_users'] = $this->MUser->hitung_users();
        $data['total_konser'] = $this->admin->jumlah_konser_aktif();
        $data['total_tiket_terjual'] = $this->admin->total_tiket_terjual();
        $data['total_pendapatan'] = $this->admin->total_revenue();
        $data['pembayaran'] = $this->admin->get_pembayaran_masuk();
        $data['recent_tiket'] = $this->admin->get_recent_tiket(5);
        $data['recent_reports'] = $this->admin->get_recent_laporan(5);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/footer');
    }

}

?>