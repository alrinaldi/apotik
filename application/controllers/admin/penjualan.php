<?php
 class Penjualan extends CI_Controller{
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
		$this->load->model('m_chart');
	}


		function penjualan(){

		$x['level'] = $this->session->userdata('level');
					$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$x['username'] = $this->session->userdata('username');
		$x['nama'] = $this->session->userdata('nama');
		//$x['logged_in'] = $this->session->userdata('logged_in');
				$d['obat']= $this->m_obat->get_all_obat();
		$x['pjn']= $this->m_penjualan->get_all_penjualan();
		$x['username'] = $this->session->userdata('username');
		$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();

		$this->load->view('admin/v_penjualan',$x);
	}


		function penjualan1(){

		$data['level'] = $this->session->userdata('level');
					$x['cp']=$this->m_obat->ntf_capsul();
		$data['bt']=$this->m_obat->ntf_botol();
		$data['tb']=$this->m_obat->ntf_tablet();
		$data['username'] = $this->session->userdata('username');
		$data['nama'] = $this->session->userdata('nama');
		//$x['logged_in'] = $this->session->userdata('logged_in');
				$data['data']= $this->m_obat->get_all_obat();
		$data['pjn']= $this->m_penjualan->get_all_penjualan();
		$data['username'] = $this->session->userdata('username');
		$data['cp']=$this->m_obat->ntf_capsul();
		$data['bt']=$this->m_obat->ntf_botol();
		$data['tb']=$this->m_obat->ntf_tablet();

		$this->load->view('admin/penjualan',$data);
	}


	function laporan_pendapatan(){

		$x['level'] = $this->session->userdata('level');
			$x['nama'] = $this->session->userdata('nama');
				$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$username =$this->session->userdata('username');
		$year = date('Y');
		$bln2 = date('m');
		$bln1 = '01';
		$x['pjn'] =$this->m_penjualan->hasil_penjualan();
		$x['data2']=$this->m_chart->chart_pendapatan1($year,$bln1,$bln2);
		$x['data3']=$this->m_chart->chart_pengeluaran1($year,$bln1,$bln2);
		$x['data4']=$this->m_chart->chart_pengeluaran2($year,$bln1,$bln2);
		$x['username'] = $this->session->userdata('username');
		$x['cp']=$this->m_obat->ntf_capsul();
		$x['bt']=$this->m_obat->ntf_botol();
		$x['tb']=$this->m_obat->ntf_tablet();
		$q2 = $this->db->query("SELECT count(MONTH(tgl)) as bln, MONTHNAME(tgl) as tgl,SUM(total) as pendapatan from penjualan where year(tgl) = $year and month(tgl)>='$bln1' and month(tgl)<='$bln2'   GROUP BY MONTH(tgl) order by month(tgl)");
$x['jmlh']= $q2->num_rows();
		$this->load->view('admin/v_laporan_penjualan',$x);
	}

	function lap_penjualan(){

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
		$x['pj'] =$this->m_penjualan->get_penjualan();
		$this->load->view('admin/v_lap_penjualan',$x);
	}

	function penjualan_filter(){

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
		$x['pjf'] =$this->m_penjualan->get_penjualan_filter($tgl);
		$x['tgl'] = $tgl;

		$this->load->view('admin/v_lap_filter',$x);
	}
	else if(!empty($filter)){
		$x['pjf'] =$this->m_penjualan->get_penjualan_periode($filter,$date);
		$x['filter'] = $filter;
		$x['date'] = $date;
		$this->load->view('admin/v_lap_filter',$x);	
	}else{
		redirect('admin/penjualan/lap_penjualan');
	}
}
		
	function simpan_penjualan(){
								 $n = $this->input->post('i');
								 $nama = $this->input->post('nama');
								 $this->m_penjualan->struck($nama);
								$last_insert_id = $this->db->insert_id();

									//$cekstok[]=0;
									//$stok = array();
							for($i=1; $i<=$n; $i++) {
								# code...
								//echo $i;
								 $tgl =date('Y-m-d');

	                         $total[$i] = $this->input->post('total'.$i);
	                         $qty[$i] = $this->input->post('jmlh'.$i);
						 echo $id_obat[$i]=$this->input->post('id_obat'.$i);

							$cek = $this->db->query("SELECT * from obat where id = '$id_obat[$i]'");
							foreach ($cek->result_array() as $k) {
								echo $stok = $k['stok'];
								# code...
							}
							$cekstok = $stok-$qty[$i];

											 if($cekstok<=0){
				echo $this->session->set_flashdata('msg','errors');
					redirect('admin/penjualan/penjualan');
							}
						else if($total[$i] == 0 && $qty[$i] == 0 && $id_obat[$i]==0){

						}
					
							else{
								
								//return $last_insert_id;
								$this->m_obat->stok_berkurang($id_obat[$i],$qty[$i]);
						$this->m_penjualan->set_penjualan($tgl,$total[$i],$qty[$i],$id_obat[$i],$last_insert_id);

							}
							}
							$x['struck']=$last_insert_id;
							$x['cekstruck']=$this->db->query("SELECT obat.harga_jual as harga,penjualan.total as total1,sum(penjualan.total) as total,struck.id_struck,struck.nama,penjualan.qty,penjualan.tgl,obat.id,obat.nama as namao from obat join penjualan on obat.id = penjualan.id_obat join struck on struck.id_struck = penjualan.id_str where struck.id_struck = '$last_insert_id' ");
							$this->load->view('admin/v_cetak',$x);
    // dapatkan output html
    $html = $this->output->get_output();
    // Load/panggil library dompdfnya
    $this->load->library('dompdf_gen');
    // Convert to PDF
  $this->dompdf->set_paper("a7");
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    //utk menampilkan preview pdf
    $sekarang=date("d:F:Y:h:m:s");
    $this->dompdf->stream("Struck".$sekarang.".pdf",array('Attachment'=>0));
    //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
    //$this->dompdf->stream("welcome.pdf");
							//echo $total;
		 $this->session->set_flashdata('msg','success');

					redirect('admin/penjualan/penjualan');
		 //$x['obat']= $this->m_obat->get_all_obat();

		// $this->load->view('admin/v_obat',$x);

	            		
	            	
	}
	function delete_obat(){
		$kode=strip_tags($this->input->post('kode'));
		$this->m_obat->hapus_obat($kode);
		echo $this->session->set_flashdata('msg','success-hapus');	
		//echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/obat/obat',$x);
	}

	



