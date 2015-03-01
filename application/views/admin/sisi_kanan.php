 <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                <?php if ($this->uri->segment(2)==='sms') {
                         $this->load->view('admin/sms');
                         $this->load->view('admin/modal/modal_kirim_sms');
                    } else if ($this->uri->segment(2)==='list_penjual') {
                        $this->load->view('admin/list_penjual');
                        $this->load->view('admin/modal/modal_tambah_penjual');
                    }  else if ($this->uri->segment(2)==='list_transaksi') {
                        $this->load->view('admin/list_transaksi');
                         $this->load->view('admin/modal/modal_detail_transaksi');
                    }  else if ($this->uri->segment(2)==='pengaturan_bank') {
                        $this->load->view('admin/peng_bank');
                         $this->load->view('admin/modal/modal_tambah_bank');
                    } else if ($this->uri->segment(2)==='pengaturan_admin' || $this->uri->segment(2)==='biodata_admin') {
                        $this->load->view('admin/peng_admin');
                        $this->load->view('admin/modal/modal_ganti_password');
                    } else if ($this->uri->segment(2)==='format_sms') {
                        $this->load->view('admin/peng_format_sms');
                    }  else if ($this->uri->segment(2)==='content_page') {
                        $this->load->view('admin/peng_contentpage');
                        $this->load->view('admin/modal/modal_new_berita');
                    } else if ($this->uri->segment(2)==='testimonial') {
                        $this->load->view('admin/testimonial');
 
                    } else {
                        $this->load->view('admin/dashboard');
                    }
                 ?>
               <?php ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->