let count = parseInt($('#wishlistCount').text());

function updateWishlist(productName, add, buttonElement) {
    let CSRF = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: 'POST',
        url: add ? '/wishlist/add' : '/wishlist/remove',
        data: {
            product_name: productName,
        },
        headers: {
            'X-CSRF-TOKEN': CSRF
        },
        success: function (response) {
            count = Math.max(count + (add ? 1 : -1), 0);

            inWishlist = add;
            $('#wishlistCount').text(count);

            // Use buttonElement to find the closest <tr> and remove it
            buttonElement.closest('tr').remove();

            console.log(response);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

$('.wishlistBtn').click(function () {
    let productName = $(this).data('product-name');
    let inWishlist = $(this).data('in-wishlist');

    if (inWishlist) {
        // If it's in the wishlist, remove it
        updateWishlist(productName, false, $(this));
        $(this).data('in-wishlist', false); // Update the data attribute
    } else {
        // If it's not in the wishlist, add it
        updateWishlist(productName, true, $(this));
        $(this).data('in-wishlist', true); // Update the data attribute
    }
});
