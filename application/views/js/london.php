<script>
    $('.slider').on('initialized.owl.carousel changed.owl.carousel', function(e) {
        if (!e.namespace) {
            return;
        }
        var carousel = e.relatedTarget;
        $('.slider-counter').html(carousel.relative(carousel.current()) + 1 + '<span></span>' + carousel.items().length);
    }).owlCarousel({
        items: 0,
        navText: ["<img src='<?php echo BASE_URL(); ?>assets/images/public/street/london-left.svg'>", "<img src='<?php echo BASE_URL(); ?>assets/images/public/street/london-right.svg'>"],
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
    $('.sliders').on('initialized.owl.carousel changed.owl.carousel', function(e) {
        if (!e.namespace) {
            return;
        }
        var carousel = e.relatedTarget;
        $('.slider-counter').html(carousel.relative(carousel.current()) + 1 + '<span></span>' + carousel.items().length);
    }).owlCarousel({
        items: 0,
        navText: ["<img src='<?php echo BASE_URL(); ?>assets/images/public/street/london-left.svg'>", "<img src='<?php echo BASE_URL(); ?>assets/images/public/street/london-right.svg'>"],
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
                items: 3
            }
        }

    });
</script>
