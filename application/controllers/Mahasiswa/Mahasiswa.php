<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_bimbingan');
		$this->load->model('M_prop');
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
			$x['title'] = "Beranda Mahasiswa";
			$npm = $this->session->userdata('username');
			$data_sidang['data_sidang'] = $this->M_mhs->sidang_mhs($npm);
			$total_bimbingan = $this->M_bimbingan->total_bimbingan($npm);
			$total_pengajuan_prop = $this->M_prop->total_proposal($npm);
			$nama_dos = '';
			$nama_dosen = $this->M_mhs->nama_dosen($npm);
			foreach($nama_dosen as $i){$nama_dos = $i->nama_dosen;}
			$this->session->set_userdata('total_bimbingan',$total_bimbingan);
			$this->session->set_userdata('total_pengajuan_prop',$total_pengajuan_prop);
			if($nama_dos == null){
				$this->session->set_userdata('nama_dosen','Data tidak tersedia');
			}else{
				$this->session->set_userdata('nama_dosen',$nama_dos);
			}
			$this->session->set_userdata('menu','menu_beranda');
			$this->load->view('mahasiswa/header',$x);
			$this->load->view('mahasiswa/dashboard',$data_sidang);
			$this->load->view('mahasiswa/footer');
		}
	}

	function login()
	{
		if($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'mahasiswa'){
			redirect('Mahasiswa/Mahasiswa');
		}else{
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
                
            if ($this->form_validation->run() == false) {
                $x['title'] = "Halaman Login";
                $this->load->view('header', $x);
                $this->load->view('mahasiswa/login');
                $this->load->view('footer');
            } else {
                $npm = $this->input->post('username');
                $password = md5($this->input->post('password'));
                $cek = $this->M_mhs->login($npm, $password)->num_rows();
                if ($cek > 0) {
                    $user_login = array(
                            'status' => "login",
                            'username' => $npm,
							'password' => $password,
							'role' => "mahasiswa"
							);
					$this->load->model('M_rekjudul');
					$rekjud = $this->M_rekjudul->cek_judul($npm)->num_rows();
					$nip_ada = $this->M_mhs->lihat_mhs($npm)->result();
            		foreach($nip_ada as $b){$nip_mhs = $b->nip;}
					$this->load->model('M_prop');
					$status ='';
					$prop_ada = $this->M_prop->cek_proposal($npm);
					foreach($prop_ada as $i){$status = $i->status_proposal;}
					$status_sidang='';
					$stat_sid = $this->M_mhs->cek_sidang($npm)->result();
					foreach($stat_sid as $c){$status_sidang = $c->kemajuan;}
					if($status_sidang == 'Seminar'){
						$this->session->set_userdata('sidang_mhs','true');
					}else if($status == 'diterima' && $nip_mhs != null){
						$this->session->set_userdata('bimbingan_mhs','true');
					}else if ($rekjud > 0) {
                        $this->session->set_userdata('rekomend_judul', 'true');
                    }else if($status == 'Menunggu Persetujuan'){
						$this->session->set_userdata('prop_status','true');
					}else if($status == 'diterima'){
						$this->session->set_userdata('prop_status','true_terima');
					}
                    $this->session->set_userdata($user_login);
                    redirect('Mahasiswa/Mahasiswa');
                } else {
                    $this->session->set_flashdata('login', "Username atau Password salah");
                    redirect('Mahasiswa/Mahasiswa/login');
                }
            }
        }
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('Landing','refresh');
	}
}