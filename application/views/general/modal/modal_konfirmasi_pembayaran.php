<!-- Modal tambah produk -->
<!--     <div id="tambahkonfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content panel panel-info ">
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Konfirmasi Pembayaran</h3>
                </div>
                <!---------Form Reg-------------->
                <!-- <div class="panel-body "> -->
                <?php if (empty($konfirmasi_pembayaran)) {
                    echo form_open_multipart('proses/proses_konfirmasi_pembayaran'); ?>
                        <div class="form-horizontal" >
                           <!--  <div class="form-group">
                                <label class="col-md-4 control-label">Gambar produk</label>
                                <div class="col-md-6">
                                    <input name="foto" class="form-control" type="file">
                                    <p>*Ukuran gambar yang dianjurkan adalah 320px x 240px
                                        dan besar file kurang dari 1MB
                                    </p>
                                    <p>*Gambar ini akan dijadikan tampilan thumbnail pada produk
                                    </p>
                                    <p>*Gambar bisa ditambahkan pada menu profile > edit produk
                                    </p>
                                </div>
                                <label class="col-md-12 col-md-12 control-label text-danger"><?php echo form_error('upload_picture'); ?></label>
                            </div> -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Kode Transaksi</label>
                                <div class="col-md-6">
                                    <label class="form-control" placeholder="Kode Transaksi Pembelian" name="kode_transaksi"  type="text"><?php echo $kode_transaksi;?></label>
                                    <input class="form-control" style="display:none;" placeholder="Kode Transaksi Pembelian" name="kode_transaksi" value="<?php echo $kode_transaksi;?>" type="text">
                                    <!-- <label style="font-weight: normal;">*Isikan kode transaksi pembelian anda</label> -->
                                </div>
                                <label class="col-md-12 control-label text-danger"><?php echo form_error('kode_transaksi'); ?></label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">A/N Rekening Pengirim</label>
                                <div class="col-md-6">
                                    <input class="form-control" placeholder="A/N Rekening Pengirim" name="nama_pengirim" type="text" value="" >
                                    <label style="font-weight: normal;">*Isikan Atas Nama rekening pengirim</label>
                                </div>
                                <label class="col-md-12 col-md-12 control-label text-danger"><?php echo form_error('nama_pengirim'); ?></label>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label">Tanggal Transfer</label>
                                <div class="col-md-6">
                                    <input class="form-control" placeholder="Tanggal Transfer" name="tanggal_transfer" type="date">
                                    <label style="font-weight: normal;">*Isikan Tanggal anda melakukan pembayaran</label>
                                </div>
                                <label class="col-md-12 control-label text-danger"><?php echo form_error('tanggal_transfer'); ?></label>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label">Jumlah Transfer</label>
                                <div class="col-md-6">
                                    <input class="form-control" placeholder="Jumalah Transfer" name="jumlah_transfer" type="text">
                                    <label style="font-weight: normal;">*Isikan Jumlah transfer hanya dalam bentuk angka tanpa "." atau ","</label>
                                </div>
                                <label class=" col-md-12 control-label text-danger"><?php echo form_error('jumlah_transfer'); ?></label>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label">Bank Pengirim</label>
                                <div class="col-md-6">
                                    <input class="form-control" placeholder="Nama Bank Pengirim, CTH('BCA'/'Mandiri'/'BRI' DLL)" name="bank_pengirim" type="text">
                                    <label style="font-weight: normal;">*Isikan Nama Bank Pengirim, Contoh( BCA / Mandiri / BRI  Dan Lain-lain)</label>
                                </div>
                                <label class=" col-md-12 control-label text-danger"><?php echo form_error('bank_pengirim'); ?></label>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label">Bank Tujuan</label>
                                <div class="col-md-6"><?php //print_r($bank);?>
                                    <select id="Banktujuan" name="bank_tujuan" class="form-control">
                                        <option value="" selected="1">Pilih Bank Tujuan</option>
                                        <?php foreach ($bank as $bank) { ?>
                                            <option value="<?php echo $bank->id_bank; ?>"><?php echo $bank->nama_bank; ?>. (<?php echo ($bank->nomor_rekening); ?>), A/N <?php echo ($bank->atas_nama); ?></option>
                                        <?php }?>
                                    </select>
                                    <label style="font-weight: normal;">*Pilih Bank tujuan yang anda kirim</label>
                                </div>
                                <label class=" col-md-12 control-label text-danger"><?php echo form_error('bank_tujuan'); ?></label>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label">Metode Pembayaran</label>
                                <div class="col-md-6">
                                    <select id="metodepembayaran" name="metode_pembayaran" class="form-control">
                                        <option value="" selected="1">Pilih Metode pembayaran</option>
                                        <option value="Transfer ATM" >Transfer ATM</option>
                                        <option value="Setor Transfer Tunai" >Setor Transer Tunai</option>
                                        <option value="Internet Banking" >Internet Banking</option>
                                    </select>
                                    <label style="font-weight: normal;">*Pilih Metode Pembayaran</label>
                                </div>
                                <label class=" col-md-12 control-label text-danger"><?php echo form_error('metode_pembayaran'); ?></label>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-md-10 control-label" style="text-align: left;">Katagori dan Jenis Produk</label>
                                <div class="form-group" style="">
                                    <label class="col-sm-4 control-label text-left">Katagori Produk</label>
                                    <div class="col-sm-6">
                                        <select id="katagoriproduk" name="katagoriproduk" class="form-control">
                                            <option value="" selected="1">Pilih Katagori</option>
                                            <?php foreach ($katagoriproduk as $konfirmasi_pembayarani) { ?>
                                            <option value="<?php echo $konfirmasi_pembayarani->id_katagori; ?>"><?php echo $konfirmasi_pembayarani->nama_katagori; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <label class="col-md-12 control-label text-danger"><?php echo form_error('katagoriproduk'); ?></label>
                                </div>
                                <div id="jenis_produk" style="">
                                    <!-- <div class="form-group">
                                        <label for="inputJenisproduk" class="col-md-4 control-label">Jenis Produk</label>
                                        <div class="col-md-8">
                                            <!-- #kabupaten digunakan untuk menampilkan #kecamatan melalui ajax
                                            <select name="jenis_produk" id="inputjenisproduk" class="form-control">
                                                <?php foreach ($jenis_produk as $jp) { ?>
                                                <option value="<?php echo $jp->katagori_produk_id; ?>"><?php echo $jp->nama_jenis_produk; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <label class="col-md-4 control-label text-danger"><?php echo form_error('jenis_produk'); ?></label>
                                    </div> -->
                                <!-- </div>

                            </div> -->


                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-9">

                                    <button type="submit" name="konfirmasi" id="konfirmasi" class="btn btn-primary btn-lg bold"><i class="glyphicon glyphicon-plus-sign"></i>  Konfirmasi Pembayaran</button>
                                </div>
                            </div>

                         </div>
                        </form>

                <?php } else {
                    echo form_open_multipart('proses_ubah/proses_edit_konfirmasi_pembayaran'); ?>
                     <?php //echo form_open_multipart('proses/proses_konfirmasi_pembayaran'); ?>

                         <div class="form-horizontal" >
                           <!--  <div class="form-group">
                                <label class="col-md-4 control-label">Gambar produk</label>
                                <div class="col-md-6">
                                    <input name="foto" class="form-control" type="file">
                                    <p>*Ukuran gambar yang dianjurkan adalah 320px x 240px
                                        dan besar file kurang dari 1MB
                                    </p>
                                    <p>*Gambar ini akan dijadikan tampilan thumbnail pada produk
                                    </p>
                                    <p>*Gambar bisa ditambahkan pada menu profile > edit produk
                                    </p>
                                </div>
                                <label class="col-md-12 col-md-12 control-label text-danger"><?php echo form_error('upload_picture'); ?></label>
                            </div> -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Kode Transaksi</label>
                                <div class="col-md-6">
                                    <label class="form-control" placeholder="Kode Transaksi Pembelian" name="kode_transaksi"  type="text"><?php echo $kode_transaksi;?></label>
                                    <input class="form-control" style="display:none;" placeholder="Kode Transaksi Pembelian" name="kode_transaksi" value="<?php echo $kode_transaksi;?>" type="text">
                                    <!-- <label style="font-weight: normal;">*Isikan kode transaksi pembelian anda</label> -->
                                </div>
                                <label class="col-md-12 control-label text-danger"><?php echo form_error('kode_transaksi'); ?></label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">A/N Rekening Pengirim</label>
                                <div class="col-md-6">
                                    <input class="form-control" placeholder="A/N Rekening Pengirim" name="nama_pengirim" type="text" value="<?php echo $konfirmasi_pembayaran['nama_pengirim']?>" >
                                    <label style="font-weight: normal;">*Isikan Atas Nama rekening pengirim</label>
                                </div>
                                <label class="col-md-12 col-md-12 control-label text-danger"><?php echo form_error('nama_pengirim'); ?></label>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label">Tanggal Transfer</label>
                                <div class="col-md-6">
                                    <input class="form-control" placeholder="Tanggal Transfer" name="tanggal_transfer" id="tgl" type="date" value="<?php echo date('Y-m-d',strtotime($konfirmasi_pembayaran['tgl_bayar']))?>">
                                    <label style="font-weight: normal;">*Isikan Tanggal anda melakukan pembayaran</label>
                                </div>
                                <label class="col-md-12 control-label text-danger"><?php echo form_error('tanggal_transfer'); ?></label>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label">Jumlah Transfer</label>
                                <div class="col-md-6">
                                    <input class="form-control" placeholder="Jumalah Transfer" name="jumlah_transfer" type="text" value="<?php echo $konfirmasi_pembayaran['jumlah_bayar']?>">
                                    <label style="font-weight: normal;">*Isikan Jumlah transfer hanya dalam bentuk angka tanpa "." atau ","</label>
                                </div>
                                <label class=" col-md-12 control-label text-danger"><?php echo form_error('jumlah_transfer'); ?></label>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label">Bank Pengirim</label>
                                <div class="col-md-6">
                                    <input class="form-control" placeholder="Nama Bank Pengirim, CTH('BCA'/'Mandiri'/'BRI' DLL)" name="bank_pengirim" type="text" value="<?php echo $konfirmasi_pembayaran['nama_bank_pengirim']?>">
                                    <label style="font-weight: normal;">*Isikan Nama Bank Pengirim, Contoh( BCA / Mandiri / BRI  Dan Lain-lain)</label>
                                </div>
                                <label class=" col-md-12 control-label text-danger"><?php echo form_error('bank_pengirim'); ?></label>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label">Bank Tujuan</label>
                                <div class="col-md-6"><?php //print_r($bank);?>
                                    <select id="Banktujuan" name="bank_tujuan" class="form-control">
                                        <option value="" >Pilih Bank Tujuan</option>
                                        <?php foreach ($bank as $bank) { ?>
                                            <option <?php if ($bank->id_bank == $konfirmasi_pembayaran['bank_tujuan']) { echo 'selected="1"'; } else {} ?> value="<?php echo $bank->id_bank; ?>"><?php echo $bank->nama_bank; ?>. (<?php echo ($bank->nomor_rekening); ?>), A/N <?php echo ($bank->atas_nama); ?></option>
                                        <?php }?>
                                    </select>
                                    <label style="font-weight: normal;">*Pilih Bank tujuan yang anda kirim</label>
                                </div>
                                <label class=" col-md-12 control-label text-danger"><?php echo form_error('bank_tujuan'); ?></label>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label">Metode Pembayaran</label>
                                <div class="col-md-6">
                                    <select id="metodepembayaran" name="metode_pembayaran" class="form-control">
                                        <option value="" >Pilih Metode pembayaran</option>
                                        <option value="Transfer ATM" <?php if ($konfirmasi_pembayaran['metode_pembayaran']=='Transfer ATM') { echo 'selected="1"'; } else {} ?>>Transfer ATM</option>
                                        <option value="Setor Transfer Tunai" <?php if ($konfirmasi_pembayaran['metode_pembayaran']=='Setor Transfer Tunai') { echo 'selected="1"'; } else {} ?>>Setor Transer Tunai</option>
                                        <option value="Internet Banking" <?php if ($konfirmasi_pembayaran['metode_pembayaran']=='Internet Banking') { echo 'selected="1"'; } else {} ?>>Internet Banking</option>
                                    </select>
                                    <label style="font-weight: normal;">*Pilih Metode Pembayaran</label>
                                </div>
                                <label class=" col-md-12 control-label text-danger"><?php echo form_error('metode_pembayaran'); ?></label>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-md-10 control-label" style="text-align: left;">Katagori dan Jenis Produk</label>
                                <div class="form-group" style="">
                                    <label class="col-sm-4 control-label text-left">Katagori Produk</label>
                                    <div class="col-sm-6">
                                        <select id="katagoriproduk" name="katagoriproduk" class="form-control">
                                            <option value="" selected="1">Pilih Katagori</option>
                                            <?php foreach ($katagoriproduk as $konfirmasi_pembayarani) { ?>
                                            <option value="<?php echo $konfirmasi_pembayarani->id_katagori; ?>"><?php echo $konfirmasi_pembayarani->nama_katagori; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <label class="col-md-12 control-label text-danger"><?php echo form_error('katagoriproduk'); ?></label>
                                </div>
                                <div id="jenis_produk" style="">
                                    <!-- <div class="form-group">
                                        <label for="inputJenisproduk" class="col-md-4 control-label">Jenis Produk</label>
                                        <div class="col-md-8">
                                            <!-- #kabupaten digunakan untuk menampilkan #kecamatan melalui ajax
                                            <select name="jenis_produk" id="inputjenisproduk" class="form-control">
                                                <?php foreach ($jenis_produk as $jp) { ?>
                                                <option value="<?php echo $jp->katagori_produk_id; ?>"><?php echo $jp->nama_jenis_produk; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <label class="col-md-4 control-label text-danger"><?php echo form_error('jenis_produk'); ?></label>
                                    </div> -->
                                <!-- </div>

                            </div> -->


                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-9">

                                    <button type="submit" name="konfirmasi" id="konfirmasi" class="btn btn-primary btn-lg bold"><i class="glyphicon glyphicon-plus-sign"></i>  Edit Konfirmasi Pembayaran</button>
                                </div>
                            </div>

                         </div>
                        </form>
                <?php } ?>
                <!-- </div>
                <hr style="margin: 0; padding: 0;">
                <!---------/Form Reg-------------->
                <!-- <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
        </div>
    </div>  -->
    <!-- /Modal Register -->
