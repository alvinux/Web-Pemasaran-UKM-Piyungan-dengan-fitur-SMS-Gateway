<section id="Content_katagori">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="center gap">
                    <h2>What we do</h2>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                </div>
            </div>
        </div>
        <div class="row">


            <?php if (!empty($daftar_item)) { ?>
              <?php 
                   $data['datalist'] = $daftar_item;
                   $this->load->view('general/thumbnail_produk', $data);
                   ?>
        
        <?php } else { ?>
                 <h2>Produk Kosong..</h2>
        <?php } ?>



        </div><!--/.row-->

        <hr>
        <div class="gap"></div>
        <!-------------Pagination------------------>
        <div class="row">
            <div class="col-md-12">
                <ul class="pagination pull-right">
                    <li class="active"><a href="#">PREV</a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li class="disabled"><a href="#">5</a></li>
                    <li class="active"><a href="#">NEXT</a></li>
                </ul>
            </div>
        </div><!--/.row--> <!-------------/Pagination------------------>
        <!--  <div class="row">
             <div class="col-lg-12">
                 <div class="gap"></div>
                 <div class="row">

                 </div>
             </div>
         </div> -->
    </div>
</section>






