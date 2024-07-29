<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller 
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
        $data['title'] = 'Dashboard'; 
        $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();
     
     
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manager/index', $data);
        $this->load->view('templates/footer');
    }

    public function produk()
{
    $data['title'] = 'Insert Produk'; 
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();   
    $data['produk'] = $this->db->get('produk')->result_array();

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');
   
    if($this->form_validation->run() == false) {
     $this->load->view('templates/header', $data);
     $this->load->view('templates/sidebar', $data);
     $this->load->view('templates/topbar', $data);
     $this->load->view('manager/produk', $data);
     $this->load->view('templates/footer');
    }else{
        $data = [
            'name' => $this->input->post('name'),
            'harga' => $this->input->post('harga'),
            'keterangan' => $this->input->post('keterangan'),
            'status' => $this->input->post('status'),
            'image' => 'default.jpg'
          ];
            $this->db->insert('produk', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            New produk added!</div>');
            redirect('manager/produk');
    }

    function hapusRole($id){
        $data = array('id' => $id);
        $this->m_data->hapus_data($data,'id');
        redirect('manager/produk');
    }



}

public function roleAccess($role_id)
{
    $data['title'] = 'Role Access'; 
    $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();
 
     $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
     $data['menu']  = $this->db->get('user_menu')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('manager/roleAccess', $data);
    $this->load->view('templates/footer');
}


public function editproduk()
    {
        // $data['produk'] = $this->db->get('produk')->row_array();

        // $this->form_validation->set_rules('name', 'Name', 'trim|required');
        // $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        // $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        // $this->form_validation->set_rules('status', 'Status', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $id_brg = $this->input->post('id_brg', true);
            $name = $this->input->post('name', true);
            $harga = $this->input->post('harga', true);
            $keterangan = $this->input->post('keterangan', true);
            $status = $this->input->post('status', true);
         


            $update = array(
                'name' => $name,
                'harga' => $harga,
                'keterangan' => $keterangan,
                'status' => $status
                
            );

            $this->db->where('id_brg', $id_brg);
            $this->db->update('produk', $update);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Berhasil mengedit!</div>');
            redirect('manager/produk');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Gagal mengedit!</div>');
            redirect('manager/produk');
        }
    }


    public function deleteproduk($id_brg)
    {

            $this->db->where('id_brg', $id_brg);
            $this->db->delete('produk');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Berhasil menghapus !</div>');
            redirect('manager/produk');
    }

 public function editproduks()
    {
        $data['title'] = 'Edit produks'; 
        $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();

         $data['produk'] = $this->db->get('produk')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');     

            
        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manager/editproduks', $data);
            $this->load->view('templates/footer');
        }else{
            $id_brg = $this->input->post('id_brg'); 
            $name = $this->input->post('name');
            $harga = $this->input->post('harga');
            $keterangan = $this->input->post('keterangan');
            $status = $this->input->post('status');
           
            
            $upload_image = $_FILES['image']['name'];

                if($upload_image){
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './assets/img/produk/';
                  
                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('image')){
                        $old_image = $data['produk']['image'];
                        if($old_image != 'default.jpg'){
                            unlink (FCPATH . 'assets/img/produk/' . $old_image);
                        }

                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    }else {
                        echo $this->upload->display_errors();
                    }
                }

            $this->db->set('name', $name);
            $this->db->set('harga', $harga);
            $this->db->set('keterangan', $keterangan);
            $this->db->set('status', $status);
            
            $this->db->where('id_brg', $id_brg);
            $this->db->update('produk');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            congrats your produk has been editing
          </div>');
            redirect('manager/List');
        }
    }

  
    public function List()
    {
        $data['title'] = 'List Produk'; 
        $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();
     
      $data['produk'] = $this->db->get('produk')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manager/List', $data);
        $this->load->view('templates/footer');
    }

    public function DetailList()
    {
        $data['title'] = 'List Produk'; 
        $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();
     
      $data['produk'] = $this->db->get('produk')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manager/DetailList', $data);
        $this->load->view('templates/footer');
    }
   
}