<!-- Modal Tambah Penjual -->
    <div id="tambahpenjual-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tambahpenjual-modal" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content panel panel-info ">
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="tambahpenjual-modal">Tambah Penjual</h3>
                </div>
                <!---------Form Reg-------------->
                <div class="panel-body ">
                     <?php echo form_open('proses/proses_daftar_user'); ?>  
                         <div class="form-horizontal" >
                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-4 control-label">Nama Lengkap</label>
                                <div class="col-md-6">
                                    <input name="nama" type="text" class="form-control" id="" placeholder="Nama Lengkap">
                                </div>
                                <label class="col-md-12 col-md-12 control-label text-danger"><?php echo form_error('nama'); ?></label>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-4 control-label">Nama Panggilan</label>
                                <div class="col-md-6">
                                    <input name="username" type="text" class="form-control" id="" placeholder="Nama Panggilan (max 10 Character)">
                                </div>
                                <label class="col-md-12 col-md-12 control-label text-danger"><?php echo form_error('username'); ?></label>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">
                                    <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                                <label class="col-md-12 control-label text-danger"><?php echo form_error('email'); ?></label>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                                <label class="col-md-12 control-label text-danger"><?php echo form_error('password'); ?></label>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-md-4 control-label">Ulangi Password</label>
                                <div class="col-md-6">
                                    <input name="passwordconf" type="password" class="form-control" id="inputPassword3" placeholder="Ulangi Password">
                                </div>
                                <label class=" col-md-12 control-label text-danger"><?php echo form_error('passwordconf'); ?></label>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-4 control-label">Telepon</label>
                                <div class="col-md-6">
                                    <input name="telepon" type="number" class="form-control" placeholder="Telepon">
                                </div>
                                <label class="col-md-12 control-label text-danger"><?php echo form_error('telepon'); ?></label>
                            </div>
                            <div class="form-group">
                                <label for="inputProvinsi" class="col-md-4 control-label">Provinsi</label>
                                <div class="col-md-6">
                                    <select id="provinsi" name="provinsi" class="form-control">
                                        <option value="" selected="1">Pilih Provinsi</option>
                                        <?php foreach ($provinsi as $row) { ?>
                                        <option value="<?php echo $row->id_provinsi; ?>"><?php echo $row->provinsi; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <label class="col-md-12 control-label text-danger"><?php echo form_error('provinsi'); ?></label>
                            </div>

                            <div id="kabupaten">

                            </div>
                            <div id="kecamatan">

                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-4 control-label">Alamat</label>
                                <div class="col-md-6">
                                    <input name="alamat" type="text" class="form-control" id="inputEmail3" placeholder="Alamat">
                                </div>
                                <label class="col-md-12 control-label text-danger"><?php echo form_error('alamat'); ?></label>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-4 control-label">Kode Pos</label>
                                <div class="col-md-6">
                                    <input name="kode_pos" type="number" class="form-control" id="inputEmail3" placeholder="Kode Pos">
                                </div>
                                <label class="col-md-12 control-label text-danger"><?php echo form_error('kode_pos'); ?></label>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-9">
                                    <button type="submit" name="daftar" id="daftar" class="btn btn-primary btn-lg bold">Daftar</button>
                                </div>
                            </div>
                        <!--                    <div class="control-group">
                                                <div class="controls">
                                                <input name="username" placeholder="username" id="formreg" type="text">
                                                <input name="password" placeholder="password" id="formreg" type="password">
                                                <input name="firstname" placeholder="firstname" id="formreg" type="text">
                                                <input name="lastname" placeholder="lastname" id="formreg" type="text">
                                                <input name="address" placeholder="address" id="formreg" type="text">
                                                <input name="phone" placeholder="phone" id="formreg" type="text">
                                                <input name="email" placeholder="email" id="formreg" type="text">
                                                <input name="upload_picture" type="file">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="checkbox">
                                                    <input type="checkbox">I agree <a id="linktext" href="#TOS">terms and condition</a>
                                                </label>
                                                <button style="border-radius:0" class="btn btn-primary" type="submit">Register</button>
                                            </div>-->
                           </div>
                        </form>
                </div>
                <hr style="margin: 0; padding: 0;">
                <!---------/Form Reg-------------->
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Register -->