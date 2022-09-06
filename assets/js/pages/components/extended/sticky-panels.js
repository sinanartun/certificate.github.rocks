"use strict";
// Class definition
// Based on:  https://github.com/rgalus/sticky-js

var KTStickyPanelsDemo = function () {

    // Private functions

    // Basic demo
    var demo1 = function () {


        $('#kt_aside_toggler').on('click',function(e){
            console.log('sdfsd');
            var sticky = new Sticky('.sticky');
            setTimeout(function() {
                sticky.update(); // update sticky positions on aside toggle

            }, 500);
        });

            //
            // if (KTLayout.onAsideToggle()) {
            //
            //
            //     KTLayout.onAsideToggle(function() {
            //
            //     });
            // }
            //


    }

    return {
        // public functions
        init: function() {
            demo1();
        }
    };
}();

jQuery(document).ready(function() {
    KTStickyPanelsDemo.init();
});
