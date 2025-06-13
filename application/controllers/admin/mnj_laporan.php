<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Mnj_laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
        redirect('login');
        }
        $this->load->model('MLaporan');
    }

    public function index() {
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();
        
        $data['laporan'] = $this->MLaporan->get_laporan_penjualan();
        $data['nama'] = $user->nama;
        $data['email'] = $user->email;

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/mnj_laporan', $data);
        $this->load->view('template/footer');
    }

    public function export_excel() {
        $laporan = $this->MLaporan->get_laporan_penjualan();

        require_once FCPATH . 'vendor/autoload.php';

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $judul = 'Laporan Penjualan Tiket Ngonser  (' . date('d-m-Y') . ')';
        $sheet->setCellValue('A1', $judul);
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setSize(16)->setBold(true);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        $header = ['No', 'Nama Konser', 'Total Terjual', 'Total Pendapatan', 'Tanggal Laporan'];
        $sheet->fromArray($header, NULL, 'A3');

        $sheet->getStyle('A3:E3')->getFont()->setBold(true);
        $sheet->getStyle('A3:E3')->getFill()->setFillType('solid')
            ->getStartColor()->setARGB('8A8A8A'); // warna hijau
        $sheet->getStyle('A3:E3')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('A3:E3')->getAlignment()->setHorizontal('center');

        $row = 4;
        $no = 1;
        foreach ($laporan as $data) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $data->nama_konser);
            $sheet->setCellValue('C' . $row, $data->total_terjual);
            $sheet->setCellValue('D' . $row, $data->total_pendapatan);
            $sheet->setCellValue('E' . $row, date('d-m-Y', strtotime($data->tanggal_laporan)));
            $row++;
        }

        foreach (range('A', 'E') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
            $sheet->getStyle("{$col}3:{$col}" . ($row - 1))->getBorders()->getAllBorders()->setBorderStyle('thin');
            $sheet->getStyle("{$col}4:{$col}" . ($row - 1))->getAlignment()->setHorizontal('center');
        }

        $sheet->getStyle("D4:D" . ($row - 1))
            ->getNumberFormat()->setFormatCode('#,##0');

        $filename = 'Laporan_Excel_' . date('Ymd') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function tambah(){
        $user_id = $this->session->userdata('id_user');
        $user = $this->db->get_where('users', ['id_user' => $user_id])->row();
        
        $data['nama'] = $user->nama;
        $data['email'] = $user->email;
        $data['laporan_data'] = $this->MLaporan->get_laporan_pendapatan();

        if ($this->input->post()) {
            $insert_data = [
                'id_konser' => $this->input->post('id_konser'),
                'total_terjual' => $this->input->post('total_terjual'),
                'total_pendapatan' => $this->input->post('total_pendapatan'),
                'tanggal_laporan' => $this->input->post('tanggal_laporan'),
                'id_user' => $user_id
            ];
            $this->MLaporan->insert_laporan($insert_data);
            $this->session->set_flashdata('success', 'Laporan berhasil ditambahkan.');
            redirect('admin/mnj_laporan');
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/tambah_laporan', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id){
        $this->MLaporan->delete_laporan($id);
        redirect('admin/mnj_laporan');
    }

}
