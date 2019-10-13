<?php
class M_user extends CI_Model{
	function tambah_user($nama,$username,$password,$tlpn,$alamat,$level){
		$hsl=$this->db->query("INSERT INTO user(nama,username,password,tlpn,alamat,level) values('$nama','$username','$password','$tlpn','$alamat','$level')");
		return $hsl;
	}

	function edit_user($username,$nama,$password,$tlpn,$alamat,$level){
$hsl = $this->db->query("UPDATE user set username ='$username', nama = '$nama', password = '$password', tlpn = '$tlpn', alamat = '$alamat', level = '$level'  where username = '$username'");
return $hsl;
	}

	function hapus_user($id){
		$hsl = $this->db->query("DELETE from user where id = '$id' ");
		return $hsl;
	}
	function get_user(){
		$hsl = $this->db->query("SELECT * from user");
		return $hsl;
	}

}