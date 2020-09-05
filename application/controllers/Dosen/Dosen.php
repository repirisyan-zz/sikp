<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_dos');
		$this->load->model('M_mhs');
		$this->load->model('M_rekjudul');
	}

	function index(){
		if($this->session->userdata('role') == 'mahasiswa'){
			redirect('Mahasiswa/Mahasiswa');
		}else if($this->session->userdata('role') == 'staff'){
			redirect('Staff/Staff');
		}else if($this->session->userdata('role') == 'koordinator'){
			redirect('Koordinator/Koordinator');
		}
		else if($this->session->userdata('status') != 'login' || $this->session->userdata('role') != 'dosen'){
			redirect('Dosen/Dosen/login');
		}else{
			$x['title'] = "Beranda Dosen";
			$nip = $this->session->userdata('username');
			$data_sidang['data_sidang'] = $this->M_mhs->sidang_mhs_bim($nip);
			$mhs_sidang = $this->M_mhs->sidang_mhs_bim($nip)->num_rows();
			$total_rek_judul = $this->M_rekjudul->total_rekjudul($nip);
			$tot_ambil_rekjudul = $this->M_rekjudul->ambil_rekjudul($nip);
			$tot_mhs_bimbingan = $this->M_mhs->tot_mhs_bimbingan();
			$this->session->set_userdata('jml_mhs_sidang',$mhs_sidang);
			$this->session->set_userdata('tot_ambil_rekjudul',$tot_ambil_rekjudul);
			$this->session->set_userdata('tot_mhs_bimbingan',$tot_mhs_bimbingan);
			$this->session->set_userdata('total_rek_judul',$total_rek_judul);
			$this->session->set_userdata('menu','menu_beranda');
			$this->load->view('dosen/header',$x);
			$this->load->view('dosen/dashboard',$data_sidang);
			$this->load->view('dosen/footer');
		}
	}

	function login()
	{
		if($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'dosen'){
			redirect('Dosen/Dosen');
		}else{
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
                
            if ($this->form_validation->run() == false) {
                $x['title'] = "Halaman Login Dosen";
                $this->load->view('header', $x);
                $this->load->view('dosen/login');
                $this->load->view('footer');
            } else {
                $nip = $this->input->post('username');
                $password = md5($this->input->post('password'));
                $cek = $this->M_dos->login($nip, $password)->num_rows();

                if ($cek > 0) {
                    $user_login = array(
                            'status' => "login",
							'username' => $nip,
							'role' => "dosen"
                            );
                    $this->session->set_userdata($user_login);
                    redirect('Dosen/Dosen');
                } else {
                    $this->session->set_flashdata('login', "Username atau Password salah");
                    redirect('Dosen/Dosen/login');
                }
            }
        }
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('Landing','refresh');
	}
}