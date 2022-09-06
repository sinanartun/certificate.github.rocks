"use strict";


const add_new_course = function () {


  let wizardEl;
  let formEl;
  let validator;
  let wizard;
  let kanban4;
  let cropper;
  let yt_player;
  let done = false;
  kanban4 = new jKanban({
    element: '#section_div',
    gutter: '0',
    click: function (el) {
      // alert(el.innerHTML);
    },
    dragendBoard: function (el) {
      // console.log('section drag stop');
      // console.log(el);
      save_session();
    },
    dragendEl: function (el) {
      save_session();
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
        course_title: {
          required: true,
          minlength: 5
        },
        course_subtitle: {
          required: true,
          minlength: 15
        },
        course_description: {
          required: true,
          minlength: 20
        },
        category: {
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

    btn.off('click').on('click', function (e) {
      e.preventDefault();

      if (validator.form()) {
        // See: src\js\framework\base\app.js
        KTApp.progress(btn);
        //KTApp.block(formEl);

        // See: http://malsup.com/jquery/form/#ajaxSubmit
        formEl.ajaxSubmit({

          type: 'POST',
          url: '/aajax/submit_new_course',
          dataType: 'json',
          success: function (res) {
            KTApp.unprogress(btn);

            if (typeof res !== 'undefined' && res !== null && res !== '') {
              if (typeof res.status !== 'undefined' && res.status === 'success') {
                swal.fire({
                  "title": "",
                  "text": res.msg,
                  "type": "success",
                  "confirmButtonClass": "btn btn-secondary"
                });

              } else {
                swal.fire({
                  "title": "",
                  "text": res.msg,
                  "type": "error",
                  "confirmButtonClass": "btn btn-secondary"
                });

              }

            }


          },
          error: function (res) {
            KTApp.unprogress(btn);
            swal.fire({
              "title": "System ERROR",
              "text": 'Unable to complete progress. Please try again later.',
              "type": "error",
              "confirmButtonClass": "btn btn-secondary"
            });
          }
        });
      }
    });
  };

  const trig_crop = function () {
    $('#crop_btn').off('click').on('click', function (e) {
      e.preventDefault();
      if (typeof cropper === 'undefined') {
        init_crop();
        return false;
      }

      let data = cropper.getData();
      let x = parseInt(data.x);
      let y = parseInt(data.y);
      let width = parseInt(data.width);
      let height = parseInt(data.height);
      let img = $('#add_course_img').attr('src');
      console.log(data);

      $.ajax({
        type: 'POST',
        url: '/aajax/crop_course_img',
        dataType: 'json',
        data: {
          x, y, width, height, img
        },
        success: function (res) {
          if (typeof res !== 'undefined' && res !== null && res !== '') {
            if (typeof res.status !== 'undefined' && res.status === 'success') {

              if (typeof res.data !== 'undefined' && typeof res.data.url !== 'undefined') {

                init_crop();


              }


            }

          }


        },
        error: function (xhr, ajaxOptions, thrownError) {

        },

      });
    })
  };


  const trig_edit_img = function () {
    $('#edit_course_img_btn').off('click').on('click', function () {
      init_crop();
      $('#crop_btn, #del_img_btn, #cancel_course_img_btn').removeClass('kt-hidden');
      $(this).removeClass('kt-hidden').addClass('kt-hidden');


    });
  };

  const trig_cancel_img = function () {
    $('#cancel_course_img_btn').off('click').on('click', function () {
      if (typeof cropper !== 'undefined') {
        cropper.destroy();
      }
      let img_src = $('#add_course_img').attr('src');


      $('#crop_btn, #del_img_btn, #cancel_course_img_btn').removeClass('kt-hidden').addClass('kt-hidden');
      $('#edit_course_img_btn').removeClass('kt-hidden');
      $('#x, #y, #c_width, #c_height').html('');

      $('#add_course_img').attr('src', img_src);
    });
  };


  const init_crop = function () {
    const image = document.getElementById('add_course_img');
    if (typeof cropper !== 'undefined') {
      cropper.destroy();
    }


    cropper = new Cropper(image, {
      minContainerHeight: 200,
      minContainerWidth: 200,

      aspectRatio: 220 / 125,
      crop(event) {
        $('#x').html('x: ' + parseInt(event.detail.x));
        $('#y').html('y: ' + parseInt(event.detail.y));
        $('#c_width').html('w: ' + parseInt(event.detail.width));
        $('#c_height').html('h: ' + parseInt(event.detail.height));
        console.log("event.detail.x=" + event.detail.x);
        console.log("event.detail.y=" + event.detail.y);
        console.log("event.detail.width=" + event.detail.width);
        console.log("event.detail.height=" + event.detail.height);
        // console.log(event.detail.rotate);
        console.log("scaleX:" + event.detail.scaleX);
        console.log("scaleY:" + event.detail.scaleY);
      },
    });

  };


  const init_triggers = function () {

    $('#category').multiselectsplitter();

    handle_image_upload();

    // kanban 4

    get_session();
    trig_edit_img();
    trig_add_section();
    trig_add_lecture();
    trig_cancel_img();
    trig_crop();
    trig_del();
    trig_preview_card();
    trig_collapse();
  };


  const trig_add_section = function () {
    $('#add_section').off('click').on('click', function () {


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
            '<span class="section_name" data-section_name="' + section_name + '" >' + section_name + '<span id="tmls_' + section_id + '"></span></span>' +
            '<span class="pull-right">' +
            // '<a data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Delete Section" data-sid="' + section_id +
            // '" class="btn btn-outline-hover-danger btn-sm btn-icon del_section">' +
            '<a  data-sid="' + section_id +
            '" class="btn btn-outline-hover-danger btn-sm btn-icon del_section">' +
            '<i class="fa fa-trash-alt"></i>' +
            '</a></span>' +
            '</span>',
          'class': 'section_div',
          section_name: section_name
        }]
      );
      $('#section_selector').append(option);
      $("#section_selector").val(section_id);

      trig_del();
      // KTApp.initTooltips();
      KTApp.initTooltip($('[data-sid="' + section_id + '"]'));


      save_session();


    });
  };


  const trig_add_lecture = function () {

    $('#add_lecture').off('click').on('click', function (e) {


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
            '<div class="accordion  accordion-toggle-arrow" id="lecture_title_div_' + lecture_id + '">' +
            '<div class="card lecture_acor_box">' +
            '<div class="card-header lecture_title_acor_box" id="headingThree4">' +
            '<div class="card-title collapsed" data-toggle="collapse" data-target="#lecture_collapse_' + lecture_id + '" aria-expanded="false" aria-controls="collapseThree4" data-lecture_name="' + lecture_name + '">' +
            lecture_name +
            '</div>' +
            '</div>' +
            '<div id="lecture_collapse_' + lecture_id + '" class="collapse" aria-labelledby="headingThree1" data-parent="#lecture_title_div_' + lecture_id + '">' +
            '<div class="card-body">' +

            '<span class="lecture_div" >' +
            // '<span class="pull-right"><a data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Delete Lecture" data-lid="' + lecture_id + '" class="btn btn-outline-hover-danger btn-sm' +
            // ' btn-icon del_lecture"><i class="fa fa-trash-alt"></i></a></span>' +
            '<span class="pull-right"><a data-lid="' + lecture_id + '" class="btn btn-outline-hover-danger btn-sm' +
            ' btn-icon del_lecture"><i class="fa fa-trash-alt"></i></a></span>' +
            '<ul class="nav nav-tabs" id="data_tab_' + lecture_id + '" role="tablist">' +
            '<li class="nav-item">' +
            '<a class="nav-link active"  data-toggle="tab" href="#add_video_' + lecture_id + '" role="tab" aria-controls="home" aria-selected="true">Video ekle</a>' +
            '</li>' +
            '<li class="nav-item">' +
            '<a class="nav-link"  data-toggle="tab" href="#add_article_' + lecture_id + '" role="tab" aria-controls="profile" aria-selected="false">Makale</a>' +
            '</li>' +
            '<li class="nav-item">' +
            '<a class="nav-link"  data-toggle="tab" href="#add_test_' + lecture_id + '" role="tab" aria-controls="profile" aria-selected="false">Test</a>' +
            '</li>' +
            '<li class="nav-item">' +
            '<a class="nav-link"  data-toggle="tab" href="#add_description_' + lecture_id + '" role="tab" aria-controls="contact" aria-selected="false">Açıklama</a>' +
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


            '</div>' +


            '<div class="tab-pane fade" id="add_article_' + lecture_id + '" role="tabpanel" aria-labelledby="profile-tab">' +

            '<div class="form-group ">' +
            '<div class="kt-input-icon kt-input-icon--left">' +
            '<input type="text" class="form-control typeahead_article" placeholder="Search..." >' +
            '<span class="kt-input-icon__icon kt-input-icon__icon--left">' +
            '<span><i class="la la-search"></i></span>' +
            '</span>' +
            '</div>' +
            '</div>' +
            // '<div class="col-md-12 lecture_content"></div>' +


            '</div>' +


            '<div class="tab-pane fade" id="add_test_' + lecture_id + '" role="tabpanel" aria-labelledby="profile-tab">' +

            '<div class="form-group ">' +
            '<div class="kt-input-icon kt-input-icon--left">' +
            '<input type="text" class="form-control typeahead_test" placeholder="Search..." >' +
            '<span class="kt-input-icon__icon kt-input-icon__icon--left">' +
            '<span><i class="la la-search"></i></span>' +
            '</span>' +
            '</div>' +
            '</div>' +
            // '<div class="col-md-12 lecture_content"></div>' +


            '</div>' +


            '<div class="tab-pane fade" id="add_description_' + lecture_id + '" role="tabpanel" aria-labelledby="contact-tab">' +
            '<div class="form-group ">' +
            '<div class="kt-input-icon kt-input-icon--left">' +
            '<textarea placeholder="+ Add materials" rows="3" class="row col-md-12 kt-ml-0 course_materials_content" id="course_materials_content_' + lecture_id + '"></textarea>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</span>' +
            '<div class="col-md-12 lecture_content"></div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>'


        }
      );

      trig_del();
      trig_typeahead();
      trig_typeahead_article();
      trig_typeahead_test();

      save_session();


      KTApp.initTooltip($('[data-lid="' + lecture_id + '"]'));

    });
  };


  const trig_del = function () {
    $('.del_section').off('click').on('click', function () {
      let section_id = $(this).data('sid');
      $(this).addClass('kt-hidden');


      setTimeout(function () {
        kanban4.removeBoard(section_id);
        setTimeout(function () {

          save_session();
          KTApp.initTooltips();
        }, 500);
      }, 500);


    });

    $('.del_lecture').off('click').on('click', function (e) {
      let lecture_id = $(this).data('lid');
      $(this).addClass('kt-hidden');
      setTimeout(function () {
        kanban4.removeElement(lecture_id);
        setTimeout(function () {

          save_session();
          KTApp.initTooltips();
        }, 500);
      }, 500);
    })

  };


  const trig_typeahead = function () {
    $('.typeahead').typeahead('destroy');

    const bestPictures = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      // prefetch: '/aajax/search_library',
      minLength: 3,
      remote: {
        url: '/aajax/search_library/?q=%QUERY',
        wildcard: '%QUERY',
      }
    });

    $('input.typeahead').typeahead(null, {
      name: 'best-pictures',
      display: 'value',
      source: bestPictures,
      minLength: 3,
      async: true,

      templates: {
        empty: [
          '<div class="empty-message" style="padding: 10px 15px; text-align: center;">',
          'unable to find any result',
          '</div>'
        ].join('\n'),
        suggestion: Handlebars.compile(
          '<div class="kt-user-card-v2 kt-pt15 kt-pl10"><div class="kt-user-card-v2__pic2" style="width: 120px">' +
          '<img class="video_modal_search_img" height="50" src="{{img}}" style="border-radius: 4px;"/>' +
          '</div><div class="kt-user-card-v2__details"><a class="kt-user-card-v2__name" href="#">' +
          '{{value}}</a><span class="kt-user-card-v2__desc" data-duration-seconds="{{duration_seconds}}" ' +
          'data-duration_string="{{duration_string}}">Duration: {{duration_string}}</span></div></div>')
        ,
      },

    });

    $('input.typeahead').off('typeahead:selected').on('typeahead:selected', function (e, data) {


      let html = '<div class="kt-user-card-v2 kt-pt15"><div class="kt-user-card-v2__pic2" style="width: 120px">';

      if (data.type === 'video/mp4') {
        html += '<a href="" data-media_url="' + data.media_url + '" data-type="' + data.type + '" class="media_info" data-toggle="modal" data-target="#kt_modal_6">' +
          '<img height="50" src="' + data.img + '" style="border-radius: 4px;"/>' +
          '</a>';
      } else if (data.type === 'video/youtube') {
        html += '<a href="" data-media_url="' + data.media_url + '" data-type="' + data.type + '" class="media_info" data-toggle="modal" data-target="#kt_modal_6">' +
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
      $(this).parents().eq(6).find('div.lecture_content').eq(0).html(html);

      trig_video_modal();

      setTimeout(function () {

        save_session();

      }, 500);

    });

  };

  const trig_typeahead_article = function () {
    $('.typeahead_article').typeahead('destroy');

    const bestPictures = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      // prefetch: '/aajax/search_library',
      minLength: 3,
      remote: {
        url: '/aajax/search_library_article/%QUERY',
        wildcard: '%QUERY',
      }
    });

    $('input.typeahead_article').typeahead(null, {
      name: 'best-pictures',
      display: 'value',
      source: bestPictures,
      minLength: 3,
      async: true,

      templates: {
        empty: [
          '<div class="empty-message" style="padding: 10px 15px; text-align: center;">',
          'unable to find any result',
          '</div>'
        ].join('\n'),
        suggestion: Handlebars.compile(
          '<div class="kt-user-card-v2 kt-pt15 kt-pl10"><div class="kt-user-card-v2__pic2" style="width: 120px">' +
          '<img class="video_modal_search_img" height="50" src="{{img}}" style="border-radius: 4px;"/>' +
          '</div><div class="kt-user-card-v2__details"><a class="kt-user-card-v2__name" href="#">' +
          '{{value}}</a>' +
          '</div></div>')
        ,
      },

    });

    $('input.typeahead_article').off('click').on('typeahead:selected', function (e, data) {


      let html = '<div class="kt-user-card-v2 kt-pt15"><div class="kt-user-card-v2__pic2" style="width: 120px">';

      if (data.type === 'text/plain') {
        html += '<a href="" data-media_name="' + data.value + '" data-type="' + data.type + '" data-media_url="' + data.media_url + '" class="article_info" data-toggle="modal" data-target="#kt_modal_8">' +
          '<img height="50" src="' + data.img + '" style="border-radius: 4px;"/>' +
          '</a>';
      }


      html += '</div>' +
        '<div class="kt-user-card-v2__details"><a class="kt-user-card-v2__name" href="#">' + data.value + '</a>' +
        '<span class="kt-user-card-v2__desc" ></span>' +
        '</div></div>';
      $(this).parents().eq(6).find('div.lecture_content').eq(0).html(html);

      trig_article_modal();
      setTimeout(function () {

        save_session();

      }, 500);

    });

  };

  const trig_typeahead_test = function () {
    $('.typeahead_test').typeahead('destroy');

    const bestPictures = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      // prefetch: '/aajax/search_library',
      minLength: 3,
      remote: {
        url: '/aajax/search_test/%QUERY',
        wildcard: '%QUERY',
      }
    });

    $('input.typeahead_test').typeahead(null, {
      name: 'best-pictures',
      display: 'value',
      source: bestPictures,
      minLength: 3,
      async: true,

      templates: {
        empty: [
          '<div class="empty-message" style="padding: 10px 15px; text-align: center;">',
          'unable to find any result',
          '</div>'
        ].join('\n'),
        suggestion: Handlebars.compile(
          '<div class="kt-user-card-v2 kt-pt15 kt-pl10"><div class="kt-user-card-v2__pic2" style="width: 120px">' +
          '<img class="video_modal_search_img" height="50" src="{{img}}" style="border-radius: 4px;"/>' +
          '</div><div class="kt-user-card-v2__details"><a class="kt-user-card-v2__name" href="#">' +
          '{{value}}</a>' +
          '</div></div>')
        ,
      },

    });

    $('input.typeahead_test').off('click').on('typeahead:selected', function (e, data) {


      let html = '<div class="kt-user-card-v2 kt-pt15"><div class="kt-user-card-v2__pic2" style="width: 120px">';

      if (data.type === 'test') {
        html += '<a href="" data-media_name="' + data.value + '" data-type="' + data.type + '" data-media_url="' + data.tid + '" ' +

          ' class="article_info" data-toggle="modal" data-target="#test_modal">' +
          '<img height="50" src="' + data.img + '" style="border-radius: 4px;"/>' +
          '</a>';
      }


      html += '</div>' +
        '<div class="kt-user-card-v2__details"><a class="kt-user-card-v2__name" href="#">' + data.value + '</a>' +
        '<span class="kt-user-card-v2__desc" ></span>' +
        '</div></div>';
      $(this).parents().eq(6).find('div.lecture_content').eq(0).html(html);

      trig_test_modal();
      setTimeout(function () {

        save_session();

      }, 500);

    });

  };


  const trig_preview_card = function () {
    $('#preview_card').off('click').on('click', function () {
      $('#card_title').html($('#course_title').val());
      $('#card_course_img').attr('src', $('#add_course_img').attr('src'));
      $('#card_subtitle').html($('#course_subtitle').val());
      // let data = {
      //     title: $('#course_title').val(),
      //     sub_title: $('#course_subtitle').val(),
      //     description: $('textarea#course_description').val(),
      //     main_category: $('#category :selected').parent().attr('label'),
      //     sub_category: $('#category :selected').val(),
      //     course_img: $('#add_course_img').attr('src'),
      //
      // };


    })

  };

  const trig_video_modal = function () {
    $('.media_info').off('click').on('click', function () {
      let media_url = $(this).data('media_url');
      const type = $(this).data('type');
      if (type === 'video/mp4') {

        videojs('modal_video_player').src(media_url);

        //$('#modal_video_player').attr('src', media_url);

        $('#modal_close_video').off('click').on('click', function () {
          videojs('modal_video_player').pause();

        });


        $("#kt_modal_6").on('hidden.bs.modal', function () {
          videojs('modal_video_player').pause();
        });


      } else if (type === 'video/youtube') {
        console.log('youtube modal');
        $('#modal_video_player').remove();


        var tag = document.createElement('script');
        tag.id = 'yt_player';
        tag.src = 'https://www.youtube.com/iframe_api';
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


        setTimeout(function () {
          onYouTubeIframeAPIReady(media_url);
        }, 500)

        // 3. This function creates an <iframe> (and YouTube player)
        //    after the API code downloads.


        // 4. The API will call this function when the video player is ready.


        // 5. The API calls this function when the player's state changes.
        //    The function indicates that when playing a video (state=1),
        //    the player should play for six seconds and then stop.


      }


    })


  };

  const onPlayerReady = function (event) {
    event.target.playVideo();
  };


  const stopVideo = function () {

    console.log(yt_player.getCurrentTime());
    yt_player.stopVideo();
  };

  const onPlayerStateChange = function (event) {
    console.log('onState change');
    if (event.data == YT.PlayerState.PLAYING && !done) {
      setTimeout(stopVideo, 6000);
      done = true;
    }
  };

  const onYouTubeIframeAPIReady = function (video_id) {
    yt_player = new YT.Player('youtube_player', {

      videoId: video_id,
      width: 920,
      height: 518,
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      }
    });
  };

  const trig_article_modal = function () {
    $('.article_info').off('click').on('click', function () {
      let media_name = $(this).data('media_name');

      $.ajax({
        type: 'POST',
        url: '/aajax/get_html_file',
        dataType: 'json',
        data: {file_name: media_name},
        success: function (res) {
          if (typeof res !== 'undefined' && res !== null && res !== '') {
            if (typeof res.status !== 'undefined' && res.status === 'success') {

              if (typeof res.data !== 'undefined' && typeof res.data.html !== 'undefined') {


                $('#html_div').summernote({
                  height: $(document).height() * 0.8,
                  focus: true,
                  minHeight: 500,
                  toolbar: [
                    // [groupName, [list of button]]


                  ]

                });
                $('#html_div').summernote('code', res.data.html);


              }


            }

          }


        },
        error: function (xhr, ajaxOptions, thrownError) {

        },

      });


    })


  };
  const trig_test_modal = function () {
    $('.test_info').off('click').on('click', function () {
      let name = $(this).data('media_name');

      $.ajax({
        type: 'POST',
        url: '/aajax/preview_test2',
        dataType: 'json',
        data: {name: name},
        success: function (res) {
          if (typeof res !== 'undefined' && res !== null && res !== '') {
            if (typeof res.status !== 'undefined' && res.status === 'success') {

              if (typeof res.data !== 'undefined') {


                render_test_modal(res.data);


              }


            }

          }


        },
        error: function (xhr, ajaxOptions, thrownError) {

        },

      });


    })


  };

  const render_test_modal = function (data) {
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
        '<span style="font-size: 15px; color: #646c9a;">' +
        data.questions[i].question +
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
        data.questions[i].a +
        '</span>' +
        '</div>' +

        '<div class="row col-md-12 kt-pb-5">' +
        '<div style="width: 16px;">' +
        '<span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">' +
        'B :' +
        '</span>' +
        '</div>' +
        '<span style="padding-left: 5px">' +
        data.questions[i].b +
        '</span>' +
        '</div>' +

        '<div class="row col-md-12 kt-pb-5">' +
        '<div style="width: 16px;">' +
        '<span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">' +
        'C :' +
        '</span>' +
        '</div>' +
        '<span style="padding-left: 5px">' +
        data.questions[i].c +
        '</span>' +
        '</div>' +

        '<div class="row col-md-12 kt-pb-5">' +
        '<div style="width: 16px;">' +
        '<span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">' +
        'D :' +
        '</span>' +
        '</div>' +
        '<span style="padding-left: 5px">' +
        data.questions[i].d +
        '</span>' +
        '</div>' +

        '<div class="row col-md-12 kt-pb-5">' +
        '<div style="width: 16px;">' +
        '<span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">' +
        'E :' +
        '</span>' +
        '</div>' +
        '<span style="padding-left: 5px">' +
        data.questions[i].e +
        '</span>' +
        '</div>' +

        '<div class="row col-md-12 kt-pb-5 kt-pt20">' +
        '<div style="width: 96px;">' +
        '<span class="kt-pull-right" style="font-weight: 500; font-size: 14px; margin-top: 2px;">' +
        'Doğru Cevap: ' +
        '</span>' +
        '</div>' +
        '<span style="padding-left: 5px; color: #004eda; font-weight: 500; font-size: 16px;">' +
        data.questions[i].true_answer +
        '</span>' +
        '</div>' +

        '</div>';

    }

    test.innerHTML = html;
    document.getElementById("test_div").appendChild(test);

  };


  const trig_collapse = function () {

    $('.expand_all').off('click').on('click', function () {
      //$('#accordion .panel-collapse').collapse('toggle');
      $('div[id^=lecture_collapse]').collapse('show');
    });

    $('.collapse_all').off('click').on('click', function () {
      //$('#accordion .panel-collapse').collapse('toggle');
      $('div[id^=lecture_collapse]').collapse('hide');
    });
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

            $('#add_course_img').attr('src', b.data.url);

            //init_crop();
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
        name: section_name,
        order: i,
        lectures: []
      };


      for (let k = 0; k < section_lectures_num; k++) {
        let eid = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k).data('eid');

        let media_name = $('#lecture_collapse_' + eid + ' > div > div > div > div.kt-user-card-v2__details > a').html();

        // let media_name = $('#section_div').find('.kanban-board').eq(i).find('.kanban-item').eq(k)
        //     .find('div.kt-user-card-v2 > div.kt-user-card-v2__details > a.kt-user-card-v2__name').html();
        let media_url = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k)
          .find('div.col-md-12.lecture_content > div > div.kt-user-card-v2__pic2 > a').data('media_url');
        let cover_url = $('#lecture_collapse_' + eid + ' > div > div > div > div.kt-user-card-v2__pic2 > a > img').attr('src');
        const $lecture_collapse = $('#lecture_collapse_' + eid + ' > div > div > div > div.kt-user-card-v2__details > span');
        let media_duration_seconds = $lecture_collapse.data('duration_seconds');

        let media_duration_string = $lecture_collapse.data('duration_string');
        let name = $section_div.find('.kanban-board').eq(i).find('.kanban-item').eq(k)
          .find('div.card > div.card-header > div.card-title').data('lecture_name');
        let media_type = $('#lecture_collapse_' + eid + ' > div > div > div > div.kt-user-card-v2__pic2 > a').data('type');

        const description = $('textarea#course_materials_content_' + eid).val();


        //#lecture_collapse_pkshyucjvi > div > div > div > div.kt-user-card-v2__pic2 > a

        if (typeof media_duration_seconds === 'undefined' || media_duration_seconds === 'undefined') {
          media_duration_seconds = 0;
        }
        if (typeof media_duration_string === 'undefined' || media_duration_string === 'undefined') {
          media_duration_string = 0;
        }

        sections[i].lectures[k] = {
          id: eid,
          section_id: section_id,
          name: name,
          media_type: media_type,
          media_url: media_url,
          media_name: media_name,
          cover_url: cover_url,
          media_duration_seconds: media_duration_seconds,
          media_duration_string: media_duration_string,
          description: description

        }
      }
    }


    let new_options_html = '';
    let selected_section = $('#section_selector').val();
    let first_option = '';


    for (let i = 0; i < sections.length; i++) {
      //sections[i].name;
      if (i === 0) {
        first_option = sections[i].id;
      }

      new_options_html += '<option value="' + sections[i].id + '">' + sections[i].name + "</option>";
    }

    $('#section_selector').html(new_options_html);
    if (typeof selected_section !== 'undefined' && selected_section !== null && selected_section !== '') {
      $('#section_selector').val(selected_section);
    } else {
      $('#section_selector').val(first_option);
    }


    let data = {
      title: $('#course_title').val(),
      sub_title: $('#course_subtitle').val(),
      description: $('textarea#course_description').val(),
      main_category: $('#category :selected').parent().attr('label'),
      sub_category: $('#category :selected').val(),
      //course_img: $('#add_course_img').attr('src'),
      sections: sections
    };


    // console.log(data);


    $.ajax({
      type: 'POST',
      url: '/aajax/save_sess_add_new_course',
      dataType: 'json',
      data: data,
      success: function (res) {
        if (typeof res !== 'undefined' && res !== null && res !== '') {
          if (typeof res.status !== 'undefined' && res.status === 'success') {

            update_sections_tt();
          }

        }


      },
      error: function (xhr, ajaxOptions, thrownError) {

      },

    });

  };


  const update_sections_tt = function () {
    $.ajax({
      type: 'POST',
      url: '/aajax/get_sections_tt',
      dataType: 'json',
      success: function (res) {
        if (typeof res !== 'undefined' && res !== null && res !== '') {
          if (typeof res.status !== 'undefined' && res.status === 'success') {
            if (typeof res.data !== 'undefined' && res.data !== null && res.data !== '') {
              render_sections_tmls(res.data);
            }

          }

        }


      },
      error: function (xhr, ajaxOptions, thrownError) {

      },

    });

  };


  const render_sections_tmls = function (data) {
    for (let i = 0; i < data.length; i++) {
      let sid = 'tmls_' + data[i].section_id;

      $('#' + sid).html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;' + data[i].tmls + '&nbsp;]');


    }

  };


  const render_kanban = function (sections) {


    let lectures = [];
    if (typeof sections !== 'undefined' && sections !== null && sections !== '') {

      for (let i = 0; i < sections.length; i++) {
        if (typeof sections[i].lectures !== 'undefined' && sections[i].lectures !== null && sections[i].lectures !== '') {
          lectures[i] = sections[i].lectures;
          delete sections[i].lectures;
        }


        kanban4.addBoards(
          [{
            'id': sections[i].id,
            'title':
              '<span class="section_div">' +
              '<span class="section_name" data-section_name="' + sections[i].name + '" >' + sections[i].name + '<span id="tmls_' + sections[i].id + '">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;' + sections[i].tmls + '&nbsp;]</span></span>' +
              '<span class="pull-right">' +
              // '<a data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Delete Section" data-sid="' + sections[i].id +
              // '" class="btn btn-outline-hover-danger btn-sm btn-icon del_section">' +
              '<a data-sid="' + sections[i].id +
              '" class="btn btn-outline-hover-danger btn-sm btn-icon del_section">' +
              '<i class="fa fa-trash-alt"></i>' +
              '</a></span>' +
              '</span>',
            'class': 'section_div',
            'section_name': sections[i].name

          }]
        );


      }

    } else {
      return false;
    }


//return false;

    let new_options_html = '';

    for (let i = 0; i < sections.length; i++) {
      sections[i].name;

      new_options_html += '<option value="' + sections[i].id + '">' + sections[i].name + "</option>";
    }

    $('#section_selector').append(new_options_html);


    render_lectures(lectures);


    trig_del();
    trig_typeahead();
    trig_typeahead_article();
    trig_typeahead_test();

  };


  const render_lectures = function (lectures) {


    for (let k = 0; k < lectures.length; k++) {

      for (let i = 0; i < lectures[k].length; i++) {


        let title2 =
          '<div class="accordion  accordion-toggle-arrow" id="lecture_title_div_' + lectures[k][i].id + '">' +
          '<div class="card lecture_acor_box">' +
          '<div class="card-header lecture_title_acor_box" id="headingThree4">' +
          '<div class="card-title collapsed" data-toggle="collapse" data-target="#lecture_collapse_' + lectures[k][i].id + '" aria-expanded="false" aria-controls="collapseThree4" data-lecture_name="' + lectures[k][i].name + '">' +
          lectures[k][i].name +
          '</div>' +
          '</div>' +
          '<div id="lecture_collapse_' + lectures[k][i].id + '" class="collapse" aria-labelledby="headingThree1" data-parent="#lecture_title_div_' + lectures[k][i].id + '">' +
          '<div class="card-body">' +

          '<span class="lecture_div" >' +
          // '<span class="pull-right"><a data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Delete Lecture" data-lid="' + lectures[k][i].id + '" class="btn btn-outline-hover-danger btn-sm' +
          // ' btn-icon del_lecture"><i class="fa fa-trash-alt"></i></a></span>' +
          '<span class="pull-right"><a data-lid="' + lectures[k][i].id + '" class="btn btn-outline-hover-danger btn-sm' +
          ' btn-icon del_lecture"><i class="fa fa-trash-alt"></i></a></span>' +
          '<ul class="nav nav-tabs" id="data_tab_' + lectures[k][i].id + '" role="tablist">' +
          '<li class="nav-item">' +
          '<a class="nav-link active"  data-toggle="tab" href="#add_video_' + lectures[k][i].id + '" role="tab" aria-controls="home" aria-selected="true">Video ekle</a>' +
          '</li>' +
          '<li class="nav-item">' +
          '<a class="nav-link"  data-toggle="tab" href="#add_article_' + lectures[k][i].id + '" role="tab" aria-controls="profile" aria-selected="false">Makale</a>' +
          '</li>' +
          '<li class="nav-item">' +
          '<a class="nav-link"  data-toggle="tab" href="#add_test_' + lectures[k][i].id + '" role="tab" aria-controls="profile" aria-selected="false">Test</a>' +
          '</li>' +
          '<li class="nav-item">' +
          '<a class="nav-link"  data-toggle="tab" href="#add_description' + lectures[k][i].id + '" role="tab" aria-controls="contact" aria-selected="false">Açıklama</a>' +
          '</li>' +
          '</ul>' +
          '<div class="tab-content" id="tab_content_' + lectures[k][i].id + '">' +

          '<div class="tab-pane fade show active" id="add_video_' + lectures[k][i].id + '" role="tabpanel" aria-labelledby="home-tab">' +


          '<div class="form-group ">' +
          '<div class="kt-input-icon kt-input-icon--left">' +
          '<input type="text" class="form-control typeahead" placeholder="Search..." >' +
          '<span class="kt-input-icon__icon kt-input-icon__icon--left">' +
          '<span><i class="la la-search"></i></span>' +
          '</span>' +
          '</div>' +
          '</div>' +


          '</div>' +


          '<div class="tab-pane fade" id="add_article_' + lectures[k][i].id + '" role="tabpanel" aria-labelledby="profile-tab">' +

          '<div class="form-group ">' +
          '<div class="kt-input-icon kt-input-icon--left">' +
          '<input type="text" class="form-control typeahead_article" placeholder="Search..." >' +
          '<span class="kt-input-icon__icon kt-input-icon__icon--left">' +
          '<span><i class="la la-search"></i></span>' +
          '</span>' +
          '</div>' +
          '</div>' +
          // '<div class="col-md-12 lecture_content"></div>' +


          '</div>' +


          '<div class="tab-pane fade" id="add_test_' + lectures[k][i].id + '" role="tabpanel" aria-labelledby="profile-tab">' +

          '<div class="form-group ">' +
          '<div class="kt-input-icon kt-input-icon--left">' +
          '<input type="text" class="form-control typeahead_test" placeholder="Search..." >' +
          '<span class="kt-input-icon__icon kt-input-icon__icon--left">' +
          '<span><i class="la la-search"></i></span>' +
          '</span>' +
          '</div>' +
          '</div>' +
          // '<div class="col-md-12 lecture_content"></div>' +


          '</div>' +


          '<div class="tab-pane fade" id="add_description' + lectures[k][i].id + '" role="tabpanel" aria-labelledby="contact-tab">' +
          '<div class="form-group ">' +
          '<div class="kt-input-icon kt-input-icon--left">' +
          '<textarea placeholder="+ Add materials" rows="3" class="row col-md-12 kt-ml-0 course_materials_content" id="course_materials_content_' + lectures[k][i].id + '">' + lectures[k][i].description + '</textarea>' +
          '</div>' +
          '</div>' +
          '</div>' +
          '</div>' +
          '</span>' +
          '<div class="col-md-12 lecture_content">';


        if (typeof lectures[k][i].media_name !== 'undefined' && lectures[k][i].media_name !== '' && lectures[k][i].media_name !== null) {

          title2 += '<div class="kt-user-card-v2 kt-pt15"><div class="kt-user-card-v2__pic2" style="width: 120px">';

          if (lectures[k][i].media_type === 'video/mp4') {
            title2 += '<a href="" data-media_url="' + lectures[k][i].media_url + '" data-type="' + lectures[k][i].media_type + '" class="media_info" data-toggle="modal" data-target="#kt_modal_6">' +
              '<img height="50" src="' + lectures[k][i].cover_url + '" style="border-radius: 4px;"/>' +
              '</a>';


            title2 += '</div>' +
              '<div class="kt-user-card-v2__details"><a class="kt-user-card-v2__name" href="#">' + lectures[k][i].media_name + '</a>' +
              '<span class="kt-user-card-v2__desc" data-duration_seconds="' + lectures[k][i].media_duration_seconds + '" data-duration_string="' + lectures[k][i].media_duration_string +
              '">Duration: ' + lectures[k][i].media_duration_string + '</span>' +
              '</div></div>';


          } else if (lectures[k][i].media_type === 'video/youtube') {
            title2 += '<a href="" data-media_url="' + lectures[k][i].media_url + '" data-type="' + lectures[k][i].media_type + '" class="media_info" data-toggle="modal" data-target="#kt_modal_6">' +
              '<img height="50" src="' + lectures[k][i].cover_url + '" style="border-radius: 4px;"/>' +
              '</a>';


            title2 += '</div>' +
              '<div class="kt-user-card-v2__details"><a class="kt-user-card-v2__name" href="#">' + lectures[k][i].media_name + '</a>' +
              '<span class="kt-user-card-v2__desc" data-duration_seconds="' + lectures[k][i].media_duration_seconds + '" data-duration_string="' + lectures[k][i].media_duration_string +
              '">Duration: ' + lectures[k][i].media_duration_string + '</span>' +
              '</div></div>';


          } else if (lectures[k][i].media_type === 'text/plain') {
            title2 += '<a href="" data-toggle="modal" data-target="#kt_modal_8" data-media_name="' + lectures[k][i].media_name + '"  data-type="' + lectures[k][i].media_type + '" class="article_info" >' +
              '<img height="50" src="' + lectures[k][i].cover_url + '" style="border-radius: 4px;"/>' +
              '</a>';
            title2 += '</div>' +
              '<div class="kt-user-card-v2__details"><a class="kt-user-card-v2__name" href="#">' + lectures[k][i].media_name + '</a>' +

              '</div></div>';

          } else if (lectures[k][i].media_type === 'test') {
            console.log(lectures[k][i]);
            title2 += '<a href="" data-toggle="modal" data-target="#test_modal" data-media_url="' + lectures[k][i].media_url + '" data-media_name="' + lectures[k][i].media_name + '"  data-type="' + lectures[k][i].media_type + '" class="test_info" >' +
              '<img height="50" src="' + lectures[k][i].cover_url + '" style="border-radius: 4px;"/>' +
              '</a>';
            title2 += '</div>' +
              '<div class="kt-user-card-v2__details"><a class="kt-user-card-v2__name" href="#">' + lectures[k][i].media_name + '</a>' +

              '</div></div>';

          }


        }


        title2 += '</div>';


        title2 += '</div>' +
          '</div>' +
          '</div>' +
          '</div>';


        kanban4.addElement(
          lectures[k][i].section_id,
          {
            'id': lectures[k][i].id,
            'title': title2


          }
        );


      }
    }
    trig_video_modal();
    trig_article_modal();
    trig_test_modal();
    KTApp.initTooltips();
  };


  const get_session = function () {


    $.ajax({
      type: 'POST',
      url: '/aajax/get_sess_sections',
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

    // $('#kt_aside_toggler').on('click',function(e)save_sess_add_new_course{
    //     console.log('sdfsd');
    //     var sticky = new Sticky('.sticky');
    //     setTimeout(function() {
    //         sticky.update(); // update sticky positions on aside toggle
    //
    //     }, 500);
    // });
  };


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
