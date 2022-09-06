"use strict";

// Class Definition
const dp = function() {


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
