<?php
class M_movingavg extends CI_Model{

	function get_sma($tgl){
		$hsl = $this->db->query("SELECT obat.nama,obat.stok,obat.id,movingavg.hasil,movingavg.id_obat from obat join movingavg on obat.id = movingavg.id_obat where movingavg.tgl = '$tgl'Limit 5");
		return $hsl;
	}

}