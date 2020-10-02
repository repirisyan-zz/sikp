<?php
class M_dos extends CI_Model {

    function login($nip,$password)
    {
        $this->db->where('nip', $nip);
        $this->db->where('status_aktif','1');
        $this->db->where('password', $password);
        $query = $this->db->get('dosen');
        return $query;
    }

    function total_dosen(){
        $query = $this->db->count_all_results('dosen');
        return $query;
    }

    function total_dosen_pem(){
        $this->db->where('status_aktif','1');
        $query = $this->db->count_all_results('dosen');
        return $query;
    }

    function profile($username){
        $this->db->where('nip',$username);
        $query = $this->db->get('dosen');
        return $query;
    }

    function upload_profile($nip,$filename){
        $this->db->where('nip',$nip);
        $this->db->set('foto',$filename);
        $query = $this->db->update('dosen');
        return $query;
    }

    function upload_sampul($nip,$filename){
        $this->db->where('nip',$nip);
        $this->db->set('sampul',$filename);
        $query = $this->db->update('dosen');
        return $query;
    }

    function dosen_pembimbing(){
        $this->db->where('status_aktif','1');
        $this->db->where('batas_mhs >','0');
        $query = $this->db->get('dosen');
        return $query;
    }

    function batas_mhs(){
        $this->db->where('status_aktif','1');
        $query = $this->db->get('dosen');
        return $query;
    }

    function tambah_batas_mhs($batas_mhs){
        $this->db->where('status_aktif','1');
        $this->db->set('batas_mhs',$batas_mhs);
        $this->db->set('batas_menguji',$batas_mhs);
        $this->db->set('batas_judul',$batas_mhs);
        $query = $this->db->update('dosen');
        return $query;
    }

    function tambah_penguji(){
        $this->db->where('batas_menguji >','0');
        $this->db->select('nama_dosen');
        $this->db->from('dosen');
        $query = $this->db->get();
        return $query;
    }


    function min_batas_mhs($nip){
        $this->db->where('nip',$nip);
        $this->db->set('batas_mhs','batas_mhs-1',false);
        $this->db->update('dosen');
    }

    function min_batas_menguji($nama_penguji){
        $this->db->where('nama_dosen',$nama_penguji);
        $this->db->set('batas_menguji','batas_menguji-1',false);
        $this->db->update('dosen');
    }

    function ubah_password($sandi_baru,$nip){
        $this->db->where('nip',$nip);
        $this->db->set('password',$sandi_baru);
        $query = $this->db->update('dosen');
        return $query;
    }

    function status_aktif($nip,$status_aktif){
        $this->db->where('nip',$nip);
        $this->db->set('status_aktif',$status_aktif);
        $query = $this->db->update('dosen');
        return $query;
    }
}
?>