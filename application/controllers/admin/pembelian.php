<?php
 class Pembelian extends CI_Controller{
	function __construct(){
		parent::__construct();
			if($this->session->userdata('username') ==""){
           redirect('login');
        };

       // $this->load->library('datatables');
	
		$this->load->model('m_obat');
		$this->load->model('m_user');
		$this->load->model('m_supplier');
		$this->load->model('m_penjualan');
		$this->load->model('m_pembelian');
		$this->load->model('m_chart');
	}
	function obat(){
		$username = $this->session->userdata('username');
		$x['obat']= $this->m_obat->get_all_obat();

		$this->load->view('admin/v_obat',$x);	
	}

		function penjualan(){
		$username = $this->session->userdata('username');
		$x['obat']= $this->m_obat->get_all_penjualan();

		$this->load->view('admin/v_penjualan',$x);	
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
	            	$this->session->set_flashdata('msg','success');
//$this->m_pembelian->set_pembelian($tgl,$total,$qty,$id_obat);
$this->load->view('admin/v_obat',$x);
	            	
	}

	function delete_obat(){
		$kode=strip_tags($this->input->post('kode'));
		$this->m_obat->hapus_obat($kode);
		echo $this->session->set_flashdata('msg','success-hapus');	
		//echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/obat/obat',$x);
	}

	function update_obat(){
		$kode = $this->uri->segment(4);
		//$x['hal']=$this->m_halaman->get_all_halaman();
		$x['evt'] =$this->m_event->get_event_by_id($kode);
		$this->load->view('admin/v_edit_event',$x);		

	}

		function lap_pembelian(){

		$x['level'] = $this->session->userdata('level');
				$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$year = date('Y');
				$x['data2']=$this->m_chart->chart_pendapatan($year);
		$x['data3']=$this->m_chart->chart_pengeluaran($year);
		$x['nama'] = $this->session->userdata('nama');
		$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$x['pb'] =$this->m_pembelian->get_pembelian();
		$this->load->view('admin/v_pembelian',$x);
	}

	function pembelian_filter(){

		$x['level'] = $this->session->userdata('level');
					$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$year = date('Y');
				$x['data2']=$this->m_chart->chart_pendapatan($year);
		$x['data3']=$this->m_chart->chart_pengeluaran($year);
		$x['nama'] = $this->session->userdata('nama');
		$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
$filter = $this->input->post('filter');
$tgl = $this->input->post('tanggal');
$date = date('Y-m-d');
if(!empty($tgl)){
		$x['pjf'] =$this->m_pembelian->get_pembelian_filter($tgl);
		$x['tgl'] = $tgl;

		$this->load->view('admin/v_lap_pembelian_filter',$x);
	}
	else if(!empty($filter)){
		$x['pjf'] =$this->m_pembelian->get_pembelian_periode($filter,$date);
		$x['filter'] = $filter;
		$x['date'] = $date;
		$this->load->view('admin/v_lap_pembelian_filter',$x);	
	}else{
		redirect('admin/Pembelian/v_pembelian');
	}
}




}
