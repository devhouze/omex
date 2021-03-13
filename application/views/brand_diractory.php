<div class="brand-directory-page barnd-page">
    <div class="brand-banner">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 px-0">
                    <div id="carouselExampleIndicators" class="carousel slide positon-relative d-md-block d-none" data-bs-ride="carousel">

                        <div class="carousel-inner postion-relative ">
                            <?php if(!empty('brand_banner')) {$i=1; foreach($brand_banner as $banner){?>
                            <div class="carousel-item <?php if($i == 1){ echo "active";}?>">
                                <img src="<?php echo base_url('assets/images/public/brand/'.$banner['banner_web']); ?>" alt="<?php echo $banner['comment'];?>" class="">
                            </div>
                            <?php $i++;  } }?>
                        </div>

                        <div class="bg-color" style="background-color: #5A946E;"></div>
                        <div class="crasol-btn d-none">
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <img src="<?php echo base_url(); ?>assets/images/public/brand/left.svg" alt="" class="">
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <img src="<?php echo base_url(); ?>assets/images/public/brand/right.svg" alt="" class="">
                            </button>
                        </div>
                    </div>
                    <div id="carouselExampleIndicatorsmob" class="carousel slide positon-relative d-md-none" data-bs-ride="carousel">

                        <div class="carousel-inner postion-relative ">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url(); ?>assets/images/public/brand/bs1-m.jpg" alt="" class="">
                            </div>
                           
                        </div>


                        <div class="crasol-btn d-none">
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicatorsmob" data-bs-slide="prev">
                                <img src="<?php echo base_url(); ?>assets/images/public/brand/left.svg" alt="" class="">
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicatorsmob" data-bs-slide="next">
                                <img src="<?php echo base_url(); ?>assets/images/public/brand/right.svg" alt="" class="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="brand-directory gray-bg pt-60 pt-sm-30 pb-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 px-lg-5 mt-60 mt-sm0 pt-60 pt-sm0">Brand Directory</h5>
                </div>

            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <ul class="me-0 mt-40 p-0 d-flex justify-content-center flex-wrap">

                        <li><a href="<?php echo base_url('brand-directory/a')?>">A </a></li>
                        <li><a href="<?php echo base_url('brand-directory/b')?>">B </a></li>
                        <li><a href="<?php echo base_url('brand-directory/c')?>">C </a></li>
                        <li><a href="<?php echo base_url('brand-directory/d')?>">D </a></li>
                        <li><a href="<?php echo base_url('brand-directory/e')?>">E </a></li>
                        <li><a href="<?php echo base_url('brand-directory/f')?>">F </a></li>
                        <li><a href="<?php echo base_url('brand-directory/g')?>">G </a></li>
                        <li><a href="<?php echo base_url('brand-directory/h')?>">H </a></li>
                        <li><a href="<?php echo base_url('brand-directory/i')?>">I </a></li>
                        <li><a href="<?php echo base_url('brand-directory/j')?>">J </a></li>
                        <li><a href="<?php echo base_url('brand-directory/k')?>">K </a></li>
                        <li><a href="<?php echo base_url('brand-directory/l')?>">L </a></li>
                        <li><a href="<?php echo base_url('brand-directory/m')?>">M </a></li>
                        <li><a href="<?php echo base_url('brand-directory/n')?>">N </a></li>
                        <li><a href="<?php echo base_url('brand-directory/o')?>">O </a></li>
                        <li><a href="<?php echo base_url('brand-directory/p')?>">P </a></li>
                        <li><a href="<?php echo base_url('brand-directory/q')?>">Q </a></li>
                        <li><a href="<?php echo base_url('brand-directory/r')?>">R </a></li>
                        <li><a href="<?php echo base_url('brand-directory/s')?>">S </a></li>
                        <li><a href="<?php echo base_url('brand-directory/t')?>">T </a></li>
                        <li><a href="<?php echo base_url('brand-directory/u')?>">U </a></li>
                        <li><a href="<?php echo base_url('brand-directory/v')?>">V </a></li>
                        <li><a href="<?php echo base_url('brand-directory/w')?>">W </a></li>
                        <li><a href="<?php echo base_url('brand-directory/x')?>">X </a></li>
                        <li><a href="<?php echo base_url('brand-directory/y')?>">Y </a></li>
                        <li><a href="<?php echo base_url('brand-directory/z')?>">z </a></li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="v-line d-table mx-auto my-4"></div>
                </div>

            </div>


        </div>
    </div>
    <div class="search-brand gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-1-">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 px-lg-5 wow fadeInDown animated">Search Brands</h5>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-4">
                            <ul>
                                <li><a href="">POPULAR</a></li>
                                <li><a href="">NEW IN</a></li>
                                <li><a href="">EXCLUSIVE WS</a></li>
                                <li><a href="">SALES & OFFER</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul>
                                <li><a href="">POPULAR</a></li>
                                <li><a href="">NEW IN</a></li>
                                <li><a href="">EXCLUSIVE WS</a></li>
                                <li><a href="">SALES & OFFER</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul>
                                <li><a href="">APPAREL</a></li>
                                <li><a href="">RESTAURANTS</a></li>
                                <li><a href="">GROOMING</a></li>
                                <li><a href="">DAILY NEEDS</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <?php $brand_street = "";?>
                            <select name="" id="" class="select">
                                <option disabled="" selected>Select Street</option>
                                <option value="London Street" <?php if($brand_street == "London Street"){echo "selected"; }?>>London Street</option>
                                <option value="Paris Street" <?php if($brand_street == "Paris Street"){echo "selected"; }?>>Paris Street</option>
                                <option value="Hong Kong Street" <?php if($brand_street == "Hong Kong Street"){echo "selected"; }?>>Hong Kong Street</option>
                                <option value="Amsterdam Street" <?php if($brand_street == "Amsterdam Street"){echo "selected"; }?>>Amsterdam Street</option>
                                <option value="Portugal Street" <?php if($brand_street == "Portugal Street"){echo "selected"; }?>>Portugal Street</option>
                                <option value="San Francisco Street" <?php if($brand_street == "San Francisco Street"){echo "selected"; }?>>San Francisco Street</option>
                                <option value="Athens Street" <?php if($brand_street == "Athens Street"){echo "selected"; }?>>Athens Street</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-6">
                            <select name="" id="" class="select">
                                <option disabled="" selected>Short By</option>
                                <option value="A-Z">A-Z</option>
                                <option value="Z-A">Z-A</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-8 justify-content-center mx-auto">
                            <select name="" id="" class="select">
                                <option disabled="" selected>FILTER</option>
                                <?php if(!empty($filter)){ foreach($filter as $filters){?>
                                    <option value="<?php echo $filters['id'];?>"><?php echo $filters['name'];?></option>
                                <?php } }?>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-10">
                    <div class="row">
                    <?php if(!empty($brand)){ foreach($brand as $brands){?>
                        <div class="col-md-3 col-6">
                            <div class="product-box">
                                <a href="<?php echo base_url('brand/'.$brands['brand_id']); ?>"></a>
                                <figure><img src="<?php echo base_url('assets/images/public/brand/'.$brands['brand_logo']); ?>" alt="<?php echo $brands['logo_message'];?>" class=""></figure>
                                <div class="name"><?php echo $brands['brand_name'];?></div>
                                <div class="addrs"><img src="<?php echo base_url(); ?>assets/images/public/brand/map.svg" alt="" class=""><?php echo $brands['brand_location'];?></div>
                                
                            </div>
                        </div>
                    <?php } }?>  
                        <div class="col-md-12">
                            <a href="" class="d-table mx-auto primary-btn">LOAD MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="about-brand gray-bg  pb-30 pt-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 px-lg-5 wow fadeInDown animated">Discounts & Offers</h5>
                    <div class="v-line d-table mx-auto my-4"></div>
                </div>
            </div>

        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div id="carouselExampleControls" class="carousel slide wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.5s" data-bs-ride="carousel">
                        <div class="carousel-inner">
                        <?php if(!empty($brand_offers)) { $i=1; foreach($brand_offers as $offers){?>
                            <div class="carousel-item <?php if($i==1){echo "active"; }?>">
                                <div class="row justify-content-center">
                                    <div class="col-md-12 position-relative">
                                        <figure> <img src="<?php echo base_url('assets/images/public/brand/'.$offers['offer_thumbnail']); ?>" alt="<?php echo $offers['thumbnail_alt'];?>" class=""></figure>
                                        <div class="card  border-0 rounded-0">
                                            <div class="row">
                                                <div class="col-md-4 ">
                                                </div>
                                                <div class="col-md-8 ">
                                                    <p><?php echo $offers['about_offer'];?> </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php $i++; } }?>
                        </div>
                        <div class="crsouls-btn-group">
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <img src="<?php echo base_url(); ?>assets/images/public/brand/left.svg" alt="" class="">
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <img src="<?php echo base_url(); ?>assets/images/public/brand/right.svg" alt="" class="">
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="whats-new py-60 pb-sm-30 gray-bg ">
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
                            <?php if(!empty($what_new)){$i = 1; foreach($what_new as $new){?>
                            <div class="carousel-item <?php if($i == 1){echo "active";}?>">
                                <div class="row flex-fill">
                                    <div class="col-md-6 pe-4 d-flex flex-fill">
                                        <div class="card d-flex flex-fill flex-column align-items-center justify-content-center border-0 rounded-0" style="background-color: #5A946E;">
                                            <h2 class="fz40 fz24-sm pr-font text-white"><?php echo $new['brand_name']; ?></h2>
                                            <p class="text-white text-center fz20 fw-5 mt-40 mb-0"><?php echo $new['about_brand']; ?> </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="img-box positon-relative">
                                            <img src="<?php echo base_url('assets/images/public/brand/'.$new['banner_web']); ?>" alt="<?php echo $new['banner_comment']; ?>" class="d-table ml-auto">
                                            <div class="brnad-logo">
                                                <img src="<?php echo base_url('assets/images/public/brand/'.$new['brand_logo']); ?>" alt="<?php echo $new['logo_message']; ?>" class="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; } }?>
                        </div>
                        <div class="car-ions">
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <img src="<?php echo base_url(); ?>assets/images/public/brand/left.svg" alt="" class="">

                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <img src="<?php echo base_url(); ?>assets/images/public/brand/right.svg" alt="" class="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="find-us py-60 py-sm-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">Find Us</h5>

                    <div class="v-line d-table mx-auto my-4"></div>
                </div>
            </div>
            <div class="row mt-4 d-flex flex-fill">
                <div class="col-md-1"></div>
                <div class="col-md-6 d-flex flex-fill pe-md-5">
                    <!-- <figure class="mb-0 w-100 d-flex flex-fill"><img src="<?php echo base_url(); ?>assets/images/public/street/map.jpg" alt="" class="w-100"></figure> -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14040.246250040547!2d77.3528947!3d28.3872085!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5ba6ea082ef6bf15!2sOmaxe%20World%20Street!5e0!3m2!1sen!2spl!4v1605103931187!5m2!1sen!2spl" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-md-4 d-flex flex-fill">
                    <div class="card ath-bg px-40 py-40 rounded-0 border-0 wow fadeInRight animated">
                        <img src="<?php echo base_url(); ?>assets/images/public/home/at-s.svg" alt="">
                        <p class="fz20 text-white text-center mt-30">Wander by foot into the heart of the Athens. Start discovering your own world within ours at World Street.</p>
                        <img src="<?php echo base_url(); ?>assets/images/public/street/as-i.svg" alt="" class="d-table mx-auto mt-30">
                    </div>
                </div>
                <div class="col-md-1"></div>
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