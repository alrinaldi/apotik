<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

   
    function index(){
        $this->load->view('v_login');
    }
    function auth(){
    	$data= array('username'=>$this->input->post('username'),
        'password'=>$this->input->post('password')
        );
        //$u=$username;
        //$p=$password;
    // echo '$username';
        $this->load->model('m_login');
        $hasil = $this->m_login->cekadmin($data);

        //$cadmin=$this->m_login->cekadmin($u,$p);
        if($hasil->num_rows() > 0){
        	foreach($hasil->result() as $sess){
        		$ses_data['logged_in'] = 'Sudah login';
        		$ses_data['username']= $sess->username;
        		$ses_data['nama'] = $sess->nama;
                $ses_data['level'] = $sess->level;
        		$this->session->set_userdata($ses_data);
               

        }	
        echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Anda berhasil login.</div>');
         redirect('admin/home');
    }
        	
         else {

         	echo "<script>alert('Gagal Login:');history.go(-1);</script>";
            echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Username atau password salah.</div>');
         }
     
        
        }
    }
        