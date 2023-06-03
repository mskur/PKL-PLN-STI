<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class typeAlat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_LoginSTI');
        $this->load->model('M_TypeAlat');
        $this->M_LoginSTI->protectLogin();
    }

    public function viewType()
    {
        $allType = $this->M_TypeAlat->getAllType();
        $data = array(
            'title' => 'Type Alat',
            'allType' => $allType
        );
        $this->load->view('admin/V_STI_TypeAlat', $data);
    }

    public function addType()
    {
        $data = array(
            'title' => 'Add Type'
        );
        $this->load->view('admin/V_STI_AddType', $data);
    }

    public function addTypeProcess()
    {
        if($this->input->post('submit') == NULL) {
            redirect('typeAlat/viewType');
        }

        $this->form_validation->set_rules('type', 'type', 'required|trim', array(
            'required' => 'Type harus diisi'
        ));

        if($this->form_validation->run() == FALSE) {
            $this->addType();
        } 
        else {
            $data = array(
                'type' => $this->input->post('type')
            );
            $data = $this->security->xss_clean($data);
            $this->M_TypeAlat->addType($data);
            $this->session->set_flashdata('message', 'Type berhasil ditambahkan');
            redirect('typeAlat/viewType');
        }
    }

    public function updateType()
    {
        $idType = $this->input->post('idType');
        if($idType == NULL) {
            redirect('typeAlat/viewType');
        }

        $type = $this->M_TypeAlat->getTypeById($idType);
        $data = array(
            'title' => 'Update Type',
            'type' => $type
        );
        $this->load->view('admin/V_STI_UpdateType', $data);
    }

    public function updateTypeProcess()
    {
        if($this->input->post('submit') == NULL) {
            redirect('typeAlat/viewType');
        }

        $this->form_validation->set_rules('type', 'type', 'required|trim', array(
            'required' => 'Type harus diisi'
        ));

        if($this->form_validation->run() == FALSE) {
            $this->updateType();
        } 
        else {
            $idType = $this->input->post('idType');
            $data = array(
                'type' => $this->input->post('type')
            );
            $data = $this->security->xss_clean($data);
            $this->M_TypeAlat->updateType($data, $idType);
            $this->session->set_flashdata('message', 'Type berhasil diupdate');
            redirect('typeAlat/viewType');
        }
    }

    public function deleteType()
    {
        $idType = $this->input->post('idType');
        if($idType == NULL) {
            redirect('typeAlat/viewType');
        }

        $this->M_TypeAlat->deleteType($idType);
        $this->session->set_flashdata('message', 'Type berhasil dihapus');
        redirect('typeAlat/viewType');
    }
}