
if (undefined == standard) {
    var standard = new Object();
}

standard.form = new function () {
    this.block = function (form, status) {
        if ($(form).is("form")) {
            status = (undefined != status) ? status : false;
            if (status) {
                $("input, select, textarea, button, a", form).not('.form-item-ignore').each(function () {
                    $(this).attr("disabled", "disabled");
                });
            } else {
                $("input, select, textarea, button, a", form).not('.form-item-ignore').each(function () {
                    $(this).removeAttr("disabled");
                });
            }
        }
    };
    this.message = function (message, type) {
        if ((message instanceof Array) || (message instanceof Object)) {
            type = (undefined != type) ? type : "error";
            var html = "";
            for (var index in message) {
                html += "- " + message[index] + "</br>";
            }
            swal({
                title: "Opss!",
                type: type,
                html: html
            });
        }
    };
};

standard.form.make = new function () {
    this.date = function (dateText) {
        var auth = false;
        var date = null;
        var pattern = /^(\d{2})\/(\d{2})\/(\d{4})$/;
        if (pattern.test(dateText)) {
            var year = parseInt(dateText.replace(pattern, "$3"));
            var month = parseInt(dateText.replace(pattern, "$2"));
            var day = parseInt(dateText.replace(pattern, "$1"));
            date = new Date(year, --month, day, 0, 0, 0, 0);
            if ((year == date.getUTCFullYear()) && (month == date.getUTCMonth()) && (day == date.getUTCDate())) {
                auth = true;
            } else {
                auth = false;
            }
        }
        return (auth) ? date : null;
    };
};

