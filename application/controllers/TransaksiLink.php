<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiLink extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_LoginSTI');
        $this->load->model('M_TransaksiLink');
        $this->load->model('M_UnitLV1');
        $this->load->model('M_UnitLV2');
        $this->load->model('M_UnitLV3');
        $this->load->model('M_UnitLV4');
        $this->load->model('M_Link');
        $this->load->library('form_validation');
        $this->M_LoginSTI->protectLogin();
    }

    public function viewTransaksiLink()
    {
        $data = array(
            'title' => 'Transaksi Link',
            'transaksilink' => $this->M_TransaksiLink->getAllTransaksiLink()
        );
        $this->load->view('admin/V_STI_TransaksiLink', $data);
    }

    public function addTransaksiLink(){
        $data = array(
            'title' => 'Add Transaksi Link',
            'unitlv1' => $this->M_UnitLV1->getUnitLV1(),
            'unitlv2' => $this->M_UnitLV2->getUnitLV2(),
            'unitlv3' => $this->M_UnitLV3->getUnitLV3(),
            'unitlv4' => $this->M_UnitLV4->getUnitLV4(),
            'link' => $this->M_Link->getLink()
        );
        $this->load->view('admin/V_STI_AddTransaksiLink', $data);
    }

    public function addTransaksiLinkProcess(){
        $this->form_validation->set_rules('idL1', 'Unit LV1', 'required', 
            array(
                'required' => 'Unit LV1 harus diisi'
            )
        );
        $this->form_validation->set_rules('idL2', 'Unit LV2', 'required', 
            array(
                'required' => 'Unit LV2 harus diisi'
            )
        );
        $this->form_validation->set_rules('idL3', 'Unit LV3', 'required', 
            array(
                'required' => 'Unit LV3 harus diisi'
            )
        );
        $this->form_validation->set_rules('idL4', 'Unit LV4', 'required', 
            array(
                'required' => 'Unit LV4 harus diisi'
            )
        );
        $this->form_validation->set_rules('SID', 'Nama Link', 'required', 
            array(
                'required' => 'Nama Link harus diisi'
            )
        );

        if($this->form_validation->run() == FALSE){
            $this->addTransaksiLink();
        } 
        else {
            $data = array(
                'idL1' => $this->input->post('idL1'),
                'idL2' => $this->input->post('idL2'),
                'idL3' => $this->input->post('idL3'),
                'idL4' => $this->input->post('idL4'),
                'SID' => $this->input->post('SID'),
            );
            $data = $this->security->xss_clean($data);
            $this->M_TransaksiLink->addTransaksiLink($data);
            $this->session->set_flashdata('message', 'Transaksi Link berhasil ditambahkan');
            redirect('TransaksiLink/viewTransaksiLink');
        }
    }

    public function updateTransaksiLink(){
        $idTL = $this->input->post('idTL');
        if($idTL == NULL){
            redirect('TransaksiLink/viewTransaksiLink');
        }

        $transaksiLink = $this->M_TransaksiLink->getTransaksiLinkById($idTL);
        $data = array(
            'title' => 'Update Transaksi Link',
            'unitlv1' => $this->M_UnitLV1->getUnitLV1(),
            'unitlv2' => $this->M_UnitLV2->getUnitLV2(),
            'unitlv3' => $this->M_UnitLV3->getUnitLV3(),
            'unitlv4' => $this->M_UnitLV4->getUnitLV4(),
            'link' => $this->M_Link->getLink(),
            'transaksilink' => $transaksiLink
        );
        $this->load->view('admin/V_STI_UpdateTransaksiLink', $data);
    }

    public function updateTransaksiLinkProcess(){
        if($this->input->post('submit') == NULL){
            redirect('TransaksiLink/viewTransaksiLink');
        }

        $this->form_validation->set_rules('idL1', 'Unit LV1', 'required', 
            array(
                'required' => 'Unit LV1 harus diisi'
            )
        );
        $this->form_validation->set_rules('idL2', 'Unit LV2', 'required', 
            array(
                'required' => 'Unit LV2 harus diisi'
            )
        );
        $this->form_validation->set_rules('idL3', 'Unit LV3', 'required', 
            array(
                'required' => 'Unit LV3 harus diisi'
            )
        );
        $this->form_validation->set_rules('idL4', 'Unit LV4', 'required', 
            array(
                'required' => 'Unit LV4 harus diisi'
            )
        );
        $this->form_validation->set_rules('SID', 'Nama Link', 'required', 
            array(
                'required' => 'Nama Link harus diisi'
            )
        );

        if($this->form_validation->run() == FALSE){
            $this->updateTransaksiLink();
        } 
        else {
            $idTL = $this->input->post('idTL');
            $data = array(
                'idL1' => $this->input->post('idL1'),
                'idL2' => $this->input->post('idL2'),
                'idL3' => $this->input->post('idL3'),
                'idL4' => $this->input->post('idL4'),
                'SID' => $this->input->post('SID'),
            );
            $data = $this->security->xss_clean($data);
            $this->M_TransaksiLink->updateTransaksiLink($data, $idTL);
            $this->session->set_flashdata('message', 'Transaksi Link berhasil diupdate');
            redirect('TransaksiLink/viewTransaksiLink');
        }
    }

    public function deleteTransaksiLink(){
        $idTL = $this->input->post('idTL');
        if($idTL == NULL){
            redirect('TransaksiLink/viewTransaksiLink');
        }

        $this->M_TransaksiLink->deleteTransaksiLink($idTL);
        $this->session->set_flashdata('message', 'Transaksi Link berhasil dihapus');
        redirect('TransaksiLink/viewTransaksiLink');
    }
}