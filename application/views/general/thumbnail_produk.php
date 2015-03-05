<?php echo form_open('cart_control/add_cart_from_home');?>
<?php foreach ($datalist as $row) { ?>

<div class="col-sm-3">
	<div class="thumbnail" style="padding: 0;">
		<!--Gambar Thumbnail Produk-->
		<img class="img-rounded" style="padding: 6px;" src="<?php echo base_url('doc/themes/public/img/produk/' . $row['img_produk']); ?>">
		<?php if ($row['stok_produk'][0]) {//start if stok=0 ?>
		<span class="stock">Stok <?php echo $row['stok_produk']; ?> Unit</span>
		<?php } else { ?>
		<span class="stock red">Stok Kosong</span>
		<?php }//end if stok=0 ?>
		<!--/Gambar Thumbnail Produk-->

		<!--Deskripsi---->
		<div class="caption text-center" style="background-color: rgb(241, 241, 241); margin-left: 0; padding-left: 0;">
			<h3><b><?php echo $row['nama_produk']; ?></b></h3><!--Judul/nama barang-->
			<p style="color:red;"><span>Rp </span><span><?php echo number_format($row['harga_produk']) . '.00'; ?></span></p><!--Harga-->


			<p><a href="<?php echo site_url('home/detailproduk/' . $row['id_produk']); ?>" class="btn btn-default"  role="button">Detail</a> 
				<button type="submit" class="btn btn-warning" role="button">Beli</button>
			</p>
	
		</div>
		<!--/Deskripsi---->

		<div class="row">
			<small class="col-xs-6 col-xs-offset-3 ellipsis center" style="">
				Penjual : <a href="#"><?php echo $row['nama_penjual']; ?></a>
			</small>
		</div>
	</div>
</div><!--close thumbnail group-->
<?php } ?>
</form>







<!-- <div class="col-sm-3">
	<div class="thumbnail" style="padding: 0;">
		
		<img class="img-rounded" style="padding: 6px;" src="http://localhost/Acer/doc/themes/public/img/produk/thumbnail-1.jpg">
				<span class="penjual" style="
    max-width: 200px;
    /* text-align: left; */
"><small class="col-xs-12 ellipsis" style="
    padding-left: 0;
">
				Penjual : <a href="#">Penjual Bin Penjual ................. ....................</a>
			</small></span>
				

		
		<div class="caption col-sm-8" style="background-color: rgb(241, 241, 241); margin-left: 0; padding-left: 0;margin: 0;padding: 0;height: 75px;">
			<p style="
    text-align: left;
    padding-left: 10px;
    padding-top: 10px;
    font-weight: bold;
    font-style: inherit;
">Keripik Kentang</p>
			<p style="color:red;font-size: 20px;text-align: left;padding-left: 10px;font-weight: bold;font-style: italic;"><span>Rp </span><span>20,000.00</span></p>




			
	
		</div><div style="
    /* font-size: 13px; */  
    /* font-weight: bold; */  
    /* border: solid 2px #DD0000; */  
    border-radius: 0 0 7px 0;  
    /* position: absolute; */  
    /* left: 10px; */  
    /* top: 200px; */  
    padding: 0px;  
    /* background-color: #FFFFFF; */
    margin: 0;
    height: 75px;
" class="col-sm-4
         text-center"><p style="
    /* color: red; */
    font-size: 20px;
    /* text-align: left; */
    /* padding-top: 10px; */font-weight: bold;
    background-color: rgb(245, 245, 245);
    height: 75px;
    margin: 0;
    border-left: solid rgb(212, 212, 212);
"><span style="
    font-size: 13px;
    font-style: italic;
">Stok</span><br><span style="
    padding-top: 0;
">300</span><p style="
    font-size: 13px;;
    margin: 0;
" class="">ribu ++</p></p></div>
	

		<div class="row">
  <div class="col-md-12" style="
    margin-bottom: 0;
">
  
  <a href="http://localhost/Acer/home/detailproduk/1" class="btn btn-primary col-xs-6" role="button" style="
    border-radius: 0;
">Detail</a> 
				<button type="submit" class="btn btn-danger col-xs-6" role="button" style="
    border-radius: 0;
">Beli</button>
			
			</div>
		</div>
	</div>
</div>




 -->







<div class="col-sm-3">
	<div class="thumbnail" style="padding: 0;">
		<!--Gambar Thumbnail Produk-->
		<img class="img-rounded" style="padding: 6px;" src="http://localhost/Acer/doc/themes/public/img/produk/thumbnail-1.jpg">
				<span class="penjual" style="
    max-width: 200px;
    /* text-align: left; */
"><small class="col-xs-12 ellipsis" style="
    padding-left: 0;
">
				Penjual : <a href="#">Penjual Bin Penjual ................. ....................</a>
			</small></span>
				<!--/Gambar Thumbnail Produk-->

		<!--Deskripsi---->
		<div class="caption col-sm-8 col-sm-height" style="background-color: rgb(241, 241, 241); margin-left: 0; padding-left: 0;margin: 0;padding: 0;/* height: 100%; */">
			<p style="
    text-align: left;
    padding-left: 10px;
    padding-top: 10px;
    font-weight: bold;
    font-style: inherit;
">Keripik Kentang kintung a,sdasndkasd asd asd asdasd</p><!--Judul/nama barang-->
			<p style="color:red;font-size: 20px;text-align: left;padding-left: 10px;font-weight: bold;font-style: italic;"><span>Rp </span><span>20,000.000 000 000 000 0 0 0 </span></p>

<!--Harga-->


			
	
		</div><div style="
    /* font-size: 13px; */  
    /* font-weight: bold; */  
    /* border: solid 2px #DD0000; */  
    /* border-radius: 0 0 7px 0; */  
    /* position: absolute; */  
    /* left: 10px; */  
    /* top: 200px; */  
    padding: 0px;  
    /* background-color: #F1F1F1; */
    margin: 0;
    height: 100%;
    /* padding: 0; */
    background-color: rgb(245, 245, 245);
    border-left: solid rgb(212, 212, 212);
" class="col-sm-4 col-sm-height
         text-center"><p style="
    /* color: red; */
    font-size: 20px;
    /* text-align: left; */
    /* padding-top: 10px; */font-weight: bold;
    /* background-color: rgb(245, 245, 245); */
    height: 75px;
    margin: 0;
    /* border-left: solid rgb(212, 212, 212); */
"><span style="
    font-size: 13px;
    font-style: italic;
">Stok</span><br><span style="
    padding-top: 0;
">300</span><p style="
    font-size: 13px;;
    margin: 0;
" class="">ribu ++</p></p></div>
		<!--/Deskripsi---->

		<div class="row">
  <div class="col-md-12" style="
    margin-bottom: 0;
">
  
  <a href="http://localhost/Acer/home/detailproduk/1" class="btn btn-primary col-xs-6" role="button" style="
    border-radius: 0;
">Detail</a> 
				<button type="submit" class="btn btn-danger col-xs-6" role="button" style="
    border-radius: 0;
">Beli</button>
			
			</div>
		</div>
	</div>
</div>