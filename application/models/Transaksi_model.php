<?php

class Transaksi_model extends CI_Model
{
    public function getTransaksi($date = null) 
    {
        if ($date === null) {
            return $this->db->get('transaksi')->result_array();
        } else {
            return $this->db->get_where('transaksi', ['tanggal_transaksi' => $date])->result_array();
        };
        
    }
}