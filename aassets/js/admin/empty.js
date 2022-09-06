"use strict";

// Class Definition
const empty = function() {

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


    // Public Functions
    return {
        // public functions
        init: function() {




        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    empty.init();
});
