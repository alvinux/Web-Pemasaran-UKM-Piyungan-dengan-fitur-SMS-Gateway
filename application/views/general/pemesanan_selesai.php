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
<?php //print_r($pesananTerakhir); ?>
<section id="blog" class="container">
<div class="row">
      <center><h2>Anda telah berhasil melakukan transaksi pemesanan</h2></center>
      <div class="col-sm-8 col-sm-offset-2">
        <div class="">
            <div class="blog-item">
                <center>
                    <h4 style="line-height: 2;">
                        Terimakasih, anda telah berbelanja di website kami. <br>
                        Silahkan melakukan Pembayaran melalui Transfer sesuai Nominal yang tertera
                    </h4>
                    <div class="blog" style="width: 400px;">
                        <center>Kode Transaksi : <?php echo $pesananTerakhir['kode_transaksi'];?></center>
                        <div class="blog-item" style="border: solid 3px rgb(226, 220, 220);box-shadow: 2px 2px 0px 0px #e5e5e5;">
                            <h4 style="padding-top: 10px;margin-bottom: 0;font-weight: bold;">Jumlah Yang harus anda bayar :</h4>
                            <b>
                                <h2 style="margin-top: 0;padding-bottom: 10px;">Rp. <?php echo number_format($pesananTerakhir['total_biaya']);?>,-
                                </h2>
                            </b>

                        </div>
                    </div>
                    <h4>Ke Salah Satu nomor rekekning UKM PNPM Piyungan di bawah ini</h4>
                    <div class="blog row" style="width: 800px;">
                        <?php foreach ($bank as $bank) { ?>
                        <div class="blog-item col-sm-4" style="border: solid 3px rgb(226, 220, 220);box-shadow: 2px 2px 0px 0px #e5e5e5;">
                            <img class="img-responsive img-blog" style="padding-top: 10px;" src="<?php echo base_url('assets/img/banks/'.$bank->nama_bank.".jpg"); ?>" width="100%" alt="">
                            <p style="padding-top: 10px;margin-bottom: 0;font-weight: bold;text-align: left;">Bank <?php echo $bank->nama_bank; ?></p>
                            <b>
                                <p style="margin-top: 0;text-align: left;">A/N <?php echo $bank->atas_nama; ?> <br><span style="
                                    font-size: 20px;
                                    "> <?php echo $bank->nomor_rekening; ?></span>
                                </p>
                            </b>
                        </div>
                        <?php } ?>
                    </div>
                    <h4 style="line-height: 2;">Setelah melakukan transfer, segera lakukan <b>Konfirmasi Pembayaran</b>.<br>
                    Pembayaran tanpa melakukan konfirmasi tidak dapat kami proses lebih lanjut.<br>
                    Pastikan Anda mengisi data yang sesuai saat melakukan <b>Konfirmasi Pembayaran</b>.
                    </h4>

                    <button onclick="konfirmasi('<?php echo $pesananTerakhir['kode_transaksi'];?>')" class="btn btn-lg btn-primary" style="line-height: 1.5;">Konfirmasi Pembayaran</button>
                    <h4 style="line-height: 2;">
                        Jika dalam waktu <b>2 hari</b> anda tidak melakukan pembayaran dan konfirmasi pembayaran. Pemesanan dianggap batal.
                    </h4>

                </center>
            </div>
            <!--/.blog-item-->
        </div>
    </div><!--/.col-md-8-->
</div>

<!--/.row-->
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
