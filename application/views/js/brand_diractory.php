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
        navText: ["<img src='<?php echo BASE_URL(); ?>assets/images/public/brand/right.svg'>", "<img src='<?php echo BASE_URL(); ?>assets/images/public/brand/right.svg'>"],
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
        navText: ["<img src='<?php echo BASE_URL(); ?>assets/images/public/brand/right.svg'>", "<img src='<?php echo BASE_URL(); ?>assets/images/public/brand/right.svg'>"],
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
    $('.more-slider').on('initialized.owl.carousel changed.owl.carousel', function(e) {
        if (!e.namespace) {
            return;
        }
        var carousel = e.relatedTarget;
        $('.more-counter').html(carousel.relative(carousel.current()) + 1 + '<span></span>' + carousel.items().length);
    }).owlCarousel({
        items: 0,
        navText: ["<img src='<?php echo BASE_URL(); ?>assets/images/public/brand/right.svg'>", "<img src='<?php echo BASE_URL(); ?>assets/images/public/brand/right.svg'>"],
        loop: true,
        margin: 40,
        autoplayTimeout: 1000,
  smartSpeed: 1000,
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
<style type="text/css">
    .select2-results:click ul{
       height: 200px;
  opacity: 1;
  transform: translateY(0);
    }
</style>
<script>
    $(document).ready(function(){
        $('.select').select2();
        
        // $('.select2-selection').click( function(){
        //     alert('sfsdf');
        //     // $('.select2-results').ḥide();
        //     $('.select2-results').show('slow');
        // });

    });


    $(document).ready(function() {
    
  $(".select").each(function() {
    var $slide = $(this),
        $select = $slide.find('.js-source-states'),
        animationName = $slide.find('h6').text();
    
    $select.select2({
      placeholder: "Select a state",
      dropdownParent: $slide,
      data: select2Data,
      minimumResultsForSearch: -1,
      dropdownPosition: 'below'
    }).on('select2:open', function(e){
        $slide.find('.select2-dropdown').addClass('animated ' + animationName);
    }).on('select2:closing', function(e){
      // if removed, for some examples, the Select2 will not highlight the selected element
      $slide.find('.select2-dropdown').removeClass('animated ' + animationName);
    });
    
  });
  
});


</script>

<script>
    $(document).ready(function(){
        const base_url = $('body').data('url');
        $('#street').change(function(){

          $(this).addClass('active');
            get_brands();
        });

        $('#sort').change(function(){
            get_brands();
            $(this).addClass('active');
        });

        
        $('.primary-btn').click(function(){
            var street = $('#street').val();
            var sort = $('#sort').val();
            var filter = $('#filter').val();
            var limit = $('#limit').val();
            var letter=$('.letter.active').data('letter');
            var category = $('.category.active').data('category');
            var url_cat = $('#url_cat').val();
            // console.log(limit);
            $('#brand').empty();
            $.ajax({
                type:'post',
                url:'<?php echo base_url('search-brand')?>',
                data:{street:street, sort:sort,filter:filter,limit:limit,letter:letter,category:category,url_cat:url_cat},
                dataType:'json',
                success:function(data){
                    if(data.brand != ''){
                        $.each(data.brand,function(i,v){
                            var value = '<div class="col-md-3 col-6">';
                            value += '<div class="product-box">';
                            value += "<a href='"+base_url+"brand/"+v.brand_slug+"'></a>";
                            value += "<figure><img src='"+base_url+"/assets/images/public/brand/"+v.brand_logo+"' alt='"+v.logo_message+"'></figure>";
                            value += '<div class="name">'+v.brand_name+'</div>';
                            value += '<div class="addrs"><img src="'+base_url+'assets/images/public/brand/map.svg" alt="" class="">'+v.brand_location+', '+v.brand_street+'</div>';
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
                    } else {
                        $('#brand').html('<div class="product-search-alert"><p>Sorry, we are not able to find any search results</p><div>');
                    }
                }
            })
        });

        $('.letter').click(function(){
             $(this).toggleClass("active");   
            $('.letter').not(this).removeClass('active');
            var street = $('#street').val();
            var sort = $('#sort').val();
            var filter = $('#filter').val();
            var limit = $('#limit').val();
            var letter=$('.letter.active').data('letter');
            var category = $('.category.active').data('category');
            var url_cat = $('#url_cat').val();
           
            $('#brand').empty();
            $.ajax({
                type:'post',
                url:'<?php echo base_url('search-brand')?>',
                data:{street:street, sort:sort,filter:filter,limit:limit,letter:letter,category:category,url_cat:url_cat},
                dataType:'json',
                success:function(data){
                    if(data.brand != ''){
                        $.each(data.brand,function(i,v){
                            var value = '<div class="col-md-3 col-6">';
                            value += '<div class="product-box">';
                            value += "<a href='"+base_url+"brand/"+v.brand_slug+"'></a>";
                            value += "<figure><img src='"+base_url+"/assets/images/public/brand/"+v.brand_logo+"' alt='"+v.logo_message+"'></figure>";
                            value += '<div class="name">'+v.brand_name+'</div>';
                            value += '<div class="addrs"><img src="'+base_url+'assets/images/public/brand/map.svg" alt="" class="">'+v.brand_location+','+v.brand_street+'</div>';
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
                    } else {
                        $('#brand').html('<div class="product-search-alert"><p>Sorry, we are not able to find any search results</p><div>');
                        $('#load_btn').css('display','none');
                    }
                }
            })
        });

        $('.category').click(function(){
              $(this).toggleClass("active");
            $('.category').not(this).removeClass('active');
            var street = $('#street').val();
            var sort = $('#sort').val();
            var filter = $('#filter').val();
           var category = $('.category.active').data('category');
            var letter=$('.letter.active').data('letter');
            var url_cat = $('#url_cat').val();
          
            var limit = $('#limit').val();
            $('#brand').empty();
            $.ajax({
                type:'post',
                url:'<?php echo base_url('search-brand')?>',
                
                data:{street:street, sort:sort,filter:filter,limit:limit,letter:letter,category:category,url_cat:url_cat},
                dataType:'json',
                success:function(data){
                    if(data.brand != ''){
                        $.each(data.brand,function(i,v){
                            var value = '<div class="col-md-3 col-6">';
                            value += '<div class="product-box">';
                            value += "<a href='"+base_url+"brand/"+v.brand_slug+"'></a>";
                            value += "<figure><img src='"+base_url+"/assets/images/public/brand/"+v.brand_logo+"' alt='"+v.logo_message+"'></figure>";
                            value += '<div class="name">'+v.brand_name+'</div>';
                            value += '<div class="addrs"><img src="'+base_url+'assets/images/public/brand/map.svg" alt="" class="">'+v.brand_location+','+v.brand_street+'</div>';
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
                    } else {
                        $('#brand').html('<div class="product-search-alert"><p>Sorry, we are not able to find any search results</p><div>');
                        $('#load_btn').css('display','none');
                    }
                }
            })
        });

        $('#filter').change(function(){
            get_brands();
            $(this).addClass('active');
        });

        function get_brands(){
            var street = $('#street').val();
            var sort = $('#sort').val();
            var filter = $('#filter').val();
            var limit = $('#limit').val();
            var letter=$('.letter.active').data('letter');
            var category = $('.category.active').data('category')
            var url_cat = $('#url_cat').val();
            $('#brand').empty();
            $.ajax({
                type:'post',
                url:'<?php echo base_url('search-brand')?>',
                data:{street:street, sort:sort,filter:filter,limit:limit,letter:letter,category:category,url_cat:url_cat},
                dataType:'json',
                success:function(data){
                    if(data.brand != ''){
                        $.each(data.brand,function(i,v){
                            var value = '<div class="col-md-3 col-6">';
                            value += '<div class="product-box">';
                            value += "<a href='"+base_url+"brand/"+v.brand_slug+"'></a>";
                            value += "<figure><img src='"+base_url+"/assets/images/public/brand/"+v.brand_logo+"' alt='"+v.logo_message+"'></figure>";
                            value += '<div class="name">'+v.brand_name+'</div>';
                            value += '<div class="addrs"><img src="'+base_url+'assets/images/public/brand/map.svg" alt="" class="">'+v.brand_location+','+v.brand_street+'</div>';
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
                    } else {
                        $('#brand').html('<div class="product-search-alert"><p>Sorry, we are not able to find any search results</p><div>');
                        $('#load_btn').css('display','none');
                    }
                    
                }
            })
        }
    });
</script>