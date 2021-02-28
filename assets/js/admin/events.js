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

    $('.delete').click(function() {
        var event_id = $(this).data('id');
        if (confirm('Do you want to delte this event?')) {
            $.ajax({
                type: 'post',
                url: url + 'delete-event',
                data: { event_id: event_id },
                success: function(data) {
                    var data = $.parseJSON(data);
                    if (data.status > 0) {
                        $.notify(data.message, "success");
                        setTimeout(function() { window.location.reload(); }, 2000);
                    } else {
                        $.notify(data.message, "error");
                    }
                }
            });
        }
    });

    $('.view_detail').click(function() {
        var event_id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: url + 'event-details',
            data: { event_id: event_id },
            success: function(data) {
                var data = $.parseJSON(data);
                if (data.status > 0) {
                    $.notify(data.message, "success");
                    setTimeout(function() { window.location.reload(); }, 2000);
                } else {
                    $.notify(data.message, "error");
                }
            }
        });
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
            url: url + 'change-event-status',
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