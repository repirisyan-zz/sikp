<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_pem extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_mhs');
	}

	function index(){
		if($this->session->userdata('role') == 'koordinator'){
			redirect('Koordinator/Koordinator');
		}else if($this->session->userdata('role') == 'staff'){
			redirect('Staff/Staff');
		}else if($this->session->userdata('role') == 'dosen'){
			redirect('Dosen/Dosen');
		}
		else if($this->session->userdata('status') != 'login' || $this->session->userdata('role') != 'mahasiswa'){
			redirect('Mahasiswa/Mahasiswa/login');
		}else{
            $this->load->model('M_prop');
            $npm = $this->session->userdata('username');
            $prop_ada = $this->M_prop->cek_proposal($npm);
            $nip_ada = $this->M_mhs->lihat_mhs($npm)->result();
            foreach($nip_ada as $b){$nip_mhs = $b->nip;}
            foreach($prop_ada as $i){$status = $i->status_proposal;}
            if($status == 'diterima' && $nip_mhs != null){
                $this->session->set_userdata('bimbingan_mhs','true');
                redirect('Mahasiswa/Bimbingan');
            }else if($status == 'diterima'){
                $this->load->model('M_dos');
                $data_dosen['data_dosen'] = $this->M_dos->dosen_pembimbing();
                $x['title'] = "Dosen Pembimbing";
                $this->session->set_userdata('menu','menu_dosen_pem');
                $this->load->view('mahasiswa/header',$x);
                $this->load->view('mahasiswa/dosen_pem',$data_dosen);
                $this->load->view('mahasiswa/footer');
            }else{
                redirect('Mahasiswa/Pengajuan_prop');
            }
			
		}
    }
    
    function pilih_dosen(){
        $this->form_validation->set_rules('nip', 'nip', 'required');
            if ($this->form_validation->run() == false) {
                $this->session->set_userdata('bimbingan_mhs','false');
                redirect('Mahasiswa/Dosen_pem');
            }else{
                $nip = $this->input->post('nip');
                $npm = $this->session->userdata('username');
                $this->M_mhs->tambah_dosen($nip,$npm);
                $this->load->model('M_dos');
                $this->M_dos->min_batas_mhs($nip);
                $this->session->set_userdata('bimbingan_mhs','true');
                redirect('Mahasiswa/Bimbingan');
            }
    }

}