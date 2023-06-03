<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_MonitoringSTI extends CI_Model {
    public function getAllIPAddress(){
        $query = $this->db->get('monitoringip');
        return $query->result();
    }

    public function addIPAddress($data){
        $this->db->insert('monitoringip', $data);
    }

    public function updateIPAddress($data, $ipAddress){
        $this->db->where('ipAddress', $ipAddress);
        $this->db->update('monitoringip', $data);
    }

    public function deleteIPAddress($ipAddress){
        $this->db->where('ipAddress', $ipAddress);
        $this->db->delete('monitoringip');
    }
}