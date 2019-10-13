<!DOCTYPE html>
<html>
<head>

    <?php
$this->load->view('admin/v_header');

?>
   <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

 
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
                <li class="active">Pendapatan</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pendapatan</h1>
            </div>
        </div><!--/.row-->

                             <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        PENDAPATAN
                        <ul class="pull-right panel-settings panel-button-tab-right">
                            <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                <em class="fa fa-cogs"></em>
                            </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <ul class="dropdown-settings">
                                            <li><a href="#">
                                                <em class="fa fa-cog"></em> Settings 1
                                            </a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">
                                                <em class="fa fa-cog"></em> Settings 2
                                            </a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">
                                                <em class="fa fa-cog"></em> Settings 3
                                            </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
                         <div id="pendapatan" name="pendapatan"></div>
                               <?php

$pdpt = array();
$pbnn = array();
$hasil = array();
function aasort (&$array, $key) {
    $sorter=array();
    $ret=array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii]=$va[$key];
    }
    asort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii]=$array[$ii];
    }
    $array=$ret;
}
$pdpt1 = array();
$pj = array();
$pb = array();
$pg = array();
$pendapatan = array();
$tgawal = date("2019-01-01");
$tgakhir = date('Y-m-d');
 $tglulang = (strtotime($tgakhir)-strtotime($tgawal))/(24*60*60);
$i=0;
for($tglulang>=0; $tglulang--;){
 $tglbanding  = date('Y-m-d',strtotime("-$tglulang day"));
$q[$i] = $this->db->query("SELECT  tgl,SUM(total) as pembelian from pembelian where tgl = '$tglbanding' GROUP BY tgl order by tgl");
$cekp[$i] = $q[$i]->num_rows();
foreach ($q[$i]->result_array() as $x) {
  

   $tglpb[$i] = $x['tgl'];
 $pembelian[$i] = $x['pembelian'];

  # code...
}
$q1[$i] = $this->db->query("SELECT  tgl,SUM(total) as penjualan from penjualan where tgl = '$tglbanding' GROUP BY tgl order by tgl ");
$cekpj[$i] = $q1[$i]->num_rows();
foreach ($q1[$i]->result_array() as $n) {

   $tglpj[$i] = $n['tgl'];
  $penjualan[$i] = $n['penjualan'];

  # code...

}
$q2[$i] = $this->db->query("SELECT  tgl,SUM(jumlah) as pengeluaran from pengeluran where tgl = '$tglbanding' GROUP BY tgl order by tgl ");
$cekpg[$i] = $q2[$i]->num_rows();
foreach ($q2[$i]->result_array() as $m) {

 

   $tglpb[$i] = $m['tgl'];
 $pengeluaran[$i] = $m['pengeluaran'];

  # code...
}
//echo $pj[$i];

if($cekp[$i] == 0){
  $pembelian[$i]=0;
}
if($cekpj[$i]==0){
  $penjualan[$i] = 0;
}
if($cekpg[$i]==0){
  $pengeluaran[$i] =0;
}
 $pendapatan[$i] = $penjualan[$i]-($pembelian[$i]+$pengeluaran[$i]);

$pdpt1[$i] = array(
             'tgl1' => strtotime($tglbanding)*1000,
            'hasil' => $pendapatan[$i]
           );


//echo '</br>';

$i++;

} 
//$this->db->query()
aasort($pdpt1,'tgl1');

  //$new_data = array();
        foreach ($pdpt1 as $record) {
            
        $tglend = $record['tgl1'];
        $hasilend =$record['hasil'];

        $new_data[] = "[$tglend,$hasilend]";

        }


?>

  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
           
              
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
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>



    <script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>

<script type="text/javascript">
       $(document).ready(function() {
    $("#example1").DataTable();
});
</script>    
           

   <script type="text/javascript">
$(document).ready(function(){

  Chart = Highcharts.stockChart('pendapatan', {
    Chart :{
renderTo: 'pendapatan',
    rangeSelector: {
      selected: 1
    },
},
    title: {
      text: 'PENDAPATAN'
    },

    series: [{
      name: 'Total pendapatan:',
      data: [<?= join($new_data,",") ?>],
       marker: {
        enabled: true,
        radius: 3
      },
      shadow: true,
      tooltip: {
        valueDecimals: 2
      }
    }]
  });
});
</script>
    

</body>
</html>