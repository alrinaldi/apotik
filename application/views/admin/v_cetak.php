
<!DOCTYPE html>
<html lang="en">
 <head>
<?php
$date=date('Y-m-d');?>
    <title>Cetak PDF</title>

</head>
<style type="text/css">
 td {
  padding: 0px;
 }
</style>
<body  style="font-family:Times New Roman;font-size:8px">
<center><h3>Rakha Farma</h3></center>
<p>-------------------------------------------------------------------------</p>
<center><p></p><?php echo $struck?></p></center> 
<center><p></p>tanggal &emsp;: &emsp;<?php echo $date?></p></center> 
<p>-------------------------------------------------------------------------</p>

  <?php
  
            $no=0;
            foreach ($cekstruck->result_array() as $i):
                $no++;
                $jml = $i['jml'];
                $nama = $i['nama'];
                $qty = $i['qty'];
                $id_struck = $i['id_struck'];
                $namao = $i['namao'];
                $total = $i['total'];
                   $total1 = $i['total1'];
                   $harga = $i['harga'];
               
                //$s = mysql_fetch_array(mysql_query("SELECT stok from tiket,event where event.id = tiket.id_event"));
            ?>
       
             
         
               &emsp;<?php echo $namao;?>
             
                <p>&emsp;<?php echo $qty;?>&emsp; x &emsp;<?php echo $harga;?></p><p style="text-align:right;
                ">= &emsp; &emsp; <?php echo $total1;?>
        		</p>
              
                <?php endforeach ?>
           
           <p>-------------------------------------------------------------------------</p>
           
         
               <p><?php echo $nama; echo $jml;?></p>
			<h3>Total &emsp;: &emsp;<?php echo $total;?></h3>
			<p>-------------------------------------------------------------------------</p>

</div>
</body>
</html>