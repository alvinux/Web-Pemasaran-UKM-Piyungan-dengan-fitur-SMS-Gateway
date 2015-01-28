<?php $biodata = array($biodata); 
	foreach ($biodata as $row) { ?>
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
			<form class="form-horizontal" action="#" method="post" accept-charset="utf-8">            

				<h3 class="">Ubah Biodata Diri</h3>
				<hr>
				<div class="form-group"><!----nama---->
					<label style="text-align: left; " class="col-sm-4 control-label" for="nama">Nama</label>
					<div class="col-sm-8">
						<input class="form-control" id="formreg" value="<?php echo $row['nama']; ?> " type="text" >
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
						<input class="form-control" id="formreg" value="<?php echo $row['email']; ?>" type="text" >
					</div>
				</div><!------/email-------->
				<div class="form-group"><!---Tlp------>
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="hp">HP</label>
					<div class="col-sm-8">
						<input class="form-control" id="formreg" value="<?php echo $row['telpon']; ?> " type="text" >
					</div>
				</div><!------/Tlp-------------->
				<div class="form-group"><!---Alamat------------>
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="alamat">Alamat</label>
					<div class="col-sm-8">
						<textarea class="form-control" rows="3" placeholder="<?php echo $row['alamat']; ?>"></textarea>
					</div>
				</div><!------/Alamat-------------------------->
				<!---Povinsi-->
				<div class="form-group">
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="provinsi">Provinsi</label>
					<div class="col-sm-8">
						<div class="">
							<select name="selecter_basic" class="selecter_1" <?php if ($row['status'] === 'penjual') { echo 'disabled="disabled"'; } else { echo ''; }//start if stok=0 ?>>
								<optgroup label="Group One">
									<option value="1">One</option>
									<option value="2">Two</option>
									<option value="3">Three</option>
								</optgroup>
								<optgroup label="Group One">
									<option value="4">Four</option>
									<option value="5">Five</option>
									<option value="6">Six</option>
									<option value="7">Seven</option>
								</optgroup>
								<optgroup label="Group Three">
									<option value="8">Eight</option>
									<option value="9">Nine</option>
									<option value="10">Ten</option>
								</optgroup>
							</select>
						</div>
					</div>
				</div><!--/Provinsi-->
				<!---Kabupaten/kota-->
				<div class="form-group">
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="kota">Kabupaten / Kota</label>
					<div class="col-sm-8">
						<div class="">
							<select name="selecter_basic" class="selecter_1">
								<optgroup label="Group One">
									<option value="1">One</option>
									<option value="2">Two</option>
									<option value="3">Three</option>
								</optgroup>
								<optgroup label="Group One">
									<option value="4">Four</option>
									<option value="5">Five</option>
									<option value="6">Six</option>
									<option value="7">Seven</option>
								</optgroup>
								<optgroup label="Group Three">
									<option value="8">Eight</option>
									<option value="9">Nine</option>
									<option value="10">Ten</option>
								</optgroup>
							</select>
						</div>
					</div>
				</div><!--/Kabupaten / Kota-->
				<!---Kecamatan-->
				<div class="form-group">
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="kota">Kecamatan</label>
					<div class="col-sm-8">
						<div class="">
							<select name="selecter_basic" class="selecter_1">
								<optgroup label="Group One">
									<option value="1">One</option>
									<option value="2">Two</option>
									<option value="3">Three</option>
								</optgroup>
								<optgroup label="Group One">
									<option value="4">Four</option>
									<option value="5">Five</option>
									<option value="6">Six</option>
									<option value="7">Seven</option>
								</optgroup>
								<optgroup label="Group Three">
									<option value="8">Eight</option>
									<option value="9">Nine</option>
									<option value="10">Ten</option>
								</optgroup>
							</select>
						</div>
					</div>
				</div><!--/Kecamatan-->
				<div class="form-group"><!---Kodepos------------------------>
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="kodepos">Kode Pos</label>
					<div class="col-sm-8">
						<input class="form-control" id="formreg" value="<?php echo $row['kode_pos']; ?>" type="text"  <?php if ($row['status'] === 'penjual') { echo 'disabled="disabled"'; } else { echo ''; }//start if stok=0 ?>>
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
			</form>
		</div><!--detail produk---->


		<div class="blog col-sm-12">

		</div>


	</div>
</section>
<?php } ?>