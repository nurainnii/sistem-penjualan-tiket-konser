<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class tiket extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MBooking'); 
        $this->load->model('MTiket'); 
        if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata('error', 'Anda harus login untuk mengakses halaman ini.');
            redirect('Welcome');
        }
    }

    public function index() {
        $id_user_sekarang = $this->session->userdata('id_user');

        $data['riwayat_tiket'] = $this->MTiket->get_all_tickets_by_user($id_user_sekarang);
        
        $user = $this->db->get_where('users', ['id_user' => $id_user_sekarang])->row();
        $data['nama'] = $user->nama;
        $data['email'] = $user->email;

        $this->load->view('user/template/header');
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar', $data);
        $this->load->view('user/riwayat', $data); 
        $this->load->view('user/template/footer');
    }

    public function detail($id_tiket) {
        $id_user_sekarang = $this->session->userdata('id_user');

        $booking = $this->MBooking->get_booking_by_id($id_tiket);

        if (!$booking) {
            show_404(); 
        }
        
        if ($booking->id_user != $id_user_sekarang) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki hak akses untuk melihat tiket ini.');
            redirect('user/dashboard');
            return;
        }

        $status_tiket_ok = ($booking->status_booking === 'dibayar' || $booking->status_booking === 'selesai');
        $status_pembayaran_ok = ($booking->status_pembayaran === 'valid');

        if (!($status_tiket_ok && $status_pembayaran_ok)) {
            $this->session->set_flashdata('error', 'Mohon tunggu, Tiket sedang kami Proses.');
            redirect('user/dashboard');
            return;
        }

        $qrCodeData = 'TIKET-ID-' . $booking->id_booking;

        $builder = new Builder(
            writer: new PngWriter(),
            data: $qrCodeData,
            encoding: new Encoding('UTF-8'),
            size: 300,
            margin: 10,
            errorCorrectionLevel: ErrorCorrectionLevel::High,
            roundBlockSizeMode: RoundBlockSizeMode::Margin
        );

        $result = $builder->build();

        $data['qr_code'] = $result->getDataUri();
        
        $data['booking'] = $booking;

        $user = $this->db->get_where('users', ['id_user' => $id_user_sekarang])->row();
        $data['nama'] = $user->nama;
        $data['email'] = $user->email;

        $this->load->view('user/template/header');
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar', $data);
        $this->load->view('user/tiket_detail', $data);
        $this->load->view('user/template/footer');
    }
}
?>