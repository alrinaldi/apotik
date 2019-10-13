<?php
session_start();
class C_admin extends CI_Controller{

	public function __construct(){
	parent::__construct();
	if($this->session->userdata('username')==""){
		redirect('login');

	};

}
public function index(){
	$data['username'] = $this->session->userdata('username');
	   
	$this->load->view('admin/v_home',$data);

}
function logout(){
	 $this->session->unset_userdata('username');
	  		$this->session->unset_userdata('level');
            //$this->session->session_destroy();
            session_destroy();
            redirect('login');
            
        }

}