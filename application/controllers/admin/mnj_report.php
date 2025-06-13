<?php

class mnj_report extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('MReport');
    }

    public function index() {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        $data['laporan'] = $this->MReport->get_all_laporan();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/mnj_report', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail($id) {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        $data['laporan'] = $this->MReport->get_by_id($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/balas_report', $data);
        $this->load->view('template/footer', $data);
    }

    public function balas($id) {
        $balasan = $this->input->post('balasan_admin');
        $status  = $this->input->post('status');

        $this->MReport->update_laporan($id, [
            'balasan_admin' => $balasan,
            'status' => $status
        ]);

        redirect('admin/mnj_report');
    }

    public function hapus($id) {
        $this->MReport->hapus($id);
        redirect('admin/mnj_report');
    }
}
?>