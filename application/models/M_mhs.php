<?php
class M_mhs extends CI_Model {

    function login($npm,$password)
    {
        $this->db->where('npm', $npm);
        $this->db->where('password', $password);
        $query = $this->db->get('mahasiswa');
        return $query;
    }

    function sidang($npm){
        $this->db->set('kemajuan','Seminar');
        $this->db->where('npm',$npm);
        $query = $this->db->update('mahasiswa');
        return $query;
    }

    function total_mhs(){
        $this->db->where('status','Kerja Praktek');
        $query = $this->db->count_all_results('mahasiswa');
        return $query;
    }
    
    function tot_pengajuan_prop(){
        $this->db->where('kemajuan','Pengajuan Proposal');
        $query = $this->db->count_all_results('mahasiswa');
        return $query;
    }

    function tot_mhs_bimbingan(){
        $this->db->where('kemajuan','Bimbingan');
        $query = $this->db->count_all_results('mahasiswa');
        return $query;
    }

    function sidang_mhs($npm){
        $this->db->where('kemajuan','Seminar');
        $this->db->where('status','Kerja Praktek');
        $this->db->where('tanggal_sidang !=',null);
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('dosen','mahasiswa.nip = dosen.nip');
        $this->db->where('status_proposal','diterima');
        $this->db->join('proposal','mahasiswa.npm = proposal.npm');
        $this->db->where('mahasiswa.npm',$npm);
        $query = $this->db->get();
        return $query;
    }
    
    function nama_dosen($npm){
        $this->db->where('npm',$npm);
        $this->db->select('dosen.nama_dosen');
        $this->db->from('mahasiswa');
        $this->db->join('dosen','mahasiswa.nip = dosen.nip');
        $query = $this->db->get();
        return $query->result();
    }

    function rekomendasi_dosen($npm){
        $this->db->set('rekomendasi_dosen','1');
        $this->db->where('npm',$npm);
        $query = $this->db->update('mahasiswa');
        return $query;
    }

    function sidang_mhs_bim($nip){
        $this->db->where('kemajuan','Seminar');
        $this->db->where('status','Kerja Praktek');
        $this->db->where('tanggal_sidang !=',null);
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('dosen','mahasiswa.nip = dosen.nip');
        $this->db->where('status_proposal','diterima');
        $this->db->where('mahasiswa.nip',$nip);
        $this->db->join('proposal','mahasiswa.npm = proposal.npm');
        $query = $this->db->get();
        return $query;
    }

    function upload_profile($npm,$filename){
        $this->db->where('npm',$npm);
        $this->db->set('foto',$filename);
        $query = $this->db->update('mahasiswa');
        return $query;
    }

    function upload_sampul($npm,$filename){
        $this->db->where('npm',$npm);
        $this->db->set('sampul',$filename);
        $query = $this->db->update('mahasiswa');
        return $query;
    }

    function jadwal_sidang_mhs(){
        $this->db->where('kemajuan','Seminar');
        $this->db->where('status','Kerja Praktek');
        $this->db->where('tanggal_sidang !=',null);
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('dosen','mahasiswa.nip = dosen.nip');
        $this->db->where('status_proposal','diterima');
        $this->db->join('proposal','mahasiswa.npm = proposal.npm');
        $query = $this->db->get();
        return $query;
    }

    function selesai_sidang($npm){
        $this->db->where('npm',$npm);
        $this->db->set('status','Selesai');
        $query = $this->db->update('mahasiswa');
        return $query;
    }

    function ubah_kemajuan($npm,$kemajuan){
        $this->db->where('npm',$npm);
        $this->db->set('kemajuan',$kemajuan);
        $query = $this->db->update('mahasiswa');
        return $query;
    }

    function buat_jadwal($npm,$tanggal,$nama_penguji){
        $this->db->where('npm',$npm);
        $this->db->set('tanggal_sidang',$tanggal);
        $this->db->set('nama_penguji',$nama_penguji);
        $query = $this->db->update('mahasiswa');
        return $query;
    }

    function cek_sidang($npm){
        $this->db->where('npm',$npm);
        $this->db->where('kemajuan','Seminar');
        $query = $this->db->get('mahasiswa');
        return $query;
    }

    function data_menguji($nama_penguji){
        $this->db->from('mahasiswa');
        $this->db->join('proposal','mahasiswa.npm = proposal.npm');
        $this->db->where('mahasiswa.nama_penguji',$nama_penguji);
        $this->db->where('mahasiswa.kemajuan','Seminar');
        $this->db->where('mahasiswa.status','Kerja Praktek');
        $this->db->select('*');
        $query = $this->db->get();
        return $query;
    }

    function mhs_sidang(){
        $this->db->where('kemajuan','Seminar');
        $this->db->where('tanggal_sidang', null);
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('dosen', 'mahasiswa.nip = dosen.nip');
        $this->db->where('status_proposal','diterima');
        $this->db->join('proposal', 'mahasiswa.npm = proposal.npm ');
        $query = $this->db->get();
        return $query;
    }

    function lihat_mhs($npm){
        $this->db->where('npm',$npm);
        $query = $this->db->get('mahasiswa');
        return $query;
    }

    function lihat_dosen($nip){
        $this->db->where('nip',$nip);
        $this->db->where('kemajuan','Bimbingan');
        $query = $this->db->get('mahasiswa');
        return $query;
    }

    function tambah_dosen($nip,$npm){
        $this->db->where('npm',$npm);
        $this->db->set('nip',$nip);
        $this->db->set('kemajuan','Bimbingan');
        $query = $this->db->update('mahasiswa');
        return $query;
    }

    function mahasiswa(){
        $this->db->where('status','Kerja Praktek');
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('proposal','mahasiswa.npm = proposal.npm','mahasiswa.status_proposal = diterima');
        $query = $this->db->get();
        return $query;
    }

    function judul_mhs(){
        $this->db->where('status','Kerja Praktek');
        $this->db->from('mahasiswa');
        $this->db->join('proposal','mahasiswa.npm = proposal.npm');
        $this->db->where('proposal.status_proposal','diterima');
        $this->db->select('mahasiswa.npm,mahasiswa.nama,proposal.judul');
        $query = $this->db->get();
        return $query;
    }

    function cek_jml_mhs(){
        $this->db->where('status','Kerja Praktek');
        $query = $this->db->get('mahasiswa');
        return $query;
    }

    function profile($username){
        $this->db->where('npm',$username);
        $query = $this->db->get('mahasiswa');
        return $query;
    }

    function ubah_password($sandi_baru,$username){
        $this->db->where('npm',$username);
        $this->db->set('password',$sandi_baru);
        $query = $this->db->update('mahasiswa');
        return $query;
    }
}
?>