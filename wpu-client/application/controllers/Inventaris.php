<?php

class Inventaris extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Inventaris_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Komponen';
        $data['inventaris'] = $this->Inventaris_model->getAllKomponen();
        if( $this->input->post('keyword') ) {
            $data['inventaris'] = $this->Inventaris_model->cariDataKomponen();
        }
        elseif( $this->input->post('b5') ) {
            $data['inventaris'] = $this->Inventaris_model->cariDataKomponenByMeja();
        }

        elseif( $this->input->post('pandora') ) {
            $data['inventaris'] = $this->Inventaris_model->cariDataKomponenByPandora();
        }

      

        $this->load->view('templates/header', $data);
        $this->load->view('inventaris/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Komponen';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('inventaris/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Inventaris_model->tambahDataKomponen();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('inventaris');
        }
    }

    public function hapus($id)
    {
        $this->Inventaris_model->hapusDataKomponen($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('inventaris');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Komponen';
        $data['inventaris'] = $this->Inventaris_model->getKomponenById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('inventaris/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Komponen';
        $data['inventaris'] = $this->Inventaris_model->getKomponenById($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('inventaris/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Inventaris_model->ubahDataKomponen();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('inventaris');
        }
    }

}
