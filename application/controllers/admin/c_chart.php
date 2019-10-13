<?php
class c_chart extends CI_Controller{
	function __construct(){
		parent::__construct();
			if($this->session->userdata('username') ==""){
           redirect('login');
       };
			$this->load->model('m_chart');
			$this->load->model('m_penjualan');
			$this->load->model('m_obat');
		}

		function grafik(){
				$x['nama']=$this->session->userdata('nama');
		$x['level'] = $this->session->userdata('level');
			$x['data']=$this->m_chart->chart();
			$this->load->view('admin/v_grafik',$x);
		
	}


		function laporan_pendapatan(){
			$year = date('Y');	
		$data['level'] = $this->session->userdata('level');
			$x['level'] = $this->session->userdata('level');
		$x['nama']=$this->session->userdata('nama');
		//$username =$this->session->userdata('username');
		$x['pjn'] =$this->m_penjualan->hasil_penjualan();
		$x['data2']=$this->m_chart->chart_pendapatan($year);
		$x['data3']=$this->m_chart->chart_pengeluaran($year);
		$x['username'] = $this->session->userdata('username');
		$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$this->load->view('admin/v_laporan_penjualan',$x);
	}

	function grafik_laba(){
			$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$x['level'] = $this->session->userdata('level');
		$x['nama']=$this->session->userdata('nama');
		$x['data2']=$this->m_chart->chart_pendapatanPjn();
		$x['data3']=$this->m_chart->chart_hasil_laba();
		$this->load->view('admin/grafik_pendaptan',$x);
	}

	function grafik_penjualan(){
		$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$x['level'] = $this->session->userdata('level');
		$x['nama']=$this->session->userdata('nama');
		$x['data2']=$this->m_chart->chart_pendapatanPjn();
		//$x['data3']=$this->m_chart->chart_hasil_laba();
		$this->load->view('admin/v_grafik_penjualan',$x);
	}
	function grafik_pembelian(){
		$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$x['level'] = $this->session->userdata('level');
		$x['nama']=$this->session->userdata('nama');
		$x['data2']=$this->m_chart->chart_hasil_laba();
		//$x['data3']=$this->m_chart->chart_hasil_laba();
		$this->load->view('admin/v_grafik_pembelian',$x);
	}
function grafik_pendapatan(){
		$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$x['level'] = $this->session->userdata('level');
		$x['nama']=$this->session->userdata('nama');
		//$x['data2']=$this->m_chart->chart_hasil_laba();
		//$x['data3']=$this->m_chart->chart_hasil_laba();
		$this->load->view('admin/g_pendapatan',$x);
	}
}

?>