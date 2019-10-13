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
                <li class="active">User</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
               
            </div>
        </div><!--/.row-->
       <div class="panel panel-primary">
                    <div class="panel-heading">USER
                                            <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
            <div class="col-md-12">
             
          <div class="box">
            <div class="box-header">
              <a class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add User</a>
            </div>
            <br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
                              
                    <th>no</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Status</th> 
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no=0;
                    foreach ($user->result_array() as $i) :
                       $no++;
                       //$id=$i['id'];
                       $username = $i['username'];
                       $password = $i['password'];
                       $nama=$i['nama'];
                       $alamat=$i['alamat'];
                       $tlpn = $i['tlpn'];
                       $level = $i['level'];
                       
                    ?>
                <tr>
                       <td><?php echo $no;?></td>
                  <td><?php echo $username;?></td>
                  <td><?php echo $password;?></td>
                  <td><?php echo $nama;?></td>
                  <td><?php echo $alamat;?></td>
                  <td><?php echo $tlpn;?></td>
                  <td><?php echo $level;?></td>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $username;?>"><span class="fa fa-edit"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $username;?>"><span class="fa fa-trash"></span></a>
                  </td>
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
   
        
        <div class="row">
           
            <div class="col-sm-12">
                <p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->


    <!--Modal Add Pengguna-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Add User</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'index.php/admin/user/simpan_user'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                                <div class="col-sm-7">
                                  <input type="text" name="username" class="form-control"  placeholder="username" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-7">
                                  <input type="text" name="password" class="form-control"  placeholder="*******" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                <div class="col-sm-7">
                                  <input type="text" name="nama" class="form-control"  placeholder="Nama" required>
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Alamat</label>
                                <div class="col-sm-7">
                                  <input type="text" name="alamat" class="form-control" placeholder="alamat" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Telepon</label>
                                <div class="col-sm-7">
                                    <input type="text" name="tlpn" class="form-control"  required>
                                </div>
                            </div>
                               <div class="form-group">
                                        <label class="col-sm-4 control-label">Level</label>
                                        <div class="col-sm-7">
                                        <select class="form-control" name="level" required>
                                         
                                            <option value="Pemilik">Admin</option>
                                            <option value="Apoteker">Apoteker</option>
                                            
                                            <option></option>
                                        </select>
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

                  

  <?php foreach ($user->result_array() as $i) :
               
            
                       $username = $i['username'];
                       $password = $i['password'];
                       $nama=$i['nama'];
                       $alamat=$i['alamat'];
                       $tlpn = $i['tlpn'];
                       $level = $i['level'];

                
            ?>
    <!--Modal Edit Pengguna-->
        <div class="modal fade" id="ModalEdit<?php echo $username;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/user/edit_user'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                
                                <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                                <div class="col-sm-7">
                                  <input type="text" name="username" class="form-control"  placeholder="username" value = "<?php echo $username?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-7">
                                  <input type="text" name="password" class="form-control"  placeholder="*******" value = "<?php echo $password?>"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                <div class="col-sm-7">
                                  <input type="text" name="nama" class="form-control"  placeholder="Nama" value = "<?php echo $nama?>"  required>
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Alamat</label>
                                <div class="col-sm-7">
                                  <input type="text" name="alamat" class="form-control" placeholder="alamat" value = "<?php echo $alamat?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Telepon</label>
                                <div class="col-sm-7">
                                    <input type="text" name="tlpn" class="form-control" value = "<?php echo $tlpn?>"  required>
                                </div>
                            </div>

                              <div class="form-group">
                                        <label class="col-sm-4 control-label">Level</label>
                                        <div class="col-sm-7">
                                        <select class="form-control" name="level" required>
                                             <option value="<?php echo"$level"?>"><?php echo $level;?></option>
                                            <option value="Pemilik">Admin</option>
                                            <option value="Apoteker">Apoteker</option>
                                            
                                            <option></option>
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


        <?php
                 foreach ($user->result_array() as $i) :
                       $no++;
                       
                       $username = $i['username'];
                       $password = $i['password'];
                       $nama=$i['nama'];
                       $alamat=$i['alamat'];
                       $tlpn = $i['tlpn'];
                    ?>
            
    
           <div class="modal fade" id="ModalHapus<?php echo $username;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Akun</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'index.php/admin/supplier/delete_supplier'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                            <input type="hidden" name="kode" value="<?php echo $username;?>"/> 
                            <p>Apakah Anda yakin mau menghapus Akun <b><?php echo $nama;?></b> ?</p>
                               
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