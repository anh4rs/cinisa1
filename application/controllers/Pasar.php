<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pasar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pasar_model');
        $this->load->model('kecamatan_model', 'kecamatan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pasar/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pasar/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pasar/index';
            $config['first_url'] = base_url() . 'pasar/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pasar_model->total_rows($q);
        $pasar = $this->Pasar_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'title' => 'List Pasar',
            'pasar_data' => $pasar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->display('admin/pasar/pasar_list', $data);
    }

    public function create()
    {
        $kecamatan = $this->kecamatan->get_all_asc()->result();

        $data = array(
            'title' => 'Form Tambah Pasar',
            'button' => 'Create',
            'action' => site_url('pasar/create_action'),
            'pasar_id' => set_value('pasar_id'),
            'pasar_nama' => set_value('pasar_nama'),
            'kecamatan_id' => set_value('kecamatan_id'),
            'pasar_lokasi' => set_value('pasar_lokasi'),
            'kecamatans' => $kecamatan,
        );
        $this->template->display('admin/pasar/pasar_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'pasar_nama' => $this->input->post('pasar_nama', TRUE),
                'kecamatan_id' => $this->input->post('kecamatan_id', TRUE),
                'pasar_lokasi' => $this->input->post('pasar_lokasi', TRUE),
            );

            $this->Pasar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pasar'));
        }
    }

    public function update($id)
    {
        $kecamatan = $this->kecamatan->get_all_asc()->result();

        $row = $this->Pasar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pasar/update_action'),
                'pasar_id' => set_value('pasar_id', $row->pasar_id),
                'pasar_nama' => set_value('pasar_nama', $row->pasar_nama),
                'kecamatan_id' => set_value('kecamatan_id', $row->kecamatan_id),
                'pasar_lokasi' => set_value('pasar_lokasi', $row->pasar_lokasi),
                'kecamatans' => $kecamatan,

            );
            $this->template->display('admin/pasar/pasar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasar'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pasar_id', TRUE));
        } else {
            $data = array(
                'pasar_nama' => $this->input->post('pasar_nama', TRUE),
                'kecamatan_id' => $this->input->post('kecamatan_id', TRUE),
                'pasar_lokasi' => $this->input->post('pasar_lokasi', TRUE),
            );

            $this->Pasar_model->update($this->input->post('pasar_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pasar'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pasar_model->get_by_id($id);

        if ($row) {
            $this->Pasar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pasar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasar'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('pasar_nama', 'pasar nama', 'trim|required');
        $this->form_validation->set_rules('kecamatan_id', 'kecamatan id', 'trim|required');
        $this->form_validation->set_rules('pasar_lokasi', 'pasar lokasi', 'trim|required');

        $this->form_validation->set_rules('pasar_id', 'pasar_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function tmulti(){
        $data = [];
        $data = [
            
                    // for ($i=1; $i <= 3 ; $i++) { 
                        
                    // }
                    [
                        'pasar_nama' => 'Pasar A1',
                        'kecamatan_id' => 1,
                    ],             [
                        'pasar_nama' => 'Pasar A2',
                        'kecamatan_id' => 1,
                    ], 
                    [
                        'pasar_nama' => 'Pasar B1',
                        'kecamatan_id' => 2,
                    ],             [
                        'pasar_nama' => 'Pasar B2',
                        'kecamatan_id' => 2,
                    ], 
                    [
                        'pasar_nama' => 'Pasar B3',
                        'kecamatan_id' => 2,
                    ],             [
                        'pasar_nama' => 'Pasar C1',
                        'kecamatan_id' => 3,
                    ], 
                    [
                        'pasar_nama' => 'Pasar C2',
                        'kecamatan_id' => 3,
                    ],             [
                        'pasar_nama' => 'Pasar C3',
                        'kecamatan_id' => 3,
                    ], 
                    [
                        'pasar_nama' => 'Pasar D1',
                        'kecamatan_id' => 4,
                    ],             [
                        'pasar_nama' => 'Pasar D2',
                        'kecamatan_id' => 4,
                    ], 

                ];
        echo "<pre>";
        $this->db->insert_batch('pasar', $data);
        echo print_r($data);
    }
}



/* End of file Pasar.php */
/* Location: ./application/controllers/Pasar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-06 07:33:56 */
/* http://harviacode.com */
