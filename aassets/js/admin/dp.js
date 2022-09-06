"use strict";

// Class Definition
const dp = function() {






    const handle_change_lang = function() {
        $('.lang_selector').on('click',function(e) {
            e.preventDefault();


            $.ajax({
                type: 'POST',
                url: '/aajax/update_lang',
                dataType: 'json',
                data:{lang:$(this).data('lang')},
                success: function(res)
                {
                    if(typeof res !== 'undefined' && res !== null && res !== ''){
                        if(typeof res.status !== 'undefined' && res.status === 'success'){

                            swal.fire(res.status, res.msg, "success").then(function() {
                                location.reload()
                            });

                        }

                    }




                },
                error: function(xhr, ajaxOptions, thrownError)
                {

                },

            });



        });
    };

    const init_functions = function () {
        // const ps = new PerfectScrollbar('.inbox_user_list', {
        //     wheelSpeed: 2,
        //     wheelPropagation: false,
        //     minScrollbarLength: 20
        // });

       
    };


    const trig_heartbeat = function () {

        setInterval(function(){

            heartbeat();

        }, 60000);


    };


    const heartbeat = function () {
        $.ajax({
            type: 'POST',
            url: '/aajax/heartbeat',
            dataType: 'json',
            success: function(res)
            {
                if(typeof res !== 'undefined' && res !== null && res !== ''){
                    if(typeof res.status !== 'undefined' && res.status === 'success'){

                        if(typeof res.action !== 'undefined' && res.action === 'new_message'){
                            show_new_message();


                        }

                    }

                }

            },
            error: function(xhr, ajaxOptions, thrownError)
            {

            },

        });
    };



    const show_new_message = function () {

        $('#top_info_icon').removeClass('kt-pulse')
            .removeClass('kt-pulse--danger')
            .addClass('kt-pulse')
            .addClass('kt-pulse--danger');

        $('#top_info_icon > svg > g > path:nth-child(2)').css('fill','red');
        $('#top_info_icon > svg > g > path:nth-child(3)').css('fill','red');
        $('#top_info_icon > span.kt-pulse__ring').css('border-color','red');


        console.log('new message');

    };

    function console_log_details(comment, n_) {
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
    }

    function window_browser_size() {
        let w = window.innerWidth;
        let h = window.innerHeight;
        console_log_details('page start size, w: ' + w + ' h: ' + h,'info')
    }

    function window_browser_resize(){
        $(window).on('resize', function() {
            let w = '';
            let h = '';
            if(window.innerWidth !== undefined && window.innerHeight !== undefined) {
                w = window.innerWidth;
                h = window.innerHeight;
            } else {
                w = document.documentElement.clientWidth;
                h = document.documentElement.clientHeight;
            }
            console_log_details('w: ' + w + ' h: ' + h,'info')
        });


    }



    // Public Functions
    return {
        // public functions
        init: function() {
            heartbeat();
            init_functions();
            handle_change_lang();
            trig_heartbeat();

        },
        console_log_details: function (comment, n_) {
            console_log_details(comment, n_)
        },
        window_browser_size: function () {
            window_browser_size()
        },
        window_browser_resize: function () {
            window_browser_resize()
        },
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    dp.init();
});
