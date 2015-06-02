   <?php if (empty($berita)) {
    echo form_open_multipart('proses/tambah_berita'); ?>
         <center><h3>Tambah Berita / Informasi</h3></center>
         <hr>
         <div class="col-md-12" style="margin-bottom: 20px;">
          <label>Judul</label>
          <input class="form-control" placeholder="Isikan Judul" type="text" name="judul" value="">
        </div>
        <div class="col-md-12" style="margin-bottom: 20px;">
          <label>Gambar Cover</label>
          <input name="img_berita" class="form-control" type="file" value="">
          <p> *Ukuran gambar yang dianjurkan adalah 730px X 292px
            dan besar file kurang dari 2MB <br>
              *Boleh dikosongkan
          </p>
        </div> 
        <br>
        <div class="col-md-12">
          <textarea name="isi_berita" class="form_control" id="isi_berita" rows="10" cols="80"></textarea>
        </div>
        <div class="col-md-12">
          <input style="display:none;" name="id_page" value="1"type="text">
          <button class="btn btn-lg btn-primary" style="margin-top: 20px;" type="submit">Simpan</button>
        </div>
  <?php form_close(); ?>
<?php } else { 
  echo form_open_multipart('proses_ubah/edit_page_full');?>
          <center><h3>Edit Berita / Informasi</h3></center>
         <hr>
         <div class="col-md-12" style="margin-bottom: 20px;">
          <label>Judul</label>
          <input class="form-control" placeholder="Isikan Judul" type="text" name="judul" value="<?php echo $berita['judul'];?>">
        </div>
        <div class="col-md-12" style="margin-bottom: 20px;">
          <label>Gambar Cover</label>
          <input name="img_berita" class="form-control" type="file" value="">
          <p> *Ukuran gambar yang dianjurkan adalah 730px X 292px
            dan besar file kurang dari 2MB <br>
              *Jika tidak ada perubahan gambar silahkan dikosongkan atau di lewati
          </p>
        </div> 
        <br>
        <div class="col-md-12">
          <textarea name="isi_berita" class="form_control" id="isi_berita" rows="10" cols="80"><?php echo $berita['isi_berita'];?></textarea>
        </div>
        <div class="col-md-12">
          <input style="display:none;" name="id_page" value="<?php echo $berita['id_berita']; ?>"type="text">
          <input style="display:none;" name="img_berita" value="<?php echo $berita['img_berita']; ?>"type="text">
          <button class="btn btn-lg btn-primary" style="margin-top: 20px;" type="submit">Simpan</button>
        </div>
  <?php form_close(); ?>
<?php } ?>

<script type="text/javascript">
  CKEDITOR.replace('isi_berita');
</script>



