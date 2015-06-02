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
						<?php $banner = $this->m_content->banner(); //print_r($banner);?>
						<?php foreach ($banner as $banner) { ?>
						<?php echo form_open_multipart('proses_ubah/set_banner'); ?><!--Ubah data slide banner UTAMA-->
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
											<input class="form-control" placeholder="Isikan Judul" type="text" name="judul" value="<?php echo $banner['judul']; ?>">
										</div>
										<div class="col-md-6">
											<label>Link</label>
											<input class="form-control" name="link" placeholder="Isikan Link Untuk Slider" value="<?php echo $banner['link']; ?>" type="text">
											<label style="font-weight: normal;">*Isikan "#" jika hanya berupa informasi tanpa Link</label>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="row">
												<label class="pull-left col-md-12 ">Gambar</label>
						                        <div class="col-md-6">
						                        	<?php if (empty($banner['img'])) { ?>
						                        	<div class="thumbnail">
						                        		<img class="img-rounded" src="<?php echo base_url('doc/themes/public/images/slider/kosong.jpg'); ?>">
						                        	</div>
						                        	<?php } else { ?>
						                        	<div class="thumbnail">
						                        		<img class="img-rounded" src="<?php echo base_url('doc/themes/public/images/slider/'.$banner['img']); ?>">
						                        	</div>	
						                        	<?php }?>

						                        </div> 
						                        <div class="col-md-6">
						                        	<input name="img" class="form-control" type="file" value="<?php echo $banner['img'];?>">
						                        	<p>	*Ukuran gambar yang dianjurkan adalah 1920px X 750px
						                        			dan besar file kurang dari 5MB <br>
						                        	</p>
						                        </div> 
						        			</div>
						   				 </div>
						                <div class="col-md-6">
						                	<label class="">Deskripsi</label>
						                	<textarea class="form-control" name="deskripsi" placeholder="Isikan deskripsi" rows="3"><?php echo $banner['deskripsi'];?></textarea>
						                </div>
									</div>
								</div>
								<div class="modal-footer">
									<input name="id_banner" type="hidden" value="<?php echo $banner['id_banner']; ?>">
									<button onclick="hapusBanner('<?php echo $banner['id_banner']; ?>')" type="button" class="btn btn-danger" data-dismiss="modal">Reset</button>
									<button type="submit" class="btn btn-success">Simpan</button>
								</div>
							</div>
						<!--------------------------------CONTENT SLIDER-------------------------------------------->
						<?php echo form_close();?>
						<?php }?>
	                </div><!-- /.tab-pane -->



	                <div class="tab-pane" id="tab_2-2">
	                	<?php echo form_open('proses_ubah/edit_page'); 
	                		$dataPage = $this->m_content->show_page_byid('1'); //print_r($dataPage['content']);?>
	                		<?php //foreach ($dataPage as $page) { ?>
	                   	<h3>Pengaturan Halaman Tentang Kami</h3>
	            		<hr>
	            		<textarea name="editorAboutUs" id="editorAbout" rows="10" cols="80"><?php echo $dataPage['isi_berita'];?></textarea>
	            		<input style="display:none;" name="id_page" value="1"type="text">
	            		<button class="btn btn-lg btn-primary" type="submit">Simpan</button>
	                   	<!-- <h3>CK Editor WYSIWYG Area</h3> -->
	                		<?php // } ?>
	                   </form>
	                </div><!-- /.tab-pane -->
	                <div class="tab-pane" id="tab_2-3">


	           			<!-- THE MESSAGES -->
		                <div class="box-body table-responsive">
                        	<table id="example1" class="table table-bordered table-striped">
			                   	<thead>
		                            <tr style="text-align: center;">
		                            	<th>ID</th>
		                                <th>Judul</th>
		                                <!-- <th>Sekilas Text</th> -->
		                                <th>Tanggal</th>
		                                <th>Status</th>
		                                <th>Action</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<?php $list_berita = $this->m_content->list_berita();?>
		                        	<?php foreach ($list_berita as $list) { ?>
                                    <tr >
                                        <td class="small-col"><?php echo $list['id_berita']; ?></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal"><?php echo $list['judul']; ?></a></td>
                                       <!-- <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal"><?php echo $prev; ?>......</a></td> -->
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal"><?php echo $list['tanggal_berita']; ?><a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Aktif</a></td>
                                        <td>
                                        	<!-- <div class="btn-group"> -->
                                        		<button type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="bottom" title="Edit" onclick="editBerita('<?php echo $list['id_berita'];?>')"><i class="fa fa-pencil"></i> Edit</button>
                                        		<?php if ($list['id_berita'] >= 1 and $list['id_berita'] <= 5 ) {
                                        			# code...
                                        		} else { ?>
                                        		<button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="hapusBerita('<?php echo $list['id_berita'];?>')"><i class="fa fa-times"></i> Hapus</button>
                                        		<?php }?>
                                        	<!-- </div> -->
                                        </td>
                                    </tr>
		                        	<?php }?>
								</tbody>
                        	</table>
                        	<div class="modal-footer">
                    			<!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Hapus</button> -->
                    			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" onclick="editBerita('')"><i class="fa fa-plus"></i> Tambah</button>
                    			<!-- <button type="button" class="btn btn-success">Simpan</button> -->
                    		</div>
                        </div><!-- /.table-responsive -->

	                </div><!-- /.tab-pane -->
	            </div><!-- /.tab-content -->
	        </div><!-- nav-tabs-custom -->
	    </div><!-- /.col -->
	</div> <!-- /.row -->
	<!-- END CUSTOM TABS -->
