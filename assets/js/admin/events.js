$(document).ready(function() {
    const url = $('body').data('url');

    $('#date_availibility').change(function() {
        var option = $('#date_availibility option:selected').val();
        if (option == "0") {
            $('.date').css('display', 'block');
        } else {
            $('.date').css('display', 'none');
        }
    });

    $('#show_brand').change(function() {
        var option = $('#show_brand option:selected').val();
        if (option == "Yes") {
            $('.show_brand').css('display', 'block');
        } else {
            $('.show_brand').css('display', 'none');
        }
    });


    $('#events_management').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            type: 'post',
            url: form.attr('action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(data) {
                $('.errors_msg').remove();
                var data = $.parseJSON(data);
                if (data.status > 0) {
                    $.notify(data.message, "success");
                    setTimeout(function() { window.location.replace(url + 'events'); }, 2000);
                } else {
                    $.notify(data.message, "error");
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#events_management input[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                        $('#events_management select[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                    });
                }
            }
        });
    });
});