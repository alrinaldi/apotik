  <?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=laporan.xls");
header("pragma: no-cache");
header("Expires: 0");
  ?>
  <table border="1" width="100%">
            <thead>
            <tr>
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
            </tr>
            </thead>
            <tbody>
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
          <tr>
                <td ><?php echo $no;?></td>
                <td><?php echo$id;?></td>
                <td ><?php echo $nama;?></td>
                <td ><?php echo $gol;?></td>
                <td><?php echo $type;?></td>
                <td><?php echo $tgl_k;?></td>
                <td><?php echo $tgl_b;?></td>
                 <td><?php echo $nama_s;?></td>
                <td><?php echo $stok;?></td>
                 <td><?php echo $hrgb;?></td>
        
      
            </tr>
           
            

             <?php endforeach;?>
</tbody>
        </table>