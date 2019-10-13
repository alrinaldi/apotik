<?php
class M_supplier extends CI_Model{
	function get_all_supplier(){
		$hsl=$this->db->query("select * from supplier");
		return $hsl;
	}
	function simpan_supplier($nama,$alamat,$tlpn){
		$hsl=$this->db->query("INSERT INTO supplier(nama,alamat,telepon)VALUES('$nama','$alamat','$tlpn')");
		return $hsl; 
	}
		function hapus_supplier($kode){
		$hsl=$this->db->query("delete from supplier where id_supplier='$kode'");
		return $hsl;
	}
	function update_supplier($id_supplier,$nama,$alamat,$telepon){
		$hsl = $this->db->query("update supplier set nama = '$nama', alamat = '$alamat', telepon = '$telepon' where id_supplier ='$id_supplier'");
		return $hsl;

	}

	function get_obat_by_id($kode){
		$hsl = $this->db->query("select * from event where id  = '$kode'");
		return $hsl;

	}
	function get_event_berakhir($username){
		$hsl=$this->db->query("select * from event where username = '$username' and status ='berakhir'");
		return $hsl;
	}
	function ganti_status($kode,$status){
		$hsl=$this->db->query("update event set status = '$status' where id = '$kode'");
		return $hsl;
	}
}