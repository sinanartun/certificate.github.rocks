"use strict";

// Class Definition
const profile = function() {

    const trig_test_result = function() {
        $('.test_result').on('click',function(e) {
            e.preventDefault();
            const tid = $(this).data('tid');
            const test_name = $(this).text();

            $.ajax({
                type: 'POST',
                url: '/uajax/get_test_result',
                dataType: 'json',
                data:{
                    tid: tid
                },
                success: function(res)
                {
                    if(typeof res !== 'undefined' && res !== null && res !== ''){
                        if(typeof res.status !== 'undefined' && res.status === 'success'){
                            render_test_result(res.data,test_name);


                        }else {

                        }

                    }

                },
                error: function(xhr, ajaxOptions, thrownError)
                {

                },

            });

        });
    };




    const render_test_result = function (data,test_name) {
        $('#test_div').html('');
        let test = document.createElement("div");
        test.style.cssText = 'padding-bottom: 20px';
        let html = '';

        html += '<div class="col-md-12 kt-pb-20">' +
          '<div class="kt-portlet__head-label">' +
          '<h4 class="kt-portlet__head-title test_title" style="text-align: center;">' +
          '<span>' +
          test_name +
          '</span>' +
          '</h4>' +
          '</div>' +
          '</div>';

        if (data.questions.length < 1) {
            html +=

            '<div class="kt-portlet__head-label answer_count kt-pt15">' +
            '<span class="answer_count" style="font-weight: 500; font-size: 14px">' +
            'Bu testi henüz cevaplandırmadınız '+
            '</span>' +
            '</div>';
            test.innerHTML = html;
            document.getElementById("test_div").appendChild(test);

            $('#test_result_modal').modal('show');
            return false;
        }

        for (let i = 0; i < data.questions.length; i++) {
            let answer_correct = false;
            if(data.questions[i].true_answer === data.questions[i].user_answer){
                answer_correct = true;
            }

            html +=

              '<div class="kt-portlet__head-label answer_count kt-pt15">' +
              '<span class="answer_count" style="font-weight: 500; font-size: 14px">' +
              'Soru ';
            html += (i + 1);
            // html +=
            // 	'<span class="kt-pl10">' +
            // 	'<button data-qid="' + data.questions[i].id + '"  class="btn btn-outline-hover-danger btn-sm btn-icon del_question">' +
            // 	'<i class="fa fa-trash-alt">' +
            // 	'</i>' +
            // 	'</button>' +
            // 	'</span>' +
            // 	'<span class="">' +
            // 	'<button data-qid="' + data.questions[i].id + '"   class="btn btn-outline-hover-warning btn-sm btn-icon edit_question">' +
            // 	'<i class="fa fa-edit">' +
            // 	'</i>' +
            // 	'</button>' +
            // 	'</span>';


            html +=
              '</span>' +
              '</div>' +
              '<div class="row kt-pt20">' +
              '<div class="kt-portlet__head-label">' +
              '<div class="kt-portlet__head-title" style="padding: 0px 22px 0px 20px;">' +
              '<span>' +
              data.questions[i].question +
              '</span>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '<div class="row kt-portlet__head kt-pb-20 kt-pt40" style="margin-right: 6px;">' +

              '<div class="row col-md-12 kt-pb-5 profile_test_option">' +
              '<div style="width: 30px;">' +
              '<span class="kt-pull-right" style="color:';
              if(data.questions[i].true_answer === 'a'){
                  html += '#29c7ac';
              }else{
                  html += '#4e4e4e';
              }
            html +='; font-weight: 500;">' +
              'A :' +
              '</span>' +
              '</div>' +
              '<span style="padding-left: 5px">' +
              data.questions[i].a +
              '</span>' +
              '</div>' +

              '<div class="row col-md-12 kt-pb-5 profile_test_option">' +
              '<div style="width: 30px;">' +
              '<span class="kt-pull-right" style="color:';
            if(data.questions[i].true_answer === 'b'){
                html += '#29c7ac';
            }else{
                html += '#4e4e4e';
            }
            html +='; font-weight: 500;">' +
              'B :' +
              '</span>' +
              '</div>' +
              '<span style="padding-left: 5px">' +
              data.questions[i].b +
              '</span>' +
              '</div>' +

              '<div class="row col-md-12 kt-pb-5 profile_test_option">' +
              '<div style="width: 30px;">' +
              '<span class="kt-pull-right" style="color:';
            if(data.questions[i].true_answer === 'c'){
                html += '#29c7ac';
            }else{
                html += '#4e4e4e';
            }
            html += '; font-weight: 500;">' +
              'C :' +
              '</span>' +
              '</div>' +
              '<span style="padding-left: 5px">' +
              data.questions[i].c +
              '</span>' +
              '</div>' +

              '<div class="row col-md-12 kt-pb-5 profile_test_option">' +
              '<div style="width: 30px;">' +
              '<span class="kt-pull-right" style="color:';
            if(data.questions[i].true_answer === 'd'){
                html += '#29c7ac';
            }else{
                html += '#4e4e4e';
            }


            html +='; font-weight: 500;">' +
              'D :' +
              '</span>' +
              '</div>' +
              '<span style="padding-left: 5px">' +
              data.questions[i].d +
              '</span>' +
              '</div>' +

              '<div class="row col-md-12 kt-pb-5 profile_test_option">' +
              '<div style="width: 30px;">' +
              '<span class="kt-pull-right" style="color:';

            if(data.questions[i].true_answer === 'e'){
                html += '#29c7ac';
            }else{
                html += '#4e4e4e';
            }

            html +='; font-weight: 500;">' +
              'E :' +
              '</span>' +
              '</div>' +
              '<span style="padding-left: 5px">' +
              data.questions[i].e +
              '</span>' +
              '</div>' +

              '<div class="row col-md-12 kt-pb-5 kt-pt25">' +
              '<div style="width: 96px;">' +
              '<span class="kt-pull-left" style="font-weight: 500; font-size: 14px; margin-top: 2px;">' +
              'Doğru Cevap: ' +
              '</span>' +
              '</div>' +
              '<span style="padding-left: 5px; color: #29c7ac; font-weight: 500; font-size: 16px;">' +
              data.questions[i].true_answer +
              '</span>' +
              '</div>' +

              '<div class="row col-md-12 kt-pb-5">' +
              '<div style="width: 96px;">' +
              '<span class="kt-pull-left" style="font-weight: 500; font-size: 14px; margin-top: 2px;">' +
              'Sizin&nbspCevabınız: ' +
              '</span>' +
              '</div>' +
              '<span style="padding-left: 15px; color:';

            if(data.questions[i].true_answer === data.questions[i].user_answer){
                html += '#29c7ac';
            }else{
                html += '#ff0000';
            }

            html +='; font-weight: 500; font-size: 16px;">';
              if(typeof data.questions[i].user_answer !== 'undefined'){
                  html +=  data.questions[i].user_answer ;
              }else{
                  html += 'Cevaplandirmadiniz';
              }

            html += '</span>' +
              '</div>' +

              '</div>';

        }

        test.innerHTML = html;
        document.getElementById("test_div").appendChild(test);
        $('#test_result_modal').modal('show');
    };


    // Public Functions
    return {
        // public functions
        init: function() {
            trig_test_result();



        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    profile.init();
});
