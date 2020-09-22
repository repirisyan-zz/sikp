<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomendasi_judul extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('M_rekjudul');
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
            $x['title'] = "Rekomendasi Judul Dosen";
            $data_rekomendasi['data_rekomendasi'] = $this->M_rekjudul->rekomendasi_judul(); 
			$this->session->set_userdata('menu','menu_rekomendasi_judul');
			$this->load->view('koordinator/header',$x);
			$this->load->view('koordinator/rekomendasi_judul',$data_rekomendasi);
			$this->load->view('koordinator/footer');
		}
    }
    
}