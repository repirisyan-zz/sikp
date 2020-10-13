<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('M_dos');
	}

	function index()
	{
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
            $x['title'] = "Profil";
			$username = $this->session->userdata('username');
			$this->session->set_userdata('menu','menu_profile');
			$profile['profile'] = $this->M_dos->profile($username);
			$this->load->view('dosen/header',$x);
			$this->load->view('dosen/profile',$profile);
			$this->load->view('dosen/footer');
		}
	}

	function ubah_password(){
		$this->form_validation->set_rules('sandi_baru', 'sandi_baru', 'required');  
		$this->form_validation->set_rules('confirm_sandi', 'confirm_sandi', 'required');            
        if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('ubah_sandi', 'null');
                redirect('Dosen/Profile');
            }else{
				$username = $this->session->userdata('username');
				$sandi_baru = $this->input->post('sandi_baru');
				$confirm = $this->input->post('confirm_sandi');
				if ($sandi_baru != $confirm) {
					$this->session->set_flashdata('sandi', 'false');
					redirect('Dosen/Profile', 'refresh');
				} else {
					$this->M_dos->ubah_password(md5($sandi_baru), $username);
					$this->session->set_flashdata('sandi', 'true');
					redirect('Dosen/Profile', 'refresh');
				}
			}
	}
	
	function upload_foto(){
		$config['upload_path']          = './file/foto/profile/';
		$config['allowed_types']        = 'jpg|jpeg';
		$config['max_size']             = 1000;
	
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('foto_profile'))
		{
			$this->session->set_flashdata('upload_foto','false');
			redirect('Dosen/Profile','refresh');  
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());
				$nip = $this->session->userdata('username');
				$filename = $data["upload_data"]["file_name"];
				$row = $this->db->where('nip',$nip)->get('dosen')->row();
				if ($row->foto != "default_profile.jpg"){
					unlink('file/foto/profile/'.$row->foto);
				}
				$this->M_dos->upload_profile($nip,$filename);
				$this->session->set_flashdata('upload_foto','true');
				redirect('Dosen/Profile','refresh');
		}
	}

	function upload_sampul(){
		$config['upload_path']          = './file/foto/sampul/';
		$config['allowed_types']        = 'jpg|jpeg';
		$config['max_size']             = 1000;
	
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('foto_sampul'))
		{
			$this->session->set_flashdata('upload_sampul','false');
			redirect('Dosen/Profile','refresh'); 
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());
				$nip = $this->session->userdata('username');
				$filename = $data["upload_data"]["file_name"];
				$row = $this->db->where('nip',$nip)->get('dosen')->row();
				if ($row->foto != "default_sampul.jpg"){
					unlink('file/foto/sampul/'.$row->foto);
				}
				$this->M_dos->upload_sampul($nip,$filename);
				$this->session->set_flashdata('upload_sampul','true');
					redirect('Dosen/Profile','refresh');
		}
	}
}