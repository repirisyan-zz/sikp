<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_dosen extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_dos');
	}

	function index(){
		if($this->session->userdata('role') == 'mahasiswa'){
			redirect('Mahasiswa/Mahasiswa');
		}else if($this->session->userdata('role') == 'staff'){
			redirect('Staff/Staff');
		}else if($this->session->userdata('role') == 'dosen'){
			redirect('Dosen/Dosen');
		}
		else if($this->session->userdata('status') != 'login' || $this->session->userdata('role') != 'koordinator'){
			redirect('Koordinator/Koordinator/login');
		}else{
			$x['title'] = "Status Dosen";
			$data_dosen['data_dosen'] = $this->db->get('dosen');
			$this->session->set_userdata('menu','menu_status_dosen');
			$this->load->view('koordinator/header',$x);
			$this->load->view('koordinator/status_dosen',$data_dosen);
			$this->load->view('koordinator/footer');
		}
	}
	
	function batas_mhs(){
		$this->load->model('M_mhs');
		$batas_mhs = 0;
		$dosen = $this->M_dos->batas_mhs()->num_rows();
		$mhs = $this->M_mhs->cek_jml_mhs()->num_rows();
		try{
			if($mhs%$dosen == 0){
				$batas_mhs = $mhs/$dosen; 
			}else if($mhs%$dosen == 1){
				$batas_mhs = floor($mhs/$dosen)+1;
				$this->M_dos->tambah_batas_mhs($batas_mhs);
				$this->session->set_flashdata('kalkulasi','batas_true');
				redirect('Koordinator/Status_dosen');	
			}
		}catch(DivisionByZeroError $e){
			$this->session->set_flashdata('kalkulasi','batas_false');
			redirect('Koordinator/Status_dosen');		
		}	
	}
    
    function status_aktif(){
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            redirect('Koordinator/Status_dosen');
        } else {
            $status_aktif ='';
            $nip = $this->input->post('nip');
            $status = $this->input->post('status');
            if ($status == 0) {
                $status_aktif = 1;
            } else {
                $status_aktif = 0;
            }
            $this->M_dos->status_aktif($nip, $status_aktif);
            redirect('Koordinator/Status_dosen');
        }
    }
}