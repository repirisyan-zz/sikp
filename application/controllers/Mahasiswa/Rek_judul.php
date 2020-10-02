<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rek_judul extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('M_rekjudul');
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
                $data_judul['data_judul'] = $this->M_rekjudul->rekjudul_mhs_baru();
                $x['title'] = "Rekomendasi Judul";
                $this->session->set_userdata('menu','menu_rek_judul');
                $this->load->view('mahasiswa/header',$x);
                $this->load->view('mahasiswa/rek_judul',$data_judul);
                $this->load->view('mahasiswa/footer');
		}
    }
    
    function pilih_judul(){
        $this->form_validation->set_rules('id', 'id', 'required');  
            if ($this->form_validation->run() == false) {
				$this->session->set_userdata('rekomend_judul','false');
            redirect('Mahasiswa/Rek_judul');
            }else{
                $id = $this->input->post('id');
                $npm = $this->session->userdata('username');
                $status = '0';
                $this->M_rekjudul->pilih_judul($id,$npm,$status);
                $this->db->where('npm',$npm);
                $this->load->model('M_mhs');
                $data = $this->db->get('rek_judul')->result();
                foreach($data as $i){$a = $i->nip;}
                $this->load->model('M_dos');
                $this->M_dos->min_batas_mhs($a);
                $this->M_mhs->rekomendasi_dosen($npm);
                $this->session->set_userdata('rekomend_judul','true');
                redirect('Mahasiswa/Rek_judul/judul_dipilih');
            }
    }


    function judul_dipilih(){
        $npm = $this->session->userdata('username');
        $status = $this->M_rekjudul->cek_judul($npm)->num_rows();
        if($status > 0){
            $this->session->set_userdata('rekomend_judul','true');
			$data_judul['data_judul'] = $this->M_rekjudul->rekjudul_mhs($npm);
            $x['title'] = "Info Judul";
            $this->session->set_userdata('menu','menu_info_judul');
            $this->load->view('mahasiswa/header',$x);
            $this->load->view('mahasiswa/info_judul',$data_judul);
            $this->load->view('mahasiswa/footer');
		}else{
            redirect('Mahasiswa/Rek_judul');
        }
    }
}