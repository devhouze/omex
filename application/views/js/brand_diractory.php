<script>
    $('.slider').on('initialized.owl.carousel changed.owl.carousel', function(e) {
        if (!e.namespace) {
            return;
        }
        var carousel = e.relatedTarget;
        $('.s_counder').html(carousel.relative(carousel.current()) + 1 + '<span></span>' + carousel.items().length);
    })
    .owlCarousel({
        items: 0,
        navText: ["<img src='<?php echo BASE_URL(); ?>assets/images/public/brand/left.svg'>", "<img src='<?php echo BASE_URL(); ?>assets/images/public/brand/right.svg'>"],
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
    $('.slider-mobb').on('initialized.owl.carousel changed.owl.carousel', function(e) {
        if (!e.namespace) {
            return;
        }
        var carousel = e.relatedTarget;
        $('.s_counders').html(carousel.relative(carousel.current()) + 1 + '<span></span>' + carousel.items().length);
    }).owlCarousel({
        items: 0,
        navText: ["<img src='<?php echo BASE_URL(); ?>assets/images/public/brand/left.svg'>", "<img src='<?php echo BASE_URL(); ?>assets/images/public/brand/right.svg'>"],
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
        $('.more-counter').html(carousel.relative(carousel.current()) + 1 + '<span></span>' + carousel.items().length);
    }).owlCarousel({
        items: 0,
        navText: ["<img src='<?php echo BASE_URL(); ?>assets/images/public/brand/left.svg'>", "<img src='<?php echo BASE_URL(); ?>assets/images/public/brand/right.svg'>"],
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
<script>
$(document).ready(function(){
    $('.select').select2();
});
</script>

<script>
$(document).ready(function(){
    $('#street'),change(function(){
        get_brands();
    });

    $('#sort'),change(function(){
        get_brands();
    });

    $('#filter'),change(function(){
        get_brands();
    });

    function get_brands(){
        var street = $('#street').val();
        var sort = $('#sort').val();
        var filter = $('#filter').val();

        $.ajax({
            type:'post',
            url:'<?php echo base_url('search-brand')?>',
            data:{street:street, sort:sort,filter:filter},
            dataType:'json',
            success:function(data){
                
            }
        })
    }
});
</script>