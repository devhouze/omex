<div class="what-banner d-md-block d-none" style="background-image: url(<?php echo base_url('assets/images/public/home/'.$whats_new['thumb_web']); ?>)">

</div>
<div class="what-banner-mob d-md-none d-block">
    <img src="<?php echo base_url('assets/images/public/home/'.$whats_new['thumb_mob']); ?>" alt="<?php echo $whats_new['alt_tag']?>">

</div>
<div class="about-event py-60 py-sm-30 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 positoin-relative">
                <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated"><?php echo $whats_new['name']; ?></h5>
                <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="d-table mx-auto wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="0.5S">
                <div class="v-line d-table mx-auto wow zoomIn animated" data-wow-duration="1s" data-wow-delay="1s"></div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10 wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="1s">
                <?php echo $whats_new['about'];?>
            </div>
        </div>
        <?php if($whats_new['show_reg_btn'] == 'Yes'){?>
        <div class="col-md-12 mt-5">
            <a href="" class="d-table mx-auto primary-btn" data-bs-toggle="modal" data-bs-target="#registernow">REGISTER NOW</a>
        </div>
        <?php }?>
    </div>
</div>
<div class="about-galary hello-area looking-out py-60 py-sm-30 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 positoin-relative">
                <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">Gallery</h5>
                <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="d-table mx-auto wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="0.5S">
                <div class="v-line d-table mx-auto wow zoomIn animated" data-wow-duration="1s" data-wow-delay="1s"></div>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-10 px-md-3 px-0">
                <div id="carouselExamControlss" class="carousel slide d-md-block d-none wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="2s" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    <?php if(!empty($gallery)){ $i = 1; foreach($gallery as $img){?>
                        <div class="carousel-item <?php if($i == 1){echo "active"; }?>">
                            <figure class="position-relative mb-0">
                                <img src="<?php echo BASE_URL('assets/images/public/home/'.$img['image_web']); ?>" alt="<?php echo $img['image_alt']?>" class="w-100">

                            </figure>
                        </div>
                    <?php $i++;} }?>


                    </div>
                    <?php if(count($gallery)>1){?>
                    <div class="d-flex position-absolute btn-controls">
                        <a class="carousel-control-prev" href="#carouselExamControlss" role="button" data-bs-slide="prev">
                            <img src="<?php echo BASE_URL(); ?>assets/images/public/what/left.svg" alt="" class="w-100">
                        </a>
                        <a class="carousel-control-next ml-40" href="#carouselExamControlss" role="button" data-bs-slide="next">
                            <img src="<?php echo BASE_URL(); ?>assets/images/public/what/right.svg" alt="" class="w-100">
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <div id="carouselExamControlssmob" class="carousel slide d-md-none d-block" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    <?php if(!empty($gallery)){ $i = 1; foreach($gallery as $img){?>
                        <div class="carousel-item <?php if($i == 1){echo "active"; }?>">
                            <figure class="position-relative mb-0">
                                <img src="<?php echo BASE_URL('assets/images/public/home/'.$img['image_mob']); ?>" alt="<?php echo $img['image_alt']?>" class="w-100">

                            </figure>
                        </div>
                    <?php $i++;} }?>

                    </div>
                    <?php if(count($gallery)>1){?>
                    <div class="d-flex position-absolute btn-controls">
                        <a class="carousel-control-prev" href="#carouselExamControlssmob" role="button" data-bs-slide="prev">
                            <img src="<?php echo BASE_URL(); ?>assets/images/public/what/left.svg" alt="" class="w-100">
                        </a>
                        <a class="carousel-control-next ml-40" href="#carouselExamControlssmob" role="button" data-bs-slide="next">
                            <img src="<?php echo BASE_URL(); ?>assets/images/public/what/right.svg" alt="" class="w-100">
                        </a>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="share-friends gray-bg pt-30 pb-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0 wow fadeInDown animated">Gallery</h5>
                <!-- https://www.facebook.com/omaxeworldsreet/ -->
                <img src="<?php echo base_url(); ?>assets/images/public/home/flower.svg" alt="" class="d-table mx-auto wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="0.5S">
                <ul class="share-links wow fadeInDown animated">
                    <li><a href="https://www.instagram.com/omaxeworldstreet/?hl=en" target="_blank"><img src="<?php echo base_url(); ?>assets/images/public/what/inst.svg" alt="instagram"></a></li>
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url(); ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/images/public/what/fb.svg" alt="facebook"></a></li>
                    <li><a href="whatsapp://send?text=<?php echo current_url();?>" data-action="share/whatsapp/share" target="_blank"><img src="<?php echo base_url(); ?>assets/images/public/what/what.svg" alt="whatsapp"></a></li>

                    <li></li>
            </div>
        </div>
    </div>
</div>

<!-- Modal to show register form -->
<div class="modal fade" id="registernow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">


                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="modal-body">
                    <form action="<?php echo base_url('whats-new-register')?>" method="post" id="register">
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
                        <input type="hidden" name="whats_new_name" value="<?php echo $whats_new['name']; ?>">
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