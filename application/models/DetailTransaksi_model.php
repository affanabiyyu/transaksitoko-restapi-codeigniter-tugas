<?php

class DetailTransaksi_model extends CI_Model
{
    public function getDetailTransaksi($id = null) 
    {
        if ($id === null) {
            return $this->db->get('detail_transaksi')->result_array();
        } else {
            return $this->db->get_where('detail_transaksi', ['id_transaksi' => $id])->result_array();
        };
        
    }
}