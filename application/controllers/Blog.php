<?php 
Class Blog extends CI_Controller{
	public function index(){
		echo"HI HI HI";
	}
	public function halo(){
		echo"ini Halo";
	}
	public function tampil_view(){
		$this->load->view('view_blog');
	}
}