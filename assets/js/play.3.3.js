"use strict";

// Class Definition
const play = function () {
    let step = 'step_1';
    let _qid = null;
    let _lid = null;
    let _media_title = null;
    let _course_code = $('#yasuo_div').data('course_code');
    let _timer = null;
    let _type = null;
    let _tid = null;
    let yt_player;
    let yt_added = false;
    let count = 5;
    let next_video_coming = false;
    let counter_active = false;


    const build_step_1 = function () {
        step = 'step_1';

        $('#ask_question_btn').removeClass('kt-hidden');

        KTApp.block("#kt_portlet_base_demo_2_2_tab_content", {overlayColor: "#000000", state: "primary"});

        let course_code = _course_code = $('#yasuo_div').data('course_code');
        update_media_title();


        $.ajax({
            type: 'POST',
            url: '/uajax/get_qa',
            dataType: 'json',
            data: {
                course_code: course_code,
               // lid: _lid
                lid: 'all'

            },
            success: function (res) {
                if (typeof res !== 'undefined' && res !== null && res !== '') {
                    if (typeof res.status !== 'undefined' && res.status === 'success') {


                        if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {

                            render_step_1(res.data);

                        } else {
                            KTApp.unblock("#kt_portlet_base_demo_2_2_tab_content");

                            $('#qa_div').html('');
                            update_course_count(0);
                            get_lecture_desc();
                        }

                    } else {
                        KTApp.unblock("#kt_portlet_base_demo_2_2_tab_content");
                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });


    };


    const render_step_1 = function (data) {
        $('#qa_div').html('');


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
        $('#qa_div').html(html);

        KTApp.unblock("#kt_portlet_base_demo_2_2_tab_content");


        update_course_count(data.length);
        trig_build_step_2();
        trig_like();
        trig_del_question();
        trig_edit_question();
        get_lecture_desc();


    };

    const update_lecture_desc = function (description) {

        $('#lecture_desc').html(description)
    };

    const get_lecture_desc = function () {
        console_log_details('get lecture desc: started', 'info');
        $.ajax({
            type: 'POST',
            url: '/uajax/get_lecture_desc',
            dataType: 'json',
            data: {
                cc: _course_code,
                lid: _lid
            },
            success: function (res) {
                if (typeof res !== 'undefined' && res !== null && res !== '' && typeof res.status !== 'undefined') {
                    if (res.status === 'success') {


                        if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {
                            if (typeof res.data.description !== 'undefined' && res.data.description !== null) {
                                update_lecture_desc(res.data.description)
                            }


                        }

                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });


    };


    const trig_build_step_2 = function () {
        $('.ask_question_view').off('click').on('click', function (e) {
            e.preventDefault();
            let qid = $(this).parent().data('qid');

            build_step_2(qid);


        });
    };


    const build_step_2 = function (qid = null) {
        step = 'step_2';
        if (qid === null) {
            qid = _qid;
        } else {
            _qid = qid;
        }


        KTApp.block("#kt_portlet_base_demo_2_2_tab_content", {overlayColor: "#000000", state: "primary"});

        $('#ask_question_btn').removeClass('kt-hidden').addClass('kt-hidden');

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
                            if (typeof res.data.question.status !== 'undefined' && res.data.question.status === 'error') {

                                build_step_1();
                            } else {

                                render_step_2(res.data);
                            }


                        }

                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });


    };


    const render_step_2 = function (data) {

        $('#qa_div').html('');


        let html = '';


        html +=
            '<div class="row kt-pb-20 kt-pl20">' +
            '<button  type="button" class="btn btn-warning btn-sm" id="return_questions" data-course_code="' + data.question.course_code + '"><i class="flaticon2-back"></i> Geriye dön</button>' +
            '</div>' +
            '<div class="kt-widget3__item kt-pt10" style="border-bottom: solid 1px; border-bottom-color: #0a6aa1;">' +
            '<div class="kt-widget3__header" >' +
            '<div class="kt-widget3__user-img">' +
            '<img class="kt-widget3__img" src="/uploads/thumb_' + data.question.profile_img + '" alt="">' +
            '</div>' +
            '<div class="kt-widget3__info">' +
            '<a href="#" class="kt-widget3__username">' + data.question.first_name + ' ' + data.question.last_name + '</a><br>' +
            '<span class="kt-widget3__time">' + data.question.ago + '</span>' +
            '</div>' +
            '<span class="kt-widget3__status kt-font-info pull-right" data-qid=' + data.question.id + '>' +
            '<span class="like_count">' + data.question.like + '</span>' +
            '<button class="btn btn-secondary btn-pill like_question" data-qid=' + data.question.id + '  ><i class="flaticon-like"></i></button>' +
            '<span class="answers_count">' + data.question.answer_count + '</span>' +
            '<button class="btn btn-secondary btn-pill comment_count"><i class="flaticon-comment"></i></button>';

        if (data.the_user_id === parseInt(data.question.user_id)) {
            html +=
                '<span class="question_edit">' +
                '<button class="btn btn-secondary btn-pill question_edit" data-qid="1"><i class="flaticon-edit"></i></button>' +
                '</span>' +
                '<span class="question_delete">' +
                '<button class="btn btn-secondary btn-pill question_delete" data-qid="' + data.course_code + '"><i class="flaticon2-rubbish-bin-delete-button"></i></button>' +
                '</span>';
        }

        html +=
            '<button  type="button" class="btn btn-success btn-sm answer_question answer_btn_form" data-qid="' + data.question.id + '">Cevapla</button>' +
            '</span>' +
            '</div>' +
            '<div class="kt-widget3__body" >' +
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


        $('#qa_div').html(html);

        trig_return_btn();
        trig_answer_btn();
        trig_like();
        trig_del_question();
        trig_answer_question();
        trig_edit_question();
        // trig_edit_qa_btn();
        KTApp.unblock("#kt_portlet_base_demo_2_2_tab_content");

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

    const trig_return_btn = function () {
        $('#return_questions').off('click').on('click', function (e) {
            e.preventDefault();
            remove_answer_box();
            build_step_1();

        });
    };

    const remove_answer_box = function () {
        $('#summernote_div2').summernote('destroy');
        $("#answer_question_div").remove();

    };

    const update_course_count = function (count) {


        $('#question_count').html(count)
    };

    const update_media_title = function () {
        $('#question_lecture_selector > option:nth-child(2)').text('Gecerli Ders :'+_media_title);
        $('#this_course_media_title').html(_media_title);

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
                    del_question(qid);
                }
            });


        })

    };


    const auto_build_step = function () {
        if (step === 'step_1') {
            build_step_1();
        } else if (step === 'step_2') {
            build_step_2();
        }
    };

    const del_question = function (qid) {
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

                        auto_build_step();


                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });

    };

    const trig_ask_question = function () {
        $('#ask_question_btn').on('click', function (e) {
            e.preventDefault();

            $('#yasuo_div').removeClass('kt-hidden');
            $('#ask_question_btn').addClass('kt-hidden');
            trig_ask_question_cancel();
            trig_send_question();
        });
    };

    const trig_ask_question_cancel = function () {
        $('#send_question_close_btn').off('click').on('click', function (e) {
            e.preventDefault();

            $('#yasuo_div').removeClass('kt-hidden').addClass('kt-hidden');
            $('#ask_question_btn').removeClass('kt-hidden');


        });
    };

    const trig_send_question = function () {
        $('#send_question_btn').off('click').on('click', function (e) {
            e.preventDefault();
            let text = $('#summernote_div').summernote('code');
            let course_code = $('#yasuo_div').data('course_code');
            let type = $(this).data('type');


            $.ajax({
                type: 'POST',
                url: '/uajax/ask_question',
                dataType: 'json',
                data: {
                    text: text,
                    course_code: course_code,
                    type: type,
                    lid: _lid

                },
                success: function (res) {
                    if (typeof res !== 'undefined' && res !== null && res !== '' && typeof res.status !== 'undefined') {
                        if (res.status === 'success') {

                            swal.fire(res.status, res.msg, "success").then(function () {
                                $('#yasuo_div').removeClass('kt-hidden').addClass('kt-hidden');
                                $('#ask_question_btn').removeClass('kt-hidden');
                                $('#summernote_div').summernote('code', '');

                                build_step_1();


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
            $('#summernote_div2').summernote('code', '');


            trig_send_question_close_btn_2();
            trig_send_answer();

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
                                build_step_2(qid);
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

            $(this).closest('.kt-widget3__item').find('.kt-widget3__body').eq(0).append('<div class="edit_question_div"></div>' + html);
            $(this).closest('.kt-widget3__item').find('.edit_question_div').eq(0).summernote('code', old_html);
            // $(this).closest('.kt-widget3__item').find('span.question_edit').eq(0).addClass('kt-hidden');
            $('span.question_edit').addClass('kt-hidden');
            $(this).closest('.kt-widget3__item').find('button.answer_question.answer_btn_form').eq(0).addClass('kt-hidden');
            //$(this).closest('.kt-widget3__item').css('border-bottom-color', '#E91E63;');

            trig_cancel_edit();
            trig_edit_question_btn();

        })
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


                                auto_build_step();

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
    const trig_cancel_edit = function () {
        $('#cancel_edit_question').off('click').on('click', function (e) {
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

    const console_log_details = function (comment, n_) {
        let r = "border-radius:2px; padding:0 4px; color:white;";
        let n = {debug: r + "background:dodgerblue;", info: r + "background:green;", warn: r + "background:orange;", error: r + "background:red;"};
        let console_details = '';
        if (n_ === 'debug') {
            console_details = "debug"
        } else if (n_ === 'info') {
            console_details = "info"
        } else if (n_ === 'warn') {
            console_details = "warn"
        } else if (n_ === 'error') {
            console_details = "error"
        }
        console.log("%c" + console_details, n[n_], comment);
    };


    const trig_lecture_select = function () {
        $('.lecture_box').on('click', function (e) {
            console.log('lecture select');
            e.preventDefault();
            close_next_video_block();
            $('.lecture_box').removeClass('playNow');

            $(this).addClass('playNow');
            _lid = $(this).data('lid');
            _media_title = $(this).data('media_title');
            _type = $(this).data('type');
            let lecture_finished = $(this).find('input.lcb').is(':checked');


            let comment = "lecture finished: " + lecture_finished;
            console_log_details(comment, 'info');


            //console.log('lecture finished:' + lecture_finished);

            let media_url = $(this).data('media');
            //start_video_play


            $.ajax({
                type: 'POST',
                url: '/uajax/start_video_play',
                dataType: 'json',
                data: {
                    lid: _lid
                },
                success: function (res) {
                    if (typeof res !== 'undefined' && res !== null && res !== '' && typeof res.status !== 'undefined') {
                        if (res.status === 'success') {


                            if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {
                                if (typeof res.data.current_time !== 'undefined' && res.data.current_time !== null && res.data.current_time !== '') {
                                    if (lecture_finished) {
                                        start_player(media_url, 0);
                                    } else {
                                        start_player(media_url, res.data.current_time);
                                    }


                                } else {
                                    start_player(media_url, 0);
                                }


                            } else {
                                start_player(media_url, 0);

                            }


                        } else {
                            start_player(media_url, 0);

                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                },

            });


            $('.media_title').html("").html($(this).data('media_title'));


            build_step_1();

        });
    };





    const start_player = function (media_url = null, current_time = 0, volume = null, play = true) {

        if (_type === 'video/youtube') {
            if (!yt_added) {
                //console.log('new youtube player added');
                $('#lecture_video_player').removeClass('kt-hidden').addClass('kt-hidden');
                let tag = document.createElement('script');
                tag.id = 'yt_player';
                tag.src = 'https://www.youtube.com/iframe_api';
                let firstScriptTag = document.getElementsByTagName('script')[0];

                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                yt_added = true;
                setTimeout(function () {
                    onYouTubeIframeAPIReady(media_url, current_time);

                    next_video_coming = false;
                }, 1000);
            } else {
                //console.log('ol youtube player used');
                play_youtube(media_url, current_time);
                next_video_coming = false;

            }



        } else if (_type === 'video/mp4') {
            videojs('lecture_video_player').src(media_url);
            videojs('lecture_video_player', {}, function () {
                this.on('loadedmetadata', function () {
                    this.currentTime(parseInt(current_time));
                    if (play) {
                        this.play();
                        next_video_coming = false;
                    }

                    trig_end_video();
                });
            });
        }else if(_type === 'test'){

                start_test(media_url);

        }

    };


    const onPlayerReady = function (event) {
        event.target.playVideo();
    };


    const stopVideo = function () {
        if(typeof yt_player !== 'undefined'){
            yt_player.stopVideo();
        }

    };

    const pauseVideo = function () {
        if(typeof yt_player !== 'undefined'){
            yt_player.pauseVideo();
        }

    };


    const window_screen_size = function () {
        let ww = window.screen.availWidth;
        let hh = window.screen.availHeight;
        console.log('w: ' + ww + 'h: ' + hh);
    };

/////////////////////////////////////////////////////////////////////////////////////////////////////

    const openFullscreen1 = function(elem) {
        let iframe;
        let $ = document.querySelector.bind(document);
        iframe = $('#youtube_player');
            let requestFullScreen = iframe.requestFullScreen || iframe.mozRequestFullScreen || iframe.webkitRequestFullScreen;
            if (requestFullScreen) {requestFullScreen.bind(iframe)();
        }
    };

    const openFullscreen = function(elem) {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) { /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { /* IE/Edge */
            elem.msRequestFullscreen();
        }
    };

    const closeFullscreen = function () {
        if (!document.exitFullscreen) {
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    };
/////////////////////////////////////////////////////////////////////////////////////////////////////
    const onPlayerStateChange = function (event) {

        // console.log('onState change');
        // console.log(event);
        // console.log(yt_player.getCurrentTime());
        if (event.data === -1){
            // console_log_details('video başlatılmadı', 'info')

        }
        if (event.data === 0) {
            //console.log('event data 0 geldi');
            let options = yt_player.getOptions();

            let h = '';
            let w = '';
            let sh = screen.height;
            let sw = screen.width;

            if(window.innerWidth !== undefined && window.innerHeight !== undefined) {
                h = window.innerHeight;
                w = window.innerWidth;
            } else {
                h = document.documentElement.clientHeight;
                w = document.documentElement.clientWidth;
            }
            console_log_details('h: ' + h, 'info');
            console_log_details('sh: ' + sh + ' sw: ' + sw, 'info');
            if (sh === h) {
                closeFullscreen();
                console_log_details('closeFullscreen fonksiyonu çalıştı', 'info')

            } else if (sw === w) {
                closeFullscreen();
                console_log_details('closeFullscreen fonksiyonu çalıştı', 'info')

            } else {
                console_log_details('tam ekranda değil', 'info')
            }



            // console_log_details(options,'info');
            setTimeout(on_player_state_change_build_1,100);
             function on_player_state_change_build_1 () {
                if (!next_video_coming) {
                    next_video_coming = true;
                    end_video(_lid);
                    const $s = $("a[data-lid='" + _lid + "']");
                    let new_lid = $s.next().data('lid');
                    if (typeof new_lid === 'undefined') {
                        new_lid = $s.parents('div.card').next().find('a[data-lid]').eq(0).data('lid');

                        if (typeof new_lid === 'undefined') {
                            congratulations();
                            console_log_details('congratulations finish course','info')

                        } else {
                            trig_next_video_loading_spinner(new_lid);
                        }
                    } else {
                        trig_next_video_loading_spinner(new_lid);
                    }
                }
            }

            console_log_details('video bitti', 'info')



        }


        if (event.data === 1){
            console_log_details('video oynatılıyor', 'info')

        }
        if (event.data === 2){
            console_log_details('video duraklatıldı', 'info')

        }
        if (event.data === 3){
            console_log_details('video doluyor', 'info')

        }
        if (event.data === 5){
            // console_log_details('video işaretlendi', 'info')

        }


        // if (event.data == YT.PlayerState.PLAYING ) {
        //     setTimeout(stopVideo, 6000);
        //     //done = true;
        // }
    };

    const onYouTubeIframeAPIReady = function (video_id, ct) {

        ct = parseInt(ct);
        let width = $(window).width();
        let height = $(window).height() - 110;
        //console.log(typeof YT.Player);

        yt_player = new YT.Player('youtube_player', {

            videoId: video_id,
            width: width,
            height: height,
            host: 'https://www.youtube-nocookie.com',
            playerVars: {
                'autoplay': 1,
                'controls': 1,
                'start': ct,
                'rel': 0,
                'showinfo': 0,
                'egm': 0,
                'showsearch': 0,
                'modestbranding': 1,
                'color': 'red',
                'enablejsapi': 1,
                'iv_load_policy':3,
                'cc_load_policy':1,
                'origin': 'https://traiive.com'


            },
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });

        //  yt_player.seekTo(30);
    };

    const play_youtube = function (video_id, ct) {

        ct = parseInt(ct);
        yt_player.cueVideoById({
            videoId: video_id,
            startSeconds: ct,
            host: 'https://www.youtube-nocookie.com',
            playerVars: {
                'autoplay': 1,
                'controls': 1,
                'rel': 0,
                'showinfo': 0,
                'egm': 0,
                'showsearch': 0,
                'modestbranding': 1,
                'color': 'red',
                'enablejsapi': 1,
                'iv_load_policy':3,
                'cc_load_policy':1,
                'origin': 'https://traiive.com'


            },
        });
        yt_player.playVideo();

    };

    const trig_end_video = function () {

        if (_type === 'video/youtube') {


        } else if (_type === 'video/mp4') {
            videojs('lecture_video_player', {}, function () {
                this.off('ended');
                this.on('ended', function () {
                    end_video(_lid);
                    const $s = $("a[data-lid='" + _lid + "']");

                    let new_lid = $s.next().data('lid');


                    if (typeof new_lid === 'undefined') {
                        new_lid = $s.parents('div.card').next().find('a[data-lid]').eq(0).data('lid');

                        if (typeof new_lid === 'undefined') {
                            congratulations();

                        } else {
                            trig_next_video_loading_spinner(new_lid);
                        }
                    } else {
                        trig_next_video_loading_spinner(new_lid);
                    }


                });
            });
        }


    };


    const end_video = function (lid) {


        $.ajax({
            type: 'POST',
            url: '/uajax/end_video_play',
            dataType: 'json',
            data: {
                lid: lid
            }

        });

        $("a[data-lid='"+lid+"']").find('input.lcb').prop('checked',true);



    };


    const congratulations = function () {
        confetti.start(1000, 250, 500);
        // let obj = document.createElement("audio");
        // obj.src = "/assets/mp3/congratulations.mp3";
        // obj.play();
    };


    const endCountdown = function (new_lid) {
        // logic to finish the countdown here
        clearInterval(_timer);
        counter_active = false;
        count = 5;
        init_play_video(new_lid, true);
        KTApp.unblock('#video_player_div');
        update_playnow(new_lid);

    };

    const start_countdown = function (new_lid) {
        if (!counter_active) {
            counter_active = true;
            _timer = setInterval(function () {
                handleTimer(new_lid);
            }, 1000);
        }


    };

    const handleTimer = function (new_lid) {
        if (count < 0) {
            counter_active = false;
            clearInterval(_timer);
            endCountdown(new_lid);
        } else {
            $('#next_video_close_btn').html("İptal " + count + "");
            count--;
        }
    };


    const trig_next_video_loading_spinner = function (new_lid = null) {
        counter_active = false;
        start_countdown(new_lid);

        KTApp.block('#video_player_div', {
            overlayColor: '#000000',
            type: 'v2',
            state: 'success',
            message: '<div class="row">' +
                '<div class="col-md-12">' +
                '<span class="row">Sonraki videoya geçiliyor </span>' +
                '</div>' +
                '</div>' +
                '<br>' +
                '<div class="row">' +
                '<div class="col-md-6">' +
                '<button type="button" class="btn btn-md pull-left" id="next_video_close_btn">İptal 5</button>' +
                '</div>' +
                '<div class="col-md-6">' +
                '<button type="button" class="la la-step-forward pull-right" id="next_video_btn"></button>' +
                '</div>' +
                '</div>'


        });

        trig_next_video_close();
        trig_next_video_play(new_lid);

    };


    const update_playnow = function (lid) {
        $('.lecture_box').removeClass('playNow');
        $("a[data-lid='"+lid+"']").addClass('playNow');
        $('div.collapse').removeClass('show');


        $('div.card-title').addClass('collapsed');


       $("a[data-lid='"+lid+"']").parents('div.card').find('div.collapse').eq(0).addClass('show');


       $("a[data-lid='"+lid+"']").parents('div.card').find('div.card-title').eq(0).removeClass('collapsed');

    };


    const trig_next_video_play = function (new_lid) {
        $('#next_video_btn').off('click').on('click', function (e) {
            e.preventDefault();
            clearInterval(_timer);
            init_play_video(new_lid, true);
            KTApp.unblock('#video_player_div');

            update_playnow(new_lid);

        });

    };


    const trig_next_video_close = function () {

        $('#next_video_close_btn').on('click', function (e) {
            close_next_video_block();
        });
    };


    const close_next_video_block = function () {
        KTApp.unblock('#video_player_div');
        count = 5;
        clearInterval(_timer);
    };


    const trig_search = function () {

        $('#search_btn').on('click', function (e) {

            $(this).removeClass('kt-spinner kt-spinner--md kt-spinner--light').addClass('kt-spinner kt-spinner--md kt-spinner--light');


            const q = $('#search_input').val();
            const qls = $('#question_lecture_selector').val();
            const order_by = $('#order_by').val();
            const filter_by = $('#filter_by').val();
            let lid = _lid;
            if (qls !== 'current_lecture') {
                lid = qls;
            }


            $.ajax({
                type: 'POST',
                url: '/uajax/search_qa',
                dataType: 'json',
                data: {
                    q: q,
                    course_code: _course_code,
                    order_by: order_by,
                    filter_by: filter_by,
                    lid: lid

                },
                success: function (res) {
                    if (typeof res !== 'undefined' && res !== null && res !== '' && typeof res.status !== 'undefined') {
                        if (res.status === 'success') {


                            if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {

                                const search_func_spinner = function () {
                                    $('#search_btn').removeClass('kt-spinner kt-spinner--md kt-spinner--light');
                                };
                                setTimeout(search_func_spinner, 500);

                                render_search_result(res.data);

                            } else {
                                swal.fire({
                                    text: "Searched question content not found",
                                    type: 'error',
                                });
                                $('#search_btn').removeClass('kt-spinner kt-spinner--md kt-spinner--light');

                                render_search_result(res.data);

                            }


                        } else {
                            swal.fire(res.status, res.msg, res.status);
                            $('#search_btn').removeClass('kt-spinner kt-spinner--md kt-spinner--light');
                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {
                    $('#search_btn').removeClass('kt-spinner kt-spinner--md kt-spinner--light');
                },

            });


        })


    };


    const render_search_result = function (data) {

        render_step_1(data);


    };


    const init_setup = function () {
        $('select#question_lecture_selector, select#order_by, select#filter_by, select#kt_select2_3').select2({
            placeholder: "Lutfen seciniz"
        });
    };


    const trig_pbeat = function () {

        setInterval(function () {

            pbeat();

        }, 5000);


    };


    const pbeat = function () {
        let ct = 0;
        if (_type === 'video/youtube') {
            if(typeof yt_player !== 'undefined'){
                ct = parseInt(yt_player.getCurrentTime());
            }

        } else if (_type === 'video/mp4') {
            ct = videojs('lecture_video_player').currentTime();
        }


        $.ajax({
            type: 'POST',
            url: '/uajax/pbeat',
            dataType: 'json',
            data: {
                cc: _course_code,
                lid: _lid,
                ct: ct
            },

            success: function (res) {
                if (typeof res !== 'undefined' && res !== null && res !== '') {
                    if (typeof res.status !== 'undefined' && res.status === 'success') {

                        if (typeof res.action !== 'undefined' && res.action === 'new_message') {


                        }

                    }

                }

            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });
    };

    const init_play_video= function (new_lid = null,play=false) {
        //console.log('init play video new_lid:' + new_lid);

        let $s = null;
        if (new_lid === null) {
            $s = $('a.kt-notification__item.lecture_box.playNow');

        } else {
            $s = $("a[data-lid='" + new_lid + "']");

        }
        _lid = $s.data('lid');
        _type = $s.data('type');
        //console.log('type:' + _type);
        _media_title = $s.data('media_title');
        let media_url = $s.data('media');
        let lecture_finished = $s.find('input.lcb').is(':checked');

        if(_type === 'test'){
            start_test(media_url);
        }else if(_type==='video/mp4'  ){
            start_video(media_url,lecture_finished,play);
        }else if(_type==='video/youtube' ){
            start_video(media_url,lecture_finished,play);
        }





    };


    const start_video = function (media_url,lecture_finished=false,play=false) {
        $.ajax({
            type: 'POST',
            url: '/uajax/start_video_play',
            dataType: 'json',
            data: {
                lid: _lid
            },
            success: function (res) {
                if (typeof res !== 'undefined' && res !== null && res !== '' && typeof res.status !== 'undefined') {
                    if (res.status === 'success') {


                        if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {
                            if (typeof res.data.current_time !== 'undefined' && res.data.current_time !== null && res.data.current_time !== '') {
                                if(!lecture_finished){
                                    start_player(media_url, res.data.current_time,null,play);
                                }else{
                                    start_player(media_url, 0,null,play);
                                }


                            } else {
                                start_player(media_url, 0,null,play);
                            }


                        } else {
                            start_player(media_url, 0,null,play);

                        }


                    } else {
                        start_player(media_url, 0,null,play);

                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });


        $('.media_title').html("").html(_media_title);


        build_step_1();
    };



    const start_test = function(tid=null){
        if(null===tid){
            return false;
        }
        _tid = tid;
        pauseVideo();

        $.ajax({
            type: 'POST',
            url: '/uajax/start_test',
            dataType: 'json',
            data: {
                tid: tid
            },
            success: function (res) {
                if (typeof res !== 'undefined' && res !== null && res !== '' && typeof res.status !== 'undefined') {
                    if (res.status === 'success') {


                        if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {

                            render_test_modal(res.data);

                        }

                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });



        //$('#test_modal').modal('show');

     console.log('tid:'+tid);
     console_log_details('Test modal açıldı', 'info')
    };

    const render_test_stats = function(data){
        let html = '';

        html += '<span>Toplam soru:&nbsp;<strong>' + data.ttq + '</strong></span>';
        html += '<span>Cevaplanan:&nbsp;<strong>' + data.uaq + '</strong></span>';
        html += '<span>Doğru:&nbsp;<span class="text-success"><strong>' + data.utca + '</strong></span></span>';
        html += '<span>Yanlış:&nbsp;<span class="text-danger"><strong>' + data.utwa + '</strong></span></span>' ;
        $('#test_stats').html(html).addClass('row');
    };

    const render_test_modal = function (data) {
        $('#test_div').html('');
        let html = '';
        if(typeof data.tr !== 'undefined' && data.tr === 'finished'){
            html += '<div class="col-md-12 kt-pb-20">' +
              '<div class="kt-portlet__head-label">' +
              '<h4 class="kt-portlet__head-title test_title text-left" style="text-align: center;">' +
              '<span>' +
             // '<pre>' +
               data.msg +
             // '</pre>' +
              '</span>' +
              '</h4>' +
              '</div>' +
              '</div>';
            $('#test_div').html(html);
            $('#test_modal_title').html(data.test_name);
            $('#test_modal').modal('show');
            trig_arrow();

            render_test_stats(data);
        }else{


            html += '<div class="col-md-12 kt-pb-20">' +
              '<div class="kt-portlet__head-label">' +
              '<h4 class="kt-portlet__head-title test_title text-left" style="text-align: center;">' +
              '<span>' +
              //'<pre>' +
              '<span class ="question_order">' +
               data.question.order + '. Soru:'+
              '</span>'+
               data.question.question +
             // '</pre>' +
              '</span>' +
              '</h4>' +
              '</div>' +
              '</div>';







            html +=

              '<div class="form-group row kt-pl10 kt-pt10">' +

              '<div class="col-12">' +
              '<div class="kt-radio-list">' +

              '<label class="kt-radio">A)&nbsp;&nbsp;' +
              '<input type="radio" name="radio" value="a">' +
              '<div class="question_div">' +
              data.question.a +
              '</div>'+
              '<span></span>' +
              '</label>' +

              '<label class="kt-radio">B)&nbsp;&nbsp;' +
              '<input type="radio" name="radio" value="b">' +
              '<div class="question_div">' +
              data.question.b +
              '</div>'+
              '<span></span>' +
              '</label>' +

              '<label class="kt-radio">C)&nbsp;&nbsp;' +
              '<input type="radio" name="radio" value="c">' +
              '<div class="question_div">' +
              data.question.c +
              '</div>'+
              '<span></span>' +
              '</label>' +

              '<label class="kt-radio">D)&nbsp;&nbsp;' +
              '<input type="radio" name="radio" value="d">' +
              '<div class="question_div">' +
              data.question.d +
              '</div>'+
              '<span></span>' +
              '</label>' +

              '<label class="kt-radio">E)&nbsp;&nbsp;' +
              '<input type="radio" name="radio" value="e">' +
              '<div class="question_div">' +
              data.question.e +
              '</div>'+
              '<span></span>' +
              '</label>' +
                
              '</div>' +
              '</div>' +
              '</div>' +
              '<div class="col-12 text-center">' +
              '<h4 id="test_result_message"  style="width: 100%"></h4>' +
              '</div>' +
              '<div class="col-12" data-qid="'+ data.question.id +'">' +
              '<button id="test_previous_question_btn" class="btn btn-sm btn-default pull-left">Önceki</button>'+
              '<button id="test_next_question_btn"  class="btn btn-sm btn-default pull-left ml-1">Sonraki</button>'+

              '<button id="test_send_answer_btn" class="btn btn-sm btn-success pull-right">Gönder</button>'+
              '</div>';





            $('#test_div').html(html);
            $('#test_modal_title').html(data.test_name);
            $('#test_modal').modal('show');
            trig_send_test_answer();
            trig_test_next_question();
            trig_test_previous_question();
            render_test_stats(data);
            trig_arrow();
            $('#test_div').focus();
        }




    };

    const get_finished_lectures = function () {
        $.ajax({
            type: 'POST',
            url: '/uajax/gfl',
            dataType: 'json',
            data: {
                cc: _course_code
            },
            success: function (res) {
                if (typeof res !== 'undefined' && res !== null && res !== '' && typeof res.status !== 'undefined') {
                    if (res.status === 'success') {


                        if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {

                             set_finished_lectures(res.data);

                        }

                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });


    };


    const set_finished_lectures = function (lids) {

        if(lids.length < 1){
            return false;
        }

        for(let i = 0; i < lids.length; i++){
            $("a[data-lid='"+lids[i]+"']").find('input.lcb').prop('checked',true);
        }
    };

    const trig_send_test_answer = function(){
      console.log('trig send answer');

      $('#test_send_answer_btn').on('click',function (e) {
        e.preventDefault();
        const qid = $(this).parent().data('qid');

        const answer = $("input[name='radio']:checked").val();
        if(typeof answer === 'undefined'){
          swal.fire('error', 'Lütfen cevabı seçin', 'error');
        }

        console.log(answer);

        $.ajax({
          type: 'POST',
          url: '/uajax/answer_test_question',
          dataType: 'json',
          data: {
            qid: qid,
            answer: answer

          },
          success: function (res) {
            if (typeof res !== 'undefined' && res !== null && res !== '') {
              if (typeof res.status !== 'undefined' && res.status === 'success') {


                if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {

                 console.log(res.data);
                  render_test_answer_result(res);

                }

              }

            }


          },
          error: function (xhr, ajaxOptions, thrownError) {

          },

        });



      })
    };

    const render_test_answer_result = function(res){

        let msg = res.msg;
        if(!res.data.result){
            msg += '&nbsp;Dogru cevap  '+ res.data.true_answer.toUpperCase();
        }

      $('#test_result_message').html(msg);
      let child = 1;


        switch (res.data.true_answer) {
          case 'a':
            child = "1";
            break;
          case 'b':
            child = "2";
            break;
          case 'c':
            child = "3";
            break;
          case 'd':
            child = "4";
            break;
          case 'e':
            child = "5";
            break;

        }



        $("#test_div > div.form-group.row > div > div > label:nth-child("+child+")").css("background-color", "yellow");



    };


const trig_test_next_question = function(){
    $('#test_next_question_btn').off('click').on('click',function(e){
        console.log('next question btn clicked');
        e.preventDefault();


        const qid = $(this).parent().data('qid');



        $.ajax({
            type: 'POST',
            url: '/uajax/test_next_question',
            dataType: 'json',
            data: {
                qid: qid,
                tid:_tid

            },
            success: function (res) {
                if (typeof res !== 'undefined' && res !== null && res !== '') {
                    if (typeof res.status !== 'undefined' && res.status === 'success') {


                        if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {

                            console.log(res.data);
                            render_test_modal(res.data);

                        }

                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });
    })


};
const trig_test_previous_question = function(){
        $('#test_previous_question_btn').off('click').on('click',function(e){
            console.log('next question btn clicked');
            e.preventDefault();


            const qid = $(this).parent().data('qid');



            $.ajax({
                type: 'POST',
                url: '/uajax/test_previous_question',
                dataType: 'json',
                data: {
                    qid: qid,
                    tid:_tid

                },
                success: function (res) {
                    if (typeof res !== 'undefined' && res !== null && res !== '') {
                        if (typeof res.status !== 'undefined' && res.status === 'success') {


                            if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {

                                render_test_modal(res.data);

                            }

                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                },

            });
        })


    };

const trig_arrow = function () {
    $('#test_modal').off('keydown').on('keydown',function(event) {

        const key = (event.keyCode ? event.keyCode : event.which);
        if(key===39){
          $('#test_next_question_btn').click();
            trig_arrow();
        }else if(key===37){
          $('#test_previous_question_btn').click();
            trig_arrow();
        }

    });
};


const trig_reset_test = function(){
    $('#reset_test_btn').off('click').on('click',function(e) {
        e.preventDefault();

        swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, reset it!"
        }).then(function (e) {

            if (e.value) {
                $.ajax({
                    type: 'POST',
                    url: '/uajax/reset_test',
                    dataType: 'json',
                    data: {
                        tid:_tid

                    },
                    success: function (res) {
                        if (typeof res !== 'undefined' && res !== null && res !== '') {
                            if (typeof res.status !== 'undefined' && res.status === 'success') {
                                swal.fire(res.status, res.msg, "success");
                                start_test(_tid);

                            }else{
                                swal.fire(res.status, res.msg, "error");
                            }

                        }


                    },
                    error: function (xhr, ajaxOptions, thrownError) {

                    },

                });
            }


        });





    });
};







    return {
        // public functions
        init: function () {

            init_play_video();
            init_setup();
            init_summernote();
            trig_ask_question();
            trig_lecture_select();
            trig_search();
            trig_pbeat();
            get_finished_lectures();
            dp.window_browser_size();
            dp.window_browser_resize();
            trig_test_next_question();
            trig_test_previous_question();
            trig_arrow();
            trig_reset_test();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    play.init();
});
