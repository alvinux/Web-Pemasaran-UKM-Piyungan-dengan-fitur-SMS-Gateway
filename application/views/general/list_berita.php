<section id="blog" class="container">
        <div class="row">
            <aside class="col-sm-4 col-sm-push-8">
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

              

                <div class="widget categories">
                    <h3>Lainnya</h3>
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
                <!-- <div class="widget tags">
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

            </aside>   

            <div class="col-sm-8 col-sm-pull-4">
                <div class="blog">
                	<?php $list_berita = $this->m_content->list_berita();?>
                	<?php foreach ($list_berita as $row) { ?>	
                    <div class="blog-item">
                	<?php if (empty($row['img_berita'])) { ?>
     					<img class="img-responsive img-blog" src="<?php echo base_url('assets/img/berita-content/'."default.jpg"); ?>" width="100%" alt="">
     				<?php } else { ?>
                    	<img class="img-responsive img-blog" src="<?php echo base_url('assets/img/berita-content/'.$row['img_berita']); ?>" width="100%" alt="">
     				<?php } ?>
                    <!--     <img class="img-responsive img-blog" src="<?php echo base_url('assets/img/berita-content/'.$row['img_berita']); ?>" width="100%" alt="" /> -->
                        <div class="blog-content">
                            <a href="<?php echo base_url('berita_intermezzo/pageDetail/'.$row['id_berita']);?>/<?php echo $row['judul']; ?>"><h3><?php echo $row['judul']; ?></h3></a>
                            <div class="entry-meta">
                                <span><i class="icon-user"></i> <a href="#">Admin</a></span>
                                <span><i class="icon-calendar"></i> <?php echo $row['tanggal_berita']; ?></span>
                            </div>
                            <div style="height: 80px; overflow: hidden;"><?php echo $row['isi_berita']; ?></div>
                            <a class="btn btn-default" href="<?php echo base_url('berita_intermezzo/pageDetail/'.$row['id_berita']);?>/<?php echo $row['judul']; ?>">Read More <i class="icon-angle-right"></i></a>
                        </div>
                    </div><!--/.blog-item-->
                	<?php } ?>


                    <ul class="pagination pagination-lg">
                        <li><a href="#"><i class="icon-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="icon-angle-right"></i></a></li>
                    </ul><!--/.pagination-->
                </div>
            </div><!--/.col-md-8-->
        </div><!--/.row-->
    </section><!--/#blog-->