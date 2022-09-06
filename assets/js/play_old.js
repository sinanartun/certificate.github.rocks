"use strict";

// Class Definition
const play = function () {

// Step 1 Functions START
// Step 1 Functions END

// Step 2 Functions START
// Step 2 Functions END

// Step 3 Functions START
// Step 3 Functions END
    const media_title = function () {
        $('.lecture_box').on('click', function (e) {
            e.preventDefault();

            $('.media_title').removeClass("kt-hidden");


            const kaybolmaa = function () {

                $('.media_title').addClass("kt-hidden");

            };

            setTimeout(kaybolmaa, 3000)

        });
    };


    const media_title_onmouseover = function () {

        $('#lecture_video_player').on('mousemove', function (e) {
            e.stopPropagation();
            e.preventDefault();


            $('.media_title').addClass("kt-hidden").removeClass("kt-hidden");

            const kaybolma = function () {

                $('.media_title').removeClass("kt-hidden").addClass("kt-hidden");

            };

            setTimeout(kaybolma, 3000)


        });


    };

    


    const trig_send_question = function () {
        $('#send_question_btn').on('click', function (e) {
            e.preventDefault();
            let text = $('#summernote_div').summernote('code');
            let course_code = $(this).data('course_code');
            let type = $(this).data('type');


            $.ajax({
                type: 'POST',
                url: '/uajax/ask_question',
                dataType: 'json',
                data: {
                    text: text,
                    course_code: course_code,
                    type: type

                },
                success: function (res) {
                    if (typeof res !== 'undefined' && res !== null && res !== '' && typeof res.status !== 'undefined') {
                        if (res.status === 'success') {

                            swal.fire(res.status, res.msg, "success").then(function () {
                                $('#yasuo_div').removeClass('kt-hidden').addClass('kt-hidden');
                                $('#ask_question_btn').removeClass('kt-hidden');
                                $('#summernote_div').summernote('code', '');

                                rerender_qa(course_code);


                            });

                        } else {
                            swal.fire(res.status, res.msg, res.status)
                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                },

            });

        });
    };


    const rerender_question_answers = function (qid) {
        $.ajax({
            type: 'POST',
            url: '/uajax/get_answers',
            dataType: 'json',
            data: {
                qid: qid,

            },
            success: function (res) {
                if (typeof res !== 'undefined' && res !== null && res !== '') {
                    if (typeof res.status !== 'undefined' && res.status === 'success') {


                        if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {
                            render_question_answers(res.data);

                        }

                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });
    };


    const trig_edit_question_btn = function () {
        $('#edit_question_btn').off('click').on('click', function (e) {
            e.preventDefault();
            const $parent = $(this).closest('.kt-widget3__item');
            let text = $(this).closest('.kt-widget3__item').find('.edit_question_div').eq(0).summernote('code');
            let qid = $(this).closest('.kt-widget3__item').find('div.kt-widget3__header > span').data('qid');
            let course_code = $(this).closest('.kt-widget3__item').find('div.kt-widget3__header > span').data('course_code');
            $.ajax({
                type: 'POST',
                url: '/uajax/update_q',
                dataType: 'json',
                data: {
                    text: text,
                    qid: qid

                },
                success: function (res) {
                    if (typeof res !== 'undefined' && res !== null && res !== '' && typeof res.status !== 'undefined') {
                        if (res.status === 'success') {

                            swal.fire(res.status, res.msg, "success").then(function () {
                                $parent.find('div.edit_question_div').summernote('destroy');
                                $parent.find('div.edit_question_btnset').remove();
                                $parent.find('div.edit_question_div').remove();
                                $parent.find('span.question_edit').eq(0).removeClass('kt-hidden');

                                rerender_qa(course_code);


                            });

                        } else {
                            swal.fire(res.status, res.msg, res.status)
                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                },

            });
        });
    };


    const trig_edit_qa_btn = function () {
        $('#edit_question_btn').off('click').on('click', function (e) {
            e.preventDefault();
            const $parent = $(this).closest('.kt-widget3__item');
            let text = $(this).closest('.kt-widget3__item').find('.edit_question_div').eq(0).summernote('code');
            let qid = $(this).closest('.kt-widget3__item').find('div.kt-widget3__header > span').data('qid');
            $.ajax({
                type: 'POST',
                url: '/uajax/update_q',
                dataType: 'json',
                data: {
                    text: text,
                    qid: qid

                },
                success: function (res) {
                    if (typeof res !== 'undefined' && res !== null && res !== '' && typeof res.status !== 'undefined') {
                        if (res.status === 'success') {

                            swal.fire(res.status, res.msg, "success").then(function () {
                                $parent.find('div.edit_question_div').summernote('destroy');
                                $parent.find('div.edit_question_btnset').remove();
                                $parent.find('div.edit_question_div').remove();
                                $parent.find('span.question_edit').eq(0).removeClass('kt-hidden');

                                rerender_question_answers(qid);


                            });

                        } else {
                            swal.fire(res.status, res.msg, res.status)
                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                },

            });
        });
    };


    const trig_edit_question = function () {
        $('button.question_edit').off('click').on('click', function (e) {
            e.preventDefault();


            let html = '';

            html += ' <div class="col-md-12 edit_question_btnset kt-pr0">' +
                '<div class="kt-section__content kt-section__content--solid kt-align-right kt-pt15 kt-pb-30">' +
                '<button id="cancel_edit_question" type="button" class="btn btn-warning">Iptal</button>' +
                '<button id="edit_question_btn" type="button" class="btn btn-success">Gonder</button>' +
                '</div>' +
                '</div>';

            let old_html = $(this).closest('.kt-widget3__item').find('div.kt-widget3__body > span.kt-widget3__text').eq(0).html();
            console.log(old_html);
//#question_answers > div:nth-child(1) > div.kt-widget3__body > span
            $(this).closest('.kt-widget3__item').find('.kt-widget3__body').eq(0).append('<div class="edit_question_div"></div>' + html);
            $(this).closest('.kt-widget3__item').find('.edit_question_div').eq(0).summernote('code', old_html);
            // $(this).closest('.kt-widget3__item').find('span.question_edit').eq(0).addClass('kt-hidden');
            $('span.question_edit').addClass('kt-hidden');
            $(this).closest('.kt-widget3__item').find('button.answer_question.answer_btn_form').eq(0).addClass('kt-hidden');
            $(this).closest('.kt-widget3__item').find('.kt-widget3__body').eq(0).css('border-bottom-color', '#E91E63;');

            trig_cancel_edit();
            trig_edit_question_btn();

        })
    };


    const trig_cancel_edit = function () {
        $('#cancel_edit_question').on('click', function (e) {
            e.preventDefault();

            const $parent = $(this).closest('.kt-widget3__item');
            $parent.find('div.edit_question_div').summernote('destroy');
            $parent.find('div.edit_question_btnset').remove();
            $parent.find('div.edit_question_div').remove();
            $('span.question_edit').removeClass('kt-hidden');
            $parent.find('button.answer_question.answer_btn_form').eq(0).removeClass('kt-hidden');
            $parent.find('div.kt-widget3__body').eq(0).css('border-bottom-color', '#0a6aa1;');

        })


    };


    const trig_view_question_answers = function () {
        $('.ask_question_view').on('click', function (e) {
            e.preventDefault();
            let qid = $(this).parent().data('qid');

            rerender_question_answers(qid);


        });
    };


    const render_question_answers = function (data) {
        $('#question_answers').html('');


        let html = '';


        html +=
            '<div class="row kt-pb-20 kt-pl20">' +
            '<button  type="button" class="btn btn-warning btn-sm" id="return_questions" data-course_code="' + data.question.course_code + '"><i class="flaticon2-back"></i> Geriye dön</button>' +
            '</div>' +
            '<div class="kt-widget3__item kt-pt10" >' +
            '<div class="kt-widget3__header" >' +
            '<div class="kt-widget3__user-img">' +
            '<img class="kt-widget3__img" src="/uploads/thumb_' + data.question.profile_img + '" alt="">' +
            '</div>' +
            '<div class="kt-widget3__info">' +
            '<a href="#" class="kt-widget3__username">' + data.question.first_name + ' ' + data.question.last_name + '</a><br>' +
            '<span class="kt-widget3__time">' + data.question.ago + '</span>' +
            '</div>' +
            '<span class="kt-widget3__status kt-font-info pull-right" data-qid=' + data.question.id + '>' +
            '<span class="like_count">' + data.question.like + '</span><button class="btn btn-secondary btn-pill like_question" data-qid=' + data.question.id + '  ><i class="flaticon-like"></i></button>' +
            '<span class="answers_count">' + data.question.answer_count + '</span><button class="btn btn-secondary btn-pill comment_count"><i class="flaticon-comment"></i></button>';

        if (data.the_user_id === parseInt(data.question.user_id)) {
            html += '<span class="question_edit"><button class="btn btn-secondary btn-pill question_edit" data-qid="1"><i class="flaticon-edit"></i></button></span>' +
                '<span class="question_delete"><button class="btn btn-secondary btn-pill question_delete" data-qid="' + data.course_code + '"><i class="flaticon2-rubbish-bin-delete-button"></i></button></span>';
        }

        html += '<button  type="button" class="btn btn-success btn-sm answer_question answer_btn_form" data-qid="' + data.question.id + '">Cevapla</button>' +
            '</span>' +
            '</div>' +
            '<div class="kt-widget3__body" style="border-bottom: solid 1px; border-bottom-color: #0a6aa1;" >' +
            '<span class="kt-widget3__text" >' + data.question.text + '</span>';
        html += '</div>' +
            '</div>';

        for (let i = 0; i < data.answers.length; i++) {
            html += '<div class="kt-widget3__item">' +
                '<div class="kt-widget3__header">' +
                '<div class="kt-widget3__user-img">' +
                '<img class="kt-widget3__img" src="/uploads/thumb_' + data.answers[i].profile_img + '" alt="">' +
                '</div>' +
                '<div class="kt-widget3__info">' +
                '<a href="#" class="kt-widget3__username">' + data.answers[i].first_name + '&nbsp;' + data.answers[i].last_name + '</a><br>' +
                '<span class="kt-widget3__time">' + data.answers[i].ago + '</span>' +
                '</div>' +
                '<span class="kt-widget3__status kt-font-info pull-right" data-qid=' + data.answers[i].id + '>' +
                '<span class="like_count">' + data.answers[i].like + '</span>' +
                '<button class="btn btn-secondary btn-pill like_question" data-qid=' + data.answers[i].id + '  ><i class="flaticon-like"></i></button>';


            if (data.the_user_id === parseInt(data.answers[i].user_id)) {
                html += '<span class="question_edit">' +
                    '<button class="btn btn-secondary btn-pill question_edit" data-qid="' + data.answers[i].id + '"><i class="flaticon-edit"></i></button>' +
                    '</span>' +
                    '<span class="question_delete">' +
                    '<button class="btn btn-secondary btn-pill question_delete" data-qid="' + data.question.course_code + '"><i class="flaticon2-rubbish-bin-delete-button"></i></button>' +
                    '</span>';

            }


            html += '</span>' +
                '</div>' +
                '<div class="kt-widget3__body">' +
                '<span class="kt-widget3__text">' + data.answers[i].text + '</span>' +
                '</div>' +
                '</div>';

            html += '</div>' +
                '</div>';
        }


        // html += '</div>' +
        //     '</div>';

        $('#question_answers').html(html);


        trig_answer_btn();
        trig_return_btn();
        trig_answer_question();
        trig_like();
        trig_del_question();
        trig_edit_question();
        trig_edit_qa_btn();

    };


    const trig_return_btn = function () {

        $('#return_questions').off('click').on('click', function (e) {
            e.preventDefault();
            remove_answer_box();


            let course_code = $(this).data('course_code');

            $.ajax({
                type: 'POST',
                url: '/uajax/get_qa',
                dataType: 'json',
                data: {
                    course_code: course_code,

                },
                success: function (res) {
                    if (typeof res !== 'undefined' && res !== null && res !== '') {
                        if (typeof res.status !== 'undefined' && res.status === 'success') {


                            if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {
                                render_qa(res.data);

                            }

                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                },

            });


        })


    };


    const rerender_qa = function (course_code) {
        $.ajax({
            type: 'POST',
            url: '/uajax/get_qa',
            dataType: 'json',
            data: {
                course_code: course_code,

            },
            success: function (res) {
                if (typeof res !== 'undefined' && res !== null && res !== '') {
                    if (typeof res.status !== 'undefined' && res.status === 'success') {


                        if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {
                            render_qa(res.data);

                        }

                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });


    };


    const trig_send_answer = function () {

        $('#send_answer_btn').off('click').on('click', function (e) {
            e.preventDefault();

            let qid = $(this).data('qid');
            let text = $('#summernote_div2').summernote('code');

            $.ajax({
                type: 'POST',
                url: '/uajax/answer_q',
                dataType: 'json',
                data: {
                    qid: qid,
                    text: text,

                },
                success: function (res) {
                    if (typeof res !== 'undefined' && res !== null && res !== '') {
                        if (typeof res.status !== 'undefined' && res.status === 'success') {

                            swal.fire(res.status, res.msg, "success").then(function () {
                                rerender_question_answers(qid);
                                remove_answer_box();


                            });

                            if (typeof res.data !== 'undefined' && typeof res.data.answer_count !== 'undefined') {

                                $('#answers_count').html(res.data.answer_count)

                            }


                        } else {
                            swal.fire(res.status, res.msg, "error")
                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                    swal.fire(res.status, res.msg, "error")
                },

            });


        })


    };


    const render_qa = function (data) {

        let html = '';

        for (let i = 0; i < data.length; i++) {
            html +=
                '<div class="kt-widget3__item">' +
                '<div class="kt-widget3__header">' +
                '<div class="kt-widget3__user-img">' +
                '<img class="kt-widget3__img" src="/uploads/thumb_' + data[i].profile_img + '" alt="">' +
                '</div>' +
                '<div class="kt-widget3__info">' +
                '<a href="#" class="kt-widget3__username">' + data[i].first_name + '&nbsp;' + data[i].last_name + '</a><br>' +
                '<span class="kt-widget3__time">' + data[i].ago + '</span>' +
                '</div>' +
                '<span class="kt-widget3__status kt-font-info" data-qid="' + data[i].id + '" data-course_code="' + data[i].course_code + '" >' +

                '<span class="like_count">' + data[i].like + '</span>' +
                '<button class="btn btn-secondary btn-pill like_question" ><i class="flaticon-like"></i></button>' +

                '<span class="answers_count">' + data[i].answer_count + '</span>' +
                '<button class="btn btn-secondary btn-pill comment_count"><i class="flaticon-comment"></i></button>';


            if (data[i].edit === true) {
                html += '<span class="question_edit">' +
                    '<button class="btn btn-secondary btn-pill question_edit" ><i class="flaticon-edit"></i></button>' +
                    '</span>' +

                    '<span class="question_delete">' +
                    '<button class="btn btn-secondary btn-pill question_delete" ><i class="flaticon2-rubbish-bin-delete-button"></i></button>' +
                    '</span>';

            }


            html += '<button  type="button" class="btn btn-success btn-sm ask_question_view" >Cevapları Gör</button>' +
                '</span>' +
                '</div>' +
                '<div class="kt-widget3__body">' +
                '<span class="kt-widget3__text">' + data[i].text + '</span>' +
                '</div>' +
                '</div>';
        }
        $('#question_answers').html(html);
        trig_view_question_answers();
        trig_like();
        trig_del_question();
        trig_edit_question();

    };


    const trig_answer_btn = function () {

        $('.answer_question').off('click').on('click', function (e) {
            e.preventDefault();

            let qid = $(this).data('qid');


            $.ajax({
                type: 'POST',
                url: '/uajax/answer_question',
                dataType: 'json',
                data: {
                    qid: qid,

                },
                success: function (res) {
                    if (typeof res !== 'undefined' && res !== null && res !== '') {
                        if (typeof res.status !== 'undefined' && res.status === 'success') {


                            if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {
                                render_question_answers(res.data);

                            }

                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                },

            });


        })


    };





    const trig_ask_question = function () {
        $('#ask_question_btn').on('click', function (e) {
            e.preventDefault();

            $('#yasuo_div').removeClass('kt-hidden');
            $('#ask_question_btn').addClass('kt-hidden');

        });
    };


    const trig_send_question_close_btn_2 = function () {
        $('#send_question_close_btn_2').on('click', function (e) {
            e.preventDefault();
            $('.answer_btn_form').removeClass('kt-hidden');
            $('.question_edit').removeClass('kt-hidden');
            remove_answer_box();

        });
    };


    const remove_answer_box = function () {
        $('#summernote_div2').summernote('destroy');
        $("#answer_question_div").remove();

    };


    const trig_like = function () {

        $('.like_question').off('click').on('click', function (e) {
            e.preventDefault();

            let $this = $(this);
            let qid = $(this).parent().data('qid');


            $.ajax({
                type: 'POST',
                url: '/uajax/like_q',
                dataType: 'json',
                data: {
                    qid: qid,

                },
                success: function (res) {
                    if (typeof res !== 'undefined' && res !== null && res !== '') {
                        if (typeof res.status !== 'undefined' && res.status === 'success') {


                            if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {
                                if (typeof res.data.total_like !== 'undefined') {

                                    $this.parent().parent().find('span.like_count').eq(0).html(res.data.total_like);

                                }

                            }

                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                },

            });


        })


    };


    const trig_answer_question = function () {

        $('.answer_question').off('click').on('click', function (e) {
            e.preventDefault();

            $('.answer_btn_form').addClass('kt-hidden');
            $('.question_edit').addClass('kt-hidden');

            let qid = $(this).data('qid');

            let new_html = '<div class="row kt-pb-20 kt-pl0 kt-pr0 kt-pt20 kt-pb-30" id="answer_question_div">' +
                '<div class="col-md-12">' +
                '<div id="summernote_div2"></div>' +
                '</div>' +

                '<div class="col-md-12">' +
                '<div class="kt-section__content kt-section__content--solid kt-align-right kt-pt15 kt-pb-30">' +
                '<button id="send_question_close_btn_2" type="button" class="btn btn-warning">Iptal</button>' +
                '<button data-qid="' + qid + '" data-type="0" id="send_answer_btn" type="button" class="btn btn-success">Gonder</button>' +
                '</div>' +
                '</div>' +
                '</div>';

            $(this).parent().parent().parent().parent().parent().append(new_html);

            $('#summernote_div2').summernote({
                height: 250,
                airMode: false,
                focus: true,
                disableDragAndDrop: true,
                minHeight: 100,
                codemirror: { // codemirror options
                    theme: 'monokai'
                }

            });


            trig_send_question_close_btn_2();
            trig_send_answer();

        });


    };


    const trig_lecture_select = function () {
        $('.lecture_box').on('click', function (e) {
            e.preventDefault();

            $('.lecture_box').removeClass('playNow');

            $(this).addClass('playNow');


            videojs('lecture_video_player').src($(this).data('media'));
            videojs('lecture_video_player').play();
            $('.media_title').html("").html($(this).data('media_title'));

        });
    };


    const init_summernote = function () {
        $('#summernote_div').summernote({
            height: 250,
            airMode: false,
            focus: true,
            disableDragAndDrop: true,
            minHeight: 100,
            codemirror: { // codemirror options
                theme: 'monokai'
            }

        });

        $('#clear').on('click', function (e) {
            e.preventDefault();
            $('#summernote_div').summernote('code', '');
        })

    };


    const trig_del_question = function () {
        $('button.question_delete').off('click').on('click', function (e) {
            e.preventDefault();
            let qid = $(this).parent().parent().data('qid');
            let course_code = $(this).parent().parent().data('course_code');


            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then(function (result) {
                if (result.value) {
                    del_question(qid, course_code);
                }
            });


        })

    };


    const del_question = function (qid, course_code) {
        $.ajax({
            type: 'POST',
            url: '/uajax/del_q',
            dataType: 'json',
            data: {
                qid: qid,

            },
            success: function (res) {
                if (typeof res !== 'undefined' && res !== null && res !== '') {
                    if (typeof res.status !== 'undefined' && res.status === 'success') {

                        rerender_qa(course_code);


                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });

    };
    const trig_ask_question_cancel = function () {
        $('#send_question_close_btn').off('click').on('click', function (e) {
            e.preventDefault();

            $('#yasuo_div').removeClass('kt-hidden').addClass('kt-hidden');
            $('#ask_question_btn').removeClass('kt-hidden');


        });
    };

    // Public Functions
    return {
        // public functions
        init: function () {
            init_summernote();
            trig_lecture_select();
            trig_ask_question();
            trig_ask_question_cancel();
            media_title_onmouseover();
            media_title();
            trig_send_question();
            trig_view_question_answers();
            trig_send_question_close_btn_2();
            trig_like();
            trig_del_question();
            trig_edit_question();

        }
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    play.init();
});
