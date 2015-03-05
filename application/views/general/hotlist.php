 <section id="testimonial" class="alizarin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center">
                        <h2>Produk UKM Terbaru</h2>
                        <p>Berikut ini beberapa produk terbaru yang di unggah oleh ukm pnpm mandiri piyungan.</p>
                    </div>
                    <div class="gap"></div>
                    <div class="row black">

                    	<?php 
                        $data['datalist'] = $hotlist;
                         // print_r($datalist);
                            $this->load->view('general/thumbnail_produk',$data);
                            ?>
                    	<!---------------1-------------->
                    
					
                        
         
						
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#testimonial-->