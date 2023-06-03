<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UnitLV4 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_LoginSTI');
        $this->load->model('M_UnitLV4');
        $this->M_LoginSTI->protectLogin();
    }

    public function viewUnitLV4()
    {
        $unitLV4 = $this->M_UnitLV4->getUnitLV4();
        $data = array(
            'title' => 'Unit LV4',
            'unitLV4' => $unitLV4
        );
        $this->load->view('admin/V_STI_UnitLV4', $data);
    }

    public function addUnitLV4()
    {
        $data = array(
            'title' => 'Add Unit LV4'
        );
        $this->load->view('admin/V_STI_AddUnitLV4', $data);
    }

    public function addUnitLV4Process()
    {
        if($this->input->post('submit') == NULL) {
            redirect('UnitLV4/viewUnitLV4');
        }
        $this->form_validation->set_rules('namaUnitL4', 'Nama Unit L4', 'required|trim', array(
            'required' => 'Nama unit level 4 harus diisi'
        ));
        $this->form_validation->set_rules('singkatanL4', 'Singkatan L4', 'required|trim', array(
            'required' => 'Singkatan unit level 4 harus diisi'
        ));
        $this->form_validation->set_rules('koordinatL4', 'Koordinat L4', 'required|trim', array(
            'required' => 'Koordinat unit level 4 harus diisi'
        ));

        if($this->form_validation->run() == FALSE) {
            $this->addUnitLV4();
        }
        else {
            $data = array(
                'namaUnitL4' => $this->input->post('namaUnitL4'),
                'singkatanL4' => $this->input->post('singkatanL4'),
                'koordinatL4' => $this->input->post('koordinatL4')
            );
            $data = $this->security->xss_clean($data);
            $this->M_UnitLV4->addUnitLV4($data);
            $this->session->set_flashdata('message', 'Unit level 4 berhasil ditambahkan');
            redirect('UnitLV4/viewUnitLV4');
        }
    }

    public function updateUnitLV4()
    {
        $idLV4 = $this->input->post('idL4');
        if($idLV4 == NULL) {
            redirect('UnitLV4/viewUnitLV4');
        }
        
        $unitLV4 = $this->M_UnitLV4->getUnitLV4ById($idLV4);
        $data = array(
            'title' => 'Edit Unit LV4',
            'unitLV4' => $unitLV4
        );
        $this->load->view('admin/V_STI_UpdateUnitLV4', $data);
    }

    public function updateUnitLV4Process()
    {
        if($this->input->post('submit') == NULL) {
            redirect('UnitLV4/viewUnitLV4');
        }

        $this->form_validation->set_rules('namaUnitL4', 'Nama Unit L4', 'required|trim', array(
            'required' => 'Nama unit level 4 harus diisi'
        ));
        $this->form_validation->set_rules('singkatanL4', 'Singkatan L4', 'required|trim', array(
            'required' => 'Singkatan unit level 4 harus diisi'
        ));
        $this->form_validation->set_rules('koordinatL4', 'Koordinat L4', 'required|trim', array(
            'required' => 'Koordinat unit level 4 harus diisi'
        ));

        if($this->form_validation->run() == FALSE) {
            $this->updateUnitLV4();
        }
        else {
            $idL4 = $this->input->post('idL4');
            $data = array(
                'namaUnitL4' => $this->input->post('namaUnitL4'),
                'singkatanL4' => $this->input->post('singkatanL4'),
                'koordinatL4' => $this->input->post('koordinatL4')
            );
            $data = $this->security->xss_clean($data);
            $this->M_UnitLV4->updateUnitLV4($data, $idL4);
            $this->session->set_flashdata('message', 'Unit level 4 berhasil diupdate');
            redirect('UnitLV4/viewUnitLV4');
        }
    }

    public function deleteUnitLV4()
    {
        $idL4 = $this->input->post('idL4');
        if($idL4 == NULL) {
            redirect('UnitLV4/viewUnitLV4');
        }
        $this->M_UnitLV4->deleteUnitLV4($idL4);
        $this->session->set_flashdata('message', 'Unit level 4 berhasil dihapus');
        redirect('UnitLV4/viewUnitLV4');
    }
}