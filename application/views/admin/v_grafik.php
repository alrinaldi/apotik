<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lumino - Dashboard</title>
    <link href="<?php echo base_url().'desain/lumino/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url().'desain/lumino/css/font-awesome.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'desain/lumino/css/datepicker3.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'desain/lumino/css/style.css'?>" rel="stylesheet">
       <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
    <!--Custom Font-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
   
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <?php
                    $no=0;
                    foreach ($data as $i) :
                    
                       //$id=$i['id_supplier'];
                        $namai[]= $i->nama;
                       $id_obat[]=$i->id_obat;
                       $stok[]=(float)$i->stok;
                       
                    ?>
                <?php endforeach;?>

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
       <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                         Chart pembelian
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
                            <canvas class="main-chart" id="bar-chart" height="200" width="600" ></canvas>
                        </div>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
                 
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



    <script>
    window.onload = function () {

            var lineChart = {
                labels : <?php echo json_encode($namai);?>,
                datasets :[
{

fillColor : "rgba(48, 164, 255, 0.2)",
                strokeColor : "rgba(48, 164, 255, 0.8)",
                highlightFill : "rgba(48, 164, 255, 0.75)",
                highlightStroke : "rgba(48, 164, 255, 1)",
data : <?php echo json_encode($stok);?>

}
              
           ]
        }

    var chart1 =  document.getElementById("bar-chart").getContext("2d");
        window.myLine = new Chart(chart1).Bar(lineChart, {
    responsive: true,
    scaleLineColor: "rgba(0,0,0,.2)",
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleFontColor: "#c5c7cc"
    });
        
   }
    </script>
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
    $('#example').DataTable();
} );
    </script>
        
        <?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>
    
    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: " Supplier Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Suppier Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>