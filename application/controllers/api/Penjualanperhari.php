<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class PenjualanPerHari extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenjualanPerHari_model', 'penjualanperhari');
    }

    public function index_get()
    {
        $date = $this->get('date');
        $penjualanperhari = $this->penjualanperhari->getPenjualanPerHari($date);
        
        if ($penjualanperhari) {
            $this->response([
                'status' => true,
                'data' => $penjualanperhari
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