function export_excel(){
		$username = $this->session->userdata('username');
		$x['pj']= $this->m_penjualan->get_penjualan();

		$this->load->view('admin/penjualan_excel',$x);	
	  

}
function add_to_cart(){
		$kobar=$this->input->post('kode_brg');
		$produk=$this->m_obat->get_obat($kobar);
		$i=$produk->row_array();
		$data = array(
               'id'       => $i['id'],
               'name'     => $i['nama'],
               'tgl_k'   => $i['tgl_kadaluarsa'],
              'price'    => str_replace(",", "", $this->input->post('harjul')),
               'qty'      => $this->input->post('qty'),
               'amount'	  => str_replace(",", "", $this->input->post('harjul'))
            );
	if(!empty($this->cart->total_items())){
		foreach ($this->cart->contents() as $items){
			$id=$items['id'];
			$qtylama=$items['qty'];
			$rowid=$items['rowid'];
			$kobar=$this->input->post('kode_brg');
			$qty=$this->input->post('qty');
			if($id==$kobar){
				$up=array(
					'rowid'=> $rowid,
					'qty'=>$qtylama+$qty
					);
				$this->cart->update($up);
			}else{
				$this->cart->insert($data);
			}
		}
	}else{
		$this->cart->insert($data);
	
	}

		redirect('admin/penjualan/penjualan1');

	}
		function get_barang(){
		$kobar=$this->input->post('kode_brg');
		$x['brg']=$this->m_obat->get_obat($kobar);
		$this->load->view('admin/v_barang_jual',$x);
	}

		function remove(){

		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/penjualan/penjualan1');
		}

	function simpan_penjualan1(){

		$total=$this->input->post('total');
		$nama = $this->input->post('nama_p');
		$jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
		$kembalian=$jml_uang-$total;
		if(!empty($total) && !empty($jml_uang)){
			if($jml_uang < $total){
				echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
				redirect('admin/penjualan/penjualan1');
			}else{
						$tgl = date('Y-m-d');
				$order_proses=$this->m_penjualan->simpan_penjualan($nama,$jml_uang);
				echo $last_insert_id = $this->db->insert_id();
					foreach ($this->cart->contents() as $item) {
			$data=array(
				
				
				'tgl'			=>	$tgl,
				'total'			=>	$item['subtotal'],
				'qty'			=>	$item['qty'],
				'id_obat'		=>	$item['id'],
				'id_str'		=>$last_insert_id
			);
				$this->db->insert('penjualan',$data);
				$this->db->query("update obat set stok=stok-'$item[qty]' where id='$item[id]'");
			}
										$x['struck']=$last_insert_id;
							$x['cekstruck']=$this->db->query("SELECT count(obat.id) as jml,obat.harga_jual as harga,penjualan.total as total1,sum(penjualan.total) as total,struck.id_struck,struck.nama,penjualan.qty,penjualan.tgl,obat.id,obat.nama as namao from obat join penjualan on obat.id = penjualan.id_obat join struck on struck.id_struck = penjualan.id_str where struck.id_struck = '$last_insert_id'");
							$this->load->view('admin/v_cetak',$x);
    // dapatkan output html
    $html = $this->output->get_output();
    // Load/panggil library dompdfnya
    $this->load->library('dompdf_gen');
    // Convert to PDF
  $this->dompdf->set_paper("a7");
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    //utk menampilkan preview pdf
    $sekarang=date("d:F:Y:h:m:s");
    $this->dompdf->stream("Struck".$sekarang.".pdf",array('Attachment'=>0));
    //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
    //$this->dompdf->stream("welcome.pdf");
				if($order_proses){
					$this->cart->destroy();
						 
	
    $this->session->set_flashdata('msg','success');
						redirect('admin/penjualan/penjualan1');
				}else{
					redirect('admin/penjualan/penjualan1');
				}
			}
			
		}else{
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
			redirect('admin/penjualan/penjualan1');
		}

	}
	

}
