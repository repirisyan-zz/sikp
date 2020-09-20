<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_staff');
    }

    public function index()
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
            $x['title'] = "Kelola Dosen";
            $this->session->set_userdata('menu', 'menu_kelola_dosen');
            $data_dosen['data_dosen'] = $this->M_staff->kelola_dosen();
            $this->load->view('staff/header', $x);
            $this->load->view('staff/kelola_dosen', $data_dosen);
            $this->load->view('staff/footer');
        }
	}
	
	function tambah_dosen(){
		$this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');     
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('kelola','tambah_dos_gagal');
			redirect(base_url('Staff/Kelola_dosen'));
        }else{
			$this->load->model('M_dos');
			$nip = $this->input->post('nip');
			$cek1 = $this->M_dos->profile($nip)->num_rows();
			if($cek1 > 0){
				$this->session->set_flashdata('kelola','tambah_dos_gagal');
				redirect(base_url('Staff/Kelola_dosen'));
			}else{
				$nama = $this->input->post('nama');
				$password = 'ftunsur';
				$foto = 'default_profile.jpg';
				$sampul = 'default_sampul.jpg';
				$data = array(
					'nip' => $nip,
					'nama_dosen' => $nama,
					'password' => md5($password),
					'foto' => $foto,
					'status_aktif' => '0',
					'sampul' => $sampul
				);
				$data1 = array(
					'nip' =>$nip,
					'nama_penguji' => $nama,
					'status_menguji' => '1'
				);
				$this->M_staff->tambah_dosen($data);
				$this->M_staff->tambah_penguji($data1);
				$this->session->set_flashdata('kelola','tambah');
				redirect(base_url('Staff/Kelola_dosen'));
			}	
		}
	}
	
	function ubah_dosen(){
		$this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');     
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('kelola','ubah_gagal');
			redirect(base_url('Staff/Kelola_dosen'));
        }else{
			$nip = $this->input->post('nip');
			$nama = $this->input->post('nama');
			$data = array(
				'nip' => $nip,
				'nama_dosen' => $nama
			);
			$this->M_staff->ubah_dosen($data,$nip);
			$this->session->set_flashdata('kelola','ubah');
			redirect(base_url('Staff/Kelola_dosen'));
		}
	}

	function hapus_dosen(){
		$this->form_validation->set_rules('nip', 'nip', 'required');    
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('kelola','hapus_gagal');
			redirect(base_url('Staff/Kelola_dosen'));
        }else{
			$nip = $this->input->post('nip');
			$cek = $this->M_staff->hapus_dosen($nip);
			$this->session->set_flashdata('kelola','hapus');
			redirect(base_url('Staff/Kelola_dosen'));
		}
		
	}
}
?>