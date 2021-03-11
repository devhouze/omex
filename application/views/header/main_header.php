<header class="header">
    <div class="header-top primary-bg d-md-block d-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="text-white fw5 d-flex"><img src="<?php echo BASE_URL(); ?>assets/images/public/header/clock.svg" alt="Time" class="me-1"> Mall Timing (Retail) : 11 am - 9 pm Restaurants: 11 am - 11 pm</div>
                </div>
                <div class="col-md-5">
                    <div class="text-white fw5">
                        <img src="<?php echo BASE_URL(); ?>assets/images/public/header/call.svg" alt=""> <a href="" class="text-white me-1">+91-9015222222</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-white fw5 ms-auto d-table">
                        <img src="<?php echo BASE_URL(); ?>assets/images/public/header/map.svg" alt="Map"><a href="https://www.google.com/maps/place/Omaxe+World+Street/@28.387209,77.352895,14z/data=!4m5!3m4!1s0x0:0x5ba6ea082ef6bf15!8m2!3d28.3872085!4d77.3528947?hl=en" target="_blank" class="text-white ms-2">Getting Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu py-14">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="<?php echo BASE_URL(); ?>assets/images/public/header/menu.svg" alt="Map">
                </button>
                <a class="navbar-brand p-0 m-0" href="<?php echo BASE_URL(); ?>"><img src="<?php echo BASE_URL(); ?>assets/images/public/header/logo.svg" alt="Map"></a>
                <a class=" ms-3 d-md-none d-block me-3" href="<?php echo BASE_URL(); ?>"><img src="<?php echo BASE_URL(); ?>assets/images/public/header/call-btn.svg" alt="Map"></a>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo BASE_URL(); ?>">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Street
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?php echo BASE_URL('london'); ?>">London Street</a></li>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL('paris'); ?>">Paris Street</a></li>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL('athens'); ?>">Athens Street</a></li>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL('portugal'); ?>">Portugal Street</a></li>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL('amsterdam'); ?>">Amsterdam Street</a></li>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL('san-francisco'); ?>">San Francisco Street</a></li>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL('hong-kong'); ?>">Hong Kong Street</a></li>
                                
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL('brand-directory'); ?>">Brands</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL('event'); ?>">Events</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL('contact-us'); ?>">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>