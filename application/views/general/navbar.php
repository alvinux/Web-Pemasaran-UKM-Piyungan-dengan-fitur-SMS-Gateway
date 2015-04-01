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
                            <form role="form">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-danger" tabindex="-1">Pilih Kategori</button>
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                                          <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a href="#">Makanan</a></li>
                                          <li><a href="#">Another action</a></li>
                                          <li><a href="#">Something else here</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#">Separated link</a></li>
                                        </ul>
                                      </div>
                                    <input class="form-control" autocomplete="off" placeholder="Cari Produk" type="text">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button">Go!</button>
                                    </span>
                                </div>
                            </form>
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
                                        <small><i class="fa fa-clock-o"></i><?php echo 'Rp '.number_format($item['total_harga_asli']).',00';?></small>
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
    <!-------------------------------------------/NAVBAR RESPONSIVE----------------------------------------------------------------->
  