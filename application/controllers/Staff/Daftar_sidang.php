<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_sidang extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('M_mhs');
    }
    
	function index()
	{
        if($this->session->userdata('role') == 'koordinator'){
			redirect('Koordinator/Koordinator');
		}else if($this->session->userdata('role') == 'mahasiswa'){
			redirect('Mahasiswa/Mahasiswa');
		}else if($this->session->userdata('role') == 'dosen'){
			redirect('Dosen/Dosen');
		}
		else if($this->session->userdata('status') != 'login' || $this->session->userdata('role') != 'staff'){
			redirect('Staff/Staff/login');
        } else {
            $this->session->set_userdata('menu','menu_daftar_sidang');
            $title['title'] = "Daftar Mahasiswa Sidang";
            $data_mhs['data_mhs'] = $this->M_mhs->jadwal_sidang_mhs();
            $this->load->view('staff/header', $title);
            $this->load->view('staff/daftar_sidang', $data_mhs);
            $this->load->view('staff/footer');
        }
    }

    function selesai_sidang(){
        $this->form_validation->set_rules('nama', 'nama', 'required');     
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('selesai_sidang','false');
            redirect('Staff/Daftar_sidang');
        }else{
            $npm = $this->input->post('npm');
            $this->M_mhs->selesai_sidang($npm);
            $this->session->set_flashdata('selesai_sidang','true');
            redirect('Staff/Daftar_sidang');
        }
    }
}