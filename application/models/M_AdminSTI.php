<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_AdminSTI extends CI_Model {

    public function getAdmin()
    {
        $query = $this->db->get('admin');
        return $query->result();
    }

    public function addAdmin($data)
    {
        $this->db->insert('admin', $data);
    }

    public function getAdminByUsername($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('admin');
        return $query->result();
    }

    public function updateAdmin($username, $data)
    {
        $this->db->where('username', $username);
        $this->db->update('admin', $data);
    }

    public function deleteAdmin($username)
    {
        $this->db->where('username', $username);
        $this->db->delete('admin');
    }
}