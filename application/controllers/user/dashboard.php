<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(['form', 'url']);
        $this->load->library('session');
    }
    
    public function index() {
        $this->load->model('MBooking');
        $this->load->model('MTiket');

        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();
        
        $data['konser'] = $this->MBooking->get_all_konser();
        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        $data['tiket_terakhir'] = $this->MTiket->get_last_tickets($user_id, 5);
        $data['konser'] = $this->MBooking->getActiveKonserWithSchedule(2);
        $data['konser_list'] = $this->MBooking->get_all_konser();


        $this->load->view('user/template/header');
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar', $data);
        $this->load->view('user/dashboard', $data);
        $this->load->view('user/template/footer');
    }
}

?>