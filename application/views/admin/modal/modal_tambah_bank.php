<?php echo form_open('proses/tambah_bank'); ?>
 <div class="modal fade" id="addBank" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog">
		<!-- Primary box -->
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title">Ubah Data Bank</h3>
				<div class="box-tools pull-right">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<!-- <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button> -->
				</div>
			</div>
			<div class="box-body">
				<div class="row">
				<div class="form-group">
					<label for="inputBank" class="col-md-4 control-label">Nama Bank</label>
					<div class="col-md-8">
						<input name="nama_bank" class="form-control" id="" placeholder="Nama Bank, CTH 'Mandiri','BCA','BRI' dll.." type="text">
					</div>
					
				</div>

				<div class="form-group">
					<label for="inputNamaRek" class="col-md-4 control-label">A/N Rekening</label>
					<div class="col-md-8">
						<input name="atas_nama" class="form-control" id=""placeholder="Atas Nama Rekening" type="text">
					</div>
					
				</div>

				<div class="form-group">
					<label for="inputNoRek" class="col-md-4 control-label">No. Rekening</label>
					<div class="col-md-8">
						<input name="nomor_rekening" class="form-control" id="" placeholder="Nomo Rekening, CTH. 123-456-789-0123" type="text">
					</div>
					
				</div>
			</div>
			<div class="modal-footer" style="padding: 0; padding-top: 10px;">
	            <button class="btn" data-dismiss="modal" >Close</button>
	            <button class="btn btn-primary" type="submit">Simpan</button>
        	</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
</form>