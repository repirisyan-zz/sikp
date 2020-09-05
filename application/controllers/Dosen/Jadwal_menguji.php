<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_menguji extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dos');
        $this->load->model('M_mhs');
    }

    public function index()
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
        } else {
            $x['title'] = "Jadwal Menguji Dosen";
            $nip = $this->session->userdata('username');
            $var1 = $this->M_dos->profile($nip)->result_array();
            foreach($var1 as $i => $value){
            $data_menguji['data_menguji'] = $this->M_mhs->data_menguji($value['nama_dosen']);
            ;}
            $this->session->set_userdata('menu', 'menu_jadwal_menguji');
            $this->load->view('dosen/header', $x);
            $this->load->view('dosen/data_menguji', $data_menguji);
            $this->load->view('dosen/footer');
        }
	}
	
}
?>