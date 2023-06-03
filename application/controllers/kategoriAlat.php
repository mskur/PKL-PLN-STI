<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class kategoriAlat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_LoginSTI');
        $this->load->model('M_KategoriAlat');
        $this->M_LoginSTI->protectLogin();
    }

    public function viewKategori()
    {
        $allKategori = $this->M_KategoriAlat->getAllKategori();
        $data = array(
            'title' => 'Kategori Alat',
            'allKategori' => $allKategori
        );
        $this->load->view('admin/V_STI_KategoriAlat', $data);
    }

    public function addKategori()
    {
        $data = array(
            'title' => 'Add Kategori'
        );
        $this->load->view('admin/V_STI_AddKategori', $data);
    }

    public function addKategoriProcess()
    {
        if($this->input->post('submit') == NULL) {
            redirect('kategoriAlat/viewKategori');
        }

        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim', array(
            'required' => 'Kategori harus diisi'
        ));

        if($this->form_validation->run() == FALSE) {
            $this->addKategori();
        } 
        else {
            $data = array(
                'kategori' => $this->input->post('kategori')
            );
            $data = $this->security->xss_clean($data);
            $this->M_KategoriAlat->addKategori($data);
            $this->session->set_flashdata('message', 'Kategori berhasil ditambahkan');
            redirect('kategoriAlat/viewKategori');
        }
    }

    public function updateKategori()
    {
        $idKategori = $this->input->post('idKategori');
        if($idKategori == NULL) {
            redirect('kategoriAlat/viewKategori');
        }

        $kategori = $this->M_KategoriAlat->getKategoriById($idKategori);
        $data = array(
            'title' => 'Update Kategori',
            'kategori' => $kategori
        );
        $this->load->view('admin/V_STI_UpdateKategori', $data);
    }

    public function updateKategoriProcess()
    {
        if($this->input->post('submit') == NULL) {
            redirect('kategoriAlat/viewKategori');
        }

        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim', array(
            'required' => 'Kategori harus diisi'
        ));

        if($this->form_validation->run() == FALSE) {
            $this->updateKategori();
        } 
        else {
            $idKategori = $this->input->post('idKategori');
            $data = array(
                'kategori' => $this->input->post('kategori')
            );
            $data = $this->security->xss_clean($data);
            $this->M_KategoriAlat->updateKategori($data, $idKategori);
            $this->session->set_flashdata('message', 'Kategori berhasil diupdate');
            redirect('kategoriAlat/viewKategori');
        }
    }

    public function deleteKategori()
    {
        $idKategori = $this->input->post('idKategori');
        if($idKategori == NULL) {
            redirect('kategoriAlat/viewKategori');
        }

        $this->M_KategoriAlat->deleteKategori($idKategori);
        $this->session->set_flashdata('message', 'Kategori berhasil dihapus');
        redirect('kategoriAlat/viewKategori');
    }
}