<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class topologiSTI extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_LoginSTI');
        $this->load->model('M_TopologiSTI');
        $this->M_LoginSTI->protectLogin();
    }

    public function viewTopologi(){
        $allTopologi = $this->M_TopologiSTI->showAllTopologi();
        $data = array(
            'topologi' => $allTopologi,
            'title' => 'Topologi'
        );
        $this->load->view('admin/V_STI_Topologi', $data);
    }

    public function addTopologi(){
        $data = array(
            'title' => 'Tambah Topologi'
        );
        $this->load->view('admin/V_STI_AddTopologi', $data);
    }

    public function addTopologiAction(){
        $judulTopologi = $this->form_validation->set_rules('judulTopologi', 'Judul Topologi', 'required|trim',
            array('required' => 'Judul Topologi harus diisi')
        );

        if($this->input->post('submit') == NULL){
            redirect('topologiSTI/viewTopologi');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/V_STI_AddTopologi');
        } 
        else {
            $judulTopologi = $this->input->post('judulTopologi');
            
            $config['upload_path'] = './assets/topologi/';
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = "topologi_".time();

            $this->load->library('upload', $config);

            if($this->upload->do_upload('fileTopologi')){
                $fileTopologi = $this->upload->data('file_name');
                $data = array(
                    'judulTopologi' => $judulTopologi,
                    'fileTopologi' => $fileTopologi
                );
                $data = $this->security->xss_clean($data);
                $this->M_TopologiSTI->addTopologi($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Topologi berhasil ditambahkan</div>');
                redirect('topologiSTI/viewTopologi');
            }
            else{
                $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Topologi gagal ditambahkan, file tidak sesuai!</div>');
                $this->load->view('admin/V_STI_AddTopologi');
            }  
        }
    }

    public function viewPDF(){
        $fileTopologi = $this->input->post('idTopologiPDF');
        //if fileTopologi is null, redirect to viewTopologi
        if($fileTopologi == null){
            redirect('topologiSTI/viewTopologi');
        }

        $query = $this->M_TopologiSTI->getTopologiById($fileTopologi);
        //get judulTopologi
        $judulTopologi = $query->judulTopologi;
        $data = array(
            'topologi' => $query,
            'title' => 'View Topologi ' . $judulTopologi
        );
        $this->load->view('admin/V_STI_readPDF', $data);
    }

    public function updateTopologi(){
        $idTopologiUPDATE = $this->input->post('idTopologiUPDATE');
        //if idTopologiUPDATE is null, redirect to viewTopologi
        if($idTopologiUPDATE == null){
            redirect('topologiSTI/viewTopologi');
        }

        $query = $this->M_TopologiSTI->getTopologiById($idTopologiUPDATE);
        $data = array(
            'topologi' => $query,
            'title' => 'Update Topologi'
        );
        $this->load->view('admin/V_STI_UpdateTopologi', $data);
    }

    public function updateTopologiAction(){
        $judulTopologi = $this->form_validation->set_rules('judulTopologi', 'Judul Topologi', 'required|trim',
            array('required' => 'Judul Topologi harus diisi')
        );
        if($this->input->post('submit') == NULL){
            redirect('topologiSTI/viewTopologi');
        }

        $idTopologi = $this->input->post('idTopologi');
        $oldFileTopologi = $this->input->post('oldFileTopologi');

        if ($this->form_validation->run() == false) {
            $query = $this->M_TopologiSTI->getTopologiById($idTopologi);
            $data = array(
                'topologi' => $query
            );
            $this->load->view('admin/V_STI_UpdateTopologi', $data);
        } 
        else {
            $judulTopologi = $this->input->post('judulTopologi');
            
            $config['upload_path'] = './assets/topologi/';
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = "topologi_".time();

            $this->load->library('upload', $config);

            if($this->upload->do_upload('fileTopologi')){
                $fileTopologi = $this->upload->data('file_name');
                $data = array(
                    'judulTopologi' => $judulTopologi,
                    'fileTopologi' => $fileTopologi
                );
                $data = $this->security->xss_clean($data);
                //delete old file
                $path = './assets/topologi/'.$oldFileTopologi;
                unlink($path);

                $this->M_TopologiSTI->updateTopologi($idTopologi, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Topologi berhasil diupdate</div>');
                redirect('topologiSTI/viewTopologi');
            }
            //if else no update pdf
            elseif($_FILES['fileTopologi']['name'] == ""){
                $data = array(
                    'judulTopologi' => $judulTopologi
                );
                $data = $this->security->xss_clean($data);
                $this->M_TopologiSTI->updateTopologi($idTopologi, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Topologi berhasil diupdate</div>');
                redirect('topologiSTI/viewTopologi');
            }
            else{
                $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Topologi gagal diupdate, file tidak sesuai!</div>');
                $query = $this->M_TopologiSTI->getTopologiById($idTopologi);
                $data = array(
                    'topologi' => $query
                );
                $this->load->view('admin/V_STI_UpdateTopologi', $data);
            }  
        }
        
    }

    public function deleteTopologi(){
        $idTopologiDELETE = $this->input->post('idTopologiDELETE');
        
        //if idTopologiDELETE is null, redirect to viewTopologi
        if($idTopologiDELETE == null){
            redirect('topologiSTI/viewTopologi');
        }

        //delete old file
        $query = $this->M_TopologiSTI->getTopologiById($idTopologiDELETE);
        $oldFileTopologi = $query->fileTopologi;
        $path = './assets/topologi/'.$oldFileTopologi;
        unlink($path);

        $this->M_TopologiSTI->deleteTopologi($idTopologiDELETE);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Topologi berhasil dihapus</div>');
        redirect('topologiSTI/viewTopologi');
    }



}