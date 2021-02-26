$(document).ready(function() {
    const url = $('body').data('url');

    $('.delete').click(function() {
        var lead_id = $(this).data('id');
        if (confirm('Do you want to delte this lead?')) {
            $.ajax({
                type: 'post',
                url: url + 'delete-lead',
                data: { lead_id: lead_id },
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

    $('#lead_management').submit(function(e) {
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
                    window.location.replace(url + 'leads');
                } else {
                    $.notify(data.message, "error");
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#lead_management input[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                    });
                }
            }
        });
    });
});