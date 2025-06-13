<?php

class Mnj_kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MKategori');
        $this->load->model('MKonser');
    }

    public function index() {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();
        
        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        $data['kategori'] = $this->MKategori->get_all_with_konser();
        $data['konser'] = $this->MKonser->get_all();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/mnj_kategori', $data);
        $this->load->view('template/footer');
    }
    
    public function tambah() {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
                $data['konser'] = $this->MKonser->get_all();


        if ($this->input->post()) {
            $this->MKategori->insert($this->input->post());
            redirect('admin/mnj_kategori');
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/tambah_kategori', $data);
        $this->load->view('template/footer');
    }

    public function edit($id){
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        $data['kategori'] = $this->MKategori->get_kategori_by_id($id);
        $data['konser'] = $this->MKonser->get_all();

        if ($this->input->post()) {
            $this->MKategori->update($id, $this->input->post());
            redirect('admin/mnj_kategori');
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/edit_kategori', $data);
        $this->load->view('template/footer');
    }


    public function hapus($id) {
        $this->MKategori->hapus($id);
        redirect('admin/mnj_kategori');
    }
}


?>