<?php $biodata = array($biodata); 
	foreach ($biodata as $row) { ?>
<script type="text/javascript">
	//set default provinsi, kota dan kecamatan
	$(document).ready(function(){
		// alert();
		$('#provinsi').val('<?php echo $row["id_provinsi"]?>');
		$('#input_kabupaten').val('<?php echo $row["id_kota"]?>');
		$('#input_kecamatan').val('<?php echo $row["id_kecamatan"]?>');
	});
</script>
<section id="detail-profile" class="container">
	<div class="row">

		<div class="col-sm-6"><!--Thumbail Profile-------->
			<div class="portfolio-item"><!------Thumnail Poto-------->
				<div class="item-inner margin20">
					<img class="img-responsive" src="<?php echo base_url('assets/img/photo/'.$this->session->userdata('login_user')['img_user']);?>" alt="">
					<div class="overlay">
						<a class="preview btn btn-danger" title="<?php echo $row['nama']; ?>" href="<?php echo base_url('assets/img/photo/'.$this->session->userdata('login_user')['img_user']);?>" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
					</div>
				</div>
			</div><!---/thumbnail produk-->
			<button type="submit" class="btn btn-lg btn-block bold"><span class="icon-user"></span> Ubah Foto</button>
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
						<input name="id_user" type="hidden" value="<?php echo $row['id_user']; ?>">
					</div>
				</div><!--/nama------>

				<div class="form-group"><!----nama---->
					<label style="text-align: left; " class="col-sm-4 control-label" for="nama">Nama Panggilan</label>
					<div class="col-sm-8">
						<input class="form-control" id="formreg" name="username_user" value="<?php echo $row['username_user']; ?>" type="text" >
					</div>
				</div><!--/nama------>
				<div class="form-group"><!---taggal lahir-->
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
				</div><!------/tanggal lahir-------->
				<div class="form-group"><!---email---->
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="email">Email</label>
					<div class="col-sm-8">
						<input class="form-control" id="formreg" name="email" value="<?php echo $row['email']; ?>" type="text" >
					</div>
				</div><!------/email-------->
				<div class="form-group"><!---Tlp------>
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="hp">HP</label>
					<div class="col-sm-8">
						<input class="form-control" id="formreg" name="telpon" value="<?php echo $row['telpon']; ?>" type="text" >
					</div>
				</div><!------/Tlp-------------->
				<div class="form-group"><!---Alamat------------>
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="alamat">Alamat</label>
					<div class="col-sm-8">
						<textarea class="form-control" rows="3" name="alamat" placeholder="<?php echo $row['alamat']; ?>"><?php echo $row['alamat']; ?></textarea>
					</div>
				</div><!------/Alamat-------------------------->
				<!---Povinsi-->
			<!---Povinsi-->
				<div class="form-group">
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="hp">Provinsi</label>
					<div class="col-sm-8">
						<select onchange="return $('#kecamatan').html('');" id="provinsi" name="provinsi" class="form-control" <?php if ($row['status'] === 'penjual') { echo 'disabled="disabled"'; } else { echo ''; }//start if stok=0 ?>>
							<option value="" selected="1">Pilih Provinsi</option>
							<?php foreach ($provinsi as $rowi) { ?>
							<option value="<?php echo $rowi->id_provinsi; ?>"><?php echo $rowi->provinsi; ?></option>
							<?php } ?>
						</select>
					</div>
					<label class="col-md-12 control-label text-danger"><?php echo form_error('provinsi'); ?></label>
				</div>

				<div id="kabupaten">
					<div class="form-group">
						<label for="inputProvinsi" class="col-md-4 control-label">Kabupaten / Kota</label>
						<div class="col-md-6">
							<!-- #kabupaten digunakan untuk menampilkan #kecamatan melalui ajax -->
							<select name="kabupaten" id="inputkabupaten" class="form-control">
								<?php foreach ($kab_kota as $kb) { ?>
								<option value="<?php echo $kb->id_kab_kota; ?>"><?php echo $kb->kab_kota; ?></option>
								<?php } ?>
							</select>
						</div>
						<label class="col-md-4 control-label text-danger"><?php echo form_error('kabupaten'); ?></label>
					</div>
				</div>

				<div id="kecamatan">
					<div class="form-group">
						<label for="inputPassword3" class="col-md-4 control-label">Kecamatan</label>
						<div class="col-md-6">
						<select id="input_kecamatan" name="kecamatan" class="form-control">
								<?php foreach ($kecamatan as $kc) { ?>
								<option value="<?php echo $kc->id_kecamatan; ?>"><?php echo $kc->kecamatan; ?></option>
								<?php } ?>
							</select>
						</div>
						<label class="col-md-4 control-label text-danger"><?php echo form_error('kecamatan'); ?></label>
					</div>
				</div>

				
				<div class="form-group"><!---Kodepos------------------------>
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="kodepos">Kode Pos</label>
					<div class="col-sm-8">
						<input class="form-control" id="formreg" name="kode_pos" value="<?php echo $row['kode_pos']; ?>" type="text"  <?php if ($row['status'] === 'penjual') { echo 'disabled="disabled"'; } else { echo ''; }//start if stok=0 ?>>
					</div>
				</div><!------/Kodepos------------>
				<div class="form-group"><!---Password utk ubahdata------------------------>
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="password">Password</label>
					<div class="col-sm-8">
						<button name="changePass" data-toggle="modal" data-target="#myChgPass" type="button" class="btn btn-danger btn-md bold"><span class="glyphicon glyphicon-cog"></span>Ubah Password?</button>
					</div>
				</div><!------/Password------------><hr>
				<button name="simpan" type="submit" class="btn btn-primary btn-lg bold"><span class="glyphicon glyphicon-ok"></span> Simpan</button>

				.
			</div>
		</form>
		</div><!--detail produk---->


		<div class="blog col-sm-12">

		</div>


	</div>
</section>
<?php } ?>