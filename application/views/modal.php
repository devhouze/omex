<div class="modal fade expoler-modal" id="eatModal" tabindex="-1" aria-labelledby="eatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-zoom ">
        <div class="modal-content" style="background-image: url('<?php echo BASE_URL(); ?>assets/images/public/home/eat.jpg');">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0">Eat</h5>
                <img src="<?php echo BASE_URL(); ?>assets/images/public/home/flower.svg" alt="" class="set-src d-table mx-auto" data-aos="zoom-in" data-aos-duration="2000">
                <ul id="eat">
                </ul>
                <a href="<?php echo base_url('brand-directory/eat'); ?>" class="exploer-btn-modal">VIEW MORE <img src="<?php echo BASE_URL(); ?>assets/images/public/home/ex-arow.svg" alt="" class="ms-2"></a>
            </div>

        </div>
    </div>
</div>

<div class="modal fade expoler-modal" id="styleModal" tabindex="-1" aria-labelledby="styleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-zoom">
        <div class="modal-content" style="background-image: url('<?php echo BASE_URL(); ?>assets/images/public/home/modal.jpg');">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0">Style</h5>
                <img src="<?php echo BASE_URL(); ?>assets/images/public/home/flower.svg" alt="" class="set-src d-table mx-auto" data-aos="zoom-in" data-aos-duration="2000">
                <ul id="style">

                </ul>
                <a href="<?php echo base_url('brand-directory/style'); ?>" class="exploer-btn-modal">VIEW MORE <img src="<?php echo BASE_URL(); ?>assets/images/public/home/ex-arow.svg" alt="" class="ms-2"></a>
            </div>

        </div>
    </div>
</div>

<div class="modal fade expoler-modal" id="playModal" tabindex="-1" aria-labelledby="playModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-zoom">
        <div class="modal-content" style="background-image: url('<?php echo BASE_URL(); ?>assets/images/public/home/play.jpg');">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-0">Play</h5>
                <img src="<?php echo BASE_URL(); ?>assets/images/public/home/flower.svg" alt="" class="set-src d-table mx-auto" data-aos="zoom-in" data-aos-duration="2000">
                <ul id="play">

                </ul>
                <a href="<?php echo base_url('brand-directory/play'); ?>" class="exploer-btn-modal">VIEW MORE <img src="<?php echo BASE_URL(); ?>assets/images/public/home/ex-arow.svg" alt="" class="ms-2"></a>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="image-modal" tabindex="-1" aria-labelledby="image-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                <div id="all_images" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    <?php if (!empty($all_gallery)) { $i=1; foreach ($all_gallery as $gallery) { ?>
                        <div class="carousel-item <?php if($i==1){echo "active";} $i;?>" id="<?php echo $i; ?>">
                            <img src="<?php echo base_url('assets/images/public/home/' . $gallery['media_name']); ?>" class="d-block w-100" alt="...">
                        </div>
                        <?php $i++; } } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#all_images" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#all_images" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="interior-image-modal" tabindex="-1" aria-labelledby="interior-image-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                <div id="interior_images" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    <?php if (!empty($interior_gallery)) { $i=1; foreach ($interior_gallery as $interior) { ?>
                        <div class="carousel-item <?php if($i==1){echo "active";} $i;?>" id="<?php echo $i; ?>a">
                            <img src="<?php echo base_url('assets/images/public/home/' . $interior['media_name']); ?>" class="d-block w-100" alt="...">
                        </div>
                        <?php $i++; } } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#interior_images" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#interior_images" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="exterior-image-modal" tabindex="-1" aria-labelledby="exterior-image-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                <div id="exterior_images" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    <?php if (!empty($exterior_gallery)) { $i=1; foreach ($exterior_gallery as $exterior) { ?>
                        <div class="carousel-item <?php if($i==1){echo "active";} $i;?>" id="<?php echo $i; ?>b">
                            <img src="<?php echo base_url('assets/images/public/home/' . $exterior['media_name']); ?>" class="d-block w-100" alt="...">
                        </div>
                        <?php $i++; } } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#exterior_images" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#exterior_images" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="construction-image-modal" tabindex="-1" aria-labelledby="construction-image-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                <div id="construction_images" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    <?php if (!empty($construction_gallery)) { $i=1; foreach ($construction_gallery as $construction) { ?>
                        <div class="carousel-item <?php if($i==1){echo "active";} $i;?>" id="<?php echo $i; ?>c">
                            <img src="<?php echo base_url('assets/images/public/home/' . $construction['media_name']); ?>" class="d-block w-100" alt="...">
                        </div>
                        <?php $i++; } } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#construction_images" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#construction_images" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script>
$(function() {
  $('.all').on('click', function(event) {
    //Gets the Item that was clicked
    var $this = $(event.currentTarget);
    $('#image-modal').modal('show');
    //Use the slide number of the clicked Item to open the slide on the carousel
    $('#all_images').carousel($this.data('slide'));
  });

  $('.interior').on('click', function(event) {
    //Gets the Item that was clicked
    var $this = $(event.currentTarget);
    $('#interior-image-modal').modal('show');
    //Use the slide number of the clicked Item to open the slide on the carousel
    $('#interior_images').carousel($this.data('slide'));
  });

  $('.exterior').on('click', function(event) {
    //Gets the Item that was clicked
    var $this = $(event.currentTarget);
    $('#exterior-image-modal').modal('show');
    //Use the slide number of the clicked Item to open the slide on the carousel
    $('#exterior_images').carousel($this.data('slide'));
  });

  $('.construction').on('click', function(event) {
    //Gets the Item that was clicked
    var $this = $(event.currentTarget);
    $('#construction-image-modal').modal('show');
    //Use the slide number of the clicked Item to open the slide on the carousel
    $('#construction_images').carousel($this.data('slide'));
  });
});
</script>

<script type="text/javascript">
    $('.exploer-btn').click(function(){
        var src=$('.get-src').attr('src');
        $('.set-src').attr("src",src);
    });
</script>