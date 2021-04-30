<div class="barnd-page <?php echo str_replace(' ', '_',$about_brand['brand_street']) ?>">
    <?php if(!empty($about_brand)){?>
    <div class="brand-banner">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 px-0">
                    <div id="carouselExampleIndicators" class="carousel slide positon-relative d-md-block d-none <?php if(!is_file('assets/images/public/brand/'.$about_brand['banner_web'])){ echo "no-Banner"; }?>" data-bs-ride="carousel">

                        <div class="carousel-inner postion-relative ">
                            <?php if(is_file('assets/images/public/brand/'.$about_brand['banner_web'])){?>
                            <div class="carousel-item active">
                                <img src="<?php echo BASE_URL('assets/images/public/brand/'.$about_brand['banner_web']); ?>" alt="<?php echo $about_brand['banner_comment']; ?>" class="">
                            </div>
                            <?php } ?>
                        </div>
                        <?php if(is_file('assets/images/public/brand/'.$about_brand['brand_logo'])){?>
                        <div class="brand-lgoo">
                            <img src="<?php echo BASE_URL('assets/images/public/brand/'.$about_brand['brand_logo']); ?>" alt="<?php echo $about_brand['logo_message']; ?>" class="">
                        </div>
                        <?php } ?>
                         <?php if(is_file('assets/images/public/brand/'.$about_brand['banner_web'])){?>
                        <div class="bg-color" style="background-color: #5A946E;"></div>
                         <?php } ?>
                        <?php if(count($about_brand) > 1){?>
                        <div class="crasol-btn d-none">
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <img src="<?php echo BASE_URL(); ?>assets/images/public/brand/left.svg" alt="" class="">
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <img src="<?php echo BASE_URL(); ?>assets/images/public/brand/right.svg" alt="" class="">
                            </button>
                        </div>
                        <?php } ?>
                    </div>
                    <div id="carouselExampleIndicatorsmob" class="carousel slide positon-relative d-md-none d-block <?php if(!is_file('assets/images/public/brand/'.$about_brand['banner_mobile'])){ echo "no-Banner"; }?>" data-bs-ride="carousel">

                        <div class="carousel-inner postion-relative ">
                            <?php if(is_file('assets/images/public/brand/'.$about_brand['banner_mobile'])){?>
                            <div class="carousel-item active" style="background-image: url('<?php echo BASE_URL('assets/images/public/brand/'.$about_brand['banner_mobile']); ?>" alt="<?php echo $about_brand['banner_comment']; ?>');">
                            
                            </div>
                            <?php } ?>

                        </div>
                        <?php if(is_file('assets/images/public/brand/'.$about_brand['brand_logo'])){?>
                        <div class="brand-lgoo">
                            <img src="<?php echo BASE_URL('assets/images/public/brand/'.$about_brand['brand_logo']); ?>" alt="<?php echo $about_brand['logo_message']; ?>" class="">
                        </div>
                        <?php } ?>
                        <?php if(count($about_brand) > 1){?>
                        <div class="crasol-btn ">
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicatorsmob" data-bs-slide="prev">
                                <img src="<?php echo BASE_URL(); ?>assets/images/public/brand/left.svg" alt="" class="">
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicatorsmob" data-bs-slide="next">
                                <img src="<?php echo BASE_URL(); ?>assets/images/public/brand/right.svg" alt="" class="">
                            </button>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="shop-details gray-bg">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-8 col-md-6"></div>
                <div class="col-lg-4 col-md-6">
                    <ul>
                        <li><img src="<?php echo BASE_URL(); ?>assets/images/public/home/cmap.svg" alt=""><?php echo $about_brand['brand_location'].','.$about_brand['brand_street']; ?></li>
                        <li><img src="<?php echo BASE_URL(); ?>assets/images/public/home/ccall.svg" alt=""><?php echo $about_brand['brand_contact']; ?></li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php if(!empty($key_info[0])){?>
    <div class="key-information gray-bg pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 px-lg-5 mt-40">Key Information</h5>
                    <ul class="d-table mx-auto mt-5">
                        <?php $cat[] = array_slice($key_info,0,5); foreach($key_info as $info){?>
                        <li><a href="#"><?php echo $this->wm->get_sub_cat_name($info); ?></a></li>
                        <?php } ?>
                    </ul>
                    <div class="v-line d-table mx-auto mt-4"></div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if(!empty($about_brand)){?>
    <div class="about-brand gray-bg  pb-30">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 px-lg-5 wow fadeInDown animated">About <?php echo $about_brand['brand_name'];?></h5>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 position-relative">
                    <figure> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$about_brand['about_brand_banner_web']); ?>" alt="<?php echo $about_brand['about_brand_banner_alt']; ?>" class=""></figure>
                    <div class="card mt-60 border-0 rounded-0">
                        <div class="row">
                            <div class="col-lg-4 ">
                            </div>
                            <div class="col-lg-8 ">
                                <div class="brand-content"><?php echo $about_brand['about_brand']; ?></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php if((!empty($first_similar_brands)) || (!empty($second_similar_brands)) || (!empty($third_similar_brands))){?>
    <div class="similar barnd live-in-word gray-bg pt-30 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">Similar Brands</h5>
                    <div class="v-line d-table mx-auto my-4"></div>
                </div>
            </div>
            <div class="row mt-4 d-lg-flex d-none justify-content-center">
                <div class="col-xxl-9">
                    <div class="owl-carousel slider wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.5s">
                        <?php if(!empty($first_similar_brands)){?>
                        <div class="item">
                            <div class="row">
                                <?php if(!empty($first_similar_brands[0]) || !empty($first_similar_brands[1])){?>
                                <div class="col-md-4">
                                    <figure><a href="<?php echo base_url('brand/'.$first_similar_brands[0]['brand_slug'])?>"></a><span><?php echo $first_similar_brands[0]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$first_similar_brands[0]['brand_logo']); ?>" alt="<?php echo $first_similar_brands[0]['brand_logo']?>" class="d-table mx-auto"></figure>

                                    <figure><a href="<?php echo base_url('brand/'.$first_similar_brands[1]['brand_slug'])?>"></a><span><?php echo $first_similar_brands[1]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$first_similar_brands[1]['brand_logo']); ?>" alt="<?php echo $first_similar_brands[1]['brand_logo']?>" class="d-table mx-auto"></figure>
                                </div>
                                <?php } ?>

                                <?php if(!empty($first_similar_brands[2]) || !empty($first_similar_brands[3])){?>
                                <div class="col-md-4">
                                    <figure><a href="<?php echo base_url('brand/'.$first_similar_brands[2]['brand_slug'])?>"></a><span><?php echo $first_similar_brands[2]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$first_similar_brands[2]['brand_logo']); ?>" alt="<?php echo $first_similar_brands[2]['brand_logo']?>" class="d-table mx-auto"></figure>

                                    <figure><a href="<?php echo base_url('brand/'.$first_similar_brands[3]['brand_slug'])?>"></a><span><?php echo $first_similar_brands[3]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$first_similar_brands[3]['brand_logo']); ?>" alt="<?php echo $first_similar_brands[3]['brand_logo']?>" class="d-table mx-auto"></figure>
                                </div>
                                <?php } ?>
                                
                                <?php if(!empty($first_similar_brands[4]) || !empty($first_similar_brands[5])){?>
                                <div class="col-md-4">
                                    <figure><a href="<?php echo base_url('brand/'.$first_similar_brands[4]['brand_slug'])?>"></a><span><?php echo $first_similar_brands[4]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$first_similar_brands[4]['brand_logo']); ?>" alt="<?php echo $first_similar_brands[4]['brand_logo']?>" class="d-table mx-auto"></figure>

                                    <figure><a href="<?php echo base_url('brand/'.$first_similar_brands[5]['brand_slug'])?>"></a><span><?php echo $first_similar_brands[5]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$first_similar_brands[5]['brand_logo']); ?>" alt="<?php echo $first_similar_brands[5]['brand_logo']?>" class="d-table mx-auto"></figure>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if(!empty($second_similar_brands)){?>
                        <div class="item">
                            <div class="row">
                                <?php if(!empty($second_similar_brands[0]) && !empty($second_similar_brands[1])){?>
                                <div class="col-md-4">
                                    <figure><a href="<?php echo base_url('brand/'.$second_similar_brands[0]['brand_id'])?>"></a><span><?php echo $second_similar_brands[0]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$second_similar_brands[0]['brand_logo']); ?>" alt="<?php echo $second_similar_brands[0]['brand_logo']?>" class="d-table mx-auto"></figure>

                                    <figure><span><a href="<?php echo base_url('brand/'.$second_similar_brands[1]['brand_id'])?>"></a><?php echo $second_similar_brands[1]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$second_similar_brands[1]['brand_logo']); ?>" alt="<?php echo $second_similar_brands[1]['brand_logo']?>" class="d-table mx-auto"></figure>
                                </div>
                                <?php } ?>

                                <?php if(!empty($second_similar_brands[2]) && !empty($second_similar_brands[3])){?>
                                <div class="col-md-4">
                                    <figure><span><a href="<?php echo base_url('brand/'.$second_similar_brands[2]['brand_id'])?>"></a><?php echo $second_similar_brands[2]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$second_similar_brands[2]['brand_logo']); ?>" alt="<?php echo $second_similar_brands[2]['brand_logo']?>" class="d-table mx-auto"></figure>

                                    <figure><span><a href="<?php echo base_url('brand/'.$second_similar_brands[3]['brand_id'])?>"></a><?php echo $second_similar_brands[3]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$second_similar_brands[3]['brand_logo']); ?>" alt="<?php echo $second_similar_brands[3]['brand_logo']?>" class="d-table mx-auto"></figure>
                                </div>
                                <?php } ?>
                                
                                <?php if(!empty($second_similar_brands[4]) && !empty($second_similar_brands[5])){?>
                                <div class="col-md-4">
                                    <figure><span><a href="<?php echo base_url('brand/'.$second_similar_brands[4]['brand_id'])?>"></a><?php echo $second_similar_brands[4]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$second_similar_brands[4]['brand_logo']); ?>" alt="<?php echo $second_similar_brands[4]['brand_logo']?>" class="d-table mx-auto"></figure>

                                    <figure><span><a href="<?php echo base_url('brand/'.$second_similar_brands[5]['brand_id'])?>"></a><?php echo $second_similar_brands[5]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$second_similar_brands[5]['brand_logo']); ?>" alt="<?php echo $second_similar_brands[5]['brand_logo']?>" class="d-table mx-auto"></figure>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if(!empty($third_similar_brands)){?>
                        <div class="item">
                            <div class="row">
                                <?php if(!empty($third_similar_brands[0]) && !empty($third_similar_brands[1])){?>
                                <div class="col-md-4">
                                    <figure><span><a href="<?php echo base_url('brand/'.$third_similar_brands[0]['brand_id'])?>"></a><?php echo $third_similar_brands[0]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$third_similar_brands[0]['brand_logo']); ?>" alt="<?php echo $third_similar_brands[0]['brand_logo']?>" class="d-table mx-auto"></figure>

                                    <figure><span><a href="<?php echo base_url('brand/'.$third_similar_brands[1]['brand_id'])?>"></a><?php echo $third_similar_brands[1]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$third_similar_brands[1]['brand_logo']); ?>" alt="<?php echo $third_similar_brands[1]['brand_logo']?>" class="d-table mx-auto"></figure>
                                </div>
                                <?php } ?>

                                <?php if(!empty($third_similar_brands[2]) && !empty($third_similar_brands[3])){?>
                                <div class="col-md-4">
                                    <figure><span><a href="<?php echo base_url('brand/'.$third_similar_brands[2]['brand_id'])?>"></a><?php echo $third_similar_brands[2]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$third_similar_brands[2]['brand_logo']); ?>" alt="<?php echo $third_similar_brands[2]['brand_logo']?>" class="d-table mx-auto"></figure>

                                    <figure><span><a href="<?php echo base_url('brand/'.$third_similar_brands[3]['brand_id'])?>"></a><?php echo $third_similar_brands[3]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$third_similar_brands[3]['brand_logo']); ?>" alt="<?php echo $third_similar_brands[3]['brand_logo']?>" class="d-table mx-auto"></figure>
                                </div>
                                <?php } ?>
                                
                                <?php if(!empty($third_similar_brands[4]) && !empty($third_similar_brands[5])){?>
                                <div class="col-md-4">
                                    <figure><a href="<?php echo base_url('brand/'.$third_similar_brands[4]['brand_id'])?>"></a><span><?php echo $third_similar_brands[4]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$third_similar_brands[4]['brand_logo']); ?>" alt="<?php echo $third_similar_brands[4]['brand_logo']?>" class="d-table mx-auto"></figure>

                                    <figure><span><a href="<?php echo base_url('brand/'.$third_similar_brands[5]['brand_id'])?>"></a><?php echo $third_similar_brands[5]['brand_name']?></span> <img src="<?php echo BASE_URL('assets/images/public/brand/'.$third_similar_brands[5]['brand_logo']); ?>" alt="<?php echo $third_similar_brands[5]['brand_logo']?>" class="d-table mx-auto"></figure>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="slider-counter s_counder"></div>
                </div>
            </div>
            <div class="row mt-4 d-lg-none d-block">
                <div class="col-md-12">
                    <div class="owl-carousel slider-mobb">
                        <?php if(!empty($similar_brands)){foreach($similar_brands as $sm){?>
                        <div class="item">
                            <figure><img src="<?php echo BASE_URL('assets/images/public/brand/'.$sm['brand_logo']); ?>" alt="<?php echo $sm['logo_message'];?>" class="d-table mx-auto"></figure>
                        </div>
                        <?php } } ?>
                    </div>
                    <div class="slider-counter s_counders"></div>
                </div>
            </div>
        </div>

    </div>
    <?php } ?>
    <div class="expoler-category gray-bg pt-60 pb-30">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">Explore other Categories</h5>

                    <div class="v-line d-table mx-auto my-4"></div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xxl-10">
                    <ul class="category d-flex flex-wrap justify-content-center align-items-center">
                        <li>
                            <a href="<?php echo base_url('brand-directory/fashion#search-box')?>">
                                <figure><img src="<?php echo BASE_URL(); ?>assets/images/public/brand/c1.svg" alt=""></figure>
                                <span>FASHION</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('brand-directory/restaurant#search-box')?>">
                                <figure><img src="<?php echo BASE_URL(); ?>assets/images/public/brand/c2.svg" alt=""></figure>
                                <span>FOOD</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('brand-directory/health#search-box')?>">
                                <figure><img src="<?php echo BASE_URL(); ?>assets/images/public/brand/c3.svg" alt=""></figure>
                                <span>HEALTH & BEAUTY</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('brand-directory/entertainment#search-box')?>">
                                <figure><img src="<?php echo BASE_URL(); ?>assets/images/public/brand/c4.svg" alt=""></figure>
                                <span>ENTERTAINMENT</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php if(!empty($what_new)){?>
    <div class="whats-new py-60 py-sm-20 gray-bg">
        <div class="container-lg">
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
                            <?php $i = 1; foreach($what_new as $new){?>
                            <div class="carousel-item  <?php if($i == 1){echo "active";}?>">
                                <div class="row flex-fill">
                                    <div class="col-lg-6 pe-md-4 d-flex flex-fill">
                                        <div class="card d-flex flex-fill flex-column align-items-center justify-content-center border-0 rounded-0 py-5" style="background-color:#5A946E;">
                                            <h2 class="fz40 fz24-sm pr-font text-white"><?php echo $new['brand_name']; ?></h2>
                                            <div class="text-white text-center fz20 fw-5 mt-40 mb-0 content-box"><?php echo $new['about_brand']; ?></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="img-box positon-relative position-relative">
                                            <img src="<?php echo base_url('assets/images/public/brand/'.$new['banner_web']); ?>" alt="<?php echo $new['banner_comment']; ?>" class="d-table ml-auto">
                                            <div class="brnad-logo">
                                                <img src="<?php echo base_url('assets/images/public/brand/'.$new['brand_logo']); ?>" alt="<?php echo $new['logo_message']; ?>" class="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; } ?>
                        </div>
                        <?php if(count($what_new) > 1){?>
                        <div class="car-ions">
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <img src="<?php echo BASE_URL(); ?>assets/images/public/brand/left.svg" alt="" class="">

                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <img src="<?php echo BASE_URL(); ?>assets/images/public/brand/right.svg" alt="" class="">
                            </button>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="find-us py-60 py-sm-20 gray-bg">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">Find Us</h5>

                    <div class="v-line d-table mx-auto my-4"></div>
                </div>
            </div>
            <div class="row mt-4 d-flex flex-fill">
                <div class="col-xxl-1"></div>
                <div class="col-md-6 d-flex flex-fill pe-md-0">
                    <!-- <figure class="mb-0 w-100 d-flex flex-fill"><img src="<?php echo BASE_URL(); ?>assets/images/public/street/map.jpg" alt="" class="w-100"></figure> -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14040.246250040547!2d77.3528947!3d28.3872085!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5ba6ea082ef6bf15!2sOmaxe%20World%20Street!5e0!3m2!1sen!2spl!4v1605103931187!5m2!1sen!2spl" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-md-4 d-flex flex-fill ps-md-0">
                <div class="card px-40 py-40 rounded-0 border-0 wow fadeInRight animated" style="background-color: #145183;">
                        <img src="<?php echo base_url(); ?>assets/images/public/brand/ws.svg" alt="">
                        <p class="fz20 text-white text-center mt-30">Wander by foot into the heart of the New Faridabad. Start discovering your own world within ours at World Street.</p>
                        <img src="<?php echo base_url(); ?>assets/images/public/brand/wss.png" alt="" class="d-table mx-auto mt-30">
                    </div>
                </div>
                <div class="col-xxl-1"></div>
            </div>
        </div>

    </div>
    <div class="more-expoler pt-30 pb-60 gray-bg pb-sm-30">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">There’s more to explore</h5>

                    <div class="v-line d-table mx-auto my-4"></div>
                </div>
            </div>