$(document).ready(function() {
    const url = $('body').data('url');

    $('#contact').submit(function(e) {
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
                    setTimeout(function() { window.location.replace(url + 'contact-us'); }, 2000);
                } else {
                    $.notify(data.message, "error");
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#contact input[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                        $('#contact select[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                        $('#contact textarea[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                    });
                }
            }
        });
    });

});