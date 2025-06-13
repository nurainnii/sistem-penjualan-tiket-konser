<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('MUser');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('login');
    }

    public function proses() {
    $email = $this->input->post('email', TRUE);
    $password_input = $this->input->post('password', TRUE); 


    $user = $this->MUser->get_user_by_email($email);

    if ($user) { 
        if (md5($password_input) === $user['password']) { 
            $this->session->set_userdata([
                'id_user' => $user['id_user'],
                'email' => $user['email'],
                'nama' => $user['nama'],
                'role' => $user['role'],
                'logged_in' => TRUE
            ]);

            if ($user['role'] == 'admin') {
                redirect('admin/dashboard');
            } else {
                redirect('user/dashboard');
            }
        } else {
            $this->session->set_flashdata('error', 'Email atau password salah!');
            redirect('login');
        }
    } else {
        $this->session->set_flashdata('error', 'Email atau password salah!');
        redirect('login');
    }
}

    public function proses_register() {
        $nama     = $this->input->post('nama', TRUE);
        $email    = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);

        // Cek apakah email sudah terdaftar
        if ($this->MUser->get_user_by_email($email)) {
            $this->session->set_flashdata('error', 'Email sudah digunakan!');
            redirect('login');
        }

        // simpan data
        $data = [
            'nama'       => $nama,
            'email'      => $email,
            'password'  => md5($password),
            'role'       => 'pembeli', 
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->MUser->register_user($data);
        $this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
        redirect('login');
    }

    public function lupa_password() {
        $this->load->view('user/template/header');
        $this->load->view('lupa_password');
        $this->load->view('user/template/footer');
    }

    public function cek_email() {
        $email = $this->input->post('email', TRUE);
        $user = $this->MUser->get_user_by_email($email);

        if ($user) {
            $this->session->set_userdata('reset_email', $email);
            redirect('login/reset_password');
        } else {
            $this->session->set_flashdata('error', 'Email tidak ditemukan.');
            redirect('login/lupa_password');
        }
    }

    public function reset_password() {
        if (!$this->session->userdata('reset_email')) {
            redirect('login/lupa_password');
        }

        $this->load->view('user/template/header');
        $this->load->view('reset_password');
        $this->load->view('user/template/footer');
    }

    public function simpan_password_baru() {
        $email = $this->session->userdata('reset_email');
        $password_baru = $this->input->post('password', TRUE);

        if ($email && $password_baru) {
            $this->db->where('email', $email);
            $this->db->update('users', ['password' => md5($password_baru)]);

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('success', 'Password berhasil diubah. Silakan login.');
            redirect('login');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan. Silakan ulangi.');
            redirect('login/reset_password');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
