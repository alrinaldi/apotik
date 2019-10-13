<!DOCTYPE html>
<html>
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
                <li class="active">Dashboard</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
              
            </div>
        </div><!--/.row-->
       <div class="panel panel-primary">
                    <div class="panel-heading">Daftar Obat
                                            <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
            <div class="col-md-12">
           
                           <table id="example1" class="table table-striped" style="font-size:12px;">
            <thead class="table">
            <tr class="table">
                <th>No.</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Gol</th>
                <th>Type</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Tanggal Beli</th>
                <th>Supplier</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Pilih</th>
            </tr>
            </thead>
            <tbody id="tableHitung">
            <?php
            $no=0;
            foreach ($obat->result_array() as $i):
                $no++;
                $id = $i['id'];
                $nama = $i['nama'];
                $gol = $i['gol'];
                $type = $i['type'];
                $tgl_k = $i['tgl_kadaluarsa'];
                $tgl_b = $i['tgl'];
                $stok = $i['stok'];
                $hrgb = $i['harga_beli'];
                $id_supplier = $i['id_supplier'];
                
                  $query=$this->db->query("SELECT * FROM supplier where id_supplier ='$id_supplier'");
                foreach ($query->result_array() as $x) {
                    # code...
                //$query->result_array();
                    # code...
                
                      $nama_s = $x['nama'];

                # code...
            
            }
                //$s = mysql_fetch_array(mysql_query("SELECT stok from tiket,event where event.id = tiket.id_event"));
            ?>
          <tr class="table">
                <td class="table_check"><?php echo $no;?></td>
                <td><?php echo$id;?></td>
                <td class="table_title"><?php echo $nama;?></td>
                <td class="table_title"><?php echo $gol;?></td>
                <td><?php echo $type;?></td>
                <td><?php echo $tgl_k;?></td>
                <td><?php echo $tgl_b;?></td>
                 <td><?php echo $nama_s;?></td>
                <td><?php echo $stok;?></td>
                 <td><?php echo $hrgb;?></td>
        
        <td>            
                     <?php  
                     if($stok <= 0){
                        ?>
                        <p> stok abis</p>
                        <?php }else{
                     ?>
                         <a  id="hitung" class="btn" href="#"><span class=" fas fa-cart-plus"></span></a>
                
<?php }?>
                </td>
            </tr>
           
            

             <?php endforeach;?>
</tbody>
        </table>
                 
        </div>
        </div>

  

        </div>
        <form action="<?php echo base_url().'index.php/admin/penjualan/simpan_penjualan';?>" method="post">
   <div class="panel panel-primary">
        <div class="panel-heading"> Kasir
                                            <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
        <div class = "col-md-12">
                <div  id="hitung1">

         
         </div>
         <div  id="tot">

         
<br>
         </div>
         <div id ="nama"></div>
         <br><div  id="scs">

         
<br>
         </div>
         </div>
         </div>
          </div>
          </form>
    
   
    
        
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
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>

<script type="text/javascript">

</script>    
           <script type="text/javascript">

            var totalAkhir=0 ;

            function calc(i){
        var hargaT = $("#harga"+i).val();
        var jmlhT   = $("#jmlh"+i).val();
        var hasil = hargaT * jmlhT;

        totalAkhir = totalAkhir+hasil;
       
        $("#tnt").val(totalAkhir);

        $("#total"+i).val(hasil);
        
        // console.log(hasil);
    };
     function del(id){
        $("#list"+id).remove();
        id--;
        console.log(id);
        //$("#i"+id).remove();
        //i--;
        if ($('#hitung1').children().length==0){
            $('#send').hide();
            $('#tnt').hide();
            $("#scs").hide();
            $('#tot').hide();
            $("#nama").hide();
           // console.log(i)
            //console.log(i);
        }
    };
    
       $(document).ready(function() {
    var table = $("#example1").DataTable();
    var i=1;
    var batas = 0;
    $('#example1 tbody').on('click','tr a#hitung',
    function (){
        
        batas = batas+1;

        $("#nama").html("</br>Nama&emsp;&emsp;:&emsp;<input type='text' name ='nama'>");
        $("#scs").html("<br><button type='submit' class='btn btn-primary'>Submit Button</button>");
       $("#tot").html("<br>Jumlah&emsp;:&emsp;<input type='text' name = 'hasilkhir' readonly id='tnt'>")

    var data = table.row(this.closest('tr')).data();
    var id = data[1];
    var nama = data[2];
    var harga = data[9];
    //console.log(nama);
    $("#hitung1").append("<div id='list"+i+"'><input type='hidden' name='i' value="+i+" id='i"+i+"'><input type='hidden' id='id_obat"+i+"' name='id_obat"+i+"' value="+id+"><h4>"+nama+"</h4>Harga :&emsp;<input type='text' disabled id='harga"+i+"'>&emsp; jumlah :&emsp;<input type='text' name='jmlh"+i+"' id='jmlh"+i+"'>&emsp;<a  onclick='calc("+i+")' class='btn btn-primary btn-flat' id='ceks"+i+"'>ok</a>&emsp;<a  onclick='del("+i+")' class='btn btn-danger btn-flat' id='cek"+i+"' >del</a><br>Total&emsp;:&emsp;<input type='text' name='total"+i+"' id='total"+i+"' readonly><hr></div>");
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
    console.log(batas);

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
                    text: "Transaksi berhasil ditambashkan.",
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
           <?php elseif($this->session->flashdata('msg')=='errors'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Transaksi gagal!!!,Silahkan cek ketersediaan obat",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
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