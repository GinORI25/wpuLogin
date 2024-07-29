<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
   
        function update_data(){
            return $this->db->get('user');
        }
     
        function hapus_data($id,$produk){
            $this->db->where($id);
            $this->db->delete($produk);
        }
    
}