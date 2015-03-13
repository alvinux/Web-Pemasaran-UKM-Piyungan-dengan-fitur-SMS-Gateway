 

<!--    <script src="js/application.js"></script>
    <script src="js/site.min.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script src="js/application.js"></script>-->

    

<!--    <script src="js/bootstrap.min.js"></script>-->

    <!-- Le javascript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--
        <script src="js/application.js"></script>
        <script src="js/bootstrap-modal.js"></script>
        <script src="js/jquery-1.10.1.min.js"></script>
        <script src="js/main.js"></script>-->

    <script src="<?php echo base_url(); ?>doc/themes/public/js/site.min.js"></script> 
    <script src="<?php echo base_url(); ?>doc/themes/public/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url(); ?>doc/themes/public/js/main.js"></script>
    
<script>$('[data-toggle="tooltip"]').tooltip({'placement': 'bottom'});

    $('#chart').popover({'html': 'true'});</script>


<!-- #provinsi=nama id pada form select, #kabupaten=nama id pada form untuk menampilkan hasil, id_provinsi=kolom pada tabel provinsi, url=untuk memanggil form select -->
<script type="text/javascript">
    $("#provinsi").change(function(){
        var id_provinsi = {id_provinsi:$("#provinsi").val()};
        $.ajax({
            type: "POST",
            url : "<?php echo site_url('home/pilih_kabupaten'); ?>",
            data: id_provinsi,
            success: function(msg){
                $('#kabupaten').html(msg);
            }
        });
    });
</script>
<script type="text/javascript">
    $("#kabupaten").change(function(){
        var id_kab_kota = $('#inputkabupaten').val();//memasukan value select id kabupaten
        $.ajax({
            type: "POST",
            url : "<?php echo site_url('home/pilih_kecamatan'); ?>",
            data: {id_kab_kota:id_kab_kota},//request yang dikirimkan ke response
            success: function(msg){
                $('#kecamatan').html(msg);
            }
        });
    });
</script>


    <script>$("#ellipsis").ellipsis();</script>
    <script src="<?php echo base_url(); ?>doc/themes/public/js/jquery.text-overflow.js"></script> 

    <!-- <script src="js/jquery.js"></script>
            <script src="js/bootstrap-transition.js"></script>
            <script src="js/bootstrap-alert.js"></script>
            <script src="js/bootstrap-modal.js"></script>
           <script src="js/bootstrap-dropdown.js"></script>
            <script src="js/bootstrap-scrollspy.js"></script>
            <script src="js/bootstrap-tab.js"></script>
            <script src="js/bootstrap-tooltip.js"></script>
            <script src="js/bootstrap-popover.js"></script>
            <script src="js/bootstrap-button.js"></script>
            <script src="js/bootstrap-collapse.js"></script>
            <script src="js/bootstrap-carousel.js"></script>
            <script src="js/bootstrap-typeahead.js"></script>-->

</body>
</html>