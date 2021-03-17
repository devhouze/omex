<div class="main-slider d-flex flex-fill">
    <div class="container-fluid d-flex flex-fill">
        <div class="row d-flex flex-fill">
            <div class="col-md-12 d-flex flex-fill px-0">
                <div id="carouselExampleIndicatorss" class="carousel slide d-flex flex-fill" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleIndicatorss" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselExampleIndicatorss" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselExampleIndicatorss" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">

                        <?php if (!empty($banner)) {
                            $i = 1;
                            foreach ($banner as $value) { ?>
                                <div class="carousel-item <?= ($i == 1) ? 'active' : '';
                                                            $i++; ?>">
                                    <img src="<?php echo base_url('assets/images/public/home/' . $value['banner_web']); ?>" alt="<?= $value['comment']; ?>" class="d-table mx-auto w-100">
                                    <a href="#" class="banner-link"></a>
                                </div>
                        <?php }
                        } ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="top-brands gray-bg py-30">

    <div class="container">
        <div class="row">
            <div class="col-md-12 positoin-relative">
                <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">Top Brands</h5>
                <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="d-table mx-auto wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="0.5S">
                <div class="v-line d-table mx-auto wow zoomIn animated" data-wow-duration="1s" data-wow-delay="1s"></div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="0.15s">
            <div class="col-md-10 mt-20">
                <div class="owl-carousel owl-theme top-brand">
                    <?php if (!empty($brand_logo)) {
                        foreach ($brand_logo as $logo) { ?>
                            <div class="item">
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

                            <div class="card lon-bg wow fadeInRight animated">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/l-s.svg" alt="">
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/l-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="background-image:url('<?php echo base_url(); ?>assets/images/public/home/slider.jpg');">

                            <div class="card par-bg wow fadeInRight animated" data-wow-duration="1s" data-wow-delay="0.5S">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/parish.svg" alt="">
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/pa-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="background-image:url('<?php echo base_url(); ?>assets/images/public/home/slider3.jpg')">

                            <div class="card por-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/p-s.svg" alt="">
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/p-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="background-image:url('<?php echo base_url(); ?>assets/images/public/home/slider4.jpg')">

                            <div class="card ath-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/at-s.svg" alt="">
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/at-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="background-image:url('<?php echo base_url(); ?>assets/images/public/home/slider5.jpg')">

                            <div class="card ams-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/am-s.svg" alt="">
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/am-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="background-image:url('<?php echo base_url(); ?>assets/images/public/home/slider6.jpg')">

                            <div class="card san-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/s-s.svg" alt="">
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/s-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="background-image:url('<?php echo base_url(); ?>assets/images/public/home/slider7.jpg')">

                            <div class="card hon-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/h-s.svg" alt="">
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
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
                            <label class="pr-font">Hong Kong St.</label>
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
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/l-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/paris-m.jpg" class="d-block w-100" alt="...">
                            <div class="card par-bg wow fadeInRight animated" data-wow-duration="1s" data-wow-delay="0.5S">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/parish.svg" alt="">
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/pa-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/port-m.jpg" class="d-block w-100" alt="...">
                            <div class="card por-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/p-s.svg" alt="">
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/p-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/aths-m.jpg" class="d-block w-100" alt="...">
                            <div class="card ath-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/at-s.svg" alt="">
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/at-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/amst-m.jpg" class="d-block w-100" alt="...">
                            <div class="card ams-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/am-s.svg" alt="">
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/am-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/san-m.jpg" class="d-block w-100" alt="...">
                            <div class="card san-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/s-s.svg" alt="">
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
                                <img src="<?php echo base_url(); ?>assets/images/public/home/s-s-f.svg" alt="" class="d-table mx-auto">
                            </div>
                        </div>
                        <div class="carousel-item position-relative">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/hon-m.jpg" class="d-block w-100" alt="...">
                            <div class="card hon-bg">
                                <img src="<?php echo base_url(); ?>assets/images/public/home/h-s.svg" alt="">
                                <p>Did you know? There are no STOP signs in the entire European city of Paris. What's stopping you then? </p>
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
    <div class="container">
        <div class="row">
            <div class="col-md-12 positoin-relative">
                <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">Explore More</h5>
                <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="d-table mx-auto wow fadeInDown  animated" data-wow-duration="1s" data-wow-delay="1.5s">
                <div class="v-line d-table mx-auto wow zoomIn animated" data-wow-duration="1s" data-wow-delay="1s"></div>
            </div>
        </div>
        <div class="row px-md-5 px-3 mt-md-0 mt-5">
            <div class="col-md-4">
                <h2 class="fz40 fz24-sm d-table mx-auto pr-font h-color mb-0 wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="0.5s">Eat</h2>
                <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="d-table mx-auto wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="1s">
                <figure class="position-relative mb-0 mt-12">
                    <img src="<?php echo base_url(); ?>assets/images/public/home/e1.jpg" alt="" class=" wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.2s">
                    <div class="outer"></div>
                </figure>
                <a href="javascript:void(0)" class="exploer-btn" data-type="eat" data-bs-toggle="modal" data-bs-target="#eatModal">EXPLORE <img src="<?php echo base_url(); ?>assets/images/public/home/ex-arow.svg" alt=""></a>

            </div>
            <div class="col-md-4">
                <h2 class="fz40 fz24-sm d-table mx-auto pr-font h-color mb-0 wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="0.5s">Style</h2>
                <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="d-table mx-auto wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="1s">
                <figure class="position-relative mb-0 mt-12">
                    <img src="<?php echo base_url(); ?>assets/images/public/home/e3.jpg" alt="" class=" wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.2s">
                    <div class="outer"></div>

                </figure>
                <a href="" class="exploer-btn" data-type="style" data-bs-toggle="modal" data-bs-target="#styleModal">EXPLORE <img src="<?php echo base_url(); ?>assets/images/public/home/ex-arow.svg" alt=""></a>

            </div>
            <div class="col-md-4">
                <h2 class="fz40 fz24-sm d-table mx-auto pr-font h-color mb-0 wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="0.5s">Play</h2>
                <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="d-table mx-auto wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="1s">
                <figure class="position-relative mb-0 mt-12">
                    <img src="<?php echo base_url(); ?>assets/images/public/home/e2.jpg" alt="" class=" wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.2s">
                    <div class="outer"></div>
                </figure>
                <a href="" class="exploer-btn" data-type="play" data-bs-toggle="modal" data-bs-target="#playModal">EXPLORE <img src="<?php echo base_url(); ?>assets/images/public/home/ex-arow.svg" alt=""></a>

            </div>
        </div>
    </div>
</div>
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
            <div class="col-md-10">
                <div id="carouselExampleControls" class="carousel slide wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.5s" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php if (!empty($events)) {
                            $i = 1;
                            foreach ($events as $event) { ?>
                                <div class="carousel-item <?php if ($i == 1) {
                                                                echo "active";
                                                            } ?>">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="d-md-none d-block mobile-look">
                                                <h1 class="h-font pr-font fz36 pr-18 text-center mt-18 h-color fz24-sm pr-sm0 mb-md-0 mb-4"><?php echo $event['event_name']; ?></h1>
                                            </div>
                                            <img src="<?php echo base_url(); ?>assets/images/public/home/leftslide.jpg" alt="" class="w-100">

                                        </div>
                                        <div class="col-md-4">
                                            <div class="pl-12">
                                                <div class="d-md-block d-none">
                                                    <h1 class="h-font pr-font fz36 pr-18 text-center mt-18 h-color fz24-sm"><?php echo $event['event_name']; ?></h1>
                                                </div>
                                                <div class="box-calander">
                                                    <div class="top-row">

                                                        <div class="left-col"><span><?php if ($event['date_available'] == 0) {
                                                                                        echo date('Y', strtotime($event['start_date']));
                                                                                    } ?></span></div>
                                                        <div class="right-col">
                                                            <h2 class="position-relative"><?php echo date('d', strtotime($event['start_date'])); ?> <span><?php echo date('M', strtotime($event['start_date'])); ?></span> - <?php echo date('d', strtotime($event['end_date'])); ?> <span><?php echo date('M', strtotime($event['end_date'])); ?></span></h2>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="day text-center"><?php if ($event['date_available'] == 0) {
                                                                                    echo strtoupper(date('D', strtotime($event['start_date']))) . "-" . (strtoupper(date('D', strtotime($event['end_date']))));
                                                                                } ?></div>
                                                <div class="time text-center"><?php if ($event['date_available'] == 0) {
                                                                                    echo date('g a', strtotime($event['event_start_time'])) . "-" . date('g a', strtotime($event['event_end_time']));
                                                                                } ?></div>
                                                <img src="<?php echo base_url(); ?>assets/images/public/home/long-arrow.svg" alt="" class="mt-md-4 mt-3">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <a href="<?php echo base_url('event-details/' . $event['event_id']) ?>" class="primary-btn d-inline-block mt-36">KNOW MORE</a>
                                        </div>
                                    </div>
                                </div>
                        <?php $i++;
                            }
                        } ?>
                    </div>
                    <div class="d-flex position-absolute">
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/left.svg" alt="" class="w-100">
                        </a>
                        <a class="carousel-control-next ml-40" href="#carouselExampleControls" role="button" data-bs-slide="next">
                            <img src="<?php echo base_url(); ?>assets/images/public/home/right.svg" alt="" class="w-100">
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="expreance-gallary py-30 gray-bg ">
    <div class="container">
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
                            <div class="owl-carousel slider wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.5s">
                                <?php if (!empty($all_gallery)) {
                                    foreach ($all_gallery as $gallery) { ?>
                                        <div class="item" data-bs-toggle="modal" data-bs-target="#image-modal">
                                            <img src="<?php echo base_url('assets/images/public/home/' . $gallery['media_name']); ?>">
                                        </div>
                                <?php }
                                } ?>
                            </div>
                            <div class="slider-counter"></div>

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="owl-carousel sliders">
                                <?php if (!empty($interior_gallery)) {
                                    foreach ($interior_gallery as $interior) { ?>
                                        <div class="item">
                                            <img src="<?php echo base_url('assets/images/public/home/' . $interior['media_name']); ?>" class="interior">
                                        </div>
                                <?php }
                                } ?>
                            </div>
                            <div class="slider-counter"></div>

                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="owl-carousel sliders">
                                <?php if (!empty($exterior_gallery)) {
                                    foreach ($exterior_gallery as $exterior) { ?>
                                        <div class="item">
                                            <img src="<?php echo base_url('assets/images/public/home/' . $exterior['media_name']); ?>" class="all" class="exterior">
                                        </div>
                                <?php }
                                } ?>
                            </div>
                            <div class="slider-counter"></div>
                        </div>
                        <div class="tab-pane fade" id="last" role="tabpanel" aria-labelledby="last-tab">
                            <div class="owl-carousel sliders">
                                <?php if (!empty($construction_gallery)) {
                                    foreach ($construction_gallery as $construction) { ?>
                                        <div class="item">
                                            <img src="<?php echo base_url('assets/images/public/home/' . $construction['media_name']); ?>" class="construction">
                                        </div>

                                <?php }
                                } ?>
                            </div>
                            <div class="slider-counter"></div>
                        </div>
                        <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="last-tab">
                            <div class="owl-carousel sliders">
                                <?php if (!empty($gallery_video)) {
                                    foreach ($gallery_video as $video) { ?>
                                        <?php if ($video['media_type'] == 2) { ?>
                                            <div class="item">
                                                <video width="320" height="240" controls>
                                                    <source src="<?php echo base_url('assets/images/public/home/' . $video['media_name']); ?>" type="video/mp4">
                                                </video>
                                            </div>
                                        <?php } ?>
                                        <?php if ($video['media_type'] == 3) { ?>
                                            <div class="item">
                                                <?php echo $video['media_name']; ?>
                                            </div>
                                        <?php } ?>
                                <?php }
                                } ?>
                            </div>
                            <div class="slider-counter"></div>
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

<div class="instagram py-30 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="<?php echo base_url(); ?>assets/images/public/home/insta.svg" alt="" class="w-100">
            </div>

        </div>
    </div>
</div>