<section id="tambah_produk" class="container">
	<div class="row">
		<!-- Modal Register -->
		<div id="" class="" >
			<div class="modal-dialog">
				<div class="modal-content panel panel-info">
					
					<div class="modal-header panel-heading">
	                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	                    <h3 class="modal-title" id="myModalLabel">Tambah Produk</h3>
	                </div>
	                <!---------Form Reg-------------->
	                <div class="panel-body ">
	                     <?php echo form_open_multipart('proses/proses_tambah_produk'); ?>  
	                         <div class="form-horizontal" >
	                            <div class="form-group">
	                                <label class="col-md-4 control-label">Gambar produk</label>                     
				                    <div class="col-md-6">
				                    	<input name="foto" class="form-control" type="file">
				                    	<p>*Ukuran gambar yang dianjurkan adalah 320px x 240px
				                    		dan besar file kurang dari 1MB
				                    	</p>
				                    	<p>*Gambar ini akan dijadikan tampilan thumbnail pada produk
				                    	</p>
				                    	<p>*Gambar bisa ditambahkan pada menu profile > edit produk
				                    	</p>
				                    </div>
	                                <label class="col-md-12 col-md-12 control-label text-danger"><?php echo form_error('upload_picture'); ?></label>
	                            </div>
	                            <div class="form-group">
	                                <label class="col-md-4 control-label">Nama Produk</label>
	                                <div class="col-md-6">
	                                    <input class="form-control" placeholder="Nama Produk" name="nama_produk" type="text" >
	                                </div>
	                                <label class="col-md-12 col-md-12 control-label text-danger"><?php echo form_error('nama_produk'); ?></label>
	                            </div>
	                            <div class="form-group">
	                                <label for="inputEmail3" class="col-md-4 control-label">Stok</label>
	                                <div class="col-md-6">
	                                    <input class="form-control" placeholder="Isikan stok produk" name="stok_produk"  type="text">
										<label style="font-weight: normal;">*Isikan stok produk hanya dengan angka</label>
	                                </div>
	                                <label class="col-md-12 control-label text-danger"><?php echo form_error('stok_produk'); ?></label>
	                            </div>
	                            <div class="form-group">
	                                <label for="inputPassword3" class="col-md-4 control-label">Harga</label>
	                                <div class="col-md-6">
	                                    <input class="form-control" placeholder="Isikan Harga Produk" name="harga_produk" type="text">
										<label style="font-weight: normal;">*Isikan Harga produk hanya dengan angka</label>
	                                </div>
	                                <label class="col-md-12 control-label text-danger"><?php echo form_error('harga_produk'); ?></label>
	                            </div>
	                            <div class="form-group">
	                                <label for="inputPassword3" class="col-md-4 control-label">Berat Produk</label>
	                                <div class="col-md-6">
	                                    <input class="form-control" placeholder="Isikan berat Produk" name="berat_produk" type="text">
										<label style="font-weight: normal;">*Isikan Berat produk hanya dengan angka dan dalam satuan Gram(gr)</label>
	                                </div>
	                                <label class=" col-md-12 control-label text-danger"><?php echo form_error('berat_produk'); ?></label>
	                            </div>
	                            <div class="form-group">
	                                <label class="col-md-10 control-label" style="text-align: left;">Katagori dan Jenis Produk</label>
									<div class="form-group" style="">
										<label class="col-sm-4 control-label text-left">Katagori Produk</label>
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
										<!-- <div class="form-group">
											<label for="inputJenisproduk" class="col-md-4 control-label">Jenis Produk</label>
											<div class="col-md-8">
												<!-- #kabupaten digunakan untuk menampilkan #kecamatan melalui ajax 
												<select name="jenis_produk" id="inputjenisproduk" class="form-control">
													<?php foreach ($jenis_produk as $jp) { ?>
													<option value="<?php echo $jp->katagori_produk_id; ?>"><?php echo $jp->nama_jenis_produk; ?></option>
													<?php } ?>
												</select>
											</div>
											<label class="col-md-4 control-label text-danger"><?php echo form_error('jenis_produk'); ?></label>
										</div> -->
									</div>
	                                
	                            </div>
	                            <div class="form-group">
	                                <label class="col-md-4 control-label">Deskripsi</label>
	                                <div class="col-md-6">
		            					<textarea class="form-control" placeholder="Isikan deskripsi" name="deskripsi_produk" rows="3" ></textarea>
		            				</div>
	                                <label class="col-md-12 control-label text-danger"><?php echo form_error('deskripsi_produk'); ?></label>
	                            </div>

	                            <div class="form-group">
	                                <div class="col-md-offset-4 col-md-9">
	                             
	                                    <button type="submit" name="daftar" id="daftar" class="btn btn-primary btn-lg bold"><i class="glyphicon glyphicon-plus-sign"></i>  Tambah Produk</button>
	                                </div>
	                            </div>
	           
	                         </div>
	                        </form>
	                </div>
	                <hr style="margin: 0; padding: 0;">
	                <!---------/Form Reg-------------->
	                <div class="modal-footer">
	                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- /Modal Register -->
    </div>
</section>
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







