<script>
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 150) {
            //clearHeader, not clearheader - caps H
            $(".header").addClass("sticky");
        } else {
            $(".header").removeClass("sticky");
        }

    });
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
      $.each(data,function(i,v){
        value += '<li><a href="'+url+'brand/'+v.brand_id+'"></a><img src="'+url+'assets/images/public/brand/'+v.brand_logo+'" alt="'+v.logo_message+'"></li>';
      })
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