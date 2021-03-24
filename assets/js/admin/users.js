$(document).ready(function() {
    const url = $('body').data('url');

    // Check username availibilty
    $('.username').blur(function() {
        var username = $('.username').val();
        $.ajax({
            type: 'post',
            url: url + 'check-username',
            data: { username: username },
            success: function(data) {
                var data = $.parseJSON(data);
                $('.error').empty();
                if (data.status > 0) {
                    $('.error').html();
                    $('#submit').attr('disabled', false);
                    $.notify(data.message, "success");
                } else {
                    $('.error').html(data.message);
                    $('#submit').attr('disabled', 'disabled');
                    $.notify(data.message, "error");

                }
            }
        });
    });
    // Check username availibilty ends here

    $('.delete').click(function() {
        var user_id = $(this).data('id');
        if (confirm('Do you want to delete this user?')) {
            $.ajax({
                type: 'post',
                url: url + 'delete-user',
                data: { user_id: user_id },
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

    $(".chkstatus").click(function() {
        if ($(this).is(':checked')) {
            var status = 0;
        } else {
            status = 1;
        }
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: url + 'change-user-status',
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

    $('#user_management').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            type: 'post',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(data) {
                $('.error').remove();
                $('.errors_msg').remove();
                var data = $.parseJSON(data);
                if (data.status > 0) {
                    $.notify(data.message, "success");
                    setTimeout(function() { window.location.replace(url + 'users'); }, 2000);
                } else {
                    $.notify(data.message, "error");
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#user_management input[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                        $('#user_management select[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                    });
                }
            }
        });
    });
});