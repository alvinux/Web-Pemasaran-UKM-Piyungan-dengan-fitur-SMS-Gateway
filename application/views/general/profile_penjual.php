<?php $data['biodata'] = $biodata ?>
<?php //$id_penjual = $this->session->userdata['login_user']['id_user']; ?>
<?php $data['daftar_item'] = $this->m_produk->show_all_product_by_seller($id_penjual); ?>
<section id="detail-profile" class="container">
	<div class="row">
	    <div class="row" style="background-color: white;">
	        <!-- Custom Tabs (Pulled to the right) -->
	        <div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	                <li class="active"><a href="#tab_1-1" data-toggle="tab">Profile</a></li>
	                <li><a href="#tab_2-2" data-toggle="tab">List Produk</a></li>
	                <li><a href="#tab_2-3" data-toggle="tab">Riwayat Penjualan</a></li>
	                <!-- <li class="dropdown">
	                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                        Dropdown <span class="caret"></span>
	                    </a>
	                    <ul class="dropdown-menu">
	                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
	                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
	                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
	                        <li role="presentation" class="divider"></li>
	                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
	                    </ul>
	                </li> -->
	            </ul>
	            <div class="tab-content">
	            	<div class="tab-pane active" id="tab_1-1">
	            		<div class="col-md-12 row">
							<?php $this->load->view('general/profile_user',$data);?>
						</div>
	                </div><!-- /.tab-pane -->
	                <div class="tab-pane" id="tab_2-2">
	                   	<h3>Daftar Produk Anda 
	                   	<div class="pull-right">
                        	<a href="#tambahproduk" class="btn btn-success" data-toggle="modal"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Produk</a>
                    	</div>
                    	</h3>
	            		<hr>
	            	      <?php $this->load->view('general/content_list_katagori', $data); ?>
	                </div><!-- /.tab-pane -->
	                <div class="tab-pane" id="tab_2-3">

                        		<!-- THE MESSAGES -->
		                <div class="table-responsive">
                        	<table class="table table-mailbox">
			                   	<thead>
		                            <tr style="text-align: center;">
		                            	<th></th>
		                                <th>Nama Produk</th>
		                                <th>Jumlah Produk</th>
		                                <th>Tanggal</th>
		                                <th>Total Harga</th>
		                     
		                            </tr>
		                        </thead>
		                        <tbody>
                                    <tr >
                                        <td class="small-col"><input type="checkbox" /></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Nama Produk</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">125 /pcs</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">DD/MM/YYYY<a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Rp. 2.000.000,-</a></td>
                                    </tr>
                                    <tr >
                                        <td class="small-col"><input type="checkbox" /></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Nama Produk</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">125 /pcs</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">DD/MM/YYYY<a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Rp. 2.000.000,-</a></td>
                                    </tr>
                                    <tr >
                                        <td class="small-col"><input type="checkbox" /></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Nama Produk</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">125 /pcs</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">DD/MM/YYYY<a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Rp. 2.000.000,-</a></td>
                                    </tr>
                                    <tr >
                                        <td class="small-col"><input type="checkbox" /></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Nama Produk</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">125 /pcs</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">DD/MM/YYYY<a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Rp. 2.000.000,-</a></td>
                                    </tr>
                                    <tr >
                                        <td class="small-col"><input type="checkbox" /></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Nama Produk</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">125 /pcs</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">DD/MM/YYYY<a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Rp. 2.000.000,-</a></td>
                                    </tr>
                                    <tr >
                                        <td class="small-col"><input type="checkbox" /></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Nama Produk</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">125 /pcs</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">DD/MM/YYYY<a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Rp. 2.000.000,-</a></td>
                                    </tr>
                                    <tr >
                                        <td class="small-col"><input type="checkbox" /></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Nama Produk</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">125 /pcs</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">DD/MM/YYYY<a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Rp. 2.000.000,-</a></td>
                                    </tr>
                                    <tr >
                                        <td class="small-col"><input type="checkbox" /></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Nama Produk</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">125 /pcs</a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">DD/MM/YYYY<a></td>
                                        <td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Rp. 2.000.000,-</a></td>
                                    </tr>
                                   
                                   
								</tbody>
                        	</table>
                        	<div class="modal-footer">
                    			<button type="button" class="btn btn-danger" data-dismiss="modal">Hapus</button>
                    			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#berita-modal">Tambah</button>
                    			<button type="button" class="btn btn-success">Simpan</button>
                    		</div>
                        </div><!-- /.table-responsive -->


	                </div><!-- /.tab-pane -->
	            </div><!-- /.tab-content -->
	        </div><!-- nav-tabs-custom -->
	    </div><!-- /.col -->


		<div class="blog col-sm-12">

		</div>


	</div>
</section>
