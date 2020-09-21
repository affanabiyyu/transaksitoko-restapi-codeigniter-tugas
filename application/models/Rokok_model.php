<?php

class Rokok_model extends CI_Model
{
    public function getRokok($id = null) 
    {
        if ($id === null) {
            return $this->db->get('rokok')->result_array();
        } else {
            return $this->db->get_where('rokok', ['id_rokok' => $id])->result_array();
        }
        
    }
}