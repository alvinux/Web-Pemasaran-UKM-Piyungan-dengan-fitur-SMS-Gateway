 <section class="content">
 	<!-- List Penjual BEGIN -->
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
                            	<h3 class="box-title">List Penjual</h3>
                            </div>
                            <!-- compose message btn -->
                            <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#tambahpenjual-modal"><i class="fa fa-pencil"></i> Tambah Penjual</a>
                            <!-- Navigation - folders-->
                            <div style="margin-top: 15px;">
                            	<ul class="nav nav-pills nav-stacked">
                            		<!-- <li class="header">Urutkan Berdasarkan</li>
                            		<li class="active"><a href="#"><i class="fa fa-inbox"></i> Nama</a></li>
                            		<li><a href="#"><i class="fa fa-pencil-square-o"></i> Tangal</a></li>
                            		<li><a href="#"><i class="fa fa-mail-forward"></i> Aktifitas</a></li>
                            		<li><a href="#"><i class="fa fa-star"></i> Jumlah Produk</a></li>
                            		<li><a href="#"><i class="fa fa-folder"></i> Testimonial</a></li> -->
                            	</ul>
                            </div>
                        </div><!-- /.col (LEFT) -->
                        <div class="col-md-10 col-sm-9">
                        	<div class="row pad">
                        		<!-- <div class="col-sm-6">
                        			<label style="margin-right: 10px;">
                        				<input type="checkbox" id="check-all"/>
                        			</label> -->
                        			<!-- Action button -->
                        			<!-- <div class="btn-group">
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
 -->
                        		<!-- </div> -->
                        		
                        	</div><!-- /.row -->

                        	<div class="box-body table-responsive">
                        		<!-- THE MESSAGES -->
                        		<table id="example1" class="table table-bordered table-striped">
                                    <thead>
                            			<tr class="unread" style="color:#3c8dbc;">
                            				<!-- <th class="small-col"><input type="checkbox" /></th> -->
                            				<th >Nama Toko</th>
                            				<th >Nama Penjual</th>
                            				<th >Jumlah Produk</th>
                            				<th >HP</th>
                                            <th class="time">Tgl Daftar</th>
                            				<th >Action</th>
                            			</tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($all_penjual as $penjual ) { //print_r($penjual) ?>
                            			<tr class="">
                            				<!-- <td class="small-col"><input type="checkbox" /></td> -->
                            				<td ><?php echo $penjual['username_user'];?></td>
                            				<td ><a href="#detailPenjual" onclick="penjual('<?php echo $penjual['id_user'];?>')"><?php echo $penjual['nama'];?></a></td>
                            				<td ><?php echo count($this->m_produk->show_all_product_by_seller($penjual['id_user']));?></td>
                            				<td ><a href="#"><?php echo $penjual['telpon'];?></a></td>
                                            <td class="time"><?php echo $penjual['tgl_daftar'];?></td>
                            				<td ><button onclick="editPenjual('<?php echo $penjual['id_user'];?>')" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Detail dan Edit Profile Penjual"><i class="fa fa-pencil-square"></i> Detail / Edit</button>
                                                <!-- <button href="#detailPenjual" onclick="penjual('<?php echo $penjual['id_user'];?>')" class="btn btn-xs btn-success" data-toggle="tooltip" title="Detail Profile Penjual"><i class="fa fa-pencil-square"></i> Detail</buton> -->
                                            </td>
                            			</tr>
                                    <?php }?>
                                    </tbody>	
                        		</table>
                        	</div><!-- /.table-responsive -->
                        </div><!-- /.col (RIGHT) -->
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
               <!--  <div class="box-footer clearfix">
                	<div class="pull-right">
                		<small>Showing 1-12/1,240</small>
                		<button class="btn btn-xs btn-primary"><i class="fa fa-caret-left"></i></button>
                		<button class="btn btn-xs btn-primary"><i class="fa fa-caret-right"></i></button>
                	</div>
                </div> --><!-- box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col (MAIN) -->
    </div>
    <!-- LIst Penjual -->

</section><!-- /.content -->



<!-- modal -->
<div class="modal fade" id="custommodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content panel panel-info">
        <div class="modal-header panel-heading">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title" id="customlabel"></h3>
        </div>
      <div id="custombody" class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end of modal -->


<!-- JavaScript modal  -->
<script type="text/javascript">
// function penjual(id)
// {
//     //show modal
//     $('#customlabel').html('Detail Penjual');
//     $('#custombody').html('<center>loading</center>');
//     $('#custommodal').modal('show')
//     //start ajax
//     $.ajax({
//         url:'<?php echo site_url("ajax/modal_detail_penjual")?>',
//         type:'POST',
//         data:{id:id},
//         success:function(response){
//             $('#custombody').html(response);
//         },
//         error:function(){
//             $('#custombody').html('<center>terjadi masalah</center>');
//         }
//     });
// }
</script>

<script type="text/javascript">
function editPenjual(id)
{
    //show modal
    // $('#customlabel').html('Edit Penjual');
    // $('#custombody').html('<center>loading</center>');
    // $('#custommodal').modal('show')
    //start ajax
    $.ajax({
        // url:'<?php echo site_url("ajax/modal_edit_penjual")?>',
        url:'<?php echo site_url("ajax/detail_penjual")?>',
        type:'POST',
        data:{id:id},
        success:function(response){
            window.open('<?php echo site_url("home/profile_user")?>');
        },
        error:function(){
            alert('Gagal membuka detail Penjual');
        }
    });
}
</script>
<!-- /JavaScript modal  -->
