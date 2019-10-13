<?php
header('Content-Type: application/json');
$q2 = $this->db->query("SELECT  tgl,SUM(total) as pendapatan from penjualan where year(tgl)  = $year GROUP BY day(tgl) order by day(tgl)");
foreach ($$q2->result_array() as $x) {

extract($x);
            $hasil = $x['pendapatan'];
            $tgl = strtotime($x['tgl'])*1000;
            
   echo $pdpt[] = "[$tgl,$hasil]";
     //echo $res="[".$row['timestamp'] . ',' . $row['temperature'] ."]";
    # code...
}
?>