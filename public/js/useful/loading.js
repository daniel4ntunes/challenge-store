useful.loading = new function() {
    this.show = function(msg) {
        msg = msg || '';
        swal({
            title: '',
            text: msg,
            onOpen: function () {
                swal.showLoading()
            },
                //imageUrl: '/assets/standard/images/loading.gif',
            showConfirmButton: false,
            allowEscapeKey: false,
            allowOutsideClick: false,
            allowEnterKey: false
        });
    };
    this.hide = function () {
        swal.close();
    };   
};
