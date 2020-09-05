<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koordinator extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_koor');
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
			$x['title'] = "Beranda Koordinator";
			$data_sidang['data_sidang'] = $this->M_mhs->jadwal_sidang_mhs();
			$mhs_sidang = $this->M_mhs->jadwal_sidang_mhs()->num_rows();
			$total_mhs = $this->M_mhs->total_mhs();
			$tot_pengajuan_prop = $this->M_mhs->tot_pengajuan_prop();
			$tot_mhs_bimbingan = $this->M_mhs->tot_mhs_bimbingan();
			$this->session->set_userdata('jml_mhs_sidang',$mhs_sidang);
			$this->session->set_userdata('tot_pengajuan_prop',$tot_pengajuan_prop);
			$this->session->set_userdata('tot_mhs_bimbingan',$tot_mhs_bimbingan);
			$this->session->set_userdata('total_mhs',$total_mhs);
			$this->session->set_userdata('menu','menu_beranda');
			$this->load->view('koordinator/header',$x);
			$this->load->view('koordinator/dashboard',$data_sidang);
			$this->load->view('koordinator/footer');
		}
	}

	function login()
	{
		if($this->session->userdata('status') == 'login'){
			redirect('Koordinator/Koordinator/');
		}else{
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
                
            if ($this->form_validation->run() == false) {
                $x['title'] = "Halaman Login Koordinator";
                $this->load->view('header', $x);
                $this->load->view('koordinator/login');
                $this->load->view('footer');
            } else {
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));
                $cek = $this->M_koor->login($username, $password)->num_rows();

                if ($cek > 0) {
                    $user_login = array(
                            'status' => "login",
                            'username' => $username,
							'password' => $password,
							'role' => "koordinator"
                            );
                    $this->session->set_userdata($user_login);
                    redirect('Koordinator/Koordinator');
                } else {
                    $this->session->set_flashdata('login', "Username atau Password salah");
                    redirect('Koordinator/Koordinator/login');
                }
            }
        }
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('Landing','refresh');
	}
}