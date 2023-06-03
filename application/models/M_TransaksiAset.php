<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_TransaksiAset extends CI_Model {
    public function getTransaksiAset()
    {
        //join 9 table
        $this->db->select('*')
                ->from('transaksi_aset as ta')
                ->join('unitlv1 as lv1', 'lv1.idL1 = ta.idL1')
                ->join('unitlv2 as lv2', 'lv2.idL2 = ta.idL2')
                ->join('unitlv3 as lv3', 'lv3.idL3 = ta.idL3')
                ->join('unitlv4 as lv4', 'lv4.idL4 = ta.idL4')
                ->join('kategorialat as ka', 'ka.idKategori = ta.idKategori')
                ->join('merkalat as ma', 'ma.idMerk = ta.idMerk')
                ->join('typealat as tya', 'tya.idType = ta.idType')
                //sort by idL1
                ->order_by('ta.idL1', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function addTransaksiAset($data)
    {
        $this->db->insert('transaksi_aset', $data);
    }

    public function getTransaksiAsetById($idTransaksi)
    {
        //get transaksi aset by id withou join
        $this->db->select('*')
                ->from('transaksi_aset')
                ->where('idTransaksi', $idTransaksi);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateTransaksiAset($data, $idTransaksi)
    {
        $this->db->where('idTransaksi', $idTransaksi);
        $this->db->update('transaksi_aset', $data);
    }

    public function deleteTransaksiAset($idTransaksi)
    {
        $this->db->where('idTransaksi', $idTransaksi);
        $this->db->delete('transaksi_aset');
    }
    
}