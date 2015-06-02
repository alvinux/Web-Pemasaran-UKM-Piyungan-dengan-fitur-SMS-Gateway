<style>
   th{width:200px;}
   .table-title{line-height:30px;font-size:20px;}
</style>
<section id="detail-profile" class="container">
   <div class="row">
      <div class="row" style="padding:5px;background-color: white;">
         <h1>Detail Transaksi</h1>
         <?php
         $TransaksiData = $Transaksi->row_array();
         ?>
         <strong class="table-title">Data Pembeli</strong>
         <table class="table">
            <tr>
               <th>Kode Transaksi</th><td><?php echo $TransaksiData['kode_transaksi'];?></td>
            </tr>
            <tr>
               <th>Tanggal Transaksi</th><td><?php echo $TransaksiData['tgl_transaksi'];?></td>
            </tr>
               <th>Nama</th><td><?php echo $TransaksiData['nama'];?></td>
            <tr>
            </tr>
               <th>Alamat</th><td><?php echo $TransaksiData['alamat'];?></td>
            <tr>
            </tr>
               <th>No Telp</th><td><?php echo $TransaksiData['telpon'];?></td>
            <tr>
            <tr>
               <th>Total Bayar</th><td>Rp <?php echo number_format($TransaksiData['total_biaya']);?>,-</td>
            </tr>
         </table>
         <br/>
         <strong class="table-title">Data Pengiriman</strong>
         <table class="table">
            <tr>
               <th>Pilihan Paket</th><td><?php echo $TransaksiData['paket_kirim'];?></td>
            </tr>
            <tr>
               <th>Jumlah Toko</th><td><?php echo $TransaksiDetail->num_rows();?></td>
            </tr>
         </table>
         <strong class="table-title">Status Pengiriman</strong>
         <table class="table">
            <tr>
               <th>Nama Toko</th><th>Telepon</th><th>Status Pengiriman</th>
            </tr>
            <?php
            $TransaksiDetail = $TransaksiDetail->result_array();
            foreach($TransaksiDetail as $TD):
            ?>
            <tr>
               <td><?php echo $TD['username_user'];?></td><td><?php echo $TD['telpon'];?></td><td><?php echo $TD['status'];?></td>
            </tr>
            <?php endforeach;?>
         </table>
         <br/>
         <strong class="table-title">Data Pembayaran</strong>
         <?php
         if(empty($Pembayaran)){//belum melakukan konfirmasi pembayaran
            echo '<br><h3 style="color: red;"><i>Belum melakukan Konfirmasi Pembayaran</i></h3>';
         }else{//macam-macam status pembayaran?>
            <table class="table">
               <tr><th>Atas Nama</th><td><?php echo $Pembayaran['nama_pengirim'];?></td></tr>
               <tr><th>Jumlah Bayar</th><td>Rp <?php echo number_format($Pembayaran['jumlah_bayar']);?>,-</td></tr>
               <tr><th>Tgl Bayar</th><td><?php echo $Pembayaran['tgl_bayar'];?></td></tr>
               <tr><th>Bank Asal</th><td><?php echo $Pembayaran['nama_bank_pengirim'];?></td></tr>
               <tr><th>Bank Tujuan</th><td><?php echo $Pembayaran['nama_bank'];?></td></tr>
               <tr><th>Metode Pembayaran</th><td><?php echo $Pembayaran['metode_pembayaran'];?></td></tr>
               <tr><th>Status</th><td><?php echo $Pembayaran['status'];?></td></tr>
            </table>
         <?php } ?>
         <br/>
         <strong class="table-title">Data Barang</strong><br/>
         <?php foreach($TransaksiDetail as $TD):?>
         Nama Toko : <?php echo $TD['username_user'];?>
         <table class="table">
            <tr><th>Kode Barang</th><th>Nama Barang</th><th>Jumlah</th><th>Berat (/item)</th><th>Harga Satuan (Rp)</th></tr>
            <?php
            $TransaksiItem = $this->m_produk->newTransaksiItem($TD['id_transaksi_detail']);
            foreach($TransaksiItem as $TI):
            echo '<tr>';
            echo "<tr><td>".$TI['id_produk']."</td><td>".$TI['nama_produk']."</td><td>".$TI['jumlah']."</td><td>".$TI['berat'].'(gram)'."</td><td>".$TI['harga']."</td></tr>";
            echo '</tr>';
            endforeach;
            ?>
         </table>
         <?php endforeach;?>
      </div>
   </div>
</section>
