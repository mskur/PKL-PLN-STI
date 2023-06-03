<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_KegiatanSTI extends CI_Model {
    
    public function getAllKegiatan(){
        $query = $this->db->get('kegiatan');
        return $query->result();
    }

    public function addKegiatan($arrayInsert){
        $this->db->insert('kegiatan', $arrayInsert);
    }

    public function getKegiatanDetail($idKegiatan){
        $this->db->where('idKegiatan', $idKegiatan);
        $query = $this->db->get('kegiatan');
        return $query->row();
    }

    public function updateKegiatan($idKegiatan, $arrayUpdate){
        $this->db->where('idKegiatan', $idKegiatan);
        $this->db->update('kegiatan', $arrayUpdate);
    }

    public function deleteKegiatan($idKegiatan){
        $this->db->where('idKegiatan', $idKegiatan);
        $this->db->delete('kegiatan');
    }
}