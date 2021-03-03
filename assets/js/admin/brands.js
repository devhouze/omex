$(document).ready(function() {
    const url = $('body').data('url');

    $('.show_brand_offers').change(function() {
        var option = $("input:radio.show_brand_offers:checked").val();
        if (option == 'Yes') {
            $('.brand_offer').css('display', 'block');
        } else {
            $('.brand_offer').css('display', 'none');
        }
    });

    $('.delete').click(function() {
        var brand_id = $(this).data('id');
        if (confirm('Do you want to delte this brand?')) {
            $.ajax({
                type: 'post',
                url: url + 'delete-brand',
                data: { brand_id: brand_id },
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
            url: url + 'change-brand-status',
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

    $(".chkstatus_logo").click(function() {
        if ($(this).is(':checked')) {
            var status = 0;
        } else {
            status = 1;
        }
        var id = $(this).val();
        $.ajax({
            type: "POST",
            url: url + 'change-brand-logo-status',
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

    $('.delete_logo').click(function() {
        var logo_id = $(this).data('id');
        if (confirm('Do you want to delte this brand?')) {
            $.ajax({
                type: 'post',
                url: url + 'delete-brand-logo',
                data: { logo_id: logo_id },
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

    $('#brand_management').submit(function(e) {
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
                    setTimeout(function() { window.location.replace(url + 'brands'); }, 2000);
                } else {
                    $.notify(data.message, "error");
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#brand_management .' + i + '').html(v);
                        $('#brand_management select[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                        $('#brand_management textarea[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                    });
                }
            }
        });
    });

    $('#brand_logo_management').submit(function(e) {
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
                    setTimeout(function() { window.location.replace(url + 'brand-logo'); }, 2000);
                } else {
                    $.notify(data.message, "error");
                }
                if (data.error) {
                    $.each(data.error, function(i, v) {
                        $('#brand_logo_management input[name="' + i + '"]').after('<span class="text-danger errors_msg">' + v + '</span>');
                    });
                }
            }
        });
    });

    $('.view_detail').click(function() {
        var brand_id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: url + 'brand-details',
            data: { brand_id: brand_id },
            success: function(data) {
                var data = $.parseJSON(data);
                var brand_name = data.brand_name;
                var about_brand_offer = data.about_brand_offer;
                var brand_audience = data.brand_audience;
                var brand_category = data.brand_category;
                var brand_contact = data.brand_contact;
                var brand_contact_email = data.brand_contact_email;
                var brand_label = data.brand_label;
                var brand_offer_name = data.brand_offer_name;
                var brand_offer_status = data.brand_offer_status;
                var brand_offer_validity = data.brand_offer_validity;
                var brand_street = data.brand_street;
                var brand_sub_category = data.brand_sub_category;
                var brand_type = data.brand_type;
                var brand_website = data.brand_website;
                var from_hour_week = data.from_hour_week;
                var from_hour_weekend = data.from_hour_weekend;
                var logo_message = data.logo_message;
                var show_on_home = data.show_on_home;
                var store_map = data.store_map;
                var to_week_hour = data.to_week_hour;
                var to_weekend_hour = data.to_weekend_hour;
                var brand_custom_offer = data.brand_offer;
                var brand_offer_thumbnail_message = data.brand_offer_thumbnail_message;
                var about_brand = data.about_brand;
                var status = data.status;
                value = '';
                value += '<table class="table">';
                value += '<tr><th colspan="4" class="text-center">Brand Details</th></tr>';
                value += '<tr><th>Name</th><td>' + brand_name + '</td><th>Contact</th><td>' + brand_contact + '</td></tr>';
                value += '<tr><th>Email Contact</th><td>' + brand_contact_email + '</td><th>Website</th><td>' + brand_website + '</td></tr>';
                value += '<tr><th>From Hour(Week)</th><td>' + from_hour_week + '</td><th>To Hour(Week)</th><td>' + to_week_hour + '</td></tr>';
                value += '<tr><th>From Hour(Weekend)</th><td>' + from_hour_weekend + '</td><th>To Hour(Weekend)</th><td>' + to_weekend_hour + '</td></tr>';
                value += '<tr><th>Type</th><td>' + brand_type + '</td><th>Labels</th><td>' + brand_label + '</td></tr>';
                value += '<tr><th>Category</th><td>' + brand_category + '</td><th>Subcategory</th><td>' + brand_sub_category + '</td></tr>';
                value += '<tr><th colspan="2">Street</th><td colspan="2">' + brand_street + '</td></tr>';
                value += '<tr><th>Brand Audience</th><td>' + brand_audience + '</td><th>Brand Status</th><td>' + status + '</td></tr>';
                value += '<tr><th>Show On Home</th><td>' + show_on_home + '</td><th>Alt comment</th><td>' + logo_message + '</td></tr>';
                value += '<tr><th colspan="2">About Brand</th><td colspan="2">' + about_brand + '</td></tr>';
                value += '<tr><th colspan="2">Activate Brand Offer</th><td colspan="2">' + brand_offer_status + '</td></tr>';
                value += '<tr><th>Offer Name</th><td>' + brand_offer_name + '</td><th>Offer</th><td>' + brand_custom_offer + '</td></tr>';
                value += '<tr><th>Offer Validity</th><td>' + brand_offer_validity + '</td><th>Offer Alt Comment</th><td>' + brand_offer_thumbnail_message + '</td></tr>';
                value += '<tr><th colspan="2">About Offer</th><td colspan="2">' + about_brand_offer + '</td></tr>';
                $('#details').html(value);
            }
        });
    });

});