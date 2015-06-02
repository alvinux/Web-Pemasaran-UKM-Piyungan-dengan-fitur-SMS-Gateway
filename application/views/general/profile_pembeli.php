<script type="text/javascript">
function konfirmasi(kode)
{
	//show modal
	$('#customlabel').html('Konfirmasi Pembayaran');
	$('#custombody').html('<center>laoding</center>');
	$('#custommodal').modal('show')
	//start ajax
	$.ajax({
		url:'<?php echo site_url("ajax/modal_konfirmasi")?>',
		type:'POST',
		data:{kode:kode},
		success:function(response){
			$('#custombody').html(response);
		},
		error:function(){
			$('#custombody').html('<center>terjadi masalah</center>');
		}
	});
}
</script>
<?php $data['biodata'] = $this->m_user->biodata(); ?>
<?php $id_pembeli = $this->session->userdata['login_user']['id_user']; ?>
<?php //$data['daftar_item'] = $this->m_produk->show_all_product_by_seller($id_penjual); ?>
<section id="detail-profile" class="container">
	<div class="row">
		<div class="row" style="background-color: white;">
			<!-- Custom Tabs (Pulled to the right) -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab_1-1" data-toggle="tab">Profile</a></li>
					<li><a href="#tab_2-2" data-toggle="tab">Riwayat Pembelian</a></li>
					<!-- <li><a href="#tab_2-3" data-toggle="tab">Riwayat Konfirmasi Pembayaran</a></li> -->
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab_1-1">
						<div class="col-md-12 row">
							<?php $this->load->view('general/profile_user',$data);?>
						</div>
					</div><!-- /.tab-pane -->
					<div class="tab-pane" id="tab_2-2">
						<center><h3>Riwayat Pembelian Anda (<?php echo $Transaksi->num_rows();?>)</h3></center>
						<hr>
						<?php //$this->load->view('general/content_list_katagori', $data); ?>

						<!-- THE MESSAGES -->
						<div class="table-responsive">
							<table class="table table-mailbox">
								<thead>
									<tr>
										<th>Kode Transaksi</th>
										<th>Tanggal Transaksi</th>
										<th>Atas Nama</th>
										<th style="width:300px">Alamat Pengiriman</th>
										<th>No Telepon</th>
										<th>Paket Kirim</th>
										<th>Biaya (Rp)</th>
										<th>Pembayaran</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($Transaksi->result_array() as $T):?>
										<tr>
											<td><a style="color:#3bafda;" target="_blank" href="<?php echo site_url('home/detailtransaksi/'.$T['kode_transaksi'])?>"><?php echo $T['kode_transaksi'];?></a></td>
											<td><?php echo $T['tgl_transaksi'];?></td>
											<td><?php echo $T['nama'];?></td>
											<td><?php echo $T['alamat'];?></td>
											<td><?php echo $T['telpon'];?></td>
											<td><?php echo $T['paket_kirim'];?></td>
											<td><?php echo number_format($T['total_biaya']);?></td>
											<td>
												<?php
												//get status konfirmasi pembayaran
												$statusKonfirmasi = $this->m_produk->statusKonfirmasi($T['kode_transaksi']);
												?>
												<!-- button konfirmasi pembayaran-->
												<?php if (empty($statusKonfirmasi)) {?>
													<div style="max-width: 150px;">
														Lakukan <a href="#tambahkonfirmasi" onclick="konfirmasi('<?php echo $T['kode_transaksi'];?>')"  class="btn btn-xs btn-primary" data-placement="bottom"  title="Klik untuk lakukan konfirmasi Pembayaran" data-original-title="Klik untuk lakukan konfirmasi Pembayaran">
															Konfirmasi Pembayaran</a> terlebih dahulu
														</div>
												<?php } else if ($statusKonfirmasi == 'Pending') {?>
														<button type="button" class="btn btn-sm btn-warning" onclick="konfirmasi('<?php echo $T['kode_transaksi'];?>')" data-placement="bottom" title="Edit" data-original-title="Edit">
															<i class="icon-pencil"></i> <?php echo $statusKonfirmasi;?>
														</button>
												<?php } else if ($statusKonfirmasi == 'Lunas') {?>
														<button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Lunas" data-original-title="Lunas">
															<i class="icon-ok-sign"></i> <?php echo $statusKonfirmasi;?>
														</button>
													<?php } else if ($statusKonfirmasi == 'Not Found') {?>
															<button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom"  data-original-title="Konfirmasi gagal, 'Data tidak sesuai' atau 'Tidak ditemukan'. Silahkan 'Edit' kofirmasi pembayaran sesuai" >
																<i class="icon-remove-sign"></i> <?php echo $statusKonfirmasi;?>
															</button><br>
															<div style="max-width: 150px;">
															<small>Pastikan data yang anda masukkan 'Benar'<br>
																	Silahkan lakukan <button class="btn btn-xs btn-primary"  onclick="konfirmasi('<?php echo $T['kode_transaksi'];?>')" >konfirmasi</button> ulang
															</small>
															</div>
													<?php } ?>
																	<!-- end of button konfirmasi pembayaran -->
											</td>
										</tr>
									<?php endforeach;?>
								</tbody>
							</table>
							<hr/>
						<table class="table table-mailbox">
													<!-- <thead>
														<tr style="text-align: center;">
															<th>Kode Transaksi</th>
															<th>Nama Produk</th>
															<th>Jumlah Produk</th>
															<th>Tanggal</th>
															<th>Penjual</th>
															<th>Total Harga</th>
															<th>Status Pembayaran</th>
															<th>Status Pesanan</th>
														</tr>
													</thead> -->
						<tbody>
						<?php foreach ($TransaksiDetail as $T) { ?>
							<?php
								$data['Penjual'] = $this->m_user->data_penjual($T['id_penjual']);
								$data['TransaksiItem'] = $this->m_produk->TransaksiItem($T['kode_transaksi']);
								$new = array();
								$next = array();
								$n=1;
								foreach ($data['TransaksiItem'] as $row):
									if($n<=1):
										array_push($new, $row);
									endif;
									if($n>1):
										array_push($next, $row);
									endif;
									$n++;
								endforeach;
							?>
							<?php foreach ($new as $item) { ?>
								<tr >
								<!-- <td class="small-col" rowspan="<?php echo $n-1;?>"><input type="radio" name="kode-trx" value=""/></td> <!-- rowspan="2" -->
								<td rowspan="<?php echo $n-1;?>"><?php echo $T['kode_transaksi']; ?></td>
								<td ><?php echo $item['nama_produk'];?></td>
								<td ><?php echo $item['jumlah'];?> (pcs)</td>
								<td rowspan="<?php echo $n-1;?>"><?php echo $T['tgl_transaksi'];?></td>
								<td rowspan="<?php echo $n-1;?>">Toko: <?php echo $data['Penjual']['username_user'];?></td>
								<td rowspan="<?php echo $n-1;?>">Rp. <?php echo number_format($T['total_harga']);?>,-</td>
								<td rowspan="<?php echo $n-1;?>"><?php $statusKonfirmasi = $this->m_produk->statusKonfirmasi($T['kode_transaksi']);
								//echo $statusKonfirmasi;?>
								<?php if (empty($statusKonfirmasi)) {?>
									<div style="max-width: 150px;">
									Lakukan <a href="#tambahkonfirmasi" onclick="konfirmasi('<?php echo $T['kode_transaksi'];?>')"  class="btn btn-xs btn-primary" data-placement="bottom"  title="Klik untuk lakukan konfirmasi Pembayaran" data-original-title="Klik untuk lakukan konfirmasi Pembayaran">
									Konfirmasi Pembayaran</a> terlebih dahulu
									</div>
								<?php } elseif ($statusKonfirmasi == 'Pending') {?>
										<button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Menunggu konfirmasi admin" data-original-title="Menunggu konfirmasi admin">
											<i class="icon-info-sign"> </i><?php echo $statusKonfirmasi;?>
										</button>
										<button type="button" class="btn btn-sm btn-primary" onclick="konfirmasi('<?php echo $T['kode_transaksi'];?>')" data-placement="bottom" title="Edit" data-original-title="Edit">
											<i class="icon-pencil"></i><?php //echo $statusKonfirmasi;?>
										</button>
								<?php } elseif ($statusKonfirmasi == 'Lunas') {?>
										<button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Lunas" data-original-title="Lunas">
											<i class="icon-ok-sign"></i> <?php echo $statusKonfirmasi;?>
										</button>
								<?php } elseif ($statusKonfirmasi == 'Not Found') {?>
										<button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom"  data-original-title="Konfirmasi gagal, 'Data tidak sesuai' atau 'Tidak ditemukan'. Silahkan 'Edit' kofirmasi pembayaran sesuai" >
											<i class="icon-remove-sign"></i> <?php echo $statusKonfirmasi;?>
										</button><br>
										<div style="max-width: 150px;">
											<small>Pastikan data yang anda masukkan 'Benar'<br>
											Silahkan lakukan <button class="btn btn-xs btn-primary"  onclick="konfirmasi('<?php echo $T['kode_transaksi'];?>')" >konfirmasi</button> ulang
											</small>
										</div>
								<?php } ?>
							</td>
							<td rowspan="<?php echo $n-1;?>">
								<?php if ($T['status'] == 'Pending') {?>
									<button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="status pesanan">
									<i class="icon-info-sign">
								<?php } elseif ($T['status'] == 'Proses') {?>
									<button type="button" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="status pesanan">
									<i class="icon-time">
								<?php } elseif ($T['status'] == 'Terkirim') { ?>
									<button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="status pesanan">
									<i class="icon-ok-sign">
								<?php } elseif ($T['status'] == 'Batal') { ?>
										<button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="status pesanan">
										<span class="icon-remove-sign">
								<?php } ?>
										</i><?php echo $T['status'];?>
									</button>
							</td>
						</tr>
					<?php } ?>
					<?php foreach ($next as $item2) { ?>
							<tr >
								<td ><?php echo $item['nama_produk'];?></td>
								<td ><?php echo $item['jumlah'];?> (pcs)</td>
							</tr>
						<?php } ?>
					<?php } ?>


				</tbody>
			</table>
			<div class="modal-footer">
							<!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Hapus</button> -->
											<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#berita-modal">Tambah</button> -->
								<!-- <button type="button" class="btn btn-success">Simpan</button> -->
				</div>
			</div><!-- /.table-responsive -->

		</div><!-- /.tab-pane -->
																											<!--   <div class="tab-pane" id="tab_2-3">
																											<h3>Riwayat Pembayaran Anda
																											<div class="pull-right">
																											<a href="#tambahkonfirmasi" class="btn btn-success" data-toggle="modal"><i class="glyphicon glyphicon-plus-sign"></i> Konfirmasi Pembayaran Baru</a>
																										</div>
																									</h3>
																									<hr> -->
																									<!-- THE MESSAGES -->
																									<!--    <div class="table-responsive">
																									<table class="table table-mailbox"style="font-size: 13px;">
																									<thead>
																									<tr style="text-align: center;">
																									<th></th>
																									<th>Kode Transaksi</th>
																									<th>A/N Rekening Pengirim</th>
																									<th>Tanggal Transfer</th>
																									<th>Jumlah Transfer</th>
																									<th>Bank Pengirim</th>
																									<th>Bank Tujuan</th>
																									<th>Metode Pembayaran</th>
																									<th>Status</th>

																								</tr>
																							</thead>
																							<tbody>
																							<?php foreach ($konfirmasi_pembayaran as $konf) { ?>
																							<tr >
																							<td class="small-col"><input type="radio" name="konfirmasi" value="<?php echo $konf['id_konfirmasi'];?>"/></td>
																							<td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal"><?php echo $konf['kode_transaksi'];?></a></td>
																							<td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal"><?php echo $konf['nama_pengirim'];?></a></td>
																							<td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal"><?php echo $konf['tgl_bayar'];?><a></td>
																							<td >Rp. <?php echo number_format($konf['jumlah_bayar']);?>,-</td>
																							<td ><?php echo $konf['nama_bank_pengirim'];?></td>
																							<td ><?php $nama_bank_tujuan = $this->m_content->show_bank_byid($konf['bank_tujuan']); echo $nama_bank_tujuan['nama_bank'];?><br><?php echo $nama_bank_tujuan['atas_nama']." (".$nama_bank_tujuan['nomor_rekening'].")"; ?></td>
																							<td ><?php echo $konf['metode_pembayaran'];?></td>
																							<td >
																							<?php if ($konf['status'] == 'Pending') {?>
																							<span class="icon-info-sign" style="color: orange;">
																							<?php } elseif ($konf['status'] == 'Lunas') { ?>
																							<span class="icon-ok-sign" style="color: green;">
																							<?php } elseif ($konf['status'] == 'Not Found') { ?>
																							<span class="icon-remove-sign" style="color: red;">
																							<?php } ?>
																						</span><?php echo $konf['status'];?></td>
																					</tr>
																					<?php }?> -->

																					<!--  <tr >
																					<td class="small-col"><input type="checkbox" /></td>
																					<td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">AIYPWZQP</a></td>
																					<td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">Alvin INDra Cahya</a></td>
																					<td ><a href="#berita-modal" data-toggle="modal" data-target="#berita-modal">DD/MM/YYYY<a></td>
																					<td >Rp. 2.000.153,-</td>
																					<td >BRI</td>
																					<td >Mandiri</td>
																					<td >Transfer Internet Banking</td>
																					<td >Pending</td>
																				</tr> -->


																				<!-- </tbody>
																			</table>
																			<div class="modal-footer">
																			<button type="button" class="btn btn-primary" data-dismiss="modal">Ubah data</button> -->
																			<!-- 	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#berita-modal">Tambah</button>
																			<button type="button" class="btn btn-success">Simpan</button> -->
																			<!-- </div> -->
																			<!-- </div>/.table-responsive -->


																			<!-- </div>/.tab-pane -->
						</div><!-- /.tab-content -->
					</div><!-- nav-tabs-custom -->
				</div><!-- /.col -->
				<div class="blog col-sm-12">
				</div>
			</div>
		</section>

<!-- modal -->
<div class="modal fade" id="custommodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content panel panel-info">
			<div class="modal-header panel-heading">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title" id="customlabel"></h3>
			</div>
			<div id="custombody" class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end of modal -->
