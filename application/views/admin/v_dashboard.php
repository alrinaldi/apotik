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

  </head>
<body>
<?php

 $td = date('Y-m-d');
           // $lw = $td - 7;
  $lw = date('Y-m-d', strtotime("-1 week"));
    $lw1 = date('Y-m-d', strtotime("-4 week"));
            //echo $lw;  
            $year = date('Y'); 
            $month = date('M');

                 $pjh=$this->db->query("SELECT count(id_str) as jmlh from penjualan where tgl = '$td' ");
        foreach ($pjh->result_array() as $x) {
                    # code...
                //$query->result_array();
                    # code...
                
                      $jumlah = $x['jmlh'];

                # code...
            
            }
                          $pjm=$this->db->query("SELECT count(id_str) as jmlh from penjualan where tgl <= '$td' AND tgl >= '$lw'");
        foreach ($pjm->result_array() as $x) {
                    # code...
                //$query->result_array();
                    # code...
                
                      $jmlm = $x['jmlh'];

                # code...
            
            }

                        $pjb=$this->db->query("SELECT count(id_str) as jmlh from penjualan where tgl <= '$td' AND tgl >= '$lw1' ");
        foreach ($pjb->result_array() as $x) {
                    # code...
                //$query->result_array();
                    # code...
                
                      $jml = $x['jmlh'];

                # code...
            
            }              $pjt=$this->db->query("SELECT count(kode) as jmlh from penjualan where year(tgl) = '$year' ");
        foreach ($pjt->result_array() as $x) {
                    # code...
                //$query->result_array();
                    # code...
                
                      $jmlt = $x['jmlh'];

                # code...
            
            }



    $nama_p  = $this->db->query("SELECT nama FROM user where username = '$username'");
                foreach ($nama_p->result_array() as $x) {
                    # code...
                //$query->result_array();
                    # code...
                
                      $nama_login = $x['nama'];

                # code...
            
            }        

           
            //$page = "home";       
?>

<?php
$pdpt = array();
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
//header("Content-type: application/json");

foreach ($pendapatan->result_array() as $x) {

extract($x);
$pdpt[] = array(
             'tgl' => strtotime($x['tgl'])*1000,
            'hasil' => $x['pendapatan']
           );
           // header('Content-Type: application/json');
    //$pdpt[] = "[$tgl,$hasil]";
     //echo $res="[".$row['timestamp'] . ',' . $row['temperature'] ."]";
    # code...

}
aasort($pdpt,'tgl');

  //$new_data = array();
        foreach ($pdpt as $record) {
            
        $tglend = $record['tgl'];
        $hasilend =$record['hasil'];

        $new_data[] = "[$tglend,$hasilend]";

        }
?>
 

                 <?php
                
                    foreach ($pjnthn as $i) :
                    
                       //$id=$i['id_supplier'];
                        $nama_obatthn[]= $i->nama;
                       //$id_obat[]=$i->id_obat;
                       $totalthn[]=(float)$i->totaly;
                       
                    ?>
                <?php endforeach;?>

<?php
                
                    foreach ($pjn as $i) :
                    
                       //$id=$i['id_supplier'];
                        $nama_obat[]= $i->nama;
                       //$id_obat[]=$i->id_obat;
                       $totalt[]=(float)$i->total;
                       
                    ?>
                <?php endforeach;?>


                       <?php
                
                    foreach ($fsn_bebas as $i) :
                    
                       //$id=$i['id_supplier'];
                        $fsn[]= $i->final_fsn;
                       //$id_obat[]=$i->id_obat;
                       $totalfsn[]=(float)$i->total;

                       
                    ?>
                <?php endforeach;?>

                   <?php
                $arrayPie = array();
                    foreach ($fsn_bebas1->result_array() as $X) :
                    
                       //$id=$i['id_supplier'];
                        $fsn1= $X['final_fsn'];
                       //$id_obat[]=$i->id_obat;
                       $totalfsn1= $X['total'];

                       $hasil1[] = "[$fsn1,$totalfsn1]";
                        $arrayPie[] ="["."'".$fsn1."'".",".$totalfsn1."]";
                       
                    ?>
                <?php endforeach;?>

                         <?php
                $hasilkeras = array();
                    foreach ($fsn_keras->result_array() as $i) :
                    
                       //$id=$i['id_supplier'];
                        $nama_fsn = $i['nama'];
                        $fsnkeras= $i['final_fsn'];
                       //$id_obat[]=$i->id_obat;
                       $total_keras=(float)$i['total'];
                       $hasilkeras[] = "["."'".$fsnkeras."'".",".$total_keras."]";
                       
                    ?>
                <?php endforeach;?>


                           <?php
                $hasilsedang = array();
                    foreach ($sedang->result_array() as $i) :
                    
                       //$id=$i['id_supplier'];
                        $nama_fsns = $i['nama'];
                        $fsnsedang= $i['final_fsn'];
                       //$id_obat[]=$i->id_obat;
                       $total_sedang=(float)$i['total'];
                       $hasilsedang[] = "["."'".$fsnsedang."'".",".$total_sedang."]";
                       
                    ?>
                <?php endforeach;?>

                     
