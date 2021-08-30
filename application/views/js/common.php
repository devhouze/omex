
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
  
  var segments = window.location.href.split( '/' );
  var street=segments[4];
  $.ajax({
    type:'post',
    url:'<?php echo base_url('get-brands-like');?>',
    data:{type:type,street:street},
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
        alert(value);
        window.location.href = "brand-directory/"+type+"/"+street;
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
