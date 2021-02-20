$(document).ready(function() {
    const url = $('body').data('url');

    $('#admin_profile').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            type: 'post',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(data) {
                $('.errors_msg').remove();
                var data = $.parseJSON(data);
                if (data.status > 0) {
                    $.notify(data.message, "success");
                    setTimeout(function() { window.location.replace(url + 'dashboard'); }, 2000);
                } else {
                    $.notify(data.message, "error");
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#admin_profile input[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                    });
                }
            }
        });
    });


    $('#change_password').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            type: 'post',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(data) {
                $('.errors_msg').remove();
                var data = $.parseJSON(data);
                if (data.status > 0) {
                    $.notify(data.message, "success");
                    setTimeout(function() { window.location.replace(url + 'dashboard'); }, 2000);
                } else {
                    $.notify(data.message, "error");
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#change_password input[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                    });
                }
            }
        });
    });
});