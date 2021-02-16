
<script>

$('.slider').on('initialized.owl.carousel changed.owl.carousel', function(e) {
    if (!e.namespace)  {
      return;
    }
    var carousel = e.relatedTarget;
    $('.slider-counter').text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
  }).owlCarousel({
    items: 0,
    navText:["<img src='<?php echo BASE_URL(); ?>assets/images/public/home/left.svg'>","<img src='<?php echo BASE_URL(); ?>assets/images/public/home/right.svg'>"],
    loop:true,
    margin:40,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }

  });
</script>
<script>

$('.sliders').on('changed.owl.carousel', function(e) {
    if (!e.namespace)  {
      return;
    }
    var carousel = e.relatedTarget;
    $('.slider-counters').text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
  }).owlCarousel({
    items: 0,
    navText:["<img src='<?php echo BASE_URL(); ?>assets/images/public/home/left.svg'>","<img src='<?php echo BASE_URL(); ?>assets/images/public/home/right.svg'>"],
    loop:true,
    margin:40,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }

  });
</script>
<script>
  $('.top-brand').owlCarousel({
    loop:true,
    dots:false,
    nav:true,
    navText:["<img src='<?php echo BASE_URL(); ?>assets/images/public/home/left.svg'>","<img src='<?php echo BASE_URL(); ?>assets/images/public/home/right.svg'>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
<script>
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 40) {
            //clearHeader, not clearheader - caps H
            $(".header").addClass("sticky");
        } else {
            $(".header").removeClass("sticky");
        }

    });
    </script>