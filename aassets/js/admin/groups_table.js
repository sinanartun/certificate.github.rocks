"use strict";

// Class Definition
const groups_table = function() {

    const form = $('form#add_group_form');

    const showErrorMsg = function(form, type, msg) {
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


    const handle_add_group_submit = function() {
        $('#add_group_btn').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            const form = $('form#add_group_form');

            form.validate({
                rules: {
                    name: {
                        required: true
                    },
                    description: {
                        required: true
                    },
                    group_level: {
                        required: true,
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                type: 'POST',
                url: '/aajax/add_group',
                dataType: 'json',
                success: function(res, status, xhr, $form) {
                    // similate 2s delay
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                    if(xhr.status !== 200){
                        showErrorMsg(form, 'danger', 'Unable to complete request. Please try again later.');

                    }

                    if(res.status === 'success'){


                        swal.fire({
                            text: res.msg,
                            type: 'success',
                            showCancelButton: false,
                        });

                        $("#kt_modal_6").modal("hide");

                        window.table.ajax.reload();
                    }
                    if(res.status === 'error'){

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

    const trig_del_row = function () {
        $('.del_row').on('click', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            if (typeof id === 'undefined' || id === '' || id === null) {
                return false;
            }

            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!<br>Note: All group members will be moved to default user group.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then(function (result) {
                if (result.value) {
                    del_group(id);
                }
            });


        });
    };




    const del_group = function(id){
        $.ajax({
            type: 'POST',
            url: '/aajax/del_group',
            dataType: 'json',
            data: {id: id},
            success: function (res) {
                if (typeof res !== 'undefined' && res !== null && res !== '') {
                    if (typeof res.status !== 'undefined') {

                        if(res.status === 'success'){
                            swal.fire(res.status, res.msg, "success").then(function () {
                                window.table.ajax.reload();
                            });
                        }else{
                            swal.fire(res.status, res.msg, "error").then(function () {
                                window.table.ajax.reload();
                            });
                        }



                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });
    };






    // Public Functions
    return {
        // public functions
        init: function() {

            handle_add_group_submit();
            trig_del_row();

        },
        trig_del_user:function () {
            trig_del_row();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    groups_table.init();
});
