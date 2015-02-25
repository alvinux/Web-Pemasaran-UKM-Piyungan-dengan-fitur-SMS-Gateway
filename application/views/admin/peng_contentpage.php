  <!-- START CUSTOM TABS -->
<section class="content">
	<h2 class="page-header">AdminLTE Custom Tabs</h2>
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
<!-- 
	            		<b>Pengaturan Content Slider</b>
	            		<hr> -->

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









	                    <div class="modal-body">
	                    	<!----------------------------Pembatas Content Slider-------------------------------->
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
		                        <!-- <div class="item-inner col-xs-6">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>doc/themes/public/images/slider/bg1.jpg" alt="">
                                    
                                    <div class="overlaypict">
                                        <a class="preview btn btn-danger" title="" href="<?php echo base_url(); ?>doc/themes/public/images/slider/bg1.jpg" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                                    </div>
                                </div> -->
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
		                    <hr>

							<!----------------------------Pembatas Content Slider-------------------------------->
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
		                        <!--<div class="item-inner col-xs-6">
	                                    <img class="img-responsive" src="<?php echo base_url(); ?>doc/themes/public/images/slider/bg1.jpg" alt="">
	                                    
	                                    <div class="overlaypict">
	                                        <a class="preview btn btn-danger" title="" href="<?php echo base_url(); ?>doc/themes/public/images/slider/bg1.jpg" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
	                                    </div>
	                                </div> -->
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
		                    <hr>
		                  </div>






	                </div><!-- /.tab-pane -->
	                <div class="tab-pane" id="tab_2-2">
	                    The European languages are members of the same family. Their separate existence is a myth.
	                    For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
	                    in their grammar, their pronunciation and their most common words. Everyone realizes why a
	                    new common language would be desirable: one could refuse to pay expensive translators. To
	                    achieve this, it would be necessary to have uniform grammar, pronunciation and more common
	                    words. If several languages coalesce, the grammar of the resulting language is more simple
	                    and regular than that of the individual languages.
	                </div><!-- /.tab-pane -->
	                <div class="tab-pane" id="tab_2-3">
	                    The European languages are members of the same family. Their separate existence is a myth.
	                    For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
	                    in their grammar, their pronunciation and their most common words. Everyone realizes why a
	                    new common language would be desirable: one could refuse to pay expensive translators. To
	                    achieve this, it would be necessary to have uniform grammar, pronunciation and more common
	                    words. If several languages coalesce, the grammar of the resulting language is more simple
	                    and regular than that of the individual languages.
	                </div><!-- /.tab-pane -->
	            </div><!-- /.tab-content -->
	        </div><!-- nav-tabs-custom -->
	    </div><!-- /.col -->
	</div> <!-- /.row -->
	<!-- END CUSTOM TABS -->
</section>