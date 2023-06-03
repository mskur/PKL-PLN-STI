<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_TransaksiLink extends CI_Model {
    public function getAllTransaksiLink(){
        //join
        $this->db->select('*')
                ->from('transaksi_link tl')
                ->join('unitlv1 u1', 'tl.idL1 = u1.idL1')
                ->join('unitlv2 u2', 'tl.idL2 = u2.idL2')
                ->join('unitlv3 u3', 'tl.idL3 = u3.idL3')
                ->join('unitlv4 u4', 'tl.idL4 = u4.idL4')
                ->join('link l', 'tl.SID = l.SID');
        $query = $this->db->get();
        return $query->result();
    }

    public function addTransaksiLink($data){
        $this->db->insert('transaksi_link', $data);
    }

    public function getTransaksiLinkById($idTL){
        $query = $this->db->get_where('transaksi_link', array('idTL' => $idTL));
        return $query->row();
    }

    public function updateTransaksiLink($data, $idTL){
        $this->db->where('idTL', $idTL);
        $this->db->update('transaksi_link', $data);
    }

    public function deleteTransaksiLink($idTL){
        $this->db->where('idTL', $idTL);
        $this->db->delete('transaksi_link');
    }

}