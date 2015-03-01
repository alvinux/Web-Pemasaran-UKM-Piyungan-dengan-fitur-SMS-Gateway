  <!-- START CUSTOM TABS -->
<section class="content">
	<h2 class="page-header">Pengaturan</h2>
	<div class="row">
	    <div class="col-md-12">
	        <!-- Custom Tabs (Pulled to the right) -->
	        <div class="nav-tabs-custom">
	            <ul class="nav nav-tabs pull-right">
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
	                <li class="pull-left header"><i class="fa fa-th"></i> Pengaturan Content</li>
	            </ul>
	            <div class="tab-content">
	            	<div class="tab-pane active" id="tab_1-1">

	            		<h3>Pengaturan Content Slider</h3>
	            		<hr>
						<!--------------------------------CONTENT SLIDER-------------------------------------------->
	            		<div class="panel panel-primary">
	            			<div class="modal-header panel-heading">
	            				<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
	            				<h4 class="modal-title">Ubah Slider Aktif</h4>
	            			</div>
	            			<div class="modal-body">
	            				<div class="row">
	            					<div class="col-md-6">
	            						<label>Judul</label>
	            						<input class="form-control" placeholder="Isikan Judul" type="text" name="judul">
	            					</div>
	            					<div class="col-md-6">
	            						<label>Link</label>
	            						<input class="form-control" placeholder="Isikan Link Untuk Slider" value="#" type="text">
	            						<label style="font-weight: normal;">*Isikan "#" jika hanya berupa informasi tanpa Link</label>
	            					</div>
	            				</div>

	            				<div class="row">
	            					<div class="col-md-6">
	            						<div class="row">
	            							<label class="pull-left col-md-12 ">Gambar</label>
			                                <div class="col-md-6">
			                                	<div class="thumbnail">
			                                		<img class="img-rounded" src="<?php echo base_url(); ?>doc/themes/public/images/slider/bg1.jpg">
			                                	</div>
			                                </div> 

			                                <div class="col-md-6">
			                                	<input name="upload_picture" class="form-control" type="file">
			                                	<p>*Ukuran gambar yang dianjurkan adalah 1920px X 750px
			                                		dan besar file kurang dari 1MB
			                                	</p>
			                                </div> 

                            			</div>
                       				 </div>

			                        <div class="col-md-6">
			                        	<label class="">Deskripsi</label>
			                        	<textarea class="form-control" placeholder="Isikan deskripsi" rows="3"></textarea>
			                        </div>
                    			</div>
                    		</div>
                    		<div class="modal-footer">
                    			<button type="button" class="btn btn-danger" data-dismiss="modal">Hapus</button>
                    			<button type="button" class="btn btn-success">Simpan</button>
                    		</div>
                    	</div>
						<!--------------------------------CONTENT SLIDER-------------------------------------------->
						<!--------------------------------CONTENT SLIDER-------------------------------------------->
	            		<div class="panel panel-primary">
	            			<div class="modal-header panel-heading">
	            				<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
	            				<h4 class="modal-title">Ubah Slider Aktif</h4>
	            			</div>
	            			<div class="modal-body">
	            				<div class="row">
	            					<div class="col-md-6">
	            						<label>Judul</label>
	            						<input class="form-control" placeholder="Isikan Judul" type="text" name="judul">
	            					</div>
	            					<div class="col-md-6">
	            						<label>Link</label>
	            						<input class="form-control" placeholder="Isikan Link Untuk Slider" value="#" type="text">
	            						<label style="font-weight: normal;">*Isikan "#" jika hanya berupa informasi tanpa Link</label>
	            					</div>
	            				</div>


	            				<div class="row">
	            					<div class="col-md-6">
	            						<div class="row">
	            							<label class="pull-left col-md-12 ">Gambar</label>
			                                <div class="col-md-6">
			                                	<div class="thumbnail">
			                                		<img class="img-rounded" src="<?php echo base_url(); ?>doc/themes/public/images/slider/bg1.jpg">
			                                	</div>
			                                </div> 

			                                <div class="col-md-6">
			                                	<input name="upload_picture" class="form-control" type="file">
			                                	<p>*Ukuran gambar yang dianjurkan adalah 1920px X 750px
			                                		dan besar file kurang dari 1MB
			                                	</p>
			                                </div> 

                            			</div>
                       				 </div>

			                        <div class="col-md-6">
			                        	<label class="">Deskripsi</label>
			                        	<textarea class="form-control" placeholder="Isikan deskripsi" rows="3"></textarea>
			                        </div>
                    			</div>
                    		</div>
                    		<div class="modal-footer">
                    			<button type="button" class="btn btn-danger" data-dismiss="modal">Hapus</button>
                    			<button type="button" class="btn btn-success">Simpan</button>
                    		</div>
                    	</div>
                    	<div class="row">
							<div class="col-md-4 col-md-offset-8">
	 							<button class="btn btn-primary btn-lg bold pull-right" name="addSlider" data-toggle="modal" data-target="#addSlider"><span class="fa fa-plus"></span> Tambah Slider</button>
	 						</div>
	 					</div>
					<!--------------------------------CONTENT SLIDER-------------------------------------------->
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
                                        <td class="small-col"><input type="checkbox" name="" /></td>
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
	</div> <!-- /.row -->
	<!-- END CUSTOM TABS -->
</section>