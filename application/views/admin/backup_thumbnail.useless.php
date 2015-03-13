<?php echo form_open('cart_control/add_cart_from_home');?>
<?php foreach ($datalist as $row) { ?>
<div class="col-sm-3">
	<div class="thumbnail" style="padding: 0;">
		<!--Gambar Thumbnail Produk-->
		<img class="img-rounded" style="padding: 6px;" src="<?php echo base_url('doc/themes/public/img/produk/' . $row['img_produk']); ?>">
		<span class="penjual" style="max-width: 200px;">
			<small class="col-xs-12 ellipsis" style="padding-left: 0;">Penjual : 
				<a href="#"><?php echo $row['nama_penjual']; ?></a>
			</small>
		</span>
		<!--/Gambar Thumbnail Produk-->
	<div class="row-same-height">
		<div class="caption col-sm-8 col-sm-height deskripsi-produk" style="">
			<p class="nama-produk" title="<?php echo $row['nama_produk']; ?>"><?php if (strlen($row['nama_produk'])>=20) {
				echo substr($row['nama_produk'], 0,19)."...";
			} else {
				echo $row['nama_produk']; 
			} ?></p><!--Judul/nama barang-->
			<p class="thumb-harga"><span>Rp </span><span><?php echo number_format($row['harga_produk']) . '.00'; ?></span></p>
		</div>
		<!--stok-->
		<?php if ($row['stok_produk'][0]) {//start if stok=0 ?>
		<div class="col-sm-4 col-sm-height text-center divstok">
			<p class="pstok">
				<span style="font-size: 12px; font-style: italic;">Stok</span>
				<br>
				<span style="padding-top: 0;"><?php echo $row['stok_produk']; ?></span>
			</p>
		</div>
			<?php } else { ?>
		<div style="background-color: #ED5565;" class="col-sm-4 col-sm-height text-center divstok">
			<p style="pstok">
				<span style="font-size: 12px; font-style: italic;">Stok</span>
				<br>
				<span style="padding-top: 0;">Kosong</span>			
			</p>
		</div>
			<?php }//end if stok=0 ?>
		</div>
	<!--/Deskripsi---->

		<div class="row">
			<div class="col-md-12" style="margin-bottom: 0;">
				<a href="http://localhost/Acer/home/detailproduk/1" class="btn btn-primary col-xs-6" role="button" style="border-radius: 0;">Detail
				</a> 
				<button type="submit" class="btn btn-danger col-xs-6 <?php if ($row['stok_produk'][0]) { echo ''; } else { echo 'disabled'; }//start if stok=0 ?>" role="button" style="border-radius: 0;">Beli</button>

			</div>
		</div>
	</div>
</div>
<?php } ?>
</form>

