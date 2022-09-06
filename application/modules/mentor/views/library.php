<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><?php $this->load->view('shared/head_start'); ?>
<link href="/aassets/js_player/old_js_css/video-js.min.css" rel="stylesheet">
<?php $this->load->view('shared/css_all'); ?>
<link href="/aassets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
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
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">





            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-files-and-folders"></i>
										</span>
                        <h3 class="kt-portlet__head-title">
                            <?=lang('library_table')?>
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">


                                <a href="<?php echo base_url('admin/upload')?>" class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="la la-plus"></i>
                                    <?=lang('library_table_button_upload')?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                        <tr>
                            <th><?=lang('library_table_preview')?></th>
                            <th><?=lang('library_table_file_name')?></th>
                            <th><?=lang('library_table_type')?></th>
                            <th><?=lang('library_table_size')?></th>
                            <th><?=lang('library_table_upload_date')?></th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th><?=lang('library_table_preview')?></th>
                            <th><?=lang('library_table_file_name')?></th>
                            <th><?=lang('library_table_type')?></th>
                            <th><?=lang('library_table_size')?></th>
                            <th><?=lang('library_table_upload_date')?></th>
                            <th><?=lang('library_table_actions')?></th>
                        </tr>
                        </tfoot>
                    </table>

                    <!--end: Datatable -->
                </div>
            </div>

          <!-- begin:: Modal -->

          <div class="modal fade" id="kt_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered"  role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Video Ön İzleme</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  </button>
                </div>
                <div class="modal-body">
                  <video id="modal_video_player" class="video-js vjs-default-skin vjs-paused vjs-controls-enabled vjs-big-play-centered vjs-user-active" preload="auto" width="1280" height="720"
                         poster="" controls data-setup='{}'>
                    <!--                   <source id="modal_video_player_src" src="/videos/daylights_end_league_of_legends_1080p.mp4" type='video/mp4' label='1080'/>-->


                    <script>
                        videojs('modal_video_player').videoJsResolutionSwitcher()
                    </script>
                    <track kind="captions" src="/aassets/js_player/vtt/tr.vtt" srclang="tr" label="Türkçe">
                    <track kind="captions" src="/aassets/js_player/vtt/en.vtt" srclang="en" label="İngilizce">
                  </video>

                </div>
                <div class="modal-footer">
                  <button id="modal_close_video" type="button" class="btn btn-secondary" data-dismiss="modal">Videoyu kapat</button>
                  <!--                                                                    <button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
              </div>
            </div>
          </div>

          <!-- end:: Modal -->





            <!-- Begin modal -->

            <div class="modal fade" id="kt_modal_7" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Course Image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="course_img" style="width: 100%" src="" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End modal -->







            <!-- Begin modal -->

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

            <!-- End modal -->











        </div>
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
<script src="/aassets/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="/aassets/js/admin/dt_library.js" type="text/javascript"></script>
</body>
<!-- end::Body -->
</html>
