<script>
    $('.slider-web').on('initialized.owl.carousel changed.owl.carousel', function(e) {
        if (!e.namespace) {
            return;
        }
        var carousel = e.relatedTarget;
        $('.counter-web').html(carousel.relative(carousel.current()) + 1 + '<span></span>' + carousel.items().length);
    }).owlCarousel({
        items: 0,
        navText: ["<img src='<?php echo BASE_URL(); ?>assets/images/public/street/paris-left.svg'>", "<img src='<?php echo BASE_URL(); ?>assets/images/public/street/paris-right.svg'>"],
        loop: true,
        margin: 40,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 1
            }
        }

    });
</script>

<script>
    $('.slider-mob').on('initialized.owl.carousel changed.owl.carousel', function(e) {
        if (!e.namespace) {
            return;
        }
        var carousel = e.relatedTarget;
        $('.counter-mob').html(carousel.relative(carousel.current()) + 1 + '<span></span>' + carousel.items().length);
    }).owlCarousel({
        items: 0,
        navText: ["<img src='<?php echo BASE_URL(); ?>assets/images/public/street/paris-left.svg'>", "<img src='<?php echo BASE_URL(); ?>assets/images/public/street/paris-right.svg'>"],
        loop: true,
        margin: 40,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }

    });
</script>
<script>
    $('.more-slider').on('initialized.owl.carousel changed.owl.carousel', function(e) {
        if (!e.namespace) {
            return;
        }
        var carousel = e.relatedTarget;
        $('.more-counter').html(carousel.relative(carousel.current()) + 1 + '<span></span>' + carousel.items().length);
    }).owlCarousel({
        items: 0,
        navText: ["<img src='<?php echo BASE_URL(); ?>assets/images/public/street/paris-left.svg'>", "<img src='<?php echo BASE_URL(); ?>assets/images/public/street/paris-right.svg'>"],
        loop: true,
        margin: 40,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }

    });
</script>
