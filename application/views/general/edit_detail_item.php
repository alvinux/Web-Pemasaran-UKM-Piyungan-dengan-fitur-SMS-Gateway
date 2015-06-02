<?php if (!empty($detail_produk)) { ?> <!--Jika detail PRoduk kosong-->
	<?php $detail_produk = array($detail_produk); ?>
	<?php foreach ($detail_produk as $row) { ?> <!--foreach detail produk-->
		<?php if ($row['penjual_id'] != $this->session->userdata('login_user')['id_user']) { //jika di penjual sama degan id penjual produk
			echo '<script>';
			echo "alert('Produk ini bukan milik anda..');";
			echo "window.location='../home/profile_user'";
			echo '</script>';
		} else {?> <!--else jika di penjual sama degan id penjual produk-->
		
		<!--ajax katagori dan jenis produk-->
		<script type="text/javascript">
			//set default provinsi, kota dan kecamatan
			$(document).ready(function(){
				// alert();
				$('#katagoriproduk').val('<?php echo $row["katagori_id"]?>');
				$('#jenis_produk').val('<?php echo $row["jenis_produk_id"]?>');
			});
		</script>
		<!--ajax katagori dan jenis produk-->


<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
              <h1><?php echo $row['nama_produk']; ?></h1>
                <p>Halaman Edit Detail Produk Penjual</p>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Katagori</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="detail-item" class="container">
	<div class="row">

		<div class="panel panel-primary">
			<div class="modal-header panel-heading">
				 <button onclick="hapusProduk('<?php echo $row['id_produk']; ?>')" type="button" class="btn btn-danger" style="float: right;"><i class="glyphicon glyphicon-remove"></i> Hapus Produk</button>
				<h4 class="modal-title">Ubah Detail Produk</h4>
			</div>
			<div class="modal-body" style="margin-top: 15px;">
				

				<div class="row">
					<div class="col-md-6" style="border-right: 1px solid #E5E5E5;">
						<div class="row">
							<label class="pull-left col-md-12 ">Gambar 1</label>
		                    <div class="col-md-6">
		                    	<div class="thumbnail">
		                    		<img class="img-rounded" src="<?php echo base_url('doc/themes/public/img/produk/'.$row['img_produk']); ?>">
		                    	</div>
		                    </div> 
		                    <?php echo form_open_multipart('proses_ubah/foto_utama_produk'); ?><!--Ubah Foto Produk-->
		                    <div class="col-md-6">
		                    	<input name="foto" class="form-control" type="file">
		                    	<p>*Gambar Utama ini Hanya dapat dirubah, tidak dapat dihapus </p>
		                    	<p>*Ukuran gambar yang dianjurkan adalah 320px x 240px
		                    		dan besar file kurang dari 1MB
		                    	</p>
		                    	<input name="id_produk" type="hidden" value="<?php echo $row['id_produk']; ?>">
								<button type="Submit" class="btn btn-success">Ubah</button>
		                    </div>
		                	</form>
		    			</div>

		    			<?php $i = 2; ?>
		    			<?php foreach ($gambar as $gbr) { ?>
						<div class="row">
							<label class="pull-left col-md-12 ">Gambar <?php echo $i;?></label>
		                    <div class="col-md-6">
		                    	<div class="thumbnail">
		                    		<img class="img-rounded" src="<?php echo base_url('doc/themes/public/img/produk/'.$gbr['gambar']); ?>">
		                    	</div>
		                    </div> 
		                    <?php echo form_open_multipart('proses_ubah/foto_produk'); ?><!--Ubah Foto Produk-->
		                    <div class="col-md-6">
		                    	<input name="foto" class="form-control" type="file">
		                    	<p>*Ukuran gambar yang dianjurkan adalah 320px x 240px
		                    		dan besar file kurang dari 1MB
		                    	</p>
		                    	<input name="id_gambar" type="hidden" value="<?php echo $gbr['id_gambar']; ?>">

		                    	<button onclick="hapusImgProduk('<?php echo $gbr['id_gambar']; ?>')" type="button" class="btn btn-danger" >Hapus</button>
								<button type="submit" class="btn btn-success">Ubah</button>
		                    </div>
		                	</form><!--/ubah foto produk-->
		    			</div>
		    			<?php $i++;?><!--End foreach-->
		    			<?php }?><!--End foreach-->
		    			<div class="pull-right">
                        	<a href="#modalUpload" class="btn btn-primary" data-toggle="modal"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Photo</a>
                    		<?php //print_r($i);
                    		if ($i < 5) {
                    			$produk['id_produk'] = $row['id_produk'];
                    			// print_r($produk);
                    			$this->load->view('general/modal/modal_upload_foto', $produk);
                    		} else { ?>
                    		 <!-- Modal Upload goto -->
						    <div id="modalUpload" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						        <div class="modal-dialog">
						            <div class="modal-content panel panel-info">
						                <div class="modal-header panel-heading">
						                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
						                    <h3 class="modal-title" id="myModalLabel">Terjadi Kesalahan</h3>
						                </div>
						                <div class="panel-body">
						                    <h3>Maaf, Maksimal 4 foto/gambar dalam 1 produk</h3>
						                </div>
						                <hr style="margin: 0; padding: 0;">
						                <div class="modal-footer">
						                    <button type="button" class="btn" data-dismiss="modal" >Close</button>
						                </div>
						            </div>
						        </div>
						    </div>
						    <!-- /Modal Upload FOto -->	
                    	<?php }?>
            
                    	</div>
					</div>

					<?php echo form_open('proses_ubah/detail_produk'); ?>
		            <div class="col-md-6" style="border-right: 1px solid #E5E5E5;">
		            	<label>Nama Produk</label>
						<input class="form-control" placeholder="Nama Produk" name="nama_produk" type="text" value="<?php echo $row['nama_produk']; ?>">
						<br>
						
						<label>Stok</label>
						<input class="form-control" placeholder="Isikan stok produk" name="stok_produk" value="<?php echo $row['stok_produk']?>" type="text">
						<label style="font-weight: normal;">*Isikan stok produk hanya dengan angka</label>
						<br>
						<br>
						<label>Harga</label>
						<input class="form-control" placeholder="Isikan Harga Produk" name="harga_produk" value="<?php echo $row['harga_produk']?>" type="text">
						<label style="font-weight: normal;">*Isikan Harga produk hanya dengan angka</label>
						<br>
						<br>
						<label>Berat</label>
						<input class="form-control" placeholder="Isikan berat Produk" name="berat_produk" value="<?php echo $row['berat_produk']?>" type="text">
						<label style="font-weight: normal;">*Isikan Berat produk hanya dengan angka dan dalam satuan Gram(gr)</label>
						<br>
						<br>
						<label>Katagori dan Jenis Produk</label>
						<div class="form-group" style="">
							<label style="text-align: left;" class="col-sm-4 control-label text-left" >Katagori Produk</label>
							<div class="col-sm-6">
								<select id="katagoriproduk" name="katagoriproduk" class="form-control">
									<option value="" selected="1">Pilih Katagori</option>
									<?php foreach ($katagoriproduk as $rowi) { ?>
									<option value="<?php echo $rowi->id_katagori; ?>"><?php echo $rowi->nama_katagori; ?></option>
									<?php } ?>
								</select>
							</div>
							<label class="col-md-12 control-label text-danger"><?php echo form_error('katagoriproduk'); ?></label>
						</div>
						<div id="jenis_produk" style="">
							<div class="form-group">
								<label for="inputJenisproduk" class="col-md-4 control-label">Jenis Produk</label>
								<div class="col-md-6">
									<!-- #kabupaten digunakan untuk menampilkan #kecamatan melalui ajax -->
									<select name="jenis_produk" id="inputjenisproduk" class="form-control">
										<?php if ($jenis_produk != 0) { ?>
											<?php foreach ($jenis_produk as $jp) { ?>
											<option value="<?php echo $jp->katagori_produk_id; ?>"><?php echo $jp->nama_jenis_produk; ?></option>
											<?php } ?>
										<?php } else {} ?>
										
									</select>
								</div>
								<label class="col-md-4 control-label text-danger"><?php echo form_error('jenis_produk'); ?></label>
							</div>
						</div>

			
					
						<div class="col-sm-12">
			            	<label class="">Deskripsi</label>
			            	<textarea class="form-control" placeholder="Isikan deskripsi" name="deskripsi_produk" rows="3" ><?php echo $row['deskripsi_produk']; ?></textarea>
		            	</div>
		            	<input type="hidden" name="id_produk" value="<?php echo $row['id_produk'];?>"><!-- id produk -->
		            	<div class="pull-right" style="padding-top: 20px;">
			            	<!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Hapus Produk</button> -->
							<button type="submit" class="btn btn-success">Simpan Perubahan data</button><br>
						</div>
		            </div>
		        	</form><!--Detail PRoduk-->
				</div>
			</div>
			<hr style="margin: 20px; padding: 0;">
			<div class="modal-footer">
				Response Comments
			</div>
		</div>
		<!--ajax katagori dan jenis produk-->
		<script type="text/javascript">
		    $("#katagoriproduk").change(function(){
		        var id_katagori = {id_katagori:$("#katagoriproduk").val()};
		        $.ajax({
		            type: "POST",
		            url : "<?php echo site_url('home/pilih_jenis_produk'); ?>",
		            data: id_katagori,
		            success: function(msg){
		                $('#jenis_produk').html(msg);
		            }
		        });
		    });
		</script>
		<!--ajax katagori dan jenis produk-->





	
			
<!-- 
						<div id="comments">
							<div id="comments-list">
							<?php if (!empty($testimonial)) { ?>
								<h3>Testimonial</h3>


								<?php foreach ($testimonial as $testi) { ?>
								<div class="media">
									<div class="pull-left">
										<img class="avatar img-circle" style="max-width: 50px" src="<?php echo base_url('assets/img/photo/'.$testi['img_user']);?>" alt="">
									</div>
									<div class="media-body">
										<div class="well">
											<div class="media-heading">
												<strong><?php echo $testi['nama']; ?></strong>&nbsp; <small><?php echo date('d F, Y - H:i', strtotime($testi['waktu'])); ?></small>
											</div>
											<p><?php echo $testi['pesan']; ?></p>
											<a class="pull-right" href="#"><i class="icon-repeat"></i> Reply</a>
										</div><hr>
									</div>
								</div><!--/.media
								<?php } ?>
							<?php } else { ?>
								<h3>Belum ada Testimonial..</h3>
							<?php } ?>
								
							</div><!--/#comments-list-->   

	</div><!--/.row-->
</section>
<?php } ?> <!--Else jika id penjual sama dengan id penjual produk-->
<?php	} ?> <!--foreach detail produk-->
<?php } else { ?> <!-- else Jika detail PRoduk kosong-->
<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
              <h1>Produk Tidak Ditemukan..</h1>
           
                <p>item product not found..</p>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Katagori</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<h3 class="container">Maaf Produk yang anda cari tidak tersedia atau tidak ditemukan...</h3><br><br><br>
<?php }  ?> <!-- else Jika detail PRoduk kosong-->

