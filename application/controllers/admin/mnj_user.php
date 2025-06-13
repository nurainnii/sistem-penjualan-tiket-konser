<?php

class mnj_user extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('MUser');
    }

    public function index() {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['users'] = $this->MUser->get_all();
        $data['nama'] = $user->nama;
        $data['email'] = $user->email;

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/mnj_user', $data);
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
        $this->load->view('admin/tambah_user', $data);
        $this->load->view('template/footer');
    }

    public function simpan() {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')), // Sesuai login yang pakai md5
            'role' => $this->input->post('role'),
            'created_at' => date('Y-m-d H:i:s') // opsional
        ];
        $this->MUser->insert($data);
        redirect('admin/mnj_user');
    }

    public function edit($id) {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        $data['user'] = $this->MUser->get_by_id($id);
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/edit_user', $data);
        $this->load->view('template/footer');
    }

    public function update($id) {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'role' => $this->input->post('role'),
        ];
        $password = $this->input->post('password');
        if (!empty($password)) {
            $data['password'] = md5($password);
        }

        $this->MUser->update($id, $data);
        redirect('admin/mnj_user');
    }

    public function delete($id) {
        $this->MUser->delete($id);
        redirect('admin/mnj_user');
    }
}
?>