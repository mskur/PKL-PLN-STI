<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Link extends CI_Model {
    public function getLink()
    {
        $query = $this->db->get('link');
        return $query->result();
    }
    
    public function addLink($data)
    {
        $this->db->insert('link', $data);
    }

    public function getLinkById($SID)
    {
        $this->db->where('SID', $SID);
        $query = $this->db->get('link');
        return $query->row();
    }

    public function updateLink($data, $SID)
    {
        $this->db->where('SID', $SID);
        $this->db->update('link', $data);
    }

    public function deleteLink($SID)
    {
        $this->db->where('SID', $SID);
        $this->db->delete('link');
    }

}