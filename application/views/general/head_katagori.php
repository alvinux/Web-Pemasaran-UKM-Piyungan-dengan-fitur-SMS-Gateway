<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php if (!empty($this->uri->segment(4))) { ?>
                     <h1><?php echo (str_replace('_', ' ', $this->uri->segment(3))) ; ?> / <?php echo (str_replace('_', ' ', $this->uri->segment(4))) ; ?></h1>
                <?php } else if (!empty($this->uri->segment(3))){ ?>
                    <h1><?php echo (str_replace('_', ' ', $this->uri->segment(3))) ; ?></h1>
                <?php } else {  ?>
                    <h1><?php echo (str_replace('_', ' ', (ucwords($this->uri->segment(2))))) ; ?></h1>
                <?php   }  ?>
                
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Katagori</li>
                </ul>
            </div>
        </div>
    </div>
</section>