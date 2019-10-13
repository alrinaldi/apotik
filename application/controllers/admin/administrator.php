<?php
class Administrator extends CI_Controller{
	function __construct(){
		parent::__construct();
			if($this->session->userdata('username') ==""){
           redirect('login');
        };
	
		$this->load->model('m_admin');
		
	}
	function daftar_admin(){
		$username = $this->session->userdata('username');
		$x['admin']= $this->m_admin->get_all_administrator();
		$this->load->view('admin/v_dftr_admin.php',$x);
	}

	function tambah_admin(){
		$username = $this->session->userdata('username');
		$this->load->view('admin/v_tmbh_admin.php');
	}
}