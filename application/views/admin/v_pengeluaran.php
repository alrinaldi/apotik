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
        
        <div class="row">
            <div class="col-lg-12">
              
            </div>
        </div><!--/.row-->
       <div class="panel panel-primary">
                    <div class="panel-heading">Pengeluaran
                                            <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
            <div class="col-md-12">
             
          <div class="box">
            <div class="box-header">
         <?php if($level == "Apoteker"){?>
              <a class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span>Tambah Pengeluaran</a>
 <?php }else{
                        }?>

            </div>
            <br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
                              
                    <th>no</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th> 
                    <?php if($level == "Apoteker"){?>
                    <th style="text-align:right;">Pilihan</th>
                    <?php }else{
                        }?>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no=0;
                    foreach ($pl->result_array() as $i) :
                       $no++;
                       $id=$i['id'];
                       $ket = $i['keterangan'];
                       $jml = $i['jumlah'];
                       $tgl=$i['tgl'];
                    
                    ?>
                <tr>
                       <td><?php echo $no;?></td>
                  <td><?php echo $ket;?></td>
                  <td><?php echo $jml;?></td>
                  <td><?php echo $tgl;?></td>
                   <?php if($level == "Apoteker"){?>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id;?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
                  </td>
                   <?php }else{
                        }?>
                </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
                 
        </div>
        </div>
        </div>
   
   
    </div>  <!--/.main-->


    <!--Modal Add Pengguna-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Pengeluaran</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'index.php/admin/pengeluaran/simpan_pengeluaran'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
                                <div class="col-sm-7">
                                  <input type="text" name="ket" class="form-control"  placeholder="keterangan" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Jumlah</label>
                                <div class="col-sm-7">
                                  <input type="text" name="jml" class="form-control"  placeholder="Jumlah" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">tanggal</label>
                                <div class="col-sm-7">
                                  <input type="date" name="tgl" class="tanggal"  placeholder="tanggal" required>
                                </div>
                            </div>
                          
                         

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>

                  

  <?php  foreach ($pl->result_array() as $i) :
                       $no++;
                       $id=$i['id'];
                       $ket = $i['keterangan'];
                       $jml = $i['jumlah'];
                       $tgl=$i['tgl'];

                
            ?>
    <!--Modal Edit Pengguna-->
        <div class="modal fade" id="ModalEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Ubah Pengeluaran</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/pengeluaran/edit_pengeluaran'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                  <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                              <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
                                <div class="col-sm-7">
                                  <input type="text" name="ket" class="form-control"  placeholder="keterangan" value="<?php echo $ket?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Jumlah</label>
                                <div class="col-sm-7">
                                  <input type="text" name="jml" class="form-control"  placeholder="Jumlah"  value="<?php echo $jml?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">tanggal</label>
                                <div class="col-sm-7">
                                  <input type="date" name="tgl" class="tanggal"  placeholder="tanggal"  value="<?php echo $tgl?>">
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


        <?php
                 foreach ($pl->result_array() as $i) :
                       $no++;
                       $id=$i['id'];
                       $ket = $i['keterangan'];
                       $jml = $i['jumlah'];
                       $tgl=$i['tgl'];
                    ?>
            
    
           <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Pengeluaran</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'index.php/admin/pengeluaran/pengeluaran'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                            <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                            <p>Apakah Anda yakin mau menghapus data pengeluaran<b><?php echo $ket;?></b> ?</p>
                               
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