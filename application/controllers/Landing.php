<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function index()
	{
        $x['title'] = 'Landing Page';
        $this->load->view('header',$x);
        $this->load->view('landing');
        $this->load->view('footer');
	}
}
