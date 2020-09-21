<?php
class M_staff extends CI_Model {

    function kelola_mhs(){
        $this->db->order_by('npm','ASC');
        $query = $this->db->get('mahasiswa');
        return $query;
    }

    function kelola_dosen(){
        $this->db->order_by('nip','ASC');
        $query = $this->db->get('dosen');
        return $query;
    }

    function profile($username){
        $this->db->where('username',$username);
        $query = $this->db->get('staff');
        return $query;
    }

    function upload_profile($username,$filename){
        $this->db->where('username',$username);
        $this->db->set('foto',$filename);
        $query = $this->db->update('staff');
        return $query;
    }

    function upload_sampul($username,$filename){
        $this->db->where('username',$username);
        $this->db->set('sampul',$filename);
        $query = $this->db->update('staff');
        return $query;
    }

    function ubah_password($sandi_baru,$username){
        $this->db->where('username',$username);
        $this->db->set('password',$sandi_baru);
        $query = $this->db->update('staff');
        return $query;
    }

    function login($username,$password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('staff');
        return $query;
    }

    function tambah_mhs($data){
        $query = $this->db->insert('mahasiswa', $data);
        return $query;
    }

    function ubah_mhs($data,$npm){
        $this->db->where('npm',$npm);
        $query = $this->db->update('mahasiswa',$data);
        return $query;
    }
    
    function hapus_mhs($npm){
        $this->db->where('npm',$npm);
        $query = $this->db->delete('mahasiswa');
        return $query;
    }

    function tambah_dosen($data){
        $query = $this->db->insert('dosen', $data);
        return $query;
    }

    function ubah_dosen($data,$nip){
        $this->db->where('nip',$nip);
        $query = $this->db->update('dosen',$data);
        return $query;
    }

    function hapus_dosen($nip){
        $this->db->where('nip',$nip);
        $query = $this->db->delete('dosen');
        return $query;
    }
}
?>