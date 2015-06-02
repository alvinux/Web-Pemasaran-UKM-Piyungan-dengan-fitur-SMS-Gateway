
 <!-- Modal Upload goto -->
    <div id="modalUpload" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content panel panel-info">
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Upload Gambar</h3>
                </div>
                <?php echo form_open_multipart('proses/upload_gambar_produk_baru'); ?>
                <div class="panel-body">
                    <div class="form-horizontal" role="form">
                    	<input name="foto" class="col-xs-12" style="overflow:hidden;padding:0;" type="file">
                    </div>
                </div>
                <hr style="margin: 0; padding: 0;">
                <div class="modal-footer">
                    <input name="id_produk" type="hidden" value="<?php echo $id_produk; ?>">
                    <button class="btn btn-primary" type="submit">Upload</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modal Upload FOto -->