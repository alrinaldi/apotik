<!DOCTYPE html>
<html>
<head>
    <?php
$this->load->view('admin/v_header');

?>
   
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

  

                     <?php
                     $year = date('Y');
                 
                    $no=0;
                    foreach ($data3 as $k) :
                    
                       //$id=$i['id_supplier'];
                        $tgl_pengeluaran[]= $k->tgl;
                       
                       $pngn[]=(float)$k->pengeluaran;
                       
                    ?>
                <?php endforeach;?>
      <?php
                     $year = date('Y');
                    $no=0;
                    foreach ($data4 as $l) :
                    
                       //$id=$i['id_supplier'];
                        $tgl_pengeluaran1[]= $l->tgl;
                       
                       $pngnlrn[]=(float)$l->pengeluaran;
                       
                    ?>
                <?php endforeach;?>
                     <?php
                  
                    foreach ($data2 as $m) :
                    
                       //$id=$i['id_supplier'];
                        $tgl[]= $m->tgl;
                       
                       $pdpt[]=(float)$m->pendapatan;
                       
                    ?>
                    <?php ; endforeach;?>
        

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
       <div class="panel panel-primary">
                    <div class="panel-heading">Hasil Penjualan
                                            <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
                            <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Grafik Penjualan Tahun <?PHP echo $year;?>
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
                        <div class="canvas-wrapper">
                            <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
        
            <div class="col-md-12">
           

               
                           <table id="example1" class="table table-striped" style="font-size:12px;">
            <thead class="table">
            <tr class="table">

              
                <th>Bulan</th>
                <th>Penjualan</th>
                <th>Pengeluaran</th>
                <th>Pendapatan</th>
            </tr>
            </thead>
            <tbody>
        
   <?php

$hasil = array();
$keluar = array();
for ($i=0; $i <$jmlh ; $i++) {
 $hasil[$i] = $pdpt[$i]-($pngnlrn[$i]+$pngn[$i]);
    # code...
 $keluar[] = $pngnlrn[$i]+$pngn[$i];

?>
          <tr class="table">
                
                <td><?php echo $tgl_pengeluaran1[$i];?></td>
                <td ><?php echo $pdpt[$i];?></td>
                  <td ><?php echo $pngn[$i]+$pngnlrn[$i];?></td>
                    <td><?php echo $hasil[$i];?></td>
                
       
            </tr>
           
            

             <?php }
             ?>
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
           

    <script>
    window.onload = function () {

            var lineChart = {
                labels : <?php echo json_encode($tgl);?>,

                datasets :[
{

labels : "pendapatan",
                fillColor : "rgba(220,220,220,0.2)",
                strokeColor : "rgba(220,220,220,1)",
                pointColor : "rgba(220,220,220,1)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "#fff",
                pointHighlightStroke : "rgba(220,220,220,1)",
data : <?php echo json_encode($keluar);?>

},
{
               labels:"PENGELUARAN",
                fillColor : "rgba(48, 164, 255, 0.2)",
                strokeColor : "rgba(48, 164, 255, 1)",
                pointColor : "rgba(48, 164, 255, 1)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "#fff",
                pointHighlightStroke : "rgba(48, 164, 255, 1)",
data : <?php echo json_encode($pdpt);?>
            }
              
           ]
        }
var chart1 = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(chart1).Line(lineChart, {
    responsive: true,
    scaleLineColor: "rgba(0,0,0,.2)",
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleFontColor: "#c5c7cc"
    });
   }
    </script>
    

</body>
</html>