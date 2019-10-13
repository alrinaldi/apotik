<?php
Class M_pengeluran extends CI_Model{
	function get_all_pengeluaran(){
		$hsl=$this->db->query('select * from pengeluran');
		return $hsl;
	}
	function set_pengeluaran($ket,$jumlah,$tgl){
		$hsl=$this->db->query("INSERT INTO pengeluran(keterangan,jumlah,tgl)VALUES('$ket','$jumlah','$tgl')");
		return $hsl;
	}
	function hapus_pengeluaran($id){
		$hsl=$this->db->query("delete from pengeluran where id='$id'");
		return $hsl;

	}

	function edit_pengeluaran($kode,$ket,$jumlah,$tgl){
		$hsl=$this->db->query("UPDATE pengeluran set keterangan='$ket',jumlah='$jumlah',tgl='$tgl' where id='$kode'");
		return $hsl;
	}

	



		function get_pembelian(){
		$hsl=$this->db->query("SELECT obat.nama,pembelian.id_pembelian,pembelian.tgl,pembelian.total,pembelian.qty from obat join pembelian on obat.id = pembelian.id_obat ORDER by pembelian.tgl DESC");
		return $hsl;
	}
	
			function get_pembelian_filter($filter){
		$hsl=$this->db->query("SELECT obat.nama,pembelian.id_pembelian,pembelian.tgl,pembelian.total,pembelian.qty from obat join pembelian on obat.id = pembelian.id_obat where pembelian.tgl = '$filter' ORDER by pembelian.tgl DESC");
		return $hsl;
	}
		function get_pembelian_periode($tgl1,$tgl2){
		$hsl=$this->db->query("SELECT obat.nama,pembelian.id_pembelian,pembelian.tgl,pembelian.total,pembelian.qty from obat join pembelian on obat.id = pembelian.id_obat where pembelian.tgl >= '$tgl1' and pembelian.tgl <='$tgl2'  ORDER by pembelian.tgl DESC");
		return $hsl;
	}
		function hasil_penjualan($year){
		$hsl=$this->db->query("SELECT MONTHNAME(tgl)AS tgl,SUM(total) as pendapatan from pengeluran where year(tgl) = '$year' GROUP BY MONTH(tgl)");
		return $hsl;
	}

}