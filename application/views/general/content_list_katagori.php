<section id="Content_katagori">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="center gap">
                    <h2>What we do</h2>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                </div>
            </div>
        </div>
        <div class="row">


            <?php if (!empty($daftar_item)) { ?>
                <?php foreach ($daftar_item as $row) { ?>
                <!---------------1-------------->
                <div class="col-sm-3">
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
                            Penjual : <a href="<?php echo site_url('home/detail_penjual/' . $row['penjual_id']); ?>"><?php echo $row['nama_penjual']; ?></a>
                        </small>
                    </div>

                </div>
            </div><!--close thumbnail group-->
            <?php } ?>
        <?php } else { ?>
                        <h2>Produk Kosong..</h2>
        <?php } ?>



        </div><!--/.row-->

        <hr>
        <div class="gap"></div>
        <!-------------Pagination------------------>
        <div class="row">
            <div class="col-md-12">
                <ul class="pagination pull-right">
                    <li class="active"><a href="#">PREV</a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li class="disabled"><a href="#">5</a></li>
                    <li class="active"><a href="#">NEXT</a></li>
                </ul>
            </div>
        </div><!--/.row--> <!-------------/Pagination------------------>
        <!--  <div class="row">
             <div class="col-lg-12">
                 <div class="gap"></div>
                 <div class="row">

                 </div>
             </div>
         </div> -->
    </div>
</section>






