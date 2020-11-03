<?php
class M_prop extends CI_Model {

    function proposal($npm)
    {
        $this->db->where('npm',$npm);
        $query = $this->db->get('proposal');
        return $query;
    }

    function riwayat_proposal(){
        $this->db->select('*');
        $this->db->from('proposal');
        $this->db->join('mahasiswa','proposal.npm=mahasiswa.npm');
        $this->db->where('proposal.status_proposal','diterima');
        $this->db->where('mahasiswa.status','Kerja Praktek');
        return $this->db->get();
    }

    function riwayat_revisi(){
        $this->db->select('*');
        $this->db->from('proposal');
        $this->db->join('mahasiswa','proposal.npm=mahasiswa.npm');
        $this->db->where('proposal.status_proposal','ditolak');
        $this->db->where('mahasiswa.status','Kerja Praktek');
        return $this->db->get();
    }

    function cek_proposal($npm){
        $this->db->where('npm',$npm);
        $query = $this->db->get('proposal');
        return $query->result();
    }

    function ubah_judul($npm,$judul){
        $this->db->where('npm',$npm);
        $this->db->set('judul',$judul);
        $query = $this->db->update('proposal');
        return $query;
    }

    function upload($data){
        $query = $this->db->insert('proposal', $data);
        return $query;
    }

    function proposal_koor(){
        $this->db->where('status_proposal','Menunggu Persetujuan');
        $this->db->select('*');
        $this->db->from('proposal');
        $this->db->join('mahasiswa', 'mahasiswa.npm = proposal.npm');
        $query = $this->db->get();
        return $query;
    }

    function total_proposal($npm){
        $this->db->where('npm',$npm);
        $query = $this->db->count_all_results('proposal');
        return $query;
    }

    function terima_prop($status,$npm){
        $this->db->where('npm',$npm);
        $this->db->where('status_proposal','Menunggu Persetujuan');
        $this->db->set('status_proposal',$status);
        $query = $this->db->update('proposal');
        return $query;
    }

    function tolak_prop($status,$npm,$filename,$keterangan){
        $this->db->set('status_proposal',$status);
        $this->db->set('revisi',$filename);
        $this->db->set('keterangan',$keterangan);
        $this->db->where('npm',$npm);
        $this->db->where('status_proposal','Menunggu Persetujuan');
        $query = $this->db->update('proposal');
        return $query;
    }
}
?>