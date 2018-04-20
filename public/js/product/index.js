/** 
 * Product class.
 */
let product = new function () {

    /**
     * Add to Cart method.
     */
    this.add = function (id_product) {
        $.ajax({
            url: '/cart',
            type: 'post',
            data: {
                id_product: id_product
            },
            dataType: 'json',
            async: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                product.cart();
            },
            error: function (dataReturn) {
                var json = JSON.parse(dataReturn.responseText);
                swal({
                    title: "Opss!",
                    type: "error",
                    text: json.message
                });
            }
        });
    };

    /**
     * Redirect to cart
     */
    this.cart = function () {
        window.location = '/cart';
    };
};