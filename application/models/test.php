<?php
class M_fsn extends CI_Model{
	function pembelian(){
			$q = $this->db->query("SELECT * FROM pembelian");
			if($q->num_rows()>0){
				foreach ($q -> result() as $data ) {
					$hasil[] = $data;
					# code...
				}
				return $hasil;
			}
	}

	function penjualan(){
			$q1 = $this->db->query("SELECT * FROM penjualan");
			if($q1->num_rows()>0){
				foreach ($q1 -> result() as $data1 ) {
					$hasil1[] = $data1;
					# code...
				}
				return $hasil1;
			}
	}
		function obat(){
			$q2 = $this->db->query("SELECT * FROM obat where type = 'Tablet' or type = 'Capsul' or type = 'Pil' order by id asc");
			if($q2->num_rows()>0){
				foreach ($q2 -> result() as $data2 ) {
					$hasil2[] = $data2;
					# code...
				}
				return $hasil2;
			}
	}
	function obat_pcs(){
			$q2 = $this->db->query("SELECT * FROM obat where type = 'Botol' or type = 'cair' or type = 'Larutan' order by id asc");
			if($q2->num_rows()>0){
				foreach ($q2 -> result() as $data2 ) {
					$hasil2[] = $data2;
					# code...
				}
				return $hasil2;
			}
	}


	function getPembelian($td,$lw){
		$q3 = $this->db->query("SELECT obat.id,obat.nama,obat.gol,obat.type,obat.stok,pembelian.id_pembelian,pembelian.qty,pembelian.tgl FROM obat join pembelian on obat.id=pembelian.id_obat where pembelian.tgl between '$td' AND '$lw'");
		if($q3->num_rows()>0){
			foreach ($q3 -> result() as $data3) {
				$hasil3[] = $data3;
				# code...
			}
			return $hasil3;
		}
	}

	function getPenjualan($td,$lw){
		$q4 = $this->db->query("SELECT obat.id,obat.nama,obat.gol,obat.type,obat.stok,penjualan.kode,penjualan.qty,penjualan.tgl FROM obat join penjualan on obat.id=penjualan.id_obat where penjualan.tgl between '$td' AND '$lw' ");
		if($q4->num_rows()>0){
			foreach ($q4 -> result() as $data4) {
				$hasil4[] = $data4;
				# code...
			}
			return $hasil4;
		}
	}

		function getProduk($td,$lw){
		$q5 = $this->db->query("SELECT obat.id,obat.nama,obat.gol,obat.type,obat.stok,pembelian.id_pembelian,pembelian.qty,pembelian.tgl,penjualan.kode,penjualan.tgl,penjualan.qty as jual FROM obat join pembelian on obat.id=pembelian.id_obat join penjualan on obat.id = penjualan.id_obat where penjualan.tgl or pembelian.tgl between '$td' AND '$lw'");
		if($q5->num_rows()>0){
			foreach ($q5 -> result() as $data5) {
				$hasil5[] = $data5;
				# code...
			}
			return $hasil5;
		}
	}
	function getAvgStay(){
		$q6 = $this->db->query("SELECT * from avgstay join obat on obat.id = avgstay.id_obat where obat.type  = 'Tablet' or obat.type = 'Capsul 'or obat.type = 'Pil' order by cumavgstay desc");

		if($q6->num_rows()>0){
			foreach ($q6 -> result() as $data6) {
				$hasil6[] = $data6;
				# code...
			}
			return $hasil6;
		}
	}

	function getAvgCr(){
		$q7 = $this->db->query("SELECT * from consumsition join obat on obat.id = consumsition.id_obat where obat.type  = 'Tablet' or obat.type = 'Capsul 'or obat.type = 'Pil'  order by consumtionrt desc");

		if($q7->num_rows()>0){
			foreach ($q7 -> result() as $data7) {
				$hasil7[] = $data7;
				# code...
			}
			return $hasil7;
		}
	}

		function AvgStay(){
		$q8 = $this->db->query("SELECT * from avgstay join obat on obat.id = avgstay.id_obat where obat.type  = 'Tablet' or obat.type = 'Capsul 'or obat.type = 'Pil'  order by  id_obat asc");

		if($q8->num_rows()>0){
			foreach ($q8 -> result() as $data8) {
				$hasil8[] = $data8;
				# code...
			}
			return $hasil8;
		}
	}

	function AvgCr(){
		$q9 = $this->db->query("SELECT * from consumsition join obat on obat.id = consumsition.id_obat where obat.type  = 'Tablet' or obat.type = 'Capsul 'or obat.type = 'Pil'   order by id_obat asc");

		if($q9->num_rows()>0){
			foreach ($q9 -> result() as $data9) {
				$hasil9[] = $data9;
				# code...
			}
			return $hasil9;
		}
	}

function fsn_bebas(){
		$q8 = $this->db->query("SELECT obat.nama,obat.gol,fsn.final_fsn,count(fsn.id_obat) as total from fsn join obat on obat.id = fsn.id_obat where obat.gol = 'Bebas' group by  final_fsn order by total");

		if($q8->num_rows()>0){
			foreach ($q8 -> result() as $data8) {
				$hasil8[] = $data8;
				# code...
			}
			return $hasil8;
		}
	}

	function fsn_keras(){
		$q9 =$this->db->query("SELECT obat.nama,obat.gol,fsn.final_fsn,count(fsn.id_obat) as total from fsn join obat on obat.id = fsn.id_obat where obat.gol = 'Keras' group by  final_fsn order by total");

return $q9;
	}

		function fsn_bebas_terbatas(){
		$q9 =$this->db->query("SELECT obat.nama,obat.gol,fsn.final_fsn,count(fsn.id_obat) as total from fsn join obat on obat.id = fsn.id_obat where obat.gol = 'Bebas Terbatas' group by  final_fsn order by total");
			return $q9;

	
	}

			function fsn_detail($gol){
		$q9 =$this->db->query("SELECT obat.type,obat.nama,obat.gol,fsn.final_fsn from fsn join obat on obat.id = fsn.id_obat where obat.gol = '$gol'");
			return $q9;
	}

	function fsn_bebas1(){
		$q8 = $this->db->query("SELECT obat.nama,obat.gol,fsn.final_fsn,count(fsn.id_obat) as total from fsn join obat on obat.id = fsn.id_obat where obat.gol = 'Bebas' group by  final_fsn order by total");
return $q8;
	}

function obat_fast(){
		$q10=$this->db->query("SELECT obat.id,obat.nama,obat.gol,obat.type,obat.stok,fsn.final_fsn from fsn join obat on obat.id = fsn.id_obat where fsn.final_fsn = 'F'");
if($q10->num_rows()>0){
			foreach ($q10 -> result() as $data10) {
				$hasil10[] = $data10;
				# code...
			}
			return $hasil10;
		}else{
			return false;
		}
}

function jmlh_f(){
	$hsl=$this->db->query("SELECT count(obat.id) as jmlh,obat.nama,obat.gol,obat.type,obat.stok,fsn.final_fsn from fsn join obat on obat.id = fsn.id_obat where fsn.final_fsn = 'F'  ");
	return $hsl;
}

}
?>