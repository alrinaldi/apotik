<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lumino - Dashboard</title>
    <link href="<?php echo base_url().'desain/lumino/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url().'desain/lumino/css/font-awesome.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'desain/lumino/css/datepicker3.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'desain/lumino/css/styles.css'?>" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
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
<body>

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fas fa-bong"></em><span class="label label-danger"><?php echo $qty ?></span>
                    </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>

                                <div class="dropdown-messages-box">
                                    <?php 
                                    foreach($bt->result_array() as $i):
                                        $nama = $i['nama'];
                                        $stok = $i['stok'];
                                        ?>
                                    <div class="message-body"><small class="pull-right">STOK OBAT </small>
                                        <a href="#"><strong> Stok <?php echo $nama; ?> </strong> = <?php echo $stok; ?> <strong> Harap Memperbarui Stok </strong><?php echo $nama; ?></a>
                                    <br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
                                   
                                </div>
                            </li>
                            <li class="divider"></li>
                        <?php endforeach; ?>
                            <li class="divider"></li>
                            <li>
                                <div class="all-button"><a href="#">
                                    <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                                </a></div>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-envelope"></em><span class="label label-info">5</span>
                    </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li><a href="#">
                                <div><em class="fa fa-envelope"></em> 1 New Message
                                    <span class="pull-right text-muted small">3 mins ago</span></div>
                            </a></li>
                            <li class="divider"></li>
                            <li><a href="#">
                                <div><em class="fa fa-heart"></em> 12 New Likes
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                            <li class="divider"></li>
                            <li><a href="#">
                                <div><em class="fa fa-user"></em> 5 New Followers
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name"></div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>

    <?php $this->load->view('admin/v_nav');?>
    
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
                <h1 class="page-header">Tambah Stock</h1>
            </div>
        </div><!--/.row-->
        <main>
       <div class="panel panel-success">
                    <div class="panel-heading">Tambah Obat
                                            <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
                                            <a class ="btn btn-primary btn-flat" href="<?php echo base_url('admin/obat/export_excel')?>">EXPORT to EXCEL</a>
                    <br>
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
                <th>Pilihan</th>
                <th>Stock</th>
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
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id;?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
                        
                         <!-- <a  id="hitung" class="btn" href="#"><span class="fa fa-plus"></span></a> -->
                </td>
                <td>
                        <a class="btn" data-toggle="modal" data-target="#Modalstok<?php echo $id;?>"><span class="fa fa-plus"></span></a>
            </td>
            </tr>
           
            

             <?php endforeach;?>
</tbody>
        </table>
                 
        </div>
        </div>

  

        </div>
       </main>
        <?php foreach ($obat->result_array() as $i) :
                 $id = $i['id'];
                $nama = $i['nama'];
                $gol = $i['gol'];
                $type = $i['type'];
                $tgl_k = $i['tgl_kadaluarsa'];
                $tgl_b = $i['tgl'];
                $stok = $i['stok'];
                $harga_beli = $i['harga_beli'];
                $harga_jual = $i['harga_jual'];

                
            ?>
    <!--Modal Edit Pengguna-->
        <div class="modal fade" id="ModalEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Obat</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/obat/edit_obat'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Nama Obat</label>
                                <div class="col-sm-7">
                                  <input type="hidden" name="kode" value="<?php echo $id;?>">
                                  <input type="text" name="nama" class="form-control" value="<?php echo $nama;?>" id="inputUserName" required>
                                </div>
                            </div>
                         
                              <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Golongan</label>
                                        <div class="col-sm-7">
                                        <select class="form-control" name="gol" required>
                                         <option value=""><?PHP echo $gol;?></option>
                                            <option value="Semua umur">Semua umur</option>
                                            <option value="Sedang">Sedang</option>
                                            <option value="Keras">Keras</option>
                                            <option></option>
                                        </select>
                                    </div>
                                    </div>
                             <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Type</label>
                                        <div class="col-sm-7">
                                        <select class="form-control" name="type" required>
                                         <option value=""><?PHP echo $type;?></option>
                                            <option value="Capsul">Capsul</option>
                                            <option value="Botol">Botol</option>
                                            <option value="Tablet">Tablet</option>
                                            <option></option>
                                        </select>
                                    </div>
                                    </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Tanggal Kadaluarsa</label>
                                <div class="col-sm-7">
                                    <input type="date" name="tgl_k" class="tanggal" value="<?php echo $tgl_k;?>" id="inputUserName"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Stok</label>
                                <div class="col-sm-7">
                                 <input type="text" name="stok" class="form-control" value="<?php echo $stok;?>" id="inputUserName"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Harga beli</label>
                                <div class="col-sm-7">
                                 <input type="text" name="hargab" class="form-control" value="<?php echo $harga_beli;?>" id="inputUserName"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Harga jual</label>
                                <div class="col-sm-7">
                                 <input type="text" name="hargaj" class="form-control" value="<?php echo $harga_jual;?>" id="inputUserName"  required>
                                </div>
                            </div>

                                <div class="form-group">
               <label for="inputUserName" class="col-sm-4 control-label">Supplier</label>
                   <div class="col-sm-7">
                <select class="form-control" name="id_s" style="width: 100%;" required>
                  <option value="">-Pilih-</option>
                  <?php
                    $no=0;
                    foreach ($sup->result_array() as $i) :
                       $no++;
                       $id=$i['id_supplier'];
                       $nama=$i['nama'];
                       
                    ?>
                  <option value="<?php echo $id;?>"><?php echo $nama;?></option>
                  <?php endforeach;?>
                </select>
              </div>
              </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    
    <?php foreach ($obat->result_array() as $i) :
                 $id = $i['id'];
                $nama = $i['nama'];
                $gol = $i['gol'];
                $type = $i['type'];
                $tgl_k = $i['tgl_kadaluarsa'];
                $tgl_b = $i['tgl'];
                $stok = $i['stok'];
            ?>
    <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Obat</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'index.php/admin/obat/delete_obat'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                            <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                            <p>Apakah Anda yakin mau menghapus Obat <b><?php echo $nama;?></b> ?</p>
                               
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    
<?php foreach ($obat->result_array() as $i) :
                 $id = $i['id'];
                $nama = $i['nama'];
                $gol = $i['gol'];
                $type = $i['type'];
                $tgl_k = $i['tgl_kadaluarsa'];
                $tgl_b = $i['tgl'];
                $stok = $i['stok'];
                $harga = $i['harga_beli'];
                
            ?>
    <!--Modal Edit Pengguna-->
        <div class="modal fade" id="Modalstok<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Stok</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'index.php/admin/obat/simpan_pembelian'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                <input type="hidden" name="harga" value="<?php echo $harga;?>">
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Nama Obat</label>
                                <div class="col-sm-7">
                                  <input type="hidden" name="kode" value="<?php echo $id;?>">
                                  <input type="text" name="nama" class="form-control" value="<?php echo $nama;?>" id="inputUserName" required disabled>
                                </div>
                            </div>
                         
                        
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Stok akhir</label>
                                <div class="col-sm-7">
                                 <input type="text" name="stoka" class="form-control" value="<?php echo $stok;?>" id="inputUserName"  disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Stok baru</label>
                                <div class="col-sm-7">
                                 <input type="text" name="stok" class="form-control"  id="inputUserName"  required>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Kirim</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    
        
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