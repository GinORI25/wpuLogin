<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
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
        $data['title'] = 'Menu Management'; 
        $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();
     

         $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        }else{
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                    New Menu Added! </div>');
                    redirect('menu');
        }
    }

public function editmenu()
    {

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id', true);
            $menu = $this->input->post('menu', true);
        
            $update = array(
                'menu' => $menu,
              
                
            );

            $this->db->where('id', $id);
            $this->db->update('user_menu', $update);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Berhasil mengedit!</div>');
            redirect('menu');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Gagal mengedit!</div>');
            redirect('menu');
        }
    }


    public function deletemenu($id)
    {

            $this->db->where('id', $id);
            $this->db->delete('user_menu');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Berhasil menghapus !</div>');
            redirect('menu');
    }


public function subMenu()
{
    $data['title'] = 'Submenu Management'; 
    $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();
     $this->load->model('Menu_model', 'menu');

    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu_id', 'required');
    $this->form_validation->set_rules('url', 'Url', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');
    $this->form_validation->set_rules('is_active', 'Is_active', 'required');

    if($this->form_validation->run() == false) {
     $this->load->view('templates/header', $data);
     $this->load->view('templates/sidebar', $data);
     $this->load->view('templates/topbar', $data);
     $this->load->view('menu/submenu', $data);
     $this->load->view('templates/footer');
    }else {
    $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
    ];
        $this->db->insert('user_sub_menu', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        New SubMenu Added! </div>');
        redirect('menu/submenu');
}
}

public function editsubmenu()
    {
        
        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id', true);
            $title = $this->input->post('title', true);
            $menu_id = $this->input->post('menu_id', true);
            $url = $this->input->post('url', true);
            $icon = $this->input->post('icon', true);
            $is_active = $this->input->post('is_active', true);
        

            $updatee = array(
                'title' => $title,
                'menu_id' => $menu_id,
                'url' => $url,
                'icon' => $icon,
                'is_active' => $is_active
                
            );

            $this->db->where('id', $id);
            $this->db->update('user_sub_menu', $updatee);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Berhasil mengedit!</div>');
            redirect('menu/submenu');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Gagal mengedit!</div>');
            redirect('menu/submenu');
        }
    }

    public function deletesubmenu($id)
    {

            $this->db->where('id', $id);
            $this->db->delete('user_sub_menu');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Berhasil menghapus !</div>');
            redirect('menu/submenu');
    }


public function role()
{
    $data['title'] = 'Role'; 
    $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();
 
     $data['role'] = $this->db->get('user_role')->result_array();

     $this->form_validation->set_rules('role', 'Role', 'required');

     if($this->form_validation->run() == false) {
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('menu/role', $data);
    $this->load->view('templates/footer');
    }else{
    $data = [
        'role' => $this->input->post('role'),
       
      ];
        $this->db->insert('user_role', $data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        New role added!</div>');
        redirect('menu/role');
}



}
}