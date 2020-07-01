<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function proses_login()
    {
        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $email;
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[2]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'matches' => 'Password tidak sama!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('register');
        } else {
            $data = [
                'name' => $this->input->post('namalengkap'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password1')
            ];

            $this->db->insert('tbl_user', $data);
        }
    }

    public function proses_register()
    {
    }
}
