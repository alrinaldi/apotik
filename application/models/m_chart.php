<?php
class M_chart extends CI_Model{
	function chart(){
			$q = $this->db->query("SELECT obat.nama,pembelian.tgl,pembelian.id_obat,SUM(qty) as stok From obat join pembelian on  obat.id = pembelian.id_obat GROUP BY pembelian.id_obat");
			if($q->num_rows()>0){
				foreach ($q -> result() as $data ) {
					$hasil[] = $data;
					# code...
				}
				return $hasil;
			}
	}

function chart_penjualan($year){
			$q1 = $this->db->query("SELECT obat.nama,penjualan.tgl,penjualan.id_obat,SUM(qty) as stok From obat join penjualan on  obat.id = penjualan.id_obat  GROUP BY penjualan.id_obat");
			if($q1->num_rows()>0){
				foreach ($q1 -> result() as $data1 ) {
					$hasil1[] = $data1;
					# code...
				}
				return $hasil1;
			}
	}

	function chart_pendapatan($year){
			$q2 = $this->db->query("SELECT  MONTHNAME(tgl) as tgl,SUM(total) as pendapatan from penjualan where year(tgl)  = $year GROUP BY MONTH(tgl) order by month(tgl)");
			if($q2->num_rows()>0){
				foreach ($q2 -> result() as $data2 ) {
					$hasil2[] = $data2;
					# code...
				}
				return $hasil2;
			}
	}
	function chart_pengeluaran($year){
			$q3 = $this->db->query("SELECT  MONTHNAME(tgl) as tgl,SUM(total) as pengeluaran from pembelian where year(tgl) = $year  GROUP BY MONTH(tgl) order by month(tgl)");
			if($q3->num_rows()>0){
				foreach ($q3 -> result() as $data3 ) {
					$hasil3[] = $data3;
					# code...
				}
				return $hasil3;
			}
	}

	function chart_pendapatan1($year,$bln1,$bln2){
			$q2 = $this->db->query("SELECT MONTHNAME(tgl) as tgl,SUM(total) as pendapatan from penjualan where year(tgl) = '$year' and month(tgl)>='$bln1' and month(tgl)<='$bln2'  GROUP BY MONTH(tgl) order by month(tgl)");
			if($q2->num_rows()>0){
				foreach ($q2 -> result() as $data2 ) {
					$hasil2[] = $data2;
					# code...
				}
				return $hasil2;
			}
	}
	
function chart_pengeluaran1($year,$bln1,$bln2){
			$q3 = $this->db->query("SELECT  MONTHNAME(tgl) as tgl,SUM(total) as pengeluaran from pembelian where year(tgl) = '$year' and month(tgl)>='$bln1' and month(tgl)<='$bln2'    GROUP BY MONTH(tgl) order by month(tgl)");
			if($q3->num_rows()>0){
				foreach ($q3 -> result() as $data3 ) {
					$hasil3[] = $data3;
					# code...
				}
				return $hasil3;
			}
	}
	function chart_pengeluaran2($year,$bln1,$bln2){
			$q3 = $this->db->query("SELECT  MONTHNAME(tgl) as tgl,SUM(jumlah) as pengeluaran from pengeluran where year(tgl) = '$year' and month(tgl)>='$bln1' and month(tgl)<='$bln2'  GROUP BY MONTH(tgl) order by month(tgl)");
			if($q3->num_rows()>0){
				foreach ($q3 -> result() as $data3 ) {
					$hasil3[] = $data3;
					# code...
				}
				return $hasil3;
			}
	}
		function chart_penjualan_terbanyak($bulan,$year){
			$q4 = $this->db->query("SELECT  obat.nama as nama,SUM(penjualan.qty) as total from obat join  penjualan on obat.id = penjualan.id_obat where month(penjualan.tgl) = $bulan and year(penjualan.tgl)='$year' and obat.type = 'Capsule' or obat.type = 'Pill' or obat.type = 'Tablet' group by obat.nama order by total DESC LIMIT 10");
			if($q4->num_rows()>0){
				foreach ($q4 -> result() as $data4 ) {
					$hasil4[] = $data4;
					# code...
				}
				return $hasil4;
			}
	}

		function chart_penjualan_terbanyak_thn($year){
			$q4 = $this->db->query("SELECT  obat.nama as nama,SUM(penjualan.qty) as totaly from obat join  penjualan on obat.id = penjualan.id_obat where  year(penjualan.tgl)='$year' group by obat.nama order by totaly DESC LIMIT 10");
			if($q4->num_rows()>0){
				foreach ($q4 -> result() as $data4 ) {
					$hasil4[] = $data4;
					# code...
				}
				return $hasil4;
			}
	}

function chart_pendapatanPjn(){
			$q2 = $this->db->query("SELECT  tgl,SUM(total) as pendapatan from penjualan GROUP BY tgl order by tgl ");
				return $q2;
	}

	function chart_hasil_laba(){
			$q2 = $this->db->query("SELECT  tgl,SUM(total) as png from pembelian GROUP BY tgl order by tgl");
				return $q2;
	}

}


?>