<div class="event-page">

    <div class="looking-out gray-bg pb-60 pt-60 pt-sm0 pb-sm-30">
        <div class="container">

            <div class="row mt-4 justify-content-center">
                <div class="col-xxl-10">
                    <div id="" class=" wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.5s" >

                        <div class="carousel-inner">
                            <?php if (!empty($event)) { ?>
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="d-md-none d-block mobile-look">
                                                <h1 class="h-font pr-font fz36 pr-18 text-center mt-18 h-color fz24-sm pr-sm0 mb-md-0 mb-4"><?php echo $event['event_name']; ?></h1>
                                            </div>
                                            <img src="<?php echo base_url('assets/images/public/home/' . $event['thumbnail_image']); ?>" alt="<?php echo $event['thumbnail_message']; ?>" class="">

                                        </div>
                                        <div class="col-md-4">
                                            <div class="pl-12">
                                                <div class="d-md-block d-none">
                                                    <h1 class="h-font pr-font fz36 pr-18 text-center mt-18 h-color fz24-sm"><?php echo $event['event_name']; ?></h1>
                                                </div>
                                                <div class="box-calander">
                                                    <div class="top-row">
                                                        <div class="left-col"><span>
                                                                <?php
                                                                if ($event['date_available'] == 0) {
                                                                    echo date('Y', strtotime($event['start_date']));
                                                                } else {
                                                                    echo date('Y');
                                                                }
                                                                ?>
                                                            </span></div>
                                                        <div class="right-col">
                                                            <h2 class="position-relative">
                                                                <?php
                                                                if ($event['date_available'] == 0) {
                                                                    echo date('d', strtotime($event['start_date'])) . " " . date('M', strtotime($event['start_date']));
                                                                    if (!empty($event['end_date']) && $event['end_date'] != '0000-00-00') {
                                                                        echo "-" . date('d', strtotime($event['end_date'])) . " " . date('M', strtotime($event['end_date']));
                                                                    }
                                                                } else {
                                                                    echo 'Coming Soon';
                                                                }
                                                                ?>
                                                                </span></h2>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="day text-center">
                                                    <?php if ($event['date_available'] == 0) {
                                                        echo strtoupper(date('D', strtotime($event['start_date'])));

                                                        if (!empty($event['end_date']) && $event['end_date'] != '0000-00-00') {
                                                            echo "-" . (strtoupper(date('D', strtotime($event['end_date']))));
                                                        }
                                                    } ?>
                                                </div>
                                                <div class="time text-center"><?php if ($event['date_available'] == 0) {
                                                                                    echo date('g a', strtotime($event['event_start_time'])); ?>-<?php echo date('g a', strtotime($event['event_end_time']));
                                                                                                            } ?></div>
                                                <img src="<?php echo base_url(); ?>assets/images/public/home/long-arrow.svg" alt="" class="mt-md-4 mt-3">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($event)) { ?>
                                <div class="carousel-item ">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="d-md-none d-block mobile-look">
                                                <h1 class="h-font pr-font fz36 pr-18 text-center mt-18 h-color fz24-sm pr-sm0 mb-md-0 mb-4"><?php echo $event['event_name']; ?></h1>
                                            </div>
                                            <img src="<?php echo base_url('assets/images/public/home/' . $event['thumbnail_image']); ?>" alt="<?php echo $event['thumbnail_message']; ?>" class="">

                                        </div>
                                        <div class="col-md-4">
                                            <div class="pl-12">
                                                <div class="d-md-block d-none">
                                                    <h1 class="h-font pr-font fz36 pr-18 text-center mt-18 h-color fz24-sm"><?php echo $event['event_name']; ?></h1>
                                                </div>
                                                <div class="box-calander">
                                                    <div class="top-row">
                                                        <div class="left-col"><span>
                                                                <?php
                                                                if ($event['date_available'] == 0) {
                                                                    echo date('Y', strtotime($event['start_date']));
                                                                } else {
                                                                    echo date('Y');
                                                                }
                                                                ?>
                                                            </span></div>
                                                        <div class="right-col">
                                                            <h2 class="position-relative">
                                                                <?php
                                                                if ($event['date_available'] == 0) {
                                                                    echo date('d', strtotime($event['start_date'])) . " " . date('M', strtotime($event['start_date']));
                                                                    if (!empty($event['end_date']) && $event['end_date'] != '0000-00-00') {
                                                                        echo "-" . date('d', strtotime($event['end_date'])) . " " . date('M', strtotime($event['end_date']));
                                                                    }
                                                                } else {
                                                                    echo 'Coming Soon';
                                                                }
                                                                ?>
                                                                </span></h2>
                                                        </div>
                                                    </div>


                                                </div>

                                                <?php if ($event['date_available'] == 0) { ?>
                                                    <div class="day text-center">
                                                        <?php echo date('D', strtotime($event['start_date']));
                                                        if (!empty($event['end_date']) && $event['end_date'] != '0000-00-00') {
                                                            echo "-" . date('D', strtotime($event['end_date']));
                                                        } ?>
                                                    </div>
                                                    <div class="time text-center">
                                                        <?php
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
                                </div>

                            <?php } ?>

                        </div>
                        <div class="d-flex justify-content-center mt-5 d-none">
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                                <img src="<?php echo base_url(); ?>assets/images/public/street/athens-left.svg" alt="" class="w-100">
                            </a>
                            <a class="carousel-control-next ml-40" href="#carouselExampleControls" role="button" data-bs-slide="next">
                                <img src="<?php echo base_url(); ?>assets/images/public/street/athens-right.svg" alt="" class="w-100">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="about-event py-60 py-sm-30 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 px-lg-5 mt-5">About The Event</h5>
                    <div class="v-line d-table mx-auto my-4"></div>
                </div>
            </div>

            <div class="row justify-content-center">
                <?php if (!empty($event)) { ?>
                    <div class="col-xxl-10">
                        <p><?php echo $event['about_event']; ?></p>
                        <div class="d-table mx-auto my-4 h-color fz26"><img src="<?php echo BASE_URL(); ?>assets/images/public/home/cmap.svg" alt=""> <?php echo ucfirst($event['event_location']).','.ucfirst($event['event_street']); ?></div>
                        <ul>
                            <?php $labels = explode(',', $event['event_category']);
                            if (is_array($labels)) {
                                foreach ($labels as $cat) { ?>
                                    <li><?php echo $cat; ?></li>
                                <?php }
                            } else { ?>
                                <li><?php echo $labels; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            <?php if (!empty($event)) {
                if ($event['show_reg_btn'] == "0") { ?>
                    <div class="col-md-12 mt-5">
                        <a href="" class="d-table mx-auto primary-btn" data-bs-toggle="modal" data-bs-target="#registernow">REGISTER NOW</a>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
    <?php if (!empty($past_event)) { ?>
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
                    <div class="col-xxl-10">
                        <div id="carouselExampleControlseven" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php if (!empty($past_event)) {
                                    $i = 1;
                                    foreach ($past_event as $pe) { ?>
                                        <div class="carousel-item <?php if ($i == 1) {
                                                                        echo "active";
                                                                    } ?>">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12 position-relative">
                                                    <figure> <img src="<?php echo base_url('assets/images/public/home/' . $pe['thumbnail_image']); ?>" alt="<?php echo $pe['thumbnail_message']; ?>" class=""></figure>
                                                    <div class="card mt-60 border-0 rounded-0">
                                                        <div class="row">
                                                            <div class="col-md-4 ">
                                                            </div>
                                                            <div class="col-md-8 ">
                                                                <div class="brand-content"><?php echo $pe['about_event']; ?></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                            <?php if (count($past_event) > 1) { ?>
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
            <div class="row mt-4 justify-content-center">
                <div class="col-md-9">
                    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                    <div class="elfsight-app-52b76f2d-9b89-4516-a5a9-f98581951782"></div>
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
                <div class="col-xxl-10">
                    <ul class="category d-flex justify-content-center align-items-center flex-wrap">
                        <li>
                            <a href="<?php echo base_url('brand-directory/fashion#search-box') ?>">
                                <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/c1.svg" alt=""></figure>
                                <span>FASHION</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('brand-directory/restaurant#search-box') ?>">
                                <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/c2.svg" alt=""></figure>
                                <span>FOOD</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('brand-directory/health#search-box') ?>">
                                <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/c3.svg" alt=""></figure>
                                <span>HEALTH & BEAUTY</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('brand-directory/entertainment#search-box') ?>">
                                <figure><img src="<?php echo base_url(); ?>assets/images/public/brand/c4.svg" alt=""></figure>
                                <span>ENTERTAINMENT</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="whats-new py-60 py-sm-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">What’s New in the Streets</h5>
                    <div class="v-line d-table mx-auto my-4"></div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xxl-10">
                    <div id="carouselExampleControls" class="carousel slide wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.5s" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php if (!empty($what_new)) {
                                $i = 1;
                                foreach ($what_new as $new) { ?>
                                    <div class="carousel-item <?php if ($i == 1) {
                                                                    echo "active";
                                                                } ?>">
                                        <div class="row flex-fill">
                                            <div class="col-md-6 pe-4 d-flex flex-fill">
                                                <div class="card d-flex flex-fill flex-column align-items-center justify-content-center border-0 rounded-0" style="background-color: #5A946E;">
                                                    <h2 class="fz40 fz24-sm pr-font text-white"><?php echo $new['brand_name']; ?></h2>
                                                    <div class="text-white text-center fz20 fw-5 mt-40 mb-0 content-box"><?php echo $new['about_brand']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="img-box positon-relative">
                                                    <img src="<?php echo base_url('assets/images/public/brand/' . $new['banner_web']); ?>" alt="<?php echo $new['banner_comment']; ?>" class="d-table ml-auto">
                                                    <div class="brnad-logo">
                                                        <a href="<?php echo base_url('brand/' . $new['brand_slug']); ?>" class=""></a>
                                                        <img src="<?php echo base_url('assets/images/public/brand/' . $new['brand_logo']); ?>" alt="<?php echo $new['logo_message']; ?>" class="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php $i++;
                                }
                            } ?>
                        </div>
                        <?php if (count($what_new) > 1) { ?>
                            <div class="car-ions d-none">
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <img src="<?php echo base_url(); ?>assets/images/public/brand/left.svg" alt="" class="">

                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <img src="<?php echo base_url(); ?>assets/images/public/brand/right.svg" alt="" class="">
                                </button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registernow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">


                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="modal-body">
                    <form action="<?php echo base_url('register-in-event') ?>" method="post" id="register">
                        <div class="mb-4">
                            <label for="formGroupExampleInput" class="form-label">Name *</label>
                            <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Your Name">
                        </div>
                        <div class="mb-4">
                            <label for="formGroupExampleInput" class="form-label">Email Address*</label>
                            <input type="email" name="email" class="form-control" id="formGroupExampleInput" placeholder="Your Email">
                        </div>
                        <div class="mb-4">
                            <label for="formGroupExampleInput" class="form-label">Mobile Number*</label>
                            <input type="text" name="contact" class="form-control" id="formGroupExampleInput" placeholder="Your Number">
                        </div>
                        <input type="hidden" name="event_name" value="<?php echo $event['event_name']; ?>">
                        <div class="mb-4">
                            <label for="formGroupExampleInput" class="form-label">Your Message*</label>
                            <textarea class="form-control" name="message" id="formGroupExampleInput" placeholder="Your Message"></textarea>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="submit-bnt d-table mx-auto">REGISTER NOW</button>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>

    <div class="more-expoler pt-30 pb-60 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">There’s more to explore</h5>

                    <div class="v-line d-table mx-auto my-4"></div>
                </div>
            </div>