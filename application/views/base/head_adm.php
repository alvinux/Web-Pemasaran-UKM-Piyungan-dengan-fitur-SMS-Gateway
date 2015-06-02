<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


        <?php if ($this->uri->segment(2)==='format_sms' || $this->uri->segment(2)==='list_penjual' ) { ?>
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />
 



        <?php } else if ($this->uri->segment(2)==='content_page') { ?>

        <!-- font Awesome -->
         <link href="<?php echo base_url(); ?>doc/themes/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!--         <link href="<?php echo base_url(); ?>doc/themes/public/css/prettyPhoto.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>doc/themes/public/css/animate.css" rel="stylesheet"> -->
        <!-- Ionicons -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
   <!-- DATA TABLES -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


        <?php } else if ($this->uri->segment(2)==='sms') { ?>

        <!-- font Awesome -->
         <link href="<?php echo base_url(); ?>doc/themes/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!--         <link href="<?php echo base_url(); ?>doc/themes/public/css/prettyPhoto.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>doc/themes/public/css/animate.css" rel="stylesheet"> -->
        <!-- Ionicons -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
   <!-- DATA TABLES -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />




       <?php } else { ?>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />
       <!-- DATA TABLES -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
            <?php }  ?>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">