standard.form.validate = new function () {
    this.run = function (form) {
        var index = 0;
        var metadata = new Array();
        if ($(form).is("form")) {            
            var data = $(form).serializeArray();
            data = standard.form.validate.addMutileSelect(form, data);
            jQuery.each(data, function (key, data) {
                if ((undefined != data.name) && ('' != data.name)) {
                    //standard-form-require
                    $(".standard-form-require[name='" + data.name + "']", form).each(function () {
                        metadata[index++] = standard.form.validate.require(this);
                    });
                    //standard-form-min
                    $("[name='" + data.name + "'][class*='standard-form-min']", form).each(function () {
                        metadata[index++] = standard.form.validate.min(this);
                    });
                    //standard-form-max
                    $("[name='" + data.name + "'][class*='standard-form-max']", form).each(function () {
                        metadata[index++] = standard.form.validate.max(this);
                    });
                    //standard-form-username
                    $(".standard-form-username[name='" + data.name + "']", form).each(function () {
                        metadata[index++] = standard.form.validate.username(this);
                    });
                    //standard-form-email
                    $(".standard-form-email[name='" + data.name + "']", form).each(function () {
                        metadata[index++] = standard.form.validate.email(this);
                    });
                    //standard-form-phone
                    $(".standard-form-phone[name='" + data.name + "']", form).each(function () {
                        metadata[index++] = standard.form.validate.phone(this);
                    });
                    //standard-form-hour
                    $(".standard-form-hour[name='" + data.name + "']", form).each(function () {
                        metadata[index++] = standard.form.validate.hour(this);
                    });
                    //standard-form-date
                    $(".standard-form-date[name='" + data.name + "']", form).each(function () {
                        metadata[index++] = standard.form.validate.date(this);
                        var minLimit = $(this).attr("data-date-minLimit");
                        if ((undefined != $(this).val()) && ("" != $(this).val()) && (undefined != minLimit) && ("" != minLimit)) {
                            var dateCompare = $("input[name='" + minLimit + "']");
                            if ((undefined != dateCompare.val()) && ('' != dateCompare.val())) {
                                var dateStart = standard.form.make.date($(this).val());
                                var dateFinish = standard.form.make.date(dateCompare.val());
                                if (dateStart > dateFinish) {
                                    dateCompare.val('');
                                }
                            }
                        }
                    });
                    //standard-form-cep
                    $(".standard-form-cep[name='" + data.name + "']", form).each(function () {
                        //metadata[index++] = standard.form.validate.cep(this);
                    });
                    //standard-form-ie
                    $(".standard-form-ie[name='" + data.name + "']", form).each(function () {
                        metadata[index++] = standard.form.validate.ie(this);
                    });
                    //standard-form-cpf
                    $(".standard-form-cpf[name='" + data.name + "']", form).each(function () {
                        metadata[index++] = standard.form.validate.cpf(this);
                    });
                    //standard-form-cnpj
                    $(".standard-form-cnpj[name='" + data.name + "']", form).each(function () {
                        metadata[index++] = standard.form.validate.cnpj(this);
                    });
                    //standard-form-cnpj-cpf
                    $(".standard-form-cnpj-cpf[name='" + data.name + "']", form).each(function () {
                        metadata[index++] = standard.form.validate.cnpj_cpf(this);
                    });
                    //standard-form-cnpj-cpf
                    $(".standard-account-plan[name='" + data.name + "']", form).each(function () {
                        metadata[index++] = standard.form.validate.account_plan(this);
                    });
                    //standard-form-numeric
                    $(".standard-form-numeric[name='" + data.name + "']", form).each(function () {
                        metadata[index++] = standard.form.validate.numeric(this);
                    });
                    //standard-form-json
                    $(".standard-form-json[name='" + data.name + "']", form).each(function () {
                        metadata[index++] = standard.form.validate.json(this);
                    });
                    //standard-form-real
                    $(".standard-form-real[name='" + data.name + "']", form).each(function () {
                        metadata[index++] = standard.form.validate.real(this);
                    });
                    //standard-form-qtd
                    $(".standard-form-qtd[name='" + data.name + "']", form).each(function () {
                        metadata[index++] = standard.form.validate.qtd(this);
                    });
                }
            });
        }
        return standard.form.validate.set(metadata);
    };
    this.instance = function (e) {
        var instance = null;
        if (undefined != e) {
            instance = new Object({
                "label": $(e).attr("data-label"),
                "element": e,
                "error": ""
            });
        }
        return instance;
    };
    this.addMutileSelect = function (form, data) {
        var index = parseInt(data.length);
        $('select', form).each(function () {
            if ($(this).prop('multiple')) {
                var name = $(this).prop('name');
                var value = this.value;
                if ((undefined != value) && (undefined != name) && ('' != name)) {
                    data[index] = {
                        "name": name,
                        "value": value
                    }
                    index++;
                }
            }
        });
        return data;
    };
    this.set = function (data) {
        var index = 0;
        var status = true;
        var message = new Object();
        if ((data instanceof Array)) {
            jQuery.each(data, function (key, metadata) {
                if ((index < 3) && (undefined != metadata) && (undefined != metadata.error) && (metadata.error != "")) {
                    index++;
                    status = false;
                    message[metadata.label] = metadata.error;
                }
            });
        }
        if (!status) {
            standard.form.message(message);
        }
        return status;
    };
    this.require = function (e) {
        var data = standard.form.validate.instance(e);
        if (data != null) {
            if ($(e).val() == "") {
                data.error = "Informe o campo " + $(e).attr("data-label");
            } else if ((e.tagName == 'SELECT') && (e.value == "")) {
                data.error = "Informe o campo " + $(e).attr("data-label");
            }
        }
        return data;
    };
    this.min = function (e) {
        var data = standard.form.validate.instance(e);
        if (data != null) {
            var minlength = $(e).prop("class").replace(/^(.*?)(standard-form-min-)(\d{0,4})(.*?)$/, "$3");
            if ((minlength != "") && ($(e).val().length)) {
                if ($(e).val().length < minlength) {
                    data.min = minlength;
                    data.error = 'O campo ' + $(e).attr("data-label") + ' precisa ter o mínimo de ' + minlength + ' caractere(s)';
                }
            }
        }
        return data;
    };
    this.max = function (e) {
        var data = standard.form.validate.instance(e);
        if (data != null) {
            var maxlength = $(e).prop("class").replace(/^(.*?)(standard-form-max-)(\d{0,4})(.*?)$/, "$3");
            if ((maxlength != "") && ($(e).val().length)) {
                if ($(e).val().length > maxlength) {
                    data.max = maxlength;
                    data.error = 'O campo ' + $(e).attr("data-label") + ' precisa ter o máximo de ' + maxlength + ' caractere(s)';
                    $(e).prop("maxlength", maxlength);
                }
            }
        }
        return data;
    };
    this.username = function (e) {
        var data = standard.form.validate.instance(e);
        if ((data != null) && ($(e).val().length)) {
            if ($(e).val().match(/^([a-zA-Z0-9_\.\-])+$/)) {
                data.error = "";
            } else {
                data.error = $(e).attr("data-label");
            }
        }
        return data;
    };
    this.email = function (e) {
        var data = standard.form.validate.instance(e);
        if ((data != null) && ($(e).val().length)) {
            if ($(e).val().match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)) {
                data.error = "";
            } else {
                data.error = $(e).attr("data-label");
            }
        }
        return data;
    };
    this.phone = function (e) {
        var data = standard.form.validate.instance(e);
        if ((data != null) && ($(e).val().length)) {
            if ($(e).val().match(/^\(\d{2}\) \d{4,5}\-\d{4}$/)) {
                data.error = "";
            } else {
                data.error = $(e).attr("data-label");
            }
        }
        return data;
    };
    this.hour = function (e) {
        var data = standard.form.validate.instance(e);
        if ((data != null) && ($(e).val().length)) {
            var value = $(e).val();
            var hour = value.replace(/^(\d{2}):(\d{2}):(\d{2})$/, "$1");
            var minute = value.replace(/^(\d{2}):(\d{2}):(\d{2})$/, "$2");
            var second = value.replace(/^(\d{2}):(\d{2}):(\d{2})$/, "$3");
            data.error = $(e).attr("data-label");
            if ($(e).val().match(/^(\d{2}):(\d{2}):(\d{2})$/)) {
                if ((hour <= 23) && (minute <= 59) && (second <= 59)) {
                    data.error = "";
                }
            }
        }
        return data;
    };
    this.date = function (e) {
        var auth = false;
        var value = $(e).val();
        var pattern = /^(\d{2})\/(\d{2})\/(\d{4})$/;
        var data = standard.form.validate.instance(e);
        if ((data != null) && ($(e).val().length)) {
            if (standard.form.make.date($(e).val())) {
                auth = true;
            }
            if (!auth) {
                data.error = $(e).attr("data-label");
            }
        }
        return data;
    };
    this.cep = function (e) {
        var data = standard.form.validate.instance(e);
        if ((data != null) && ($(e).val().length)) {
            if ($(e).val().match(/^\d{5}\-\d{3}$/)) {
                data.error = "";
            } else {
                data.error = $(e).attr("data-label");
            }
        }
        return data;
    };
    this.ie = function (e) {
    };
    this.cpf = function (e) {
        var data = standard.form.validate.instance(e);
        if ((data != null) && ($(e).val().length)) {
            if ($(e).val().match(/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/)) {
                data.error = "";
            } else {
                data.error = $(e).attr("data-label");
            }
        }
        return data;
    };
    this.cnpj = function (e) {
        var data = standard.form.validate.instance(e);
        if ((data != null) && ($(e).val().length)) {
            if ($(e).val().match(/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/)) {
                data.error = "";
            } else {
                data.error = $(e).attr("data-label");
            }
        }
        return data;
    };
    this.cnpj_cpf = function (e) {
        var data = standard.form.validate.instance(e);
        var length = $(e).val().length;
        switch (length) {
            case 11:
                data = standard.form.cpf(e);
                break;
            case 14:
                data = standard.mask.cnpj(e);
                break;
            default:
                data.error = $(e).attr("data-label");
                break;
        }
        return data;
    };
    this.account_plan = function (e) {
        var data = standard.form.validate.instance(e);
        if ((data !== null) && ($(e).val().length)) {
            if ($(e).val().match(/^\d{1,}\.\d{1,}\.\d{1,}\.\d{1,}\.\d{1,}$/)) {
                data.error = "";
            } else {
                data.error = $(e).attr("data-label");
            }
        }
        return data;
    };
    this.numeric = function (e) {
        var data = standard.form.validate.instance(e);
        if (data != null) {
            if ($(e).val() == "" || $(e).val() === "0,00" || $(e).val() === "0,000") {
                data.error = $(e).attr("data-label");
            }
        }
        return data;
    };
    this.real = function (e) {
        var data = standard.form.validate.instance(e);
        if (data != null) {
            if ($(e).val() == "" || $(e).val() === "R$0,00") {
                data.error = $(e).attr("data-label");
            }
        }
        return data;
    };
    this.qtd = function (e) {
        var data = standard.form.validate.instance(e);
        if (data != null) {
            if ($(e).val() == "" || $(e).val() === "0.0000") {
                data.error = $(e).attr("data-label");
            }
        }
        return data;
    };
    this.json = function (e) {
        var data = standard.form.validate.instance(e);
        var auth = false;
        try {
            auth = true;
            jQuery.parseJSON($(e).val());
        } catch (ex) {
            auth = false;
        }
        if (data != null) {
            if (!auth && ("" != $(e).val())) {
                data.error = $(e).attr("data-label");
            }
        }
        return data;
    };
};
