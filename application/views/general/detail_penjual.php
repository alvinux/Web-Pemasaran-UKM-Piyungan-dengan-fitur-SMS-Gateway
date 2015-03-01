<?php $data_penjual = array($data_penjual); 
	foreach ($data_penjual as $row) { ?>
<section id="detail-profile" class="container">
	<div class="row">

	    <div class="col-md-12" style="background-color: white;">
	        <!-- Custom Tabs (Pulled to the right) -->
	        <div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	                <li class="active"><a href="#tab_1-1" data-toggle="tab">Slider</a></li>
	                <li><a href="#tab_2-2" data-toggle="tab">Tentang Kami</a></li>
	                <li><a href="#tab_2-3" data-toggle="tab">Berita</a></li>
	                <li class="dropdown">
	                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                        Dropdown <span class="caret"></span>
	                    </a>
	                    <ul class="dropdown-menu">
	                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
	                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
	                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
	                        <li role="presentation" class="divider"></li>
	                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
	                    </ul>
	                </li>
	                
	            </ul>
	            <div class="tab-content">
	            	<div class="tab-pane active" id="tab_1-1">

						<div class="col-sm-6"><!--Thumbail Profile-------->
							<div class="portfolio-item"><!------Thumnail Poto-------->
								<div class="item-inner margin20">
									<img class="img-responsive" src="<?php echo base_url('assets/img/photo/'.$row['img_user']);?>" alt="">
									<div class="overlay">
										<a class="preview btn btn-danger" title="Malesuada fames ac turpis egestas" href="<?php echo base_url(); ?>doc/themes/public/images/portfolio/full/item1.jpg" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
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
										<!-- <input class="form-control" id="formreg" value="<?php echo $row['nama']; ?> " type="text" > -->
										<span class="form-control"><?php echo $row['nama']; ?> </span>
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
								</div><!------/Password------------>
								<button name="simpan" type="submit" class="btn btn-primary btn-lg bold"><span class="glyphicon glyphicon-ok"></span> Simpan</button>

								.
							</form>
						</div><!--detail produk---->















	                </div><!-- /.tab-pane -->



	                <div class="tab-pane" id="tab_2-2">
	                   	<h3>Pengaturan Halaman Tentang Kami</h3>
	            		<hr>
	                   	<h3>CK Editor WYSIWYG Area</h3>
	                </div><!-- /.tab-pane -->
	                <div class="tab-pane" id="tab_2-3">

                        		<!-- THE MESSAGES -->
		                <div class="table-responsive">
                        	<table class="table table-mailbox">
			                   	<thead>
		                            <tr style="text-align: center;">
		                            	<th></th>
		                                <th>Judul</th>
		                                <th>Sekilas Text</th>
		                                <th>Tanggal</th>
		                                <th>Status</th>
		                     
		                            </tr>
		                        </thead>

		                        <tbody>
                                    <tr >
                                        <td class="small-col"><input type="checkbox" /></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Cara Input Produk Untuk Penjual</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">laksnlkasdlkasdlaksd</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">DD/MM/YYYY<a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Status</a></td>
                                    </tr>
                                    <tr >
                                        <td class="small-col"><input type="checkbox" /></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Cara Input Produk Untuk Penjual</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">laksnlkasdlkasdlaksd</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">DD/MM/YYYY<a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Status</a></td>
                                    </tr>
                                    <tr >
                                        <td class="small-col"><input type="checkbox" /></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Cara Input Produk Untuk Penjual</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">laksnlkasdlkasdlaksd</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">DD/MM/YYYY<a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Status</a></td>
                                    </tr>
                                    <tr >
                                        <td class="small-col"><input type="checkbox" /></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Cara Input Produk Untuk Penjual</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">laksnlkasdlkasdlaksd</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">DD/MM/YYYY<a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Status</a></td>
                                    </tr>
                                    <tr >
                                        <td class="small-col"><input type="checkbox" /></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Cara Input Produk Untuk Penjual</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">laksnlkasdlkasdlaksd</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">DD/MM/YYYY<a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Status</a></td>
                                    </tr>
                                    
                                   
								</tbody>
                        	</table>
                        	<div class="modal-footer">
                    			<button type="button" class="btn btn-danger" data-dismiss="modal">Hapus</button>
                    			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#berita-modal">Tambah</button>
                    			<button type="button" class="btn btn-success">Simpan</button>
                    		</div>
                        </div><!-- /.table-responsive -->


	                </div><!-- /.tab-pane -->
	            </div><!-- /.tab-content -->
	        </div><!-- nav-tabs-custom -->
	    </div><!-- /.col -->



		

		<div class="blog col-sm-12">

		</div>


	</div>
</section>
<?php } ?>