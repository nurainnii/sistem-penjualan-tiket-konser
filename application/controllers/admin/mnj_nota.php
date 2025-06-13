<?php
require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;


class mnj_nota extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MTiket');
        $this->load->library('dompdf_gen');

    }

    public function index() {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();

        $data['tiket'] = $this->MTiket->get_all_tiket_with_nota();
        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/mnj_tiket', $data);
        $this->load->view('template/footer');
    }

    public function cetak($id){
        $data['tiket'] = $this->MTiket->get_tiket_by_id($id);
        $data['nota'] = $this->MTiket->get_nota_by_id($id);

        if (!$data['tiket'] || !$data['nota']) {
            show_error('Data tiket atau nota tidak ditemukan.');
            return;
        }

        $qrContent = $data['nota']->kode_nota;

        // QR code 
        $builder = new Builder(
            writer: new PngWriter(),
            data: $qrContent,
            encoding: new Encoding('UTF-8'),
            size: 150,
            margin: 10
        );

        $result = $builder->build();

        $qrImageData = base64_encode($result->getString());
        $data['qr_code'] = 'data:image/png;base64,' . $qrImageData;

        $html = $this->load->view('admin/nota_pdf', $data, TRUE);

        $this->dompdf_gen->dompdf->loadHtml($html);
        $this->dompdf_gen->dompdf->setPaper('A4', 'portrait');
        $this->dompdf_gen->dompdf->render();

        $nama_user = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower($data['tiket']->nama_user));
        $filename = "Nota_Ngonser_{$nama_user}.pdf";

        $this->dompdf_gen->dompdf->stream($filename, ["Attachment" => false]);
    }

    public function aktifkan($id) {
        $this->MTiket->update_status($id, 'selesai');

        $nota_ada = $this->MTiket->get_nota_by_id($id);
        if (!$nota_ada) {
            $kode_nota = 'NT' . strtoupper(uniqid());
            $data_nota = [
                'id_tiket' => $id,
                'kode_nota' => $kode_nota,
                'tanggal_terbit' => date('Y-m-d H:i:s'),
            ];
            $this->MTiket->insert_nota($data_nota);
        }

        redirect('admin/mnj_nota');
    }

    public function nonaktifkan($id) {
        $this->MTiket->update_status($id, 'dibayar');

        $nota_ada = $this->MTiket->get_nota_by_id($id);
        if (!$nota_ada) {
            $kode_nota = 'NT' . strtoupper(uniqid());
            $data_nota = [
                'id_tiket' => $id,
                'kode_nota' => $kode_nota,
                'tanggal_terbit' => date('Y-m-d H:i:s'),
            ];
            $this->MTiket->insert_nota($data_nota);
        }

        redirect('admin/mnj_nota');
    }

    public function delete($id_tiket) {
        $this->MTiket->delete_nota_by_tiket($id_tiket);
        $this->MTiket->delete_pembayaran_by_tiket($id_tiket);
        $this->MTiket->delete_tiket($id_tiket);

        redirect('admin/mnj_nota');
    }
}
?>