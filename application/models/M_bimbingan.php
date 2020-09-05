<?php
class M_bimbingan extends CI_Model
{

    function lihat_bimbingan_mhs($npm){
        $this->db->where('npm',$npm);
        $query = $this->db->get('bimbingan');
        return $query;
    }

    function upload($data){
        $query = $this->db->insert('bimbingan', $data);
        return $query;
    }

    function total_bimbingan($npm){
        $this->db->where('npm',$npm);
        $query = $this->db->count_all_results('bimbingan');
        return $query;
    }

    function upload_revisi($id,$filename,$keterangan){
        $this->db->where('id',$id);
        $this->db->set('revisi',$filename);
        $this->db->set('keterangan',$keterangan);
        $query = $this->db->update('bimbingan');
        return $query;
    }

    function tambah($data){
        $query = $this->db->insert('bimbingan',$data);
        return $query;
    }
}