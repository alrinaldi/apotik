<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fas fa-capsules"></em><span class="label label-danger"><?php echo $qtyc ?></span>
                    </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
 <?php 
                                    $query=$this->db->query("SELECT * from obat where tgl_kadaluarsa <= '$td' and >='$lw' ");
        foreach ($query->result_array() as $x) :
                    # code...
                //$query->result_array();
                    # code...
                
                      $masa = $x['tgl_kadaluarsa'];
                        $nama_obat = $x['nama'];
                        $selisih = strotime($masa) - strotime($td);
                      /*  $masa_berlaku = strotime($cek)- strotime($td)
                          echo $expired = $cek,strotime("-1week");
                      if($masa_berlaku/(20*60*60)<1)*/
                 

                # code...
            
            ?>
                                <div class="dropdown-messages-box">
                                   
                                    <div class="message-body"><small class="pull-right">STOK OBAT </small>
                                        <a href="#"><strong> Stok <?php echo $nama_obat; ?> </strong> = <?php echo $masa; ?> <strong> Harap berlaku tinggal </strong><?php echo $selisih; ?> hari</a>
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