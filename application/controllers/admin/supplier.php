<?php
 class Supplier extends CI_Controller{
	function __construct(){
		parent::__construct();
			if($this->session->userdata('username') ==""){
           redirect('login');
        };
	
		$this->load->model('m_obat');
		//$this->load->model('m_user');
		$this->load->model('m_supplier');
	}
	function supplier(){
		
		$x['level'] = $this->session->userdata('level');
			$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$x['username'] = $this->session->userdata('username');
		$x['nama'] = $this->session->userdata('nama');
		$x['sup']= $this->m_supplier->get_all_supplier();

		$this->load->view('admin/v_supplier',$x);	
	}
		


	function simpan_supplier(){
	
	                        $nama =$this->input->post('nama');
	                        $alamat = $this->input->post('alamat');
	                        $tlpn = $this->input->post('tlpn');
					
						//$username=$this->session->userdata('username');
							//$user=$this->m_user->get_user_login($username);
							//$p=$user->row_array();
							//$user_id=$p['username'];
							//$user_nama=$p['pengguna_nama'];
						//$tgl_buat =date('Y-m-d');
						$this->m_supplier->simpan_supplier($nama,$alamat,$tlpn);
		echo $this->session->set_flashdata('msg','success');
						redirect('admin/supplier/supplier');

	            		
	            	
	}

	function delete_supplier(){
	$kode=strip_tags($this->input->post('kode'));
		$this->m_supplier->hapus_supplier($kode);
		echo $this->session->set_flashdata('msg','success-hapus');	
		redirect('admin/supplier/supplier');
	}
function ubah_supplier(){
				$kode=strip_tags($this->input->post('kode'));
		        $nama =$this->input->post('nama');
	                        $alamat = $this->input->post('alamat');
	                        $tlpn = $this->input->post('tlpn');
							$this->m_supplier->update_supplier($kode,$nama,$alamat,$tlpn);
							echo $this->session->set_flashdata('msg','success');	
		redirect('admin/supplier/supplier');
}


}
