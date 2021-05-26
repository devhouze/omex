<?php if (!empty($banner)) { ?>
    <div class="main-slider d-flex flex-fill gray-bg pb-60">
        <div class="container-fluid d-flex flex-fill">
            <div class="row d-lg-flex d-none flex-fill">
                <div class="col-md-12 d-flex flex-fill px-0">
                    <div id="carouselExampleIndicatorss" class="carousel slide d-flex flex-fill" data-bs-ride="carousel">
                        <ol class="carousel-indicators d-none">
                            <?php $count = count($banner);
                            if ($count > 1) {
                                for ($i = 0; $i < $count; $i++) { ?>
                                    <li data-bs-target="#carouselExampleIndicatorss" data-bs-slide-to="<?php echo $i; ?>" <?php if ($i == 0) { ?>class="active" <?php } ?>></li>
                            <?php }
                            } ?>
                        </ol>


                        <div class="carousel-inner">

                            <?php if (!empty($banner)) {
                                $i = 1;
                                foreach ($banner as $value) {
                                    // echo base_url('assets/images/public/home/' . $value['banner_web']);
                                    if (is_file("assets/images/public/home/" . $value['banner_web'])) { ?>
                                        <div class="carousel-item <?= ($i == 1) ? 'active' : '';
                                                                    $i++; ?>" style="background-image: url('<?php echo base_url('assets/images/public/home/' . $value['banner_web']); ?>');">
                                            <?php if ($value['banner_link'] == 1) { ?>
                                                <a href="<?php echo base_url('event-details/' . $value['link_to']) ?>" target="_blank" class="banner-link"></a>
                                            <?php } elseif ($value['banner_link'] == 2) { ?>
                                                <a href="<?php echo base_url('brand/' . $value['link_to']) ?>" target="_blank" class="banner-link"></a>
                                            <?php } elseif ($value['banner_link'] == 3) { ?>
                                                <a href="<?php echo base_url('brand/' . $value['link_to']) ?>" target="_blank" class="banner-link"></a>
                                            <?php } elseif ($value['banner_link'] == 4) { ?>
                                                <a href="<?php echo base_url($value['link_to']) ?>" target="_blank" class="banner-link"></a>
                                            <?php } elseif ($value['banner_link'] == 5) { ?>
                                                <a href="<?php echo base_url('contact-us') ?>" target="_blank" class="banner-link"></a>
                                            <?php } ?>
                                        </div>
                            <?php }
                                }
                            } ?>

                        </div>
                        
                        <div class="home-baner-btn">
                            <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicatorss" data-bs-slide="prev">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/left.svg" alt="" class="w-100">
                        </a>
                            <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicatorss" data-bs-slide="next">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/right.svg" alt="" class="w-100">
                        </a>
                        </div>
                        
                    </div>


                </div>
            </div>
            <div class="row d-lg-none d-flex flex-fill">
                <div class="col-md-12 d-flex flex-fill px-0">
                    <div id="carouselExampleIndicatorssmob" class="carousel slide d-flex flex-fill" data-bs-ride="carousel">
                        <ol class="carousel-indicators d-none">
                            <?php $count = count($banner);
                            if ($count > 1) {
                                for ($i = 0; $i < $count; $i++) { ?>
                                    <li data-bs-target="#carouselExampleIndicatorssmob" data-bs-slide-to="<?php echo $i; ?>" <?php if ($i == 1) { ?>class="active" <?php } ?>></li>
                            <?php }
                            } ?>
                        </ol>
                        <div class="carousel-inner">

                            <?php if (!empty($banner)) {
                                $i = 1;
                                foreach ($banner as $value) {
                                    if (is_file("assets/images/public/home/" . $value['banner_mobile'])) {
                            ?>
                                        <div class="carousel-item <?= ($i == 1) ? 'active' : '';
                                                                    $i++; ?>">
                                            <img src="<?php echo base_url('assets/images/public/home/' . $value['banner_mobile']); ?>" alt="<?= $value['comment']; ?>" class="d-table mx-auto w-100">
                                            <a href="<?php echo (!empty($value['banner_link'])) ? $value['banner_link'] : base_url(); ?>" target="_blank" class="banner-link"></a>
                                        </div>
                            <?php }
                                }
                            } ?>

                        </div>
                        
                        <div class="home-baner-btn">
                            <a class="carousel-control-prev" type="button" data-bs-target="carouselExampleIndicatorssmob" data-bs-slide="prev">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/left.svg" alt="" class="w-100">
                        </a>
                            <a class="carousel-control-next" type="button" data-bs-target="carouselExampleIndicatorssmob" data-bs-slide="next">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/right.svg" alt="" class="w-100">
                        </a>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php } ?>
