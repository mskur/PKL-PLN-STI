<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UnitLV1 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_LoginSTI');
        $this->load->model('M_UnitLV1');
        $this->M_LoginSTI->protectLogin();
    }

    public function viewUnitLV1()
    {
        $unitLV1 = $this->M_UnitLV1->getUnitLV1();
        $data = array(
            'title' => 'Unit LV1',
            'unitLV1' => $unitLV1
        );
        $this->load->view('admin/V_STI_UnitLV1', $data);
    }

    public function addUnitLV1()
    {
        $data = array(
            'title' => 'Add Unit LV1'
        );
        $this->load->view('admin/V_STI_AddUnitLV1', $data);
    }

    public function addUnitLV1Process()
    {
        if($this->input->post('submit') == NULL) {
            redirect('UnitLV1/viewUnitLV1');
        }
        $this->form_validation->set_rules('namaUnitL1', 'Nama Unit L1', 'required|trim', array(
            'required' => 'Nama unit level 1 harus diisi'
        ));
        $this->form_validation->set_rules('singkatanL1', 'Singkatan L1', 'required|trim', array(
            'required' => 'Singkatan unit level 1 harus diisi'
        ));
        $this->form_validation->set_rules('koordinatL1', 'Koordinat L1', 'required|trim', array(
            'required' => 'Koordinat unit level 1 harus diisi'
        ));

        if($this->form_validation->run() == FALSE) {
            $this->addUnitLV1();
        }
        else {
            $data = array(
                'namaUnitL1' => $this->input->post('namaUnitL1'),
                'singkatanL1' => $this->input->post('singkatanL1'),
                'koordinatL1' => $this->input->post('koordinatL1')
            );
            $data = $this->security->xss_clean($data);
            $this->M_UnitLV1->addUnitLV1($data);
            $this->session->set_flashdata('message', 'Unit level 1 berhasil ditambahkan');
            redirect('UnitLV1/viewUnitLV1');
        }
    }

    public function updateUnitLV1()
    {
        $idLV1 = $this->input->post('idL1');
        if($idLV1 == NULL) {
            redirect('UnitLV1/viewUnitLV1');
        }
        
        $unitLV1 = $this->M_UnitLV1->getUnitLV1ById($idLV1);
        $data = array(
            'title' => 'Edit Unit LV1',
            'unitLV1' => $unitLV1
        );
        $this->load->view('admin/V_STI_UpdateUnitLV1', $data);
    }

    public function updateUnitLV1Process()
    {
        if($this->input->post('submit') == NULL) {
            redirect('UnitLV1/viewUnitLV1');
        }

        $this->form_validation->set_rules('namaUnitL1', 'Nama Unit L1', 'required|trim', array(
            'required' => 'Nama unit level 1 harus diisi'
        ));
        $this->form_validation->set_rules('singkatanL1', 'Singkatan L1', 'required|trim', array(
            'required' => 'Singkatan unit level 1 harus diisi'
        ));
        $this->form_validation->set_rules('koordinatL1', 'Koordinat L1', 'required|trim', array(
            'required' => 'Koordinat unit level 1 harus diisi'
        ));

        if($this->form_validation->run() == FALSE) {
            $this->updateUnitLV1();
        }
        else {
            $idL1 = $this->input->post('idL1');
            $data = array(
                'namaUnitL1' => $this->input->post('namaUnitL1'),
                'singkatanL1' => $this->input->post('singkatanL1'),
                'koordinatL1' => $this->input->post('koordinatL1')
            );
            $data = $this->security->xss_clean($data);
            $this->M_UnitLV1->updateUnitLV1($data, $idL1);
            $this->session->set_flashdata('message', 'Unit level 1 berhasil diubah');
            redirect('UnitLV1/viewUnitLV1');
        }
    }

    public function deleteUnitLV1()
    {
        $idL1 = $this->input->post('idL1');
        if($idL1 == NULL) {
            redirect('UnitLV1/viewUnitLV1');
        }
        $this->M_UnitLV1->deleteUnitLV1($idL1);
        $this->session->set_flashdata('message', 'Unit level 1 berhasil dihapus');
        redirect('UnitLV1/viewUnitLV1');
    }
}