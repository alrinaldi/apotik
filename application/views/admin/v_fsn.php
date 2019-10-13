<!DOCTYPE html>
<html>
<?php 
    $query=$this->db->query("SELECT id FROM obat  where type = 'Tablet' or type = 'Capsul' or type = 'Pil' ");
    $jum_obat=$query->num_rows();
        $td = date('Y-m-d');
        $lw = date('Y-m-d', strtotime("-4 week"));
        //echo $lw;

        $max = $this->db->query("SELECT max(id) as id from obat");
       foreach ($max->result_array() as $m) {
            $cekmax =$m['id']; 
           # code...
       }
        $cekdatafsn = $this->db->query("SELECT * FROM avgstay where id = '$cekmax'");
        $cekdatajmlh = $cekdatafsn->num_rows();

    
        //$max['clasification'];
?>
<head>
     <?php
$this->load->view('admin/v_header');

?>
</head>
<body>
       <?php
$this->load->view('admin/v_notif');
?>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="<?php echo base_url().'assets/images/user.png'?>" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name" style="color: #fff;"><?php echo $nama;?></div>
          
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
       

    <?php 
    $this->load->view('admin/v_nav');?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Strategi</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">FSN Analisis</h1>
            </div>
        </div><!--/.row-->
        
       <div class="panel panel-primary">
                    <div class="panel-heading">Perputaran Obat (FSN Analisis)
                                            <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
            <div class="col-md-12">
<a class ="btn btn-primary btn-flat" href="<?php echo base_url('admin/fsn/movingavr')?>">Moving Average</a>
</br>
</br>
            <p>F = FAST MOVING</p>
            <p>S = SLOW MOVING</p>
            <p>N = NON MOVING</p>
           <?php
             $cek_obat = $this->db->query("SELECT * from obat");
             

           $cekfsnkategori = $this->db->query("SELECT obat.nama,obat.id,obat.stok,obat.type,penjualan.kode,penjualan.qty,penjualan.tgl from obat join penjualan on obat.id = penjualan.kode where penjualan.tgl between '$lw' and '$td' ");

           foreach ($cekfsnkategori->result_array() as $i) {
            $nama_obat = $i['nama'];
            $stok_obt = $i['stok'];
            $id_obat = $i['id'];
            $id_penjualan = $i['kode'];
            $qty = $i['qty'];


               # code...
           }


           ?>
                <?php
                    $no=0;
                    foreach ($data2 as $i2) :
                    
                       //$id=$i['id_supplier'];
                        $id_obat_fsn[]=$i2->id;
                        //$namaobat[]=$i5->nama;
                        //$qtyajoin[]=$i5->jual;
                        $stokobat[]=$i2->stok;
                    ?>
                <?php endforeach;?>
<?php 
//$i=0;
//$hd[$i]=$stokobat;
 $lw = date('Y-m-d', strtotime("-4 week"));
       // echo $lw;
$j=0;
//$tgl_k = 30;
 $avs= 0;
 $crc=0;
  $cumavs = 0;
$stokpb = array();
 $cumcrc= 0;
