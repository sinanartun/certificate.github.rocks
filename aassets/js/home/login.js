"use strict";

// Class Definition
var KTLoginGeneral = function() {

    var login = $('#kt_login');

    var showErrorMsg = function(form, type, msg) {
        var alert = $('<div class="alert alert-' + type + ' alert-dismissible" role="alert">\
			<div class="alert-text">'+msg+'</div>\
			<div class="alert-close">\
                <i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i>\
            </div>\
		</div>');

        form.find('.alert').remove();
        alert.prependTo(form);
        //alert.animateClass('fadeIn animated');
        KTUtil.animateClass(alert[0], 'fadeIn animated');
        alert.find('span').html(msg);
    };

    // Private Functions
    var displaySignUpForm = function() {
        login.removeClass('kt-login--forgot');
        login.removeClass('kt-login--signin');
        login.removeClass('kt-login--reset_password');

        login.addClass('kt-login--signup');
        KTUtil.animateClass(login.find('.kt-login__signup')[0], 'flipInX animated');
    };



    var displayResetPasswordForm = function() {
        login.removeClass('kt-login--forgot');
        login.removeClass('kt-login--signin');

        login.addClass('kt-login--reset_password');
        KTUtil.animateClass(login.find('.kt-login__reset_password')[0], 'flipInX animated');
    };



    var displaySignInForm = function() {
        login.removeClass('kt-login--forgot');
        login.removeClass('kt-login--signup');
        login.removeClass('kt-login--reset_password');

        login.addClass('kt-login--signin');
        KTUtil.animateClass(login.find('.kt-login__signin')[0], 'flipInX animated');
        //login.find('.kt-login__signin').animateClass('flipInX animated');
    };

    var displayForgotForm = function() {
        login.removeClass('kt-login--signin');
        login.removeClass('kt-login--signup');
        login.removeClass('kt-login--reset_password');

        login.addClass('kt-login--forgot');
        //login.find('.kt-login--forgot').animateClass('flipInX animated');
        KTUtil.animateClass(login.find('.kt-login__forgot')[0], 'flipInX animated');

    };

    var handleFormSwitch = function() {
        $('#kt_login_forgot').click(function(e) {
            e.preventDefault();
            displayForgotForm();
        });

        $('#kt_login_forgot_cancel').click(function(e) {
            e.preventDefault();
            displaySignInForm();
        });

        $('#kt_login_signup').click(function(e) {
            e.preventDefault();
            displaySignUpForm();
        });

        $('#kt_login_signup_cancel').click(function(e) {
            e.preventDefault();
            displaySignInForm();
        });

        $('#kt-login__reset_password').click(function(e) {
            e.preventDefault();
            displayResetPasswordForm();
        });

        $('#kt_login_reset_password_cancel').click(function(e) {
            e.preventDefault();
            displaySignInForm();
        });

    };

    var handleSignInFormSubmit = function() {
        $('#kt_login_signin_submit').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                type: 'POST',
                url: 'ajax/login',
                dataType: 'json',
                success: function(res, status, xhr, $form) {
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                    if(xhr.status !== 200){
                        showErrorMsg(form, 'danger', 'Incorrect username or password. Please try again.');

                    }

                    if(res.status === 'success'){
                        showErrorMsg(form, 'success', res.msg);
                        if(typeof res.data !== 'undefined' && typeof res.data.redirect !== 'undefined' ){

                            window.location.href = res.data.redirect;
                        }


                    }else if(res.status==='error'){
                        showErrorMsg(form, 'danger', res.msg);
                    }



                },
                error:    function() {
                    showErrorMsg(form, 'danger', 'Incorrect username or password. Please try again.');
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                },
            });
        });
    };

    var handleSignUpFormSubmit = function() {
        $('#kt_login_signup_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    fullname: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    },
                    rpassword: {
                        required: true
                    },
                    agree: {
                        required: true
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                type: 'POST',
                url: 'ajax/register',
                dataType: 'json',
                success: function(res, status, xhr, $form) {
                	// similate 2s delay
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                    if(xhr.status !== 200){
                        showErrorMsg(form, 'danger', 'Unable to complete request. Please try again later.');

                    }

                    if(status === 'success'){
                        form.clearForm();
                        form.validate().resetForm();
                        displaySignInForm();
                        var signInForm = login.find('.kt-login__signin form');
                        signInForm.clearForm();
                        signInForm.validate().resetForm();

                        showErrorMsg(signInForm, 'success', 'Thank you. To complete your registration please check your email.');
                    }



                },
                error:    function() {
                    showErrorMsg(form, 'danger', 'Unable to complete request. Please try again later.');
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                },
            });
        });
    };

    var handleForgotFormSubmit = function() {
        $('#kt_login_forgot_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                type: 'POST',
                url: 'ajax/forgot_password',
                dataType: 'json',
                success: function(res, status, xhr, $form) {

                    console.log(status)
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);


                    var signInForm = login.find('.kt-login__signin form');
                    signInForm.clearForm();
                    signInForm.validate().resetForm();
                    if(xhr.status !== 200){
                        showErrorMsg(form, 'danger', 'Unable to complete request. Please try again later.');

                    }

                    if(res.status === 'success'){
                        displaySignInForm();
                        showErrorMsg(signInForm, 'success', res.msg);

                    } else if (res.status === 'error'){
                        displaySignInForm();
                        showErrorMsg(signInForm, 'danger', res.msg);

                    }
                },
                error:    function() {
                    showErrorMsg(form, 'danger', 'Unable to complete request. Please try again later.');
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                },
            });
        });
    };

    var handlereset_passwordFormSubmit = function() {
        $('#kt_login_reset_password_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                type: 'POST',
                url: 'ajax/forgot_password',
                dataType: 'json',
                success: function(res, status, xhr, $form) {

                    console.log(status)
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);


                    var signInForm = login.find('.kt-login__signin form');
                    signInForm.clearForm();
                    signInForm.validate().resetForm();
                    if(xhr.status !== 200){
                        showErrorMsg(form, 'danger', 'Unable to complete request. Please try again later.');

                    }

                    if(res.status === 'success'){
                        displayResetPasswordForm();
                        showErrorMsg(signInForm, 'success', res.msg);

                    } else if (res.status === 'error'){
                        displayForgotForm();
                        showErrorMsg(form, 'danger', res.msg);

                    }
                },
                error:    function() {
                    showErrorMsg(form, 'danger', 'Unable to complete request. Please try again later.');
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                },
            });
        });
    };



    const checkFlashData = function () {
        if(typeof flashdata !== 'undefined'){
            const signInForm = login.find('.kt-login__signin form');
            showErrorMsg(signInForm, flashdata.message_type, flashdata.message);
        }
    };

    const redirect = function () {
        if(typeof data !== 'undefined'){

        }
    };


    // Public Functions
    return {
        // public functions
        init: function() {
            checkFlashData();
            handleFormSwitch();
            handleSignInFormSubmit();
            handleSignUpFormSubmit();
            handleForgotFormSubmit();
            handlereset_passwordFormSubmit();
            redirect();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLoginGeneral.init();
});
