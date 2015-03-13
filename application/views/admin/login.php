<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Admin Website Pemasaran UKM PNPM Mandiri Kec. Piyungan | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href=".<?php echo base_url(); ?>doc/themes/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>doc/themes/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
			<?php echo form_open('proses/proses_login_admin'); ?>
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="User ID"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Masuk</button>  
                    
                   <!--  <p><a href="#">I forgot my password</a></p>
                    
                    <a href="register.html" class="text-center">Register a new membership</a> -->
                </div>
            </form>

            <div class="margin text-center">
                <span>UMKM Mandiri Kec. Piyungan</span>
          
            </div>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>doc/themes/admin/js/bootstrap.min.js"></script>  
        <script type="text/javascript">
            $(document).ready(function(){
                //if page loaded
                window.setInterval(function(){//do action everywhere
                  /// call your function here
                  smsCheck();
                }, 2000);
            });

            function smsCheck(){
                url = '<?php echo site_url("admin/checkSMS"); ?>';
                $.ajax({
                    url:url,
                    success:function(response){
                        // alert(response);
                    },
                    error:function(){
                        alert('sms processor bermasalah');
                    }
            });
            }
        </script>      

    </body>
</html>