<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model
{

    public function tampildata()
    {
        return $this->db->get('produk');
    }

    public function find($id)
    {
        $result = $this->db->where('id_brg', $id)
                   ->limit(1)
                   ->get('produk');
                if($result->num_rows() > 0){
                    return $result->row();
                }else{
                    return array();
                }
    } 

}