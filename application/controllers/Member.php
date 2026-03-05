<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['members'] = $this->Member_model->get_all_members();
        $data['tahun'] = range(date('Y'), 1900);
        
        $this->load->view('member_view', $data);
    }

    public function simpan() {
        // Set validation rules
        $this->form_validation->set_rules('handphone', 'Handphone', 'required|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('hobby[]', 'Hobby', 'required');
        $this->form_validation->set_rules('thn_lahir', 'Tahun Lahir', 'required|numeric|exact_length[4]');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $hobby = implode(', ', $this->input->post('hobby'));
            $tahun_lahir = $this->input->post('thn_lahir');
            $umur = date('Y') - $tahun_lahir;

            $data = array(
                'handphone' => $this->input->post('handphone'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'agama' => $this->input->post('agama'),
                'hobby' => $hobby,
                'thn_lahir' => $tahun_lahir,
                'umur' => $umur
            );

            if ($this->Member_model->insert_member($data)) {
                $this->session->set_flashdata('success', 'Data member berhasil disimpan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan data!');
            }

            redirect('member');
        }
    }

    public function hapus($id) {
        if ($this->Member_model->delete_member($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data!');
        }
        redirect('member');
    }
}