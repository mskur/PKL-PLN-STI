<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiAset extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_LoginSTI');
        $this->load->model('M_TransaksiAset');
        $this->load->model('M_UnitLv1');
        $this->load->model('M_UnitLv2');
        $this->load->model('M_UnitLv3');
        $this->load->model('M_UnitLv4');
        $this->load->model('M_KategoriAlat');
        $this->load->model('M_MerkAlat');
        $this->load->model('M_TypeAlat');
        $this->M_LoginSTI->protectLogin();
    }

    public function viewTransaksiAset()
    {
        $allTransaksiAset = $this->M_TransaksiAset->getTransaksiAset();
        $data = array(
            'title' => 'Transaksi Aset',
            'allTransaksiAset' => $allTransaksiAset
        );
        $this->load->view('admin/V_STI_TransaksiAset', $data);
    }

    public function addTransaksiAset(){
        $data = array(
            'title' => 'Tambah Transaksi Aset',
            'allUnitLv1' => $this->M_UnitLv1->getUnitLv1(),
            'allUnitLv2' => $this->M_UnitLv2->getUnitLv2(),
            'allUnitLv3' => $this->M_UnitLv3->getUnitLv3(),
            'allUnitLv4' => $this->M_UnitLv4->getUnitLv4(),
            'allKategoriAlat' => $this->M_KategoriAlat->getAllKategori(),
            'allMerkAlat' => $this->M_MerkAlat->getAllMerk(),
            'allTypeAlat' => $this->M_TypeAlat->getAllType()
        );
        $this->load->view('admin/V_STI_AddTransaksiAset', $data); 
    }

    public function addTransaksiAsetProcess(){
        if($this->input->post('submit') == NULL){
            redirect('TransaksiAset/viewTransaksiAset');
        }

        $this->form_validation->set_rules('idL1', 'Unit Level 1', 'required',
            array('required' => 'Unit Level 1 harus diisi')
        );
        $this->form_validation->set_rules('idL2', 'Unit Level 2', 'required',
            array('required' => 'Unit Level 2 harus diisi')
        );
        $this->form_validation->set_rules('idL3', 'Unit Level 3', 'required',
            array('required' => 'Unit Level 3 harus diisi')
        );
        $this->form_validation->set_rules('idL4', 'Unit Level 4', 'required',
            array('required' => 'Unit Level 4 harus diisi')
        );
        $this->form_validation->set_rules('idKategori', 'Kategori Alat', 'required',
            array('required' => 'Kategori Alat harus diisi')
        );
        $this->form_validation->set_rules('idMerk', 'Merk Alat', 'required',
            array('required' => 'Merk Alat harus diisi')
        );
        $this->form_validation->set_rules('idType', 'Type Alat', 'required',
            array('required' => 'Type Alat harus diisi')
        );
        $this->form_validation->set_rules('spesifikasiAset', 'Spesifikasi Aset', 'required|trim',
            array('required' => 'Spesifikasi Aset harus diisi')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->addTransaksiAset();
        } 
        else {
            $data = array(
                'idL1' => $this->input->post('idL1'),
                'idL2' => $this->input->post('idL2'),
                'idL3' => $this->input->post('idL3'),
                'idL4' => $this->input->post('idL4'),
                'idKategori' => $this->input->post('idKategori'),
                'idMerk' => $this->input->post('idMerk'),
                'idType' => $this->input->post('idType'),
                'spesifikasiAset' => $this->input->post('spesifikasiAset'),
            );
            
            $this->M_TransaksiAset->addTransaksiAset($data);
            $this->session->set_flashdata('message', 'Transaksi berhasil ditambahkan');
            redirect('TransaksiAset/viewTransaksiAset');
        }
    }

    public function updateTransaksiAset(){
        $idTransaksi = $this->input->post('idTransaksi');
        if($idTransaksi == NULL){
            redirect('TransaksiAset/viewTransaksiAset');
        }

        $data = array(
            'title' => 'Update Transaksi Aset',
            'allUnitLv1' => $this->M_UnitLv1->getUnitLv1(),
            'allUnitLv2' => $this->M_UnitLv2->getUnitLv2(),
            'allUnitLv3' => $this->M_UnitLv3->getUnitLv3(),
            'allUnitLv4' => $this->M_UnitLv4->getUnitLv4(),
            'allKategoriAlat' => $this->M_KategoriAlat->getAllKategori(),
            'allMerkAlat' => $this->M_MerkAlat->getAllMerk(),
            'allTypeAlat' => $this->M_TypeAlat->getAllType(),
            'transaksiAset' => $this->M_TransaksiAset->getTransaksiAsetById($idTransaksi)
        );
        $this->load->view('admin/V_STI_UpdateTransaksiAset', $data);
    }

    public function updateTransaksiAsetProcess(){
        if($this->input->post('submit') == NULL){
            redirect('TransaksiAset/viewTransaksiAset');
        }

        $this->form_validation->set_rules('idL1', 'Unit Level 1', 'required',
            array('required' => 'Unit Level 1 harus diisi')
        );
        $this->form_validation->set_rules('idL2', 'Unit Level 2', 'required',
            array('required' => 'Unit Level 2 harus diisi')
        );
        $this->form_validation->set_rules('idL3', 'Unit Level 3', 'required',
            array('required' => 'Unit Level 3 harus diisi')
        );
        $this->form_validation->set_rules('idL4', 'Unit Level 4', 'required',
            array('required' => 'Unit Level 4 harus diisi')
        );
        $this->form_validation->set_rules('idKategori', 'Kategori Alat', 'required',
            array('required' => 'Kategori Alat harus diisi')
        );
        $this->form_validation->set_rules('idMerk', 'Merk Alat', 'required',
            array('required' => 'Merk Alat harus diisi')
        );
        $this->form_validation->set_rules('idType', 'Type Alat', 'required',
            array('required' => 'Type Alat harus diisi')
        );
        $this->form_validation->set_rules('spesifikasiAset', 'Spesifikasi Aset', 'required|trim',
            array('required' => 'Spesifikasi Aset harus diisi')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->updateTransaksiAset();
        } 
        else 
        {
            $idTransaksi = $this->input->post('idTransaksi');
            $data = array(
                'idL1' => $this->input->post('idL1'),
                'idL2' => $this->input->post('idL2'),
                'idL3' => $this->input->post('idL3'),
                'idL4' => $this->input->post('idL4'),
                'idKategori' => $this->input->post('idKategori'),
                'idMerk' => $this->input->post('idMerk'),
                'idType' => $this->input->post('idType'),
                'spesifikasiAset' => $this->input->post('spesifikasiAset'),
            );
            $this->M_TransaksiAset->updateTransaksiAset($data, $idTransaksi);
            $this->session->set_flashdata('message', 'Transaksi berhasil diupdate');
            redirect('TransaksiAset/viewTransaksiAset');
        }
    }

    public function deleteTransaksiAset(){
        $idTransaksi = $this->input->post('idTransaksi');
        if($idTransaksi == NULL){
            redirect('TransaksiAset/viewTransaksiAset');
        }

        $this->M_TransaksiAset->deleteTransaksiAset($idTransaksi);
        $this->session->set_flashdata('message', 'Transaksi berhasil dihapus');
        redirect('TransaksiAset/viewTransaksiAset');
    }

    
}