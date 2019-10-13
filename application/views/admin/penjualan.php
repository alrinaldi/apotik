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
                    <div class="panel-heading">Kasir
                                            <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
            <div class="col-md-12">
             <div class="row">
            <div class="col-lg-12">
            <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Transaksi
                    <small></small>
                    <a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Cari Obat!</small></a>
                </h1> 
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <form action="<?php echo base_url().'admin/penjualan/add_to_cart'?>" method="post">
            <table>
                <tr>
                    <th>Kode Barang</th>
                </tr>
                <tr>
                    <th><input type="text" name="kode_brg" id="kode_brg" class="form-control input-sm"></th>                     
                </tr>
                    <div id="detail_barang" style="position:absolute;">
                    </div>
            </table>
             </form>
            <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th style="text-align:center;">Kadaluarsa</th>
                        <th style="text-align:center;">Harga(Rp)</th>
                       
                        <th style="text-align:center;">Qty</th>
                        <th style="text-align:center;">Sub Total</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items): ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    <tr>
                         <td><?=$items['id'];?></td>
                         <td><?=$items['name'];?></td>
                         <td style="text-align:center;"><?=$items['tgl_k'];?></td>
                         <td style="text-align:right;"><?php echo number_format($items['amount']);?></td>
                
                         <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>
                        
                         <td style="text-align:center;"><a href="<?php echo base_url().'admin/penjualan/remove/'.$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                    </tr>
                    
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="<?php echo base_url().'admin/penjualan/simpan_penjualan1'?>" method="post">
            <table>
                <tr>
                    <td style="width:900px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg"> Simpan</button></td>
                    <th style="width:250px;">Total Belanja(Rp)</th>
                    <th style="text-align:right;width:250px;"><input type="text" name="total2" value="<?php echo number_format($this->cart->total());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                    <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                </tr>
                  <tr>
                    <th>Tunai(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                    <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                </tr>
                <tr>
                    <td></td>
                    <th>Kembalian(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                </tr>
                <tr>  <td></td>
                    <th>Nama Pelanggan</th>
                    <th style="text-align:right;"><input type="text" id="nama_p" name="nama_p" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                   
                </tr>
           
            </table>
            </form>
            <hr/>
        </div>
        <!-- /.row -->
        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Data Barang</h3>
            </div>
                <div class="modal-body" style="overflow:scroll;height:500px;">

                  <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:40px;">No</th>
                            <th style="width:120px;">Kode Barang</th>
                            <th style="width:240px;">Nama Barang</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th style="width:100px;">Harga</th>
                          
                            <th>Supplier</th>
                              <th>Stok</th>
                            <th style="width:100px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no=0;
                          foreach ($data->result_array() as $i):
                $no++;
                $id = $i['id'];
                $nama = $i['nama'];
     
     
                $tgl_k = $i['tgl_kadaluarsa'];
       
                $stok = $i['stok'];
                $hrgj = $i['harga_jual'];
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
                 <td><?php echo $tgl_k;?></td>
                    
                 <td><?php echo $hrgj;?></td>
                     
                 <td><?php echo $nama_s;?></td>
     <td><?php echo $stok;?></td>
                         
        <td>            
                     <?php  
                     if($stok <= 0){
                        ?>
                          

                        <p> stok abis</p>
                        <?php }else{

                     ?>
 <form action="<?php echo base_url().'admin/penjualan/add_to_cart'?>" method="post">
                            <input type="hidden" name="kode_brg" value="<?php echo $id?>">
                            <input type="hidden" name="nabar" value="<?php echo $nama;?>">
                            <input type="hidden" name="tgl_k" value="<?php echo $tgl_k;?>">
                            <input type="hidden" name="stok" value="<?php echo $stok;?>">
                            <input type="hidden" name="harjul" value="<?php echo number_format($hrgj);?>">
                            <input type="hidden" name="qty" value="1" required>
                                <button type="submit" class="btn btn-xs btn-info" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                            </form>
<?php }?>
                </td>
            </tr>
           
            

             <?php endforeach;?>
                  
                    </tbody>
                </table>          

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
    <script src="<?php echo base_url().'desain/lumino/js/jquery.price_format.min.js'?>"></script>
    <script src="<?php echo base_url().'desain/lumino/js/moment.js'?>"></script>
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

     <script type="text/javascript">
        $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-total);
            })
            
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.jml_uang').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('#jml_uang2').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ''
            });
            $('#kembalian').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            //Ajax kabupaten/kota insert
            $("#kode_brg").focus();
            $("#kode_brg").on("input",function(){
                var kobar = {kode_brg:$(this).val()};
                   $.ajax({
               type: "POST",
               url : "<?php echo base_url().'admin/penjualan/get_barang';?>",
               data: kobar,
               success: function(msg){
               $('#detail_barang').html(msg);
               }
            });
            }); 

            $("#kode_brg").keypress(function(e){
                if(e.which==13){
                    $("#jumlah").focus();
                }
            });
        });
    </script>

</body>
</html>