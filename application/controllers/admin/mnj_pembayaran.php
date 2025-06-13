<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mnj_pembayaran extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('MPembayaran');
    }

    public function index(){
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        $data['pembayaran'] = $this->MPembayaran->get_all();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/mnj_pembayaran', $data);
        $this->load->view('template/footer', $data);

    }

    public function ubah_status($id, $status){
        $this->MPembayaran->update_status($id, $status);

        redirect('admin/mnj_pembayaran');
    }

    public function hapus($id) {
        $this->MPembayaran->hapus($id);
        redirect('admin/mnj_pembayaran');
    }
}
?>