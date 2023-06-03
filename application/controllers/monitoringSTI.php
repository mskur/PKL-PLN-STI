<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class monitoringSTI extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_LoginSTI');
        $this->load->model('M_MonitoringSTI');
        $this->load->helper('url');
        $this->M_LoginSTI->protectLogin();
    }

    public function viewMonitoring(){
        $ipAddress = $this->M_MonitoringSTI->getAllIPAddress();
        $data = array(
            'title' => 'Monitoring',
            'ipAddress' => $ipAddress
        );
        $this->load->view('admin/V_STI_Monitoring', $data);
    }

    public function addIPAddress(){
        $data = array(
            'title' => 'Add IP Address'
        );
        $this->load->view('admin/V_STI_AddIPAddress', $data);
    }

    public function addIPAddressAction(){
        $this->form_validation->set_rules('ipAddress', 'IP Address', 'required|trim|valid_ip|is_unique[monitoringip.ipAddress]', [
                'required' => 'IP Address harus diisi!',
                'valid_ip' => 'IP Address tidak valid!',
                'is_unique' => 'IP Address sudah ada!'
            ]
        );
        if($this->form_validation->run() == false){
            $this->viewMonitoring();
        } else {
            $ipAddress = $this->input->post('ipAddress');
            $arrayInsert = array(
                'ipAddress' => $ipAddress
            );
            $arrayInsert = $this->security->xss_clean($arrayInsert);
            $this->M_MonitoringSTI->addIPAddress($arrayInsert);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">IP Address berhasil ditambahkan!</div>');
            redirect('monitoringSTI/viewMonitoring');
        }
    }

    public function updateIPAddressAction(){
        $this->form_validation->set_rules('ipAddress', 'IP Address', 'required|trim|valid_ip|is_unique[monitoringip.ipAddress]', [
                'required' => 'IP Address harus diisi!',
                'valid_ip' => 'IP Address tidak valid!',
                'is_unique' => 'IP Address sudah ada!'
            ]
        );
        $this->input->post('oldIPAddress');
        if($this->form_validation->run() == false){
            $this->viewMonitoring();
        } 
        else {
            $ipAddress = $this->input->post('ipAddress');
            $oldIPAddress = $this->input->post('oldIPAddress');
            $arrayUpdate = array(
                'ipAddress' => $ipAddress
            );
            $arrayUpdate = $this->security->xss_clean($arrayUpdate);
            $this->M_MonitoringSTI->updateIPAddress($arrayUpdate, $oldIPAddress);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">IP Address berhasil diubah!</div>');
            redirect('monitoringSTI/viewMonitoring');
        }
    }

    public function deleteIPAddressAction($ipAddress){
        $this->M_MonitoringSTI->deleteIPAddress($ipAddress);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">IP Address berhasil dihapus!</div>');
        redirect('monitoringSTI/viewMonitoring');
    }

    public function pingIPAddress($ipAddress){
        $ping = exec("ping -n 1 $ipAddress", $output, $status);
        if($status == 0){
            $status = "Online";
        } else {
            $status = "Offline";
        }
        $arrayUpdate = array(
            'status' => $status
        );
        $this->M_MonitoringSTI->updateIPAddress($arrayUpdate, $ipAddress);
        redirect('monitoringSTI/viewMonitoring');
    }
}