<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Controller {

    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $name            = $this->input->post('name');
        $no_meja            = $this->input->post('no_meja');


        $invoice = array (
            'name'                          => $name,
            'no_meja'                       => $no_meja,
            'tanggal_pesan'                 => date('Y-m-d H:i:s'),
            'batas_bayar'                   => date('Y-m-d H:i:s', mktime(date('H') + 1,date('i'),date('s'),date('m'),date('d'),date('Y'))),

        );
        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item){
            $data = array(
                    'id_invoice'       => $id_invoice,
                    'id_brg'           => $item['id'],
                    'name'             => $item['name'],
                    'jumlah'           => $item['qty'],
                    'harga'            => $item['price'],
            );
            $this->db->insert('pemesanan', $data);
        }
        return TRUE;
    }
    public function ambil_id_invoice($id_invoice)
    {
        $result = $this->db->where('id',$id_invoice)->limit(1)->get('tb_invoice');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }
    }
    public function ambil_id_pesanan($id_invoice)
    {
        $result = $this->db->where('id_invoice',$id_invoice)->get('pemesanan');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }
  

    

    }