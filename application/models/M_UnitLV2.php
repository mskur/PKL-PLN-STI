<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_UnitLV2 extends CI_Model {
    public function getUnitLV2()
    {
        $query = $this->db->get('unitlv2');
        return $query->result();
    }
    
    public function addUnitLV2($data)
    {
        $this->db->insert('unitlv2', $data);
    }

    public function getUnitLV2ById($idL2)
    {
        $this->db->where('idL2', $idL2);
        $query = $this->db->get('unitlv2');
        return $query->row();
    }

    public function updateUnitLV2($data, $idL2)
    {
        $this->db->where('idL2', $idL2);
        $this->db->update('unitlv2', $data);
    }

    public function deleteUnitLV2($idL2)
    {
        $this->db->where('idL2', $idL2);
        $this->db->delete('unitlv2');
    }

}