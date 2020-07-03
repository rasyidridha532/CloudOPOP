<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pesantren extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pesantren');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_pesantren->total_rows($q);
        $pesantren = $this->M_pesantren->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $fotoprofil = $this->session->userdata('gambar');
        $nama = $this->session->userdata('nama');
        $role = $this->session->userdata('role');

        $data = array(
            'pesantren_data' => $pesantren,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'title' => 'Pesantren',
            'foto' => $fotoprofil,
            'nama' => $nama,
            'role' => $role
        );

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('pesantren/list_pesantren');
        $this->load->view('template/footer');
    }

    public function temp()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_pesantren->total_rows($q);
        $pesantren = $this->M_pesantren->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $fotoprofil = $this->session->userdata('gambar');
        $nama = $this->session->userdata('nama');
        $role = $this->session->userdata('role');

        $data = array(
            'pesantren_data' => $pesantren,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'title' => 'Pesantren',
            'foto' => $fotoprofil,
            'nama' => $nama,
            'role' => $role
        );
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('pesantren/list_pesantren', $data);
        $this->load->view('template/footer');
    }

    public function read($id)
    {
        $row = $this->M_pesantren->get_by_id($id);
        if ($row) {
            $data = array(
                'id_pesantren' => $row->id_pesantren,
                'nama_pesantren' => $row->nama_pesantren,
                'alamat' => $row->alamat,
                'id_kabupaten' => $row->id_kabupaten,
                'id_kecamatan' => $row->id_kecamatan,
                'produk' => $row->produk,
            );
            $this->load->view('pesantren/tbl_pesantren_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pesantren'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pesantren/create_action'),
            'id_pesantren' => set_value('id_pesantren'),
            'nama_pesantren' => set_value('nama_pesantren'),
            'alamat' => set_value('alamat'),
            'id_kabupaten' => set_value('id_kabupaten'),
            'id_kecamatan' => set_value('id_kecamatan'),
            'produk' => set_value('produk'),
        );
        $this->load->view('pesantren/tbl_pesantren_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_pesantren' => $this->input->post('nama_pesantren', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'id_kabupaten' => $this->input->post('id_kabupaten', TRUE),
                'id_kecamatan' => $this->input->post('id_kecamatan', TRUE),
                'produk' => $this->input->post('produk', TRUE),
            );

            $this->M_pesantren->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pesantren'));
        }
    }

    public function update($id)
    {
        $row = $this->M_pesantren->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pesantren/update_action'),
                'id_pesantren' => set_value('id_pesantren', $row->id_pesantren),
                'nama_pesantren' => set_value('nama_pesantren', $row->nama_pesantren),
                'alamat' => set_value('alamat', $row->alamat),
                'id_kabupaten' => set_value('id_kabupaten', $row->id_kabupaten),
                'id_kecamatan' => set_value('id_kecamatan', $row->id_kecamatan),
                'produk' => set_value('produk', $row->produk),
            );
            $this->load->view('pesantren/tbl_pesantren_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pesantren'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pesantren', TRUE));
        } else {
            $data = array(
                'nama_pesantren' => $this->input->post('nama_pesantren', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'id_kabupaten' => $this->input->post('id_kabupaten', TRUE),
                'id_kecamatan' => $this->input->post('id_kecamatan', TRUE),
                'produk' => $this->input->post('produk', TRUE),
            );

            $this->M_pesantren->update($this->input->post('id_pesantren', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pesantren'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_pesantren->get_by_id($id);

        if ($row) {
            $this->M_pesantren->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pesantren'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pesantren'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_pesantren', 'nama pesantren', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('id_kabupaten', 'id kabupaten', 'trim|required');
        $this->form_validation->set_rules('id_kecamatan', 'id kecamatan', 'trim|required');
        $this->form_validation->set_rules('produk', 'produk', 'trim|required');

        $this->form_validation->set_rules('id_pesantren', 'id_pesantren', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_pesantren.xls";
        $judul = "tbl_pesantren";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Pesantren");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
        xlsWriteLabel($tablehead, $kolomhead++, "Kabupaten");
        xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");
        xlsWriteLabel($tablehead, $kolomhead++, "Produk");

        foreach ($this->M_pesantren->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_pesantren);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
            xlsWriteLabel($tablebody, $kolombody++, $data->id_kabupaten);
            xlsWriteLabel($tablebody, $kolombody++, $data->id_kecamatan);
            xlsWriteLabel($tablebody, $kolombody++, $data->produk);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file Pesantren.php */
/* Location: ./application/controllers/Pesantren.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 16:38:01 */
/* http://harviacode.com */