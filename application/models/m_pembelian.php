<?php
Class M_pembelian extends CI_Model{
	function get_all_penjualan(){
		$hsl=$this->db->query('select * from pembelian');
		return $hsl;
	}
	function set_pembelian($tgl,$total,$qty,$id_obat){
		$hsl=$this->db->query("INSERT INTO pembelian(tgl,total,qty,id_obat)VALUES('$tgl','$total','$qty','$id_obat')");
		return $hsl;
	}
	function hapus_pembelian($id){
		$hsl=$this->db->query("delete from pembelian where id='$id'");
		return $hsl;

	}

	function hapus_pembelian_obat($kode){
		$hsl=$this->db->query("delete from pembelian where id_obat = '$kode'");
		return $hsl;

	}



		function get_pembelian(){
		$hsl=$this->db->query("SELECT supplier.nama as namas,obat.nama,pembelian.id_pembelian,pembelian.tgl,pembelian.total,pembelian.qty from obat join pembelian on obat.id = pembelian.id_obat join supplier on obat.id_supplier = supplier.id_supplier ORDER by pembelian.tgl DESC");
		return $hsl;
	}
	
			function get_pembelian_filter($filter){
		$hsl=$this->db->query("SELECT supplier.nama as namas,obat.nama,pembelian.id_pembelian,pembelian.tgl,pembelian.total,pembelian.qty from obat join pembelian on obat.id = pembelian.id_obat join supplier on obat.id_supplier = supplier.id_supplier where pembelian.tgl = '$filter' ORDER by pembelian.tgl DESC");
		return $hsl;
	}
		function get_pembelian_periode($tgl1,$tgl2){
		$hsl=$this->db->query("SELECT supplier.nama as namas,obat.nama,pembelian.id_pembelian,pembelian.tgl,pembelian.total,pembelian.qty from obat join pembelian on obat.id = pembelian.id_obat join supplier on obat.id_supplier = supplier.id_supplier where pembelian.tgl >= '$tgl1' and pembelian.tgl <='$tgl2'  ORDER by pembelian.tgl DESC");
		return $hsl;
	}

}