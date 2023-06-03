<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginSTI extends CI_Controller {
    //construct
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_LoginSTI');
    }

	public function login()
	{
		$this->load->view('V_STI_Login');
	}

    public function loginAction()
    {
        $username = $this->form_validation->set_rules('username', 'Username', 'required', 
            array('required' => 'Username harus diisi')    
        );
        $password = $this->form_validation->set_rules('password', 'Password', 'required', 
            array('required' => 'Password harus diisi')    
        );

        if ($this->form_validation->run() == FALSE){
            $this->load->view('V_STI_Login');
        }
        else{
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $this->M_LoginSTI->getLogin($username, $password);
        }
    }

    public function logout()
    {
        $this->M_LoginSTI->logout();
    }
}
