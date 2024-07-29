<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('email')){
            redirect('auth/blocked');
        }
       
    }
    
    public function index()
    {
        $data['title'] = 'Antrian'; 
        $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();
     
         $data['produk'] = $this->db->get('produk')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    
       public function ListProduk()
    {
        $data['title'] = 'List Produk'; 
        $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();
     
      $data['produk'] = $this->db->get('produk')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/ListProduk', $data);
        $this->load->view('templates/footer');
    }
 
    public function tambah_keranjang($id){
        $this->load->model('Produk_model');
        
        $produk = $this->Produk_model->find($id);
        $data = array(
                'id'      => $produk->id_brg,
                'qty'     => 1,
                'price'   => $produk->harga,
                'name'    => $produk->name
              
        );
        
        $this->cart->insert($data);
        redirect('user/ListProduk');
    }

    public function detail_keranjang()
    {
        $data['title'] = 'Detail Keranjang'; 
        $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();
     
         $data['produk'] = $this->db->get('produk')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail_keranjang', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('user/ListProduk');
    }

    public function pemesanan()
    {
        $data['title'] = 'Checkout page'; 
        $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();
     
         $data['produk'] = $this->db->get('produk')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/pemesanan', $data);
        $this->load->view('templates/footer');

  
    }
    
    public function proses_pesan()
    {
        $data['title'] = 'Proses Pemesanan'; 
        $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();
     
         $this->load->model('Invoice_model');
        $is_processed = $this->Invoice_model->index();
        if($is_processed){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/proses_pesan', $data);
            $this->load->view('templates/footer');
    
            $this->cart->destroy();
        }else{
            echo 'maaf pesanan anda gagal dipesan  ';
        }
        
    }
   
}
