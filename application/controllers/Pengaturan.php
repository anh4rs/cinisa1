<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('kecamatan_model', 'kecamatan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pengaturan/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pengaturan/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pengaturan/index';
            $config['first_url'] = base_url() . 'pengaturan/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Admin_model->total_rows($q);
        $pengaturan = $this->Admin_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'title'             => 'Pengaturan Data',
            'pengaturan_data' => $pengaturan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->display('admin/pengaturan/admin_list', $data);
    }

    public function create()
    {
        $kecamatan = $this->kecamatan->get_all_asc()->result();
        $data = array(
            'title'             => 'Tambah Data Pengaturan',
            'button' => 'Create',
            'action' => site_url('pengaturan/create_action'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'kecamatan_id' => set_value('kecamatan_id'),
            'no_hp' => set_value('no_hp'),
            'foto' => set_value('foto'),
            'nama' => set_value('nama'),
            'email' => set_value('email'),
            'kecamatans' => $kecamatan,
        );
        $this->template->display('admin/pengaturan/admin_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'password' => $this->input->post('password', TRUE),
                'kecamatan_id' => $this->input->post('kecamatan_id', TRUE),
                'no_hp' => $this->input->post('no_hp', TRUE),
                'foto' => $this->input->post('foto', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'email' => $this->input->post('email', TRUE),
            );

            $this->Admin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pengaturan'));
        }
    }

    public function update($id)
    {
        $row = $this->Admin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengaturan/update_action'),
                'username' => set_value('username', $row->username),
                'password' => set_value('password', $row->password),
                'kecamatan_id' => set_value('kecamatan_id', $row->kecamatan_id),
                'no_hp' => set_value('no_hp', $row->no_hp),
                'foto' => set_value('foto', $row->foto),
                'nama' => set_value('nama', $row->nama),
                'email' => set_value('email', $row->email),
            );
            $this->template->display('admin/pengaturan/admin_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengaturan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('username', TRUE));
        } else {
            $data = array(
                'password' => $this->input->post('password', TRUE),
                'kecamatan_id' => $this->input->post('kecamatan_id', TRUE),
                'no_hp' => $this->input->post('no_hp', TRUE),
                'foto' => $this->input->post('foto', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'email' => $this->input->post('email', TRUE),
            );

            $this->Admin_model->update($this->input->post('username', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengaturan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Admin_model->get_by_id($id);

        if ($row) {
            $this->Admin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengaturan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengaturan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('kecamatan_id', 'kecamatan id', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
        $this->form_validation->set_rules('foto', 'foto', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');

        $this->form_validation->set_rules('username', 'username', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Pengaturan.php */
/* Location: ./application/controllers/Pengaturan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-12 12:26:03 */
/* http://harviacode.com */
