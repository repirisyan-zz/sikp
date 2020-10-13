<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('M_koor');
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
		}else{
            $x['title'] = "Profil";
			$username = $this->session->userdata('username');
			$this->session->set_userdata('menu','menu_profile');
			$profile['profile'] = $this->M_koor->profile($username);
			$this->load->view('koordinator/header',$x);
			$this->load->view('koordinator/profile',$profile);
			$this->load->view('koordinator/footer');
		}
	}

	function ubah_password(){
		$this->form_validation->set_rules('sandi_baru', 'sandi_baru', 'required');  
		$this->form_validation->set_rules('confirm_sandi', 'confirm_sandi', 'required');            
        if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('ubah_sandi', 'null');
                redirect('Koordinator/Profile');
            }else{
				$username = $this->session->userdata('username');
				$sandi_baru = $this->input->post('sandi_baru');
				$confirm = $this->input->post('confirm_sandi');
				
				if ($sandi_baru != $confirm) {
					$this->session->set_flashdata('sandi', 'false');
					redirect('Koordinator/Profile', 'refresh');
				} else {
					$this->M_koor->ubah_password(md5($sandi_baru), $username);
					$this->session->set_flashdata('sandi', 'true');
					redirect('Koordinator/Profile', 'refresh');
				}
			}
	}
	
	function upload_foto(){
		$config['upload_path']          = './file/foto/profile/';
		$config['allowed_types']        = 'jpg|jpeg';
		$config['max_size']             = 2000;
	
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('foto_profile'))
		{
			$this->session->set_flashdata('upload_foto','false');
			redirect('Koordinator/Profile','refresh');    
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());
				$username = $this->session->userdata('username');
				$row = $this->db->where('username',$username)->get('koordinator')->row();
				if ($row->foto != "default_profile.jpg"){
					unlink('file/foto/profile/'.$row->foto);
				}
				$filename = $data["upload_data"]["file_name"];
				$this->M_koor->upload_profile($username,$filename);
				$this->session->set_flashdata('upload_foto','true');
				redirect('Koordinator/Profile','refresh');
		}
	}

	function upload_sampul(){
		$config['upload_path']          = './file/foto/sampul/';
		$config['allowed_types']        = 'jpg|jpeg';
		$config['max_size']             = 2000;
	
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('foto_sampul'))
		{
			$this->session->set_flashdata('upload_sampul','false');
			redirect('Koordinator/Profile','refresh'); 
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());
				$username = $this->session->userdata('username');
				$row = $this->db->where('username',$username)->get('koordinator')->row();
				if ($row->sampul != "default_sampul.jpg"){
					unlink('file/foto/sampul/'.$row->sampul);
				}
				$filename = $data["upload_data"]["file_name"];
				$this->M_koor->upload_sampul($username,$filename);
				$this->session->set_flashdata('upload_sampul','true');
				redirect('Koordinator/Profile','refresh');
		}
	}
}