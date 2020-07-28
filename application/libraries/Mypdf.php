<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('assets/vendor/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class Mypdf
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function generate($view, $data = array(), $paper = 'A4', $orientation = 'portrait')
    {
        $filename = 'Laporan-'.date("Y-m-d H:i:s");
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->loadhtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename.".pdf", array("Attachment" => FALSE));
        exit(0);
    }
}
?>