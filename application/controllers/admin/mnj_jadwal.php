<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class mnj_jadwal extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('MJadwal');
        $this->load->model('MKonser');
        $this->load->model('MLokasi');
    }

    public function index() {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['jadwal'] = $this->MJadwal->get_all_jadwal();
        $data['nama'] = $user->nama;
        $data['email'] = $user->email;

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/mnj_jadwal', $data);
        $this->load->view('template/footer');
    }

    public function tambah() {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['konser'] = $this->MKonser->get_all();
        $data['lokasi'] = $this->MLokasi->get_all();
        $data['nama'] = $user->nama;
        $data['email'] = $user->email;

        if ($this->input->post()) {
            $this->MJadwal->insert($this->input->post());
            redirect('admin/mnj_jadwal');
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/tambah_jadwal', $data);
        $this->load->view('template/footer');
    }

    public function edit($id) {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();
        
        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        $data['jadwal'] = $this->MJadwal->get_by_id($id);
        $data['konser'] = $this->MKonser->get_all();
        $data['lokasi'] = $this->MLokasi->get_all();

        if ($this->input->post()) {
            $this->MJadwal->update($id, $this->input->post());
            redirect('admin/mnj_jadwal');
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/edit_jadwal', $data);
        $this->load->view('template/footer');

    }

    public function hapus($id) {
        $this->MJadwal->delete($id);
        redirect('admin/mnj_jadwal');
    }
}


?>