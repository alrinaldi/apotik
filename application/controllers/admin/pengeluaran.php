<?php
 class Pengeluaran extends CI_Controller{
	function __construct(){
		parent::__construct();
			if($this->session->userdata('username') ==""){
           redirect('login');
        };
	
		$this->load->model('m_obat');
		//$this->load->model('m_user');
		$this->load->model('m_pengeluran');
	}
	function pengeluaran(){
		
		$x['level'] = $this->session->userdata('level');
			$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$x['username'] = $this->session->userdata('username');
		$x['nama'] = $this->session->userdata('nama');
		$x['pl']= $this->m_pengeluran->get_all_pengeluaran();

		$this->load->view('admin/v_pengeluaran',$x);	
	}
		


	function simpan_pengeluaran(){
	
	                        $ket =$this->input->post('ket');
	                        $jml = $this->input->post('jml');
	                        $tgl = $this->input->post('tgl');
					
						//$username=$this->session->userdata('username');
							//$user=$this->m_user->get_user_login($username);
							//$p=$user->row_array();
							//$user_id=$p['username'];
							//$user_nama=$p['pengguna_nama'];
						//$tgl_buat =date('Y-m-d');
						$this->m_pengeluran->set_pengeluaran($ket,$jml,$tgl);
		echo $this->session->set_flashdata('msg','success');
						redirect('admin/pengeluaran/pengeluaran');

	            		
	            	
	}

	function delete_pengeluaran(){
	$kode=strip_tags($this->input->post('kode'));
		$this->m_pengeluran->hapus_pengeluaran($kode);
		echo $this->session->set_flashdata('msg','success-hapus');	
		redirect('admin/supplier/supplier');
	}
	function edit_pengeluaran(){
			$kode=strip_tags($this->input->post('kode'));
			$ket =$this->input->post('ket');
	                        $jml = $this->input->post('jml');
	                        $tgl = $this->input->post('tgl');
		$this->m_pengeluran->edit_pengeluaran($kode,$ket,$jml,$tgl);
		echo $this->session->set_flashdata('msg','success');	
		redirect('admin/pengeluaran/pengeluaran');
	}



}
