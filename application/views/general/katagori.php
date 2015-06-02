

 <section id="services" class="emerald">
    <div class="container">
        <h3>Kategory Produk<hr></h3>       
        <div class="row">

            <?php foreach ($katagori as $row) { 
                $link = str_replace(' ', '_', $row['nama_katagori']);
            ?>
            <!--LIst Katagori---->
            <div class="col-md-4 col-sm-6 paddingtop10">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-ok icon-md"></i>
                    </div>
                    <div class="media-body">
                        <input name="id_katagori" type="hidden" value="<?php echo $row['id_katagori'] ?>">
                        <h3 class="media-heading"><?php echo $row['nama_katagori']; ?></h3>
                        <p style="height: 40px; text-overflow: ellipsis;"><?php echo $row['deskripsi_katagori']; ?></p>
                    </div>

                    <div class="overlay"><!--LInk ke katagori yang diplih-->
                        <a class="full-overlay" title="<?php echo $row['nama_katagori']; ?>" href="<?php echo base_url('home/katagori/'.$link); ?>" ></a>
                    </div>
                </div>
            </div><!--/.col-md-4-->
            <!--LIst Katagori----> 
            <?php }//end forech ?>

        </div>
        <hr>
        <h3 class="pull-right"><a class="white" href="<?php echo base_url(); ?>home/semua_katagori">Lihat Katagori Lainnya..</a></h3>
    </div>
</section><!--/#services-->





