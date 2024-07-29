<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kasir extends CI_Controller 
{

    public function index()
    {
        $data['title'] = 'Kasir MCD'; 
        $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();
     
         $data['invoice'] = $this->db->get('tb_invoice')->result_array();
         
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kasir/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_invoice){
        $data['invoice'] = $this->Invoice_model->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->Invoice_model->ambil_id_pesanan($id_invoice);

        $data['title'] = 'Kasir MCD'; 
        $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();
     
         $data['invoice'] = $this->db->get('tb_invoice')->result_array();
         
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kasir/detail', $data);
        $this->load->view('templates/footer');
    }

}