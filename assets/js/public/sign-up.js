$(document).ready(function() {
    const url = $('body').data('url');

    $('#sign-up').submit(function(e) {
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
                    $('#success').css('display', 'block');
                    $('#sign-up').trigger('reset');
                    // $.notify(data.message, "success");
                } else {
                    // $.notify(data.message, "error");
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#sign-up input[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                    });
                }
            }
        });
    });

});