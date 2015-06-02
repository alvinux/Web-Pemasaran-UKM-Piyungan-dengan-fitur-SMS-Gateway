<section id="blog" class="container">
    <div class="row">
        <aside class="col-sm-3 col-sm-push-9">
            <div class="widget search">
                <form role="form">
                    <div class="input-group">
                        <input type="text" class="form-control" autocomplete="off" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button"><i class="icon-search"></i></button>
                        </span>
                    </div>
                </form>
            </div><!--/.search-->

            <!--/.ads-->     

            <div class="widget categories">
                <h3>Lainnya..</h3>
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
            <!--/.tags-->

     	
        </aside>        
        <div class="col-sm-9 col-sm-pull-3">
            <div class="blog">
                <div class="blog-item">
                	<!-- Foreach Content Berita Intermezzo -->
     				<?php //foreach ($berita as $row) { ?>
     				<?php if (empty($berita['img_berita'])) { ?>
     					<img class="img-responsive img-blog" src="<?php echo base_url('assets/img/berita-content/'."default.jpg"); ?>" width="100%" alt="">
     				<?php } else { ?>
                    	<img class="img-responsive img-blog" src="<?php echo base_url('assets/img/berita-content/'.$berita['img_berita']); ?>" width="100%" alt="">
     				<?php } ?>
                    <div class="blog-content">
                        <h3><?php echo $berita['judul'];?></h3>
                        <div class="entry-meta">
                            <span><i class="icon-user"></i> <a href="#">Admin</a></span>
                            <!-- <span><i class="icon-folder-close"></i> <a href="#">Bootstrap</a></span> -->
                            <span><i class="icon-calendar"></i> <?php echo $berita['tanggal_berita']; ?></span>
                            <!-- <span><i class="icon-comment"></i> <a href="blog-item.html#comments">3 Comments</a></span> -->
                        </div>
                       		<?php echo $berita['isi_berita'];?>
                        <hr>

                        <div class="tags">
                            <i class="icon-tags"></i> Tags <a class="btn btn-xs btn-primary" href="#">CSS3</a> <a class="btn btn-xs btn-primary" href="#">HTML5</a> <a class="btn btn-xs btn-primary" href="#">WordPress</a> <a class="btn btn-xs btn-primary" href="#">Joomla</a>
                        </div>

                        <p>&nbsp;</p>

                        
                        
                    </div>
     				<?php //}?> 
                	<!-- Foreach Content Berita Intermezzo -->
                </div><!--/.blog-item-->
            </div>
        </div><!--/.col-md-8-->
    </div><!--/.row-->
</section>