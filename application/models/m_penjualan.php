<?php
Class M_penjualan extends CI_Model{
	function get_all_penjualan(){
		$hsl=$this->db->query('select * from penjualan ');
		return $hsl;
	}

		function get_penjualan(){
		$hsl=$this->db->query("SELECT struck.id_struck,struck.nama as nama_p,obat.nama,penjualan.kode,penjualan.tgl,penjualan.total,penjualan.qty from obat join penjualan on obat.id = penjualan.id_obat join struck on struck.id_struck = penjualan.id_str  ORDER by penjualan.tgl DESC");
		return $hsl;
	}
	function set_penjualan($tgl,$total,$qty,$id_obat,$id_struck){
		$hsl=$this->db->query("INSERT INTO penjualan(tgl,total,qty,id_obat,id_str)VALUES('$tgl','$total','$qty','$id_obat','$id_struck')");
		return $hsl;
	}
	function hasil_penjualan(){
		$hsl=$this->db->query("SELECT MONTHNAME(tgl)AS tgl,SUM(total) as pendapatan from penjualan GROUP BY MONTH(tgl)");
		return $hsl;
	}
	function hasil_penjualan_bln(){
		$hsl=$this->db->query("SELECT MONTHNAME(tgl)AS tgl,SUM(total) as pendapatan from penjualan GROUP BY MONTH(tgl)");
		return $hsl;
	}
			function get_penjualan_filter($filter){
		$hsl=$this->db->query("SELECT obat.nama,penjualan.kode,penjualan.tgl,penjualan.total,penjualan.qty from obat join penjualan on obat.id = penjualan.id_obat where penjualan.tgl = '$filter' ORDER by penjualan.tgl DESC");
		return $hsl;
	}
		function get_penjualan_periode($tgl1,$tgl2){
		$hsl=$this->db->query("SELECT obat.nama,penjualan.kode,penjualan.tgl,penjualan.total,penjualan.qty from obat join penjualan on obat.id = penjualan.id_obat where penjualan.tgl >= '$tgl1' and penjualan.tgl <='$tgl2'  ORDER by penjualan.tgl DESC");
		return $hsl;
	}

	function struck($nama){
		$hsl=$this->db->query("INSERT INTO struck(nama)VALUES('$nama')");
		return $hsl;
	}

	function get_penjulan_avg($date1,$date2){
		$hsl=$this->db->query("SELECT sum(penjualan.qty) as qty,penjualan.id_obat from fsn join penjualan on penjualan.id_obat = fsn.id_obat where final_fsn = 'F' and MONTH(penjualan.tgl) >= '$date1' and  MONTH(penjualan.tgl) <= '$date2'");
		return $hsl;
	}

	function get_id_struck(){
       
    }
    	function hasil_penjualan1($tgl){
		$hsl=$this->db->query("SELECT MONTHNAME(tgl)AS tgl,SUM(total) as pendapatan from penjualan where year(tgl)='$tgl' GROUP BY MONTH(tgl)");
		return $hsl;
	}


	function simpan_penjualan($nama,$uang){

	$hsl=	$this->db->query("INSERT INTO struck (nama,uang) VALUES ('$nama','$uang')");
				//$last_insert_id = $this->db->insert_id();

	
			return $hsl;
		}
	
	

 
}