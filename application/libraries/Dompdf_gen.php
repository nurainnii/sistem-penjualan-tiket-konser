<?php
use Dompdf\Dompdf;

class Dompdf_gen {
    public $dompdf;

    public function __construct() {
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
        $this->dompdf = new Dompdf();
    }
}
