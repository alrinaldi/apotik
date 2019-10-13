<!DOCTYPE html>
<html>
<head>
    <?php
$this->load->view('admin/v_header');
$p = date('M-Y');
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
    
            $x['page'] = "obat";
    $this->load->view('admin/v_nav',$x);?>
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div><!--/.row-->
      <?php echo $this->session->flashdata('msg');?>
        <div class="row">
            <div class="col-lg-12">
                
            </div>
        </div><!--/.row-->
        <main>
       <div class="panel panel-primary">
                    <div class="panel-heading">Perencanaan Stok periode <?PHP echo $p; ?>
                                            <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
                                            </br>
                                                                </br>
                    <div class="panel-body">

            <div class="col-md-12">
           
                           <table id="example1" class="table table-striped" style="font-size:12px;">
            <thead class="table">
            <tr class="table">
                <th>No.</th>
              
                <th>Nama</th>
                <th>Type</th>
                <th>gol</th>
                <th>Stok</th>
                  <th>penjualan</th>
                <th>Penambahan stok periode selanjutnya</th>
            
              
            </tr>
            </thead>
            <tbody id="tableHitung">
            <?php
            $datenow1 = date('Y-m-01');
            $datenow = date('Y-m-d');
            $bln = date('m');  
           $date1 = date('Y-m-01',strtotime("-2 month"));
           $date6 = date('Y-m-01',strtotime("-6 month"));
            $date3 = date('Y-m-t');
          $date4 = date('Y-m-01',strtotime("-31 day"));
              $date2 = date('Y-m-t',strtotime("-1 month"));
$stat = array();
$nama = array();
    //$jmlh = $cekobt->num_rows();
 $q10=$this->db->query("SELECT obat.id as idb,obat.nama,obat.gol,obat.type,obat.stok as qty,fsn.final_fsn from fsn join obat on obat.id = fsn.id_obat where fsn.final_fsn = 'F'");
if($q10->num_rows()>0){
            foreach ($q10 -> result() as $n) {
                $nama[] = $n->nama;
                $gol[] = $n->gol;
                $qty[] = $n->qty;
                $type[] = $n->type;
                $id[] = $n->idb;
                # code...
            }
        }
        $jmlhobt = $q10->num_rows(); 
        $ma = array();
         $stok[]=array();
         $at[]=array();
         $hslat= array();
         $cek = array();
        // foreach ($cekobt as $n){
        //         $nama[] = $n->nama;
        //         $gol[] = $n->gol;
        //         $qty[] = $n->qty;
        //         $type[] = $n->type;
        //         $id[] = $n->id;
        //     # code...
        // }

        for($i=0;$i<$jmlhobt; $i++) {
            $id[$i];    
           
    $cekma[$i] = $this->db->query("SELECT SUM(qty) as qty1 from penjualan where id_obat = '$id[$i]' and tgl >= '$date1' and tgl <= '$date3'");
            foreach ($cekma[$i]->result_array() as $m) {
               echo $stok[$i] = $m['qty1'];

                # code...
            }
              $cekma6[$i] = $this->db->query("SELECT SUM(qty) as qty6 from penjualan where id_obat = '$id[$i]' and tgl >= '$date6' and tgl <= '$date2'");
            foreach ($cekma6[$i]->result_array() as $m) {
                $stok6[$i] = $m['qty6'];

                # code...
            }
            //echo $stok[$i];
          $ma[$i] = $stok[$i]/3;

            $ma6[$i] = $stok6[$i]/6;

            $cekat[$i] = $this->db->query("SELECT SUM(qty) as qty2 from penjualan where id_obat = '$id[$i]' and tgl >= '$date4' and tgl <= '$date3'");
            foreach ($cekat[$i]->result_array() as $k) {
                $at[$i] = $k['qty2'];

                # code...
            }
            //print_r($at[$i]);
           $at[$i];
            $hslat[] = ($at[$i]-$ma[$i])/1;



            $cekmvg[$i]=$this->db->query("SELECT * FROM movingavg where tgl = '$datenow1' and id_obat = '$id[$i]'");
            //$cekmvg[$i]->num_rows();
            if($cekmvg[$i]->num_rows()>0){
            foreach ($cekmvg[$i]->result_array()as $x) {
                # code...
                $hasil[$i] = $x['hasil'];
                $tglmvg[$i]  = $x['tgl'];
                $id_obatmvg[$i] = $x['id_obat'];

                # code...
            }
           }else{
            $id_obatmvg[$i]=0;
           }
        /**/
//print_r($cekmvg);
    if($id_obatmvg[$i]==0){
        $insert = $this->db->query("INSERT INTO movingavg (hasil,tgl,id_obat) values('$ma[$i]','$datenow1','$id[$i]')");
    }else{
        $update = $this->db->query("UPDATE  movingavg set hasil = '$ma[$i]',tgl = '$datenow1',id_obat='$id[$i]' where id_obat = '$id[$i]' and tgl='$datenow1' ");
    }

            // print_r($stok[$i]);
            //$x['ma'] = $ma[$i];
}
            # code...
       
        for($i=0;$i<$jmlhobt; $i++) {
               $hslpjn[$i]=$this->db->query("SELECT IFNULL(SUM(qty),0) as pendapatan  from penjualan where id_obat = '$id[$i]' and Month(tgl) = '$bln' GROUP BY MONTH(tgl)");
               foreach ($hslpjn[$i]->result_array() as $k) {
                   # code... 
               
                $pendapatan[$i] = $k['pendapatan'];
                         }
            ?>

          <tr class="table">
          <td><?php echo $i;?></td>
                <td class="table_check"><?php echo $nama[$i];?></td>
                
                <td class="table_title"><?php echo $type[$i];?></td>
                <td class="table_title"><?php echo $gol[$i];?></td>
                <td><?php echo $qty[$i]?></td>
                <td><?php if(empty($pendapatan[$i])){
                    $pendapatan[$i] = 0;
                }
                 echo $pendapatan[$i]
                 ?></td>
                <td><?php echo round($ma[$i]);?></td>

           
      
            </tr>
           
            

             <?php }?>
</tbody>
        </table>
                 
        </div>
        </div>

  

        </div>
       </main>
       
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
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>

    <script>
        window.onload = function () {
    var chart1 = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(chart1).Line(lineChartData, {
    responsive: true,
    scaleLineColor: "rgba(0,0,0,.2)",
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleFontColor: "#c5c7cc"
    });
};
    </script>
    <script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose:true
                });
            });
        </script>

<script type="text/javascript">
       $(document).ready(function() {
    $("#example1").DataTable();
});
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
                    text: "Agenda Berhasil disimpan ke database.",
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
                    text: "obat berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
           <?php elseif($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Obat gagal di update",
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
                    text: "Agenda Berhasil dihapus.",
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