$(document).ready(function() {
    $('.add-to-cart').click(function(e) {
        e.preventDefault();
        let food_id = $(this).data('id');

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url: "{{ route('cart.add') }}",
            data: { food_id: food_id},
            success: function(response) {
                alert(response.message);
            }
        });
    });

    // Update Cart Quantity
    $(document).on('change', '.cart-quantity', function () {
        let food_id = $(this).data('id');
        let quantity = $(this).val();

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url: "/cart/update",
            data: {
                food_id: food_id,
                quantity: quantity,
            },
            success: function (response) {
                alert(response.message);
                loadCart();
            }
        });
    });

    // Remove Item from Cart
    $(document).on('click', '.remove-from-cart', function () {
        let food_id = $(this).data('id');

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url: "/cart/remove",
            data: {
                food_id: food_id,
            },
            success: function (response) {
                alert(response.message);
                loadCart();
            }
        });
    });

    // Clear Cart
    $('#clear-cart').click(function () {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url: "/cart/clear",
            success: function (response) {
                alert(response.message);
                loadCart();
            }
        });
    });

    // Load Cart Data
    function loadCart() {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'GET',
            url: "/cart",
            success: function (data) {
                let cart = JSON.parse(data.cart);
                let cartHTML = '';

                if (Object.keys(cart).length === 0) {
                    cartHTML = '<tr><td colspan="6">Your cart is empty.</td></tr>';
                } else {
                    $.each(cart, function (id, item) {
                        cartHTML += `
                            <tr>
                                <td><img src="/storage/${item.image}" width="50"></td>
                                <td>${item.name}</td>
                                <td>$${item.price}</td>
                                <td><input type="number" class="cart-quantity" data-id="${id}" value="${item.quantity}" min="1"></td>
                                <td>$${item.price * item.quantity}</td>
                                <td><button class="btn btn-sm btn-danger remove-from-cart" data-id="${id}">Remove</button></td>
                            </tr>
                        `;
                    });
                }

                $('#cart-body').html(cartHTML);
            }
        });
    }
});