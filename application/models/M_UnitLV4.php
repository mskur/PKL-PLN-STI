<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_UnitLV4 extends CI_Model {
    public function getUnitLV4()
    {
        $query = $this->db->get('unitlv4');
        return $query->result();
    }
    
    public function addUnitLV4($data)
    {
        $this->db->insert('unitlv4', $data);
    }

    public function getUnitLV4ById($idL4)
    {
        $this->db->where('idL4', $idL4);
        $query = $this->db->get('unitlv4');
        return $query->row();
    }

    public function updateUnitLV4($data, $idL4)
    {
        $this->db->where('idL4', $idL4);
        $this->db->update('unitlv4', $data);
    }

    public function deleteUnitLV4($idL4)
    {
        $this->db->where('idL4', $idL4);
        $this->db->delete('unitlv4');
    }

}