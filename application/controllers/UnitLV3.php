<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UnitLV3 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_LoginSTI');
        $this->load->model('M_UnitLV3');
        $this->M_LoginSTI->protectLogin();
    }

    public function viewUnitLV3()
    {
        $unitLV3 = $this->M_UnitLV3->getUnitLV3();
        $data = array(
            'title' => 'Unit LV3',
            'unitLV3' => $unitLV3
        );
        $this->load->view('admin/V_STI_UnitLV3', $data);
    }

    public function addUnitLV3()
    {
        $data = array(
            'title' => 'Add Unit LV3'
        );
        $this->load->view('admin/V_STI_AddUnitLV3', $data);
    }

    public function addUnitLV3Process()
    {
        if($this->input->post('submit') == NULL) {
            redirect('UnitLV3/viewUnitLV3');
        }
        $this->form_validation->set_rules('namaUnitL3', 'Nama Unit L3', 'required|trim', array(
            'required' => 'Nama unit level 3 harus diisi'
        ));
        $this->form_validation->set_rules('singkatanL3', 'Singkatan L3', 'required|trim', array(
            'required' => 'Singkatan unit level 3 harus diisi'
        ));
        $this->form_validation->set_rules('koordinatL3', 'Koordinat L3', 'required|trim', array(
            'required' => 'Koordinat unit level 3 harus diisi'
        ));

        if($this->form_validation->run() == FALSE) {
            $this->addUnitLV3();
        }
        else {
            $data = array(
                'namaUnitL3' => $this->input->post('namaUnitL3'),
                'singkatanL3' => $this->input->post('singkatanL3'),
                'koordinatL3' => $this->input->post('koordinatL3')
            );
            $data = $this->security->xss_clean($data);
            $this->M_UnitLV3->addUnitLV3($data);
            $this->session->set_flashdata('message', 'Unit level 3 berhasil ditambahkan');
            redirect('UnitLV3/viewUnitLV3');
        }
    }

    public function updateUnitLV3()
    {
        $idLV3 = $this->input->post('idL3');
        if($idLV3 == NULL) {
            redirect('UnitLV3/viewUnitLV3');
        }
        
        $unitLV3 = $this->M_UnitLV3->getUnitLV3ById($idLV3);
        $data = array(
            'title' => 'Edit Unit LV3',
            'unitLV3' => $unitLV3
        );
        $this->load->view('admin/V_STI_UpdateUnitLV3', $data);
    }

    public function updateUnitLV3Process()
    {
        if($this->input->post('submit') == NULL) {
            redirect('UnitLV3/viewUnitLV3');
        }

        $this->form_validation->set_rules('namaUnitL3', 'Nama Unit L3', 'required|trim', array(
            'required' => 'Nama unit level 3 harus diisi'
        ));
        $this->form_validation->set_rules('singkatanL3', 'Singkatan L3', 'required|trim', array(
            'required' => 'Singkatan unit level 3 harus diisi'
        ));
        $this->form_validation->set_rules('koordinatL3', 'Koordinat L3', 'required|trim', array(
            'required' => 'Koordinat unit level 3 harus diisi'
        ));

        if($this->form_validation->run() == FALSE) {
            $this->updateUnitLV3();
        }
        else {
            $idL3 = $this->input->post('idL3');
            $data = array(
                'namaUnitL3' => $this->input->post('namaUnitL3'),
                'singkatanL3' => $this->input->post('singkatanL3'),
                'koordinatL3' => $this->input->post('koordinatL3')
            );
            $data = $this->security->xss_clean($data);
            $this->M_UnitLV3->updateUnitLV3($data, $idL3);
            $this->session->set_flashdata('message', 'Unit level 3 berhasil diubah');
            redirect('UnitLV3/viewUnitLV3');
        }
    }

    public function deleteUnitLV3()
    {
        $idL3 = $this->input->post('idL3');
        if($idL3 == NULL) {
            redirect('UnitLV3/viewUnitLV3');
        }
        $this->M_UnitLV3->deleteUnitLV3($idL3);
        $this->session->set_flashdata('message', 'Unit level 3 berhasil dihapus');
        redirect('UnitLV3/viewUnitLV3');
    }
}