<?php

class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		// $this->load->helper('back'); // helper yg di atas
   
 // backButtonHandle(); 
			if($this->session->userdata('username') ==""){
           redirect('login');
        };
         // ni fungsinya yg d panggil
        $this->load->model('m_obat');
         $this->load->model('m_chart');
         $this->load->model('m_fsn');
         $this->load->model('m_movingavg');
	}
	function index(){
		$date = date('Y-m-01');
		$data['username'] = $this->session->userdata('username');

		$data['level'] = $this->session->userdata('level');
		//$username = $this->session->userdata('username');
		//$data['nama_user']
		//$data['nama_user'] = $this->session->userdata('nama');
		$data['cp']=$this->m_obat->ntf_capsul();
		$data['bt']=$this->m_obat->ntf_botol();
		$data['tb']=$this->m_obat->ntf_tablet();
		$bulan = date('m');
		$year = date('Y');
		$data['pjn'] = $this->m_chart->chart_penjualan_terbanyak($bulan,$year);
		$data['pjnthn'] = $this->m_chart->chart_penjualan_terbanyak_thn($year);
		$data['fsn_bebas'] = $this->m_fsn->fsn_bebas();
			$data['fsn_bebas1'] = $this->m_fsn->fsn_bebas1();
		$data['fsn_keras'] = $this->m_fsn->fsn_keras();
		$data['sedang'] = $this->m_fsn->fsn_bebas_terbatas();
		$data['pendapatan'] = $this->m_chart->chart_pendapatanPjn();
		$data['sma']=$this->m_movingavg->get_sma($date);
		

		$this->load->view('admin/v_dashboard',$data);
	}
	function logout(){
	 $this->session->unset_userdata('username');
	  		$this->session->unset_userdata('level');
            //$this->session->session_destroy();
            session_destroy();
            redirect('login');
            
        }

}