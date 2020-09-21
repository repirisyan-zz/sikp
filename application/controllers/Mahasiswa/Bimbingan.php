<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_bimbingan');
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
            $npm = $this->session->userdata('username');
            $x['title'] = "Bimbingan Kerja Praktek"; 
            $data_bimbingan['data_bimbingan'] = $this->M_bimbingan->lihat_bimbingan_mhs($npm);
			$this->session->set_userdata('menu','menu_bimbingan');
			$this->load->view('mahasiswa/header',$x);
			$this->load->view('mahasiswa/bimbingan',$data_bimbingan);
			$this->load->view('mahasiswa/footer');
		}
    }
    
    function tambah(){
            $config['upload_path']          = './file/laporan/';
            $config['allowed_types']        = 'docx|pdf';
            $config['max_size']             = 0;
        
            $this->upload->initialize($config);
            $pembahasan = $this->input->post('pembahasan');
            if ( ! $this->upload->do_upload('file') || $pembahasan == null)
            {
                $this->session->set_flashdata('kirim_bimbingan','false');
                redirect('Mahasiswa/Bimbingan');
            }
            else
            {
                    $this->load->model('M_mhs');
                    $npm = $this->session->userdata('username');
                    $n = $this->M_mhs->lihat_mhs($npm)->result();
                    $nip ='';
                    foreach($n as $i){$nip = $i->nip;}
                    $data = array('upload_data' => $this->upload->data());
                    $tanggal = date("Y-m-d");
                    $filename = $data["upload_data"]["file_name"];
                    $data = array(
                        'npm' => $npm,
                        'nip' => $nip,
                        'pembahasan' => $pembahasan,
                        'tanggal' => $tanggal,
                        'file' => $filename
                        );
                    $this->M_bimbingan->upload($data);
                    $this->session->set_flashdata('kirim_bimbingan','true');
                    redirect('Mahasiswa/Bimbingan');
            }
    }
}