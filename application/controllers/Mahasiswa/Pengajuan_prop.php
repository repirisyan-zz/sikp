<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_prop extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_prop');
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
            $x['title'] = "Pengajuan Proposal";
            $npm = $this->session->userdata('username');
            $data_prop['data_proposal'] = $this->M_prop->proposal($npm);
            $prop_ada = $this->M_prop->cek_proposal($npm);
            $status ='';
            foreach($prop_ada as $i){$status = $i->status_proposal;}
            if($status == 'Menunggu Persetujuan'){
                $this->session->set_userdata('prop_status','true');
            }else if($status == 'diterima'){
                $this->session->set_userdata('prop_status','true_terima');
            }else{
                $this->session->set_userdata('prop_status','false');
            }
			$this->session->set_userdata('menu','menu_pengajuan_prop');
			$this->load->view('mahasiswa/header',$x);
			$this->load->view('mahasiswa/pengajuan_prop',$data_prop);
			$this->load->view('mahasiswa/footer');
		}
    }
    
    public function upload()
    {
            $config['upload_path']          = './file/proposal';
            $config['allowed_types']        = 'docx|pdf';
            $config['max_size']             = 40000;
        
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('proposal'))
            {
                    $this->session->set_flashdata('pengajuan_prop','false');
                    redirect('Mahasiswa/Pengajuan_prop','refresh');    
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    $npm = $this->session->userdata('username');
                    $judul = $this->input->post('judul');
                    $tanggal = date("Y-m-d");
                    $filename = $data["upload_data"]["file_name"];
                    $status = 'Menunggu Persetujuan';
                    $data = array(
                        'npm' => $npm,
                        'judul' => $judul,
                        'tanggal_proposal' => $tanggal,
                        'file' => $filename,
                        'status_proposal' => $status
                        );
                    $cek = $this->M_prop->upload($data);
                
                    if($cek == TRUE){
                        $this->load->model('M_mhs');
                        $kemajuan = "Pengajuan Proposal";
                        $this->M_mhs->ubah_kemajuan($npm,$kemajuan);
                        $this->session->set_flashdata('pengajuan_prop','true');
                        redirect('Mahasiswa/Pengajuan_prop','refresh');
                    }
            }
    }
}