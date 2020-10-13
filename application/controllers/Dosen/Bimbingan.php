<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_mhs');
	}

	function index(){
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
            $nip = $this->session->userdata('username');
            $x['title'] = "Pilih Mahasiswa Bimbingan"; 
            $data_mhs['data_mhs'] = $this->M_mhs->lihat_dosen($nip);
			$this->session->set_userdata('menu','menu_bimbingan');
			$this->load->view('dosen/header',$x);
			$this->load->view('dosen/pilih_mhs',$data_mhs);
			$this->load->view('dosen/footer');
		}
    }

    function selesai(){
        $this->form_validation->set_rules('npm', 'npm', 'required');        
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('bimbingan_dosen','false');
                redirect('Dosen/Bimbingan');
            }else{
                $npm = $this->input->post('npm');
                $this->M_mhs->sidang($npm);
                redirect('Dosen/Bimbingan');
            }
    }

    function bimbingan_mhs(){
            $this->session->set_userdata('status_bimbingan','0');
            $x['title'] = "Bimbingan Mahasiswa"; 
            $npm = $this->input->post('npm');
            $nama = $this->input->post('nama');
            $this->session->set_userdata('set_npm',$npm);
            $this->session->set_userdata('set_nama',$nama);
            $this->load->model('M_bimbingan');
            $data_bimbingan['data_bimbingan'] = $this->M_bimbingan->lihat_bimbingan_mhs($npm);
            $this->session->set_userdata('menu','menu_bimbingan');
            $this->load->view('dosen/header',$x);
            $this->load->view('dosen/bimbingan',$data_bimbingan);
            $this->load->view('dosen/footer');
    }

    function tambah_bimbingan(){
        $this->load->model('M_bimbingan');
        $config['upload_path']          = './file/laporan/';
        $config['allowed_types']        = 'docx|pdf';
        $config['max_size']             = 50000;
    
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('file'))
        {
            $this->session->set_flashdata('bimbingan_dosen','false');
            redirect('Dosen/Bimbingan');
        }
        else
        {
                $npm = $this->input->post('npm');
                $keterangan = $this->input->post('keterangan');
                $nip = $this->session->userdata('username');
                $data = array('upload_data' => $this->upload->data());
                $pembahasan = $this->input->post('pembahasan');
                $tanggal = $this->input->post('tanggal');
                $filename = $data["upload_data"]["file_name"];
                $data = array(
                    'npm' => $npm,
                    'nip' => $nip,
                    'pembahasan' => $pembahasan,
                    'tanggal' => $tanggal,
                    'revisi' => $filename,
                    'keterangan' => $keterangan
                    );
                $this->M_bimbingan->upload($data);
                $this->session->set_flashdata('bimbingan_dosen','true');
                redirect('Dosen/Bimbingan');
        }
    }

    function upload_revisi(){
        $this->load->model('M_bimbingan');
        $config['upload_path']          = './file/revisi/';
        $config['allowed_types']        = 'docx|pdf';
        $config['max_size']             = 50000;
    
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('file'))
        {
            $this->session->set_flashdata('bimbingan_dosen','false');
            redirect('Dosen/Bimbingan');  
        }
        else
        {
                $id = $this->input->post('id');
                $data = array('upload_data' => $this->upload->data());
                $filename = $data["upload_data"]["file_name"];
                $keterangan = $this->input->post('keterangan');
                $this->M_bimbingan->upload_revisi($id,$filename,$keterangan);
                $this->session->set_flashdata('bimbingan_dosen','true');
                redirect('Dosen/Bimbingan');
        }
    }
}