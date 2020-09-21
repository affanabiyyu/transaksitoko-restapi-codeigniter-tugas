<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Transaksi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model', 'transaksi');
    }

    public function index_get()
    {
        $date = $this->get('date');
        if ($date === null) {
            $transaksi = $this->transaksi->getTransaksi();
        } else {
            $transaksi = $this->transaksi->getTransaksi($date);
        }
        
        
        if ($transaksi) {
            $this->response([
                'status' => true,
                'data' => $transaksi
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