for($i=0;$i<$jum_obat; $i++) {
//echo $id_obat_fsn[$i];
//echo "</br>";
    $rq[]=0;
     $hd[]=0;
    $tgl_k=30;
    $iq[]=0;
    $cb[]=0;
    $cr[]=0;
    

    $stokawalpb[$i] = $this->db->query("SELECT sum(qty)as qty,tgl from pembelian  where id_obat = '$id_obat_fsn[$i]' and tgl between  '$lw' and '$td' ");
        foreach ($stokawalpb[$i] ->result_array() as $k ) {
            
            $qtyawalpb[$i] = $k['qty'];

            # code...

        }
        $stokawalpj[$i] = $this->db->query("SELECT sum(qty)as qty,tgl from penjualan  where id_obat = '$id_obat_fsn[$i]' and tgl between  '$lw' and '$td' ");
        foreach ($stokawalpj[$i] ->result_array() as $k ) {
            
            $qtyawalpj[$i] = $k['qty'];

            # code...

        }
       $stokpb[$i] = ($stokobat[$i]+$qtyawalpj[$i])-($qtyawalpb[$i]);
       //echo "</br>";
    $tmp = $stokpb[$i];
    # code...
for ($tgl_k=30; $tgl_k>=0; $tgl_k--) {
    # code...
      $tgl1  = date('Y-m-d',strtotime("-$tgl_k day"));


$cek_penjualan[$j] = $this->db->query("SELECT id_obat,sum(qty) as qty FROM penjualan where tgl = '$tgl1' and  id_obat = '$id_obat_fsn[$i]' ");
$cekj[$j] = $cek_penjualan[$j]->num_rows(); 
        foreach ($cek_penjualan[$j]->result_array() as $x) {
                    # code...
                //$query->result_array();
                    # code...
                    $id_obatj[$j] = $x['id_obat']; 
                      $q[$j] = $x['qty'];

                # code...
            
          }

          $cek_pembelian[$j] = $this->db->query("SELECT id_obat,sum(qty) as qty FROM pembelian where tgl = '$tgl1' and  id_obat = '$id_obat_fsn[$i]' ");
          $cekb[$j] = $cek_pembelian[$j]->num_rows();
        foreach ($cek_pembelian[$j]->result_array() as $x) {
                    # code...
                //$query->result_array();
                    # code...
                
                      $qp[$j] = $x['qty'];

                # code...
            
          }

           //$hd[$i]= $hd[$i]+$stokobat[$i];
    
          if($cekb[$j]==0 or $cekj[$j]==0) {
            //echo "kosong </br>";
            
           // $cb[$j] = $stokobat[$i]+$cb[$j];
            //$hd[$i]= $stokobat[$i]+$hd[$i];
            //$cb[$j] = $tmp;
                //echo $q[$j];
            $cb[$j] = $tmp;
          }else{
            $cb[$j]= $qp[$j]+$tmp;
            //$hd[$i] = $stokobat[$i]+$qp[$j]+$hd[$i];
            $rq[$i] = $qp[$j]+$rq[$i];
            //$op[$i] = $rq[$i];
            //echo $op[$i];
            //echo $id_obatj[$j];
 $cb[$j] = $cb[$j]-$q[$j]; 
 $tmp = $cb[$j];
        
        $iq[$i] = $q[$j]+$iq[$i];
            //echo "</br>";
                   
    }

  /*  if($cekj[$j]==0){
 //$cb[$j] = $stokobat[$i]+$qp[$j];
       
    }else{
        $cb[$j] = $cb[$j]-$q[$j]; 
        
        $iq[$i] = $q[$j]+$iq[$i];
        //echo $q[$j];
    }*/
  $hd[$i]= $hd[$i]+$cb[$j];
            //echo $tgl1;
        //echo $cb[$j];
        //echo"</br>";
        $j++;
    //$tgl_k--;
    }

 
   //echo "</br>";
   // echo $hd[$i];
    //echo "</br>";
    //echo $rq[$i];
    //echo $iq[$i];
    //echo ",";
    //echo $stokpb[$i];
    $op[$i] = $stokpb[$i]+$rq[$i];
    //echo $op[$i];
    $as[$i] = $hd[$i] / $op[$i];

     if($iq[$i]==0){
    $cr[$i]==0;
   
}else{
 $cr[$i] = $iq[$i ]/30;

}
  //echo $id_obat_fsn[$i];
  //echo "</br>";
$crc = $crc + $cr[$i]; 
   $avs = $avs+$as[$i];

   $cekdata[$i] = $this->db->query("SELECT * from avgstay where id_obat = '$id_obat_fsn[$i]'");
foreach ($cekdata[$i]->result_array() as $m) {
            $id_obatcek[$i] = $m['id_obat'];
            $cumavgstaycek [$i]= $m['cumavgstay'];
            //$clasificationcek = $m['clasification']; 
    # code...
}
if(empty($id_obatcek[$i])and empty($cumavgstaycek[$i])){
    $insertavg = $this->db->query("INSERT INTO avgstay (cumavgstay,id_obat)values('$as[$i]','$id_obat_fsn[$i]')");
}else{
    $updateavg = $this->db->query("UPDATE avgstay set cumavgstay = '$as[$i]',id_obat = '$id_obat_fsn[$i]' where id_obat = '$id_obat_fsn[$i]'");
}

$cekdata1[$i] = $this->db->query("SELECT * from consumsition where id_obat = '$id_obat_fsn[$i]'");
foreach ($cekdata1[$i]->result_array() as $m) {
            $id_obatcekcr[$i] = $m['id_obat'];
            $cumcr[$i] = $m['consumtionrt'];
            //$clasificationcr = $m['clasification']; 
    # code...
}
if(empty($id_obatcekcr[$i]) and empty($cumcr[$i])){
    $insertcr = $this->db->query("INSERT INTO consumsition (consumtionrt,id_obat)values('$cr[$i]','$id_obat_fsn[$i]')");
}else{
    $updatecr = $this->db->query("UPDATE consumsition set consumtionrt = '$cr[$i]',id_obat = '$id_obat_fsn[$i]' where id_obat = '$id_obat_fsn[$i]'");
}



}
    foreach( $data6 as $m):
            $id_obatcekfsn[] = $m->id_obat;
            $cumavgstaycekfsn[] = $m->cumavgstay;
           // $clasificationcek[] = $m['clasification']; 
    # code...

