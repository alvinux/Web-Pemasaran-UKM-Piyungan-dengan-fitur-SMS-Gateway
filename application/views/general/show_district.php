<div class="form-group">
    <label for="inputPassword3" class="col-md-4 control-label">Kecamatan</label>
    <div class="col-md-6">
        <select name="kecamatan" class="form-control">
            <?php foreach ($kecamatan as $row) { ?>
            <option value="<?php echo $row->id_kecamatan; ?>"><?php echo $row->kecamatan; ?></option>
            <?php } ?>
        </select>
    </div>
    <label class="col-md-4 control-label text-danger"><?php echo form_error('kecamatan'); ?></label>
</div>