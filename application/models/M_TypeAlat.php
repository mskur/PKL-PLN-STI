<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_TypeAlat extends CI_Model {
    public function getAllType()
    {
        $query = $this->db->get('typealat');
        return $query->result();
    }
    
    public function addType($data)
    {
        $this->db->insert('typealat', $data);
    }

    public function getTypeById($idType)
    {
        $this->db->where('idType', $idType);
        $query = $this->db->get('typealat');
        return $query->row();
    }

    public function updateType($data, $idType)
    {
        $this->db->where('idType', $idType);
        $this->db->update('typealat', $data);
    }

    public function deleteType($idType)
    {
        $this->db->where('idType', $idType);
        $this->db->delete('typealat');
    }

}