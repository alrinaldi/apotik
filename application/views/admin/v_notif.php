
<?php
                // date_default_timezone_set('Asia/Jakarta');
  
                     
?>   
<?php

 $td = date('Y-m-d');

           // $lw = $td - 7;
  $lw = date('Y-m-d', strtotime("-1 week"));
    $lw1 = date('Y-m-d', strtotime("-4 week"));
    $tw = date('Y-m-d',strtotime("+8 week"));
            //echo $lw;  
            $year = date('Y'); 
  $query1=$this->db->query("SELECT count(id) as jmlh from obat where type IN ('Botol','cair','Larutan','Salep','Suntik') and stok <= 10 and stok >=0");
        foreach ($query1->result_array() as $x) {
                    # code...
                //$query->result_array();
                    # code...
                
                      $qty = $x['jmlh'];

                # code...
            
            }

              $query2=$this->db->query("SELECT count(id) as jmlh from obat where type IN('Capsul','Tablet','Pill') and stok <= 100");
        foreach ($query2->result_array() as $x) {
                    # code...
                //$query->result_array();
                    # code...
                
                      $qtyc = $x['jmlh'];

                # code...
            
            }
              $query3=$this->db->query("SELECT count(id) as jmlh from obat where type ='tablet' and stok <= 20");
        foreach ($query3->result_array() as $x) {
                    # code...
                //$query->result_array();
                    # code...
                
                      $qtyt = $x['jmlh'];

                # code...
            
            }



         $query=$this->db->query("SELECT * from obat where tgl_kadaluarsa <= '$tw' and tgl_kadaluarsa >='$td' ");
           $query5=$this->db->query("SELECT * from obat where tgl_kadaluarsa <= '$td' and tgl_kadaluarsa >= '$lw' ");

            $c1 = $query->num_rows();
            $c2 = $query5->num_rows();
            $c3 = $c1+$c2;
 ?>

<!-- <script type="text/javascript">
       var today = new Date();     
            var lastweek = new Date(today.getFullYear(),today.getMonth(),today.getDate()-7);
            var mounth =  lastweek.getMonth()+1 ;
            var lastweekdipslay = lastweek.getFullYear() + "-" + mounth +"-" + lastweek.getDate();
            //lastweek;
            console.log(lastweekdipslay);            
</script> -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="<?php echo base_url().'admin/home'?>"><span>Rakha</span>Farma</a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <?php
                         if($qty==0)  {
                                      ?>  <em class="fas fa-bong"></em><span class="label label-danger"></span>

                            <?php
                            }else {       ?>
                                 <em class="fas fa-bong"></em><span class="label label-danger"><?php echo $qty ?></span>
                                <?php }       ?>
                    </a>
                    
                        <ul class="dropdown-menu dropdown-messages">
                       
                            <li>
  <?php 
                                    foreach($bt->result_array() as $i):
                                        $namabt = $i['nama'];
                                        $stokbt = $i['stok'];
                                        ?>
                                <div class="dropdown-messages-box">
                                    <div class="message-body"><small class="pull-right">STOK OBAT </small>
                                        <strong> Stok <?php echo $namabt; ?> </strong> = <?php echo $stokbt; ?> <strong> Harap Memperbarui Stok </strong><?php echo $namabt; ?>
                                    <br /><small class="text-muted"><?php echo date('Y-m-d H:i');?></small></div>
                                   
                                </div>
                            </li>
                            <li class="divider"></li>
                        <?php endforeach; ?>
                         
                           
                  
                        </ul>
                        
                    </li>

                                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fas fa-calendar-times"></em><span class="label label-danger"><?php echo $c3 ?></span>
                    </a>
                        <ul class="dropdown-menu dropdown-messages">
                        
                            <li>
<?php
                                          foreach ($query5->result_array() as $x) :    
                                        $nama_obat1 = $x['nama'];
                                        $tanggal1 = $x['tgl_kadaluarsa'];
                                        $masa1  = (strtotime($tanggal1)-strtotime($td))/(24*60*60);
                                      
                                            ?>



                                                <div class="dropdown-messages-box">
                                    <div class="message-body"><small class="pull-right">Kadaluarsa </small>
                                        <strong> Tanggal Kadaluarsa</br> <?php echo $nama_obat1; ?> <?php echo $tanggal1; ?> </strong>  <strong>  Sudah Kadaluarsa Lebih </strong><?php echo $masa1; ?><strong> Hari </strong>
                                    <br /><small class="text-muted"><?php echo date('Y-m-d H:i');?></small></div>
                                   
                                </div> 
<li class="divider"></li>
 <?php endforeach; ?>

  <?php 
                                      foreach ($query->result_array() as $x) :    
                                         $nama_obat = $x['nama'];
                                        $tanggal = $x['tgl_kadaluarsa'];
                                        $masa  = (strtotime($tanggal)-strtotime($td))/(24*60*60);
                                      
                                            ?>
                                         <div class="dropdown-messages-box">
                                    <div class="message-body"><small class="pull-right"><?php echo $masa?> Hari lagi</small>
                                        <strong> Tanggal Kadaluarsa </br> <?php echo $nama_obat; ?> <?php echo $tanggal; ?> </strong> <strong> Tinggal  </strong><?php echo $masa; ?><strong> Hari </strong>
                                    <br /><small class="text-muted"><?php echo date('Y-m-d H:i');?></small></div>
                                   
                                </div>
                               
                            </li>
                            <li class="divider"></li>
                            <?php endforeach; ?>
                            
                           
                        </ul>
                    </li>


       
          <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                          <?php
                         if($qtyc==0)  {
                                      ?>  <em class="fas fa-capsules"></em><span class="label label-danger"></span>

                            <?php
                            }else {       ?>
                                 <em class="fas fa-capsules"></em><span class="label label-danger"><?php echo $qtyc ?></span>
                                <?php }       ?>
                    </a>
                        <ul class="dropdown-menu dropdown-messages">
                      
                            <li>
 <?php 
                                    foreach($cp->result_array() as $i):
                                        $nama = $i['nama'];
                                        $stok = $i['stok'];
                                        ?>
                                <div class="dropdown-messages-box">
                                   
                                    <div class="message-body"><small class="pull-right">STOK OBAT </small>
                                        <strong> Stok <?php echo $nama; ?> </strong> = <?php echo $stok; ?> <strong> Harap Memperbarui Stok </strong><?php echo $nama; ?>
                                    <br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
                                   
                                </div>
                            </li>
                            <li class="divider"></li>
                        <?php endforeach; ?>
                           
                        
                        </ul>
                    </li>

                


                  
     </ul>
     </div>
     </div>
     </nav>
