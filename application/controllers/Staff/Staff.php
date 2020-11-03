<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_staff');
		$this->load->model('M_mhs');
		$this->load->model('M_dos');
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
			$x['title'] = "Beranda Staff";
			$data_sidang['data_sidang'] = $this->M_mhs->jadwal_sidang_mhs();
			$mhs_sidang = $this->M_mhs->jadwal_sidang_mhs()->num_rows();
			$total_mhs = $this->M_mhs->total_mhs();
			$total_dosen = $this->M_dos->total_dosen();
			$total_dosen_pem = $this->M_dos->total_dosen_pem();
			$tot_pengajuan_prop = $this->M_mhs->tot_pengajuan_prop();
			$tot_mhs_bimbingan = $this->M_mhs->tot_mhs_bimbingan();
			$this->session->set_userdata('jml_mhs_sidang',$mhs_sidang);
			$this->session->set_userdata('tot_pengajuan_prop',$tot_pengajuan_prop);
			$this->session->set_userdata('tot_mhs_bimbingan',$tot_mhs_bimbingan);
			$this->session->set_userdata('total_dosen',$total_dosen);
			$this->session->set_userdata('total_dosen_pem',$total_dosen_pem);
			$this->session->set_userdata('total_mhs',$total_mhs);
			$this->session->set_userdata('menu','menu_beranda');
			$this->load->view('staff/header',$x);
			$this->load->view('staff/dashboard',$data_sidang);
			$this->load->view('staff/footer');
		}
	}

	function login()
	{
		if($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'staff'){
			redirect('Staff/Staff');
		}else{
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
                
            if ($this->form_validation->run() == false) {
                $x['title'] = "Login Page";
                $this->load->view('header', $x);
                $this->load->view('staff/login');
                $this->load->view('footer');
            } else {
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));
                $cek = $this->M_staff->login($username, $password)->num_rows();

                if ($cek == 1) {
                    $user_login = array(
                            'status' => "login",
                            'username' => $username,
							'password' => $password,
							'role' => "staff"
                            );
                    $this->session->set_userdata($user_login);
                    redirect('Staff/Staff');
                } else {
                    $this->session->set_flashdata('login', "Username atau Password salah");
                    redirect('Staff/Staff/login');
                }
            }
        }
	}

	function hapus_file(){
		$konfirmasi = $this->input->post('konfirmasi');
		if($konfirmasi == 'KONFIRMASI'){
			// Enter the name of directory 
		$pathdir = "Directory Name/";  
		
		// Enter the name to creating zipped directory 
		$zipcreated = "Name of Zip.zip"; 
		
		// Create new zip class 
		$zip = new ZipArchive; 
		
		if($zip -> open($zipcreated, ZipArchive::CREATE ) === TRUE) { 
			
			// Store the path into the variable 
			$dir = opendir($pathdir); 
			
			while($file = readdir($dir)) { 
				if(is_file($pathdir.$file)) { 
					$zip -> addFile($pathdir.$file, $file); 
				} 
			} 
			$zip ->close(); 
		} 
			$files = glob('file/laporan/*'); //get all file names
			foreach($files as $file){
				if(is_file($file))
				unlink($file); //delete file
			}
			$files1 = glob('file/proposal/*'); //get all file names
			foreach($files1 as $file1){
				if(is_file($file1))
				unlink($file1); //delete file
			}
			$files2 = glob('file/revisi/*'); //get all file names
			foreach($files2 as $file2){
				if(is_file($file2))
				unlink($file2); //delete file
			}
			$files3 = glob('file/revisi_proposal/*'); //get all file names
			foreach($files3 as $file3){
				if(is_file($file3))
				unlink($file3); //delete file
			}
			$this->session->set_flashdata('hapus_file','true');
			redirect('Staff/Staff');
		}else {
			$this->session->set_flashdata('hapus_file','false');
			redirect('Staff/Staff');
		}
		
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('Landing','refresh');
	}
}