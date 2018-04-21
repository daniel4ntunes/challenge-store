/** 
 * Checkout class.
 */
let Checkout = new function () {
    this.formAccount = $('#form-account');
    this.formAddress = $('#form-address');

    this.process = function () {
        if (this.validate()) {
            Checkout.send();
        }
    };

    this.send = function () {
        data = $("form").serialize();
        $.ajax({
            url: '/checkout/process',
            type: 'post',
            data: data,
            dataType: 'json',
            async: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (dataReturn) {
                window.location = dataReturn.url;
            },
            error: function (dataReturn) {
                Useful.Loading.hide();
                var json = JSON.parse(dataReturn.responseText);
                swal({
                    title: "Opss!",
                    type: "error",
                    text: json.message
                });
            }
        });
    };

    this.validate = function () {
        var auth = true
        if (!standard.form.validate.run(this.formAccount, 'sweetAlert')) {
            auth = false;
        } else if (!standard.form.validate.run(this.formAddress, 'sweetAlert')) {
            auth = false;
        }
        return auth;
    };
};