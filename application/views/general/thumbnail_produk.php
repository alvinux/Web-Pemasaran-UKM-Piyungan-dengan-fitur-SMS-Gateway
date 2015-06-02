<?php echo form_open('cart_control/add_cart_from_home');?>
<?php foreach ($datalist as $row) { ?>

<div class="col-sm-3">
	<div class="thumbnail itemproduct" style="padding: 0;">
		<div style="background-color: rgb(66, 139, 202); padding: 5px 10px; margin: 0px;" class="modal-header panel-heading">
			<h6 style="margin: 0px; padding: 0px;" class="modal-title" id="myModalLabel">
				<p class="penjual" style="padding-left: 0px; margin: 0px;">Penjual : 
					<a href="<?php echo base_url('home/detail_penjual/'.$row['penjual_id']); ?>"><?php echo $row['nama_penjual']; ?>
					</a>
				</p>
			</h6>
		</div>
		<!--Gambar Thumbnail Produk-->
		<img class="img-rounded" style="padding: 6px; height: 200px;" src="<?php echo base_url('doc/themes/public/img/produk/' . $row['img_produk']); ?>">
		<!-- <span class="penjual" style="max-width: 200px;	">
			<small class="col-xs-12 ellipsis" style="padding-left: 0;">Penjual : 
				<a href="#"><?php echo $row['nama_penjual']; ?></a>
			</small> -->
		</span>
		<!--/Gambar Thumbnail Produk-->

	<div class="row-same-height portfolio-item">
		<div class="caption col-sm-8 col-sm-height" style="background-color: rgb(241, 241, 241); margin-left: 0; padding-left: 0;margin: 0;padding: 0;/* height: 100%; */">
			<p style="text-align: left;padding-left: 10px;padding-top: 10px;font-weight: bold;font-style: inherit;" title="<?php echo $row['nama_produk']; ?>">
				<?php if (strlen($row['nama_produk'])>=20) {
						echo substr($row['nama_produk'], 0,19)."...";
						} else {
							echo $row['nama_produk']; 
						} ?>
			</p><!--Judul/nama barang-->
			<p style="color:red;font-size: 15px;text-align: left;padding-left: 10px;font-weight: bold;font-style: italic; margin-bottom: 0px"><span>Rp </span><span><?php echo number_format($row['harga_produk']) . '.00'; ?></span></p>
			<!--Harga-->
		</div>
		
		<?php if ($row['stok_produk'][0]) {//start if stok=0 ?>
		<div style="padding: 0px; margin: 0; height: 100%; background-color: #428BCA; border-left: solid rgb(212, 212, 212);" class="col-sm-4 col-sm-height text-center">
			<p style="color: white; font-size: 16px; height: 75px; margin: 0;font-weight: bold;">
				<span style="font-size: 12px; font-style: italic;">Stok</span>
				<br>
				<span style="padding-top: 0;"><?php echo $row['stok_produk']; ?></span>
			</p>
		</div>
			<?php } else { ?>
		<div style="padding: 0px; margin: 0; height: 100%; background-color: #ED5565; border-left: solid rgb(212, 212, 212); " class="col-sm-4 col-sm-height text-center">
			<p style="color: white; font-size: 16px; height: 75px; margin: 0;font-weight: bold;">
				<span style="font-size: 12px; font-style: italic;">Stok</span>
				<br>
				<span style="padding-top: 0;">Kosong</span>
			</p>
		</div>
			<?php }//end if stok=0 ?>
		

		<div class="overlay" style="margin-top: 30px; opacity:0;">
            <a style="top: 0px; margin: 0px; width: 100%; height: 100%; " class="preview btn btn-danger" title="<?php echo $row['nama_produk']; ?>" href="<?php echo base_url('home/detailproduk/' . $row['id_produk']); ?>"><i class="icon-eye-open"></i></a>
        </div>

		</div>
	<!--/Deskripsi---->



		<!-- <div class="row">
			<div class="col-md-12" style="margin-bottom: 0;">
				<a href="http://localhost/Acer/home/detailproduk/1" class="btn btn-primary col-xs-6" role="button" style="border-radius: 0;">Detail
				</a> 
				<button type="submit" class="btn btn-danger col-xs-6 <?php if ($row['stok_produk'][0]) { echo ''; } else { echo 'disabled'; }//start if stok=0 ?>" role="button" style="border-radius: 0;">Beli</button>
			</div>
		</div> -->
		

	</div>
</div>
<?php } ?>
</form>

