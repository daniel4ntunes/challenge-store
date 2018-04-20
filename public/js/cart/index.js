/** 
 * Cart class.
 */
let cart = new function () {
    this.delete = function (id_cart) {
        swal({
            title: 'Atenção!',
            text: "Deseja realmente retirar esse produto do carrinho de compras?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sim, por favor!'
        }).then(function () {
            useful.loading.show();
            $.ajax({
                url: '/cart/' + id_cart,
                type: 'delete',
                dataType: 'json',
                async: true,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function () {
                    cart.redirect();
                },
                error: function (dataReturn) {
                    useful.loading.hide();
                    var json = JSON.parse(dataReturn.responseText);
                    swal({
                        title: "Opss!",
                        type: "error",
                        text: json.message
                    });
                }
            });
        });
    };

    this.update = function (id_cart, qty) {
        useful.loading.show();
        $.ajax({
            url: '/cart/' + id_cart + '/' + qty,
            type: 'put',
            dataType: 'json',
            async: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                cart.redirect();
            },
            error: function (dataReturn) {
                useful.loading.hide();
                var json = JSON.parse(dataReturn.responseText);
                swal({
                    title: "Opss!",
                    type: "error",
                    text: json.message
                }).then(function () {
                    cart.redirect();
                });
            }
        });
    };

    this.changeItem = function (ref, qty) {
        if (0 == qty) {
            cart.delete(ref);
        } else {
            cart.update(ref, qty);
        }

    };

    this.redirect = function () {
        window.location = '/cart';
    };
};

$(document).ready(function () {
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
        $("#success-alert").slideUp(500);
    });

    $('td.quantity input').on('input', function () {
        var ref = $(this).attr('id');
        var qty = $(this).val();
        cart.changeItem(qty, ref);
    });
    $('a#plus, a#minus').on('click', function () {
        var sign = $(this).attr('id');
        var ref = $(this).attr('data-ref').substr(1);
        var qty = $('#' + ref).val();
        if (sign == 'minus') {
            qty = parseInt(qty) - 1;
        } else if (sign == 'plus') {
            qty = parseInt(qty) + 1;
        }
        cart.changeItem(ref, qty);
    });

});