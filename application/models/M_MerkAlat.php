<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_MerkAlat extends CI_Model {
    public function getAllmerk()
    {
        $query = $this->db->get('merkalat');
        return $query->result();
    }
    
    public function addMerk($data)
    {
        $this->db->insert('merkalat', $data);
    }

    public function getMerkById($idMerk)
    {
        $this->db->where('idMerk', $idMerk);
        $query = $this->db->get('merkalat');
        return $query->row();
    }

    public function updateMerk($data, $idMerk)
    {
        $this->db->where('idMerk', $idMerk);
        $this->db->update('merkalat', $data);
    }

    public function deleteMerk($idMerk)
    {
        $this->db->where('idMerk', $idMerk);
        $this->db->delete('merkalat');
    }

}