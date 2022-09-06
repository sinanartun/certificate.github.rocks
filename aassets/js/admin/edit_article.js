"use strict";

// Class Definition
const edit_article = function () {

    let old_name = '';


    const init_save = function () {
        $('#save').on('click', function (e) {
            e.preventDefault();
            let _this = $(this);
            KTApp.progress(_this);
            let code = $('#summernote_div').summernote('code');
            let article_name = $('#article_name').val();
            $.ajax({
                type: 'POST',
                url: '/aajax/edit_article_update',
                dataType: 'json',
                data: {
                    code: code,
                    name: article_name,
                    old_name:old_name
                },
                success: function (res) {
                    KTApp.unprogress(_this);
                    if (typeof res !== 'undefined' && res !== null && res !== '') {
                        if (typeof res.status !== 'undefined' && res.status !== '' && res.status !== null) {
                            if(res.status ==='success'){
                                swal.fire(res.status, res.msg, "success").then(function () {

                                });

                            }else{
                                swal.fire(res.status, res.msg, "error").then(function () {

                                });
                            }


                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {
                    KTApp.unprogress(_this);
                },

            });

        });
    };


    const init_summernote = function () {
        $('#summernote_div').summernote({
            height: $(document).height() - 550,
            focus: true,
            minHeight: 500,
        });

        $('#clear').on('click',function (e) {
            e.preventDefault();
            $('#summernote_div').summernote('code', '');
        })

    };


    const init_select_article = function () {

        $('#article_selector').select2({
            placeholder: "Select Article"
        });


        $('#article_selector').on('change',function () {

            let file_name  = $(this).val();
            $.ajax({
                type: 'POST',
                url: '/aajax/get_html_file',
                dataType: 'json',
                data: {file_name: file_name},
                success: function (res) {
                    if (typeof res !== 'undefined' && res !== null && res !== '') {
                        if (typeof res.status !== 'undefined' && res.status === 'success') {

                            if (typeof res.data !== 'undefined' && typeof res.data.html !== 'undefined') {


                                init_summernote();
                                $('#summernote_div').summernote('code', res.data.html);

                                $('#article_name').val(res.data.name);
                                old_name = res.data.name;


                            }


                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                },

            });



        });





    };


    // Public Functions
    return {
        // public functions
        init: function () {
            //init_summernote();
            init_select_article();
            init_save();



        }
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    edit_article.init();
});
