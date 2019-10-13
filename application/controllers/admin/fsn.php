<?php
class Fsn extends CI_Controller{
	function __construct(){
		parent::__construct();
			if($this->session->userdata('username') ==""){
           redirect('login');
       };
			$this->load->model('m_fsn');
			$this->load->model('m_obat');

		}

		function fsn(){	
			$x['level'] = $this->session->userdata('level');
			$x['nama'] = $this->session->userdata('nama');
				$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
			 $td = date('Y-m-d');
        $lw = date('Y-m-d', strtotime("-1 week"));
			$x['data']=$this->m_fsn->pembelian();
			$x['data1']=$this->m_fsn->penjualan();
			$x['data2']=$this->m_fsn->obat();
	$x['data3']=$this->m_fsn->getPembelian($td,$lw);
	$x['data4']=$this->m_fsn->getPenjualan($td,$lw);
	$x['data5']=$this->m_fsn->getProduk($td,$lw);
	$x['data6']=$this->m_fsn->getAvgStaylbr();
	$x['data7']=$this->m_fsn->getAvgCrlbr();
	$x['data8']=$this->m_fsn->AvgStaylbr();
	$x['data9']=$this->m_fsn->AvgCrlbr();
			$this->load->view('admin/v_fsn',$x);
		
	}
	function fsn_pcs(){	
			$x['level'] = $this->session->userdata('level');
			$x['nama'] = $this->session->userdata('nama');
				$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
			 $td = date('Y-m-d');
        $lw = date('Y-m-d', strtotime("-1 week"));
			$x['data']=$this->m_fsn->pembelian();
			$x['data1']=$this->m_fsn->penjualan();
			$x['data2']=$this->m_fsn->obat_pcs();
	$x['data3']=$this->m_fsn->getPembelian($td,$lw);
	$x['data4']=$this->m_fsn->getPenjualan($td,$lw);
	$x['data5']=$this->m_fsn->getProduk($td,$lw);
	$x['data6']=$this->m_fsn->getAvgStaypcs();
	$x['data7']=$this->m_fsn->getAvgCrpcs();
	$x['data8']=$this->m_fsn->AvgStaypcs();
	$x['data9']=$this->m_fsn->AvgCrpcs();
			$this->load->view('admin/fsn_pcs',$x);
		
	}


		function fsn1(){
			 $td = date('Y-m-d');
        $lw = date('Y-m-d', strtotime("-1 week"));
			$x['data']=$this->m_fsn->pembelian();
			$x['data1']=$this->m_fsn->penjualan();
			$x['data2']=$this->m_fsn->obat();
	$x['data3']=$this->m_fsn->getPembelian($td,$lw);
	$x['data4']=$this->m_fsn->getPenjualan($td,$lw);
	$x['data5']=$this->m_fsn->getProduk($td,$lw);

			$this->load->view('admin/fsn_Cek3',$x);
		
	}

	function lihat_detail(){
			$x['level'] = $this->session->userdata('level');
			$x['nama'] = $this->session->userdata('nama');
			$gol = $this->input->get('gol');
			 $gol;
			$x['nama'] = $this->session->userdata('nama');
				$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$x['detail'] = $this->m_fsn->fsn_detail($gol);
		$this->load->view('admin/v_fsn_detail',$x);
	}

	function movingavr(){
			     
			$x['level'] = $this->session->userdata('level');
			$x['nama'] = $this->session->userdata('nama');
			$gol = $this->input->get('gol');
			echo $gol;
			$x['nama'] = $this->session->userdata('nama');
				$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$cekobta = $this->m_fsn->jmlh_f();
		$x['jmlh']=$cekobta->num_rows();

		//$cekpenjualan = $this->m_penjualan->get_penjualan_avg($date1,$date2);
		//$x['jmlh'] = $cekobta->num_rows();
		$x['cekobt']= $this->m_fsn->obat_fast();

		$this->load->view('admin/movingavg',$x);
	}
}

?>