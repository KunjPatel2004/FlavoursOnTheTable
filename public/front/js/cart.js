$(document).ready(function () {
    $('.add-to-cart').click(function () {
        let food_id = $(this).data('id');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url: "/add-to-cart",
            data: { id: food_id },
            success: function (response) {
                if (response.status === 'success') {
                    Swal.fire({
                        title: "Added to Cart!",
                        text: response.message,
                        icon: "success",
                        showCancelButton: true,
                        confirmButtonText: "View Cart",
                        cancelButtonText: "Continue Shopping",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/cart"; // Redirect to Cart Page
                        }
                    });
                } else {
                    Swal.fire("Error", response.message, "error");
                }

            }
        });
    });

    $('.update-cart').click(function () {
        let cart_id = $(this).data('id');
        let quantity = $(this).val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url: "/update-cart",
            data: { cart_id: cart_id, quantity: quantity},
            success: function (response) {
                location.reload();   
            }
        });
    });

    $('.remove-cart').click(function () {
        let cart_id = $(this).data('id');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url: "/remove-from-cart",
            data: { cart_id: cart_id },
            success: function (response) {
                location.reload();
            }
        });
    });
});