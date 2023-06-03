<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_UnitLV3 extends CI_Model {
    public function getUnitLV3()
    {
        $query = $this->db->get('unitlv3');
        return $query->result();
    }
    
    public function addUnitLV3($data)
    {
        $this->db->insert('unitlv3', $data);
    }

    public function getUnitLV3ById($idL3)
    {
        $this->db->where('idL3', $idL3);
        $query = $this->db->get('unitlv3');
        return $query->row();
    }

    public function updateUnitLV3($data, $idL3)
    {
        $this->db->where('idL3', $idL3);
        $this->db->update('unitlv3', $data);
    }

    public function deleteUnitLV3($idL3)
    {
        $this->db->where('idL3', $idL3);
        $this->db->delete('unitlv3');
    }

}