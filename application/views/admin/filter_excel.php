  <?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=laporan.xls");
header("pragma: no-cache");
header("Expires: 0");
  ?>
       <table border="1" width="100%">
            <thead class="table">
            <tr class="table">
                <th>No.</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Total</th>
                
            </tr>
            </thead>
            <tbody>
            <?php
            $no=0;
            foreach ($pjf->result_array() as $i):
                $no++;
                $kode = $i['kode'];
                $nama = $i['nama'];
                $tgl = $i['tgl'];
                $total = $i['total'];
                $qty = $i['qty'];
                
                //$s = mysql_fetch_array(mysql_query("SELECT stok from tiket,event where event.id = tiket.id_event"));
            ?>
          <tr class="table">
                <td class="table_check"><?php echo $no;?></td>
                <td><?php echo $kode;?></td>
                <td class="table_title"><?php echo $nama;?></td>
                <td class="table_title"><?php echo $tgl;?></td>
                <td><?php echo $qty;?></td>
                <td><?php echo $total?></td>
        
     
            </tr>
           
            

             <?php endforeach;?>
</tbody>
        </table>
                 