$(document).ready(function () {
    $('#checkout-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '/checkout',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response.message);
            }
        });
    });
});