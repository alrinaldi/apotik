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


foreach ($data2->result_array() as $x) {

extract($x);
$pdpt[] = array(
             'tgl' => strtotime($x['tgl'])*1000,
            'hasil' => $x['png']
           );
}


//echo $hasil2;

aasort($pdpt,'tgl');


  //$new_data = array();
    
        
       foreach ($pdpt as $record){
       
                $tglend = $record['tgl'];
       $hasilend =$record['hasil']; 
      $tglcek = strtotime($tglend)/1000;

        $new_data[] = "[$tglend,$hasilend]";

}
    

        

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
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>

    <?php 
    $this->load->view('admin/v_nav');?>
        
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div><!--/.row-->
      
                             <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
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
                                
                        </div>
                    </div>
                </div>
            </div>
      
         <div class="panel panel-success">
                    <div class="panel-heading">Hasil Penjualan
                                            <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
            <div class="col-md-12">
                           <table id="example1" class="table table-striped" style="font-size:12px;">
            <thead class="table">
            <tr class="table">
                <th>No.</th>
                <th>tanggal</th>
                <th>Pembelian total</th>
              
              
            </tr>
            </thead>
            <tbody>
       <?php
       $no=0;
        foreach ($data2->result_array() as $x):
          $tglcek = $x['tgl'];
          $hs= $x['png'];
   ?>
        
          <tr class="table">
                <td class="table_check"><?php echo $no;?></td>
                <td><?php echo date('Y-M-d',strtotime($tglcek));?></td>
                <td class="table_title"><?php echo $hs;?></td>
                  
                
       
            </tr>
           
            

             <?php $no++; endforeach;?>
</tbody>
        </table>
                             
                 
        </div>
    
</div>
</div>
  

        

     
       
?>              
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
      text: 'PENJUALAN'
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