endforeach;
            foreach( $data7 as $m):
            $id_obatcekcrfsn[] = $m->id_obat;
            $cumcrfsn[] = $m->consumtionrt;
           // $clasificationcr[] = $m['clasification']; 
    # code...


endforeach;


                   
$cumcrc = 0;
$cumavs = 0;
$avsc[] = 0;
  $avcrc[]=0;
//echo $avs;
//echo $crc;
for ($i=0; $i <$jum_obat ; $i++) { 
//echo $cumcrfsn[$i];
//echo "</br>";
   $fsnrc[] = "";
   $fsn[] = "";
    $id_obatcekfsn[$i];
 //echo $cumavgstaycekfsn[$i]
$cumavs = $cumavgstaycekfsn[$i]+$cumavs;
//echo $cumavs;
//echo $id_obatcekfsn[$i];
 $avsc[$i] = $cumavs/$avs*(100);
//echo "</br>";
//echo $avsc[$i];
//echo ",";
if($avsc[$i]<=70){
    $fsn[$i] = "N";
}elseif ($avsc[$i]<=91) {
    $fsn[$i] = "S";
    # code...
}else {
    # code...
    $fsn[$i] = "F";
}
//echo $fsn[$i];
//echo ",";
//echo "</br>";
    # code...
  $updateavgstay = $this->db->query("UPDATE avgstay set clasification = '$fsn[$i]' where id_obat = '$id_obatcekfsn[$i]'");

$cumcrc = $cumcrfsn[$i]+$cumcrc;
 $avcrc[$i] = $cumcrc / $crc*(100);
 //echo "</br>";
 $id_obatcekcrfsn[$i];
 $avcrc[$i];
 //echo "</br>";
if($avcrc[$i]<=70){
    $fsnrc[$i] ="F"; 

}else if($avcrc[$i]<=91){
    $fsnrc[$i]= "S";

}
else{
    $fsnrc[$i] = "N";
}
//echo $id_obat_fsn[$a].'';
//echo $as[0];
//echo $fsnrc[$i];
//echo $id_obatcekcrfsn[$i];
$updateavgcr = $this->db->query("UPDATE consumsition set clasification = '$fsnrc[$i]' where id_obat = '$id_obatcekcrfsn[$i]'");

//echo "</br>";

}



    foreach( $data8 as $m):
            $id_obatfsn_final[] = $m->id_obat;
            //$cumavgstaycekfsn[] = $m->cumavgstay;
            $clasificationcek[] = $m->clasification; 
    # code...

endforeach;
            foreach( $data9 as $m):
            $id_obat_cr_final[] = $m->id_obat;
            //$cumcrfsn[] = $m->consumtionrt;
            $clasificationcr[] = $m->clasification; 
    # code...


endforeach;
$finalfsn[] = "";
for ($i=0; $i <$jum_obat ; $i++) {
   // echo $clasificationcr[$i];
if($id_obatfsn_final[$i] == $id_obat_cr_final[$i]){

    if($clasificationcek[$i]=="N" and $clasificationcr[$i]=="N"){
        $finalfsn[$i] = "N";

    }else if($clasificationcek[$i]=="N" and $clasificationcr[$i]=="S"){
        $finalfsn[$i] = "N";

    }else if($clasificationcek[$i]=="N" and $clasificationcr[$i]=="F"){
        $finalfsn[$i] = "S";

    }else if($clasificationcek[$i]=="S" and $clasificationcr[$i]=="N"){
        $finalfsn[$i] = "N";

    }else if($clasificationcek[$i]=="S" and $clasificationcr[$i]=="S"){
        $finalfsn[$i] = "S";

    }else if($clasificationcek[$i]=="S" and $clasificationcr[$i]=="F"){
        $finalfsn[$i] = "F";

    }else if($clasificationcek[$i]=="F" and $clasificationcr[$i]=="N"){
        $finalfsn[$i] = "S";

    }else if($clasificationcek[$i]=="F" and $clasificationcr[$i]=="S"){
        $finalfsn[$i] = "S";

    }else if($clasificationcek[$i]=="F" and $clasificationcr[$i]=="F"){
        $finalfsn[$i] = "F";

    }else{

}


    # code...
}else{

}

$cekfsnkosong[$i]= $this->db->query("SELECT * FROM FSN where id_obat = '$id_obatfsn_final[$i]'");
$cekhasilkosong[$i] = $cekfsnkosong[$i]->num_rows();
if($cekhasilkosong[$i]==0){
    $insertfsn = $this->db->query("INSERT INTO fsn (final_fsn,id_obat)values('$finalfsn[$i]','$id_obatfsn_final[$i]')");
}else{
    $updatefsn = $this->db->query("UPDATE fsn set final_fsn = '$finalfsn[$i]',id_obat = '$id_obatfsn_final[$i]' where id_obat = '$id_obatfsn_final[$i]'");
}
}
   //echo $id_obat_fsn[$i];
  //echo $as[$i];
   //echo $cr[$i];
 //  echo "</br>";
 

