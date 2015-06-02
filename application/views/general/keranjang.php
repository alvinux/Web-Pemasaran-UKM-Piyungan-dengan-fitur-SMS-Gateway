<?php
//deklarasi total biaya semua
$TotalBiayaSemua = 0;
$kodeunik=rand(10,99);
$TotalBiayaSemua = $TotalBiayaSemua + $this->cart->total() + $kodeunik;//total biaya semua + total biaya barang
?>
<?php
if (empty($this->cart->contents())) {//start if tidak ada transaksi ?><!--Jika Cart isi atau kosong-->
   <?php 	echo '<script>';
   echo "alert('Keranjang Belanja anda masih kosong');";
   echo "window.location='".$this->agent->referrer()."'";
   echo '</script>';?>
   <?php } else {?><!--Jika Cart isi atau kosong-->
      <?php
      // $arrayidpenjual = array();
      // foreach ($this->cart->contents() as $item) {
      // 	$keys = $item['id_penjual'];
      // 	if (!array_key_exists($item['id_penjual'] , $arrayidpenjual)) {
      // 		array_push($arrayidpenjual, $item['id_penjual']);
      // 	}
      // }

      $arrayidpenjual = array();
      foreach($this->cart->contents() as $item) {
         $totalBiaya = '';
         $keys = $item['id_penjual'];
         if (isset($arrayidpenjual[$keys])) {
            $arrayidpenjual[$keys] = $item['id_penjual'];
         } else {
            $arrayidpenjual[$keys] = $item['id_penjual'];
         }
      }

      // $result = array();
      // foreach($array as $elem) {
      // 	$key = $elem['id'];
      // 	if (isset($result[$key])) {
      // 		$result[$key]['tval'] .= ',' . $elem['tval'];
      // 	} else {
      // 		$result[$key] = $elem;
      // 	}
      // }

      // echo "<pre>";
      // print_r($arrayidpenjual);
      // foreach ($arrayidpenjual as $key) {
      // 	$i=1;
      //     $total_berat = 0;
      //     $total_barang = 0;
      //     $total_harga = 0;
      // 	foreach ($this->cart->contents() as $item) {
      // 		if ($item['id_penjual'] == $key) {
      // 			// print_r($key);
      // 			 print_r($item);
      // 			$total_barang = $total_barang + $item['qty'];
      // 			$total_berat = $total_berat + $item['total_berat'];
      // 			$total_harga = $total_harga + $item['subtotal'];
      // 			$i++;
      // 		}
      // 	}
      // 	echo "<br>";
      // 	echo $total_berat;
      // 	echo "<br>";
      // 	echo $total_barang;
      // 	echo "<br>";
      // 	echo $total_harga;
      // 	echo "<br>";
      // 	echo "Separator----------------------";
      // }

      // echo "</pre>";
      ?>


      <!-- <li>start message -->
      <!--  <a href="<?php echo base_url('home/detailproduk/' . $item['id']); ?>">
      <div style="margin-top: 10px;" class="pull-left">
      <img class="img-rounded" style="padding: 6px; max-width: 60px;" src="<?php echo base_url('doc/themes/public/img/produk/'.$item['pic']); ?>">
   </div>
   <h5><?php echo $item['name'];?><small><i class="fa fa-clock-o"></i> (<?php echo $item['qty'];?> pcs)</small><br>
   <small><i class="fa fa-clock-o"></i><?php echo 'Rp '.number_format($item['total_harga_asli']).',00';?></small>
</h5>

</a><hr style="padding: 0px; margin: 0px; border: 1px solid grey;">
</li> -->


<section id="detail-profile" class="container">
   <div class="row container">

      <div class="span12">
         <?php
         $totalToko =  count($arrayidpenjual);//total toko didalam cart
         foreach ($arrayidpenjual as $key) {
            ?>
            <table class="table table-bordered cart-holder " id="cart-148417-1976826-1-1">
               <thead>
                  <tr>
                     <td colspan="8">
                        <span class="pull-left mt-5">
                           <i class="icon-circle-arrow-right mr-5">
                           </i>
                           <b>Pembelian dari toko:
                              <a class="ml-5" href="<?php echo base_url('home/detail_penjual/'.$key);?>"><?php echo $this->m_user->data_penjual($key)['username_user'];?></a>
                           </b>
                        </span>
                        <span class="pull-right"></span>
                     </td>
                  </tr>
               </thead>

               <tbody>
                  <?php
                  $i=1;
                  $total_berat = 0;
                  $total_barang = 0;
                  $total_harga = 0;
                  foreach ($this->cart->contents() as $item) {
                     if ($item['id_penjual'] == $key) {
                        // print_r($item);
                        ?>
                        <tr id="detail_cart-22432741" class="cart-item ">
                           <td colspan="2">
                              <span class="pull-left" style="padding-right: 10px;">
                                 <img class="pull-left mr-10" src="<?php echo base_url('doc/themes/public/img/produk/'.$item['pic']); ?>" alt="<?php echo $item['name'];?>" width="70">
                              </span>
                              <span class="pull-left w-300">
                                 <a class="pull-left product-name" href="<?php echo base_url('home/detailproduk/'.$item['id']);?>">
                                    <b><?php echo $item['name'];?></b>
                                 </a>
                                 <span class="pull-left clear-b">
                                    <small><b><?php echo $item['qty'];?> Barang (<?php echo $item['total_berat'];?> gr)</b> x  Rp <?php echo number_format($item['price']);?>,-</small>
                                 </span>
                                 <span class="pull-left clear-b">
                                    <a class="edit-product"><small><i class="icon-pencil"></i> Ubah</small></a>
                                 </span>
                              </span>
                           </td>
                           <td>
                              <span class="pull-left">
                                 <b>Harga Barang</b>
                              </span>
                              <span class="pull-left clear-b">Rp <?php echo number_format($item['subtotal']);?>,-</span>
                           </td>
                           <td colspan="2">
                              <span class="pull-left"><b>Keterangan</b></span>
                              <span class="pull-left clear-b">-</span>
                              <span class="pull-right clear-b">
                                 <a class="delete-product"><i class="icon-delete icon-large"></i> Hapus</a>
                              </span>
                           </td>
                        </tr>
                        <?php
                        // print_r($key);
                        $total_barang = $total_barang + $item['qty'];
                        $total_berat = $total_berat + $item['total_berat'];
                        $total_harga = $total_harga + $item['subtotal'];
                        $i++;
                     }
                  }
                  // echo "<br>";
                  // echo $total_berat;
                  // echo "<br>";
                  // echo $total_barang;
                  // echo "<br>";
                  // echo $total_harga;
                  // echo "<br>";
                  // echo "Separator----------------------";
                  ?>
                  <tr class="transaction-detail-bottom">
                     <td class="span7" style="width:325px">
                        <b>Alamat Tujuan</b>
                        <a class="edit-addr-ship">
                           <small><i class="icon-pencil ml-10"></i> Ubah</small>
                        </a>
                        <!-- 	<div class="clear-b">
                        <small>JNE - Reguler</small>
                     </div> -->
                     <p>
                        <?php //print_r($data_user)?>
                        <strong><?php echo $data_user['nama'];?></strong>
                        <br><?php echo $data_user['alamat'];?>
                        <!-- 									<br>(Belakang SMPN 22 Bekasi) -->
                        <br>Kecamatan: <?php echo $data_user['id_kecamatan'];?> , <br>Kota: <?php echo $data_user['kota'];?>, (<?php echo $data_user['kode_pos'];?>)
                        <br>Provinsi <?php echo $data_user['provinsi']; ?>
                        <br>Telp: <?php echo $data_user['telpon'];
                        ?>
                     </p>
                  </td>
                  <!-- <td class="span3">
                  <p><b>Asuransi</b></p>
                  <div class="row-fluid">
                  <div class="span8">
                  <span>Tidak didukung</span>
               </div>
               <div class="span4 break-word">
               <i data-original-title="Total harga barang tidak memenuhi kriteria perhitungan asuransi JNE yaitu  harga barang > (10 * ongkos kirim)  " class="icon-help-alt uq-help pull-left mt-5 ml-5" title="" style="cursor: pointer">
            </i>
         </div>
      </div>
   </td>
-->
<td class="span3">
   <p><b>Total Barang</b>  <br><span><?php echo number_format($total_barang);?>  (<?php echo number_format($total_berat);?> kg)</span></p>
</td>

<td class="col-md3">
   <b>Subtotal</b> <p>Rp <span><?php echo number_format($total_harga);?></span>,-</p><span id="barang" style="display:none;"><?php echo $total_harga;?></span>
</td>

<td class="span3">
   <b>Ongkir</b> <p>Rp <span>silahkan pilih paket pengiriman...</span></p>
</td>
</tr>

</tbody>

<tfoot>
   <tr>
      <td colspan="6">
         <span class="pull-left">
            <a class="delete-product-all"><small><i class="icon-remove"></i> Hapus Semua</small></a>
         </span>
         <span class="dropship_dtl" style="display:none">
            <input name="dropship_name-148417-1976826-1-1" class="w-150 mb-0 fs-11 dropship-class" placeholder="Nama Pengirim" type="text">
            <input name="dropship_telp-148417-1976826-1-1" class="w-150 ml-5 mb-0 fs-11 dropship-class" placeholder="Nomor Telp" type="text">
         </span>
         <!-- <span class="pull-right item-total">SubTotal + Ongkir <b>Rp <span><?php echo number_format($this->cart->total());?></span>,-</b></span> -->
      </td>
   </tr>
</tfoot>
<?php
}
?>
</table>
<span class="pull-right item-total">Total <b>Rp <span><?php echo number_format($this->cart->total());?></span>,-</b></span>

<div class="col-md-6">
   <h3>Biaya Tambahan</h3>
   <div class="row">
      <form class="form" action="<?php echo site_url('product/addTransaction');?>" method="post">
         <p><?php echo $this->m_user->data_penjual($key)['id_kota'];?>,<?php echo $data_user['id_kota']; ?>,<?php echo $total_berat;?>
            <select style="width:70%" id="pilihanJasaOngkir" name="ongkir" onchange="hitungBiaya(<?php echo $this->m_user->data_penjual($key)['id_kota'];?>,<?php echo $data_user['id_kota']; ?>,<?php echo $total_berat;?>)" class="form-control" required>
                  <option value="" >Pilih Paket Pengiriman</option>
                  <option  value="jne">JNE</option>
                  <option  value="tiki">Tiki</option>
                  <option  value="pos">POS Indonesia</option>
               </select>
            <div class="col-md-12" id="resultOngkir"></div>
            <p>
            <strong>Total Biaya Ongkir</strong><br/>
            Total biaya ongkir adalah ongkir x jumlah toko didalam cart<br/>
            <strong>Rp <span id="totalOngkir" name=""></span>,-</strong>
            <br/>
            </p>
            <hr/>
            <p>
            <span id="kodeunik" name=""></span>
            <strong>Kode Unik</strong>
            <br/>
            <strong>Rp <span id="kodeunik" name="<?php echo $kodeunik;?>"></span><?php echo $kodeunik;?>,-</strong>
            </p>
         </p>
   </div>
</div>
<div class="col-md-6">
   <h3>Total Biaya</h3>
      <div class="input-group">
         <span class="input-group-addon">Rp.</span>
         <input type="text" id="totalbiayasemua" name="TotalBiayaSemua" class="form-control input-lg" value="<?php echo $TotalBiayaSemua;?>" readonly required>
         <span class="input-group-addon">.00</span>
      </div>
      <div class="pull-right">
         <br/>
         <button type="submit" class="btn btn-large btn-primary btn-lg">Lanjutkan</button>
      </form>
   </div>
</div>
</div>
</div>
</section>


<?php
?><!--/Cart List-->
<?php } ?><!--Jika Cart isi atau kosong-->



