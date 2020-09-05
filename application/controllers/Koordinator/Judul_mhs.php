<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judul_mhs extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('M_mhs');
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
            $x['title'] = "Judul Kerja Praktek";
            $data_mhs['data_mhs'] = $this->M_mhs->judul_mhs(); 
			$this->session->set_userdata('menu','menu_ubah_judul');
			$this->load->view('koordinator/header',$x);
			$this->load->view('koordinator/judul_mhs',$data_mhs);
			$this->load->view('koordinator/footer');
		}
    }
    
    function ubah_judul(){
        $this->form_validation->set_rules('npm', 'npm', 'required');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('ubah_judul', 'judul_false');
            redirect('Koordinator/Judul_mhs');
        } else {
            $npm = $this->input->post('npm');
            $judul = $this->input->post('judul');
            $this->load->model('M_prop');
            $cek = $this->M_prop->ubah_judul($npm, $judul);
            if ($cek == true) {
                $this->session->set_flashdata('ubah_judul', 'judul_true');
                redirect('Koordinator/Judul_mhs');
            }
        }
    }
}