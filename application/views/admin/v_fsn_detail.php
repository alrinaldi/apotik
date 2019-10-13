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
       <div class="panel panel-success">
                    <div class="panel-heading">FSN ANALISIS
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
                <th>Klasifikasi</th>
                
            </tr>
            </thead>
            <tbody id="tableHitung">
            <?php
            
            $no=0;
            foreach ($detail->result_array() as $i):
                $no++;
                
                $nama = $i['nama'];
                $fsn = $i['final_fsn'];
                $type = $i['type'];
               
                //$s = mysql_fetch_array(mysql_query("SELECT stok from tiket,event where event.id = tiket.id_event"));
            ?>
          <tr class="table">
                <td class="table_check"><?php echo $no;?></td>
                
                <td class="table_title"><?php echo $nama;?></td>
                <td class="table_title"><?php echo $type;?></td>
                <td><?php echo $fsn;?></td>
      
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