<!-- jquery ongkos kirim -->

<script charset="utf-8">
function getTotalHarga()
{
   var barang = parseInt($('#barang').html());
   var kodeUnik = parseInt($('#kodeUnik').html());
   var ongkir = parseInt($('#ongkir').html());
   return $('#totalBayar').html(barang+ongkir+kodeUnik);
   // total = total.replace(new RegExp("^(\\d{" + (total.length%3?total.length%3:0) + "})(\\d{3})", "g"), "$1 $2").replace(/(\d{3})+?/gi, "$1 ").trim();
   // var sep=",";
   // total = total.replace(/\s/g, sep);
}
function hitungBiaya(asal,tujuan,berat)//WORK
{
   $('#resultOngkir').html('loading...');
   var jasa = $('#pilihanJasaOngkir').val();
   $.ajax({
      url:"<?php echo site_url('ajax/ongkos_kirim'); ?>",
      data:{origin:asal,destination:tujuan,weight:berat,courier:jasa},
      type:'GET',
      success:function(response){
         $('#resultOngkir').html(response);
         getTotalHarga();
      },
      error:function(){
         alert('something wrong');
      }
   });
}
function totalOngkir()//WORK
{
   var ongkir = $('input[name="pilihpaket"]:checked').val();
   // alert(ongkir);
   $('#ongkir').html(ongkir);
   getTotalHarga();
   hitungTotalOngkir(ongkir);//get total biaya ongkir
}
$(document).ready(function(){
   getTotalHarga();
});
</script>














