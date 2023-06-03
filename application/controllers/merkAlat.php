<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class merkAlat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_LoginSTI');
        $this->load->model('M_MerkAlat');
        $this->M_LoginSTI->protectLogin();
    }

    public function viewMerk()
    {
        $allmerk = $this->M_MerkAlat->getAllmerk();
        $data = array(
            'title' => 'Merk Alat',
            'allMerk' => $allmerk
        );
        $this->load->view('admin/V_STI_MerkAlat', $data);
    }

    public function addMerk()
    {
        $data = array(
            'title' => 'Add merk'
        );
        $this->load->view('admin/V_STI_Addmerk', $data);
    }

    public function addMerkProcess()
    {
        if($this->input->post('submit') == NULL) {
            redirect('merkAlat/viewMerk');
        }

        $this->form_validation->set_rules('merk', 'merk', 'required|trim', array(
            'required' => 'Merk harus diisi'
        ));

        if($this->form_validation->run() == FALSE) {
            $this->addmerk();
        } 
        else {
            $data = array(
                'merk' => $this->input->post('merk')
            );
            $data = $this->security->xss_clean($data);
            $this->M_MerkAlat->addMerk($data);
            $this->session->set_flashdata('message', 'Merk berhasil ditambahkan');
            redirect('merkAlat/viewMerk');
        }
    }

    public function updatemerk()
    {
        $idMerk = $this->input->post('idMerk');
        if($idMerk == NULL) {
            redirect('merkAlat/viewMerk');
        }

        $merk = $this->M_MerkAlat->getmerkById($idMerk);
        $data = array(
            'title' => 'Update merk',
            'merk' => $merk
        );
        $this->load->view('admin/V_STI_Updatemerk', $data);
    }

    public function updateMerkProcess()
    {
        if($this->input->post('submit') == NULL) {
            redirect('merkAlat/viewMerk');
        }

        $this->form_validation->set_rules('merk', 'merk', 'required|trim', array(
            'required' => 'merk harus diisi'
        ));

        if($this->form_validation->run() == FALSE) {
            $this->updatemerk();
        } 
        else {
            $idMerk = $this->input->post('idMerk');
            $data = array(
                'merk' => $this->input->post('merk')
            );
            $data = $this->security->xss_clean($data);
            $this->M_MerkAlat->updateMerk($data, $idMerk);
            $this->session->set_flashdata('message', 'Merk berhasil diupdate');
            redirect('merkAlat/viewMerk');
        }
    }

    public function deletemerk()
    {
        $idmerk = $this->input->post('idMerk');
        if($idmerk == NULL) {
            redirect('merkAlat/viewMerk');
        }

        $this->M_MerkAlat->deletemerk($idmerk);
        $this->session->set_flashdata('message', 'Merk berhasil dihapus');
        redirect('merkAlat/viewMerk');
    }
}