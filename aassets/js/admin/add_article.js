"use strict";

// Class Definition
const add_article = function () {

    const init_save_draft = function () {
        $('#save_draft').on('click', function (e) {
            e.preventDefault();
            let code = $('#summernote_div').summernote('code');
            let article_name = $('#article_name').val();
            $.ajax({
                type: 'POST',
                url: '/aajax/add_article_save_draft',
                dataType: 'json',
                data: {
                    code: code,
                    name: article_name
                },
                success: function (res) {
                    if (typeof res !== 'undefined' && res !== null && res !== '') {
                        if (typeof res.status !== 'undefined' && res.status === 'success') {

                            swal.fire(res.status, res.msg, "success").then(function () {

                            });

                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                },

            });

        });
    };

    const init_save = function () {
        $('#save').on('click', function (e) {
            e.preventDefault();
            let _this = $(this);
            KTApp.progress(_this);
            let code = $('#summernote_div').summernote('code');
            let article_name = $('#article_name').val();
            $.ajax({
                type: 'POST',
                url: '/aajax/add_article_save',
                dataType: 'json',
                data: {
                    code: code,
                    name: article_name
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


    const get_draft = function () {
        $.ajax({
            type: 'POST',
            url: '/aajax/add_article_get_draft',
            dataType: 'json',
            success: function (res) {
                if (typeof res !== 'undefined' && res !== null && res !== '') {
                    if (typeof res.status !== 'undefined' && res.status === 'success') {
                        if (typeof res.data !== 'undefined' && res.data !== '' && res.data !== null) {
                            if (typeof res.data.code !== 'undefined' && res.data.code !== '' && res.data.code !== null) {
                                $('#summernote_div').summernote('code', res.data.code);
                            }

                            if (typeof res.data.name !== 'undefined' && res.data.name !== '' && res.data.name !== null) {
                                $('#article_name').val(res.data.name);
                            }

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
        init: function () {
            init_save_draft();
            init_summernote();
            get_draft();
            init_save();

        }
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    add_article.init();
});
