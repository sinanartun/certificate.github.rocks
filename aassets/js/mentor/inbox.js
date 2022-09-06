"use strict";

// Class Definition
const inbox = function() {
    const ps = new PerfectScrollbar('#msg_box_div', {
        wheelSpeed: 2,
        wheelPropagation: false,
        minScrollbarLength: 20
    });

    const init_functions = function () {

    };


    const trig_inbox_left_username = function () {
        $('.inbox_username').off('click').on('click',function(e) {
            e.preventDefault();
            let the_this  = $(this);
            $('#msg_box_username').html($(this).html());
            window.to_id=$(this).data('id');
            window.to_user_img = $(this).parents('div.kt-widget__item').eq(0).find('.kt-media--circle > img:first').attr('src');
            window.the_user_img = $('#profile_img').attr('src');
            $.ajax({
                type: 'POST',
                url: '/aajax/get_inbox_from_user_msg',
                dataType: 'json',
                data:{id:$(this).data('id')},
                success: function(res)
                {
                    if(typeof res !== 'undefined' && res !== null && res !== ''){
                        if(typeof res.status !== 'undefined' && res.status === 'success'){
                            if(typeof res.data !== 'undefined' && res.data !== null && res.data !== ''){

                                $('#kt_chat_content').removeClass('kt-hidden');

                                setTimeout(function () {
                                    $('#msg_box_div').scrollTop(0,10);
                                    $('#msg_box_div').removeClass('ps--active-y');
                                },5);

                                render_inbox_msg(res.data);
                                setTimeout(function () {
                                    $('#msg_box_div').scrollTop($('#msg_box_div')[0].scrollHeight,200);
                                    the_this.closest('div.kt-widget__action > span.kt-badge.kt-badge--success.kt-font-bold').remove();
                                },10);
                                if(res.data.length < 1){
                                    console.log("burdayim");
                                    $('#msg_box_div').scrollTop(0,10);
                                    $('#msg_box_div').removeClass('ps--active-y');

                                }

                            }else{
                                $('#msg_box').html('');



                            }


                        }else if(typeof res.status !== 'undefined' && res.status === 'error'){

                            $('#kt_chat_content').removeClass('kt-hidden');
                            $('#msg_box').html('');


                        }

                    }

                },
                error: function(xhr, ajaxOptions, thrownError)
                {

                },

            });

        });



    };


    const refresh_msg_box = function () {
        $.ajax({
            type: 'POST',
            url: '/aajax/get_inbox_from_user_msg',
            dataType: 'json',
            data:{id:window.to_id},
            success: function(res)
            {
                if(typeof res !== 'undefined' && res !== null && res !== ''){
                    if(typeof res.status !== 'undefined' && res.status === 'success'){
                        render_inbox_msg(res.data);
                        setTimeout(function () {
                            $('#msg_box_div').scrollTop($('#msg_box_div')[0].scrollHeight,200);
                        },10);


                    }

                }

            },
            error: function(xhr, ajaxOptions, thrownError)
            {

            },

        });


    };


    const trig_inbox_sent_message = function () {
        $('#inbox_sent_message').on('click',function(e) {
            if($('textarea#msg_text').val().length < 1){
                return false;
            }

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/aajax/sent_msg',
                dataType: 'json',
                data:{to:window.to_id, msg:$('textarea#msg_text').val()},
                success: function(res)
                {
                    if(typeof res !== 'undefined' && res !== null && res !== ''){
                        if(typeof res.status !== 'undefined' && res.status === 'success'){
                            $('textarea#msg_text').val('');
                            refresh_msg_box();




                        }

                    }




                },
                error: function(xhr, ajaxOptions, thrownError)
                {

                },

            });


        });



    };



    const render_inbox_msg = function (data) {
        let html = '';

        let the_user_img = $('#profile_img').attr('src');
        let to_user_img = window.to_user_img;
        console.log(the_user_img);

        for(let i =0;i< data.length;i++){

            if(parseInt(window.to_id) === parseInt(data[i].to)){
                html += '<div class="kt-chat__message kt-chat__message--right">' +
                    '<div class="kt-chat__user">' +
                    '<span class="kt-chat__datetime">'+data[i].ago+'</span>' +
                    '<a href="#" class="kt-chat__username">You</a>' +
                    '<span class="kt-media kt-media--circle kt-media--sm">' +
                    '<img src="'+window.the_user_img+'" alt="image">' +
                    '</span>' +
                    '</div>' +
                    '<div class="kt-chat__text kt-bg-light-brand">' +
                    data[i].message +
                    '</div>' +
                    '</div>';

            }else{
                html += '<div class="kt-chat__message">' +
                    '<div class="kt-chat__user">' +
                    '<span class="kt-media kt-media--circle kt-media--sm">' +
                    '<img src="'+window.to_user_img+'" alt="image">' +
                    '</span>' +
                    '<a href="#" class="kt-chat__username">'+data[i].from_username+'</a>' +
                    '<span class="kt-chat__datetime">'+data[i].ago+'</span>' +
                    '</div>' +
                    '<div class="kt-chat__text kt-bg-light-success">' +
                    data[i].message +
                    '</div>' +
                    '</div>';
            }

        }
        $('#msg_box').html(html);



    };


    const trig_search_box = function () {
        $('#user_search_box').on('keyup change',function(e) {
            e.preventDefault();
            let q = $(this).val();
            // if(q.length < 1){
            //     return false;
            // }

            $.ajax({
                type: 'POST',
                url: '/aajax/inbox_search_user',
                dataType: 'json',
                data:{q:q},
                success: function(res)
                {
                    if(typeof res !== 'undefined' && res !== null && res !== ''){
                        if(typeof res.status !== 'undefined' && res.status === 'success'){
                            if(typeof res.data !== 'undefined' && res.data !== null && res.data !== ''){
                                render_user_search_result(res.data);
                            }else{
                                $('#user_list_div').html(res.msg);
                            }





                        }

                    }




                },
                error: function(xhr, ajaxOptions, thrownError)
                {

                },

            });



        });

    };


    const render_user_search_result = function (data) {

        let html = '';

        for (let i = 0; i < data.length; i++) {

            html += '<div class="kt-widget__item">' +
                '<span class="kt-media kt-media--circle">' +
                '<img class="to_profile_img" src="/uploads/thumb_';
            if(typeof data[i].profile_img !== 'undefined'){
                html += data[i].profile_img;

            }else{
                html += 'default.jpg'
            }


            html += '" alt="image"/>' +
                '</span>' +
                '<div class="kt-widget__info">' +
                '<div class="kt-widget__section">' +
                '<a href="#" class="kt-widget__username inbox_username"';
            html += 'data-id="'+ data[i].id +'">'+ data[i].first_name + ' ' + data[i].last_name  +'</a>' +
                '<span class="kt-badge kt-badge--success kt-badge--dot"></span>' +
                '</div>' +
                '<span class="kt-widget__desc">'+  data[i].email +'</span>' +
                '</div>' +
                '<div class="kt-widget__action">' +
                '<span class="kt-widget__date">36 Mines</span>' ;

            if(typeof data[i].unread_count !== 'undefined' && data[i].unread_count > 0){
                html += '<span class="kt-badge kt-badge--success kt-font-bold">'+data[i].unread_count+'</span>' ;

            }
            html += '</div></div>';




        }


        $('#user_list_div').html(html);
        trig_inbox_left_username();

    };




    // Public Functions
    return {
        // public functions
        init: function() {
            trig_inbox_sent_message();
            init_functions();
            trig_inbox_left_username();
            trig_search_box();


        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    inbox.init();
});
