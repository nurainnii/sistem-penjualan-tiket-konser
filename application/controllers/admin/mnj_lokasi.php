<?php

class mnj_lokasi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('MLokasi');
    }

    public function index() {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        $data['lokasi'] = $this->MLokasi->get_all();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/mnj_lokasi.php', $data);
        $this->load->view('template/footer');
    }

    public function tambah() {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['nama'] = $user->nama;
        $data['email'] = $user->email;

        if ($this->input->post()) {
            $this->MLokasi->insert($this->input->post());
            redirect('admin/mnj_lokasi');
        }

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/tambah_lokasi');
        $this->load->view('template/footer', $data);
    }

    public function edit($id) {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        $data['lokasi'] = $this->MLokasi->get_by_id($id);
        
        if ($this->input->post()) {
            $this->MLokasi->update($id, $this->input->post());
            redirect('admin/mnj_lokasi');
        }
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/edit_lokasi');
        $this->load->view('template/footer', $data);
    }

    public function hapus($id) {
        $this->MLokasi->delete($id);
        redirect('admin/mnj_lokasi');
    }
}


?>