$(document).ready(function () {

    window.addEventListener("pageshow", function(event){
        if(event.persisted){
            location.reload();
        }
    });


    $('.add-to-cart').click(function () {
        let food_id = $(this).data('id');

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url: '/cart/add',
            data: {
                food_id: food_id,
            },
            success: function (response) {
                if (response.status === 'success') {
                    Swal.fire({
                        title: "Added to Cart!",
                        text: response.message,
                        icon: "success",
                        showCancelButton: true,
                        confirmButtonText: "View Cart",
                        cancelButtonText: "Continue Shopping"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/cart/view";
                        }
                    });

                    $('#cart-count').text(response.cart_count);
                }
            }
        });
    });

    $('.update-cart').on('change', function () {
        let cart_id = $(this).data('id');
        let quantity = $(this).val();

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url: '/cart/update',
            data: {
                cart_id: cart_id,
                quantity: quantity,
            },
            success: function (response) {
                location.reload();
            }
        });
    });

    $('.remove-item').click(function () {
        let cart_id = $(this).data('id');

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url: '/cart/remove',
            data: {
                cart_id: cart_id,
            },
            success: function (response) {
                location.reload();
            }
        });
    });
});
