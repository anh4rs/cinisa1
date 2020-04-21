<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kecamatan_model');
        $this->load->library('form_validation');
    }

    function action_save()
    {
        //$data = data[];
        for ($i = 1; $i <= 25; $i++) {
            //$data = new stdClass;
            $data[] = array(
                'pengguna_nama' => 'teruntuk user' . $i,
                'pengguna_passwd' => 'user' . $i,
                'pengguna_usernm' => 'user' . $i,
            );
        }

        $this->db->insert_batch('pengguna', $data);
        echo "<pre>";
        echo print_r($data);
    }

    public function index()
    {
        echo $this->input->get('q', TRUE);

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'kecamatan/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kecamatan/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kecamatan/index';
            $config['first_url'] = base_url() . 'kecamatan/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kecamatan_model->total_rows($q);
        $kecamatan = $this->Kecamatan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'title'             => 'List kecamatan',
            'kecamatan_data'    => $kecamatan,
            'q'                 => $q,
            'pagination'        => $this->pagination->create_links(),
            'total_rows'        => $config['total_rows'],
            'start'             => $start,
        );
        $this->template->display('admin/kecamatan/kecamatan_list', $data);
    }

    public function create()
    {
        $data = array(
            'title' => 'Form Tambah Kecamatan',
            'button' => 'Create',
            'action' => site_url('kecamatan/create_action'),
            'kecamatan_id' => set_value('kecamatan_id'),
            'kecamatan_nama' => set_value('kecamatan_nama'),
        );
        $this->template->display('admin/kecamatan/kecamatan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kecamatan_nama' => $this->input->post('kecamatan_nama', TRUE),
            );

            $this->Kecamatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kecamatan'));
        }
    }

    public function update($id)
    {
        $row = $this->Kecamatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Form Edit Kecamatan',
                'button' => 'Update',
                'action' => site_url('kecamatan/update_action'),
                'kecamatan_id' => set_value('kecamatan_id', $row->kecamatan_id),
                'kecamatan_nama' => set_value('kecamatan_nama', $row->kecamatan_nama),
            );
            $this->template->display('admin/kecamatan/kecamatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kecamatan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kecamatan_id', TRUE));
        } else {
            $data = array(
                'kecamatan_nama' => $this->input->post('kecamatan_nama', TRUE),
            );

            $this->Kecamatan_model->update($this->input->post('kecamatan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kecamatan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kecamatan_model->get_by_id($id);

        if ($row) {
            $this->Kecamatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kecamatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kecamatan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kecamatan_nama', 'kecamatan nama', 'trim|required');
        $this->form_validation->set_rules('kecamatan_id', 'kecamatan_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function lastrow(){
        $q = $this->db->get('kecamatan')->last_row();
        echo var_dump($q);

    }
}

/* End of file Kecamatan.php */
/* Location: ./application/controllers/Kecamatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-06 07:33:39 */
/* http://harviacode.com */
