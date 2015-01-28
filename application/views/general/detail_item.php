<section id="detail-item" class="container">
	<div class="row">
	<?php if (!empty($detail_produk)) { ?>
		<?php $detail_produk = array($detail_produk); ?>
		<?php foreach ($detail_produk as $row) { ?>
		<aside class="col-sm-3 col-sm-push-9">
			<div class="widget detail row">

				<div class="panel panel-default">
				      <!-- Default panel contents -->
				      <div class="panel-heading">Data Penjual</div>

				      <!-- Table -->
				      <table class="table">
				        <thead>
				          <tr>
				            <th>Nama </th>
				            <th>: <?php echo $row['nama']; ?></th>
				          </tr>
				        </thead>
				        <tbody>
				          <tr>
				            <td>Alamat</td>
				            <td>: <?php echo $row['alamat']; ?></td>
				          </tr>
				          <tr>
				            <td>No. Tlp</td>
				            <td>: <?php echo  $row['telpon']; ?></td>
				          </tr>
				          
				        </tbody>
				      </table>
				    </div>




		

				<!-- span class="col-sm-4"><b class="topkosong"><small>Nama Penjual</small></b></span>:
				<span class="col-sm-7"><b class="topkosong"></b></span> -->
			</div><!--/.detail-->

			<div class="widget ads">
				<div class="row">
					<div class="col-xs-6">
						<a href="#"><img class="img-responsive img-rounded hqvoytgfngtnvjnbnclw" src="<?php echo base_url(); ?>doc/themes/public/images/ads/ad1.png" alt=""></a>
					</div>

					<div class="col-xs-6">
						<a href="#"><img class="img-responsive img-rounded hqvoytgfngtnvjnbnclw" src="images/ads/ad2.png" alt=""></a>
					</div>
				</div>
				<p> </p>
				<div class="row">
					<div class="col-xs-6">
						<a href="#"><img class="img-responsive img-rounded hqvoytgfngtnvjnbnclw" src="images/ads/ad3.png" alt=""></a>
					</div>

					<div class="col-xs-6">
						<a href="#"><img class="img-responsive img-rounded hqvoytgfngtnvjnbnclw" src="images/ads/ad4.png" alt=""></a>
					</div>
				</div>
			</div><!--/.ads-->     

			<div class="widget categories">
				<h3>Blog Categories</h3>
				<div class="row">
					<div class="col-sm-6">
						<ul class="arrow">
							<li><a href="#">Development</a></li>
							<li><a href="#">Design</a></li>
							<li><a href="#">Updates</a></li>
							<li><a href="#">Tutorial</a></li>
							<li><a href="#">News</a></li>
						</ul>
					</div>
					<div class="col-sm-6">
						<ul class="arrow">
							<li><a href="#">Joomla</a></li>
							<li><a href="#">Wordpress</a></li>
							<li><a href="#">Drupal</a></li>
							<li><a href="#">Magento</a></li>
							<li><a href="#">Bootstrap</a></li>
						</ul>
					</div>
				</div>                     
			</div><!--/.categories-->
			<div class="widget tags">
				<h3>Tag Cloud</h3>
				<ul class="tag-cloud">
					<li><a class="btn btn-xs btn-primary" href="#">CSS3</a></li>
					<li><a class="btn btn-xs btn-primary" href="#">HTML5</a></li>
					<li><a class="btn btn-xs btn-primary" href="#">WordPress</a></li>
					<li><a class="btn btn-xs btn-primary" href="#">Joomla</a></li>
					<li><a class="btn btn-xs btn-primary" href="#">Drupal</a></li>
					<li><a class="btn btn-xs btn-primary" href="#">Bootstrap</a></li>
					<li><a class="btn btn-xs btn-primary" href="#">jQuery</a></li>
					<li><a class="btn btn-xs btn-primary" href="#">Tutorial</a></li>
					<li><a class="btn btn-xs btn-primary" href="#">Update</a></li>
				</ul>
			</div><!--/.tags-->

			<!-- <div class="widget facebook-fanpage">
				<h3>Facebook Fanpage</h3>
				<div class="widget-content">
					<div fb-iframe-plugin-query="app_id=144716315690681&amp;header=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fshapebootstrap&amp;locale=en_US&amp;sdk=joey&amp;show_border=false&amp;show_faces=true&amp;stream=false&amp;width=292" fb-xfbml-state="rendered" class="fb-like-box fb_iframe_widget" data-href="https://www.facebook.com/shapebootstrap" data-width="292" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"><span style="vertical-align: bottom; width: 292px; height: 241px;"><iframe class="" src="http://www.facebook.com/plugins/like_box.php?app_id=144716315690681&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F7r8gQb8MIqE.js%3Fversion%3D41%23cb%3Df15845d397b7d18%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%252Ffbe7d95431f826%26relation%3Dparent.parent&amp;header=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fshapebootstrap&amp;locale=en_US&amp;sdk=joey&amp;show_border=false&amp;show_faces=true&amp;stream=false&amp;width=292" style="border: medium none; visibility: visible; width: 292px; height: 241px;" title="fb:like_box Facebook Social Plugin" scrolling="no" allowtransparency="true" name="f31c1713c4eb754" frameborder="0" height="1000px" width="292px"></iframe></span></div>
				</div>
			</div> -->
		</aside>      
		
		<div class="col-sm-9 col-sm-pull-3"><!--content produk-->
			<div class="col-sm-6"><!--Thumbail produk $ detail---->

			<!-- 	<div class="portfolio-item">< --><!------Thumnail Produk-------->
				<!-- 	<div class="item-inner">
						<img class="img-responsive" src="<?php //echo base_url('doc/themes/public/img/produk/'.$row['img_produk']); ?>" alt="">
						<div class="overlay">
							<a class="preview btn btn-danger" title="<?php// echo $row['nama_produk']; ?>" href="<?php// echo base_url('doc/themes/public/img/produk/'.$row['img_produk']); ?>" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
						</div>
					</div>
				</div> --><!---/thumbnail produk-->


				<div class="panel">
					<div class="tabbable tabs-below">
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade active in" id="home2">
								<div class="portfolio-item"><!------Thumnail Produk-------->
									<div class="item-inner" style="margin:0;">
										<img class="img-responsive" src="<?php echo base_url('doc/themes/public/img/produk/'.$row['img_produk']); ?>" alt="">
										<div class="overlay">
											<a class="preview btn btn-danger" title="<?php echo $row['nama_produk']; ?>" href="<?php echo base_url('doc/themes/public/img/produk/'.$row['img_produk']); ?>" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
										</div>
									</div>
								</div><!---/thumbnail produk-->
							</div>
							<div class="tab-pane fade" id="profile2">
								<div class="portfolio-item"><!------Thumnail Produk-------->
									<div class="item-inner">
										<img class="img-responsive" src="<?php echo base_url('doc/themes/public/img/produk/'.$row['img_produk']); ?>" alt="">
										<div class="overlay">
											<a class="preview btn btn-danger" title="<?php echo $row['nama_produk']; ?>" href="<?php echo base_url('doc/themes/public/img/produk/'.$row['img_produk']); ?>" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
										</div>
									</div>
								</div><!---/thumbnail produk-->
							</div>
						</div>
						<ul id="myTab2" class="nav nav-tabs nav-justified">
							<li class="active"><a href="#home2" data-toggle="tab"><img class="img-responsive" style="max-width:100%" src="<?php echo base_url('doc/themes/public/img/produk/'.$row['img_produk']); ?>" alt=""></a></li>
							<li><a href="#profile2" data-toggle="tab"><img class="img-responsive" style="max-width:100%" src="<?php echo base_url('doc/themes/public/img/produk/'.$row['img_produk']); ?>" alt=""></a></li>
							
						</ul>
					</div>
				</div>




			</div><!--/Thumbnail produk &detail------->
			
			<div class="col-sm-6"><!----Detail produk-------->
				<form action="#" method="post" accept-charset="utf-8">            
					<div class="sum-item">	
						<b><p class="bold"><span class="row col-md-5">Stok</span> : <span><?php echo $row['stok_produk']; ?></span></p>
						<p class="bold"><span class="row col-md-5">Berat</span> : <span><?php echo $row['berat_produk']; ?> Kilo Gram</span></p>
						<p class="bold"><span class="row col-md-5"><b>Harga </b></span> : <span><b class="red">Rp <?php echo number_format ($row['harga_produk']).'.00'; ?></b></span></p>
						<p class="bold"><span class="row col-md-5"><small>Harga Grosir</small></span> : <span><small>Rp <?php echo number_format ($row['harga_grosir_produk']).'.00'; ?></small></span></p>
						<p class="bold">
							<div>
								<span class="row col-md-5">Tentukan Jumlah Barang</span> 
								<div class="col-md-4">
									<input type="number" class="form-control" />
								</div>
							</div>
						</p></b>
						<br><br>
						<!-- <h5 class="example-title">Tentukan Jumlah Barang <span>
						<div class="row">
							<div class="col-md-3">
								<input type="number" class="form-control" />
							</div>
						</div>
						</span>
						</h5> -->
					</div>
					<input name="id_barang" value="13" type="hidden"><!-- id barang -->
					<br>
					<div class="mg-b-20">
						<button type="submit" class="btn btn-primary btn-lg btn-block bold <?php if ($row['stok_produk'][0]) { echo ''; } else { echo 'disabled'; }//start if stok=0 ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Beli</button>
					</div>
				</form>
			</div><!--detail produk-->
			
			
			<div class="blog col-sm-12">
				<div class="blog-item">
					<div class="blog-content">
						<h3>Deskripsi Produk</h3>
				<div class="entry-meta">
					<!-- <span><i class="icon-user"></i> <a href="#">John</a></span>
					<span><i class="icon-folder-close"></i> <a href="#">Bootstrap</a></span> -->
					<span><i class="icon-calendar"></i> <?php echo date('d F, Y - H:i', strtotime($row['tgl_upload_produk'])); ?></span>
					<span><i class="icon-comment"></i> <a href="blog-item.html#comments">3 Comments</a></span>
				</div>
				<p class="lead"><?php echo $row['deskripsi_produk']; ?>.</p>

				<!-- <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p> -->

				<!-- <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p> -->

				<hr>

			<?php } ?>
				<!-- <div class="tags">
					<i class="icon-tags"></i> Tags <a class="btn btn-xs btn-primary" href="#">CSS3</a> <a class="btn btn-xs btn-primary" href="#">HTML5</a> <a class="btn btn-xs btn-primary" href="#">WordPress</a> <a class="btn btn-xs btn-primary" href="#">Joomla</a>
				</div> -->

		<!-- 		<p>&nbsp;</p> -->

				<!-- <div class="author well">
					<div class="media">
						<div class="pull-left">
							<img class="avatar img-thumbnail" src="<?php// echo base_url() ?>doc/themes/public/images/blog/avatar.jpg" alt="">
						</div>
						<div class="media-body">
							<div class="media-heading">
								<strong>John Doe</strong>
							</div>
							<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.</p>
						</div>
					</div>
				</div> --><!--/.author-->

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
												<a class="pull-right" href="#"><i class="icon-repeat"></i> Reply</a>
											</div>
											<p><?php echo $testi['pesan']; ?></p>
										</div><hr>
									</div>
								</div><!--/.media-->
								<?php } ?>
							<?php } else { ?>
								<h3>Belum ada Testimonial..</h3>
							<?php } ?>
								
							</div><!--/#comments-list-->  
<!-- 
							<div id="comment-form">
								<h3>Leave a comment</h3>
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<div class="col-sm-6">
											<input class="form-control" placeholder="Name" type="text">
										</div>
										<div class="col-sm-6">
											<input class="form-control" placeholder="Email" type="email">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<textarea rows="8" class="form-control" placeholder="Comment"></textarea>
										</div>
									</div>
									<button type="submit" class="btn btn-danger btn-lg">Submit Comment</button>
								</form>
							</div> --><!--/#comment-form-->
						</div><!--/#comments-->
					</div>
				</div><!--/.blog-item-->
			</div>
		</div><!--/content produk-->
			<?php } else { ?>
				<h3 class="container">Produk Tidak Ditemukan..</h3>
			<?php }  ?>
	</div><!--/.row-->
</section>
