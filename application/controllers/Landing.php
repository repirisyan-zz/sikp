<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

        function index(){
        $this->session->set_userdata('menu_guest', 'landing');
        $x['title'] = 'Landing Page';
        $this->load->view('header', $x);
        $this->load->view('landing_header');
        $this->load->view('landing');
        $this->load->view('footer');
    }
        
}