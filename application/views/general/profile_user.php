<?php $biodata = array($biodata); 
	foreach ($biodata as $row) { ?>
<script type="text/javascript">
	//set default provinsi, kota dan kecamatan
	$(document).ready(function(){
		// alert();
		$('#provinsi').val('<?php echo $row["id_provinsi"]?>');
		$('#inputkabupaten').val('<?php echo $row["id_kota"]?>');
		// $('#input_kecamatan').val('<?php echo $row["id_kecamatan"]?>');
	});
</script>
<section id="detail-profile" class="container">
	<div class="row">

		<div class="col-sm-6"><!--Thumbail Profile-------->
			<div class="portfolio-item"><!------Thumnail Poto-------->
				<div class="item-inner margin20">
					<img class="img-responsive" src="<?php echo base_url('assets/img/photo/'.$row['img_user']);?>" alt="">
					<div class="overlay">
						<a class="preview btn btn-danger" title="<?php echo $row['nama']; ?>" href="<?php echo base_url('assets/img/photo/'.$row['img_user']);?>" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
					</div>
				</div>
			</div><!---/thumbnail produk-->
			<?php echo form_open_multipart('proses_ubah/foto'); ?><!--Ubah Foto PP-->
				<button type="button" class="btn btn-lg btn-block bold btn-warning" data-toggle="popover" data-html="true" data-placement="bottom" data-content="<div><input type=file name=foto class=col-xs-12 style='overflow:hidden;padding:0;'><button type=submit class='btn btn-primary pull-right' style='margin-bottom: 10px'>Upload</button></div>" title="Pilih file..">
					<span class="icon-user"></span> Ubah Foto
				</button>
			</form><!--Ubah Foto PP-->
		</div><!--/Thumbnail produk &detail-------->

		<div class="col-sm-6"><!-----Detail Profile---------------->
			<?php echo form_open('proses_ubah/biodata'); ?>
			<div class="form-horizontal" action="#" method="post" accept-charset="utf-8">

				<h3 class="">Ubah Biodata Diri</h3>
				<hr>
				<div class="form-group"><!----nama---->
					<label style="text-align: left; " class="col-sm-4 control-label" for="nama" >Nama Lengkap</label>
					<div class="col-sm-8">
						<input class="form-control" id="formreg" name="nama" value="<?php echo $row['nama']; ?>" type="text" >
						<label style="font-weight: normal;"></label>
						<input name="id_user" type="hidden" value="<?php echo $row['id_user']; ?>">
					</div>
				</div><!--/nama------>

				<div class="form-group"><!----nama---->
					<label style="text-align: left; " class="col-sm-4 control-label" for="nama"><?php if ($row['status'] === 'penjual') { echo 'Nama Toko'; } else { echo 'Nama Panggilan'; }//start if stok=0 ?></label>
					<div class="col-sm-8">
						<input class="form-control" id="formreg" name="username_user" value="<?php echo $row['username_user']; ?>" type="text" >
						<label style="font-weight: normal;">*<?php if ($row['status'] === 'penjual') { echo 'Nama Toko'; } else { echo 'Nama Panggilan'; }//start if stok=0 ?> maksimal 15 karakter</label>
					</div>
				</div><!--/nama------>
				<!-- <div class="form-group"><!---taggal lahir-->
					<!-- <label style="text-align: left;" class="col-sm-4 control-label text-left" for="username">Tanggal Lahir</label>
					<div class="col-sm-8">
						<div class='col-sm-8'>
							<div class="form-group">
								<div class='input-group date' id='datetimepicker5'>
									<input type='date' class="form-control" data-date-format="YYYY/MM/DD"/>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<script type="text/javascript">
						$(function () {
							$('#datetimepicker5').datetimepicker({
								pickTime: false
							});
						});
						</script>
					</div> -->
				<!-- </div> --><!------/tanggal lahir-------->
				<div class="form-group"><!---email---->
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="email">Email</label>
					<div class="col-sm-8">
						<input class="form-control" id="formreg" name="email" value="<?php echo $row['email']; ?>" type="text" >
						<label style="font-weight: normal;">*Silahkan isikan email yang masih aktif</label>
					</div>
				</div><!------/email-------->
				<div class="form-group"><!---Tlp------>
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="hp">HP</label>
					<div class="col-sm-8">
						<input class="form-control" id="formreg" name="telpon" value="<?php echo $row['telpon']; ?>" type="text" >
						<label style="font-weight: normal;">*Isikan nomor hp yang aktif saat ini, Format nomor HP/telpon adalah +628123456</label>
					</div>
				</div><!------/Tlp-------------->
				<div class="form-group"><!---Alamat------------>
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="alamat">Alamat</label>
					<div class="col-sm-8">
						<textarea class="form-control" rows="3" name="alamat" placeholder="<?php echo $row['alamat']; ?>"><?php echo $row['alamat']; ?></textarea>
						<label style="font-weight: normal;">*Isikan alamat lengkap anda</label>
					</div>
				</div><!------/Alamat-------------------------->
				<!---Povinsi-->
			<!---Povinsi-->
				<div class="form-group" style="<?php if ($row['status'] === 'penjual') { echo 'display:none;'; } else { echo ''; }//start if stok=0 ?>">
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="hp">Provinsi</label>
					<div class="col-sm-6">
						<select id="provinsi" name="provinsi" class="form-control"><!-- onchange="return $('#kecamatan').html('');"  -->
							<option value="" selected="1">Pilih Provinsi</option>
							<?php foreach ($provinsi as $rowi) { ?>
							<option value="<?php echo $rowi->id_prov; ?>"><?php echo $rowi->provinsi; ?></option>
							<?php } ?>
						</select>
					</div>
					<label class="col-md-12 control-label text-danger"><?php echo form_error('provinsi'); ?></label>
				</div>

				<div id="kabupaten" style="<?php if ($row['status'] === 'penjual') { echo 'display:none;'; } else { echo ''; }//start if stok=0 ?>">
					<div class="form-group">
						<label class="col-md-4 control-label">Kabupaten / Kota</label>
						<div class="col-md-6">
							<!-- #kabupaten digunakan untuk menampilkan #kecamatan melalui ajax -->
							<select name="kabupaten" id="inputkabupaten" class="form-control">
								<?php foreach ($kab_kota as $kb) { ?>
					            	<option value="<?php echo $kb->id_kota; ?>"><?php echo $kb->kota; ?></option>
					            <?php } ?>
							</select>
						</div>
						<label class="col-md-4 control-label text-danger"><?php echo form_error('kabupaten'); ?></label>
					</div>
				</div>

				<div id="kecamatan" style="<?php if ($row['status'] === 'penjual') { echo 'display:none;'; } else { echo ''; }//start if stok=0 ?>">
					<div class="form-group">
						<label for="inputPassword3" class="col-md-4 control-label">Kecamatan</label>
						<div class="col-md-6">
							<input name="kecamatan" type="text" class="form-control" id="kecamatan" placeholder="Ketikan Kecamatan anda" value="<?php echo $row['id_kecamatan'];?>">
						</div>
						<label class="col-md-4 control-label text-danger"><?php echo form_error('kecamatan'); ?></label>
					</div>
				</div>

				<div class="form-group" style="<?php if ($row['status'] === 'penjual') { echo 'display:none;'; } else { echo ''; }//start if stok=0 ?>"><!---Kodepos------------------------>
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="kodepos">Kode Pos</label>
					<div class="col-sm-8">
						<input class="form-control" id="formreg" name="kode_pos" value="<?php echo $row['kode_pos']; ?>" type="text" <?php //if ($row['status'] === 'penjual') { echo 'disabled="disabled"'; } else { echo ''; }//start if stok=0 ?>>
						<label style="font-weight: normal;"></label>
					</div>
				</div><!------/Kodepos------------>

				<?php if ($row['status'] === 'penjual') { ?>
				<div class="form-group" style="">
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="PIN">PIN SMS</label>
					<div class="col-sm-8">
						<input class="form-control" id="formreg" name="PIN" value="<?php echo $row['PIN']; ?>" type="text">
						<label style="font-weight: normal;"></label>
					</div>
				</div>
				<?php } ?>


				<div class="form-group"><!---Password utk ubahdata------------------------>
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="password">Password</label>
					<div class="col-sm-8">
						<button name="changePass" data-toggle="modal" data-target="#myChgPass" type="button" class="btn btn-danger btn-md bold"><span class="glyphicon glyphicon-cog"></span>Ubah Password?</button>
					</div>
				</div><!------/Password------------><hr>
				<button name="simpan" type="submit" class="btn btn-primary btn-lg bold"><span class="glyphicon glyphicon-ok"></span> Simpan</button>


			</div>
		</form>
		</div><!--detail produk---->


		<div class="blog col-sm-12">

		</div>


	</div>
</section>
<?php } ?>
