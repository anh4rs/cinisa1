<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    function getallPasar(){
        $this->db->select('pasar_nama');
        $this->db->from('pasar');
        $this->db->group_by(array('kecamatan_id'));
        return $this->db->get();
    }

    function getallPasarGroupBy(){

        $this->db->select('*')->from('pasar')
            ->group_start()
            ->where('kecamatan_id', '1')
            ->group_end()
           ->get();    
    }


    function getkec(){
        return $this->db->get('kecamatan');
    }    

    function getpasar(){
        return $this->db->get('pasar');
    }
}

/* End of file Laporan_model.php */
/* Location: ./application/models/Laporan_model.php */