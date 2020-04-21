<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Harga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Harga_model');
        $this->load->model('Kecamatan_model', 'kecamatan');
        $this->load->model('Pasar_model', 'pasar');
        $this->load->model('Sembako_model', 'sembako');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'harga/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'harga/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'harga/index';
            $config['first_url'] = base_url() . 'harga/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Harga_model->total_rows($q);
        $harga = $this->Harga_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        //echo $config['total_rows'];
        $data = array(
            'title' => 'List harga',
            'harga_data' => $harga,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->display('admin/harga/harga_list', $data);
    }

    public function read($id)
    {
        $row = $this->Harga_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Detail Harga',
                'harga_id' => $row->harga_id,
                'kecamatan_id' => $row->kecamatan_id,
                'pasar_id' => $row->pasar_id,
                'sembako_id' => $row->sembako_id,
                'nama_bahan' => $row->nama_bahan,
                'satuan' => $row->satuan,
                'harga_borongan' => $row->harga_borongan,
                'harga_eceran' => $row->harga_eceran,
                'keterangan' => $row->keterangan,
                'waktu' => $row->waktu,
            );
            $this->template->display('admin/harga/harga_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('harga'));
        }
    }

    public function create()
    {
        $kecamatan = $this->kecamatan->get_all_asc()->result();
        $sembako = $this->sembako->get_all_asc()->result();

        $data = array(
            'title' => 'Form tambah harga barang',
            'button' => 'Create',
            'action' => site_url('harga/create_action'),
            'harga_id' => set_value('harga_id'),
            'kecamatan_id' => set_value('kecamatan_id'),
            'pasar_id' => set_value('pasar_id'),
            'sembako_id' => set_value('sembako_id'),
            'nama_bahan' => set_value('nama_bahan'),
            'satuan' => set_value('satuan'),
            'harga_borongan' => set_value('harga_borongan'),
            'harga_eceran' => set_value('harga_eceran'),
            'keterangan' => set_value('keterangan'),
            'kecamatans' => $kecamatan,
            'sembakos' => $sembako,

        );
        $this->template->display('admin/harga/harga_form', $data);
    }


    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kecamatan_id' => $this->input->post('kecamatan_id', TRUE),
                'pasar_id' => $this->input->post('pasar_id', TRUE),
                'sembako_id' => $this->input->post('sembako_id', TRUE),
                'nama_bahan' => $this->input->post('nama_bahan', TRUE),
                'satuan' => $this->input->post('satuan', TRUE),
                'harga_borongan' => $this->input->post('harga_borongan', TRUE),
                'harga_eceran' => $this->input->post('harga_eceran', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
            );

            $this->Harga_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('harga'));
        }
    }

    public function update($id)
    {
        $row = $this->Harga_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('harga/update_action'),
                'harga_id' => set_value('harga_id', $row->harga_id),
                'kecamatan_id' => set_value('kecamatan_id', $row->kecamatan_id),
                'pasar_id' => set_value('pasar_id', $row->pasar_id),
                'sembako_id' => set_value('sembako_id', $row->sembako_id),
                'nama_bahan' => set_value('nama_bahan', $row->nama_bahan),
                'satuan' => set_value('satuan', $row->satuan),
                'harga_borongan' => set_value('harga_borongan', $row->harga_borongan),
                'harga_eceran' => set_value('harga_eceran', $row->harga_eceran),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'waktu' => set_value('waktu', $row->waktu),
            );
            $this->template->display('admin/harga/harga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('harga'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('harga_id', TRUE));
        } else {
            $data = array(
                'kecamatan_id' => $this->input->post('kecamatan_id', TRUE),
                'pasar_id' => $this->input->post('pasar_id', TRUE),
                'sembako_id' => $this->input->post('sembako_id', TRUE),
                'nama_bahan' => $this->input->post('nama_bahan', TRUE),
                'satuan' => $this->input->post('satuan', TRUE),
                'harga_borongan' => $this->input->post('harga_borongan', TRUE),
                'harga_eceran' => $this->input->post('harga_eceran', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'waktu' => $this->input->post('waktu', TRUE),
            );

            $this->Harga_model->update($this->input->post('harga_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('harga'));
        }
    }

    public function delete($id)
    {
        $row = $this->Harga_model->get_by_id($id);

        if ($row) {
            $this->Harga_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('harga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('harga'));
        }
    }

    public function get_pasar()
    {

        $id=$this->input->post('id');
        $data=$this->pasar->get_all_asc($id)->result();
        echo json_encode($data);
    }
    
    public function tmulti(){
        $data = [];
        $data = [
            [
                'kecamatan_id' => 2,
                'pasar_id' => 1,
                'sembako_id' => 1,
                'nama_bahan' => 'Beras A',
                'satuan' => "1 kg",
                'harga_borongan' => 0,
                'harga_eceran' => 16000,
                'keterangan' => '-',
                'waktu' => date('Y-m-d'),
            ], 
            [
                'kecamatan_id' => 2,
                'pasar_id' => 1,
                'sembako_id' => 1,
                'nama_bahan' => 'Beras B',
                'satuan' => "1 kg",
                'harga_borongan' => 0,
                'harga_eceran' => 16000,
                'keterangan' => '-',
                'waktu' => date('Y-m-d'),
            ],
            [
                'kecamatan_id' => 2,
                'pasar_id' => 1,
                'sembako_id' => 1,
                'nama_bahan' => 'Beras C',
                'satuan' => "1 kg",
                'harga_borongan' => 0,
                'harga_eceran' => 16500,
                'keterangan' => '-',
                'waktu' => date('Y-m-d'),
            ], 
        ];
        echo "<pre>";
        $this->db->insert_batch('harga', $data);
        echo print_r($data);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kecamatan_id', 'kecamatan id', 'trim|required');
        $this->form_validation->set_rules('pasar_id', 'pasar id', 'trim|required');
        $this->form_validation->set_rules('sembako_id', 'sembako id', 'trim|required');
        $this->form_validation->set_rules('nama_bahan', 'nama bahan', 'trim|required');
        $this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
        $this->form_validation->set_rules('harga_borongan', 'harga borongan', 'trim|required');
        $this->form_validation->set_rules('harga_eceran', 'harga eceran', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
        $this->form_validation->set_rules('waktu', 'waktu', 'trim|required');

        $this->form_validation->set_rules('harga_id', 'harga_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Harga.php */
/* Location: ./application/controllers/Harga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-06 07:33:45 */
/* http://harviacode.com */
