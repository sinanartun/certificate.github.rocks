"use strict";

// Class definition

var KTKanbanBoardDemo = function () {


    // Basic demo
    var demos = function () {


        $("#add_new_section_form").validate({
            rules: {
                section_name: {required: !0},
            }, invalidHandler: function (e, r) {
                swal.fire({
                    title: "",
                    text: "There are some errors in your submission. Please correct them.",
                    type: "error",
                    confirmButtonClass: "btn btn-secondary",
                    onClose: function (e) {
                        console.log("on close event fired!")
                    }
                }), e.preventDefault()
            }, submitHandler: function (e) {
                return !1
            }
        });

        $("#add_new_lecture_form").validate({
            rules: {
                lecture_name: {required: !0},
                section_selector: {required: !0},

            }, invalidHandler: function (e, r) {
                swal.fire({
                    title: "",
                    text: "There are some errors in your submission. Please correct them.",
                    type: "error",
                    confirmButtonClass: "btn btn-secondary",
                    onClose: function (e) {
                        console.log("on close event fired!")
                    }
                }), e.preventDefault()
            }, submitHandler: function (e) {
                return !1
            }
        });

        $("#add_new_lecture_formss").validate({
            rules: {
                lecture_name: {required: !0},
                billing_card_number: {required: !0, creditcard: !0},
                billing_card_exp_month: {required: !0},
                billing_card_exp_year: {required: !0},
                billing_card_cvv: {required: !0, minlength: 2, maxlength: 3},
                billing_address_1: {required: !0},
                billing_address_2: {},
                billing_city: {required: !0},
                billing_state: {required: !0},
                billing_zip: {required: !0, number: !0},
                billing_delivery: {required: !0}
            }, invalidHandler: function (e, r) {
                swal.fire({
                    title: "",
                    text: "There are some errors in your submission. Please correct them.",
                    type: "error",
                    confirmButtonClass: "btn btn-secondary",
                    onClose: function (e) {
                        console.log("on close event fired!")
                    }
                }), e.preventDefault()
            }, submitHandler: function (e) {
                return !1
            }
        });


        // {
        //     element          : '',                                           // selector of the kanban container
        //         gutter           : '15px',                                       // gutter of the board
        //     widthBoard       : '250px',                                      // width of the board
        //     responsivePercentage: false,                                    // if it is true I use percentage in the width of the boards and it is not necessary gutter and widthBoard
        //     dragItems        : true,                                         // if false, all items are not draggable
        //     boards           : [],                                           // json of boards
        //     dragBoards       : true,                                         // the boards are draggable, if false only item can be dragged
        //     addItemButton    : false,                                        // add a button to board for easy item creation
        //     buttonContent    : '+',                                          // text or html content of the board button
        //     itemHandleOptions: {
        //     enabled             : false,                                 // if board item handle is enabled or not
        //         handleClass         : "item_handle",                         // css class for your custom item handle
        //         customCssHandler    : "drag_handler",                        // when customHandler is undefined, jKanban will use this property to set main handler class
        //         customCssIconHandler: "drag_handler_icon",                   // when customHandler is undefined, jKanban will use this property to set main icon handler class. If you want, you can use font icon libraries here
        //         customHandler       : "<span class='item_handle'>+</span> %s"// your entirely customized handler. Use %s to position item title
        // }

        // kanban 4
        var kanban4 = new jKanban({
            element: '#section_div',
            gutter: '0',

            click: function (el) {
                // alert(el.innerHTML);
            },
            boards: [
                {
                    'id': '_board1',
                    'title': 'Bölüm 1' + '<span class="pull-right"><a data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Delete Section" style="cursor:pointer" data-id="_section_1" class="btn btn-outline-hover-danger btn-sm btn-icon del_section"><i class="fa fa-trash-alt"></i></a></span>',
                    'item': []
                }


            ]
        });

        $('#add_section').on('click', function (e) {


            let section_name = $('#section_name').val();
            let section_id = '_' + $.trim(section_name);
            let option = '<option value="' + section_id + '">' + section_name + '</option>';


            kanban4.addBoards(
                [{
                    'id': section_id,
                    'title': section_name +
                        '<span class="pull-right"><a data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Delete Section" style="cursor:pointer" data-id="' + section_id + '" class="btn btn-outline-hover-danger btn-sm btn-icon del_section"><i class="fa fa-trash-alt"></i></a></span>'
                }]
            );
            $('#section_selector').append(option);
            //$('#kanban-select-board').append(option);
            trig_del();
            KTApp.initTooltips();

        });

        // var addBoard = document.getElementById('addBoard');
        // addBoard.addEventListener('click',function(){
        //     var boardTitle = $('#kanban-add-board').val();
        //     var boardId = '_' + $.trim(boardTitle);
        //     var boardColor = $('#kanban-add-board-color').val();
        //     var option = '<option value="'+boardId+'">'+boardTitle+'</option>';
        //
        //
        //     kanban4.addBoards(
        //         [{
        //             'id' : boardId,
        //             'title'  : boardTitle,
        //             //'class': boardColor
        //         }]
        //     );
        //     $('#kanban-select-task').append(option);
        //     $('#kanban-select-board').append(option);
        // });


        $('#add_lecture').on('click', function (e) {


            let lecture_name = $('#lecture_name').val();
            let section = $('#section_selector').val();
            let id = '_' + lecture_name;

            kanban4.addElement(
                section,
                {
                    'id': id,
                    'title': lecture_name +
                        '<span class="pull-right"><a data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Delete Section" style="cursor:pointer" data-id="' + id + '" class="btn btn-outline-hover-danger btn-sm' +
                        ' btn-icon del_lecture"></span>'+
                        '<ul class="nav nav-tabs" id="myTab" role="tablist">' +
                        '<li class="nav-item">' +
                        '<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Video ekle</a>' +
                        '</li>' +
                        '<li class="nav-item">' +
                        '<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Makale</a>' +
                        '</li>' +
                        '<li class="nav-item">' +
                        '<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Belki birşey ekleriz</a>' +
                        '</li>' +
                        '</ul>' +
                        '<div class="tab-content" id="myTabContent">' +
                        '<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">' +


                        '<div class="col-12">' +
                        '<div class="typeahead">' +
                        '<input class="form-control typeahead" type="text" dir="ltr" placeholder="Please metarials">' +
                        '</div>' +
                        '</div>'+


                        '</div>' +
                        '<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">2...</div>' +
                        '<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">3...</div>' +
                        '</div>'


                }
            );

            trig_del();
        });


        const trig_del = function () {
            $('.del_section').off('click').on('click', function (e) {

                let section_id = $(this).data('id');
                kanban4.removeBoard(section_id);

            });

            $('.del_lecture').off('click').on('click', function (e) {

                let section_id = $(this).data('id');

                kanban4.removeElement(section_id);
            })

        };

        trig_del();
        // var addTask = document.getElementById('addTask');
        // addTask.addEventListener('click', function () {
        //     var target = $('#kanban-select-task').val();
        //     var title = $('#kanban-add-task').val();
        //     var taskColor = $('#kanban-add-task-color').val();
        //     kanban4.addElement(
        //         target,
        //         {
        //             'title': title,
        //             'class': taskColor
        //         }
        //     );
        // });

        // var removeBoard2 = document.getElementById('removeBoard2');
        // removeBoard2.addEventListener('click', function () {
        //     var target = $('#kanban-select-board').val();
        //     kanban4.removeBoard(target);
        //     $('#kanban-select-task option[value="' + target + '"]').remove();
        //     $('#kanban-select-board option[value="' + target + '"]').remove();
        // });
    };


    return {
        // public functions
        init: function () {
            demos();
            init();

        }
    };
}();

jQuery(document).ready(function () {
    KTKanbanBoardDemo.init();
});
//# sourceMappingURL=kanban-board.js.map
