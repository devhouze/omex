<script>
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 41) {
            //clearHeader, not clearheader - caps H
            $(".header").addClass("sticky");
        } else {
            $(".header").removeClass("sticky");
        }

    });
    </script>