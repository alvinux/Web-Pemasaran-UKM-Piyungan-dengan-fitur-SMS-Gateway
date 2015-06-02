<?php //$this->load->model(array('m_user'));
// print_r($sms_inbox_keluhan);?>
<?php ?>
 <section class="content">
 	<!-- MAILBOX BEGIN -->
 	<div class="mailbox row">
 		<div class="col-xs-12">
 			<div class="box box-solid">
 				<div class="box-body">
 					<div class="row">
 						<div class="col-md-2 col-sm-3">
                            <!-- BOXES are complex enough to move the .box-header around.
                            This is an example of having the box header within the box body -->
                            <div class="box-header">
                            	<i class="fa fa-inbox"></i>
                            	<h3 class="box-title">INBOX Admin</h3>
                            </div>
                            <!-- compose message btn -->
                            <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> Compose Message</a>
                            <!-- Navigation - folders-->
                            <div style="margin-top: 15px;">
                            	<ul class="nav nav-pills nav-stacked">
                            		<li class="header">Folders</li>
                            		<li <?php if (empty($this->uri->segment(3))) { echo 'class="active"';} else {}?>><a href="<?php echo base_url(); ?>admin/sms/"><i class="fa fa-inbox"></i> Inbox (14)</a></li>
                            		<!-- <li><a href="#"><i class="fa fa-pencil-square-o"></i> Drafts</a></li> -->
                            		<li <?php if ($this->uri->segment(3)=='sent') { echo 'class="active"';} else {}?>><a href="<?php echo base_url(); ?>admin/sms/sent"><i class="fa fa-mail-forward"></i> Sent</a></li>
                            		<li <?php if ($this->uri->segment(3)=='solved') { echo 'class="active"';} else {}?>><a href="<?php echo base_url(); ?>admin/sms/solved"><i class="fa fa-check"></i> Solved</a></li>
                            		<li <?php if ($this->uri->segment(3)=='pending') { echo 'class="active"';} else {}?>><a href="<?php echo base_url(); ?>admin/sms/pending"><i class="fa fa-exclamation-triangle"></i> Pending</a></li>
                            	</ul>
                            </div>
                        </div><!-- /.col (LEFT) -->
                        <div class="col-md-10 col-sm-9">
                      

                            <div class="box-body table-responsive">
                                <!-- THE MESSAGES -->
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Stts</th>
                                            <th>Tanggal Terima</th>
                                            <th>User Pengirim</th>
                                            <th>Pesan</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php if ($this->uri->segment(3)== 'sent') { ?>
                                        <?php foreach ($sms_data as $sms) { ?>
                                        <tr><?php //print_r($sms);?>
                                          
                                            <?php if ($sms['Status'] == 'SendingError') {
                                                echo '<td class="small-col"><i class="fa fa-times-circle" title="Tidak terkirim" style="color:red;"></i></td>';
                                            } else {
                                                echo '<td class="small-col"><i class="fa fa-share" title="terkirim" style="color:green;"></i></td>';
                                                # code...
                                            }
                                            ?>
                                            <!-- <td class="small-col"><i class="fa fa-star-o"></i></td> -->
                                            <td class="time"><a href="#"><?php echo $sms['SendingDateTime'];?></a></td>
                                            <td class="name"><?php echo $this->m_user->data_user_byPhone($sms['DestinationNumber'])['username_user'];?></td>
                                            <td class="subject message-preview"><a href="#"><?php echo $sms['TextDecoded'];?></a></td>
                                        </tr>
                                        <?php }?>
                                        
                                    <?php } else { ?>
                                        <?php foreach ($sms_data as $sms) { ?>
                                        <tr>
                                         
                                            <?php if ($sms['Processed'] == 'true') {
                                                echo '<td class="small-col"><i class="fa fa-check" style="color:green;"></i></td>';
                                            } else {
                                                echo '<td class="small-col"><i class="fa fa-exclamation-triangle" style="color:orange;"></i></td>';
                                                # code...
                                            }
                                            ?>
                                            <!-- <td class="small-col"><i class="fa fa-star-o"></i></td> -->
                                            <td class="time"><a href="#"><?php echo $sms['ReceivingDateTime'];?></a></td>
                                            <td class="name"><?php echo $this->m_user->data_user_byPhone($sms['SenderNumber'])['username_user'];?></td>
                                            <td class="subject message-preview"><a href="#"><?php echo $sms['TextDecoded'];?></a></td>
                                        </tr>
                                        <?php }?>
                                    <?php }?>
                                    </tbody>
                        		</table>
                        	</div><!-- /.table-responsive -->
                        </div><!-- /.col (RIGHT) -->
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
           
            </div><!-- /.box -->
        </div><!-- /.col (MAIN) -->
    </div>
    <!-- MAILBOX END -->
</section><!-- /.content -->