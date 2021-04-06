<script>
$('.slider_ext').on('initialized.owl.carousel changed.owl.carousel', function(e) {
    if (!e.namespace)  {
      return;
    }
    var carousel = e.relatedTarget;
    $('.counter_ext').html(carousel.relative(carousel.current()) + 1 + '<span></span>' + carousel.items().length);
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
$('.sliders_con').on('initialized.owl.carousel changed.owl.carousel', function(e) {
    if (!e.namespace)  {
      return;
    }
    var carousel = e.relatedTarget;
    $('.counter_con').html(carousel.relative(carousel.current()) + 1 + '<span></span>' + carousel.items().length);
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
$('.sliders_video').on('initialized.owl.carousel changed.owl.carousel', function(e) {
    if (!e.namespace)  {
      return;
    }
    var carousel = e.relatedTarget;
    $('.counter-video').html(carousel.relative(carousel.current()) + 1 + '<span></span>' + carousel.items().length);
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
$('.slider').on('initialized.owl.carousel changed.owl.carousel', function(e) {
    if (!e.namespace)  {
      return;
    }
    var carousel = e.relatedTarget;
    $('.counter-all').html(carousel.relative(carousel.current()) + 1 + '<span></span>' + carousel.items().length);
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
    $('.counter_in').html(carousel.relative(carousel.current()) + 1 + '<span></span>' + carousel.items().length);
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
const url = $('body').data('url');
$(document).on('click','.exploer-btn',function(){
  var type = $(this).data('type');

  $.ajax({
    type:'post',
    url:'<?php echo base_url('get-brands');?>',
    data:{type:type},
    success:function(data){
      var data = $.parseJSON(data);
      value = '';
      if(data.length != 0){
        $.each(data,function(i,v){
        value += '<li><a href="'+url+'brand/'+v.brand_slug+'"></a><img src="'+url+'assets/images/public/brand/'+v.brand_logo+'" alt="'+v.logo_message+'"></li>';
      });

        $('#'+type+'Modal').modal('show');
      }else{
        $('#'+type+'Modal').modal('hide');
        value += '<h4>No Data</h4>';
        window.location.href = "brand-directory/"+type;
      }

      if(type == "eat"){
        $('#eat').empty();
        $('#eat').append(value);
      }
      if(type == "style"){
        $('#style').empty();
        $('#style').append(value);
      }
      if(type == "play"){
        $('#play').empty();
        $('#play').append(value);
      }
    }
  })
});
</script>

<script type="text/javascript">
    $('.all,.interior,.exterior,.construction').click(function(){

       var id=$(this).data('one');
       $('.carousel-item').removeClass("active");
       $('#'+id).addClass("active");

    });
</script>