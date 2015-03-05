 <!-- Main content -->
 <section class="content">

 	<!-- Small boxes (Stat box) -->
 	<div class="row">
 		

<?php $biodata = array($biodata); 
	foreach ($biodata as $row) { ?>


		<div class="col-sm-6"><!-----Detail Profile---------------->
			<?php echo form_open('proses_ubah/biodata_admin'); ?>
			<div class="form-horizontal" action="#" method="post" accept-charset="utf-8">            
				<h3 class="">Ubah Data Admin</h3>
				<hr>

				<input name="id_admin" type="hidden" value="<?php echo $row['id_admin']; ?>">

				<div class="form-group"><!----nama---->
					<label style="text-align: left; " class="col-sm-4 control-label" for="nama">User ID</label>
					<div class="col-sm-8">
						<input name="username_admin" class="form-control" id="formreg" value="<?php echo $row['username_admin']; ?>" type="text" >
						<label class="col-md-12 control-label text-danger"><?php echo form_error('username_admin'); ?></label>
					</div>
				</div><!--/nama------>

				<div class="form-group"><!----nama---->
					<label style="text-align: left; " class="col-sm-4 control-label" for="nama">Nama Admin</label>
					<div class="col-sm-8">
						<input name="nama_admin" class="form-control" id="formreg" value="<?php echo $row['nama_admin']; ?>" type="text" >
						<label class="col-md-12 control-label text-danger"><?php echo form_error('nama_admin'); ?></label>
					</div>
				</div><!--/nama------>

				<div class="form-group"><!---email---->
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="email">Email Admin</label>
					<div class="col-sm-8">
						<input name="email" class="form-control" id="formreg" value="<?php echo $row['email']; ?>" type="text" >
						<label class="col-md-12 control-label text-danger"><?php echo form_error('email'); ?></label>
					</div>
				</div><!------/email-------->
				<div class="form-group"><!---Tlp------>
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="hp">HP</label>
					<div class="col-sm-8">
						<input name="telpon" class="form-control" id="formreg" value="<?php echo $row['telpon']; ?>" type="text" >
						<label class="col-md-12 control-label text-danger"><?php echo form_error('telpon'); ?></label>
					</div>
				</div><!------/Tlp-------------->
				<div class="form-group"><!---Alamat------------>
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="alamat">Alamat</label>
					<div class="col-sm-8">
						<textarea name="alamat" class="form-control" rows="3" placeholder="<?php echo $row['alamat']; ?>"><?php echo $row['alamat']; ?></textarea>
						<label class="col-md-12 control-label text-danger"><?php echo form_error('alamat'); ?></label>
					</div>
				</div><!------/Alamat-------------------------->
				<!---Povinsi-->
		
				<div class="form-group"><!---Password utk ubahdata------------------------>
					<label style="text-align: left;" class="col-sm-4 control-label text-left" for="password">Password</label>
					<div class="col-sm-8">
						<button name="changePass" data-toggle="modal" data-target="#myChgPass" type="button" class="btn btn-danger btn-md bold"><span class="glyphicon glyphicon-cog"></span>Ubah Password?</button>
					</div>
				</div><!------/Password------------><hr>
				<button name="simpan" type="submit" class="btn btn-primary btn-lg bold"><span class="glyphicon glyphicon-ok"></span> Simpan</button>

			</div>
			</form>
		</div><!--detail profil---->

<?php } ?>

 	</div><!-- /.row -->
</section><!-- /.content -->