<?php if (!empty($brand_logo)) { ?>
    <div class="top-brands gray-bg py-30 pt-60">

        <div class="container">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">Top Brands</h5>
                    <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="d-table mx-auto wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="0.5S">
                    <div class="v-line d-table mx-auto wow zoomIn animated" data-wow-duration="1s" data-wow-delay="1s"></div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center " data-wow-duration="1s" data-wow-delay="0.15s">
                <div class="col-md-10 mt-20">
                    <div class="owl-carousel owl-theme top-brand">
                        <?php foreach ($brand_logo as $logo) {
                            if (is_file("assets/images/public/brand/" . $logo['brand_logo'])) {
                        ?>
                                <div class="item">
                                    <a href="<?php echo base_url('brand/' . $logo['brand_slug']); ?>"></a>
                                    <img src="<?php echo base_url('assets/images/public/brand/' . $logo['brand_logo']); ?>" alt="<?= $logo['banner_comment']; ?>" class="d-table mx-auto">
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
            <div class="row mt-md-5 mt-3">
                <div class="col-md-12">
                    <a href="<?php echo base_url('brand-directory'); ?>" class="d-table mx-auto primary-btn">View All Brands</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="experience gray-bg py-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 positoin-relative">
                <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">Experience Best of World Street</h5>
                <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="d-table mx-auto wow fadeInDown  animated" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="v-line d-table mx-auto wow zoomIn animated" data-wow-duration="1s" data-wow-delay="0.15s"></div>
            </div>
        </div>
        <div class="row mt-4 d-md-block d-none wow animated fadeInUp" data-wow-duration="2s" data-wow-delay="2s">
            <div class="col-md-12 px-0">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="background-image:url(<?php echo base_url(); ?>assets/images/public/home/slider1.jpg);">

                            <div class="card lon-bg ">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/l-s.svg" alt="">
                                <p>Did you know? London, a global icon, is built on ruins! Want to have a taste of the London aura? Come and visit World Street, Faridabad. </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/l-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="background-image:url('<?php echo base_url(); ?>assets/images/public/home/slider.jpg');">

                            <div class="card par-bg ">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/parish.svg" alt="">
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/pa-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="background-image:url('<?php echo base_url(); ?>assets/images/public/home/slider3.jpg')">

                            <div class="card por-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/p-s.svg" alt="">
                                <p>Portugal is famous for its unique style of music. Why not come to its streets and enjoy a musical evening?</p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/p-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="background-image:url('<?php echo base_url(); ?>assets/images/public/home/slider4.jpg')">

                            <div class="card ath-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/at-s.svg" alt="">
                                <p>Wander by foot into the heart of the Athens. Start discovering your own world within ours!</p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/at-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="background-image:url('<?php echo base_url(); ?>assets/images/public/home/slider5.jpg')">

                            <div class="card ams-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/am-s.svg" alt="">
                                <p>The small city of Amsterdam has more canals than Venice and more bridges than Paris.</p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/am-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="background-image:url('<?php echo base_url(); ?>assets/images/public/home/slider6.jpg')">

                            <div class="card san-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/s-s.svg" alt="">
                                <p>An energizing fact about this American city. There are over three hundred coffee houses within the city boundaries of San Francisco.</p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/s-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="background-image:url('<?php echo base_url(); ?>assets/images/public/home/slider7.jpg')">

                            <div class="card hon-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/h-s.svg" alt="">
                                <p>Hong Kong has one of the highest numbers of restaurants or cafes per capita. So why not have a taste of it in New Faridabad?</p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/h-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>


                    </div>
                    <ol class="carousel-indicators position-relative px-0 mx-0">
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/Indicators1.svg" class="d-block w-100" alt="...">
                            <label class="pr-font">LONDON ST.</label>

                        </li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/Indicators2.svg" class="d-block w-100" alt="...">
                            <label class="pr-font">PARIS ST.</label>
                        </li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/Indicators3.svg" class="d-block w-100" alt="...">
                            <label class="pr-font">PORTUGAL ST.</label>
                        </li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/Indicators4.svg" class="d-block w-100" alt="...">
                            <label class="pr-font">ATHENS ST.</label>
                        </li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/Indicators5.svg" class="d-block w-100" alt="...">
                            <label class="pr-font">AMSTERDAM ST.</label>
                        </li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/Indicators6.svg" class="d-block w-100" alt="...">
                            <label class="pr-font">SAN FRANCISCO ST.</label>
                        </li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/Indicators7.svg" class="d-block w-100" alt="...">
                            <label class="pr-font">HONG KONG ST.</label>
                        </li>
                    </ol>

                </div>
            </div>

        </div>
        <div class="row mt-4 d-md-none d-block wow fadeInUp animated">
            <div class="col-md-12 px-0">
                <div id="carouselExampleIndicatorsss" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/london-m.jpg" class="d-block w-100" alt="...">
                            <div class="card lon-bg wow fadeInRight animated">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/l-s.svg" alt="">
                                <p>Did you know? London, a global icon, is built on ruins! Want to have a taste of the London aura? Come and visit World Street, Faridabad. </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/l-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/paris-m.jpg" class="d-block w-100" alt="...">
                            <div class="card par-bg ">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/parish.svg" alt="">
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/pa-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/port-m.jpg" class="d-block w-100" alt="...">
                            <div class="card por-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/p-s.svg" alt="">
                                <p>Portugal is famous for its unique style of music. Why not come to its streets and enjoy a musical evening?</p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/p-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/aths-m.jpg" class="d-block w-100" alt="...">
                            <div class="card ath-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/at-s.svg" alt="">
                                <p>Wander by foot into the heart of the Athens. Start discovering your own world within ours!</p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/at-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/amst-m.jpg" class="d-block w-100" alt="...">
                            <div class="card ams-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/am-s.svg" alt="">
                                <p>The small city of Amsterdam has more canals than Venice and more bridges than Paris. </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/am-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/san-m.jpg" class="d-block w-100" alt="...">
                            <div class="card san-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/s-s.svg" alt="">
                                <p>An energizing fact about this American city. There are over three hundred coffee houses within the city boundaries of San Francisco.</p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/s-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/hon-m.jpg" class="d-block w-100" alt="...">
                            <div class="card hon-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/h-s.svg" alt="">
                                <p>Hong Kong has one of the highest numbers of restaurants or cafes per capita. So why not have a taste of it in New Faridabad?
                                </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/h-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>


                    </div>
                    <div class="arow-btns">
                        <a class="carousel-control-prev" href="#carouselExampleIndicatorsss" role="button" data-bs-slide="prev">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/left.svg" alt="" class="w-100">
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicatorsss" role="button" data-bs-slide="next">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/right.svg" alt="" class="w-100">
                        </a>
                    </div>

                    <ol class="carousel-indicators position-relative px-0 mx-0">
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/Indicators1.svg" class="d-block w-100" alt="...">
                            <label class="pr-font">LONDON ST.</label>

                        </li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/Indicators2.svg" class="d-block w-100" alt="...">
                            <label class="pr-font">PARIS ST.</label>
                        </li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/Indicators3.svg" class="d-block w-100" alt="...">
                            <label class="pr-font">PORTUGAL ST.</label>
                        </li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/Indicators4.svg" class="d-block w-100" alt="...">
                            <label class="pr-font">ATHENS ST.</label>
                        </li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/Indicators5.svg" class="d-block w-100" alt="...">
                            <label class="pr-font">AMSTERDAM ST.</label>
                        </li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/Indicators6.svg" class="d-block w-100" alt="...">
                            <label class="pr-font">SAN FRANCISCO ST.</label>
                        </li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/Indicators7.svg" class="d-block w-100" alt="...">
                            <label class="pr-font">Hong Kong St.</label>
                        </li>
                    </ol>


                </div>
            </div>

        </div>
    </div>
</div>
<div class="explore-more gray-bg py-30">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12 positoin-relative">
                <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">Explore More</h5>
                <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="get-src d-table mx-auto wow fadeInDown  animated" data-wow-duration="1s" data-wow-delay="1.5s">
                <div class="v-line d-table mx-auto wow zoomIn animated" data-wow-duration="1s" data-wow-delay="1s"></div>
            </div>
        </div>
        <div class="row px-md-5 px-3 mt-md-0 mt-5">
            <div class="col-md-4">
                <h2 class="fz40 fz24-sm d-table mx-auto pr-font h-color mb-0 wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="0.5s">Eat</h2>
                <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="get-src d-table mx-auto wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="1s">
                <figure class="position-relative mb-0 mt-12">
                    <img src="<?php echo base_url(); ?>assets/images/public/home/e1.jpg" alt="" class=" wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.2s">
                    <div class="outer"></div>
                </figure>
                <a href="<?php echo base_url('brand-directory/eat') ?>" class="exploer-btn" >EXPLORE <img src="<?php echo base_url(); ?>assets/images/public/home/ex-arow.svg" alt=""></a>

            </div>
            <div class="col-md-4">
                <h2 class="fz40 fz24-sm d-table mx-auto pr-font h-color mb-0 wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="0.5s">Style</h2>
                <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="get-src d-table mx-auto wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="1s">
                <figure class="position-relative mb-0 mt-12">
                    <img src="<?php echo base_url(); ?>assets/images/public/home/e3.jpg" alt="" class=" wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.2s">
                    <div class="outer"></div>


                </figure>
                <a href="<?php echo base_url('brand-directory/style') ?>" class="exploer-btn" data-type="style">EXPLORE <img src="<?php echo base_url(); ?>assets/images/public/home/ex-arow.svg" alt=""></a>

            </div>
            <div class="col-md-4">
                <h2 class="fz40 fz24-sm d-table mx-auto pr-font h-color mb-0 wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="0.5s">Play</h2>
                <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="get-src d-table mx-auto wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="1s">
                <figure class="position-relative mb-0 mt-12">
                    <img src="<?php echo base_url(); ?>assets/images/public/home/e2.jpg" alt="" class=" wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.2s">
                    <div class="outer"></div>
                </figure>
                <!-- <a href="" class="exploer-btn" data-type="play" data-bs-toggle="modal" data-bs-target="#playModal">EXPLORE <img src="<?php echo base_url(); ?>assets/images/public/home/ex-arow.svg" alt=""></a> -->

                <a href="<?php echo base_url('brand-directory/play') ?>" class="exploer-btn" data-type="play">EXPLORE <img src="<?php echo base_url(); ?>assets/images/public/home/ex-arow.svg" alt=""></a>

            </div>
        </div>
    </div>
</div>
<?php if (!empty($events)) { ?>
    <div class="looking-out gray-bg py-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">Look out for what’s coming up!</h5>
                    <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="d-table mx-auto wow fadeInDown  animated" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="v-line d-table mx-auto wow animated zoomIn" data-wow-duration="1s" data-wow-delay="0.15s"> </div>
                </div>
            </div>
            <div class="row mt-4 justify-content-center">
                <div class="col-xxl-10">
                    <div id="carouselExampleControls" class="carousel slide wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.5s" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php $i = 1;
                            $event_count = 0;
                            foreach ($events as $event) {
                                if ($date['date_available'] == 0) {
                                    if (!empty($event['end_date']) && $event['end_date'] != '0000-00-00') {
                                        if (date('Y-m-d', strtotime($event['end_date'])) < date('Y-m-d')) {
                                            $expired = 1; //event is expred
                                        } else {
                                            $event_count += 1;
                                            $expired = 0; //event not expred
                                        }
                                    } elseif ($event['start_date'] > date('Y-m-d')) {
                                        $expired = 1; //event is expred
                                    } else {
                                        $event_count += 1;
                                        $expired = 0; //event not expred
                                    }
                                } else {
                                    $event_count += 1;
                                    $expired = 0; //event not expred 
                                }
                                $street = explode(',', $event['event_street']);
                                $count = count($street);
                                // if($count)
                                $class = ($count > 1) ? 'athens_street' : strtolower(str_replace(' ', '_', $event['event_street']));
                                if ($expired == 0) {
                            ?>
                                    <div class="carousel-item <?php echo $class;
                                                                if ($i == 1) {
                                                                    echo " active";
                                                                } ?>">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="d-lg-none d-block mobile-look">
                                                    <h1 class="h-font pr-font fz36 pr-18 text-center mt-18 h-color fz24-sm pr-sm0 mb-md-0 mb-4"><?php echo $event['event_name']; ?></h1>
                                                </div>
                                                <figure><img src="<?php echo base_url('assets/images/public/home/' . $event['thumbnail_image']); ?>" alt="<?php echo $event['thumbnail_message'] ?>" class=""></figure>

                                            </div>
                                            <div class="col-lg-4">
                                                <div class="pl-12">
                                                    <div class="d-lg-block d-none">
                                                        <h1 class="h-font pr-font fz36 pr-18 text-center mt-18 h-color fz24-sm"><?php echo $event['event_name']; ?></h1>
                                                    </div>
                                                    <div class="box-calander">
                                                        <div class="top-row">
                                                            <?php if ($event['date_available'] == 0) { ?>
                                                                <div class="left-col"><span><?php echo date('Y', strtotime($event['start_date'])); ?></span></div>
                                                                <div class="right-col">
                                                                    <h2 class="position-relative"><?php echo date('d', strtotime($event['start_date'])); ?>
                                                                        <span><?php echo date('M', strtotime($event['start_date'])); ?></span>
                                                                        <?php if (!empty($event['end_date']) && $event['end_date'] != '0000-00-00') { ?>
                                                                            - <?php echo date('d', strtotime($event['end_date'])); ?> <span>
                                                                                <?php echo date('M', strtotime($event['end_date'])); ?></span>
                                                                        <?php } ?>
                                                                    </h2>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="left-col"><span><?php echo date('Y'); ?></span></div>
                                                                <div class="right-col">
                                                                    <h2 class="position-relative">Coming Soon!</span></h2>
                                                                </div>
                                                            <?php } ?>
                                                        </div>


                                                    </div>
                                                    <?php if ($event['date_available'] == 0) { ?>
                                                        <div class="day text-center"><?php echo strtoupper(date('D', strtotime($event['start_date']))); ?>
                                                            <?php if (!empty($event['end_date']) && $event['end_date'] != '0000-00-00') { ?> -
                                                                <?php echo strtoupper(date('D', strtotime($event['end_date']))); ?></div>
                                                    <?php } ?>
                                                    <div class="time text-center"><?php
                                                                                    echo date('g a', strtotime($event['event_start_time'])) ?>
                                                        <?php if (!empty($event['event_end_time'])) { ?>-
                                                        <?php echo date('g a', strtotime($event['event_end_time'])); ?>
                                                    <?php } ?>
                                                    </div>
                                                <?php } ?>
                                                <img src="<?php echo base_url(); ?>assets/images/public/home/long-arrow.svg" alt="" class="mt-md-4 mt-3">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <a href="<?php echo base_url('event-details/' . $event['event_slug']) ?>" class="primary-btn d-inline-block mt-36">KNOW MORE</a>
                                            </div>
                                        </div>
                                    </div>
                            <?php $i++;
                                }
                            }
                            ?>
                        </div>
                        <?php if ($event_count > 1) { ?>
                            <div class="d-flex position-absolute">
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                                    <img src="<?php echo base_url(); ?>assets/images/public/home/left.svg" alt="" class="w-100">
                                </a>
                                <a class="carousel-control-next ml-40" href="#carouselExampleControls" role="button" data-bs-slide="next">
                                    <img src="<?php echo base_url(); ?>assets/images/public/home/right.svg" alt="" class="w-100">
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php } ?>
<div class="expreance-gallary py-30 gray-bg ">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12 positoin-relative">
                <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">Experience Gallery</h5>
                <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="d-table mx-auto wow fadeInDown  animated" data-wow-duration="1s" data-wow-delay="1.5s">
                <div class="v-line d-table mx-auto wow animated zoomIn"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-area">
                    <ul class="nav nav-tabs justify-content-between" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Interior</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Exterior</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="last-tab" data-bs-toggle="tab" href="#last" role="tab" aria-controls="last" aria-selected="false">Construction</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="video-tab" data-bs-toggle="tab" href="#video" role="tab" aria-controls="last" aria-selected="false">Video</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="owl-carousel sliderall wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.5s">
                                <?php if (!empty($all_gallery)) {
                                    $i = 1;
                                    foreach ($all_gallery as $gallery) {
                                        if (is_file('assets/images/public/home/' . $gallery['media_name'])) { ?>
                                            <div class="item all" data-one="<?php echo $i; ?>" >
                                                <img src="<?php echo base_url('assets/images/public/home/' . $gallery['media_name']); ?>" >
                                            </div>



                                        <?php } ?>

                                        <?php if ($gallery['media_type'] == 2) { ?>
                                            <div class="item">
                                                <video width="100%" height="350" controls>
                                                    <source src="<?php echo base_url('assets/images/public/home/' . $gallery['media_video']); ?>" type="video/mp4">
                                                </video>
                                            </div>
                                        <?php } ?>
                                        <?php if ($gallery['media_type'] == 3) { ?>
                                            <div class="item">
                                                <iframe src="https://www.youtube.com/embed/<?php $data = explode('=', $gallery['media_name']);
                                                                                            echo $data[1]; ?>" width="100%" height="350" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        <?php } ?>

                                <?php $i++;
                                    }
                                } ?>
                            </div>
                            <div class="slider-counter counter-all"></div>

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="owl-carousel sliders_in">
                                <?php if (!empty($interior_gallery)) {
                                    $i = 1;
                                    foreach ($interior_gallery as $interior) {
                                        if (is_file('assets/images/public/home/' . $interior['media_name'])) { ?>
                                            <div class="item interior" data-bs-toggle="modal" data-bs-target="#interior-image-modal" data-one="<?php echo $i; ?>a">
                                                <img src="<?php echo base_url('assets/images/public/home/' . $interior['media_name']); ?>" >
                                            </div>
                                <?php }
                                        $i++;
                                    }
                                } ?>
                            </div>
                            <div class="slider-counter counter_in"></div>

                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="owl-carousel slider_ext">
                                <?php if (!empty($exterior_gallery)) {
                                    $i = 1;
                                    foreach ($exterior_gallery as $exterior) {
                                        if (is_file('assets/images/public/home/' . $exterior['media_name'])) { ?>
                                            <div class="item exterior" data-bs-toggle="modal" data-bs-target="#exterior-image-modal" data-one="<?php echo $i; ?>b" >
                                                <img src="<?php echo base_url('assets/images/public/home/' . $exterior['media_name']); ?>" >
                                            </div>
                                <?php }
                                        $i++;
                                    }
                                } ?>
                            </div>
                            <div class="slider-counter counter_ext"></div>
                        </div>
                        <div class="tab-pane fade" id="last" role="tabpanel" aria-labelledby="last-tab">
                            <div class="owl-carousel sliders_con">
                                <?php if (!empty($construction_gallery)) {
                                    $i = 1;
                                    foreach ($construction_gallery as $construction) {
                                        if (is_file('assets/images/public/home/' . $construction['media_name'])) { ?>
                                            <div class="item construction" data-bs-toggle="modal" data-bs-target="#construction-image-modal" data-one="<?php echo $i; ?>c">
                                                <img src="<?php echo base_url('assets/images/public/home/' . $construction['media_name']); ?>" >
                                            </div>

                                <?php }
                                        $i++;
                                    }
                                } ?>
                            </div>
                            <div class="slider-counter counter_con"></div>
                        </div>
                        <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="last-tab">
                            <div class="owl-carousel sliders_video">
                                <?php if (!empty($gallery_video)) {
                                    foreach ($gallery_video as $video) { ?>
                                        <?php if ($video['media_type'] == 2) { ?>
                                            <div class="item">
                                                <video width="100%" height="350" controls>
                                                    <source src="<?php echo base_url('assets/images/public/home/' . $video['media_video']); ?>" type="video/mp4">
                                                </video>
                                            </div>
                                        <?php } ?>
                                        <?php if ($video['media_type'] == 3) { ?>
                                            <div class="item">
                                                <iframe src="https://www.youtube.com/embed/<?php $data = explode('=', $video['media_name']);
                                                                                            echo $data[1]; ?>" width="100%" height="350" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        <?php } ?>
                                <?php }
                                } ?>
                            </div>
                            <div class="slider-counter counter-video"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-30" style="display:none;">
                <a href="" class="d-table mx-auto primary-btn">VIEW MORE</a>
            </div>
        </div>
    </div>
</div>

<div class="instagram py-60  gray-bg">
    <div class="container">
        <div class="row d-flex flex-fill">
            <div class="col-md-8 order-md-1 order-2 ps-0 d-flex flex-fill">

                <!-- <img src="<?php echo base_url() ?>/assets/images/public/home/insta.svg" class="w-100"> -->
                <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                <div class="elfsight-app-cb04b2ca-91d4-4ff5-9460-e948763cbf75"></div>

            </div>
            <div class="col-md-4 order-md-2 order-1 d-flex flex-fill">
                <div class="card d-flex flex-fill flex-column align-items-center justify-content-center social-box" style="background-color:#FAF7F2;">
                    <h1 class="pr-font h-color">@WORLD STREET</h1>
                    <a href="https://www.instagram.com/omaxeworldstreet/">FOLLOW US</a>

                </div>
            </div>

        </div>
    </div>
</div>