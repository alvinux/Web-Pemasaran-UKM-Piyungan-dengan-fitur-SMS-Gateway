  <script>$('[data-toggle="tooltip"]').tooltip({'placement': 'bottom'});

    $('#chart').popover({'html': 'true'});</script>
    <script> $("[data-toggle=popover]").popover();</script>
    <!-- jQuery 2.0.2 -->
    <script src="<?php echo base_url(); ?>doc/themes/admin/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>doc/themes/admin/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $("#provinsi").change(function(){
            var id_prov = {id_prov:$("#provinsi").val()};
            $.ajax({
                type: "POST",
                url : "<?php echo site_url('home/pilih_kabupaten'); ?>",
                data: id_prov,
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
                // data: {id_kab_kota:id_kab_kota},//request yang dikirimkan ke response
                success: function(msg){
                    $('#kecamatan').html(msg);
                }
            });
        });
     </script>


    
  <?php if ($this->uri->segment(2)==='format_sms' || $this->uri->segment(2)==='testimonial') { ?>

       
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/AdminLTE/app.js" type="text/javascript"></script>
        
         <script>$('[data-toggle="tooltip"]').tooltip({'placement': 'bottom'});

            $('#chart').popover({'html': 'true'});</script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>



  <?php } else if ($this->uri->segment(2)==='content_page' || $this->uri->segment(2)==='list_penjual') { ?>


        <script src="<?php echo base_url(); ?>doc/themes/public/js/jquery.prettyPhoto.js"></script>
        
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/AdminLTE/app.js" type="text/javascript"></script>
        
         <script>$('[data-toggle="tooltip"]').tooltip({'placement': 'bottom'});

            $('#chart').popover({'html': 'true'});</script>
    
          <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

<?php } else if ($this->uri->segment(2)==='sms') { ?>


        <script src="<?php echo base_url(); ?>doc/themes/public/js/jquery.prettyPhoto.js"></script>
        
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/AdminLTE/app.js" type="text/javascript"></script>
        
         <script>$('[data-toggle="tooltip"]').tooltip({'placement': 'bottom'});

            $('#chart').popover({'html': 'true'});</script>
    
          <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>


  <?php } else { ?>
        <!-- jQuery 2.0.2 -->
    <!--    <script src="<?php echo base_url(); ?>doc/themes/admin/js/jquery.min.js"></script>-->
        <!-- jQuery UI 1.10.3 -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
       <!-- <script src="<?php echo base_url(); ?>doc/themes/admin/js/bootstrap.min.js" type="text/javascript"></script>-->
        <!-- Morris.js charts -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/AdminLTE/demo.js" type="text/javascript"></script>
        <script>$('[data-toggle="tooltip"]').tooltip({'placement': 'bottom'});

            $('#chart').popover({'html': 'true'});</script>
<?php }  ?>
    </body>
</html>