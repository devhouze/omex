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
    const base_url = $('body').data('url');
    $('#street').change(function(){
        get_brands();
    });

    $('#sort').change(function(){
        get_brands();
    });

    
    $('.primary-btn').click(function(){
        var street = $('#street').val();
        var sort = $('#sort').val();
        var filter = $('#filter').val();
        var limit = $('#limit').val();
        console.log(limit);
        $('#brand').empty();
        $.ajax({
            type:'post',
            url:'<?php echo base_url('search-brand')?>',
            data:{street:street, sort:sort,filter:filter,limit:limit},
            dataType:'json',
            success:function(data){
                $.each(data.brand,function(i,v){
                    var value = '<div class="col-md-3 col-6">';
                    value += '<div class="product-box">';
                    value += "<a href='"+base_url+"brand/"+v.brand_id+"'>";
                    value += "<figure><img src='"+base_url+"/assets/images/public/brand/"+v.brand_logo+"' alt='"+v.logo_message+"'></figure>";
                    value += '<div class="name">'+v.brand_name+'</div>';
                    value += '<div class="addrs"><img src="'+base_url+'assets/images/public/brand/map.svg" alt="" class="">'+v.brand_location+'</div>';
                    value += '</div>';
                    value += '</div>';
                    $('#brand').append(value);
                });
                $('#limit').val(data.limit);
                if(data.limit == ''){
                    $('#load_btn').css('display','none');
                } else {
                    $('#load_btn').css('display','block');
                }
            }
        })
    });

    $('.letter').click(function(){
        var street = $('#street').val();
        var sort = $('#sort').val();
        var filter = $('#filter').val();
        var letter = $(this).data('letter');
        var limit = $('#limit').val();
        $('#brand').empty();
        $.ajax({
            type:'post',
            url:'<?php echo base_url('search-brand')?>',
            data:{street:street, sort:sort,filter:filter,limit:limit,letter:letter},
            dataType:'json',
            success:function(data){
                $.each(data,function(i,v){
                    var value = '<div class="col-md-3 col-6">';
                    value += "<a href='"+base_url+"brand/"+v.brand_id+"'>";
                    value += "<figure><img src='"+base_url+"/assets/images/public/brand/"+v.brand_logo+"' alt='"+v.logo_message+"'></figure>";
                    value += '<div class="name">'+v.brand_name+'</div>';
                    value += '<div class="addrs"><img src="'+base_url+'assets/images/public/brand/map.svg" alt="" class="">'+v.brand_location+'</div>';
                    value += '</div>';
                    console.log(value);
                    $('#brand').append(value);
                });
            }
        })
    });

    $('#filter').change(function(){
        get_brands();
    });

    function get_brands(){
        var street = $('#street').val();
        var sort = $('#sort').val();
        var filter = $('#filter').val();
        var letter = $(this).data('letter');
        var category = $(this).val('category');
        var limit = $('#limit').val();
        $('#brand').empty();
        $.ajax({
            type:'post',
            url:'<?php echo base_url('search-brand')?>',
            data:{street:street, sort:sort,filter:filter,limit:limit,letter:letter},
            dataType:'json',
            success:function(data){
                $.each(data.brand,function(i,v){
                    var value = '<div class="col-md-3 col-6">';
                    value += "<a href='"+base_url+"brand/"+v.brand_id+"'>";
                    value += "<figure><img src='"+base_url+"/assets/images/public/brand/"+v.brand_logo+"' alt='"+v.logo_message+"'></figure>";
                    value += '<div class="name">'+v.brand_name+'</div>';
                    value += '<div class="addrs"><img src="'+base_url+'assets/images/public/brand/map.svg" alt="" class="">'+v.brand_location+'</div>';
                    value += '</div>';
                    console.log(value);
                    $('#brand').append(value);
                });
                $('#limit').val(data.limit);
                if(data.limit == ''){
                    $('#load_btn').css('display','none');
                } else {
                    $('#load_btn').css('display','block');
                }
            }
        })
    }
});
</script>