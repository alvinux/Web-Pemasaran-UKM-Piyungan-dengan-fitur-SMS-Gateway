
 <!-- Modal Ganti Password -->
    <div id="myChgPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content panel panel-info">
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Ganti Password</h3>
                </div>
                <div class="panel-body">
                    <?php echo form_open('proses_ubah/pass_admin'); ?>
                        <div class="form-horizontal" >
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="inputEmail">Password Lama</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control"  id="inputPasslama" placeholder="Password" name="password">
                                </div>
                            </div>
    						<hr>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="inputPassword">Password Baru</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="inputNewPassword" placeholder="" name="newpassword">
                                </div>
                            </div>
    						<div class="form-group">
                                <label class="col-sm-4 control-label" for="inputPassword">Ulangi Password Baru</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="retypeNewPassword" placeholder="" name="newpasswordconf">
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-6">
                                    <button type="submit" class="btn btn-primary">Ubah Password</button>
    								
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <hr style="margin: 0; padding: 0;">
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" >Close</button>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Login -->