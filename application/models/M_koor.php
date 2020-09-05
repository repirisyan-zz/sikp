<?php
class M_koor extends CI_Model {

    function login($username,$password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('koordinator');
        return $query;
    }

    function profile($username){
        $this->db->where('username',$username);
        $query = $this->db->get('koordinator');
        return $query;
    }

    function ubah_password($sandi_baru,$username){
        $this->db->where('username',$username);
        $this->db->set('password',$sandi_baru);
        $query = $this->db->update('koordinator');
        return $query;
    }

    function upload_profile($username,$filename){
        $this->db->where('username',$username);
        $this->db->set('foto',$filename);
        $query = $this->db->update('koordinator');
        return $query;
    }

    function upload_sampul($username,$filename){
        $this->db->where('username',$username);
        $this->db->set('sampul',$filename);
        $query = $this->db->update('koordinator');
        return $query;
    }
}
?>