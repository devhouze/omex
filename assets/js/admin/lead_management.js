$(document).ready(function() {
    const url = $('body').data('url');

    $('.view_message').click(function() {
        var lead_id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: url + 'get-message',
            data: { lead_id: lead_id },
            success: function(data) {
                var data = $.parseJSON(data);
                if (data.message != null) {
                    console.log(1);
                    $('.message').html(data.message);
                } else {
                    console.log(2);
                    $('.message').html('No data found!.');
                }
            }
        });
    });

});