$(document).ready(function() {
    const url = $('body').data('url');
    const base_url = $('body').data('base_url');

    $('.delete').click(function() {
        var banner_id = $(this).data('id');
        if (confirm('Do you want to delete this banner?')) {
            $.ajax({
                type: 'post',
                url: url + 'delete-banner',
                data: { banner_id: banner_id },
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
            url: url + 'change-banner-status',
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

    $('#banner_management').submit(function(e) {
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
                        window.location.replace(url + 'banners');
                        $('.btn-primary').text('Save');
                    }, 2000);
                } else {
                    $.notify(data.message, "error");
                    $('.submit-form').removeAttr('disabled');
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#banner_management input[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                        $('#banner_management select[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                        $('#banner_management textarea[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                    });
                    $('.btn-primary').text('Save');
                    $('.submit-form').removeAttr('disabled');
                }

            }
        });
    });

    // View Banner
    $('.view_banner').click(function() {
        var banner_id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: url + 'get-banner-details',
            data: { banner_id: banner_id },
            success: function(data) {
                var data = $.parseJSON(data);
                if (data.status > 0) {
                    $.notify(data.message, "success");
                    var street = (data[0].street != null) ? data[0].street : 'N/A';
                    var brand_name = (data[0].brand_name != null) ? data[0].brand_name : 'N/A';
                    value = "<table class='table'>";
                    value += "<tr><th>Banner Type</th><td>" + data[0].banner_type + "</td></tr>";
                    value += "<tr><th>Street</th><td>" + street + "</td></tr>";
                    value += "<tr><th>Brand</th><td>" + brand_name + "</td></tr>";
                    value += "<tr><th>Alt Tag</th><td>" + data[0].comment + "</td></tr>";
                    value += "<tr><th>Status</th><td>" + data[0].status + "</td></tr>";
                    if (data[0].banner_type == "Home Page" || data[0].banner_type == "Event Page") {
                        value += "<tr><th>Banner Web</th><td><img src=" + base_url + 'assets/images/public/home/' + data[0].banner_web + " style='width:100px; height:100px'></td></tr>";
                        value += "<tr><th>Banner Mobile</th><td><img src=" + base_url + 'assets/images/public/home/' + data[0].banner_mobile + " style='width:100px; height:100px'></td></tr>";
                    } else {
                        value += "<tr><th>Banner Web</th><td><img src=" + base_url + 'assets/images/public/brand/' + data[0].banner_web + " style='width:100px; height:100px'></td></tr>";
                        value += "<tr><th>Banner Mobile</th><td><img src=" + base_url + 'assets/images/public/brand/' + data[0].banner_mobile + " style='width:100px; height:100px'></td></tr>";
                    }

                    value += "</table>";
                    $('#bannerDetails').html(value);
                } else {
                    $.notify(data.message, "error");
                }
            }
        });
    });

    // Get data for filter
    $('#banner_link').change(function() {
        var link_type = $(this).val();
        if (link_type == 1 || link_type == 2 || link_type == 3 || link_type == 4) {
            $('#link_to').css('display', 'block');
            $('.link_to').empty();
            $('.link_to').append($('<option></option>').attr("value", '').text('Choose from the list'));
            $.ajax({
                type: 'post',
                url: url + 'get-link-data',
                data: { link_type: link_type },
                success: function(data) {
                    var data = $.parseJSON(data);
                    $.each(data, function(i, v) {
                        $('.link_to').append($('<option></option>').attr("value", v.slug).text(v.name));
                    })
                }
            });
        }else{
            $('#link_to').hide();
        }

    });

});