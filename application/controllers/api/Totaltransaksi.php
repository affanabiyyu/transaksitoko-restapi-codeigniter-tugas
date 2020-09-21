<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class TotalTransaksi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TotalTransaksi_model', 'totaltransaksi');
    }

    public function index_get()
    {

        $totaltransaksi = $this->totaltransaksi->getTotalTransaksi();
       
        if ($totaltransaksi) {
            $this->response([
                'status' => true,
                'data' => $totaltransaksi
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