<script type="text/javascript">
// function ongkir(paket)
// 	{
// 		//show modal
// 		// $('#customlabel').html('Konfirmasi Pembayaran');
// 		$('#ongkos_kirim').html('<center>laoding</center>');
// 		// $('#custommodal').modal('show')
// 		//start ajax
// 		$.ajax({
// 			url:'<?php echo site_url("ajax/ongkos_kirim")?>',
// 			type:'POST',
// 			data:{paket:paket},
// 			success:function(response){
// 				$('#ongkos_kirim').html(response);
// 			},
// 			error:function(){
// 				$('#ongkos_kirim').html('<center>terjadi masalah</center>');
// 			}
// 		});
// 	}
//</script>

<script type="text/javascript">
//     $("#ongkir").change(function(){
//         var paket = {paket:$("#ongkir").val()};
//         $.ajax({
//             type: "POST",
//             url : "<?php echo site_url('ajax/ongkos_kirim'); ?>",
//             data: paket,
//             success: function(msg){
//                 $('#ongkos_kirim').html(msg);
//             }
//         });
//     });
// </script>
<script charset="utf-8">
   //yussan script
   function hitungTotalOngkir(ongkir){
      var totalToko = '<?php echo $totalToko;?>';//mendapatkan total toko
      totalToko = parseInt(totalToko);//parsing ke integer
      var totalOngkir = ongkir * totalToko;
      totalOngkir = parseInt(totalOngkir);//parsing ke integer
      //set total ongkir attribute
      $('#totalOngkir').attr('name',totalOngkir);//[worked]
      //print total attribute -> with number format
      $('#totalOngkir').html(totalOngkir);
      //ubah total semua
      var TotalBiayaSemua = <?php echo $TotalBiayaSemua;?>;
      $('#totalbiayasemua').val(TotalBiayaSemua + totalOngkir);
   }
</script>
