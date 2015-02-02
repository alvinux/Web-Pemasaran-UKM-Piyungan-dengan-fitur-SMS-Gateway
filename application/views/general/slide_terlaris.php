<section id="recent-works">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3>Produk Terlaris</h3>
                    <p>Berikut ini adalah produk UKM yang paling banyak terjual melalui website pemasaran UMKM Piyungan.</p>
                    <div class="btn-group">
                        <a class="btn btn-danger" href="#scroller" data-slide="prev"><i class="icon-angle-left"></i></a>
                        <a class="btn btn-danger" href="#scroller" data-slide="next"><i class="icon-angle-right"></i></a>
                    </div>
                    <p class="gap"></p>
                </div>
                <div class="col-md-9">
                    <div id="scroller" class="carousel slide">
                        <div class="carousel-inner">

                  <?php
                    $new = array();
                    $next = array();
                    $n=1;foreach ($terlaris as $row):
                    if($n<=3):
                        array_push($new, $row);
                    endif;
                    if($n>3):
                        array_push($next, $row);
                    endif;
                    $n++;endforeach;?>

                   <!--------Item Active---->

                  

                            <!--------Item Active---->
                            <div class="item active">
                              <div class="row">
                                <!--1-1-->
                                <?php foreach ($new as $row) { ?>
                                <div class="col-sm-4">
                                  <div class="thumbnail" style="padding: 0;">
                                    <!--Gambar Thumbnail Produk-->
                                    <img class="img-rounded" style="padding: 6px;" src="<?php echo base_url('doc/themes/public/img/produk/' . $row['img_produk']); ?>">
                                    <?php if ($row['stok_produk'][0]) {//start if stok=0 ?>
                                    <span class="stock">Stok <?php echo $row['stok_produk']; ?> Unit</span>
                                    <?php } else { ?>
                                    <span class="stock red">Stok Kosong</span>
                                    <?php }//end if stok=0 ?>
                                    <!--/Gambar Thumbnail Produk-->

                                    <!--Deskripsi---->
                                    <div class="caption text-center" style="background-color: rgb(241, 241, 241); margin-left: 0; padding-left: 0;">
                                      <h3><b><?php echo $row['nama_produk']; ?></b></h3><!--Judul/nama barang-->
                                      <p style="color:red;"><span>Rp </span><span><?php echo number_format($row['harga_produk']) . '.00'; ?></span></p><!--Harga-->


                                      <?php // echo form_open('barang/add_cart_from_beranda'); ?>
                                      <p><a href="<?php echo site_url('home/detailproduk/' . $row['id_produk']); ?>" class="btn btn-default"  role="button">Detail</a> <button type="submit" class="btn btn-warning" role="button">Beli</button></p>
                                    </form>
                                  </div>
                                  <!--/Deskripsi---->

                                    <div class="row">
                                      <small class="col-xs-6 col-xs-offset-3 ellipsis center" style="">
                                        Penjual : <a href="#"><?php echo $row['nama_penjual']; ?></a>
                                      </small>
                                    </div>

                                  </div>
                                </div><!--close thumbnail group-->
                                <?php } ?>
                              </div><!--/.row-->  
                            </div><!--/.item-->
                  

                            <!--------Item Active---->
                            <div class="item ">
                              <div class="row">
                                <!--1-1-->
                                <?php foreach ($next as $row) { ?>
                                <div class="col-sm-4">
                                  <div class="thumbnail" style="padding: 0;">
                                    <!--Gambar Thumbnail Produk-->
                                    <img class="img-rounded" style="padding: 6px;" src="<?php echo base_url('doc/themes/public/img/produk/' . $row['img_produk']); ?>">
                                    <?php if ($row['stok_produk'][0]) {//start if stok=0 ?>
                                    <span class="stock">Stok <?php echo $row['stok_produk']; ?> Unit</span>
                                    <?php } else { ?>
                                    <span class="stock red">Stok Kosong</span>
                                    <?php }//end if stok=0 ?>
                                    <!--/Gambar Thumbnail Produk-->

                                    <!--Deskripsi---->
                                    <div class="caption text-center" style="background-color: rgb(241, 241, 241); margin-left: 0; padding-left: 0;">
                                      <h3><b><?php echo $row['nama_produk']; ?></b></h3><!--Judul/nama barang-->
                                      <p style="color:red;"><span>Rp </span><span><?php echo number_format($row['harga_produk']) . '.00'; ?></span></p><!--Harga-->


                                      <?php // echo form_open('barang/add_cart_from_beranda'); ?>
                                      <p><a href="<?php echo site_url('home/detailproduk/' . $row['id_produk']); ?>" class="btn btn-default"  role="button">Detail</a> <button type="submit" class="btn btn-warning" role="button">Beli</button></p>
                                    </form>
                                  </div>
                                  <!--/Deskripsi---->

                                    <div class="row">
                                      <small class="col-xs-6 col-xs-offset-3 ellipsis center" style="">
                                        Penjual : <a href="#"><?php echo $row['nama_penjual']; ?></a>
                                      </small>
                                    </div>

                                  </div>
                                </div><!--close thumbnail group-->
                                <?php } ?>
                              </div><!--/.row-->  
                            </div><!--/.item-->
                            
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
        </div>
    </section><!--/#recent-works-->























