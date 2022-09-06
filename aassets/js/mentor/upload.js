"use strict";

// Class Definition
const empty = function() {

    const trig_upload = function() {



        var dropzone = new Dropzone('#kt_dropzone_3', { // Make the whole body a dropzone
            url: "/aajax/upload_media", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            parallelUploads:10,
            maxFiles: 100,
            timeout:0,
            maxFilesize: 4096, // MB
            addRemoveLinks: true,
            acceptedFiles: "image/*,.mp4",
        });


        dropzone.on("removedfile", function(file) {
            // Hookup the start button
            console.log(file);
            let file_name = file.name;


            $.ajax({
                type: 'POST',
                url: '/aajax/remove_media',
                dataType: 'json',
                data:{file_name:file_name},
                success: function(res)
                {
                    if(typeof res !== 'undefined' && res !== null && res !== ''){
                        if(typeof res.status !== 'undefined' && res.status === 'success'){

                            // swal.fire(res.status, res.msg, "success").then(function() {
                            //     location.reload()
                            // });

                        }

                    }




                },
                error: function(xhr, ajaxOptions, thrownError)
                {

                },

            });

        });



    };


    // Public Functions
    return {
        // public functions
        init: function() {

            trig_upload();


        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    empty.init();
});
