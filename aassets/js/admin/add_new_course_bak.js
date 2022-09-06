"use strict";


const add_new_course = function () {


    let sample_data = {
        title: '',
        subtitle: '',
        description: '',
        main_category: '',
        sub_category: '',
        course_img: '',
        sections: [
            {
                id: '',
                name: '',
                order: '',
                lectures: [
                    {
                        id: '',
                        section_id: '',
                        name: '',
                        media_type: '',
                        media_url: '',
                        media_name: '',
                        cover_url: '',
                        media_duration_seconds: '',
                        media_duration_string: ''


                    }
                ]
            }
        ]

    };

    let sdata = {
        title: '',
        subtitle: '',
        description: '',
        category: '',
        main_category: '',
        sub_category: '',
        course_img: '',
        sections: []

    };
    let wizardEl;
    let formEl;
    let validator;
    let wizard;
    let kanban4;
    kanban4 = new jKanban({
        element: '#section_div',
        gutter: '0',
        click: function (el) {
            // alert(el.innerHTML);
        },
        dragendBoard: function (el) {
            // console.log('section drag stop');
            // console.log(el);
            update_sections_order();
        },
        dragendEl: function (el) {
            //    console.log('dragendEl called');
            //    console.log(el);
            //    console.log('eid');
            //    console.log($(el).data('eid'));
            //    let eid = $(el).data('eid');
            //
            // let bid =   kanban4.getParentBoardID(eid);
            // console.log('board id ');
            //    console.log(bid);
            //
            //    console.log();
            //    $('#section_div').find('.kanban-board').length


            update_lectures_order();
        },
        dropEl: function (el, target, source, sibling) {
            // console.log('dropEl called');
            // console.log(el);
            // console.log('target');
            // console.log(target);
            // console.log('source');
            // console.log(source);
            // console.log('sibling');
            // console.log(sibling);
        }

    });


    const random_id = function (length) {
        let result = '';
        let characters = 'abcdefghijklmnopqrstuvwxyz';
        let charactersLength = characters.length;
        for (let i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    };


    // Private functions
    const initWizard = function () {
        // Initialize form wizard
        wizard = new KTWizard('kt_wizard_v1', {
            startStep: 1, // initial active step number
            clickableSteps: true  // allow step clicking
        });

        // Validation before going to next page
        wizard.on('beforeNext', function (wizardObj) {
            if (validator.form() !== true) {
                wizardObj.stop();  // don't go to the next step
            }

            save_session();

        });

        wizard.on('beforePrev', function (wizardObj) {
            if (validator.form() !== true) {
                wizardObj.stop();  // don't go to the next step
            }
            save_session();
        });

        // Change event
        wizard.on('change', function (wizard) {
            setTimeout(function () {
                KTUtil.scrollTop();
            }, 500);
        });
    };

    const initValidation = function () {
        validator = formEl.validate({
            // Validate only visible fields
            ignore: ":hidden",

            // Validation rules
            rules: {
                //= Step 1
                address1: {
                    required: true
                },
                postcode: {
                    required: true
                },
                city: {
                    required: true
                },
                state: {
                    required: true
                },
                country: {
                    required: true
                },

                //= Step 2
                package: {
                    required: true
                },
                weight: {
                    required: true
                },
                width: {
                    required: true
                },
                height: {
                    required: true
                },
                length: {
                    required: true
                },

                //= Step 3
                delivery: {
                    required: true
                },
                packaging: {
                    required: true
                },
                preferreddelivery: {
                    required: true
                },

                //= Step 4
                locaddress1: {
                    required: true
                },
                locpostcode: {
                    required: true
                },
                loccity: {
                    required: true
                },
                locstate: {
                    required: true
                },
                loccountry: {
                    required: true
                },
            },

            // Display error
            invalidHandler: function (event, validator) {
                KTUtil.scrollTop();

                swal.fire({
                    "title": "",
                    "text": "There are some errors in your submission. Please correct them.",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary"
                });
            },

            // Submit valid form
            submitHandler: function (form) {


                console.log('submit form');

            }
        });
    };

    const initSubmit = function () {
        let btn = formEl.find('[data-ktwizard-type="action-submit"]');

        btn.on('click', function (e) {
            e.preventDefault();

            if (validator.form()) {
                // See: src\js\framework\base\app.js
                KTApp.progress(btn);
                //KTApp.block(formEl);

                // See: http://malsup.com/jquery/form/#ajaxSubmit
                formEl.ajaxSubmit({
                    success: function () {
                        KTApp.unprogress(btn);
                        //KTApp.unblock(formEl);

                        swal.fire({
                            "title": "",
                            "text": "The application has been successfully submitted!",
                            "type": "success",
                            "confirmButtonClass": "btn btn-secondary"
                        });
                    }
                });
            }
        });
    };


    const init_triggers = function () {

        $('#category').multiselectsplitter();

        handle_image_upload();

        // kanban 4

        get_session();

        trig_add_section();
        trig_add_lecture();

        trig_del();
    };


    const trig_add_section = function () {
        $('#add_section').on('click', function () {


            let section_name = $('#section_name').val();
            //let section_id = '_' + $.trim(section_name);
            let section_id = random_id(10);


            let option = '<option value="' + section_id + '">' + section_name + '</option>';

            if (section_name.length < 1) {

                swal.fire({
                    title: "",
                    text: "There are some errors in your submission. Please correct them.",
                    type: "error",
                    confirmButtonClass: "btn btn-secondary",
                    onClose: function (e) {
                        $('#section_name').removeClass('is-valid').removeClass('is-invalid').addClass('is-invalid');
                        console.log("on close event fired!")
                    }
                });
                return false;
            }

            kanban4.addBoards(
                [{
                    'id': section_id,
                    'title':
                        '<span class="section_div">' +
                        '<span class="section_name" data-section_name="' + section_name + '" >' + section_name + '</span>' +
                        '<span class="pull-right">' +
                        '<a data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Delete Section" data-sid="' + section_id + '" class="btn btn-outline-hover-danger btn-sm btn-icon del_section">' +
                        '<i class="fa fa-trash-alt"></i>' +
                        '</a></span>' +
                        '</span>',
                    'class': 'section_div',
                    section_name: section_name
                }]
            );
            $('#section_selector').append(option);
            $("#section_selector").val(section_id);

            //$('#kanban-select-board').append(option);
            trig_del();
            KTApp.initTooltips();

            let section = {
                id: section_id,
                name: section_name,
                lectures: []
            };

            save_data('add_section', section);


        });
    };


    // const update_sections_order = function () {
    //
    //
    //     let new_orders = [];
    //
    //     for (let i = 0; i < sdata.sections.length; i++) {
    //
    //
    //         new_orders = new_orders.concat([[$('div.kanban-board').eq(i).data('id'), (i + 1)]]);
    //
    //     }
    //
    //
    //     for (let i = 0; i < sdata.sections.length; i++) {
    //         for (let k = 0; k < new_orders.length; k++) {
    //             if (sdata.sections[i].id === new_orders[k][0]) {
    //                 sdata.sections[i].order = new_orders[k][1];
    //             }
    //         }
    //     }
    //     console.log(sdata.sections);
    // };


    const update_lectures_order = function () {

        const $section_div = $('#section_div');

        let num_sections = $section_div.find('.kanban-board').length;

        let sections = [];


        for (let i = 0; i < num_sections; i++) {

            let section_id = $section_div.find('.kanban-board').eq(i).data('id');
            let section_lectures_num = $section_div.find('.kanban-board').eq(i).find('.kanban-item').length;
            let section_name = $section_div.find('.kanban-board').eq(i).find('span.section_div > span.section_name').eq(0).data('section_name');


            sections[i] = {
                id: section_id,
                name:section_name,
                order: i,
                lectures: []
            };

            for (let k = 0; k < section_lectures_num; k++) {
                let eid = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).data('eid');
                let media_name = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).find('input.form-control.typeahead.tt-input').val();
                let media_url = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).find('div.col-md-12.lecture_content > div > div.kt-user-card-v2__pic2 > a').data('video_url');
                let cover_url = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).find('div.col-md-12.lecture_content > div > div.kt-user-card-v2__pic2 > a > img').attr('src');
                let media_duration_seconds = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).find('div.col-md-12.lecture_content > div > div.kt-user-card-v2__details > span').data('duration_seconds');
                let media_duration_string = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).find('div.col-md-12.lecture_content > div > div.kt-user-card-v2__details > span').data('duration_string');
                let name = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).find('span > span.lecture_name').data('lecture_name');
                let media_type = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).find('div.col-md-12.lecture_content > div > div.kt-user-card-v2__pic2 > a.media_info').data('type');

                sections[i].lectures[k] = {
                    id: eid,
                    section_id: section_id,
                    name: name,
                    media_type: media_type,
                    media_url: media_url,
                    media_name: media_name,
                    cover_url: cover_url,
                    media_duration_seconds: media_duration_seconds,
                    media_duration_string: media_duration_string

                }
            }
        }


        console.log(sections);


    };


    const save_data = function (action, data) {


        if (typeof action === 'undefined' || action === null || action === '') {
            return false;
        }


        if (action === 'add_section') {


            if (sdata.sections.length > 0) {

                let already_in_data = false;
                for (let i = 0; i < sdata.sections.length; i++) {

                    if (sdata.sections[i].id === data.id) {
                        already_in_data = true;
                    }
                }

                if (already_in_data) {
                    return false;
                }

            }

            //console.log('add section ');
            //console.log(data);
            sdata.sections = sdata.sections.concat(data);
            //update_sections_order();
            //console.log('after update section')
            //console.log( sdata.sections)
            //Array.prototype.push.apply(sdata.sections, data);

        } else if (action === 'add_lecture') {

            if (sdata.sections.length < 1) {
                return false;
            }


            for (let i = 0; i < sdata.sections.length; i++) {

                if (sdata.sections[i].id === data.section_id) {

                    if (sdata.sections[i].lectures.length > 0) {
                        let already_in = false;
                        for (let k = 0; k < sdata.sections[i].lectures.length; k++) {
                            if (sdata.sections[i].lectures[k].id === data.id) {
                                already_in = true;
                            }
                        }

                        if (already_in) {
                            return false;
                        }
                    }

                    //Array.prototype.push.apply(sdata.sections[i].lectures, data);
                    sdata.sections[i].lectures = sdata.sections[i].lectures.concat(data);
                }
            }


        } else if (action === 'add_media') {
            if (sdata.sections.length < 1) {
                return false;
            }

            for (let i = 0; i < sdata.sections.length; i++) {


                if (sdata.sections[i].lectures.length > 0) {

                    for (let k = 0; k < sdata.sections[i].lectures.length; k++) {
                        if (sdata.sections[i].lectures[k].id === data.lecture_id) {
                            sdata.sections[i].lectures[k].media_type = data.lecture_id;
                            sdata.sections[i].lectures[k].media_url = data.media_url;
                            sdata.sections[i].lectures[k].media_name = data.media_name;
                            sdata.sections[i].lectures[k].cover_url = data.cover_url;
                            sdata.sections[i].lectures[k].media_duration_seconds = data.media_duration_seconds;
                            sdata.sections[i].lectures[k].media_duration_string = data.media_duration_string;
                        }
                    }


                }


            }


        } else if (action === 'del_lecture') {
            if (sdata.sections.length < 1) {
                return false;
            }

            for (let i = 0; i < sdata.sections.length; i++) {

                if (sdata.sections[i].lectures.length > 0) {

                    for (let k = 0; k < sdata.sections[i].lectures.length; k++) {
                        if (sdata.sections[i].lectures[k].id === data) {
                            sdata.sections[i].lectures.splice(k, 1);
                        }
                    }

                }

            }

        } else if (action === 'del_section') {
            if (sdata.sections.length < 1) {
                return false;
            }

            for (let i = 0; i < sdata.sections.length; i++) {

                if (sdata.sections[i].id === data) {
                    sdata.sections.splice(i, 1);


                }

            }


            update_sections_order();

        }

        //console.log(sdata);
    };


    const trig_add_lecture = function () {

        $('#add_lecture').on('click', function (e) {


            let lecture_name = $('#lecture_name').val();
            let section_id = $('#section_selector').val();
            //let lecture_id = '_' + lecture_name;
            let lecture_id = random_id(10);


            if (lecture_name.length < 1) {

                swal.fire({
                    title: "",
                    text: "There are some errors in your submission. Please correct them.",
                    type: "error",
                    confirmButtonClass: "btn btn-secondary",
                    onClose: function (e) {
                        $('#lecture_name').removeClass('is-valid').removeClass('is-invalid').addClass('is-invalid');
                        //console.log("on close event fired!")
                    }
                });
                return false;
            }


            if (section_id.length < 1) {
                swal.fire({
                    title: "",
                    text: "There are some errors in your submission. Please correct them.",
                    type: "error",
                    confirmButtonClass: "btn btn-secondary",
                    onClose: function (e) {
                        $('#section_selector').removeClass('is-valid').removeClass('is-invalid').addClass('is-invalid');
                        //console.log("on close event fired!")
                    }
                });
                return false;
            }


            kanban4.addElement(
                section_id,
                {
                    'id': lecture_id,
                    'title':
                        '<span class="lecture_div" >' +
                        '<span class="lecture_name" data-lecture_name="' + lecture_name + '">' + lecture_name + '</span>' +
                        '<span class="pull-right"><a data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Delete Lecture" data-lid="' + lecture_id + '" class="btn btn-outline-hover-danger btn-sm' +
                        ' btn-icon del_lecture"><i class="fa fa-trash-alt"></i></a></span>' +
                        '<ul class="nav nav-tabs" id="data_tab_' + lecture_id + '" role="tablist">' +
                        '<li class="nav-item">' +
                        '<a class="nav-link active"  data-toggle="tab" href="#add_video_' + lecture_id + '" role="tab" aria-controls="home" aria-selected="true">Video ekle</a>' +
                        '</li>' +
                        '<li class="nav-item">' +
                        '<a class="nav-link"  data-toggle="tab" href="#add2_' + lecture_id + '" role="tab" aria-controls="profile" aria-selected="false">Makale</a>' +
                        '</li>' +
                        '<li class="nav-item">' +
                        '<a class="nav-link"  data-toggle="tab" href="#add3_' + lecture_id + '" role="tab" aria-controls="contact" aria-selected="false">Belki birşey ekleriz</a>' +
                        '</li>' +
                        '</ul>' +
                        '<div class="tab-content" id="tab_content_' + lecture_id + '">' +
                        '<div class="tab-pane fade show active" id="add_video_' + lecture_id + '" role="tabpanel" aria-labelledby="home-tab">' +


                        '<div class="form-group ">' +
                        '<div class="kt-input-icon kt-input-icon--left">' +
                        '<input type="text" class="form-control typeahead" placeholder="Search..." >' +
                        '<span class="kt-input-icon__icon kt-input-icon__icon--left">' +
                        '<span><i class="la la-search"></i></span>' +
                        '</span>' +
                        '</div>' +
                        '</div>' +
                        ' <div class="col-md-12 lecture_content"></div>' +


                        '</div>' +
                        '<div class="tab-pane fade" id="add2_' + lecture_id + '" role="tabpanel" aria-labelledby="profile-tab">2...</div>' +
                        '<div class="tab-pane fade" id="add3_' + lecture_id + '" role="tabpanel" aria-labelledby="contact-tab">3...</div>' +
                        '</div>' +
                        '</span>'


                }
            );

            trig_del();
            trig_typeahead();
            let lecture = {
                id: lecture_id,
                name: lecture_name,
                section_id: section_id
            };
            save_data('add_lecture', lecture)


        });
    };


    const trig_del = function () {
        $('.del_section').off('click').on('click', function () {

            let section_id = $(this).data('sid');
            //console.log('sid= ' + section_id);
            //console.log('before del ');
            //console.log(kanban4.options.boards);


            kanban4.removeBoard(section_id);
            setTimeout(function () {
                //console.log('after del ');
                //console.log(kanban4.options.boards);

                // save_session()
            }, 1000);

            save_data('del_section', section_id);
        });

        $('.del_lecture').off('click').on('click', function (e) {

            let lecture_id = $(this).data('lid');

            kanban4.removeElement(lecture_id);
            save_data('del_lecture', lecture_id);
            save_session();
        })

    };


    const trig_typeahead = function () {
        $('.typeahead').typeahead('destroy');

        const bestPictures = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            // prefetch: '/aajax/search_library',
            remote: {
                url: '/aajax/search_library/%QUERY',
                wildcard: '%QUERY',
            }
        });

        $('input.typeahead').typeahead(null, {
            name: 'best-pictures',
            display: 'value',
            source: bestPictures,

            templates: {
                empty: [
                    '<div class="empty-message" style="padding: 10px 15px; text-align: center;">',
                    'unable to find any Best Picture winners that match the current query',
                    '</div>'
                ].join('\n'),
                suggestion: Handlebars.compile('<div class="kt-user-card-v2 kt-pt15 kt-pl10"><div class="kt-user-card-v2__pic2" style="width: 120px"><img class="video_modal_search_img" height="50" src="{{img}}" style="border-radius:' +
                    ' 4px;"/></div><div class="kt-user-card-v2__details"><a class="kt-user-card-v2__name" href="#">{{value}}</a><span class="kt-user-card-v2__desc" data-duration-seconds="{{duration_seconds}}" data-duration_string="{{duration_string}}">Duration: {{duration_string}}</span></div></div>')
                ,
            },

        });

        $('input.typeahead').on('typeahead:selected', function (e, data) {


            let html = '<div class="kt-user-card-v2 kt-pt15"><div class="kt-user-card-v2__pic2" style="width: 120px">';

            if (data.type === 'video/mp4') {
                html += '<a href="" data-video_url="' + data.video_url + '" data-type="' + data.type + '" class="media_info" data-toggle="modal" data-target="#kt_modal_6">' +
                    '<img height="50" src="' + data.img + '" style="border-radius: 4px;"/>' +
                    '</a>';
            } else {
                html += '<a href="" data-toggle="modal" data-target="#kt_modal_7"  data-type="' + data.type + '" class="media_info" >' +
                    '<img height="50" src="' + data.img + '" style="border-radius: 4px;"/>' +
                    '</a>';
            }


            html += '</div>' +
                '<div class="kt-user-card-v2__details"><a class="kt-user-card-v2__name" href="#">' + data.value + '</a>' +
                '<span class="kt-user-card-v2__desc" data-duration_seconds="' + data.duration_seconds + '" data-duration_string="' + data.duration_string + '">Duration: ' + data.duration_string + '</span>' +
                '</div></div>';
            $(this).parents().eq(3).find('div.lecture_content').eq(0).html(html);

            //console.log($(this).closest('div.kanban-item').data('eid'));

            let lecture_id = $(this).closest('div.kanban-item').data('eid');

            let lecture_media = {
                lecture_id: lecture_id,
                media_type: data.type,
                media_url: data.video_url,
                media_name: data.value,
                cover_url: data.img,
                media_duration_seconds: data.duration_seconds,
                media_duration_string: data.duration_string,

            };

            save_data('add_media', lecture_media);


            trig_video_modal();

        });

    };


    const trig_video_modal = function () {
        $('.media_info').off('click').on('click', function () {
            let video_url = $(this).data('video_url');
            //console.log(video_url);

            $('#modal_video_player_html5_api').attr('src', video_url);

            $('#modal_close_video').off('click').on('click', function () {
                videojs('modal_video_player').pause();

            });


            $("#kt_modal_6").on('hidden.bs.modal', function () {
                videojs('modal_video_player').pause();
            });


        })


    };


    const handle_image_upload = function () {
        // set the dropzone container id
        let id = '#kt_dropzone_5';

        // set the preview element template
        let previewNode = $(id + " .dropzone-item");
        previewNode.id = "";
        let previewTemplate = previewNode.parent('.dropzone-items').html();
        previewNode.remove();

        var myDropzone5 = new Dropzone(id, { // Make the whole body a dropzone
            url: "/aajax/update_course_image", // Set the url for your upload script location
            parallelUploads: 1,
            uploadMultiple: false,
            maxFilesize: 5, // Max filesize in MB
            maxFiles: 1,
            previewTemplate: previewTemplate,
            previewsContainer: id + " .dropzone-items", // Define the container to display the previews
            clickable: id + " .dropzone-select" // Define the element that should be used as click trigger to select files.
        });

        myDropzone5.on("addedfile", function (file) {
            // Hookup the start button
            $(document).find(id + ' .dropzone-item').css('display', '');
        });

        // Update the total progress bar
        myDropzone5.on("totaluploadprogress", function (progress) {
            $(id + " .progress-bar").css('width', progress + "%");
        });

        myDropzone5.on("sending", function (file, a, b) {


            $(id + " .progress-bar").css('opacity', "1");
        });

        myDropzone5.on("success", function (a, b) {

            if (typeof b !== 'undefined' && b !== null && b !== '') {
                if (typeof b.data !== 'undefined' && b.data !== null && b.data !== '') {
                    if (typeof b.data.url !== 'undefined' && b.data.url !== null && b.data.url !== '') {
                        $('#add_course_img').attr('src', b.data.url)
                    }
                }
            }


        });

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone5.on("complete", function (progress) {
            var thisProgressBar = id + " .dz-complete";
            setTimeout(function () {
                $(thisProgressBar + " .progress-bar, " + thisProgressBar + " .progress").css('opacity', '0');
            }, 300)
        });
    };


    const save_session = function () {




        const $section_div = $('#section_div');

        let num_sections = $section_div.find('.kanban-board').length;

        let sections = [];


        for (let i = 0; i < num_sections; i++) {

            let section_id = $section_div.find('.kanban-board').eq(i).data('id');
            let section_lectures_num = $section_div.find('.kanban-board').eq(i).find('.kanban-item').length;
            let section_name = $section_div.find('.kanban-board').eq(i).find('span.section_div > span.section_name').eq(0).data('section_name');


            sections[i] = {
                id: section_id,
                name:section_name,
                order: i,
                lectures: []
            };

            for (let k = 0; k < section_lectures_num; k++) {
                let eid = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).data('eid');
                let media_name = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).find('input.form-control.typeahead.tt-input').val();
                let media_url = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).find('div.col-md-12.lecture_content > div > div.kt-user-card-v2__pic2 > a').data('video_url');
                let cover_url = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).find('div.col-md-12.lecture_content > div > div.kt-user-card-v2__pic2 > a > img').attr('src');
                let media_duration_seconds = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).find('div.col-md-12.lecture_content > div > div.kt-user-card-v2__details > span').data('duration_seconds');
                let media_duration_string = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).find('div.col-md-12.lecture_content > div > div.kt-user-card-v2__details > span').data('duration_string');
                let name = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).find('span > span.lecture_name').data('lecture_name');
                let media_type = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).find('div.col-md-12.lecture_content > div > div.kt-user-card-v2__pic2 > a.media_info').data('type');

                sections[i].lectures[k] = {
                    id: eid,
                    section_id: section_id,
                    name: name,
                    media_type: media_type,
                    media_url: media_url,
                    media_name: media_name,
                    cover_url: cover_url,
                    media_duration_seconds: media_duration_seconds,
                    media_duration_string: media_duration_string

                }
            }
        }


        let data= {
            title: $('#course_title').val(),
            sub_title: $('#course_subtitle').val(),
            description: $('textarea#course_description').val(),
            main_category: $('#category :selected').parent().attr('label'),
            sub_category: $('#category :selected').val(),
            course_img: $('#add_course_img').attr('src'),
            sections:sections
        };



        console.log(data);


        $.ajax({
            type: 'POST',
            url: '/aajax/save_sess_add_new_course',
            dataType: 'json',
            data: data,
            success: function (res) {
                if (typeof res !== 'undefined' && res !== null && res !== '') {
                    if (typeof res.status !== 'undefined' && res.status === 'success') {


                    }

                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });

    };


    const render_kanban = function (boards) {

        if (typeof boards !== 'undefined') {
            kanban4.addBoards(boards)
        } else {
            return false;
        }

        let new_options_html = '';


        for (let i = 0; i < boards.length; i++) {
            const regex = /(.+?(?=<span))/s;
            const str = boards[i].title;
            let m;


            if ((m = regex.exec(str)) !== null) {

                new_options_html += '<option value="' + boards[i].id + '">' + m[0] + "</option>";
            }

            if (typeof boards[i].lectures !== 'undefined') {
                let lectures = boards[i].lectures;
                if (lectures.length > 0) {
                    for (let k = 0; k < lectures.length; k++) {

                        kanban4.addElement(boards[i].id, lectures[k])

                    }

                }

            }


        }


        $('#section_selector').append(new_options_html);


        trig_del();

    };


    const get_session = function () {


        $.ajax({
            type: 'POST',
            url: '/aajax/get_sess_boards',
            dataType: 'json',

            success: function (res) {
                if (typeof res !== 'undefined' && res !== null && res !== '') {
                    if (typeof res.status !== 'undefined' && res.status === 'success') {
                        if (typeof res.data !== 'undefined' && res.data !== '' && res.data !== null) {

                            render_kanban(res.data)

                        } else {
                            render_kanban()
                        }


                    }


                }


            },
            error: function (xhr, ajaxOptions, thrownError) {

            },

        });

    };

    const init_sticky = function () {
        //let sticky = new Sticky('.sticky');

        // $('#kt_aside_toggler').on('click',function(e){
        //     console.log('sdfsd');
        //     var sticky = new Sticky('.sticky');
        //     setTimeout(function() {
        //         sticky.update(); // update sticky positions on aside toggle
        //
        //     }, 500);
        // });
    }


    return {
        // public functions
        init: function () {

            wizardEl = KTUtil.get('kt_wizard_v1');
            formEl = $('#kt_form');

            init_triggers();
            initWizard();
            initValidation();
            initSubmit();
            init_sticky();

        }
    };
}();

jQuery(document).ready(function () {
    add_new_course.init();
});

let ddata = [
    {
        sid: 'ssdfsdsf',
        order: 0,
        lectures: [
            {
                eid: 'sfsfsf',
                order: 0
            }
        ]
    }
];
