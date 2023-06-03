<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_TopologiSTI extends CI_Model {

    public function showAllTopologi(){
        $query = $this->db->get('topologi');
        return $query->result();
    }

    public function addTopologi($data){
        $this->db->insert('topologi', $data);
    }

    public function getTopologiById($idTopologi){
        $this->db->where('idTopologi', $idTopologi);
        $query = $this->db->get('topologi');
        return $query->row();
    }

    public function updateTopologi($idTopologi, $data){
        $this->db->where('idTopologi', $idTopologi);
        $this->db->update('topologi', $data);
    }

    public function deleteTopologi($idTopologi){
        $this->db->where('idTopologi', $idTopologi);
        $this->db->delete('topologi');
    }
}