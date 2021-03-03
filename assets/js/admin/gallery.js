$(document).ready(function() {
    const url = $('body').data('url');

    $('#media_type').change(function() {
        var media_type = $('#media_type option:selected').val();

        if (media_type == 1 || media_type == 2) {
            $('#media').css('display', 'block');
        } else if (media_type == 3) {
            $('#youtube').css('display', 'block');
            $('#media').css('display', 'none');
        } else {
            $('#media').css('display', 'none');
            $('#youtube').css('display', 'none');
        }
    });

    $(".chkstatus").click(function() {
        if ($(this).is(':checked')) {
            var status = 0;
        } else {
            status = 1;
        }
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: url + 'change-gallery-status',
            data: { id: id, status: status },
            success: function(data) {
                var data = $.parseJSON(data);
                if (data.status > 0) {
                    $.notify(data.message, "success");
                } else {
                    $.notify(data.message, "error");
                }
            }
        });
    });

    $('#gallery_management').submit(function(e) {
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
                    setTimeout(function() { window.location.replace(url + 'gallery'); }, 2000);
                } else {
                    $.notify(data.message, "error");
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#gallery_management input[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                        $('#gallery_management select[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                    });
                }
            }
        });
    });
});