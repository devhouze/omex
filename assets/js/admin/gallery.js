$(document).ready(function() {
    const url = $('body').data('url');
    const base_url = $('body').data('base_url');

    $('.delete').click(function() {
        var media_id = $(this).data('id');
        if (confirm('Do you want to delete this media?')) {
            $.ajax({
                type: 'post',
                url: url + 'delete-media',
                data: { media_id: media_id },
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

    function check_file() {
        var media_type = $('#media_type option:selected').val();
        var filter_type = $('.filter_type option:selected').val();

        if (media_type == 1) {
            $('.filter_type').empty();
            $('#image').css('display', 'block');
            $('#youtube').css('display', 'none');
            $('#video').css('display', 'none');
            value = "<option value=''>Select Option</option>";
            value += "<option value='1'>Interior</option>";
            value += "<option value='2'>Exterior</option>";
            value += "<option value='3'>Construction</option>";
            $('.filter_type').append(value);
        } else if (media_type == 3) {
            $('.filter_type').empty();
            $('#youtube').css('display', 'block');
            $('#image').css('display', 'none');
            $('#video').css('display', 'none');
            value = "<option value=''>Select Option</option>";
            value += "<option value='4'>Video</option>";
            $('.filter_type').append(value);
        } else if (media_type == 2) {
            $('.filter_type').empty();
            $('#youtube').css('display', 'none');
            $('#image').css('display', 'none');
            $('#video').css('display', 'block');
            value = "<option value=''>Select Option</option>";
            value += "<option value='4'>Video</option>";
            $('.filter_type').append(value);
        } else {
            $('#image').css('display', 'none');
            $('#youtube').css('display', 'none');
            $('#video').css('display', 'none');
        }
    }

    $('.filter_type').change(function() {
        var media_type = $('#media_type option:selected').val();
        var filter_type = $('.filter_type option:selected').val();
        $.ajax({
            type: 'post',
            url: url + 'get-sequence',
            data: { media_type: media_type, filter_type: filter_type },
            dataType: 'json',
            success: function(data) {
                if (data != '') {
                    $.each(data, function(i, v) {
                        $('#sequence').find('option[value="' + v.sequence + '"]').prop('disabled', true);
                    })
                } else {
                    $('#sequence').find('option').prop('disabled', false);
                }

            }
        })
    });

    // check_file();

    $('#media_type').change(function() {
        check_file();
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
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        $('.btn-primary').html('<i class="fa fa-spinner fa-spin"></i>Loading');
        $('.submit-form').prop("disabled", true);

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
                    setTimeout(function() {
                        window.location.replace(url + 'gallery');
                        $('.btn-primary').text('Save');
                    }, 2000);

                } else {
                    $.notify(data.message, "error");
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#gallery_management input[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                        $('#gallery_management select[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                    });
                    $('.btn-primary').text('Save');
                    $('.submit-form').removeAttr('disabled');
                }
            }
        });
    });

    $('.view_detail').click(function() {
        var gallery_id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: url + 'gallery-details',
            data: { gallery_id: gallery_id },
            success: function(data) {
                var data = $.parseJSON(data);
                var media_type = data.media_type;
                var media_name = data.media_name;
                var media_video = data.media_video;
                if (media_type == 3) {
                    value = '<iframe src="' + media_name + '" height="100%" width="100%"></iframe>';
                }
                if (media_type == 2) {
                    value = '<video width="320" height="240" controls>';
                    value += '<source src="' + base_url + 'assets/images/public/home/' + media_video + '" type="video/mp4">';
                }
                if (media_type == 1) {
                    value = '<img src="' + base_url + 'assets/images/public/home/' + media_name + '">';
                }
                $('#details').html(value);
            }
        });
    })

    // get sequence
    $(document).ready(function() {
        var media_type = $('#media_type option:selected').val();
        var filter_type = $('.filter_type option:selected').val();
        $.ajax({
            type: 'post',
            url: url + 'get-sequence',
            data: { media_type: media_type, filter_type: filter_type },
            dataType: 'json',
            success: function(data) {
                if (data != '') {
                    $.each(data, function(i, v) {
                        $('#sequence').find('option[value="' + v.sequence + '"]').prop('disabled', true);
                    })
                } else {
                    $('#sequence').find('option').prop('disabled', false);
                }

            }
        })
    });



});