<?php
$this->load->view('admin/v_notif');
?>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="<?php echo base_url().'assets/images/user.png'?>" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name" style="color: #fff;"><?php echo $nama_login;?></div>
               
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
      
    <?php $x['page'] = "home";
    $this->load->view('admin/v_nav',$x);?>
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <?php
        $td = date('Y-m-d');
        $lw = date('Y-m-d', strtotime("-1 week"));
        
            $q1 = $this->db->query("SELECT obat.nama,penjualan.qty,penjualan.total FROM obat join penjualan on obat.id = penjualan.id_obat where penjualan.tgl BETWEEN '$lw' AND '$td' ");
                foreach ($q1->result_array() as $x) {
                    # code...
                //$query->result_array();
                    # code...
                        $nama1= $x['nama'];
                     // $id = $x['kode'];
                      $tl = $x['total'];

            
            }

           ?>
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active"><?php

print_r(current_url());?></li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div><!--/.row-->
        <?php echo $this->session->flashdata('msg');?>
         <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                     Perkiraan Penambahan stok
                        <ul class="pull-right panel-settings panel-button-tab-right">
                            <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                <em class="fa fa-cogs"></em>
                            </a>
                              
                            </li>
                        </ul>
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
   
   <?php if($level == "Pemilik"){?>
                                           <a class ="btn btn-primary btn-flat" href="<?php echo base_url('admin/fsn/movingavr')?>">Lihat Detail</a><?php } else{

                                                }?>
</br>
                           <table id="" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
                              
                   
                    <th>Nama</th>
                    <th>perkiraan</th>
                
                   
                </tr>
                </thead>
                <tbody>
                <?php
                        
                    foreach ($sma->result_array() as $i) :
                      
                       $namaavg=$i['nama'];
                       $hasilavg=$i['hasil'];
                       $stokvg = $i['stok'];
                       
                    ?>
                <tr>
                  
                  <td><?php echo $namaavg;?></td>
                  <td><?php echo $hasilavg;?></td>
                 
                
                </tr>
                <?php endforeach;?>
                </tbody>
              </table>
                        </div>
                    </div>
          
                </div>
                <div class="col-md-6">
                          <div class="panel panel-primary">
          <div class="panel-heading">
                        Total Transaksi
                        </div>
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-6 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
                            <div class="large"><?php echo $jumlah ?></div>
                            <div class="text-muted">Penjualan Hari Ini</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-6 no-padding">
                    <div class="panel panel-blue panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-orange"></em>
                            <div class="large"><?php echo $jmlm?></div>
                            <div class="text-muted">Penjualan Minggu Ini</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-6 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-teal"></em>
                            <div class="large"><?php echo $jml?></div>
                            <div class="text-muted">Penjualan Bulan Ini</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-6 no-padding">
                    <div class="panel panel-red panel-widget ">
                        <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-red"></em>
                            <div class="large"><?php echo $jmlt?></div>
                            <div class="text-muted">Penjualan Tahun Ini </div>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
            </div>
            </div>
            </div>

