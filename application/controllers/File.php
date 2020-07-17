<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class File extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('File_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->File_model->total_rows($q);
        $file = $this->File_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $fotoprofil = $this->session->userdata('gambar');
        $nama = $this->session->userdata('nama');
        $role = $this->session->userdata('role');

        $data = array(
            'file_data' => $file,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'foto' => $fotoprofil,
            'nama' => $nama,
            'role' => $role,
            'title' => 'File'
        );
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('file/tbl_file_list', $data);
        $this->load->view('template/footer');
    }

    public function create()
    {
        $fotoprofil = $this->session->userdata('gambar');
        $nama = $this->session->userdata('nama');
        $role = $this->session->userdata('role');

        $data = array(
            'action' => site_url('file/create_action'),
            'id_file' => set_value('id_file'),
            'judul' => set_value('judul'),
            'nama_file' => set_value('nama_file'),
            'foto' => $fotoprofil,
            'nama' => $nama,
            'role' => $role,
            'title' => 'Upload File',
            'button' => 'Upload'
        );
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('file/tbl_file_form', $data);
        $this->load->view('template/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'judul' => $this->input->post('judul', TRUE),
                'nama_file' => $this->input->post('nama_file', TRUE),
                'destination' => $this->_upload_file()
            );

            $this->File_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('file'));
        }
    }

    public function update($id)
    {
        $row = $this->File_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('file/update_action'),
                'id_file' => set_value('id_file', $row->id_file),
                'judul' => set_value('judul', $row->judul),
                'nama_file' => set_value('nama_file', $row->nama_file),
            );
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('file/tbl_file_form', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('file'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_file', TRUE));
        } else {
            $data = array(
                'judul' => $this->input->post('judul', TRUE),
                'nama_file' => $this->input->post('nama_file', TRUE),
            );

            $this->File_model->update($this->input->post('id_file', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('file'));
        }
    }

    public function delete($id)
    {
        $row = $this->File_model->get_by_id($id);

        if ($row) {
            $this->File_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('file'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('file'));
        }
    }

    private function _upload_file()
    {
        $uploadFile = [];

        $config['upload_path'] = 'uploads/file/opop/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
        $config['max_size'] = 0;
        $config['file_name'] = 'file' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $fileData = $this->upload->data();
            $desti = $fileData['upload_path'] . $fileData['filename'];

            return $desti;
            // return $this->upload->data('file_name');
        }

        // $this->upload->initialize($config);

        // if (@$_FILES['file']['name'] != null) {
        //     if ($this->upload->do_upload('file')) {
        //         $post['file'] = $this->upload->data('file_name');
        //     }
        // }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('nama_file', 'nama file', 'trim|required');
        $this->form_validation->set_rules();

        $this->form_validation->set_rules('id_file', 'id_file', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
