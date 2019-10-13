<!DOCTYPE html>
<html>
<head>
    <?php
$this->load->view('admin/v_header');

?>
</head>
<body>
   <?php
  $query=$this->db->query("SELECT count(id) as jmlh from obat where type ='botol' and stok <= 5");
        foreach ($query->result_array() as $x) {
                    # code...
                //$query->result_array();
                    # code...
                
                      $qty = $x['jmlh'];

                # code...
            
            }


?>
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
                <li class="active">Dashboard</li>
            </ol>
        </div><!--/.row-->
      <?php echo $this->session->flashdata('msg');?>


      <div class="row">
       <div class="col-xs-6 col-md-4">
      <div class="panel panel-default">
      <div class="panel-body">
     <form action="<?php echo base_url().'admin/penjualan/penjualan_filter'?>" method='post'>

                     <div class="form-group">
             <label class=" form-control-label">Pilih filter tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>

           <input type ="date" class="tanggal" name="tanggal">
           </div>

           </div>


       <?php
     
$week1=date('Y-m-d', strtotime("-1 week"));
$week2=date('Y-m-d', strtotime("-2 week"));

$week3=date('Y-m-d', strtotime("-3 week"));

$week4=date('Y-m-d', strtotime("-4 week"));

?>
          <div class="form-group">
                                        <label>Filter Periode</label>
                                        <select class="form-control" name="filter" >
                                        <option value="">Kosong</option>
                                            <option value="<?php echo $week1; ?>">1 Minggu</option>
                                            <option value="<?php echo $week2?>">2 Minggu </option>
                                            <<option value="<?php echo $week3?>">3 Minggu </option>
                                            <option value="<?php echo $week4?>">4 Minggu </option>
                                            <option></option>
                                        </select>
                                    </div>

           <button class="btn btn-primary">Submit</button>
           </form>
           </div>
      </div>
      </div>
      </div>
        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>
        </div><!--/.row-->
        <main>
       
       <div class="panel panel-primary">
                    <div class="panel-heading">Laporan penjualan
                                            <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
                                            <form action="<?php echo base_url().'admin/excel/export_excel'?>" method='post'>
                       <?php
        if(empty($tgl)){
        $fl = $filter; 
           $date =$date;
        ?>
        <input type="hidden" name="fl" value="<?php echo$fl;?>">
         <input type="hidden" name="date" value="<?php echo $date;?>">
        <?php
       }else if(empty($filter)){
        $tgl = $tgl;
     
        ?>
             <input type="hidden" name="tgl" value="<?php echo $tgl;?>">
           
              <?php
       }
       ?>
                                          <button class="btn btn-primary">Export Excel</button>
                                            </form>
                    <br>
                    <div class="panel-body">

            <div class="col-md-12">
           
               

                           <table id="example1" class="table table-striped" style="font-size:12px;">
            <thead class="table">
            <tr class="table">
                <th>No.</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Total</th>
                
            </tr>
            </thead>
            <tbody id="tableHitung">
            <?php
            $no=0;
            foreach ($pjf->result_array() as $i):
                $no++;
                $kode = $i['kode'];
                $nama = $i['nama'];
                $tgl = $i['tgl'];
                $total = $i['total'];
                $qty = $i['qty'];
                
                //$s = mysql_fetch_array(mysql_query("SELECT stok from tiket,event where event.id = tiket.id_event"));
            ?>
          <tr class="table">
                <td class="table_check"><?php echo $no;?></td>
                <td><?php echo $kode;?></td>
                <td class="table_title"><?php echo $nama;?></td>
                <td class="table_title"><?php echo $tgl;?></td>
                <td><?php echo $qty;?></td>
                <td><?php echo $total?></td>
        
     
            </tr>
           
            

             <?php endforeach;?>
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

</script>    
           <script type="text/javascript">

            function calc(i){
        var hargaT = $("#harga"+i).val();
        var jmlhT   = $("#jmlh"+i).val();
        var hasil = hargaT * jmlhT;
        $("#total"+i).val(hasil);
         console.log(hasil);
    };
     function del(id){
        $("#list"+id).remove();
        id--;
        console.log(id);
        //$("#i"+id).remove();
       // i--;
        if ($('#hitung1').children().length==0){
            $('#send').hide();
            $('#tnt').hide();
           // console.log(i)
            console.log('sds');
        }
    };
    
       $(document).ready(function() {
    var table = $("#example1").DataTable();
    var i=1;
    $('#example1 tbody').on('click','tr a#hitung',
    function (){
        $("#scs").html("<br><button type='submit' class='btn btn-primary'>Submit Button</button>");
       // $("#tot").html("<br> <input type='text' disabled id='tnt'>")
    var data = table.row(this.closest('tr')).data();
    var id = data[1];
    var nama = data[2];
    var harga = data[9];
    //console.log(nama);
    $("#hitung1").append("<div id='list"+i+"'><input type='hidden' name='i' value="+i+" id='i"+i+"'><input type='hidden' id='id_obat"+i+"' name='id_obat"+i+"' value="+id+"><h4>"+nama+"</h4><input type='text' disabled id='harga"+i+"'>&emsp;<input type='text' name='jmlh"+i+"' id='jmlh"+i+"'>&emsp;<a  onclick='calc("+i+")' class='btn btn-primary btn-flat' id='ceks"+i+"' href='#'>ok</a>&emsp;<a  onclick='del("+i+")' class='btn btn-danger btn-flat' id='cek"+i+"' href='#'>del</a><br><input type='text' name='total"+i+"' id='total"+i+"' disabled><br></div>");
    $("#id_obat"+i).val(id);
    $("#nama"+i).val(nama);
    $("#harga"+i).val(harga);
     //$("#total"+id).val(hasil);
    // $("#cek"+i).click(function()
    // {
    //     var hargaT = $("#harga"+i).val();
    //     var jmlhT   = $("#jmlh"+i).val();
    //     var hasil = hargaT * jmlhT;
    //     $("#total"+i).val(hasil);
     
    // });
    i++;

});

   

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
                    text: "Agenda berhasil di update",
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