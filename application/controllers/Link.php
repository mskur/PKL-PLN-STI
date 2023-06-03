<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_LoginSTI');
        $this->load->model('M_Link');
        $this->M_LoginSTI->protectLogin();
    }

    public function viewLink()
    {
        $link = $this->M_Link->getLink();
        $data = array(
            'title' => 'Link',
            'link' => $link
        );
        $this->load->view('admin/V_STI_Link', $data);
    }

    public function addLink()
    {
        $data = array(
            'title' => 'Add Link'
        );
        $this->load->view('admin/V_STI_AddLink', $data);
    }

    public function addLinkProcess()
    {
        if($this->input->post('submit') == NULL){
            redirect('Link/addLink');
        }

        $this->form_validation->set_rules('namaLink', 'Nama Link', 'required|trim',
            array(
                'required' => 'Nama Link harus diisi'
            )
        );
        $this->form_validation->set_rules('kapasitasLink', 'Kapasitas Link', 'required|trim',
            array(
                'required' => 'Kapasitas Link harus diisi'
            )
        );
        $this->form_validation->set_rules('serviceLink', 'Service Link', 'required|trim',
            array(
                'required' => 'Service Link harus diisi'
            )
        );
        $this->form_validation->set_rules('statusLink', 'Status Link', 'required|trim',
            array(
                'required' => 'Status Link harus diisi'
            )
        );
        $this->form_validation->set_rules('keteranganLink', 'Keterangan Link', 'required|trim',
            array(
                'required' => 'Keterangan Link harus diisi'
            )
        );

        if($this->form_validation->run() == FALSE){
            $this->addLink();
        } 
        else {
            $data = array(
                'namaLink' => $this->input->post('namaLink'),
                'kapasitasLink' => $this->input->post('kapasitasLink'),
                'serviceLink' => $this->input->post('serviceLink'),
                'statusLink' => $this->input->post('statusLink'),
                'keteranganLink' => $this->input->post('keteranganLink')
            );
            $data = $this->security->xss_clean($data);
            $this->M_Link->addLink($data);
            $this->session->set_flashdata('message', 'Link berhasil ditambahkan');
            redirect('Link/viewLink');
        }
    }

    public function updateLink()
    {
        $SID = $this->input->post('SID');
        if($SID == NULL){
            redirect('Link/viewLink');
        }

        $link = $this->M_Link->getLinkById($SID);
        $data = array(
            'title' => 'Update Link',
            'link' => $link
        );
        $this->load->view('admin/V_STI_UpdateLink', $data);
    }

    public function updateLinkProcess()
    {
        if($this->input->post('submit') == NULL){
            redirect('Link/viewLink');
        }

        $this->form_validation->set_rules('namaLink', 'Nama Link', 'required|trim',
            array(
                'required' => 'Nama Link harus diisi'
            )
        );
        $this->form_validation->set_rules('kapasitasLink', 'Kapasitas Link', 'required|trim',
            array(
                'required' => 'Kapasitas Link harus diisi'
            )
        );
        $this->form_validation->set_rules('serviceLink', 'Service Link', 'required|trim',
            array(
                'required' => 'Service Link harus diisi'
            )
        );
        $this->form_validation->set_rules('statusLink', 'Status Link', 'required|trim',
            array(
                'required' => 'Status Link harus diisi'
            )
        );
        $this->form_validation->set_rules('keteranganLink', 'Keterangan Link', 'required|trim',
            array(
                'required' => 'Keterangan Link harus diisi'
            )
        );

        if($this->form_validation->run() == FALSE){
            $this->updateLink();
        } 
        else {
            $SID = $this->input->post('SID');
            $data = array(
                'namaLink' => $this->input->post('namaLink'),
                'kapasitasLink' => $this->input->post('kapasitasLink'),
                'serviceLink' => $this->input->post('serviceLink'),
                'statusLink' => $this->input->post('statusLink'),
                'keteranganLink' => $this->input->post('keteranganLink')
            );
            $data = $this->security->xss_clean($data);
            $this->M_Link->updateLink($data, $SID);
            $this->session->set_flashdata('message', 'Link berhasil diupdate');
            redirect('Link/viewLink');
        }
    }

    public function deleteLink()
    {
        $SID = $this->input->post('SID');
        if($SID == NULL){
            redirect('Link/viewLink');
        }

        $this->M_Link->deleteLink($SID);
        $this->session->set_flashdata('message', 'Link berhasil dihapus');
        redirect('Link/viewLink');
    }

    
}