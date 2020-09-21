<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Rokok extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rokok_model', 'rokok');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $rokok = $this->rokok->getRokok();
        } else {
            $rokok = $this->rokok->getRokok($id);
        }
        
        
        if ($rokok) {
            $this->response([
                'status' => true,
                'data' => $rokok
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