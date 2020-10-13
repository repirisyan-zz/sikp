<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('M_mhs');
	}

	function index()
	{
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
            $x['title'] = "Profile";
			$username = $this->session->userdata('username');
			$this->session->set_userdata('menu','menu_profile');
			$profile['profile'] = $this->M_mhs->profile($username);
			$this->load->view('mahasiswa/header',$x);
			$this->load->view('mahasiswa/profile',$profile);
			$this->load->view('mahasiswa/footer');
		}
	}

	function ubah_password(){
		$this->form_validation->set_rules('sandi_baru', 'Sandi_baru', 'required');
        $this->form_validation->set_rules('confirm_sandi', 'Confirm_sandi', 'required');
                
            if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('sandi', 'null');
                redirect('Mahasiswa/Profile');
            } else {
                $username = $this->session->userdata('username');
                $sandi_baru = $this->input->post('sandi_baru');
                $confirm = $this->input->post('confirm_sandi');
                if ($sandi_baru != $confirm) {
                    $this->session->set_flashdata('sandi', 'false');
                    redirect('Mahasiswa/Profile', 'refresh');
                } else {
                    $this->M_mhs->ubah_password(md5($sandi_baru), $username);
					$this->session->set_flashdata('sandi', 'true');
                    redirect('Mahasiswa/Profile', 'refresh');
                }
            }
	}
	
	function upload_foto(){
		$config['upload_path']          = './assets/img/foto/profile/';
		$config['allowed_types']        = 'jpg|jpeg';
		$config['max_size']             = 2000;
	
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('foto_profile'))
		{
			$this->session->set_flashdata('upload_foto','false');
			redirect('Mahasiswa/Profile','refresh');  
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());
				$npm = $this->session->userdata('username');
				$filename = $data["upload_data"]["file_name"];
				$row = $this->db->where('npm',$npm)->get('mahasiswa')->row();
				if ($row->sampul != "default_profile.jpg"){
					unlink('assets/img/foto/profile/'.$row->foto);
				}
				$this->M_mhs->upload_profile($npm,$filename);
				$this->session->set_flashdata('upload_foto','true');
				redirect('Mahasiswa/Profile','refresh');
					  
		}
	}

	function upload_sampul(){
		$config['upload_path']          = './assets/img/foto/sampul/';
		$config['allowed_types']        = 'jpg|jpeg';
		$config['max_size']             = 2000;
	
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('foto_sampul'))
		{
			$this->session->set_flashdata('upload_sampul','false');
			redirect('Mahasiswa/Profile','refresh'); 
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());
				$npm = $this->session->userdata('username');
				$filename = $data["upload_data"]["file_name"];
				$row = $this->db->where('npm',$npm)->get('mahasiswa')->row();
				if ($row->sampul != "default_sampul.jpg"){
					unlink('assets/img/foto/sampul/'.$row->sampul);
				}
				$this->M_mhs->upload_sampul($npm,$filename);
				$this->session->set_flashdata('upload_sampul','true');
				redirect('Mahasiswa/Profile','refresh');
		}
	}
}