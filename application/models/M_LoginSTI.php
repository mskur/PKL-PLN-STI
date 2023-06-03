<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_LoginSTI extends CI_Model {

    public function getLogin($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('admin');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $sess = array(
                    'username' => $row->username,
                    'password' => $row->password,
                    'level' => $row->level
                );
            }
            //$this->session->get_userdata($sess);
            $this->session->set_userdata($sess);
            redirect('adminSTI/dashboard');
        } 
        else {
            $this->session->set_flashdata('error', 'Username atau Password salah');
            redirect('LoginSTI/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('LoginSTI/login');
    }

    public function protectLogin()
    {
        if ($this->session->userdata('username') == null && $this->session->userdata('password') == null) {
            redirect('LoginSTI/login');
        }
    }
}
