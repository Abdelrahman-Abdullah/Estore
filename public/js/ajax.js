let count = 0;
function updateWishlist(productName, add) {
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
            if (add) {
                count += 1;
            } else {
                count -= 1;
            }
            inWishlist = add;
            $('#wishlistCount').text("(" + count + ")");
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
        updateWishlist(productName, false);
        $(this).data('in-wishlist', false); // Update the data attribute

    } else {
        // If it's not in the wishlist, add it
        updateWishlist(productName, true);
        $(this).data('in-wishlist', true); // Update the data attribute

    }
});
