"use strict";

// Class Definition
const edit_test = function () {
    let quill = null;
    let quill_a = null;
    let quill_b = null;
    let quill_c = null;
    let quill_d = null;
    let quill_e = null;

    const trig_add_test = function () {

        $('#add_test_submit').on('click', function (e) {
            e.preventDefault();
            let test_name = $('#test_name').val();
            $.ajax({
                type: 'POST',
                url: '/aajax/add_test',
                dataType: 'json',
                data: {
                    test_name: test_name
                },
                success: function (res) {
                    if (typeof res !== 'undefined' && res !== null && res !== '') {
                        if (typeof res.status !== 'undefined') {
                            if (res.status === 'success') {
                                swal.fire(res.status, res.msg, "success").then(function () {
                                    get_question();
                                    test_form_lock_and_unlock(res.status);
                                    dp.console_log_details('Testin adı oluşturuldu', 'info');

                                });
                            } else {
                                swal.fire(res.status, res.msg, "error").then(function () {
                                    test_form_lock_and_unlock(res.status);
                                    // location.reload()
                                });
                            }

                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                },

            });

        });

    };

    const test_form_lock_and_unlock = function (res) {
        if (res === 'success') {
            $('textarea#question').removeAttr('disabled');
            $('textarea#a').removeAttr('disabled');
            $('textarea#b').removeAttr('disabled');
            $('textarea#c').removeAttr('disabled');
            $('textarea#d').removeAttr('disabled');
            $('textarea#e').removeAttr('disabled');
            $('select#true_answer').removeAttr('disabled');
        } else if (res === 'error') {
            $('textarea#question').attr('disabled', 'disabled');
            $('textarea#a').attr('disabled', 'disabled');
            $('textarea#b').attr('disabled', 'disabled');
            $('textarea#c').attr('disabled', 'disabled');
            $('textarea#d').attr('disabled', 'disabled');
            $('textarea#e').attr('disabled', 'disabled');
            $('select#true_answer').attr('disabled', 'disabled');
        }

    };

    const init_setup = function () {
        $('select#true_answer').select2({
            placeholder: "Doğru cevabı seçiniz",
        });
    };

    const trig_add_question = function () {
        $('#add_question_submit').on('click', function (e) {
            e.preventDefault();
            let question = quill.root.innerHTML;
            let a_ = quill_a.root.innerHTML;
            let b_ = quill_b.root.innerHTML;
            let c_ = quill_c.root.innerHTML;
            let d_ = quill_d.root.innerHTML;
            let e_ = quill_e.root.innerHTML;
            let true_answer = $('select#true_answer').val();
            let answer_count = $('div.answer_count').find('span.answer_count').length + 1;
            const tid = $('#test_name').data('test_id');

            $.ajax({
                type: 'POST',
                url: '/aajax/add_question_to_edit_test',
                dataType: 'json',
                data: {
                    question: question,
                    a: a_,
                    b: b_,
                    c: c_,
                    d: d_,
                    e: e_,
                    true_answer: true_answer,
                    tid: tid
                },
                success: function (res) {

                    if (typeof res !== 'undefined' && res !== null && res !== '') {
                        if (typeof res.status !== 'undefined') {
                            if (res.status === 'success') {
                                get_question();
                                clear_question_form();
                                get_question();
                                dp.console_log_details('Testin ' + answer_count + '. sorusu oluşturuldu', 'info');


                            } else {
                                swal.fire(res.status, res.msg, "error").then(function () {

                                });

                            }

                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                },

            });

        });
    };


    const get_question = function () {
        hide_update_question();
        const tid = $('#test_name').data('test_id');

        $.ajax({
            type: 'POST',
            url: '/aajax/get_test_questions',
            dataType: 'json',
            data: {
                tid: tid
            },

            success: function (res) {

                if (typeof res !== 'undefined' && res !== null && res !== '') {
                    if (typeof res.status !== 'undefined' && typeof res.data !== 'undefined') {
                        if (res.status === 'success') {
                            render_questions(res.data)
                        } else {


                        }

                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });
    };


    const clear_test_form = function () {
        $('input#test_name').val('');
        $('textarea#question').val('');
        $('textarea#a').val('');
        $('textarea#b').val('');
        $('textarea#c').val('');
        $('textarea#d').val('');
        $('textarea#e').val('');
        $('select#true_answer').val('').change();
        $('div#test_div').html('');
    };


    const clear_question_form = function () {
        quill.setText('');
        quill_a.setText('');
        quill_b.setText('');
        quill_c.setText('');
        quill_d.setText('');
        quill_e.setText('');
        $('select#true_answer').val('').change();
    };


    const render_questions = function (data) {
        $('#test_div').html('');
        let test = document.createElement("div");
        test.style.cssText = 'padding-bottom: 20px';
        let html = '';

        html += '<div class="col-md-12 kt-pb-20">' +
            '<div class="kt-portlet__head-label">' +
            '<h4 class="kt-portlet__head-title test_title" style="text-align: center;">' +
            '<span>' +
            data.test_name +
            '</span>' +
            '</h4>' +
            '</div>' +
            '</div>';

        if (data.questions.length < 1) {

            test.innerHTML = html;
            document.getElementById("test_div").appendChild(test);
            return false;
        }

        for (let i = 0; i < data.questions.length; i++) {

            html +=

                '<div class="kt-portlet__head-label answer_count kt-pt15">' +
                '<span class="answer_count">' +
                'Soru ';
            html += (i + 1);
            html +=
                '<span class="kt-pl10">' +
                '<button  data-qid="' + data.questions[i].id + '"  class="btn btn-outline-hover-danger btn-sm btn-icon del_question">' +
                '<i class="fa fa-trash-alt">' +
                '</i>' +
                '</button>' +
                '</span>' +
                '<span>' +
                '<button data-qid="' + data.questions[i].id + '"   class="btn btn-outline-hover-warning btn-sm btn-icon edit_question">' +
                '<i class="fa fa-edit">' +
                '</i>' +
                '</button>' +
                '</span>';


            html +=
                '</span>' +
                '</div>' +
                '<div class="row kt-pt20">' +
                '<div class="kt-portlet__head-label">' +
                '<div class="kt-portlet__head-title">' +
                '<span class="test_dark_style_span">' +
                data.questions[i].question +
                '</span>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="row kt-portlet__head kt-pb-20 kt-pt40">' +

                '<div class="row col-md-12 kt-pb-5 questions_div">' +
                '<div class="col-1">' +
                '<span class="kt-pull-left">' +
                'A :' +
                '</span>' +
                '</div>' +
                '<span class="col-11">' +
                data.questions[i].a +
                '</span>' +
                '</div>' +

                '<div class="row col-md-12 kt-pb-5 questions_div">' +
                '<div class="col-1">' +
                '<span class="kt-pull-left">' +
                'B :' +
                '</span>' +
                '</div>' +
                '<span class="col-11">' +
                data.questions[i].b +
                '</span>' +
                '</div>' +

                '<div class="row col-md-12 kt-pb-5 questions_div">' +
                '<div class="col-1">' +
                '<span class="kt-pull-left">' +
                'C :' +
                '</span>' +
                '</div>' +
                '<span class="col-11">' +
                data.questions[i].c +
                '</span>' +
                '</div>' +

                '<div class="row col-md-12 kt-pb-5 questions_div">' +
                '<div class="col-1">' +
                '<span class="kt-pull-left">' +
                'D :' +
                '</span>' +
                '</div>' +
                '<span class="col-11">' +
                data.questions[i].d +
                '</span>' +
                '</div>' +

                '<div class="row col-md-12 kt-pb-5 questions_div">' +
                '<div class="col-1">' +
                '<span class="kt-pull-left">' +
                'E :' +
                '</span>' +
                '</div>' +
                '<span class="col-11">' +
                data.questions[i].e +
                '</span>' +
                '</div>' +

                '<div class="row col-md-12 kt-pb-5 kt-pt20">' +
                '<div>' +
                '<span class="kt-pull-right">' +
                'Doğru Cevap: ' +
                '</span>' +
                '</div>' +
                '<span>' +
                data.questions[i].true_answer +
                '</span>' +
                '</div>' +

                '</div>';

        }

        test.innerHTML = html;
        document.getElementById("test_div").appendChild(test);

        trig_del_question();
        trig_edit_question();
    };


    const trig_del_question = function () {


        $('.del_question').on('click', function (e) {
            e.preventDefault();
            let $this = $(this);
            let qid = $(this).data('qid');


            swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!"
            }).then(function (e) {


                if (e.value) {
                    del_question($this, qid);
                }


            });


        })

    };

    const trig_edit_question = function () {

        $('.edit_question').off('click').on('click', function (e) {
            e.preventDefault();
            let qid = $(this).data('qid');

            get_edit_question(qid);


        })

    };

    const get_edit_question = function (qid) {
        const tid = $('#test_name').data('test_id');
        $.ajax({
            type: 'POST',
            url: '/aajax/get_edit_question',
            dataType: 'json',
            data: {
                qid: qid,
                tid: tid
            },
            success: function (res) {

                if (typeof res !== 'undefined' && res !== null && res !== '') {
                    if (typeof res.status !== 'undefined' && typeof res.data !== 'undefined') {
                        if (res.status === 'success') {
                            render_edit_question(qid, res.data)

                        } else {
                            swal.fire(res.status, res.msg, "error").then(function () {


                            });

                        }

                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });


    };


    const render_edit_question = function (qid, data) {

        $('#add_question_submit').removeClass('kt-hidden').addClass('kt-hidden');
        $('#update_question_btn').removeClass('kt-hidden');
        $('#update_question_cancel_btn').removeClass('kt-hidden');

        if (typeof data.question !== 'undefined') {
           // $('textarea#question').val(data.question);
            $('#quill_editor > div.ql-editor.ql-blank').html(data.question);
        }

        if (typeof data.a !== 'undefined') {
            //$('textarea#a').val(data.a);
            $('#a > div.ql-editor.ql-blank').html(data.a);
        }
        if (typeof data.b !== 'undefined') {
            //$('textarea#b').val(data.b);
            $('#b > div.ql-editor.ql-blank').html(data.b);
        }
        if (typeof data.c !== 'undefined') {
           // $('textarea#c').val(data.c);
            $('#c > div.ql-editor.ql-blank').html(data.c);
        }
        if (typeof data.d !== 'undefined') {
            //$('textarea#d').val(data.d);
            $('#d > div.ql-editor.ql-blank').html(data.d);
        }
        if (typeof data.e !== 'undefined') {
            //$('textarea#e').val(data.e);
            $('#e > div.ql-editor.ql-blank').html(data.e);
        }
        if (typeof data.true_answer !== 'undefined') {
            $('select#true_answer').val(data.true_answer).change();
        }

        cancel_update_question();
        trig_update_question(qid);

    };


    const trig_update_question = function (qid) {
        $('#update_question_btn').off('click').on('click', function (e) {
            e.preventDefault();
            let question = quill.root.innerHTML;
            let a_ = quill_a.root.innerHTML;
            let b_ = quill_b.root.innerHTML;
            let c_ = quill_c.root.innerHTML;
            let d_ = quill_d.root.innerHTML;
            let e_ = quill_e.root.innerHTML;
            let true_answer = $('select#true_answer').val();

            $.ajax({
                type: 'POST',
                url: '/aajax/update_question',
                dataType: 'json',
                data: {
                    qid: qid,
                    question: question,
                    a: a_,
                    b: b_,
                    c: c_,
                    d: d_,
                    e: e_,
                    true_answer: true_answer
                },
                success: function (res) {

                    if (typeof res !== 'undefined' && res !== null && res !== '') {
                        if (typeof res.status !== 'undefined') {
                            if (res.status === 'success') {
                                get_question();
                                clear_question_form();
                            } else {
                                swal.fire(res.status, res.msg, "error").then(function () {


                                });

                            }

                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                },

            });

        });
    };

    const cancel_update_question = function () {
        $('#update_question_cancel_btn').on('click', function (e) {
            e.preventDefault();

            hide_update_question();
            clear_question_form();

        })

    };

    const hide_update_question = function () {
        $('#update_question_cancel_btn').removeClass('kt-hidden').addClass('kt-hidden');
        $('#add_question_submit').removeClass('kt-hidden');
        $('#update_question_btn').removeClass('kt-hidden').addClass('kt-hidden');
    };


    const del_question = function ($this, qid) {
        let answer_count = $($this).closest('span.answer_count').text();
        let answer_count_number = answer_count.replace(/\D/g, '');

        $.ajax({
            type: 'POST',
            url: '/aajax/del_question',
            dataType: 'json',
            data: {
                qid: qid
            },
            success: function (res) {

                if (typeof res !== 'undefined' && res !== null && res !== '') {
                    if (typeof res.status !== 'undefined') {
                        if (res.status === 'success') {
                            swal.fire(res.status, res.msg, "success").then(function () {
                                get_question();
                                clear_question_form();
                                dp.console_log_details('Testin ' + answer_count_number + '. sorusu silindi', 'info');

                            });

                        } else {
                            swal.fire(res.status, res.msg, "error").then(function () {


                            });

                        }

                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });


    };


    const test_html = function () {

        let test_title = $('div.kt-portlet__head-label').find('h4.test_title');
        let answer_count = $('div.answer_count').find('span.answer_count').length + 1;
        let html = '';


        if (test_title.length < 1) {
            html +=
                '<div class="col-md-12 kt-pb-20">' +
                '<div class="kt-portlet__head-label">' +
                '<h4 class="kt-portlet__head-title test_title" style="text-align: center;">' +
                '<span>' +
                'Makine Öğrenmesi 501 Bölüm Soruları' +
                '</span>' +
                '</h4>' +
                '</div>' +
                '</div>';
        }

        html +=

            '<div class="kt-portlet__head-label answer_count">' +
            '<span class="answer_count" style="font-weight: 500; font-size: 14px">' +
            'Soru ';

        html +=

            answer_count;

        html +=
            '</span>' +
            '</div>' +
            '<div class="row kt-pt20">' +
            '<div class="kt-portlet__head-label">' +
            '<div class="kt-portlet__head-title" style="padding: 0px 22px 0px 20px;">' +
            '<span style="font-size: 15px; color: #646c9a;">' +
            'Veri setinde bağımlı değişken olmadığında, diğer bir ifade ile bağımsız değişkenler belirli bir çıktı ile ilişkilendirilmemiş olduğunda söz konusu olan makine öğrenmesi türü aşağıdakilerden hangisidir?' +
            '</span>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="row kt-portlet__head kt-pb-20 kt-pt40" style="margin-right: 6px;">' +

            '<div class="row col-md-12 kt-pb-5">' +
            '<div style="width: 16px;">' +
            '<span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">' +
            'A :' +
            '</span>' +
            '</div>' +
            '<span style="padding-left: 5px">' +
            'Regresyon problemleri' +
            '</span>' +
            '</div>' +

            '<div class="row col-md-12 kt-pb-5">' +
            '<div style="width: 16px;">' +
            '<span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">' +
            'B :' +
            '</span>' +
            '</div>' +
            '<span style="padding-left: 5px">' +
            'Sınıflandırma problemleri' +
            '</span>' +
            '</div>' +

            '<div class="row col-md-12 kt-pb-5">' +
            '<div style="width: 16px;">' +
            '<span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">' +
            'C :' +
            '</span>' +
            '</div>' +
            '<span style="padding-left: 5px">' +
            'Gözetimli/Denetimli Öğrenme' +
            '</span>' +
            '</div>' +

            '<div class="row col-md-12 kt-pb-5">' +
            '<div style="width: 16px;">' +
            '<span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">' +
            'D :' +
            '</span>' +
            '</div>' +
            '<span style="padding-left: 5px">' +
            'Gözetimsiz/Denetimsiz Öğrenme' +
            '</span>' +
            '</div>' +

            '<div class="row col-md-12 kt-pb-5">' +
            '<div style="width: 16px;">' +
            '<span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">' +
            'E :' +
            '</span>' +
            '</div>' +
            '<span style="padding-left: 5px">' +
            'Random Forests' +
            '</span>' +
            '</div>' +

            '<div class="row col-md-12 kt-pb-5 kt-pt20">' +
            '<div style="width: 96px;">' +
            '<span class="kt-pull-right" style="font-weight: 500; font-size: 14px; margin-top: 2px;">' +
            'Doğru Cevap: ' +
            '</span>' +
            '</div>' +
            '<span style="padding-left: 5px; color: #004eda; font-weight: 500; font-size: 16px;">' +
            'E' +
            '</span>' +
            '</div>' +

            '</div>';

        let test = document.createElement("div");
        test.style.cssText = 'padding-bottom: 20px';
        test.innerHTML = html;
        document.getElementById("test_div").appendChild(test);


    };


    const trig_publish_test = function () {
        $('#publish_test').on('click', function (e) {
            let test_title = $('h4.test_title').text();
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/aajax/publish_test',
                dataType: 'json',

                success: function (res) {

                    if (typeof res !== 'undefined' && res !== null && res !== '') {
                        if (typeof res.status !== 'undefined') {
                            if (res.status === 'success') {
                                swal.fire(res.status, res.msg, "success").then(function () {
                                    clear_test_form();
                                    dp.console_log_details(test_title + ' isimli test başarıyla yayınladı', 'info')


                                });

                            } else {
                                swal.fire(res.status, res.msg, "error").then(function () {


                                });

                            }

                        }

                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {

                },

            });
        });


    };





    const init_quill = function () {
        quill = new Quill('#quill_editor', {
            theme: 'snow',
            modules: {toolbar: [[{header: [1, 2, !1]}], ["bold", "italic", "underline"], ["image", "code-block"]]},
            placeholder: "Type your text here...",
        });

        quill_a = new Quill('#a', {
            theme: 'snow',
            modules: {toolbar: [
                    ["bold", "italic", "underline"], ["image", "code-block"]
                ]
            },
        });
        quill_b = new Quill('#b', {
            theme: 'snow',
            modules: {toolbar: [
                    ["bold", "italic", "underline"], ["image", "code-block"]
                ]
            },
        });
        quill_c = new Quill('#c', {
            theme: 'snow',
            modules: {toolbar: [
                    ["bold", "italic", "underline"], ["image", "code-block"]
                ]
            },
        });
        quill_d = new Quill('#d', {
            theme: 'snow',
            modules: {toolbar: [
                    ["bold", "italic", "underline"], ["image", "code-block"]
                ]
            },
        });
        quill_e = new Quill('#e', {
            theme: 'snow',
            modules: {toolbar: [
                    ["bold", "italic", "underline"], ["image", "code-block"]
                ]
            },
        });




    };

    const trig_reset_form = function () {
       $('#reset_question_form').on('click',function(e){
           e.preventDefault();
           clear_question_form();
       })
    };


    // Public Functions
    return {
        // public functions
        init: function () {
            init_quill();
            trig_add_test();
            trig_add_question();
            init_setup();
            get_question();
            trig_publish_test();
            trig_reset_form();

        },
    };
}();

// Class Initialization
jQuery(document).ready(function () {
    edit_test.init();
});
