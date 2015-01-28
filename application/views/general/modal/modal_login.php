
 <!-- Modal Login -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content panel panel-info">
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Login</h3>
                </div>
                <div class="panel-body">
                    <?php echo form_open('proses/proses_login_user'); ?>
                    <div class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputEmail">Email</label>
                            <div class="col-sm-6">
                                <input name="email" type="email" class="form-control"  id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword">Password</label>
                            <div class="col-sm-6">
                                <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-6">
                                <div style="margin-left: 1px;" class="checkbox">
                                    <input type="checkbox" id="flat-checkbox-1">
                                    <label for="flat-checkbox-1">Remember me</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-6">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <hr style="margin: 0; padding: 0;">
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" >Close</button>
                    <a href="#myReg" data-dismiss="modal" role="button" class="btn btn-primary" data-toggle="modal">Register</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Login -->