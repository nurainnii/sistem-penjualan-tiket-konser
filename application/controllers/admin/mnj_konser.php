<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mnj_konser extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MKonser');
        $this->load->helper(['form', 'url']);
    }

    public function index() {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['nama'] = $user->nama;
        $data['email'] = $user->email;

        $data['konser'] = $this->MKonser->get_all_konser();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/mnj_konser', $data);
        $this->load->view('template/footer');
    }

    public function tambah() {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['nama'] = $user->nama;
        $data['email'] = $user->email;

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/tambah_konser');
        $this->load->view('template/footer');
    }

    public function simpan() {
        $data = [
            'nama_konser' => $this->input->post('nama_konser'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => $this->input->post('status'),
            'gambar' => $this->_uploadGambar()
        ];
        $this->MKonser->insert_konser($data);
        redirect('admin/mnj_konser/');
    }

    public function edit($id) {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        $data['konser'] = $this->MKonser->get_konser_by_id($id);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/edit_konser', $data);
        $this->load->view('template/footer');
    }

    public function update($id) {
        $data = [
            'nama_konser' => $this->input->post('nama_konser'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => $this->input->post('status'),
        ];

        if ($_FILES['gambar']['name']) {
            $data['gambar'] = $this->_uploadGambar();
        }

        $this->MKonser->update_konser($id, $data);
        redirect('admin/mnj_konser/');
    }

    public function hapus($id) {
        $this->MKonser->delete_konser($id);
        redirect('admin/mnj_konser');
    }

    private function _uploadGambar() {
        $config['upload_path'] = './uploads/konser/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data('file_name');
        }
        return null;
    }
}
