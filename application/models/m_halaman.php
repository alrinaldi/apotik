<?php
class M_halaman extends CI_Model{
	function get_all_halaman(){
		$hsl=$this->db->query("select * from halaman");
		return $hsl;
	}
}