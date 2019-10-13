<?php
 class Obat extends CI_Controller{
	function __construct(){
		parent::__construct();
			if($this->session->userdata('username') ==""){
           redirect('login');
        };

	
		$this->load->model('m_obat');
		$this->load->model('m_user');
		$this->load->model('m_supplier');
		$this->load->model('m_penjualan');
		$this->load->model('m_pembelian');
	}
	function obat(){

		$x['level'] = $this->session->userdata('level');
			$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$x['username'] = $this->session->userdata('username');
		$x['nama'] = $this->session->userdata('nama');
		//$x['user'] = $this->db->query("SELECT * FROM user where username = '$username'");
		$x['obat']= $this->m_obat->get_all_obat();
		$x['sup'] = $this->m_supplier->get_all_supplier();
		
		$this->load->view('admin/v_obat',$x);	
	}

		function obat1(){
		$username = $this->session->userdata('username');

		$x['obat']= $this->m_obat->get_all_obat();
		$x['sup'] = $this->m_supplier->get_all_supplier();

		$this->load->view('admin/v_obatv2',$x);	
	}

		function penjualan(){
			$x['level'] = $this->session->userdata('level');
				$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$x['username'] = $this->session->userdata('username');
		$x['nama_user'] = $this->session->userdata('nama');
		$x['user'] = $this->db->query("SELECT * FROM user where username = '$username'");
		$x['obat']= $this->m_obat->get_all_obat();

		$this->load->view('admin/v_penjualan',$x);	
	}

		function pembelian(){
				$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$username = $this->session->userdata('username');
		$x['obat']= $this->m_obat->get_all_obat();

		$this->load->view('admin/v_penjualan',$x);	
	}
		
		

	function add_obat(){
		$x['level'] = $this->session->userdata('level');
		$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
				$username = $this->session->userdata('username');
		$x['user'] = $this->db->query("SELECT * FROM user where username = '$username'");

			$x['username'] = $this->session->userdata('username');
		$x['nama'] = $this->session->userdata('nama');
		$x['sup'] = $this->m_supplier->get_all_supplier();
		$this->load->view('admin/v_tambah_obat',$x);
	}
	function simpan_obat(){
	
	                        $nama =$this->input->post('nama');
	                        $gol = $this->input->post('gol');
	                        $tgl_kadaluarsa = $this->input->post('tanggal');
						$tanggal=$this->input->post('tanggal_beli');
						$type =$this->input->post('type');
					
						$stok = $this->input->post('stok');
						$hrg_b = $this->input->post('hrg_b');
						$hrg_j = $this->input->post('hrg_j');
						$id_s = $this->input->post('id_s');
						//$username=$this->session->userdata('username');
							//$user=$this->m_user->get_user_login($username);
							//$p=$user->row_array();
							//$user_id=$p['username'];
							//$user_nama=$p['pengguna_nama'];
						//$tgl_buat =date('Y-m-d');

						$this->m_obat->simpan_obat($nama,$gol,$type,$tgl_kadaluarsa,$tanggal,$stok,$hrg_b,$hrg_j,$id_s);
		 echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Penambahan data obat: <b>'.$nama.'</b> Berhasil ditambahkan.</div>');
		 $this->session->set_flashdata('msg','success');
						redirect('admin/obat/obat');

	            		
	            	
	}

	function simpan_pembelian(){
			// 					$n = $this->input->post('i');

			// 				for($i=0; $i<=$n-1; $i++) {
			// 					# code...
			// 					 $tgl =date('Y-m-d');
	  //                       $total = $this->input->post('total'+$i);
	  //                       $qty = $this->input->post('jmlh'+$i);
			// 			$id_obat=$this->input->post('id_obat'+$i);
						


			// 			$this->m_penjualan->set_penjualan($tgl,$total,$qty,$id_obat);
			// 				}
		 // $this->session->set_flashdata('msg','Data berhasil di tambahkan');
						//redirect('admin/obat/obat');
		 //$x['obat']= $this->m_obat->get_all_obat();

		// $this->load->view('admin/v_obat',$x);

	            	$id = $this->input->post('kode');
	            	$harga = $this->input->post('harga');
	            	$stok = $this->input->post('stok');
	            	$tgl =date('Y-m-d');
	            	echo $total = $harga * $stok;
$this->m_pembelian->set_pembelian($tgl,$total,$stok,$id);
$this->m_obat->stok_bertambah($id,$stok);
//$this->load->view('admin/v_obat',$x);
redirect('admin/obat/obat');

	            	
	}

	function delete_obat(){
		$kode=strip_tags($this->input->post('kode'));
		$this->m_pembelian->hapus_pembelian_obat($kode);
		$this->m_obat->hapus_obat($kode);

		echo $this->session->set_flashdata('msg','success-hapus');	
		//echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/obat/obat',$x);
	}

	function update_obat(){
		$kode = $this->uri->segment(4);
		//$x['hal']=$this->m_halaman->get_all_halaman();
		//$x['evt'] =$this->m_event->get_event_by_id($kode);
		$this->load->view('admin/v_edit_event',$x);		

	}

		function simpan_penjualan(){
								echo $n = $this->input->post('i');

							for($i=1; $i<=$n; $i++) {
								# code...
								//echo $i;
								 $tgl =date('Y-m-d');
	                        echo $total = $this->input->post('total'.$i);
	                        echo $qty = $this->input->post('jmlh'.$i);
						echo $id_obat=$this->input->post('id_obat'.$i);

						
						$this->m_obat->stok_berkurang($id_obat,$qty);
						$this->m_penjualan->set_penjualan($tgl,$total,$qty,$id_obat);
							}
							//echo $total;
		 	echo $this->session->set_flashdata('msg','info');

					redirect('admin/obat/obat');
		 //$x['obat']= $this->m_obat->get_all_obat();

		// $this->load->view('admin/v_obat',$x);

	            		
	            	
	}

	function edit_obat(){
			
	                        $id= $this->input->post('kode');
	                            $nama =$this->input->post('nama');
	                        $gol = $this->input->post('gol');
	                        //$tgl_kadaluarsa = $this->input->post('tanggal_k');
						$tanggal=$this->input->post('tgl_k');
						$type =$this->input->post('type');
						$tgl_b = $this->input->post('tgl_b');
						$stok = $this->input->post('stok');
							//$user_nama=$p['pengguna_nama'];
						$hargab =$this->input->post('hargab');
						$hargaj=$this->input->post('hargaj');
						$id_supplier = $this->input->post('id_s');
						$tgl_buat =date('Y-m-d');

						$sks = $this->m_obat->update_obat($id,$nama,$gol,$type,$tanggal,$tgl_b,$stok,$hargab,$hargaj,$id_supplier);
		//echo $this->session->set_flashdata('msg','success');
						if($sks>0){
						echo $this->session->set_flashdata('msg','info');
							redirect('admin/obat/obat');
}else{
		echo $this->session->set_flashdata('msg','eror');
							redirect('admin/obat/obat');
}

	}


function export_excel(){
	$username = $this->session->userdata('username');
		$x['obat']= $this->m_obat->get_all_obat();

		$this->load->view('admin/v_obat_excel',$x);	

}

}

