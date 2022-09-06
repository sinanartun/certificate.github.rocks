const Login = function() {

    const init_config = function () {
        window.site_url = location.protocol + '//' + location.host + '/index.php';
        window.base_url = location.protocol + '//' + location.host + '/';

        if($('#csrf_token').data('action')==='register'){
            jQuery('.login-form').hide();
            jQuery('.register-form').show();
        }

    };

    const handleLogin = function() {

        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                email: {
                    required: true
                },
                password: {
                    required: true
                },
                remember: {
                    required: false
                }
            },

            messages: {
                email: {
                    required: "Email is required."
                },
                password: {
                    required: "Password is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit
                $('.alert-danger', $('.login-form')).show();
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                //form.submit(); // form validation success, call ajax form submit
                login_ajax();
            }
        });

        $('.login-form input').keypress(function(e) {
            if (e.which === 13) {
                if ($('.login-form').validate().form()) {
                    //$('.login-form').submit(); //form validation success, call ajax form submit
                    login_ajax();
                }
                return false;
            }
        });
    };


    const pulsate = function ($target) {


        $target.pulsate({color: "#bf1c56", repeat: 3})



    };


    const login_ajax = function() {
        $.ajax({
            type:     'POST',
            url:      window.base_url + 'ajax/login',
            dataType: 'json',
            data:     $('#login-form').serialize(),
            success:  function(res) {
                if (res.status === 'success') {


                    $('#login_success_msg').removeClass('hidden').removeClass('alert-danger').addClass('alert-success');
                    $('#login_success_msg > span').html(res.msg);
                    setTimeout(function() {
                        location.reload(true);
                    }, 500);
                }
                else if (res.status === 'error') {
                    $('#login_success_msg').removeClass('hidden').removeClass('alert-success').addClass('alert-danger');
                    $('#login_success_msg > span').html(res.msg);
                }
                else if (res.status === 'logged_out') {
                    location.reload(true);
                }
            },
            error:    function() {
                location.reload(true);
            },
        });

    };

    const register_ajax = function() {
        $.ajax({
            type:     'POST',
            url:      window.base_url + 'ajax/register',
            dataType: 'json',
            data:     $('#register-form').serialize(),
            success:  function(res) {
                if (res.status === 'success') {

                    $('#register_success').removeClass('hidden');
                    $('#register_success_msg').html(res.msg);

                    // setTimeout(function() {
                    //   location.reload(true);
                    // }, 500);
                }
                else if (res.status === 'error') {
                    App.alert({
                        container: '#register-form', // alerts parent container
                        place: 'append', // append or prepent in container
                        type: 'danger', // alert's type
                        message: res.msg, // alert's message
                        close: true, // make alert closable
                        reset: false, // close all previouse alerts first
                        focus: true, // auto scroll to the alert after shown
                        closeInSeconds: 0, // auto close after defined seconds
                        icon: 'fa fa-check' // put icon class before the message
                    });
                }
                else if (res.status === 'logged_out') {
                    //location.reload(true);
                }
            },
            error:    function() {
                //location.reload(true);
            },
        });

    };


    const forget_ajax = function() {
        $.ajax({
            type:     'POST',
            url:      window.base_url + 'ajax/forgot_password',
            dataType: 'json',
            data:     $('#forget-form').serialize(),
            success:  function(res) {
                if (res.status === 'success') {

                    $('#register_success').removeClass('hidden');
                    $('#register_success_msg').html(res.msg);

                    // setTimeout(function() {
                    //   location.reload(true);
                    // }, 500);
                }
                else if (res.status === 'error') {
                    // toastr.error(res.msg, 'Error');
                }
                else if (res.status === 'logged_out') {
                    //location.reload(true);
                }
            },
            error:    function() {
                //location.reload(true);
            },
        });

    };





    const handleForgetPassword = function() {
        $('.forget-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },

            messages: {
                email: {
                    required: "Email is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                //form.submit();
                send_forget_pass_ajax();
            }
        });

        $('.forget-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.forget-form').validate().form()) {
                    $('.forget-form').submit();
                }
                return false;
            }
        });

        jQuery('#forget-password').click(function() {
            jQuery('.login-form').hide();
            jQuery('.forget-form').show();
        });

        jQuery('#back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.forget-form').hide();
        });

    };


    const send_forget_pass_ajax = function () {


        //forget-form


        $.ajax({
            type:     'POST',
            url:      window.base_url + 'ajax/forgot_pass',
            dataType: 'json',
            data:     $('#forget-form').serialize(),
            success:  function(res) {
                if (res.status === 'success') {


                    App.alert({
                        container: '#forgot_pass_div', // alerts parent container
                        place: 'prepent', // append or prepent in container
                        type: 'success', // alert's type
                        message: res.msg, // alert's message
                        close: true, // make alert closable
                        reset: true, // close all previouse alerts first
                        focus: true, // auto scroll to the alert after shown
                        closeInSeconds: 10, // auto close after defined seconds
                    });





                }
                else if (res.status === 'error') {
                    // toastr.error(res.msg, 'Error');
                }
                else if (res.status === 'logged_out') {
                    //location.reload(true);
                }
            },
            error:    function() {
                //location.reload(true);
            },
        });


    };

    const handleRegister = function() {

        function format(state) {
            if (!state.id) { return state.text; }
            let $state = $(
                '<span><img src="'+ window.base_url +'assets/global/img/flags/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
            );

            return $state;
        }

        if (jQuery().select2 && $('#country_list').size() > 0) {
            $("#country_list").select2({
                placeholder: '<i class="fa fa-map-marker"></i>&nbsp;Select a Country',
                templateResult: format,
                templateSelection: format,
                width: 'auto',
                escapeMarkup: function(m) {
                    return m;
                }
            });


            $('#country_list').change(function() {
                $('.register-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
        }

        $('.register-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {

                fullname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                address: {
                    required: true
                },
                city: {
                    required: true
                },
                country: {
                    required: true
                },

                username: {
                    required: true
                },
                password: {
                    required: true
                },
                rpassword: {
                    equalTo: "#register_password"
                },

                tnc: {
                    required: true
                }
            },

            messages: { // custom messages for radio buttons and checkboxes
                tnc: {
                    required: "Please accept TNC first."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") == "tnc") { // insert checkbox errors after the container
                    error.insertAfter($('#register_tnc_error'));
                } else if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function(form) {
                //form[0].submit();
                register_ajax();
            }
        });

        $('.register-form input').keypress(function(e) {
            if (e.which === 13) {
                if ($('.register-form').validate().form()) {
                    //$('.register-form').submit();
                    register_ajax();
                }
                return false;
            }
        });

        jQuery('#register-btn').click(function() {
            jQuery('.login-form').hide();
            jQuery('.register-form').show();
        });

        jQuery('#register-back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.register-form').hide();
        });
    };


    const trig_username = function () {
        $('#username').on('change',function (e) {
            let username = $(this).val();

            const regex = /^[0-9A-Za-z_\-]+$/gm;

            if(!regex.test(username)){

                pulsate($('#username'));
                App.alert({ container: '#username_div', // alerts parent container
                    place: 'append', // append or prepent in container
                    type: 'danger', // alert's type
                    message:'Please enter valid characters', // alert's message
                    close: true, // make alert closable
                    reset: false, // close all previouse alerts first
                    focus: true, // auto scroll to the alert after shown
                    closeInSeconds: 10000, // auto close after defined seconds
                    icon: 'fa fa-check' // put icon class before the message
                });


            }




        })

    }


    return {
        //main function to initiate the module
        init: function() {
            init_config();
            handleLogin();
            handleForgetPassword();
            handleRegister();
            trig_username();

        }

    };

}();

jQuery(document).ready(function() {
    Login.init();
});
