<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><?php $this->load->view('shared/head_start'); ?>
<?php $this->load->view('shared/css_all'); ?>
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


          <div class="row">
            <div class="col-md-dp-5-1">
              <div class="" style="min-width: 317px;">
                <div class="kt-portlet__body kt-portlet__body--fit">
                  <div class="kt-grid  kt-wizard-v1 kt-wizard-v1--white" id="kt_wizard_v1" data-ktwizard-state="step-first">

                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v1__wrapper">

                      <div class="kt-portlet">
                        <div class="kt-portlet__head">
                          <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                              Test Ekle
                            </h3>

                          </div>

                        </div>

                        <div class="kt-portlet__body kt-pb-0">
                          <div class="row">

                            <div id="section_div" class="col-md-12 " style="padding: 10px 10px 0px 10px">

                              <h5 class="kt-portlet__head-title" style="font-size: 14px; padding: 0px 10px 8px 10px;">
                                Testin adı
                              </h5>


                              <div class="input-group col-md-12" style="padding-bottom: 30px">
                                <input id="test_name" type="text" class="form-control" placeholder="testin adını yazın" title="testin adını yazın"
                                       value="<?= !empty($test) && !empty($test->test) ? $test->test->test_name : '' ?>" data-test_id="<?= !empty($test) && !empty($test->test) ? $test->test->id : '' ?>">
                                <div class="input-group-append">
                                  <button class="btn btn-primary" id="add_test_submit" type="button">Ekle</button>
                                </div>
                              </div>


                              <h5 class="kt-portlet__head-title" style="font-size: 14px; padding: 0px 10px 8px 10px;">
                                Testin sorusu
                              </h5>


                                <div class="col-md-12 ">

                                    <div id="quill_editor" style="height: 250px;"></div>

                                </div>



                            </div>
                          </div>
                          <div class="kt-portlet__head" style="margin-top: -30px;">

                          </div>
                        </div>

                        <div class="kt-portlet__body kt-pt0">
                          <div class="row">
                            <div id="section_div" class="col-md-12 " style="padding: 10px 20px 20px 20px">
                              <h5 class="kt-portlet__head-title" style="font-size: 14px; padding: 0px 10px 8px 14px;">
                                Lütfen cevapları yazın
                              </h5>

                              <div class="row">
                                <div style="align-self: center;margin: 0px 3px 15px 0px; width: 16px;"><span class="kt-pull-right " style="color: #4e4e4e; font-weight: 500;">A : </span></div>

                                  <div class="col-md-12 " style="padding: 0px 18px 4px 15px;margin: inherit;">


                                      <div id="a" title="A şıkkının cevabını yazın"
                                           class="answer_quill col-md-12" style="height: 62px;"></div>


                                  </div>

                              </div>
                              <div class="row">
                                <div style="align-self: center;margin: 0px 3px 15px 0px; width: 16px;"><span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">B : </span></div>

                                  <div class="col-md-12 " style="padding: 0px 18px 4px 15px;margin: inherit;">


                                      <div id="b" title="B şıkkının cevabını yazın"
                                           class="answer_quill col-md-12" style="height: 62px"></div>


                                  </div>

                              </div>
                              <div class="row">
                                <div style="align-self: center;margin: 0px 3px 15px 0px; width: 16px;"><span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">C : </span></div>

                                  <div class="col-md-12 " style="padding: 0px 18px 4px 15px;margin: inherit;">


                                      <div id="c" title="C şıkkının cevabını yazın"
                                           class="answer_quill col-md-12" style="height: 62px"></div>


                                  </div>

                              </div>
                              <div class="row">
                                <div style="align-self: center;margin: 0px 3px 15px 0px; width: 16px;"><span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">D : </span></div>

                                  <div class="col-md-12 " style="padding: 0px 18px 4px 15px;margin: inherit;">


                                      <div id="d" title="D şıkkının cevabını yazın"
                                           class="answer_quill col-md-12" style="height: 62px"></div>


                                  </div>

                              </div>
                              <div class="row">
                                <div style="align-self: center;margin: 0px 3px 15px 0px; width: 16px;"><span class="kt-pull-right" style="color: #4e4e4e; font-weight: 500;">E : </span></div>

                                  <div class="col-md-12 " style="padding: 0px 18px 0px 15px;margin: inherit;">


                                      <div id="e" title="E şıkkının cevabını yazın"
                                           class="answer_quill col-md-12" style="height: 62px" ></div>


                                  </div>

                              </div>
                              <div class="row kt-pt20 kt-pb-80" style="padding-left: 22px">
                                <div class="form-group row">
                                  <div class="col-md-12" style="width: 220px">
                                    <select class="form-control kt-select2" id="true_answer">
                                      <option></option>
                                      <option value="a">A</option>
                                      <option value="b">B</option>
                                      <option value="c">C</option>
                                      <option value="d">D</option>
                                      <option value="e">E</option>
                                    </select>
                                  </div>
                                </div>
                              </div>


                            </div>
                          </div>
                        </div>


                        <div class="kt-portlet__foot kt-pb-25 kt-pr10 kt-pl15">

                          <div class="col-md-12">
                            <button class="pull-left btn btn-dark btn-md btn-tall kt-font-bold kt-font-transform-u kt-ml-5" id="reset_question_form">
                              reset
                            </button>

                            <button class="pull-right btn btn-warning btn-md btn-tall kt-font-bold kt-font-transform-u kt-ml-5" id="add_question_submit">
                              ekle
                            </button>
                            <button class="pull-right btn btn-info btn-md btn-tall kt-font-bold kt-font-transform-u kt-ml-5 kt-hidden" id="update_question_btn">
                              güncelle
                            </button>
                            <button class="pull-right btn btn-danger btn-md btn-tall kt-font-bold kt-font-transform-u kt-hidden" id="update_question_cancel_btn">
                              iptal
                            </button>

                          </div>
                        </div>


                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-dp-7-1 " style="padding: 0px 10px 0px 10px">
              <div class="kt-portlet__body" style="min-width: 517px;">

                <div class="kt-portlet">
                  <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                      <h3 class="kt-portlet__head-title">
                        Test İçeriği
                      </h3>

                    </div>

                  </div>

                  <div class="kt-portlet__body">
                    <div class="row">
                      <div id="test_div" class="col-md-12 scroller_add_test">


                      </div>
                    </div>

                  </div>
                  <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">

                    </div>

                  </div>
                </div>

              </div>
            </div>
          </div>


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
<script src="/aassets/js/admin/edit_test.1.0.js" type="text/javascript"></script>
</body>
<!-- end::Body -->
</html>
