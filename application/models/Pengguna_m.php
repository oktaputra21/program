<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_m extends CI_Model
{
    public function get($id_user = null)
    {
        $this->db->select('*');
        $this->db->from('user');
        if ($id_user != null) {
            $this->db->where('id_user', $id_user);
        }
        $query = $this->db->get();
        return $query;
    }
}
