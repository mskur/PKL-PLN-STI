<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_KategoriAlat extends CI_Model {
    public function getAllKategori()
    {
        $query = $this->db->get('kategorialat');
        return $query->result();
    }
    
    public function addKategori($data)
    {
        $this->db->insert('kategorialat', $data);
    }

    public function getKategoriById($idKategori)
    {
        $this->db->where('idKategori', $idKategori);
        $query = $this->db->get('kategorialat');
        return $query->row();
    }

    public function updateKategori($data, $idKategori)
    {
        $this->db->where('idKategori', $idKategori);
        $this->db->update('kategorialat', $data);
    }

    public function deleteKategori($idKategori)
    {
        $this->db->where('idKategori', $idKategori);
        $this->db->delete('kategorialat');
    }

}