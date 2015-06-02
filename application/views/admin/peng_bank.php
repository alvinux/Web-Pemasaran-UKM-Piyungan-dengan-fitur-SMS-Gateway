 <!-- Main content -->
 <section class="content">

 	<!-- Small boxes (Stat box) -->
 	<div class="row">
 		

<?php foreach ($data_bank as $row) { ?>
	<?php echo form_open('proses_ubah/ubah_bank'); ?>
 		<div class="col-md-6">
 			<!-- Primary box -->
 			<div class="box box-solid box-primary">
 				<div class="box-header">
 					<h3 class="box-title">Ubah Data Bank</h3>
 					<div class="box-tools pull-right">
 						<button class="btn btn-primary btn-sm" data-widget="collapse" type="button"><i class="fa fa-minus"></i></button>
 						<!-- <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button> -->
 					</div>
 				</div>
 				<div class="box-body">
 					<div class="row">
 					<div class="form-group">
 						<label for="inputBank" class="col-md-4 control-label">Nama Bank</label>
 						<div class="col-md-8">
 							<input name="nama_bank" class="form-control" id="" placeholder="Nama Bank, CTH 'Mandiri','BCA','BRI' dll.." value="<?php echo $row->nama_bank; ?>" type="text">
 						</div>
 					</div>

 					<div class="form-group">
 						<label for="inputNamaRek" class="col-md-4 control-label">A/N Rekening</label>
 						<div class="col-md-8">
 							<input name="atas_nama" class="form-control" id="" value="<?php echo $row->atas_nama; ?>" placeholder="Atas Nama Rekening" type="text">
 						</div>
 						
 					</div>

 					<div class="form-group">
 						<label for="inputNoRek" class="col-md-4 control-label">No. Rekening</label>
 						<div class="col-md-8">
 							<input name="nomor_rekening" class="form-control" id="" value="<?php echo $row->nomor_rekening; ?>" placeholder="Nomo Rekening, CTH. xxx-xxx-xxx-xxx" type="text">
 						</div>
 						
 					</div>
 				</div>
 				<div class="modal-footer" style="padding: 0; padding-top: 10px;">
 					<input name="id_bank" style="display:none;" class="form-control" id=""  value="<?php echo $row->id_bank; ?>" type="text">
	                <button onclick="hapusBank('<?php echo $row->id_bank; ?>')" class="btn btn-danger" type="button">Hapus</button>
	                <button type="submit" class="btn btn-primary">Simpan</button>
	            </div>
 				</div><!-- /.box-body -->
 			</div><!-- /.box -->
 		</div>
 	</form>
<?php }?>

 


 		<br>
 		<hr>
 		<div class="col-md-4 col-md-offset-4">
 			<button name="addbank" data-toggle="modal" data-target="#addBank" class="btn btn-primary btn-lg bold"><span class="fa fa-plus"></span> Tambah Bank</button>
 		</div>
 		
 	<!-- 	<div class="form-group">
 			<label for="inputEmail3" class="col-md-4 control-label">Nama Bank</label>
 			<div class="col-md-6">
 				<input name="nama" class="form-control" id="" placeholder="Nama Lengkap" type="text">
 			</div>
 			<label class="col-md-12 col-md-12 control-label text-danger"></label>
 		</div>
 -->


 	</div><!-- /.row -->
</section><!-- /.content -->



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


<!-- JavaScript modal  -->
<script type="text/javascript">
function hapusBank(id)
{
    var sure = confirm('Anda Yakin ?');
    if(sure == 1) {
        //show modal
        // $('#customlabel').html('Hapus Bank');
        // $('#custombody').html('<center>loading</center>');
        // $('#custommodal').modal('show')
        //start ajax
        $.ajax({
            url:'<?php echo site_url("ajax/hapus_bank")?>',
            type:'POST',
            data:{id:id},
            success:function(response){
                window.location="<?php echo base_url('admin/pengaturan_bank'); ?>";
            },
            error:function(){
                alert('Gagal menghapus Bank');
            }
        });
    }
}
</script>
