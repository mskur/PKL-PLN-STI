<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_UnitLV1 extends CI_Model {
    public function getUnitLV1()
    {
        $query = $this->db->get('unitlv1');
        return $query->result();
    }
    
    public function addUnitLV1($data)
    {
        $this->db->insert('unitlv1', $data);
    }

    public function getUnitLV1ById($idL1)
    {
        $this->db->where('idL1', $idL1);
        $query = $this->db->get('unitlv1');
        return $query->row();
    }

    public function updateUnitLV1($data, $idL1)
    {
        $this->db->where('idL1', $idL1);
        $this->db->update('unitlv1', $data);
    }

    public function deleteUnitLV1($idL1)
    {
        $this->db->where('idL1', $idL1);
        $this->db->delete('unitlv1');
    }

}