<script type="text/javascript">
function hapusImgProduk(id)
{
    var sure = confirm('Anda Yakin ingin menghapus gambar?');
    if(sure == 1) {
        //show modal
        // $('#customlabel').html('Hapus Bank');
        // $('#custombody').html('<center>loading</center>');
        // $('#custommodal').modal('show')
        //start ajax
        $.ajax({
            url:'<?php echo site_url("ajax/hapus_imgProduk")?>',
            type:'POST',
            data:{id:id},
            success:function(response){
                // window.location="<?php echo base_url('home/detailproduk/'); ?>";
                // window.location="<?php echo $this->agent->referrer(); ?>";
                document.location.reload(true);
                // window.location='".$this->agent->referrer()."'
            },
            error:function(){
                alert('Gagal menghapus Gambar');
            }
        });
    }
}
</script>

<script type="text/javascript">
	function hapusProduk(id)
	{
	    var sure = confirm('Anda Yakin ingin menghapus Produk ini?');
	    if(sure == 1) {
	        $.ajax({
	            url:'<?php echo site_url("ajax/hapusProduk")?>',
	            type:'POST',
	            data:{id:id},
	            success:function(response){
	            	alert('Berhasil Menghapus Produk');
	                window.location="<?php echo base_url('home/profile_user'); ?>";
	            },
	            error:function(){
	                alert('Gagal menghapus Produk');
	            }
	        });
	    }
	}
</script>