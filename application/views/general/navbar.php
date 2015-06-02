   <!-------------------------------------------NAVBAR RESPONSIVE----------------------------------------------------------------->
    <nav class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ;?>">UKM PNPM</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse collapse in" id="bs-example-navbar-collapse-1" style="margin-left: 10px; margin-right: 10px;">
                <ul class="nav navbar-nav navbar-right" style="margin-top: 15px;">
                    <li>
                        <div class="navbar-form" style="margin-right: 0px; padding-right: 0px;">
                         
                            <?php echo form_open('proses/search'); ?>
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-danger" tabindex="-1">Pilih Kategori</button>
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                <?php $all_kategori = $this->m_produk->show_all_category();
                                  foreach ($all_kategori as $k):
                                           $link_1 = str_replace(' ', '_', $k['nama_katagori']); ?>
                                        <dl class="katagori-nav">
                                            <dt class="nav-title"><a href="<?php echo base_url('home/katagori/' . $link_1); ?>"><?php echo $k['nama_katagori']; ?></a></dt>
                                            <?php
                                            $jenis_produk = $this->m_produk->show_all_jenis_produk_by_katagori($k['id_katagori']);
                                            foreach ($jenis_produk as $jp):
                                                $link_2 = str_replace(' ', '_', $jp['nama_jenis_produk']);
                                            ?>
                                            <dd class="nav-item"><a href="<?php echo base_url('home/katagori/' . $link_1 . '/' . $link_2); ?>"><?php echo $jp['nama_jenis_produk'] ?></a></dd>
                                        <?php endforeach; ?>
                                    </dl>
                                <?php endforeach; ?>
                                      <li><a href="#">Makanan</a></li>
                                      <li><a href="#">Another action</a></li>
                                      <li><a href="#">Something else here</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Separated link</a></li>
                                    </ul>
                                  </div>
                                <input class="form-control" autocomplete="off" placeholder="Cari Produk" type="text">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="submit">Go!</button>
                                </span>
                            </div>
                            <?php echo form_close(); ?>
                         
                        </div>
                    </li>
                    <li style="width: 10px; height: 1px;">
                        &nbsp;
                    </li>
                    <?php if ($this->session->userdata('login_user')) {?> <!--Jika Statusnya login user atau tidak-->
                         <?php //echo $this->session->userdata('login_user');?>
                    <li class="btnav">
                        <a class="btnav dropdown-toggle navbar-btn" href="#" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span><?php echo $this->session->userdata('login_user')['username_user'];?> <i class="caret"></i></span>
                        </a>
                        <ul style="width: 280px;" class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <img src="<?php echo base_url('assets/img/photo/'.$this->session->userdata('login_user')['img_user']);?>" class="img-circle" alt="User Image">
                                <?php //echo base_url('assets/img/photo/'.$this->session->userdata('login_user')['img_user']);?>
                                <p>
                                    <?php echo $this->session->userdata('login_user')['nama'];?><br>
                                    <small><?php echo $this->session->userdata('login_user')['email'];?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div style="padding: 10px;" class="pull-left">
                                    <a class="btn btn-success btn-flat" href="<?php echo site_url('home/profile_user'); ?>">Profile</a>
                                </div>
                                <div style="padding: 10px;" class="pull-right">
                                    <a class="btn btn-danger btn-flat" href="<?php echo site_url('proses/keluar_user'); ?>">Sign out</a>
                                </div>
                            </li>

                        </ul>
                    </li>
                    <?php if ($this->session->userdata('login_user')['status']  === 'penjual') {
                        echo "";
                    } else { ?> <!--Status Penjual atau tidak-->
                    <li>
                        <a class="btnav dropdown-toggle navbar-btn" href="#" data-toggle="dropdown">
                        <i class=" icon-shopping-cart"></i>
                        <?php if (!empty($this->cart->contents())) {//start if tidak ada transaksi ?><!--Jika Cart isi atau kosong-->
                            <span style="" class="label label-danger"><b><?php echo count($this->cart->contents());?></b></span>
                        <?php } else {}?><!--Jika Cart isi atau kosong-->
                        </a>
                        <ul style="width: 280px;" class="dropdown-menu">
                            <!-- cart list -->
                        <?php if (empty($this->cart->contents())) {//start if tidak ada transaksi ?><!--Jika Cart isi atau kosong-->
                            <li><!-- start message -->
                                <h4 class="center">Keranjang masih kosong</h4>
                            </li>
                        <?php } else {?><!--Jika Cart isi atau kosong-->
                            <?php
                            $i=1;
                            $total_berat = 0;
                            $total_barang = 0;
                            $total_ongkos = 0;
                            foreach ($this->cart->contents() as $item) { ?>
                            <li><!-- start message -->
                                <a href="<?php echo base_url('home/detailproduk/' . $item['id']); ?>">
                                    <div style="margin-top: 10px;" class="pull-left">
                                        <img class="img-rounded" style="padding: 6px; max-width: 60px;" src="<?php echo base_url('doc/themes/public/img/produk/'.$item['pic']); ?>">
                                    </div>
                                    <h5><?php echo $item['name'];?><small><i class="fa fa-clock-o"></i> (<?php echo $item['qty'];?> pcs)</small><br>
                                        <small><i class="fa fa-clock-o"></i><?php echo 'Rp '.number_format($item['subtotal']).',00';?></small>
                                    </h5>
                                    
                                </a><hr style="padding: 0px; margin: 0px; border: 1px solid grey;">
                            </li>
                            <?php
                            $total_barang = $total_barang + $item['qty'];
                            $total_berat = $total_berat + $item['total_berat'];
                            $i++; } ?><!--/Cart List-->
                        <?php } ?><!--Jika Cart isi atau kosong-->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div style="padding: 10px;" class="pull-right">
                                    <a class="btn btn-primary btn-flat" href="<?php echo site_url('cart_control/checkout'); ?>">Detail / Check out</a>
                                </div>
                            </li>

                        </ul>
                    </li>   
                    <?php } ?> <!--Status Penjual atau tidak-->

                    <?php  } else { ?><!--Jika Statusnya login user atau tidak-->
                    <li>
                        <div class="btnav">
                            <a href="#myModal" role="button" class="btn btn-large btn-success navbar-btn" data-toggle="modal">Login / Register</a>                            
                        </div>
                    </li>   
                    <?php } ?>
                </ul>
                <!--                <button class="btn btn-large btn-success navbar-btn navbar-right" data-toggle="modal" data-target="#myModal">Sign In</button>-->
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-------------------------------------------/NAVBAR RESPONSIVE------------------------------------------------------------------>
    <div class="wet-asphalt" style="background-color: #3E566D;">
        <div class="container" style="padding-left:0;">
            <div class="collapse navbar-collapse" style="padding-left:0;">
                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
                    <li><a href="<?php echo base_url('berita_intermezzo/tentang_kami');?>" title="Tentang Kami"
                        <?php if ($this->uri->segment(2)=='tentang_kami') {
                            echo 'style="background-color: #eee; color: #d9534f;"'; } else { }?> >Tentang Kami</a></li>
                    <li><a href="<?php echo base_url('berita_intermezzo/bantuan');?>"
                        <?php if ($this->uri->segment(2)=='bantuan') {
                            echo 'style="background-color: #eee; color: #d9534f;"'; } else { }?> >Bantuan</a></li>
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="career.html">Career</a></li>
                            <li><a href="blog-item.html">Blog Single</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="registration.html">Registration</a></li>
                            <li class="divider"></li>
                            <li><a href="privacy.html">Privacy Policy</a></li>
                            <li><a href="terms.html">Terms of Use</a></li>
                        </ul>
                    </li> -->
                    <li><a href="<?php echo base_url('berita_intermezzo/contact');?>" title="Hubungi Kami"
                        <?php if ($this->uri->segment(2)=='contact') {
                            echo 'style="background-color: #eee; color: #d9534f;"'; } else { }?> >Kontak</a></li>
                    <li><a href="<?php echo base_url('berita_intermezzo/blog_berita');?>" title="Berita" 
                         <?php if ($this->uri->segment(2)=='blog_berita') {
                            echo 'style="background-color: #eee; color: #d9534f;"'; } else { }?> >Berita</a></li> 
                </ul>
            </div>

        </div>
    </div>