</section>




<!-- News Edit MODAL -->
<div class="modal fade" id="modalEditBerita" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" >
  <div class="modal-dialog modal-lg">
      <div class="modal-content row">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             	<h4 class="modal-title" id="customlabel"><!-- <i class="fa fa-envelope-o"></i> -->
             		<span class="pull-right"><b style=" padding-right: 10px; text-align: right;"></b></span>
             	</h4>
            </div>
          
            <div id="custombody" class="modal-body row">
            </div>
         
            <div class="modal-footer clearfix">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
              </div>
          </form>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script type="text/javascript">
	function editBerita(id)
	{
		//show modal
		$('#customlabel').html('Berita');
		$('#custombody').html('<center>loading</center>');
		$('#modalEditBerita').modal('show')
		//start ajax
		$.ajax({
			url:'<?php echo site_url("ajax/modal_editBerita")?>',
			type:'POST',
			data:{id:id},
			success:function(response){
				$('#custombody').html(response);
			},
			error:function(){
				$('#custombody').html('<center>terjadi masalah</center>');
			}
		});
	}
</script>


<script type="text/javascript">
	CKEDITOR.replace("editorAbout");
</script>
<!-- JavaScript HAPUS -->
<script type="text/javascript">
	function hapusBanner(id)
	{
	    var sure = confirm('Anda Yakin ingin menghapus data slider?');
	    if(sure == 1) {
	        //show modal
	        // $('#customlabel').html('Hapus Bank');
	        // $('#custombody').html('<center>loading</center>');
	        // $('#custommodal').modal('show')
	        //start ajax
	        $.ajax({
	            url:'<?php echo site_url("ajax/hapus_banner")?>',
	            type:'POST',
	            data:{id:id},
	            success:function(response){
	                window.location="<?php echo base_url('admin/content_page'); ?>";
	            },
	            error:function(){
	                alert('Gagal menghapus Banner');
	            }
	        });
	    }
	}
</script>

<script type="text/javascript">
	function hapusBerita(id)
	{
	    var sure = confirm('Anda Yakin ingin menghapus Berita?');
	    if(sure == 1) {
	        //show modal
	        // $('#customlabel').html('Hapus Bank');
	        // $('#custombody').html('<center>loading</center>');
	        // $('#custommodal').modal('show')
	        //start ajax
	        $.ajax({
	            url:'<?php echo site_url("ajax/hapusBerita")?>',
	            type:'POST',
	            data:{id:id},
	            success:function(response){
	                window.location="<?php echo base_url('admin/content_page'); ?>";
	            },
	            error:function(){
	                alert('Gagal menghapus Berita');
	            }
	        });
	    }
	}
</script>