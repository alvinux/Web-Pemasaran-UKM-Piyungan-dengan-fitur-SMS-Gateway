<?php $daftar_item = $this->m_produk->show_all_product_by_seller($data_penjual['id_user']); //print_r($data_penjual); ?>
<?php if (empty($data_penjual) || $data_penjual['status'] == 'pembeli') { ?>
<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
              <h1>Data Penjual Tidak Ditemukan..</h1>
                <p>Seller not found..</p>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Katagori</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<h3 class="container">Data Penjual Tidak Ditemukan...</h3><br><br><br>
<?php } elseif (!empty($data_penjual)) { ?>
<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
              <h1>Toko : <?php echo $data_penjual['username_user']; ?></h1>
                <p>Member PNPM Mandiri Piyungan sejak <?php echo $data_penjual['tgl_daftar'];?></p>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Katagori</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="detail-item" class="container">
	<div class="row">
		<div class="panel panel-primary">
			<div class="modal-header panel-heading">
				 <!-- <button type="button" class="btn btn-danger" style="float: right;"><i class="glyphicon glyphicon-remove"></i> Hapus Produk</button> -->
				<h4 class="modal-title">Detail Penjual</h4>
			</div>
			<div class="modal-body" style="margin-top: 15px;">
				<div class="row">
					<div class="col-md-3" style="border-right: 1px solid #E5E5E5;">
						<div class="row">
							<div id="meet-the-team">

					            <div class="col-md-12 col-xs-12">
					                <div class="center">
					                    <p><img class="img-responsive img-thumbnail img-circle" src="<?php echo base_url('assets/img/photo/'.$data_penjual['img_user']);?>" alt=""></p>
					                    <h5><?php echo $data_penjual['nama']; ?><small class="designation muted" style="color:grey;">Pemilik Toko <?php echo $data_penjual['username_user']; ?></small></h5>
					                    <p><?php echo $data_penjual['alamat']; ?><br><small>email : <?php echo $data_penjual['email']; ?></small></p>
					                    <a class="btn btn-social btn-facebook" disabled="disabled" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" disabled="disabled" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" disabled="disabled" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin"  disabled="disabled" href="#"><i class="icon-linkedin"></i></a>
					                </div>
					            </div>
		    				</div>
						</div>
					<!--Detail PRoduk-->
					</div>
					<div class="col-md-9" style="border-left: 1px solid #E5E5E5;"><form action="http://localhost/Acer/proses_ubah/detail_produk" method="post" accept-charset="utf-8">		            <div class="col-md-12">
		            	<section id="Content_katagori">
						    <div class="">
						        <div class="row">
						            <div class="col-md-12">
						            </div>
						        </div>
						        <div class="row">
						        <?php if (!empty($daftar_item)) { ?>
						          <?php 
						               $data['datalist'] = $daftar_item;
						               $this->load->view('general/thumbnail_produk', $data);
						               ?>
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
						    </div>
						</section>
		            </div>
		            <!--/Detail produk-->
		        	</form></div>
				</div>
				<hr style="margin: 20px; padding: 0;">
				<div class="modal-footer">
					Response Comments
				</div>
			</div>
		</div>
	</div>
</section>


<?php } ?>