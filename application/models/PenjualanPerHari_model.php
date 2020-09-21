<?php

class PenjualanPerHari_model extends CI_Model
{
    public function getPenjualanPerHari($date) 
    {
        $arrayTransaksi = $this->db->get_where('transaksi', ['tanggal_transaksi' => $date])->result_array();
        for ( $i = 0 ;  $i < (sizeof($arrayTransaksi)) ; $i ++ ) {
            $arrayIdTransaksi[$i] = $arrayTransaksi[$i]['id_transaksi'];
        };
        for ( $i = 0 ;  $i < (sizeof($arrayIdTransaksi)) ; $i ++ ) {
            $arrayDetailTransaksi[$i] = $this->db->get_where('detail_transaksi', ['id_transaksi' => $arrayIdTransaksi[$i]])->result_object();
            for ( $j = 0 ;  $j < (sizeof($arrayDetailTransaksi[$i])) ; $j ++ ) {
                $arrayDetailTransaksi[$i][$j]->harga_rokok = $this->db->get_where('rokok', ['id_rokok' => $arrayDetailTransaksi[$i][$j]->id_rokok])->result_object()[0]->harga_rokok;
                $arrayDetailTransaksi[$i][$j]->nama_rokok = $this->db->get_where('rokok', ['id_rokok' => $arrayDetailTransaksi[$i][$j]->id_rokok])->result_object()[0]->nama_rokok;
            }
        }
        return $arrayDetailTransaksi;
    }
}