<section id="recent-works">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3>Produk Terlaris</h3>
                    <p>Berikut ini adalah produk UKM yang paling banyak terjual melalui website pemasaran UMKM Piyungan.</p>
                    <div class="btn-group">
                        <a class="btn btn-danger" href="#scroller" data-slide="prev"><i class="icon-angle-left"></i></a>
                        <a class="btn btn-danger" href="#scroller" data-slide="next"><i class="icon-angle-right"></i></a>
                    </div>
                    <p class="gap"></p>
                </div>
                <div class="col-md-9">
                    <div id="scroller" class="carousel slide">
                        <div class="carousel-inner">

                  <?php
                    $new = array();
                    $next = array();
                    $n=1;
                    foreach ($terlaris as $row):
                      if($n<=4):
                          array_push($new, $row);
                      endif;
                      if($n>4):
                          array_push($next, $row);
                      endif;
                      $n++;
                    endforeach;?>

                   <!--------Item Active---->

                  

                            <!--------Item Active---->
                            <div class="item active">
                              <div class="row">
                                <!--1-1-->
                               <?php 
                               $data['datalist'] = $new;
                        // print_r($hotlist);
                               $this->load->view('general/thumbnail_produk', $data);
                               ?>
                               <!---------------1-------------->
                              </div><!--/.row-->  
                            </div><!--/.item-->
                  

                            <!--------Item Active---->
                            <div class="item ">
                              <div class="row">
                                <!--1-1-->
                               <!--thumbnail group-->
                                 <?php 
                                    $data['datalist'] = $next;
                                    $this->load->view('general/thumbnail_produk', $data);
                                  ?>
                                
                              </div><!--/.row-->  
                            </div><!--/.item-->
                            
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
        </div>
    </section><!--/#recent-works-->























