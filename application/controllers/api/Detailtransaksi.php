<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class DetailTransaksi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DetailTransaksi_model', 'detailtransaksi');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $detailtransaksi = $this->detailtransaksi->getDetailTransaksi();
        } else {
            $detailtransaksi = $this->detailtransaksi->getDetailTransaksi($id);
        }
        
        
        if ($detailtransaksi) {
            $this->response([
                'status' => true,
                'data' => $detailtransaksi
            ], REST_Controller::HTTP_OK);
        }
        else {
            $this->response([
                'status' => false,
                'data' => "Data tidak ditemukan."
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}