<div class="row">
        <div class="col-md-12">
              <div class="col-xs-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        FSN
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
                        <div class="panel-body">
                         <div id="container"></div>
                                
                        </div>
                                <form mthod="get" action="<?php echo base_url().'admin/fsn/lihat_detail'?>">
                           <?php
                $gol = 'Bebas';
               ?>
                        <input name ="gol" type="hidden" value="<?php echo $gol; ?>">
                        <button type="submit" class="btn btn-primary"> Lihat Detail</button>
                        </form>
                    </div>
                </div>
            </div>

               <div class="col-xs-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        FSN
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
                        <div class="panel-body">
                         <div id="fsnkeras1"></div>
                                
                        </div>
                                <form mthod="get" action="<?php echo base_url().'admin/fsn/lihat_detail'?>">
                           <?php
                $gol = 'Keras';
               ?>
                        <input name ="gol" type="hidden" value="<?php echo $gol; ?>">
                        <button type="submit" class="btn btn-primary"> Lihat Detail</button>
                        </form>
                    </div>
                </div>
            </div>



               <div class="col-xs-6 col-md-4">
            
                <div class="panel panel-default">
                    <div class="panel-heading">
                        FSN
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
                        <div class="panel-body">
                         <div id="fsnsedang"></div>
                                
                        </div>
                        <form mthod="get" action="<?php echo base_url().'admin/fsn/lihat_detail'?>">
                           <?php
                $gol = 'Bebas Terbatas';
               ?>
                        <input name ="gol" type="hidden" value="<?php echo $gol; ?>">
                        <button type="submit" class="btn btn-primary"> Lihat Detail</button>
                        </form>
                    </div>
                </div>
            </div>

            </div>
            </div>

 
   
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        10 Penjualan Terbanyak Bulan Ini
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
                         <div id="grafik-total"></div>
                                
                        </div>
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        PENJUALAN
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


        

                    <!-- <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><?php
                   //  echo date('Y-m-d H:i:s');?>
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
                         <div id="grafik-totaly"></div>
                                
                        </div>
                    </div>
                </div>
            </div> -->
     
     
        
 
      
    </div>  <!--/.main-->
    
    <script src="<?php echo base_url().'desain/lumino/js/jquery-1.11.1.min.js'?>"></script>
    <script src="<?php echo base_url().'desain/lumino/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'desain/lumino/js/chart.min.js'?>"></script>
    <script src="<?php echo base_url().'desain/lumino/js/chart-data.js'?>"></script>
    <script src="<?php echo base_url().'desain/lumino/js/easypiechart.js'?>"></script>
    <script src="<?php echo base_url().'desain/lumino/js/easypiechart-data.js'?>"></script>
    <script src="<?php echo base_url().'desain/lumino/js/bootstrap-datepicker.js'?>"></script>
    <script src="<?php echo base_url().'assets/highcharts/highcharts.js'?>"></script>
     <script src="<?php echo base_url().'desain/lumino/js/custom.js'?>"></script>
         <script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>

     <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
   <script type="text/javascript">
       $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>

