<?php
 class User extends CI_Controller{
	function __construct(){
		parent::__construct();
			if($this->session->userdata('username') ==""){
           redirect('login');
        };
	
		$this->load->model('m_obat');
		$this->load->model('m_user');
		//$this->load->model('m_supplier');
	}
	function user(){
				if($this->session->userdata('level') !="pemilik"){
					echo "<script>alert('anda bukan pemilik:');history.go(-1);</script>";
           //redirect('admin/home');
       }else{
		$x['level'] = $this->session->userdata('level');
			$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$x['username'] = $this->session->userdata('username');
		$x['nama'] = $this->session->userdata('nama');
		$x['user']= $this->m_user->get_user();

		$this->load->view('admin/v_user',$x);
		}	
	}
		


	function simpan_user(){
	
	                        $nama =$this->input->post('nama');
	                        $alamat = $this->input->post('alamat');
	                        $tlpn = $this->input->post('tlpn');
							$username = $this->input->post('username');
							$password = $this->input->post('password');
							$level = $this->input->post('level');			
						//$username=$this->session->userdata('username');
							//$user=$this->m_user->get_user_login($username);
							//$p=$user->row_array();
							//$user_id=$p['username'];
							//$user_nama=$p['pengguna_nama'];
						//$tgl_buat =date('Y-m-d');
							$cek = $this->db->query("SELECT username FROM user where username = '$username'");
							$hasil = $cek->num_rows();
							if($hasil==0){
						$this->m_user->tambah_user($nama,$username,$password,$tlpn,$alamat,$level);
		echo $this->session->set_flashdata('msg','success');
						redirect('admin/user/user');
					}else{
							echo $this->session->set_flashdata('msg','error');
						redirect('admin/user/user');
					}

	            		
	            	
	}

	function delete_user(){
	$kode=strip_tags($this->input->post('kode'));
		$this->m_user->hapus_user($id);
		echo $this->session->set_flashdata('msg','success-hapus');	
		redirect('admin/user/user');
	}

	function edit_user(){
			$kode=strip_tags($this->input->post('kode'));
		 $nama =$this->input->post('nama');
	                        $alamat = $this->input->post('alamat');
	                        $tlpn = $this->input->post('tlpn');
							$username = $this->input->post('username');
							$password = $this->input->post('password');
							$level = $this->input->post('level');
							$this->m_user->edit_user($username,$nama,$password,$tlpn,$alamat,$level);
							echo $this->session->set_flashdata('msg','success');	
		redirect('admin/user/user');
	}



}
