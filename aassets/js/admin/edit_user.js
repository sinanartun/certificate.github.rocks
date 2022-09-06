"use strict";

// Class Definition
const edit_user = function() {

    const form = $('#add_user_form');

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

    const handle_image_upload = function () {
        // set the dropzone container id
        let id = '#kt_dropzone_5';

        // set the preview element template
        let previewNode = $(id + " .dropzone-item");
        previewNode.id = "";
        let previewTemplate = previewNode.parent('.dropzone-items').html();
        previewNode.remove();

        var myDropzone5 = new Dropzone(id, { // Make the whole body a dropzone
            url: "/aajax/update_profile_image", // Set the url for your upload script location
            parallelUploads: 1,
            uploadMultiple:false,
            maxFilesize: 5, // Max filesize in MB
            maxFiles:1,
            previewTemplate: previewTemplate,
            previewsContainer: id + " .dropzone-items", // Define the container to display the previews
            clickable: id + " .dropzone-select" // Define the element that should be used as click trigger to select files.
        });

        myDropzone5.on("addedfile", function(file) {
            // Hookup the start button
            $(document).find( id + ' .dropzone-item').css('display', '');
        });

        // Update the total progress bar
        myDropzone5.on("totaluploadprogress", function(progress) {
            $( id + " .progress-bar").css('width', progress + "%");
        });

        myDropzone5.on("sending", function(file,a,b) {

            b.set('id',$('#user_id').val());

            $( id + " .progress-bar").css('opacity', "1");
        });

        myDropzone5.on("success", function(a,b) {

            if(typeof b !== 'undefined' &&  b !== null && b !== ''){
                if(typeof b.data !== 'undefined' &&  b.data !== null && b.data !== ''){
                    if(typeof b.data.url !== 'undefined' &&  b.data.url !== null && b.data.url !== ''){
                                $('#add_user_img').attr('src',b.data.url)
                    }
                }
            }


            window.table.ajax.reload();
        });

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone5.on("complete", function(progress) {
            var thisProgressBar = id + " .dz-complete";
            setTimeout(function(){
                $( thisProgressBar + " .progress-bar, " + thisProgressBar + " .progress").css('opacity', '0');
            }, 300)
        });
    };

    const handle_add_user_submit = function() {
        $('#add_user_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    first_name: {
                        required: true
                    },
                    last_name: {
                        required: true
                    },
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
                url: '/aajax/update_user',
                dataType: 'json',
                success: function(res, status, xhr, $form) {

                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                    if(xhr.status !== 200){
                        showErrorMsg(form, 'danger', 'Unable to complete request. Please try again later.');

                    }


                    if(xhr.responseJSON.status  === 'success'){

                        showErrorMsg(form, 'success', res.msg);
                    }else{
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

    const trig_del_user = function () {
        $('#delete_user_btn').on('click', function (e) {
            e.preventDefault();
            let id = $('#user_id').val();
            if (typeof id === 'undefined' || id === '' || id === null) {
                return false;
            }

            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then(function (result) {
                if (result.value) {
                    del_user(id);
                }
            });


        });
    };


    const del_user = function(id){
        $.ajax({
            type: 'POST',
            url: '/aajax/del_user',
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

            handle_add_user_submit();
            handle_image_upload();
            trig_del_user();

        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    edit_user.init();
});
