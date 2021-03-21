<div class="event-page">

<?php if(!empty($events)){?>
    <div class="looking-out gray-bg pb-60 pt-60 pt-sm0 pb-sm-30">
        <div class="container">

            <div class="row mt-4 justify-content-center">
                <div class="col-md-10">
                    <div id="carouselExampleControls" class="carousel slide wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.5s" data-bs-ride="carousel">
                        <?php include('common_events.php'); ?>
                        <?php if(count($events) > 1){?>
                        <div class="d-flex justify-content-center event-p-carosol">
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                                <img src="<?php echo base_url(); ?>assets/images/public/street/athens-left.svg" alt="" class="">
                            </a>
                            <a class="carousel-control-next ml-40" href="#carouselExampleControls" role="button" data-bs-slide="next">
                                <img src="<?php echo base_url(); ?>assets/images/public/street/athens-right.svg" alt="" class="w-100">
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php } ?>
    <div class="about-event py-60 py-sm-30 gray-bg" style="display:none">
        <div class="container">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 px-lg-5 mt-5">About The Event</h5>
                    <div class="v-line d-table mx-auto my-4"></div>
                </div>
            </div>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <p>Nike, Inc. is an American multinational corporation that is engaged in the design, development, manufacturing, and worldwide marketing and sales of footwear, apparel, equipment, accessories, and services. </p>
                                <ul>
                                    <li><a href="">PHOTOGRAPHY</a></li>
                                    <li><a href="">LIVE BAND</a></li>
                                    <li><a href="">LIVE FOOD</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <a href="" class="d-table mx-auto primary-btn">REGISTER NOW</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <p>Nike, Inc. is an American multinational corporation that is engaged in the design, development, manufacturing, and worldwide marketing and sales of footwear, apparel, equipment, accessories, and services. </p>
                                <ul>
                                    <li><a href="">PHOTOGRAPHY</a></li>
                                    <li><a href="">LIVE BAND</a></li>
                                    <li><a href="">LIVE FOOD</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <a href="" class="d-table mx-auto primary-btn">REGISTER NOW</a>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row justify-content-center">
                <?php if (!empty($events)) {
                    foreach ($events as $event) { ?>
                        <div class="col-md-10">
                            <p><?php echo $event['about_event']; ?></p>
                            <ul>
                                <?php $labels = explode(',', $event['event_category']);
                                if (is_array($labels)) {
                                    foreach ($labels as $cat) { ?>
                                        <li><a href="javascript:void(0)"><?php echo $cat; ?></a></li>
                                    <?php }
                                } else { ?>
                                    <li><a href="javascript:void(0)"><?php echo $labels; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                <?php }
                } ?>
            </div>
            <?php if (!empty($events)) {
                foreach ($events as $event) {
                    if ($event['show_reg_btn'] == "0") { ?>
                        <div class="col-md-12 mt-5">
                            <a href="" class="d-table mx-auto primary-btn">REGISTER NOW</a>
                        </div>
            <?php }
                }
            } ?>
        </div>
    </div>
    <?php if(!empty($past_event)){?>
    <div class="about-brand gray-bg  pb-30 pt-60 pt-sm-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 px-lg-5 wow fadeInDown animated">Past Events
                    </h5>
                    <div class="v-line d-table mx-auto my-4"></div>
                </div>
            </div>

        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div id="carouselExampleControlseven" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php if(!empty($past_event)) { $i = 1; foreach($past_event as $pe){?>
                            <div class="carousel-item <?php if($i == 1){echo "active";}?>">
                                <div class="row justify-content-center">
                                    <div class="col-md-12 position-relative">
                                        <figure> <img src="<?php echo base_url('assets/images/public/home/'.$pe['thumbnail_image']); ?>" alt="<?php echo $pe['thumbnail_message']; ?>" class=""></figure>
                                        <div class="card mt-60 border-0 rounded-0">
                                            <div class="row">
                                                <div class="col-md-4 ">
                                                </div>
                                                <div class="col-md-8 ">
                                                    <p><?php echo $pe['about_event']; ?></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php $i++; } }?>
                        </div>
                        <?php if(count($past_event) > 1){?>
                        <div class="crsouls-btn-group">
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlseven" data-bs-slide="prev">
                                <img src="<?php echo base_url(); ?>assets/images/public/brand/left.svg" alt="" class="">
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlseven" data-bs-slide="next">
                                <img src="<?php echo base_url(); ?>assets/images/public/brand/right.svg" alt="" class="">
                            </button>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="similar barnd live-in-word gray-bg pt-60  position-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">#MomentsAtWS</h5>
                    <div class="v-line d-table mx-auto my-4"></div>
                </div>
            </div>
            <div class="row mt-4 d-lg-flex d-none justify-content-center">
                <div class="col-md-9">
                    <div class="owl-carousel slider wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.5s">
                        <div class="item">
                            <div class="row">
                                <div class="col-md-4">
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b1.jpg" alt="" class="d-table mx-auto"></figure>
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b2.jpg" alt="" class="d-table mx-auto"></figure>
                                </div>
                                <div class="col-md-4">
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b3.jpg" alt="" class="d-table mx-auto"></figure>
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b4.jpg" alt="" class="d-table mx-auto"></figure>
                                </div>
                                <div class="col-md-4">
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b5.jpg" alt="" class="d-table mx-auto"></figure>
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b6.jpg" alt="" class="d-table mx-auto"></figure>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-md-4">
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b1.jpg" alt="" class="d-table mx-auto"></figure>
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b2.jpg" alt="" class="d-table mx-auto"></figure>
                                </div>
                                <div class="col-md-4">
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b3.jpg" alt="" class="d-table mx-auto"></figure>
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b4.jpg" alt="" class="d-table mx-auto"></figure>
                                </div>
                                <div class="col-md-4">
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b5.jpg" alt="" class="d-table mx-auto"></figure>
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b6.jpg" alt="" class="d-table mx-auto"></figure>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-md-4">
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b1.jpg" alt="" class="d-table mx-auto"></figure>
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b2.jpg" alt="" class="d-table mx-auto"></figure>
                                </div>
                                <div class="col-md-4">
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b3.jpg" alt="" class="d-table mx-auto"></figure>
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b4.jpg" alt="" class="d-table mx-auto"></figure>
                                </div>
                                <div class="col-md-4">
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b5.jpg" alt="" class="d-table mx-auto"></figure>
                                    <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b6.jpg" alt="" class="d-table mx-auto"></figure>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="slider-counter s_counder"></div>
                </div>
            </div>
            <div class="row mt-4 d-md-none d-block">
                <div class="col-md-12">
                    <div class="owl-carousel slider-mobb">

                        <div class="item">
                            <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b1.jpg" alt="" class="d-table mx-auto"></figure>
                        </div>
                        <div class="item">
                            <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b2.jpg" alt="" class="d-table mx-auto"></figure>
                        </div>
                        <div class="item">
                            <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b5.jpg" alt="" class="d-table mx-auto"></figure>
                        </div>
                        <div class="item">
                            <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/b6.jpg" alt="" class="d-table mx-auto"></figure>
                        </div>

                    </div>
                    <div class="slider-counter s_counders"></div>
                </div>
            </div>
        </div>

    </div>
    <div class="expoler-category gray-bg pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">Explore other Categories</h5>

                    <div class="v-line d-table mx-auto my-4"></div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <ul class="category d-flex justify-content-center align-items-center flex-wrap">
                        <li>
                            <a href="<?php echo base_url('brand-directory/fashion')?>">
                                <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/c1.svg" alt=""></figure>
                                <span>FASHION</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('brand-directory/restaurant')?>">
                                <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/c2.svg" alt=""></figure>
                                <span>FOOD</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('brand-directory/health')?>">
                                <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/c3.svg" alt=""></figure>
                                <span>HEALTH & BEAUTY</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('brand-directory/entertainment')?>">
                                <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/c4.svg" alt=""></figure>
                                <span>ENTERTAINMENT</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($what_new)) {?>
    <div class="whats-new py-60 py-sm-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">What’s New in the Streets</h5>
                    <div class="v-line d-table mx-auto my-4"></div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div id="carouselExampleControls" class="carousel slide wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.5s" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                                $i = 1;
                                foreach ($what_new as $new) { ?>
                                    <div class="carousel-item <?php if ($i == 1) {
                                                                    echo "active";
                                                                } ?>">
                                        <div class="row flex-fill">
                                            <div class="col-md-6 pe-4 d-flex flex-fill">
                                                <div class="card d-flex flex-fill flex-column align-items-center justify-content-center border-0 rounded-0" style="background-color: #5A946E;">
                                                    <h2 class="fz40 fz24-sm pr-font text-white"><?php echo $new['brand_name']; ?></h2>
                                                    <p class="text-white text-center fz20 fw-5 mt-40 mb-0"><?php echo $new['about_brand']; ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="img-box positon-relative">
                                                    <img src="<?php echo base_url('assets/images/public/brand/' . $new['banner_web']); ?>" alt="<?php echo $new['banner_comment']; ?>" class="d-table ml-auto">
                                                    <div class="brnad-logo">
                                                        <img src="<?php echo base_url('assets/images/public/brand/' . $new['brand_logo']); ?>" alt="<?php echo $new['logo_message']; ?>" class="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php $i++;
                                }
                             ?>
                        </div>
                        <div class="car-ions">
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <img src="<?php echo base_url(); ?>assets/images/public/street/athens-left.svg" alt="" class="">

                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <img src="<?php echo base_url(); ?>assets/images/public/street/athens-right.svg" alt="" class="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>


    <div class="more-expoler pt-30 pb-60 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">There’s more to explore</h5>

                    <div class="v-line d-table mx-auto my-4"></div>
                </div>
            </div>