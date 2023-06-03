<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UnitLV2 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_LoginSTI');
        $this->load->model('M_UnitLV2');
        $this->M_LoginSTI->protectLogin();
    }

    public function viewUnitLV2()
    {
        $unitLV2 = $this->M_UnitLV2->getUnitLV2();
        $data = array(
            'title' => 'Unit LV2',
            'unitLV2' => $unitLV2
        );
        $this->load->view('admin/V_STI_UnitLV2', $data);
    }

    public function addUnitLV2()
    {
        $data = array(
            'title' => 'Add Unit LV2'
        );
        $this->load->view('admin/V_STI_AddUnitLV2', $data);
    }

    public function addUnitLV2Process()
    {
        if($this->input->post('submit') == NULL) {
            redirect('UnitLV2/viewUnitLV2');
        }
        $this->form_validation->set_rules('namaUnitL2', 'Nama Unit L2', 'required|trim', array(
            'required' => 'Nama unit level 2 harus diisi'
        ));
        $this->form_validation->set_rules('singkatanL2', 'Singkatan L2', 'required|trim', array(
            'required' => 'Singkatan unit level 2 harus diisi'
        ));
        $this->form_validation->set_rules('koordinatL2', 'Koordinat L2', 'required|trim', array(
            'required' => 'Koordinat unit level 2 harus diisi'
        ));

        if($this->form_validation->run() == FALSE) {
            $this->addUnitLV2();
        }
        else {
            $data = array(
                'namaUnitL2' => $this->input->post('namaUnitL2'),
                'singkatanL2' => $this->input->post('singkatanL2'),
                'koordinatL2' => $this->input->post('koordinatL2')
            );
            $data = $this->security->xss_clean($data);
            $this->M_UnitLV2->addUnitLV2($data);
            $this->session->set_flashdata('message', 'Unit level 2 berhasil ditambahkan');
            redirect('UnitLV2/viewUnitLV2');
        }
    }

    public function updateUnitLV2()
    {
        $idLV2 = $this->input->post('idL2');
        if($idLV2 == NULL) {
            redirect('UnitLV2/viewUnitLV2');
        }
        
        $unitLV2 = $this->M_UnitLV2->getUnitLV2ById($idLV2);
        $data = array(
            'title' => 'Edit Unit LV2',
            'unitLV2' => $unitLV2
        );
        $this->load->view('admin/V_STI_UpdateUnitLV2', $data);
    }

    public function updateUnitLV2Process()
    {
        if($this->input->post('submit') == NULL) {
            redirect('UnitLV2/viewUnitLV2');
        }

        $this->form_validation->set_rules('namaUnitL2', 'Nama Unit L2', 'required|trim', array(
            'required' => 'Nama unit level 2 harus diisi'
        ));
        $this->form_validation->set_rules('singkatanL2', 'Singkatan L2', 'required|trim', array(
            'required' => 'Singkatan unit level 2 harus diisi'
        ));
        $this->form_validation->set_rules('koordinatL2', 'Koordinat L2', 'required|trim', array(
            'required' => 'Koordinat unit level 2 harus diisi'
        ));

        if($this->form_validation->run() == FALSE) {
            $this->updateUnitLV2();
        }
        else {
            $idL2 = $this->input->post('idL2');
            $data = array(
                'namaUnitL2' => $this->input->post('namaUnitL2'),
                'singkatanL2' => $this->input->post('singkatanL2'),
                'koordinatL2' => $this->input->post('koordinatL2')
            );
            $data = $this->security->xss_clean($data);
            $this->M_UnitLV2->updateUnitLV2($data, $idL2);
            $this->session->set_flashdata('message', 'Unit level 2 berhasil diubah');
            redirect('UnitLV2/viewUnitLV2');
        }
    }

    public function deleteUnitLV2()
    {
        $idL2 = $this->input->post('idL2');
        if($idL2 == NULL) {
            redirect('UnitLV2/viewUnitLV2');
        }
        $this->M_UnitLV2->deleteUnitLV2($idL2);
        $this->session->set_flashdata('message', 'Unit level 2 berhasil dihapus');
        redirect('UnitLV2/viewUnitLV2');
    }
}