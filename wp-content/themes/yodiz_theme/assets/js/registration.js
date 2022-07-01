jQuery(document).ready(function ($) {

    const input = $('.input')

    function inputs() {
        input.on('focus', function () {
            $(this).closest('.input-block').addClass('moving-label')
        })

        input.on('blur', function () {
            if ($(this).val() < 1) {
                $(this).closest('.input-block').removeClass('moving-label');
            }
        });
    }

    $(document).ready(function () {

        $(input).each(function () {
            if ($(this).val() < 100) {
                $(this).closest('.input-block').removeClass('moving-label');
            } else {
                $(this).closest('.input-block').addClass('moving-label');
            }
        })

        inputs()
    })

    function formHandler(id, action) {
        if (action === 'newPass') {
            const userID = $(id).attr('data-post');
            let dataForm = $(id).serializeArray();
            $.ajax({
                url: myajax.url,
                type: "POST",
                data: {
                    'action': action,
                    data: [{dataForm, userID}]
                },
                success: function (response_json) {
                    const response = JSON.parse(response_json);
                    console.log(response)
                    $('.change-btn').hide()
                    $('.input-block').hide()
                    $('h2').html('Ваш пароль изменен');
                    $('.login-btn').css('display', 'flex')
                    $('.login-btn').css('margin-top', '24px')
                }
            });
        } else {
            $.ajax({
                url: myajax.url,
                type: "POST",
                data: {
                    'action': action,
                    data: $(id).serializeArray()
                },
                success: function (response_json) {
                    const response = JSON.parse(response_json);

                    console.log(response)

                    if (response === 'mail_sent') $(id).addClass('recovery-password');

                    if (response['status'] === 'redirect') {
                        if (response['parameters'] !== undefined) {
                            $.removeCookie('userID', {path: '/'});
                            $.cookie('userID', response['parameters'].userID, {expires: 30, path: '/'});
                        }
                        window.location.href = response['url']
                    }
                    if (response['status'] === 'error') {
                        $(id + ' .error').text(response['textError'])
                    }
                }
            });
        }
    }

    jQuery.validator.addMethod("laxEmail", function (value, element) {
        const pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        return this.optional(element) || pattern.test(value);
    }, 'Некорректный email');

    jQuery.validator.addMethod("valDate", function (value, element) {
        const pattern = /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/i;
        return this.optional(element) || pattern.test(value);
    }, 'Некорректная дата');

    $(document).ready(function () {
        $('.new-pass').validate({
            errorElement: 'span',
            rules: {
                password: {
                    required: true,
                    minlength: 5
                },
                new_password_repeat: {
                    equalTo: '#new_pass'
                }
            },
            messages: {
                new_password_repeat: {
                    equalTo: 'Введенные пароли не совпадают'
                }
            },
            submitHandler: function () {
                formHandler('#changing-form', 'newPass')
            }
        });
        $('#changing-form').validate({
            errorElement: 'span',
            rules: {
                password: {
                    required: true,
                    minlength: 5
                },
                new_password: {
                    required: true,
                    minlength: 5
                },
                new_password_repeat: {
                    equalTo: '#new-pass'
                }
            },
            messages: {
                new_password_repeat: {
                    equalTo: 'Введенные пароли не совпадают'
                }
            },
            submitHandler: function () {
                formHandler('#changing-form', 'passRecovery')
            }
        });
        $('#recovery-form').validate({
            errorElement: 'span',
            rules: {
                email: {
                    required: true,
                    laxEmail: true
                }
            },
            messages: {
                email: {
                    email: "Некорректный e-mail"
                }
            },
            submitHandler: function () {
                formHandler('#recovery-form', 'mailSender')
            }
        });
        $('#auth-form').validate({
            errorElement: 'span',
            rules: {
                email: {
                    required: true,
                    laxEmail: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
            },
            messages: {
                email: {
                    email: "Некорректный e-mail"
                }
            },
            submitHandler: function () {
                formHandler('#auth-form', 'authorization')
            }
        });
        $('#registration-form').validate({
            errorElement: 'span',
            rules: {
                email: {
                    required: true,
                    laxEmail: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
            },
            messages: {
                email: {
                    email: "Некорректный e-mail"
                }
            },
            submitHandler: function () {
                formHandler('#registration-form', 'registration')
            }
        });
        $('#details-form').validate({
            errorElement: 'span',
            rules: {
                email: {
                    required: true,
                    laxEmail: true
                },
                name: {
                    required: true,
                    rangelength: [2, 10]
                },
                sec_name: {
                    required: true,
                    rangelength: [2, 20]
                },
                phone: {
                    required: true
                },
                date: {
                    required: true,
                    valDate: true
                },
                sex: {
                    required: true
                },
                skill_level: {
                    required: true
                },
            },
            messages: {
                email: {
                    email: "Некорректный e-mail"
                },
                sex: {
                    required: "Выберите, пожалуйста, пол"
                },
                skill_level: "Выберите, пожалуйста, ваш уровень знаний"
            },
            submitHandler: function () {
                formHandler('#details-form', 'registrationSecond')
            }
        });
        $('#personal-form').validate({
            errorElement: 'span',
            rules: {
                laxEmail: {
                    required: true,
                    email: true
                },
                name: {
                    required: true,
                    rangelength: [2, 10]
                },
                sec_name: {
                    required: true,
                    rangelength: [2, 20]
                },
                phone: {
                    required: true
                },
                date: {
                    required: true,
                    valDate: true
                },
                sex: {
                    required: true
                },
                skill_level: {
                    required: true
                },
            },
            messages: {
                email: {
                    email: "Некорректный e-mail"
                },
                sex: {
                    required: "Выберите, пожалуйста, пол"
                },
                skill_level: "Выберите, пожалуйста, ваш уровень знаний"
            },
            submitHandler: function () {
                formHandler('#personal-form', 'updateInfo')
            }
        });
    })

    $(".phone-mask").mask("+7 (999) 999-9999");
    $(".date-mask").mask("99.99.9999");


});