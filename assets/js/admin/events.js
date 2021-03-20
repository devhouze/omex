$(document).ready(function() {
    const url = $('body').data('url');
    const base_url = $('body').data('base_url');

    $('#date_availibility').change(function() {
        var option = $('#date_availibility option:selected').val();
        if (option == "0") {
            $('.date').css('display', 'block');
            $('.start_time').css('display', 'block');
            $('.end_time').css('display', 'block');
        } else {
            $('.date').css('display', 'none');
            $('.start_time').css('display', 'none');
            $('.end_time').css('display', 'none');
        }
    });

    $('.delete').click(function() {
        var event_id = $(this).data('id');
        if (confirm('Do you want to delete this event?')) {
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
                var event_name = data.event_name;
                var start_date = (data.start_date != '') ? data.start_date : 'N/A';
                var end_date = (data.end_date != '') ? data.end_date : 'N/A';
                var event_end_time = data.event_end_time;
                var event_start_time = data.event_start_time;
                var event_street = data.event_street;
                var event_location = data.event_location;
                var event_type = data.event_type;
                var about_event = data.about_event;
                var event_category = data.event_category;
                var show_brand = (data.show_brand == 0) ? 'Yes' : 'No';
                var brand_name = (data.brand_name != '') ? data.brand_name : 'N/A';
                var event_label = data.event_label;
                var status = data.status;
                var thumbnail_image = data.thumbnail_image;
                var date_available = (data.date_available == 0) ? 'Yes' : 'No';
                value = '';
                value += '<table class="table">';
                value += '<tr><th colspan="2" class="text-center">Event Details</th></tr>';
                value += '<tr><th>Event Name</th><td>' + event_name + '</td><th>About Event</th><td>' + about_event + '</td></tr>';
                // value += '<tr><th>Date Availibilty</th><td>' + date_available + '</td></tr>';
                value += '<tr><th>Event Start Date</th><td>' + start_date + '</td><th>Event End Date</th><td>' + end_date + '</td></tr>';
                value += '<tr><th>Event Start Time</th><td>' + event_start_time + '</td><th>Event End Time</th><td>' + event_end_time + '</td></tr>';
                // value += '<tr><th>Event Type</th><td>' + event_type + '</td></tr>';
                value += '<tr><th>Event Street</th><td>' + event_street + '</td><th>Event Location</th><td>' + event_location + '</td></tr>';
                value += '<tr><th>Event Label</th><td>' + event_label + '</td><th>Event Category</th><td>' + event_category + '</td></tr>';
                // value += '<tr><th>Event Status</th><td>' + status + '</td></tr>';
                value += '<tr><th>Event Status</th><td colspan="3"><img src="' + base_url + 'assets/images/public/home/' + thumbnail_image + '" width="200px" height="200px"></td></tr>';
                $('#details').html(value);
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
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        $('.btn-primary').html('<i class="fa fa-spinner fa-spin"></i>Loading');
        $('.submit-form').prop("disabled", true);

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
                    setTimeout(function() {
                        window.location.replace(url + 'events');
                        $('.btn-primary').text('Save');
                    }, 2000);

                } else {
                    $.notify(data.message, "error");
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#events_management input[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                        $('#events_management select[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                    });
                    $('.btn-primary').text('Save');
                    $('.submit-form').removeAttr('disabled');
                }
            }
        });
    });
});