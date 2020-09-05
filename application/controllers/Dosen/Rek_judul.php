<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rek_judul extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_rekjudul');
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
            $x['title'] = "Rekomendasi Judul";
            $nip = $this->session->userdata('username');
            $this->session->set_userdata('menu', 'menu_rek_judul');
            $rek_judul['rek_judul'] = $this->M_rekjudul->rekjudul($nip);
            $this->load->view('dosen/header', $x);
            $this->load->view('dosen/rek_judul', $rek_judul);
            $this->load->view('dosen/footer');
        }
	}
	
	function tambah_judul(){
		$this->form_validation->set_rules('judul', 'judul', 'required');           
        if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('rek_judul','tambah_gagal');
				redirect(base_url('Dosen/Rek_judul'));
            }else{
				$nip = $this->session->userdata('username');
				$this->db->where('nip',$nip);
				$cek = $this->db->get('dosen');
				if($cek->batas_judul < 1){
					$this->session->set_flashdata('rek_judul','tambah_gagal_penuh');
					redirect(base_url('Dosen/Rek_judul'));
				}else{
					$judul = $this->input->post('judul');
					$keterangan = $this->input->post('keterangan');
					$status_judul = '1';
					$data = array(
						'nip' => $nip,
						'judul' => $judul,
						'status_judul' => $status_judul,
						'keterangan' => $keterangan
					);
					$this->M_rekjudul->tambah_judul($data);
					$this->M_rekjudul->batas_judul($nip);
					$this->session->set_flashdata('rek_judul','tambah');
					redirect(base_url('Dosen/Rek_judul'));
				}	
			}	
	}
	
	function ubah_judul(){
		$this->form_validation->set_rules('judul', 'judul', 'required'); 
		$this->form_validation->set_rules('id', 'id', 'required');           
        if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('rek_judul','ubah_gagal');
				redirect(base_url('Dosen/Rek_judul'));
            }else{
				$id = $this->input->post('id');
				$judul = $this->input->post('judul');
				$keterangan = $this->input->post('keterangan');
				$this->M_rekjudul->ubah_judul($id,$judul,$keterangan);
				$this->session->set_flashdata('rek_judul','ubah');
				redirect(base_url('Dosen/Rek_judul'));
			}
	}

	function hapus_judul(){
		$this->form_validation->set_rules('id', 'id', 'required');           
        if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('rek_judul','hapus_gagal');
			redirect(base_url('Dosen/Rek_judul'));
            }else{
				$id = $this->input->post('id');
				$this->M_rekjudul->hapus_judul($id);
				$nip = $this->session->userdata('username');
				$this->M_rekjudul->batas_judul_tambah($nip);
				$this->session->set_flashdata('rek_judul','hapus');
				redirect(base_url('Dosen/Rek_judul'));
			}	
	}
}
?>