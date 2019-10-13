<?php 
class M_admin extends CI_Model{
	function get_all_administrator(){
		$hsl= $this->db->query("SELECT * FROM user where level = 'admin' OR level = 'editor'");
		return $hsl;
	}
	function simpan_admin($username,$password,$nama,$email,$alamat,$no_tlp,$level){
		$hsl  =$this->db->query("INSERT INTO user(username,password,nama,email,alamat,no_tlp,level) VALUES ($username,$password,$nama,$email,$alamat,$no_tlp,$level) ");
		return $hsl;

	}
	function update_admin($nama,$email,$alamat,$not_tlp,$level){
		$hsl=$this->db->query("update user set nama = '$nama', email = '$email', alamat = '$alamat', no_tlp='$no_tlp', level = '$level'");
		return $hsl;
	}

	function get_admin_by_username($username){
		$hsl=$this->db->query("SELECT * FROM user where username = '$username'");
		return $hsl;
	}

	function hapus_admin($username){
		$hsl=$this->db-query("delete from user where username = '$username'");
		return $hsl;

	}
}