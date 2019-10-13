<?php

class nav extends CI_Controller{
	function __construct(){
		parent::__construct();
		// $this->load->helper('back'); // helper yg di atas
   
 // backButtonHandle(); 
			if($this->session->userdata('username') ==""){
           redirect('login');
        };
         // ni fungsinya yg d panggil
        $this->load->model('m_obat');
	}
	function nav(){
		$data['username'] = $this->session->userdata('username');
		//$username = $this->session->userdata('username');
		//$data['nama_user']
		$data['nama_user'] = $this->session->userdata('nama');
		$data['level'] = $this->session->userdata('level');
		$data['cp']=$this->m_obat->ntf_capsul();
		$data['bt']=$this->m_obat->ntf_botol();
		$data['tb']=$this->m_obat->ntf_tablet();
		$this->load->view('admin/v_nav',$data);
	}
	
}