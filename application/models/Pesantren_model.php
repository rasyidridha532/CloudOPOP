<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pesantren_model extends CI_Model
{

    public $table = 'tbl_pesantren';
    public $id = 'id_pesantren';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_pesantren.id_kecamatan');
        $this->db->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_pesantren.id_kabupaten');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_pesantren.id_kecamatan');
        $this->db->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_pesantren.id_kabupaten');
        $this->db->like('id_pesantren', $q);
        $this->db->or_like('nama_pesantren', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('nama_kabupaten', $q);
        $this->db->or_like('nama_kecamatan', $q);
        $this->db->or_like('link_pesantren', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_pesantren.id_kecamatan');
        $this->db->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_pesantren.id_kabupaten');
        $this->db->like('id_pesantren', $q);
        $this->db->or_like('nama_pesantren', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('nama_kabupaten', $q);
        $this->db->or_like('nama_kecamatan', $q);
        $this->db->or_like('link_pesantren', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_kabupaten()
    {
        $this->db->select('id_kabupaten,nama_kabupaten');
        $query = $this->db->get('tbl_kabupaten');
        return $query;
    }

    function get_kecamatan_by_id_kabupaten($id)
    {
        $this->db->where('id_kabupaten', $id);
        $query = $this->db->get('tbl_kecamatan');
        return $query;
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}
