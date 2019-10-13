<?php
class M_obat extends CI_Model{
	function get_all_obat(){
		$hsl=$this->db->query("select * from obat");
		return $hsl;
	}

	function obat_fast(){
		$hsl=$this->db->query("SELECT obat.nama,obat.gol,obat.type,obat.stok,fsn.final_fsn from fsn join obat on obat.id = fsn.id_obat where fsn.final_fsn = 'F'  ");
		return $hsl;
	}
	function simpan_obat($nama,$gol,$type,$tgl_kadaluarsa,$tanggal_beli,$stok,$hrg_b,$hrg_j,$id_supplier){
		$hsl=$this->db->query("INSERT INTO obat(nama,gol,type,tgl_kadaluarsa,tgl,stok,harga_beli,harga_jual,id_supplier)VALUES('$nama','$gol','$type','$tgl_kadaluarsa','$tanggal_beli','$stok','$hrg_b','hrg_j','$id_supplier')");
		return $hsl; 
	}
		function hapus_obat($kode){
		$hsl=$this->db->query("delete from obat where id='$kode'");
		return $hsl;
	}
	function update_obat($id,$nama,$gol,$type,$tanggal,$tgl_b,$stok,$hargab,$hargaj,$id_supplier){
		$hsl = $this->db->query("update obat set nama = '$nama', gol = '$gol', type = '$type', tgl_kadaluarsa = '$tanggal', tgl = '$tgl_b',stok = '$stok', harga_beli = '$hargab',harga_jual = '$hargaj',id_supplier = '$id_supplier'  where id ='$id'");
		return $hsl;

	}

	function stok_berkurang($kode,$stok){
		$hsl = $this->db->query("UPDATE obat set stok = stok-'$stok' where id = '$kode'");
		return $hsl;

	}

		function stok_bertambah($kode,$stok){
		$hsl = $this->db->query("UPDATE obat set stok = stok + '$stok' where id = '$kode'");
		return $hsl;

	} function tambah_stok($id_obat,$qty,$kadaluarsa){
		$hsl = $this->db->query("INSERT INTO stok (qty,kadaluarsa,id_obat)VALUES('$qty','$kadaluarsa','$id_obat')");
		return $hsl;
	}
	
		function ntf_capsul(){
			$hsl = $this->db->query("SELECT * FROM obat where stok <= 100 AND type IN('Capsul','Tablet','Pill')");
			return $hsl;
		}
		function ntf_botol(){
			$hsl = $this->db->query("SELECT * FROM obat where type IN('Botol','cair','Larutan','Salep','Suntik') AND stok <=10");
			return $hsl;
		}
		function ntf_tablet(){
			$hsl = $this->db->query("SELECT * FROM obat where stok <= 20 AND type = 'Tablet'");
			return $hsl;
		}

		function get_obat($kobar){
		$hsl=$this->db->query("select * from obat where id ='$kobar'");
		return $hsl;
	}
	}