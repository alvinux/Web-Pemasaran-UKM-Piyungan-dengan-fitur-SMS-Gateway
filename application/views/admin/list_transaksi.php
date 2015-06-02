<section class="content">
   <!-- List Penjual BEGIN -->
   <div class="mailbox row">
      <div class="col-xs-12">
         <div class="box box-solid">
            <div class="box-body">
               <div class="row">
                  <div class="col-md-3 col-sm-4">
                     <!-- BOXES are complex enough to move the .box-header around.
                     This is an example of having the box header within the box body -->
                     <div class="box-header">
                        <i class="fa fa-inbox"></i>
                        <h3 class="box-title">List Transaksi</h3>
                     </div>
                     <!-- compose message btn -->
                     <!-- <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> Compose Message</a> -->
                     <!-- Navigation - folders-->
                     <div style="margin-top: 15px;">
                        <ul class="nav nav-pills nav-stacked">
                           <li class="header">Tampilkan</li>
                           <li id="all"><a href="<?php echo site_url('admin/list_transaksi');?>"><i class="fa fa-inbox"></i> Terbaru</a></li>
                           <li><a href="#"><i class="fa fa-pencil-square-o"></i> Konfirmasi Pembayaran</a></li>
                           <li id="pending"><a href="<?php echo site_url('admin/list_transaksi/Pending');?>"><i class="fa fa-mail-forward"></i> Pending</a></li>
                           <li id="lunas"><a href="<?php echo site_url('admin/list_transaksi/Lunas');?>"><i class="fa fa-star"></i>  Lunas</a></li>
                           <li id="batal"><a href="<?php echo site_url('admin/list_transaksi/Batal');?>"><i class="fa fa-folder"></i> Batal</a></li>
                        </ul>
                     </div>
                  </div><!-- /.col (LEFT) -->
                  <div class="col-md-9 col-sm-8">
                     <div class="row pad">
                        <div class="col-sm-6">
                           <label style="margin-right: 10px;">
                              <input type="checkbox" id="check-all"/>
                           </label>
                           <!-- Action button -->
                           <div class="btn-group">
                              <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
                                 Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                 <li><a href="#">Mark as read</a></li>
                                 <li><a href="#">Mark as unread</a></li>
                                 <li class="divider"></li>
                                 <li><a href="#">Move to junk</a></li>
                                 <li class="divider"></li>
                                 <li><a href="#">Delete</a></li>
                              </ul>
                           </div>

                        </div>
                        <div class="col-sm-6 search-form">
                           <form action="" class="text-right">
                              <div class="input-group">
                                 <input name="q" type="text" class="form-control input-sm" placeholder="Masukan kode invoice" value="<?php echo $keyword;?>">
                                 <div class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div><!-- /.row -->

                     <div class="table-responsive">
                        <!-- THE MESSAGES -->
                        <h4>Total Transaksi : <?php echo $total;?></h4>
                        <table class="table table-mailbox">
                           <?php
                           foreach($view as $v):
                              if($v['status'] == 'Pending'){$class="unread";}else{$class="";}//status class
                              // print_r($v);
                              ?>
                              <tr onclick="detailTransaksi('<?php echo $v['kode_transaksi'];?>')" class="<?php echo $class;?>">
                                 <td class="small-col"><input type="checkbox" /></td>
                                 <td class="small-col"><i class="fa fa-star"></i></td>
                                 <td><a target="_blank" href="<?php echo site_url('home/detailtransaksi/'.$v['kode_transaksi']);?>"><?php echo $v['kode_transaksi'];?></a></td>
                                 <td><a href="#"><?php echo $v['nama'];?></a></td>
                                 <td><a href="#"><?php echo number_format($v['total_biaya']);?></a></td>
                                 <td><a href="#"> <?php echo $v['status'];?></a></td>
                                 <td class="time"><?php echo date('d-m-Y H:i:s',strtotime($v['tgl_transaksi']));?></td>
                              </tr>
                           <?php endforeach;?>
                        </table>
                     </div><!-- /.table-responsive -->
                  </div><!-- /.col (RIGHT) -->
               </div><!-- /.row -->
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
               <div class="pull-right">
                  <small><?php if(!empty($this->pagination->create_links()))echo $this->pagination->create_links();?></small>
                  <!-- <button class="btn btn-xs btn-primary"><i class="fa fa-caret-left"></i></button>
                  <button class="btn btn-xs btn-primary"><i class="fa fa-caret-right"></i></button> -->
               </div>
            </div><!-- box-footer -->
         </div><!-- /.box -->
      </div><!-- /.col (MAIN) -->
   </div>
   <!-- LIst Penjual -->

</section><!-- /.content -->
<script>
$('#detail-transaksi').bind('hidden.bs.modal', function () {
   $("html").css("margin-right", "0px");
});

</script>
<script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>doc/themes/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
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
//get detail transaksi
function detailTransaksi(koderef)
{
   $('#kodeinvoice').html(koderef);
   $('#modalcontent').html('<center>loading...</center>');
   $('#transaksi-modal').modal('show');
   $.ajax({
      url:'<?php echo site_url("admin/detailTransaksi");?>',
      data:{'noref':koderef},
      type:'GET',
      success:function(response){
         $('#modalcontent').html(response);
      },
      error:function(){
         alert('sedang terjadi masalah, silahkan ulangi lagi');
      }
   });
}
//ubah status transaksi
function ubahStatusTransaksi(koderef)
{
   var status = $('#statusTransaksi').val();
   $.ajax({
      url:'<?php echo site_url("admin/ubahTransaksi");?>',
      data:{'noref':koderef,status:status},
      type:'GET',
      success:function(response){
         alert('status telah berubah');
         detailTransaksi(koderef);
          window.location="<?php echo base_url('admin/list_transaksi'); ?>";

      },
      error:function(){
         alert('sedang terjadi masalah, silahkan ulangi lagi');
      }
   });
}
</script>
