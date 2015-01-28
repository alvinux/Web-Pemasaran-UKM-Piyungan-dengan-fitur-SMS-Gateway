<section id="services" class="">
    <div class="container">
        <h3>Semua Katagori<hr></h3>
        <div class="row">





            <div class="container">
                <div class="clearfix">
                    <?php
                    $all_kategori = $this->m_produk->show_all_category();
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
                </div>
                <div class=" text-center"></div>
            </div>
        </div>
    </div>
</section>








