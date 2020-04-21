<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('kecamatan_model', 'kec');
        // $this->load->model('pasar_model', 'pasar');
        $this->load->model('Laporan_model', 'lap');

    }
    public function index()
    {

        $data= [];

        $this->db->select('kecamatan.kecamatan_nama as namakec, COUNT(pasar.kecamatan_id) AS total');
        $this->db->from('pasar');
        $this->db->join('kecamatan', 'pasar.kecamatan_id = kecamatan.kecamatan_id', 'left');
        $this->db->group_by('pasar.kecamatan_id');
        $this->db->order_by('pasar.kecamatan_id', 'ASC');
        $sql1 = $this->db->get()->result_array();

        $this->db->select(['pasar_nama AS namapas']);
        $this->db->from('pasar');
        $this->db->order_by('kecamatan_id', 'ASC');
        $psql = $this->db->get();
        $sql2 = $psql->result_array();
        $totalsql2 = $psql->num_rows();


        $this->db->select('sembako_id,nama_bahan');
        $this->db->from('harga');
        $this->db->group_by('nama_bahan');
        $bhnsql = $this->db->get();
        $sqlbhn = $bhnsql->result_array();
        $totalsqlbhn = $bhnsql->num_rows();
        // for ($i=1; $i<= $totalsql2; $i++ ) {
        //     echo "aku <br>";
        // }
        // 
        // foreach ($totalsql2 ) {
        //     echo "aku <br>";
        // }
        // echo ($totalsql2 % 2 ) === 0 ? '0' : 'Genap';
        // // echo ($totalsql2 % 2 ) ;

        echo "<pre>";
        print_r($sqlbhn);
        die();

        $data = [
                'qkec' => $sql1,
                'qpas' => $sql2,
                'totalsql2' => $totalsql2,
        ];


        $this->load->view('tes',$data);

    }




}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */