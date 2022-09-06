"use strict";

// Class Definition
const add_user = function() {

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
            url: "/aajax/upload_profile_image", // Set the url for your upload script location
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
            console.log(a)
            console.log(b)
            if(typeof b !== 'undefined' &&  b !== null && b !== ''){
                if(typeof b.data !== 'undefined' &&  b.data !== null && b.data !== ''){
                    if(typeof b.data.url !== 'undefined' &&  b.data.url !== null && b.data.url !== ''){
                        $('#add_user_img').attr('src',b.data.url)
                    }
                }
            }

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
                    },
                    password: {
                        required: true
                    },
                    password_confirm: {
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
                url: '/aajax/add_user',
                dataType: 'json',
                beforeSubmit: function(arr, $form, options) {
                    // form data array is an array of objects with name and value properties
                    // [ { name: 'username', value: 'jresig' }, { name: 'password', value: 'secret' } ]
                    // return false to cancel submit
                    // console.log(arr);
                    // console.log($form);
                    // console.log(options);
                },
                beforeSerialize: function($form, options) {
                    // return false to cancel submit
                    console.log($form);
                    console.log(options);
                },
                success: function(res, status, xhr, $form) {
                	// similate 2s delay
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                    if(xhr.status !== 200){
                        showErrorMsg(form, 'danger', 'Unable to complete request. Please try again later.');

                    }

                    if(res.status === 'success'){
                        // form.clearForm();
                        // form.validate().resetForm();

                        showErrorMsg(form, 'success', res.msg);
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




    // Public Functions
    return {
        // public functions
        init: function() {
            handle_add_user_submit();
            handle_image_upload();

        }
    };
}();




// Class Initialization
jQuery(document).ready(function() {
    add_user.init();
});
