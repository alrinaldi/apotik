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
               
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                
            </div>
        </div><!--/.row-->
        
       <div class="panel panel-primary">
                    <div class="panel-heading">Tambah Obat
                                            <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
</br>
                                                                <a class ="btn btn-danger btn-flat" href="<?php echo base_url('admin/excel/import_excel')?>">Import Data Excel</a>
                    </br>
                    <div class="panel-body">
            <div class="col-md-12">
            <form action="<?php echo base_url().'index.php/admin/obat/simpan_obat'?>" method="post" name="form" id="form">
           <div class="form-group">
          
                                 <div class="form-group">
                                    <label class=" form-control-label">Nama Obat</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fas fa-books-medical"></i></div>
                                        <input class="form-control" type="text" name="nama" required>
                                    </div>
                                </div>

          <div class="form-group">
                                        <label>Golongan</label>
                                        <select class="form-control" name="gol" required>
                                            <option value="Bebas">Bebas</option>
                                            <option value="Bebas terbatas">Bebas terbatas</option>
                                            <option value="Keras">Keras</option>
                                            <option></option>
                                        </select>
                                    </div>
           <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control" name="type" required>
                                            <option value="Capsul">Capsul</option>
                                            <option value="Tablet">Tablet</option>
                                            <option value="Botol">Botol</option>
                                              <option value="Salep">Salep</option>
                                                <option value="Pil">Pil</option>
                                                <option value="Cair tetes">Cair tetes</option>
                                                <option value="Suntik">Suntik</option>
                                                <option value="Larutan">Larutan</option>
                                                <option value="Suspensi">Suspensi</option>
                                                <option value="Serbuk">Serbuk</option>
                                            
                                            
                                        </select>
                                    </div>
           <div class="form-group">
             <label class=" form-control-label">Tanggal Kadaluarsa</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>

           <input type ="date" class="tanggal" name="tanggal" required>
           </div>
           </div>

             <div class="form-group">
           <label class="form-control-label">Tanggal Beli</label>
           <div class="input-group">
           <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
           <input type ="date" class="tanggal" name="tanggal_beli" required>
           </div>
           </div>

            <div class="form-group">
           <label class="form-control-label">Stock</label>
           <div class="input-group">
           <div class="input-group-addon"><i class="fas fa-archive"></i></div>
           <input type ="number" class="form-control" name="stok" required>
           </div>
           </div>

            <div class="form-group">
           <label class="form-control-label">Harga Beli</label>
           <div class="input-group">
           <div class="input-group-addon"><i class="fas fa-dollar-sign"></i></div>
           <input type ="number" class="form-control" name="hrg_b" required>
           </div>
           </div>

            <div class="form-group">
           <label class="form-control-label">Harga Jual</label>
           <div class="input-group">
           <div class="input-group-addon"><i class="fas fa-dollar-sign"></i></div>
           <input type ="number" class="form-control" name="hrg_j" required>
           </div>
           </div>

             <div class="form-group">
                <label>Supplier</label>
                <select class="form-control select2" name="id_s" style="width: 100%;" required>
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

           <button type="submit" class="btn btn-primary">Submit Button</button>
                                    <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                           
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
                    text: "Obat berhasil di update",
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