/*echo $as[0];
//asort($as);
for($a=0;$a<$jum_obat; $a++){
    echo $as[$a];
    print_r($as)
}*/
 // echo $avs;


 //$fsn = "N";

//echo $id_obat_fsn[$i];
//echo $q;
//echo $lw;

?>


<?php 




        foreach( $data9 as $m):
          //  $id_obat_cr_final[] = $m->id_obat;
            //$cumcrfsn[] = $m->consumtionrt;
            $clasificationcrf[] = $m->clasification; 
    # code...


endforeach;

?>

<table id="example" class="table table-striped" style="font-size:12px;">
 
 <br>
            <thead >
            <tr class="table">
                <th>No.</th>
                <th>Nama obat</th>
                <th>type</th>
                <th>Clasification average stay</th>
                <th>Clasfication consumtion rate</th>
                <th>Final Clasification</th>
                 <th> Stock</th>
          
                
            </tr>
            </thead>
            <tbody id="example">
            <?php
       
   
            $no=0;
            for ($i=0; $i <$jum_obat ; $i++){

                $stockobt[$i] =$this->db->query("SELECT stok,type  FROM obat where id = '$id_obatfsn_final[$i]' ");
//$cekdev[$i] = $dev[$i]->num_rows(); 
        foreach ($stockobt[$i]->result_array() as $x) {
                    # code...
                //$query->result_array();
                    # code...
                    $stokobatsf[$i] = $x['stok']; 
                    $ststype = $x['type'];
                     

                # code...
            
          }

                # code...
            $no++;
                $queryobat = $this->db->query("SELECT * FROM obat where id = '$id_obatfsn_final[$i]'");
                    # code...
                foreach ($queryobat->result_array() as $n) {
                            # code...
                        $nama_fsn = $n['nama'];
                        }       
                
                //$s = mysql_fetch_array(mysql_query("SELECT stok from tiket,event where event.id = tiket.id_event"));
            ?>
          <tr class="table">
                <td class="table_check"><?php echo $no;?></td>
                <td><?php echo $nama_fsn;?></td>
                <td><?php echo$ststype;?></td>
                <td class="table_title"><?php echo $clasificationcek[$i];?></td>
          <td><?php echo $clasificationcr[$i];?></td>
                <td><?php echo $finalfsn[$i];?></td>
                 <td><?php echo ($stokobatsf[$i]);?></td>
                
         
                
        
      
          
            </tr>
           
            

             <?php }?>
</tbody>
        </table>
        </div>
        </div>
        </div>
   
        
        <div class="row">
           
            <div class="col-sm-12">
                <p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
    
    <script src="<?php echo base_url().'desain/lumino/js/jquery-1.11.1.min.js'?>"></script>
    <script src="<?php echo base_url().'desain/lumino/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'desain/lumino/js/chart.min.js'?>"></script>
    <script src="<?php echo base_url().'desain/lumino/js/chart-data.js'?>"></script>
    <script src="<?php echo base_url().'desain/lumino/js/easypiechart.js'?>"></script>
    <script src="<?php echo base_url().'desain/lumino/js/easypiechart-data.js'?>"></script>
    <script src="<?php echo base_url().'desain/lumino/js/bootstrap-datepicker.js'?>"></script>
    <script src="<?php echo base_url().'desain/lumino/js/custom.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
       
        <script type="text/javascript">
       $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
        

 

</body>
</html>