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


                <!--Begin::Dashboard 1-->
                <div class="row <?empty($courses)?'kt-hidden':''?>">
                    <? if (!empty($courses)) foreach($courses as $course):?>

                        <div class="col-xl-1 user_card" data-container="body" data-toggle="kt-popover" data-placement="right" data-html="true" data-original-title="<?=$course->title?>"
                             data-content="<div class='pull-left pl-0'><i class='flaticon2-arrow kt-font-brand'></i>&nbsp;Ders: 11 </div><div class='pull-left ml-2'><i class='flaticon2-crisp-icons-1 kt-font-brand'></i>&nbsp;Süre: 49dk </div><br><br><?=character_limiter($course->sub_title, 163);?>">

                            <!--Begin::Portlet-->
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-widget__media mt-card-avatar mt-overlay-1">
                                    <img id="card_course_img" class="kt-widget__img kt-hidden-" src="<?=$course->course_img;?>" alt="image" width="100%" height="125px">
                                    <div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden"></div>
                                </div>
                                <div class="kt-portlet__head--noborder" style="margin-top: 25px">
                                    <div class="kt-portlet__head-label">

                                    </div>
                                </div>
                                <div class="kt-portlet__body pb-3" style="height: 155px">
                                    <!--begin::Widget -->
                                    <div class="kt-widget kt-widget--user-profile-2">
                                        <div class="kt-widget__head" style="margin-top: -46px; height: 34px!important;">


                                            <div class="kt-widget__info pl-0" style="width: 110px">
                                                <a href="#" class="card_title"><font style=" margin-top: 20px; position:absolute; top:115px; padding-right: 18px"><?=character_limiter($course->title, 30);?></font></a>



                                            </div>
                                        </div>

                                        <div class="kt-widget__body">
                                            <div id="card_subtitle" class="kt-widget__section" ></div>
                                            <div class="kt-widget__item">
                                                <div class="kt-widget__contact">
                                                  <span class="kt-widget__label" style="   display: block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;font-size: 12px; color: rgba(104,111,122,0.81);">
                                                  <font style="font-size: 12px; font-weight: 500"><?=$course->first_name.' '.$course->last_name;?></font></span>
                                                </div>
                                            </div>
                                            <div class="kt-widget__item" style="margin-top: -10px">
                                                <div class="kt-widget__contact">
                                                    <div class="rating-holder">
                                                        <div class="c-rating c-rating--small" data-rating-value="<?= 0.25*(floor($course->score/(0.25)));?>">
                                                            <button>1</button>
                                                            <button>2</button>
                                                            <button>3</button>
                                                            <button>4</button>
                                                            <button>5</button>
                                                            <span class="kt-widget__label pl-2" style="font-size: 12px; color: #686f7a; font-weight: 400; font-family: open sans,helvetica neue,Helvetica,Arial,sans-serif"><?=$course->score;?></span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="kt-widget__footer" style="margin-top: 10px;" align="center">
                                            <a href="<?=base_url('admin/edit_course/'.$course->course_code)?>" data-course_code="<?=$course->course_code;?>" class="btn btn-label-warning btn-md btn-upper register_course"
                                                    style="padding: 5px 5px;font-size: 12px; border-radius: 5px;width:60%;">Duzenle</a>
                                        </div>
                                    </div>
                                    <!--end::Widget -->
                                </div>
                            </div>
                            <!--End::Portlet-->
                        </div>


                    <?endforeach;?>

                </div>


                <!--End::Row-->

                <!--End::Dashboard 1-->







            <div class="kt-portlet__body kt-hidden">






              
              
              
              

                <!--begin::Accordion-->
                <div class="accordion  accordion-toggle-arrow" id="accordionExample4">
                    <div class="card">
                        <div class="card-header" style="background-color: #e1e5ef" id="headingThree4">
                            <div class="card-title collapsed" data-toggle="collapse" data-target="#section_id_1" aria-expanded="false" aria-controls="collapseThree4">
                                 Section tittle <div style="position: absolute; right: 3rem;"><i class="fa fa-trash-alt pull-right btn btn-outline-hover-danger btn-sm btn-icon"></i></div>
                            </div>
                        </div>
                        <div id="section_id_1" class="collapse" aria-labelledby="headingThree1" data-parent="#accordionExample4">
                            <div class="card-body">
                               Section div burası
                            </div>
                        </div>
                    </div>
                </div>
              
              
              
              
              
              

                <!--end::Accordion-->
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
</body>
<!-- end::Body -->
</html>
