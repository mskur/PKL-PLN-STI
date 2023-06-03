<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class adminSTI extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_LoginSTI');
        $this->load->model('M_AdminSTI');
        $this->load->model('M_TransaksiAset');
        $this->load->model('M_TopologiSTI');
        $this->load->model('M_MonitoringSTI');
        $this->load->model('M_TransaksiLink');
        $this->load->model('M_MerkAlat');
        $this->load->model('M_Link');
        $this->M_LoginSTI->protectLogin();
    }

    public function dashboard()
    {
        $allTransaksiAset = $this->M_TransaksiAset->getTransaksiAset();
        $TopologiSTI = $this->M_TopologiSTI->showAllTopologi();
        $TransaksiLink = $this->M_TransaksiLink->getAllTransaksiLink();
        $MonitoringSTI = $this->M_MonitoringSTI->getAllIPAddress();
        $MerkAlat = $this->M_MerkAlat->getAllmerk();
        $Link = $this->M_Link->getLink();
        $allAdmin = $this->M_AdminSTI->getAdmin();
        $data = array(
            'countTransaksiAset' => count($allTransaksiAset),
            'countTransaksiLink' => count($TransaksiLink),
            'countMonitoring' => count($MonitoringSTI),
            'countTopologi' => count($TopologiSTI),
            'topologi' => $TopologiSTI,
            'MerkAlat' => $MerkAlat,
            'Link' => $Link,
            'admin' => $allAdmin,
            'title' => 'Dashboard'
            
        );
        $this->load->view('admin/V_STI_Dashboard', $data);
    }

    public function controlAdmin()
    {
        //if not superadmin, redirect to dashboard
        if($this->session->userdata('level') != 'superadmin'){
            redirect('adminSTI/dashboard');
        }
        $allAdmin = $this->M_AdminSTI->getAdmin();
        $data = array(
            'admin' => $allAdmin,
            'title' => 'Control Admin'
        );
        $this->load->view('admin/V_STI_ControlAdmin', $data);
    }

    public function addAdmin()
    {
        //if not superadmin, redirect to dashboard
        if($this->session->userdata('level') != 'superadmin'){
            redirect('adminSTI/dashboard');
        }
        $data = array(
            'title' => 'Tambah Admin'
        );
        $this->load->view('admin/V_STI_AddAdmin', $data);
    }

    public function addAdminAction()
    {
        //if not superadmin, redirect to dashboard
        if($this->session->userdata('level') != 'superadmin'){
            redirect('adminSTI/dashboard');
        }

        if($this->input->post('submit') == NULL){
            redirect('adminSTI/controlAdmin');
        }

        $username = $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]', 
            array('required' => 'Username harus diisi', 
                'is_unique' => 'Username sudah terdaftar'
            )
        );
        $password = $this->form_validation->set_rules('password', 'Password', 'required|trim', 
            array('required' => 'Password harus diisi')
        );
        $level = $this->form_validation->set_rules('level', 'Level', 'required|trim', 
            array('required' => 'Level harus diisi')
        );

        if($this->form_validation->run() == FALSE){
            $this->load->view('admin/V_STI_AddAdmin');
        }
        else{
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $level = $this->input->post('level');

            $data = array(
                'username' => $username,
                'password' => $password,
                'level' => $level
            );
            $data = $this->security->xss_clean($data);
            $this->M_AdminSTI->addAdmin($data);
            $this->session->set_flashdata('message', 'Admin berhasil ditambahkan');
            redirect('adminSTI/controlAdmin');
        }
    }

    public function updateAdmin()
    {
        $usernameUPDATE = $this->input->post('usernameUPDATE');
        //if not superadmin, redirect to dashboard
        if($this->session->userdata('level') != 'superadmin'){
            redirect('adminSTI/dashboard');
        }

        //if no post usernameUPDATE, redirect to view controlAdmin
        if($usernameUPDATE == ''){
            redirect('adminSTI/controlAdmin');
        }

        //superadmin tidak boleh mengubah dirinya sendiri
        if($usernameUPDATE == $this->session->userdata('username')){
            redirect('adminSTI/controlAdmin');
        }

        $admin = $this->M_AdminSTI->getAdminByUsername($usernameUPDATE);
        $data = array(
            'admin' => $admin,
            'title' => 'Update Admin'
        );
        $this->load->view('admin/V_STI_UpdateAdmin', $data);
    }

    public function updateAdminAction()
    {
        //if not superadmin, redirect to dashboard
        if($this->session->userdata('level') != 'superadmin'){
            redirect('adminSTI/dashboard');
        }

        // if($this->input->post('submit') == NULL){
        //     redirect('adminSTI/controlAdmin');
        // }

        $username = $this->input->post('username');
		$level = $this->input->post('level');
        $passwordOLD = $this->input->post('passwordOLD');

		//if not updated password
        if($this->input->post('password') == ''){
            $arrayUpdate = array(
                'password' => $passwordOLD,
                'level' => $level
            );
            $arrayUpdate = $this->security->xss_clean($arrayUpdate);
            $this->M_AdminSTI->updateAdmin($username, $arrayUpdate);
            $this->session->set_flashdata('message', 'Admin berhasil diupdate');
            redirect('adminSTI/controlAdmin');
        }
        else{
            $password = md5($this->input->post('password'));
            $arrayUpdate = array(
                'password' => $password,
                'level' => $level
            );
            $arrayUpdate = $this->security->xss_clean($arrayUpdate);
            $this->M_AdminSTI->updateAdmin($username, $arrayUpdate);
            $this->session->set_flashdata('message', 'Admin berhasil diupdate');
            redirect('adminSTI/controlAdmin');
        }
    }

    public function deleteAdmin()
    {
        $usernameDELETE = $this->input->post('usernameDELETE');
        //if not superadmin, redirect to dashboard
        if($this->session->userdata('level') != 'superadmin'){
            redirect('adminSTI/dashboard');
        }

        //if no post usernameDELETE, redirect to view controlAdmin
        if($usernameDELETE == ''){
            redirect('adminSTI/controlAdmin');
        }

        //superadmin tidak boleh menghapus dirinya sendiri
        if($usernameDELETE == $this->session->userdata('username')){
            redirect('adminSTI/controlAdmin');
        }

        $this->M_AdminSTI->deleteAdmin($usernameDELETE);
        $this->session->set_flashdata('message', 'Admin berhasil dihapus');
        redirect('adminSTI/controlAdmin');
    }
}