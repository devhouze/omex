$(document).ready(function() {
    const url = $('body').data('url');
    const base_url = $('body').data('base_url');

    $('.delete').click(function() {
        var whats_new_id = $(this).data('id');
        if (confirm('Do you want to delete this data?')) {
            $.ajax({
                type: 'post',
                url: url + 'delete-whats-new',
                data: { whats_new_id: whats_new_id },
                success: function(data) {
                    var data = $.parseJSON(data);
                    if (data.status > 0) {
                        $.notify(data.message, "success");
                        setTimeout(function() { window.location.reload(); }, 1000);
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
            url: url + 'change-whats-new-status',
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

    $('#whats_new_management').submit(function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        $('.btn-primary').html('<i class="fa fa-spinner fa-spin"></i>Loading');

        $('.submit-form').prop("disabled", true);
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
                $('.error').remove();
                $('.errors_msg').remove();
                var data = $.parseJSON(data);
                if (data.status > 0) {
                    $.notify(data.message, "success");
                    $('.btn-primary').text('Save');
                    setTimeout(function() { window.location.replace(url + 'whats-new'); }, 1000);
                } else {
                    $.notify(data.message, "error");
                    $('.btn-primary').text('Save');
                    $('.submit-form').removeAttr('disabled');
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#whats_new_management input[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                        $('#whats_new_management textarea[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                        $('.btn-primary').text('Save');
                        $('.submit-form').removeAttr('disabled');
                    });
                }
            }
        });
    });

    $('#whats_new_gallery_management').submit(function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        $('.btn-primary').html('<i class="fa fa-spinner fa-spin"></i>Loading');

        $('.submit-form').prop("disabled", true);
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
                $('.error').remove();
                $('.errors_msg').remove();
                var data = $.parseJSON(data);
                if (data.status > 0) {
                    $.notify(data.message, "success");
                    $('.btn-primary').text('Save');
                    setTimeout(function() { window.location.replace(url + 'whats-new-gallery'); }, 1000);
                } else {
                    $.notify(data.message, "error");
                    $('.btn-primary').text('Save');
                    $('.submit-form').removeAttr('disabled');
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#whats_new_gallery_management input[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                        $('#whats_new_gallery_management select[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                    });
                    $('.btn-primary').text('Save');
                    $('.submit-form').removeAttr('disabled');
                }
            }
        });
    });

    $('.view_whats_new').click(function() {
        var id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: url + 'whats-new-details',
            data: { id: id },
            success: function(data) {
                var data = $.parseJSON(data);
                var name = data.name;
                var about = data.about;
                var banner_web = data.thumb_web;
                var banner_mob = data.thumb_mob;
                var alt_tag = data.alt_tag;
                var value = '';
                value += '<table class="table">';
                value += '<tr><th>Name</th><td>' + name + '</td></tr>';
                value += '<tr><th>About</th><td>' + about + '</td></tr>';
                value += '<tr><th>Alt Tag</th><td>' + alt_tag + '</td></tr>';
                value += '<tr><th>Banner Web</th><td><img src=' + base_url + "assets/images/public/home/" + banner_web + ' width="100px" height="100px"></td></tr>';
                value += '<tr><th>Banner Mobile</th><td><img src=' + base_url + "assets/images/public/home/" + banner_mob + ' width="100px" height="100px"></td></tr>';
                value += '</table>';
                $('.whats_new').html(value);
            }
        });
    });

    $('.view_whats_new_gallery').click(function() {
        var id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: url + 'whats-new-gallery-details',
            data: { id: id },
            success: function(data) {
                var data = $.parseJSON(data);
                var name = data.name;
                var banner_web = data.image_web;
                var banner_mob = data.image_mob;
                var alt_tag = data.image_alt;
                var value = '';
                value += '<table class="table">';
                value += '<tr><th>Name</th><td>' + name + '</td></tr>';
                value += '<tr><th>Alt Tag</th><td>' + alt_tag + '</td></tr>';
                value += '<tr><th>Banner Web</th><td><img src=' + base_url + "assets/images/public/home/" + banner_web + ' width="100px" height="100px"></td></tr>';
                value += '<tr><th>Banner Mobile</th><td><img src=' + base_url + "assets/images/public/home/" + banner_mob + ' width="100px" height="100px"></td></tr>';
                value += '</table>';
                $('.whats_new_gallery').html(value);
            }
        });
    });

    $(".chkstatus_gallery").click(function() {
        if ($(this).is(':checked')) {
            var status = 0;
        } else {
            status = 1;
        }
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: url + 'change-whats-new-gallery-status',
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

    $('.delete_gallery').click(function() {
        var whats_new_id = $(this).data('id');
        if (confirm('Do you want to delete this data?')) {
            $.ajax({
                type: 'post',
                url: url + 'delete-whats-new-gallery',
                data: { whats_new_id: whats_new_id },
                success: function(data) {
                    var data = $.parseJSON(data);
                    if (data.status > 0) {
                        $.notify(data.message, "success");
                        setTimeout(function() { window.location.reload(); }, 1000);
                    } else {
                        $.notify(data.message, "error");
                    }
                }
            });
        }
    });

});