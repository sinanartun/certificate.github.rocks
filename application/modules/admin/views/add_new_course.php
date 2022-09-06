<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><?php $this->load->view('shared/head_start'); ?>
<link href="/aassets/js_player/old_js_css/video-js.min.css" rel="stylesheet">
<?php $this->load->view('shared/css_all'); ?>
<link href="/aassets/plugins/custom/kanban/kanban.bundle.css" rel="stylesheet" type="text/css"/>
<link href="/aassets/css/pages/wizard/wizard-1.css" rel="stylesheet" type="text/css"/>
<link href="/node_modules/cropperjs/dist/cropper.min.css" rel="stylesheet" type="text/css"/>

<link href="/aassets/js_player/old_js_css/videojs-resolution-switcher.css" rel="stylesheet">
<script src="/aassets/js_player/old_js_css/video_old.js"></script>
<script src="/aassets/js_player/old_js_css/videojs-resolution-switcher.js"></script>


<?php $this->load->view('shared/head_end'); ?>
<!-- end::Head -->
<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
<!-- begin:: Page -->
<!-- begin:: Header Mobile -->
<?php $this->load->view('shared/header_mobile'); ?>
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
  <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
    <!-- begin:: Aside -->
    <?php $this->load->view('shared/left_menu'); ?>
    <!-- end:: Aside -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper kt-pt65" id="kt_wrapper">
      <!-- begin:: Header -->
      <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
        <!-- begin:: Header Menu -->
        <?php $this->load->view('shared/header_menu'); ?>
        <!-- end:: Header Menu -->
        <!-- begin:: Header Topbar -->
        <?php $this->load->view('shared/top_bar'); ?>
        <!-- end:: Header Topbar -->
      </div>
      <!-- end:: Header -->
      <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="min-width: 560px;">


          <div class="row h-100">
            <div class="col-md-dp-5 sticky-wrapper  kt-sticky">
              <div class="kt-portlet sticky" data-sticky="false" data-margin-top="100px" style="min-width: 363px;">
                <div class="kt-portlet__body kt-portlet__body--fit">
                  <div class="kt-grid  kt-wizard-v1 kt-wizard-v1--white" id="kt_wizard_v1" data-ktwizard-state="step-first">
                    <div class="kt-grid__item">

                      <!--begin: Form Wizard Nav -->
                      <div class="kt-wizard-v1__nav">
                        <div class="kt-wizard-v1__nav-items kt-wizard-v1__nav-items--clickable">

                          <!--doc: Replace A tag with SPAN tag to disable the step link click -->
                          <div class="kt-wizard-v1__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                            <div class="kt-wizard-v1__nav-body">

                              <div class="kt-wizard-v1__nav-label">
                                1.&nbsp;<?= lang('add_new_course_enter_details') ?>
                              </div>
                            </div>
                          </div>
                          <div class="kt-wizard-v1__nav-item" data-ktwizard-type="step">
                            <div class="kt-wizard-v1__nav-body">

                              <div class="kt-wizard-v1__nav-label">
                                2.&nbsp;<?= lang('add_new_course_course_image') ?>
                              </div>
                            </div>
                          </div>
                          <div class="kt-wizard-v1__nav-item" data-ktwizard-type="step">
                            <div class="kt-wizard-v1__nav-body">

                              <div class="kt-wizard-v1__nav-label">
                                3. <?= lang('add_new_course_section_lectures') ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!--end: Form Wizard Nav -->
                    </div>
                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v1__wrapper">

                      <!--begin: Form Wizard Form-->
                      <form class="kt-form" id="kt_form">

                        <!--begin: Form Wizard Step 1-->
                        <div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                          <!--                            <div class="kt-heading kt-heading--md">Setup Your Current Location</div>-->
                          <div class="kt-form__section kt-form__section--first">
                            <div class="kt-wizard-v1__form">
                              <div class="form-group">
                                <label><?= lang('add_new_course_course_title') ?></label>
                                <input type="text" class="form-control" id="course_title" name="course_title" placeholder="<?= lang('add_new_course_course_title') ?>" value="<?= (!empty($draft)) ? $draft->title : '' ?>">
                                <span class="form-text text-muted"><?= lang('add_new_course_please_enter_course_title') ?></span>
                              </div>
                              <div class="form-group">
                                <label><?= lang('add_new_course_course_subtitle') ?></label>
                                <input type="text" class="form-control" id="course_subtitle" name="course_subtitle" placeholder="<?= lang('add_new_course_course_subtitle') ?>" value="<?= (!empty($draft)) ? $draft->sub_title : '' ?>">
                                <span class="form-text text-muted"><?= lang('add_new_course_please_enter_course_subtitle') ?></span>
                              </div>

                              <div class="form-group">
                                <label for="course_description"><?= lang('add_new_course_course_description'); ?></label>

                                <textarea id="course_description" type="text" class="form-control" name="course_description"><?= (!empty($draft)) ? $draft->description : '' ?></textarea>

                                <span class="form-text text-muted"><?= lang('add_new_course_please_enter_course_description'); ?></span>
                              </div>

                              <div class="row">
                                <label class="col-form-label col-lg-12 col-sm-12"><?= lang('add_new_course_select_category'); ?></label>
                                <div class="col-md-12">
                                  <select class="form-control" id="category" name="category">
                                    <optgroup label="<?= lang('development'); ?>">
                                      <option value="web_development" <?= (!empty($draft) && !empty($draft->sub_category)) ? (($draft->sub_category === 'web_development') ? 'selected' : '') : '' ?>><?= lang('web_development'); ?></option>
                                      <option value="mobile_apps" <?= (!empty($draft) && !empty($draft->sub_category)) ? (($draft->sub_category === 'mobile_apps') ? 'selected' : '') : '' ?>><?= lang('mobile_apps'); ?></option>
                                      <option value="programing_languages" <?= (!empty($draft) && !empty($draft->sub_category)) ? (($draft->sub_category === 'programing_languages') ? 'selected' : '') : '' ?>><?= lang('programing_languages'); ?></option>
                                      <option value="databases" <?= (!empty($draft) && !empty($draft->sub_category)) ? (($draft->sub_category === 'databases') ? 'selected' : '') : '' ?>><?= lang('databases'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?= lang('data_science'); ?>">
                                      <option value="artificiell_intelligens" <?= (!empty($draft) && !empty($draft->sub_category)) ? (($draft->sub_category === 'artificiell_intelligens') ? 'selected' : '') : ''; ?>><?= lang('artificiell_intelligens'); ?></option>
                                    </optgroup>
                                    <optgroup label="<?= lang('big_database'); ?>">
                                      <option value="hadoop" <?= (!empty($draft) && !empty($draft->sub_category)) ? (($draft->sub_category === 'hadoop') ? 'selected' : '') : '' ?>>Hadoop</option>
                                      <option value="spark" <?= (!empty($draft) && !empty($draft->sub_category)) ? (($draft->sub_category === 'spark') ? 'selected' : '') : '' ?>>spark</option>
                                      <option value="elasticsearch" <?= (!empty($draft) && !empty($draft->sub_category)) ? (($draft->sub_category === 'elasticsearch') ? 'selected' : '') : '' ?>>Elasticsearch</option>
                                    </optgroup>
                                  </select>
                                </div>
                              </div>


                            </div>
                          </div>
                        </div>

                        <!--end: Form Wizard Step 1-->

                        <!--begin: Form Wizard Step 2-->
                        <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                          <div class="kt-heading kt-heading--md"><?= lang('add_new_course_enter_the_course_picture'); ?></div>
                          <div class="kt-form__section kt-form__section--first">
                            <div class="kt-wizard-v1__form">
                              <div class="form-group row">

                                <div id="course_img_div" class="col-md-12">
                                  <span id="x"></span>
                                  <span id="y"></span>
                                  <span id="c_height"></span>
                                  <span id="c_width"></span>
                                  <img id="add_course_img" style="width: 100%;max-width: 100%;max-height: 400px" src="<?= !empty($draft->course_img) ? $draft->course_img : '/uploads/default.jpg' ?>">
                                  <hr>
                                  <button id="edit_course_img_btn" type="button" class="btn btn-label-success btn-sm btn-upper"><?= lang('add_new_course_button_edit'); ?></button>
                                  <button id="cancel_course_img_btn" type="button" class="btn btn btn-secondary btn-sm kt-hidden"><?= lang('add_new_course_button_close'); ?></button>
                                  <button id="crop_btn" class="btn btn-sm btn-warning kt-hidden"><?= lang('add_new_course_button_crop'); ?></button>
                                  <button id="del_img_btn" type="button" class="btn btn-outline-hover-danger btn-sm btn-icon del_row pull-right kt-hidden"><i class="la la-trash-o"></i></button>


                                </div>
                              </div>

                              <div class="form-group form-group-last row">
                                <label class="col-lg-2 col-form-label"><?= lang('add_new_course_upload_files'); ?>:</label>
                                <div class="col-lg-10">
                                  <div class="dropzone dropzone-multi" id="kt_dropzone_5">
                                    <div class="dropzone-panel">
                                      <a class="dropzone-select btn btn-label-brand btn-bold btn-sm"><?= lang('add_new_course_button_attach_files'); ?></a>
                                      <a class="dropzone-upload btn btn-label-brand btn-bold btn-sm">Upload All</a>
                                      <a class="dropzone-remove-all btn btn-label-brand btn-bold btn-sm">Remove All</a>
                                    </div>
                                    <div class="dropzone-items">
                                      <div class="dropzone-item" style="display:none">
                                        <div class="dropzone-file">
                                          <div class="dropzone-filename" title="some_image_file_name.jpg"><span data-dz-name>some_image_file_name.jpg</span> <strong>(<span data-dz-size>340kb</span>)</strong></div>
                                          <div class="dropzone-error" data-dz-errormessage></div>
                                        </div>
                                        <div class="dropzone-progress">
                                          <div class="progress">
                                            <div class="progress-bar kt-bg-brand" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress></div>
                                          </div>
                                        </div>
                                        <div class="dropzone-toolbar">
                                          <span class="dropzone-start"><i class="flaticon2-arrow"></i></span>
                                          <span class="dropzone-cancel" data-dz-remove style="display: none;"><i class="flaticon2-cross"></i></span>
                                          <span class="dropzone-delete" data-dz-remove><i class="flaticon2-cross"></i></span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <span class="form-text text-muted"><?= lang('add_new_course_course_img_description'); ?></span>
                                  <hr>
                                  <button id="preview_card" type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#kt_modal_7"><i class="flaticon-eye"></i> <?= lang('add_new_course_button_preview_course_card'); ?></button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        `

                        <!--end: Form Wizard Step 2-->

                        <!--begin: Form Wizard Step 3-->
                        <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                          <div class="kt-heading kt-heading--md"><?= lang('add_new_course_select_your_services'); ?></div>
                          <div class="kt-form__section kt-form__section--first">
                            <div class="kt-wizard-v1__form">


                              <div class="form-group ">

                                <label for="section_name"><?= lang('add_new_course_enter_section_name'); ?></label>
                                <div class="input-group">
                                  <input type="text" id="section_name" name="section_name" class="form-control" placeholder="<?= lang('add_new_course_section_name'); ?>">
                                  <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="add_section"><?= lang('add_new_course_button_add_section'); ?></button>
                                  </div>
                                </div>
                              </div>


                              <div class="form-group">
                                <label><?= lang('add_new_course_select_section'); ?></label>
                                <select id="section_selector" name="section_selector" class="form-control">
                                  <option value=""><?= lang('add_new_course_select_a_board'); ?></option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label><?= lang('add_new_course_enter_lecture_name'); ?></label>
                                <div class="input-group">
                                  <input type="text" id="lecture_name" name="lecture_name" class="form-control" placeholder="<?= lang('add_new_course_lecture_name'); ?>">
                                  <div class="input-group-append">
                                    <button class="btn btn-warning" type="button" id="add_lecture"><?= lang('add_new_course_button_add_lecture'); ?></button>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="list_link">Enter Video List</label>
                                <div class="input-group">
                                  <input type="text" id="list_link" name="list_link" class="form-control" placeholder="enter list link">
                                  <div class="input-group-append">
                                    <button class="btn btn-warning" type="button" id="add_yt_list">Add List</button>
                                  </div>
                                </div>
                              </div>


                            </div>
                          </div>
                        </div>

                        <!--end: Form Wizard Step 3-->

                        <!--begin: Form Actions -->
                        <div class="kt-form__actions">
                          <button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                            <?= lang('add_new_course_button_previous'); ?>
                          </button>
                          <button class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
                            <?= lang('add_new_course_button_submit'); ?>
                          </button>
                          <button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                            <?= lang('add_new_course_button_next_step'); ?>
                          </button>
                        </div>

                        <!--end: Form Actions -->
                      </form>

                      <!--end: Form Wizard Form-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-dp-7 " style="padding: 0px 10px 0px 10px">
              <div class="kt-portlet__body h-100" style="min-width: 517px;">

                <div class="kt-portlet h-100">
                  <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                      <h3 class="kt-portlet__head-title">
                        Kurs İçeriği Tablosu
                      </h3>


                    </div>
                    <div class="kt-portlet__head-toolbar">
                      <button class="btn btn-sm  pull-right pr-1 expand_all" data-toggle="kt-tooltip" data-placement="top" title="" data-original-title="Expand All"><i class="flaticon2-resize" style="color: blue"></i></button>
                      <button class="btn btn-sm  pull-right pr-0 collapse_all" data-toggle="kt-tooltip" data-placement="top" title="" data-original-title="Collapse All"><i class="flaticon2-shrink" style="color: blue"></i></button>
                    </div>
                  </div>

                  <div class="kt-portlet__body h-100">
                    <div class="row">
                      <div id="section_div" class="col-md-12 scroller_add_new_crs"></div>
                    </div>


                  </div>
                  <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">


                    </div>
                    <div class="kt-portlet__head-toolbar">
                      <button class="btn btn-sm  pull-right pr-1 expand_all" data-toggle="kt-tooltip" data-placement="top" title="" data-original-title="Expand All"><i class="flaticon2-resize" style="color: blue"></i></button>
                      <button class="btn btn-sm  pull-right pr-0 collapse_all" data-toggle="kt-tooltip" data-placement="top" title="" data-original-title="Collapse All"><i class="flaticon2-shrink" style="color: blue"></i></button>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>


        </div>


        <!-- begin:: Modal -->

        <div class="modal fade" id="kt_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Video Ön İzleme</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body kt-align-center">
                <video id="modal_video_player" class="video-js vjs-default-skin vjs-paused vjs-controls-enabled vjs-big-play-centered vjs-user-active" preload="auto" width="1280" height="720"
                       poster="" controls data-setup='{}'>
                </video>
                <div id="youtube_player"></div>

              </div>
              <div class="modal-footer">
                <button id="modal_close_video" type="button" class="btn btn-secondary" data-dismiss="modal">Videoyu kapat</button>
                <!--                                                                    <button type="button" class="btn btn-primary">Save changes</button>-->
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="kt_modal_7" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?= lang('add_new_course_button_preview_course_card'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-2 offset-3">
                    <div class="user_card">
                      <!--Begin::Portlet-->
                      <div class="kt-portlet kt-portlet--height-fluid" style="max-width: 220px min-width: 220px">
                        <div class="kt-widget__media mt-card-avatar mt-overlay-1">
                          <img id="card_course_img" class="kt-widget__img kt-hidden-" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image" width="100%" height="125px">
                          <div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden"></div>
                        </div>
                        <div class="kt-portlet__head--noborder" style="margin-top: 25px">
                          <div class="kt-portlet__head-label">

                          </div>
                        </div>
                        <div class="kt-portlet__body pb-3">
                          <!--begin::Widget -->
                          <div class="kt-widget kt-widget--user-profile-2">
                            <div class="kt-widget__head">


                              <div class="kt-widget__info pl-0">
                                <a id="card_title" href="#" class="kt-widget__titel kt-hidden-"></a>


                              </div>
                            </div>

                            <div class="kt-widget__body">
                              <div id="card_subtitle" class="kt-widget__section">Php Array yapısı</div>

                              <div class="kt-widget__item">

                                <div class="kt-widget__contact">
                                  <span class="kt-widget__label">Puan:</span>
                                  <a href="#" class="kt-widget__data ">★★★★★★</a>
                                </div>

                              </div>
                            </div>

                            <div class="kt-widget__footer" style="margin-top: 10px">
                              <button type="button" class="btn btn-label-warning btn-lg btn-upper">Kursa git</button>
                            </div>
                          </div>
                          <!--end::Widget -->
                        </div>
                      </div>
                      <!--End::Portlet-->
                    </div>
                  </div>


                </div>


              </div>
              <div class="modal-footer">
                <button id="modal_close_video" type="button" class="btn btn-secondary" data-dismiss="modal"><?= lang('add_new_course_button_preview_course_card_close'); ?></button>
                <!--                                                                    <button type="button" class="btn btn-primary">Save changes</button>-->
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="kt_modal_8" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">HTML Önizleme</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body">
                <div id="html_div" style="" src=""></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade scroller_modal_test" id="test_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Test Önizleme</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body kt-portlet" style="margin-bottom: 0px">


                <div id="test_div">

                </div>


              </div>
            </div>
          </div>
        </div>

        <!-- end:: Modal -->


        <!-- end:: Content -->
      </div>
      <!-- begin:: Footer -->
      <?php $this->load->view('shared/footer'); ?>
      <!-- end:: Footer -->
    </div>
  </div>
</div>
<!-- end:: Page -->
<!-- begin::Quick Panel -->
<?php $this->load->view('shared/quick_panel'); ?>
<!-- end::Quick Panel -->
<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
  <i class="fa fa-arrow-up"></i>
</div>
<!-- end::Scrolltop -->
<?php $this->load->view('shared/js_all'); ?>
<script src="/aassets/plugins/custom/kanban/kanban.bundle.js" type="text/javascript"></script>
<script src="/node_modules/cropperjs/dist/cropper.min.js" type="text/javascript"></script>

<script src="/aassets/js/admin/add_new_course.js" type="text/javascript"></script>


</body>
<!-- end::Body -->
</html>
