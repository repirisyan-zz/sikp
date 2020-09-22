<?php
class M_rekjudul extends CI_Model {

    function rekomendasi_judul(){
        $this->db->select('*');
        $this->db->from('rek_judul');
        $this->db->join('dosen','dosen.nip=rek_judul.nip');
        $query = $this->db->get();
        return $query;
    }

    function rekjudul($nip)
    {
        $this->db->where('nip', $nip);
        $this->db->where('status_judul','1');
        $query = $this->db->get('rek_judul');
        return $query;
    }

    function ambil_rekjudul($nip)
    {
        $this->db->where('nip', $nip);
        $this->db->where('status_judul','0');
        $query = $this->db->count_all_results('rek_judul');
        return $query;
    }

    function batas_judul($nip)
    {
        $this->db->set('batas_judul','batas_judul-1',false);
        $this->db->where('nip',$nip);
        $query = $this->db->update('dosen');
        return $query;
    }

    function batas_judul_tambah($nip){
        $this->db->set('batas_judul','batas_judul+1',false);
        $this->db->where('nip',$nip);
        $query = $this->db->update('dosen');
        return $query;
    }

    function pilih_judul($id,$npm,$status){
        $this->db->set('npm',$npm);
        $this->db->set('status_judul',$status);
        $this->db->where('id',$id);
        $query = $this->db->update('rek_judul');
        return $query;
    }

    function cek_judul($npm){
        $this->db->where('npm',$npm);
        $this->db->where('status_judul','0');
        $query = $this->db->get('rek_judul');
        return $query;
    }

    function total_rekjudul($nip){
        $this->db->where('nip',$nip);
        $query = $this->db->count_all_results('rek_judul');
        return $query;
    }

    function rekjudul_mhs($npm){
        $this->db->where('npm',$npm);
        $this->db->where('status_judul','0');
        $this->db->select('*');
        $this->db->from('rek_judul');
        $this->db->join('dosen','rek_judul.nip = dosen.nip');
        $query = $this->db->get();
        return $query;
    }

    function rekjudul_mhs_baru(){
        $this->db->where('status_judul','1');
        $this->db->select('*');
        $this->db->from('rek_judul');
        $this->db->join('dosen','rek_judul.nip = dosen.nip');
        $query = $this->db->get();
        return $query;
    }

    function tambah_judul($data){
       $query =  $this->db->insert('rek_judul',$data);
        return $query;
    }

    function ubah_judul($id,$judul,$keterangan){
        $this->db->where('id',$id);
        $this->db->set('judul',$judul);
        $this->db->set('keterangan',$keterangan);
        $query = $this->db->update('rek_judul');
        return $query;
    }

    function hapus_judul($id){
        $this->db->where('id',$id);
        $query = $this->db->delete('rek_judul');
        return $query;
    }
}
?>