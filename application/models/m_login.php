<?php
class M_login extends CI_Model{
    function cekadmin($data){
        $hasil=$this->db->get_Where('user', $data);
        return $hasil;
    }
  
}