<script type="text/javascript">
    Highcharts.setOptions({
  colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
    return {
      radialGradient: {
        cx: 0.5,
        cy: 0.3,
        r: 0.7
      },
      stops: [
        [0, color],
        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
      ]
    };
  })
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
    <script>
     Chart =  Highcharts.chart('grafik-total', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Grafik 10 Besar Obat-obatan'
                    },
                    subtitle: {
                        text: 'Bulan <?=$month?>'
                    },
                    xAxis: {
                        type: 'category',
                        categories: <?=json_encode($nama_obat);?>,
                        title: {
                            text: 'Nama Obat'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Total Penjualan'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y} obat'
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span><b>{point.y}</b> obat<br/>'
                    },

                    series: [{
                            name: 'Jumlah Penjualan',
                            colorByPoint: true,
                            data: <?=json_encode($totalt);?>
                        }]
                });
    </script>

    <script>
      Highcharts.chart('grafik-totaly', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Grafik 10 Besar Obat-obatan'
                    },
                    subtitle: {
                        text: 'Tahun <?=$year?>'
                    },
                    xAxis: {
                        type: 'category',
                        categories: <?=json_encode($nama_obatthn);?>,
                        title: {
                            text: 'Nama Obat'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Total Penjualan'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y} obat'
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span><b>{point.y}</b> obat<br/>'
                    },

                    series: [{
                            name: 'Jumlah Penjualan',
                            colorByPoint: true,
                            data: <?=json_encode($totalthn);?>
                        }]
                });
    </script>

        <script>
       /*Highcharts.chart('grafik-fsn', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Grafik FSN GOLONGAN OBAT BEBAS'
                    },
                    subtitle: {
                        text: 'Tahun <?=$td?>'
                    },
                    xAxis: {
                        type: 'category',
                        categories: <?=($fsn);?>,
                        title: {
                            text: 'Clasification'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Total Clasification'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                
                                format: '{point.y} obat'

                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span><b>{point.y}</b> obat<br/>'
                    },

                    series: [{
                            name: 'Jumlah klasifikasi',
                            colorByPoint: true,
                            data: <?=($totalfsn);?>

                        }]
                });/*
    </script>

           <script>
       /*Highcharts.chart('grafik-fsnkeras', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Grafik FSN GOLONGAN OBAT KERAS'
                    },
                    subtitle: {
                        text: 'Tahun <?=$td?>'
                    },
                    xAxis: {
                        type: 'category',
                        categories: <?=($fsnkeras);?>,
                        title: {
                            text: 'Clasification'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Total Clasification'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y} obat '
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span><b>{point.y}</b> obat<br/>'
                    },

                    series: [{
                            name: 'Jumlah klasifikasi',
                            colorByPoint: true,
                            data: <?=($total_keras);?>
                        }]
                });*/
    </script>
        
                <script>
      // Highcharts.chart('grafik-fsnsedang', {
      //               chart: {
      //                   type: 'column'
      //               },
      //               title: {
      //                   text: 'Grafik FSN GOLONGAN OBAT BEBAS TERBATAS'
      //               },
      //               subtitle: {
      //                   text: 'Tahun <?=$td?>'
      //               },
      //               xAxis: {
      //                   type: 'category',
      //                   categories: <?=json_encode($fsnsedang);?>,
      //                   title: {
      //                       text: 'Clasification'
      //                   }
      //               },
      //               yAxis: {
      //                   title: {
      //                       text: 'Total Clasification'
      //                   }
      //               },
      //               legend: {
      //                   enabled: false
      //               },
      //               plotOptions: {
      //                   series: {
      //                       borderWidth: 0,
      //                       dataLabels: {
      //                           enabled: true,
      //                           format: '{point.y} obat '
      //                       }
      //                   }
      //               },

      //               tooltip: {
      //                   headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      //                   pointFormat: '<span style="color:{point.color}">{point.name}</span><b>{point.y}</b> obat<br/>'
      //               },

      //               series: [{
      //                       name: 'Jumlah klasifikasi',
      //                       colorByPoint: true,

      //                       data: <?=json_encode($total_sedang);?>
      //                                                }]
      //           });
    </script>

    <script type="text/javascript">

// Radialize the colors


// Build the chart
Highcharts.chart('container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'FSN GOLONGAN BEBAS'
  },

  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b> MOVING' ,
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        },
        connectorColor: 'silver'
      }
    }
  },
  series: [{
    
     type: 'pie',
          name: 'TOTAL',
          data: [<?= join($arrayPie,",") ?>],
  }]
});
</script>
        
           <script type="text/javascript">

// Radialize the colors


// Build the chart
Highcharts.chart('fsnkeras1', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'FSN GOLONGAN OBAT KERAS'
  },
       plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b> MOVING' ,
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        },
        connectorColor: 'silver'
      }
    }
  },
  series: [{
    
     type: 'pie',
          name: 'TOTAL ',
          data: [<?= join($hasilkeras,",") ?>],
  }]
});


Highcharts.chart('fsnsedang', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'FSN GOLONGAN OBAT BEBAS TERBATAS'
  },
       plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b> MOVING' ,
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        },
        connectorColor: 'silver'
      }
    }
  },
  series: [{
    
     type: 'pie',
          name: 'TOTAL ',
          data: [<?= join($hasilsedang,",") ?>],
  }]
});
</script>
        


        
</body>
</html>