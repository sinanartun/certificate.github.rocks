"use strict";

// Class Definition
const home = function() {

    const trig_register_course = function() {
        $('.register_course').on('click',function(e) {
            e.preventDefault();
            const $this = $(this);
            const cc = $(this).data('course_code');
            $.ajax({
                type: 'POST',
                url: '/uajax/register_course',
                dataType: 'json',
                data:{
                    course_code: cc
                },
                success: function(res)
                {
                    if(typeof res !== 'undefined' && res !== null && res !== ''){
                        if(typeof res.status !== 'undefined' && res.status === 'success'){

                            $this.blur();
                            swal.fire(res.status, res.msg, "success");
                            register_course_btn_comment($this);

                        }else {
                            $this.blur();
                            swal.fire(res.status, res.msg, "error");
                        }

                    }

                },
                error: function(xhr, ajaxOptions, thrownError)
                {

                },

            });

        });
    };

    const register_course_btn_comment = function ($this) {
        $this.addClass('kt-hidden');
        $this.parent().find('a.register_course_get').eq(0).removeClass('kt-hidden');
        //$this.off('click').removeClass('register_course').removeClass('btn-label-brand').addClass('btn-label-info').html('Kursa Git').attr('href',cc);

    };



    // Public Functions
    return {
        // public functions
        init: function() {
            trig_register_course();



        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    home.init();
});
