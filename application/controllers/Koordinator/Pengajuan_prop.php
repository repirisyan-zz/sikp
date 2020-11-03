<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_prop extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_prop');
	}

	function index(){
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
			$x['title'] = "Pengajuan Proposal Koordinator";
			$this->load->model('M_prop');
			$data_proposal['data_proposal'] = $this->M_prop->proposal_koor();
			$data_proposal['riwayat_proposal'] = $this->M_prop->riwayat_proposal();
			$data_proposal['riwayat_revisi'] = $this->M_prop->riwayat_revisi();
			$this->session->set_userdata('menu','menu_pengajuan_prop');
			$this->load->view('koordinator/header',$x);
			$this->load->view('koordinator/pengajuan_prop',$data_proposal);
			$this->load->view('koordinator/footer');
		}
	}

	public function terima_prop() {
			$this->form_validation->set_rules('npm', 'npm', 'required');            
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('notif_prop','false_diterima');
				redirect('Koordinator/Pengajuan_prop');
            }else{
				$npm = $this->input->post('npm');
				$status = 'diterima';
				$this->load->model('M_prop');
				$cek = $this->M_prop->terima_prop($status,$npm);
				if($cek == TRUE){
					$this->load->model('M_rekjudul');
					$npm_mhs = '';
					$stat = $this->M_rekjudul->cek_judul($npm)->result();
					foreach($stat as $i){$npm_mhs = $i->npm;}
					if($npm_mhs == $npm){
						$this->load->model('M_mhs');
						$this->M_mhs->tambah_dosen($i->nip,$npm);
					}
					$this->session->set_flashdata('notif_prop','true_diterima');
					redirect('Koordinator/Pengajuan_prop');
				}
			}
	}
	
	function tolak_prop() {
		$config['upload_path']          = './file/revisi_proposal';
		$config['allowed_types']        = 'docx|pdf';
		$config['max_size']             = 40000;
	
		$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('file')){
				$this->session->set_flashdata('notif_prop','false_ditolak');
				redirect('Koordinator/Pengajuan_prop');
				}
				else{
				$data = array('upload_data' => $this->upload->data());
				$status = 'ditolak';
				$npm = $this->input->post('npm');
				$rekomendasi = $this->input->post('rekomendasi');
				$this->load->model('M_prop');
				$keterangan = $this->input->post('keterangan');
				$filename = $data["upload_data"]["file_name"];
				$this->M_prop->tolak_prop($status,$npm,$filename,$keterangan);
				$this->load->model('M_mhs');
				$kemajuan = "Mulai Kerja Praktek";
				$this->M_mhs->ubah_kemajuan($npm,$kemajuan);
				if($rekomendasi == 1){
					$this->db->where('npm',$npm);
					$this->db->set('rekomendasi_dosen',null);
					$this->db->update('mahasiswa');

					$this->db->select('nip');
					$this->db->where('npm',$npm);
					$data_judul = $this->db->get('rek_judul')->result();
					foreach($data_judul as $i){$a = $i->nip;}

					$this->db->where('nip',$a);
					$this->db->set('batas_mhs','batas_mhs+1',false);
					$this->db->set('batas_judul','batas_judul+1',false);
					$this->db->update('dosen');

					$this->db->where('npm',$npm);
					$this->db->delete('rek_judul');
				}
				$this->session->set_flashdata('notif_prop','true_ditolak');
				redirect('Koordinator/Pengajuan_prop');
				
			}
    	}
}