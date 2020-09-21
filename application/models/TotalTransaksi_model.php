<?php

class TotalTransaksi_model extends CI_Model
{
    public function getTotalTransaksi() 
    {
        return $this->db->get('total_transaksi')->result_array();
    }
}