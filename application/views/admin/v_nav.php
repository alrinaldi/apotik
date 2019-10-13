
       <?php

if($level == "pemilik"){
       
       ?>

        <ul class="nav menu">
            <li class="parent"><a href="<?php echo base_url().'admin/home'?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em> Obat <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="" href="<?php echo base_url().'admin/obat/obat'?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Daftar Obat
                    </a></li>
                </ul>
            </li>

                    <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-navicon">&nbsp;</em> Laporan <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
               
                    <li><a class="" href="<?php echo base_url().'admin/penjualan/lap_penjualan'?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Penjualan
                    </a></li>
                    <li><a class="" href="<?php echo base_url().'admin/pembelian/lap_pembelian'?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Pembelian
                    </a></li>
                    <li><a class="" href="<?php echo base_url().'admin/Pengeluaran/Pengeluaran'?>"">
                        <span class="fa fa-arrow-right">&nbsp;</span> Pengeluaran
                    </a></li>
                     <li><a class="" href="<?php echo base_url().'admin/Penjualan/laporan_pendapatan'?>"">
                        <span class="fa fa-arrow-right">&nbsp;</span> Pengeluaran
                    </a></li>
                </ul>
            </li>

                    <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
                <em class="fa fa-navicon">&nbsp;</em> Supplier <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-4">
                   
                    <li><a class="" href="<?php echo base_url().'admin/supplier/supplier'?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Daftar Supplier
                    </a></li>
                    
                </ul>
            </li>

                     <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
                <em class="fa fa-navicon">&nbsp;</em> Grafik <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-3">
                    
                    <li><a class="" href="<?php echo base_url().'admin/c_chart/grafik_pendapatan'?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Grafik pendapatan
                    </a></li>
                     
                </ul>
            </li>

                 <li class="parent "><a data-toggle="collapse" href="#sub-item-5">
                <em class="fa fa-navicon">&nbsp;</em> Strategi <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-5">
                    <li><a class="" href="<?php echo base_url().'admin/fsn/fsn'?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> FSN ANALISIS Obat lembar
                    </a></li>
                    <li><a class="" href="<?php echo base_url().'admin/fsn/fsn_pcs'?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> FSN ANALISIS Obat pcs
                    </a></li>
                    <li><a class="" href="<?php echo base_url().'admin/fsn/movingavr'?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Moving Average
                    </a></li>
                    
                </ul>
            </li>


               <li class="parent "><a data-toggle="collapse" href="#sub-item-6">
                <em class="fa fa-navicon">&nbsp;</em> User <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-6">
                    <li><a class="" href="<?php echo base_url().'admin/user/user'?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Daftar User
                    </a></li>
               
                    
                </ul>
            </li>

            <li><a href="<?php echo base_url().'admin/home/logout'?>" onclick="return confirm('Yakin akan keluar dari sistem?')"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div><!--/.sidebar-->
    <?php
}
   
    else { ?>
           <ul class="nav menu">
            <li class="parent"><a href="<?php echo base_url().'admin/home'?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em> Obat <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="" href="<?php echo base_url().'admin/obat/add_obat'?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Tambah Obat
                    </a></li>
                 
                    <li><a class="" href="<?php echo base_url().'admin/obat/obat'?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Daftar Obat
                    </a></li>
                </ul>
            </li>

                    <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-navicon">&nbsp;</em> Penjualan <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li><a class="" href="<?php echo base_url().'index.php/admin/penjualan/penjualan1'?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Kasir
                    </a></li>
                    <li><a class="" href="<?php echo base_url().'admin/penjualan/lap_penjualan'?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Lihat Penjualan
                    </a></li>

                     <li><a class="" href="<?php echo base_url().'admin/pembelian/lap_pembelian'?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Pembelian
                    </a></li>
                    
                </ul>
            </li>

                    <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
                <em class="fa fa-navicon">&nbsp;</em> Supplier <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-4">
                    
                    <li><a class="" href="<?php echo base_url().'admin/supplier/supplier'?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Daftar Supplier
                    </a></li>
                    
                </ul>
            </li>

                     <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
                <em class="fa fa-navicon">&nbsp;</em> Pengeluaran <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-3">
                    <li><a class="" href="<?php echo base_url().'admin/Pengeluaran/Pengeluaran'?>"">
                        <span class="fa fa-arrow-right">&nbsp;</span> Catat Pengeluaran
                    </a></li>
                    
                </ul>
            </li>

             
            <li><a href="<?php echo base_url().'admin/home/logout'?>" onclick="return confirm('Yakin akan keluar dari sistem?')"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div><!--/.sidebar-->
<?php
    }

        ?>