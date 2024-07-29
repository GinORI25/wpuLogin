<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');  
        if(!$this->session->userdata('email')){
            redirect('auth/blocked');
        }
    }

    public function index()
    {
        $data['title'] = 'Add Account'; 
        $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();
     
        
         $data['data'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function registration()
    {
        
        $this->form_validation->set_rules('name', 'Name','required|trim');
        $this->form_validation->set_rules('email', 'Email','required|trim|valid_email|is_unique[user.email]',
        [
            'is_unique' => 'this email has alredy registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',
        [
            'matches' => 'password dont match!',
            'min_length' => 'password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('role_id', 'Role','required|trim');

        if ($this->form_validation->run() == false){
            $data['title'] = 'user Registration';
            $this->load->view('templates/auth_header',$data);
            $this->load->view('admin/registration');
            $this->load->view('templates/auth_footer');
        }else {
            $data = [
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'),
                    PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id', true),
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
            Add new account SUCCESS
          </div>');
            redirect('admin');
        }
    }

    public function account()
    {
        $data['title'] = 'Data Account'; 
        $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();
         $this->load->model('Menu_model', 'account');

         $data['account'] = $this->account->getAccount();
         $data['users'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/account', $data);
        $this->load->view('templates/footer');
    }
    public function editrole()
{
    $data['title'] = 'Edit role'; 
        $data['user'] = $this->db->get_where('user', ['email' =>
         $this->session->userdata('email')])->row_array();

         $data['account'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('role_id', 'Role', 'trim|required');
        

            
        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/account', $data);
            $this->load->view('templates/footer');
        }else{
            $id = $this->input->post('id');
            $role_id = $this->input->post('role_id');
          
           
            $this->db->set('role_id', $role_id);
            
            $this->db->where('id', $id);
            $this->db->update('user');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            congrats your produk has been editing
          </div>');
            redirect('admin/account');
        }
    }
   
}