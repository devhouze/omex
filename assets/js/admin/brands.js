$(document).ready(function() {
    const url = $('body').data('url');

    $('.show_brand_offers').change(function() {
        var option = $("input:radio.show_brand_offers:checked").val();
        if (option == 'Yes') {
            $('.brand_offer').css('display', 'block');
        } else {
            $('.brand_offer').css('display', 'none');
        }
    });

    $('#brand_management').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            type: 'post',
            url: form.attr('action'),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            data: new FormData(this),
            success: function(data) {
                $('.errors_msg').empty();
                var data = $.parseJSON(data);
                if (data.status > 0) {
                    $.notify(data.message, "success");
                    setTimeout(function() { window.location.replace(url + 'events'); }, 2000);
                } else {
                    $.notify(data.message, "error");
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#brand_management .' + i + '').html(v);
                        $('#brand_management select[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                        $('#brand_management textarea[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                    });
                }
            }
        });
    });
});