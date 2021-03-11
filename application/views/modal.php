<div class="modal fade expoler-modal" id="eatModal" tabindex="-1" aria-labelledby="eatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-zoom modal-sm">
        <div class="modal-content" style="background-image: url('<?php echo BASE_URL(); ?>assets/images/public/home/modal.jpg');">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0">Eat</h5>
                <img src="<?php echo BASE_URL(); ?>assets/images/public/home/flower.svg" alt="" class="d-table mx-auto" data-aos="zoom-in" data-aos-duration="2000">
                <ul id="eat">

                </ul>
                <a href="<?php echo base_url('brand-directory'); ?>" class="exploer-btn">VIEW MORE <img src="<?php echo BASE_URL(); ?>assets/images/public/home/ex-arow.svg" alt="" class="ml-4"></a>
            </div>

        </div>
    </div>
</div>

<div class="modal fade expoler-modal" id="styleModal" tabindex="-1" aria-labelledby="styleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-zoom modal-sm">
        <div class="modal-content" style="background-image: url('<?php echo BASE_URL(); ?>assets/images/public/home/modal.jpg');">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0">Style</h5>
                <img src="<?php echo BASE_URL(); ?>assets/images/public/home/flower.svg" alt="" class="d-table mx-auto" data-aos="zoom-in" data-aos-duration="2000">
                <ul id="style">

                </ul>
                <a href="<?php echo base_url('brand-directory'); ?>" class="exploer-btn">VIEW MORE <img src="<?php echo BASE_URL(); ?>assets/images/public/home/ex-arow.svg" alt="" class="ml-4"></a>
            </div>

        </div>
    </div>
</div>

<div class="modal fade expoler-modal" id="playModal" tabindex="-1" aria-labelledby="playModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-zoom modal-sm">
        <div class="modal-content" style="background-image: url('<?php echo BASE_URL(); ?>assets/images/public/home/modal.jpg');">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0">Play</h5>
                <img src="<?php echo BASE_URL(); ?>assets/images/public/home/flower.svg" alt="" class="d-table mx-auto" data-aos="zoom-in" data-aos-duration="2000">
                <ul id="play">

                </ul>
                <a href="<?php echo base_url('brand-directory'); ?>" class="exploer-btn">VIEW MORE <img src="<?php echo BASE_URL(); ?>assets/images/public/home/ex-arow.svg" alt="" class="ml-4"></a>
            </div>

        </div>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#image-modal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="image-modal" tabindex="-1" aria-labelledby="image-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</div>