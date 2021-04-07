<?php $url=$this->uri->rsegment_array();  ?>
<header class="header">
    <div class="header-top primary-bg d-md-block d-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="text-white fw5 d-flex"><img src="<?php echo base_url(); ?>assets/images/public/header/clock.svg" alt="Time" class="me-1"> Mall Timing (Retail) : 11 am - 9 pm Restaurants: 11 am - 11 pm</div>
                </div>
                <div class="col-md-5">
                    <div class="text-white fw5">
                        <img src="<?php echo base_url(); ?>assets/images/public/header/call.svg" alt=""> <a href="tel:+91-9015222222" class="text-white me-1">+91-9015222222</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-white fw5 ms-auto d-table">
                        <img src="<?php echo base_url(); ?>assets/images/public/header/map.svg" alt="Map"><a href="https://www.google.com/maps/place/Omaxe+World+Street/@28.387209,77.352895,14z/data=!4m5!3m4!1s0x0:0x5ba6ea082ef6bf15!8m2!3d28.3872085!4d77.3528947?hl=en" target="_blank" class="text-white ms-2">Getting Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu py-14">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="<?php echo base_url(); ?>assets/images/public/header/menu.svg" alt="Map">
                </button>
                <a class="navbar-brand p-0 m-0" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/public/header/logo.png" alt="Map"></a>
                <a class=" ms-3 d-md-none d-block me-3" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/public/header/call-btn.svg" alt="Map"></a>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        
                        <li class="nav-item">
                            <a class="nav-link <?php echo  $url[2]=='index'?'active':''; ?>" href="<?php echo base_url(); ?>" >Home</a>
                        </li>
                         <?php if(count($whats_new_link)>0){ ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo $url[2]=='whatsnew'?'active':''; ?>" href="#" id="whats_new_dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                What's New
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="whats_new_dropdown">
                            <?php if(!empty($whats_new_link)){ foreach($whats_new_link as $link){ ?>
                            <li><a href="<?php echo base_url('whatsnew/'.$link['name_slug'])?>" class="dropdown-item"><?php echo $link['name'];?></a></li>
                            <?php } } ?>
                                
                            </ul>
                        </li>
                    <?php } ?>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo $url[2]=='london' || $url[2]=='paris' || $url[2]=='athens' || $url[2]=='portugal' || $url[2]=='amsterdam' || $url[2]=='san_francisco' || $url[2]=='hong_kong'?'active':''; ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Street
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?php echo base_url('london'); ?>" >London Street</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('paris'); ?>">Paris Street</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('athens'); ?>">Athens Street</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('portugal'); ?>">Portugal Street</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('amsterdam'); ?>">Amsterdam Street</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('san-francisco'); ?>">San Francisco Street</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('hong-kong'); ?>">Hong Kong Street</a></li>
                                
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $url[2]=='brand-directory' || $url[2]=='brand_directory' || $url[2]=='brand'?'active':''; ?>" href="<?php echo base_url('brand-directory'); ?>">Brands</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $url[2]=='event' || $url[2]=='event' || $url[2]=='event_details'?'active':''; ?>" href="<?php echo base_url('event'); ?>">Events</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link <?php echo $url[2]=='contact-us' || $url[2]=='contact_us'?'active':''; ?>" href="<?php echo base_url('contact-us'); ?>">Contact Us</a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>