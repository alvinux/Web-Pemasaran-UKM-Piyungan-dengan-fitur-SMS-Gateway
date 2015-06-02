<?php if (!empty($jenis_produk)) { ?>

<div class="form-group">
    <label for="inputPassword3" class="col-md-4 control-label">Jenis Produk</label>
    <div class="col-md-6">
        <select name="kecamatan" class="form-control">
            <?php foreach ($jenis_produk as $row) { ?>
            <option value="<?php echo $row->id_jenis_produk; ?>"><?php echo $row->nama_jenis_produk; ?></option>
            <?php } ?>
        </select>
    </div>
    <label class="col-md-4 control-label text-danger"><?php echo form_error('jenis_produk'); ?></label>
</div>


<?php } else {
	# code...
}
?>