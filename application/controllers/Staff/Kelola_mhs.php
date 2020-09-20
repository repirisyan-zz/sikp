<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_mhs extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_staff');
	}

	function index(){
		if($this->session->userdata('role') == 'koordinator'){
			redirect('Koordinator/Koordinator');
		}else if($this->session->userdata('role') == 'mahasiswa'){
			redirect('Mahasiswa/Mahasiswa');
		}else if($this->session->userdata('role') == 'dosen'){
			redirect('Dosen/Dosen');
		}
		else if($this->session->userdata('status') != 'login' || $this->session->userdata('role') != 'staff'){
			redirect('Staff/Staff/login');
		}else{
			$x['title'] = "Kelola Mahasiswa";
			$this->session->set_userdata('menu','menu_kelola_mhs');
			$jumlah_data = $this->M_staff->kelola_mhs()->num_rows();
			$config['base_url'] = base_url('Staff/Kelola_mhs');
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = 3;
			$from = $this->uri->segment(3);
			$this->pagination->initialize($config);
			$data_mhs['data_mhs'] = $this->M_staff->kelola_mhs($config['per_page'],$from);
			$this->load->view('staff/header',$x);
			$this->load->view('staff/kelola_mhs',$data_mhs);
			$this->load->view('staff/footer');
		}
	}

	function tambah_mhs(){
		$this->form_validation->set_rules('npm', 'npm', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');     
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('kelola','null');
				redirect(base_url('Staff/Kelola_mhs'));
        }else{
			$this->load->model('M_mhs');
			$npm = $this->input->post('npm');
			$cek1 = $this->M_mhs->profile($npm)->num_rows();
			if($cek1 > 0){
				$this->session->set_flashdata('kelola','tambah_gagal');
				redirect(base_url('Staff/Kelola_mhs'));
			}else{
				$nama = $this->input->post('nama');
				$password = '12345';
				$kemajuan = 'Mulai Kerja Praktek';
				$status = 'Kerja Praktek';
				$foto = 'default_profile.jpg';
				$sampul = 'default_sampul.jpg';
				$data = array(
					'npm' => $npm,
					'nama' => $nama,
					'password' => md5($password),
					'kemajuan' => $kemajuan,
					'status' => $status,
					'foto' => $foto,
					'sampul' => $sampul
				);
				$this->M_staff->tambah_mhs($data);
				$this->session->set_flashdata('kelola','tambah');
				redirect(base_url('Staff/Kelola_mhs'));
			}
		}
	}		
	
	function ubah_mhs(){
		$this->form_validation->set_rules('npm', 'npm', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');     
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('kelola','null');
				redirect(base_url('Staff/Kelola_mhs'));
        }else{
			$npm = $this->input->post('npm');
		$nama = $this->input->post('nama');
		$data = array(
			'npm' => $npm,
			'nama' => $nama
		);
		$cek = $this->M_staff->ubah_mhs($data,$npm);
		if($cek == TRUE){
			$this->session->set_flashdata('kelola','ubah');
			redirect(base_url('Staff/Kelola_mhs'));
		}
		else{
			$this->session->set_flashdata('kelola','ubah_gagal');
			redirect(base_url('Staff/Kelola_mhs'));
		}
		}
		
	}

	function hapus_mhs(){
		$this->form_validation->set_rules('npm', 'npm', 'required');    
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('kelola','hapus_gagal');
			redirect(base_url('Staff/Kelola_mhs'));
        }else{
			$npm = $this->input->post('npm');
			$cek = $this->M_staff->hapus_mhs($npm);
			$this->session->set_flashdata('kelola','hapus');
			redirect(base_url('Staff/Kelola_mhs'));
		}
	}
}