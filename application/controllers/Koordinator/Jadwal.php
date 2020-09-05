<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        $this->load->model('M_mhs');
        $this->load->model('M_dos');
    }
    
	function index()
	{
        if($this->session->userdata('role') == 'mahasiswa'){
			redirect('Mahasiswa/Mahasiswa');
		}else if($this->session->userdata('role') == 'staff'){
			redirect('Staff/Staff');
		}else if($this->session->userdata('role') == 'dosen'){
			redirect('Dosen/Dosen');
		}
		else if($this->session->userdata('status') != 'login' || $this->session->userdata('role') != 'koordinator'){
			redirect('Koordinator/Koordinator/login');
        } else {
            $this->session->set_userdata('menu','menu_jadwal');
            $title['title'] = "Jadwal Sidang";
            $data['data_penguji'] = $this->M_dos->tambah_penguji()->result_array();
            $data['data_mhs'] = $this->M_mhs->mhs_sidang();
            $this->load->view('koordinator/header', $title);
            $this->load->view('koordinator/buat_jadwal', $data);
            $this->load->view('koordinator/footer');
        }
    }

    function buat_jadwal(){
        $this->form_validation->set_rules('npm', 'NPM', 'required');
        $this->form_validation->set_rules('nama_penguji', 'Nama_penguji', 'required');            
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('buat_jadwal', 'false');
                redirect('Koordinator/Jadwal');
            }else{
                $npm = $this->input->post('npm');
                $nama_penguji = $this->input->post('nama_penguji');
                $tanggal = $this->input->post('tanggal');
                $this->M_mhs->buat_jadwal($npm, $tanggal, $nama_penguji);
                $this->M_dos->min_batas_menguji($nama_penguji);
                $this->session->set_flashdata('buat_jadwal', 'true');
                redirect('Koordinator/Jadwal');
            }
    }
}