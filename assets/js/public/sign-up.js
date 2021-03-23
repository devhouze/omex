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
                    $('#thanksmodal').modal('show');
                    $('#sign-up').trigger('reset');
                    $('.success_msg').html('Thank You! You have successfully signed up for WS Updates.');
                    $('#thanksmodal').modal('show');
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

    $('#register').submit(function(e) {
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
                    $('.success_msg').html('Thank You! You have successfully registered.');
                    $('#thanksmodal').modal('show');
                    $('#registernow').modal('hide');
                    $('#registernow').trigger('reset');
                    // $.notify(data.message, "success");
                } else {
                    // $.notify(data.message, "error");
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#register input[name="' + i + '"]').after('<span class="errors_msg">' + v + '</span>');
                        $('#register textarea[name="' + i + '"]').after('<span class="errors_msg">' + v + '</span>');
                    });
                }
            }
        });
    });

});