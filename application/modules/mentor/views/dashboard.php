<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><?php $this->load->view('shared/head_start'); ?>

<!--<link href="/aassets/js_player/video-js.css" rel="stylesheet">-->
<!--<script src="/aassets/js_player/video.js"></script>-->

<link href="/aassets/js_player/old_js_css/video-js.min.css" rel="stylesheet">
<link href="/aassets/js_player/old_js_css/videojs-resolution-switcher.css" rel="stylesheet">
<script src="/aassets/js_player/old_js_css/video_old.js"></script>
<script src="/aassets/js_player/old_js_css/videojs-resolution-switcher.js"></script>

<?php $this->load->view('shared/css_all'); ?>
<link href="/aassets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
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





                </div>








                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid kt-hidden">
                    <!--Begin::Section-->
                    <div class="row">
                        <div class="col-xl-1 user_card">
                            <!--Begin::Portlet-->
                            <div class="kt-portlet kt-portlet--height-fluid" style="max-width: 220px min-width: 220px">
                                <div class="kt-widget__media mt-card-avatar mt-overlay-1">
                                    <img class="kt-widget__img kt-hidden-" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image" width="100%" height="125px">
                                    <img class="kt-widget__img kt-hidden" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image">
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
                                                <a href="#" class="kt-widget__titel kt-hidden-">
                                                    PHP
                                                </a>



                                            </div>
                                        </div>

                                        <div class="kt-widget__body">
                                            <div class="kt-widget__section">Php Array yapısı</div>

                                            <div class="kt-widget__item">
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Dersi veren:</span>
                                                    <a href="#" class="kt-widget__data kt-font-bold kt-font-brand kt-link">Sinan A.</a>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Kursun Puanı:</span>
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

                        <div class="col-xl-1 user_card">
                            <!--Begin::Portlet-->
                            <div class="kt-portlet kt-portlet--height-fluid" style="max-width: 220px">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image" width="100%" height="125px">
                                    <img class="kt-widget__img kt-hidden" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image">
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
                                                <a href="#" class="kt-widget__titel kt-hidden-">
                                                    PHP
                                                </a>



                                            </div>
                                        </div>

                                        <div class="kt-widget__body">
                                            <div class="kt-widget__section">Php Array yapısı</div>

                                            <div class="kt-widget__item">
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Dersi veren:</span>
                                                    <a href="#" class="kt-widget__data kt-font-bold kt-font-brand kt-link">Sinan A.</a>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Kursun Puanı:</span>
                                                    <a href="#" class="kt-widget__data">★★★★★★</a>
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

                        <div class="col-xl-1 user_card">
                            <!--Begin::Portlet-->
                            <div class="kt-portlet kt-portlet--height-fluid" style="max-width: 220px">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image" width="100%" height="125px">
                                    <img class="kt-widget__img kt-hidden" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image">
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
                                                <a href="#" class="kt-widget__titel kt-hidden-">
                                                    PHP
                                                </a>



                                            </div>
                                        </div>

                                        <div class="kt-widget__body">
                                            <div class="kt-widget__section">Php Array yapısı</div>

                                            <div class="kt-widget__item">
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Dersi veren:</span>
                                                    <a href="#" class="kt-widget__data kt-font-bold kt-font-brand kt-link">Sinan A.</a>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Kursun Puanı:</span>
                                                    <a href="#" class="kt-widget__data">★★★★★★</a>
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

                        <div class="col-xl-1 user_card">
                            <!--Begin::Portlet-->
                            <div class="kt-portlet kt-portlet--height-fluid" style="max-width: 220px">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image" width="100%" height="125px">
                                    <img class="kt-widget__img kt-hidden" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image">
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
                                                <a href="#" class="kt-widget__titel kt-hidden-">
                                                    PHP
                                                </a>



                                            </div>
                                        </div>

                                        <div class="kt-widget__body">
                                            <div class="kt-widget__section">Php Array yapısı</div>

                                            <div class="kt-widget__item">
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Dersi veren:</span>
                                                    <a href="#" class="kt-widget__data kt-font-bold kt-font-brand kt-link">Sinan A.</a>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Kursun Puanı:</span>
                                                    <a href="#" class="kt-widget__data">★★★★★★</a>
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

                        <div class="col-xl-1 user_card">
                            <!--Begin::Portlet-->
                            <div class="kt-portlet kt-portlet--height-fluid" style="max-width: 220px">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image" width="100%" height="125px">
                                    <img class="kt-widget__img kt-hidden" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image">
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
                                                <a href="#" class="kt-widget__titel kt-hidden-">
                                                    PHP
                                                </a>



                                            </div>
                                        </div>

                                        <div class="kt-widget__body">
                                            <div class="kt-widget__section">Php Array yapısı</div>

                                            <div class="kt-widget__item">
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Dersi veren:</span>
                                                    <a href="#" class="kt-widget__data kt-font-bold kt-font-brand kt-link">Sinan A.</a>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Kursun Puanı:</span>
                                                    <a href="#" class="kt-widget__data">★★★★★★</a>
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

                        <div class="col-xl-1 user_card">
                            <!--Begin::Portlet-->
                            <div class="kt-portlet kt-portlet--height-fluid" style="max-width: 220px">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image" width="100%" height="125px">
                                    <img class="kt-widget__img kt-hidden" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image">
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
                                                <a href="#" class="kt-widget__titel kt-hidden-">
                                                    PHP
                                                </a>



                                            </div>
                                        </div>

                                        <div class="kt-widget__body">
                                            <div class="kt-widget__section">Php Array yapısı</div>

                                            <div class="kt-widget__item">
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Dersi veren:</span>
                                                    <a href="#" class="kt-widget__data kt-font-bold kt-font-brand kt-link">Sinan A.</a>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Kursun Puanı:</span>
                                                    <a href="#" class="kt-widget__data">★★★★★★</a>
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

                        <div class="col-xl-1 user_card">
                            <!--Begin::Portlet-->
                            <div class="kt-portlet kt-portlet--height-fluid" style="max-width: 220px">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image" width="100%" height="125px">
                                    <img class="kt-widget__img kt-hidden" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image">
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
                                                <a href="#" class="kt-widget__titel kt-hidden-">
                                                    PHP
                                                </a>



                                            </div>
                                        </div>

                                        <div class="kt-widget__body">
                                            <div class="kt-widget__section">Php Array yapısı</div>

                                            <div class="kt-widget__item">
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Dersi veren:</span>
                                                    <a href="#" class="kt-widget__data kt-font-bold kt-font-brand kt-link">Sinan A.</a>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Kursun Puanı:</span>
                                                    <a href="#" class="kt-widget__data">★★★★★★</a>
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

                        <div class="col-xl-1 user_card">
                            <!--Begin::Portlet-->
                            <div class="kt-portlet kt-portlet--height-fluid" style="max-width: 220px">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image" width="100%" height="125px">
                                    <img class="kt-widget__img kt-hidden" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image">
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
                                                <a href="#" class="kt-widget__titel kt-hidden-">
                                                    PHP
                                                </a>



                                            </div>
                                        </div>

                                        <div class="kt-widget__body">
                                            <div class="kt-widget__section">Php Array yapısı</div>

                                            <div class="kt-widget__item">
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Dersi veren:</span>
                                                    <a href="#" class="kt-widget__data kt-font-bold kt-font-brand kt-link">Sinan A.</a>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Kursun Puanı:</span>
                                                    <a href="#" class="kt-widget__data">★★★★★★</a>
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

                        <div class="col-xl-1 user_card">
                            <!--Begin::Portlet-->
                            <div class="kt-portlet kt-portlet--height-fluid" style="max-width: 220px">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image" width="100%" height="125px">
                                    <img class="kt-widget__img kt-hidden" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image">
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
                                                <a href="#" class="kt-widget__titel kt-hidden-">
                                                    PHP
                                                </a>



                                            </div>
                                        </div>

                                        <div class="kt-widget__body">
                                            <div class="kt-widget__section">Php Array yapısı</div>

                                            <div class="kt-widget__item">
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Dersi veren:</span>
                                                    <a href="#" class="kt-widget__data kt-font-bold kt-font-brand kt-link">Sinan A.</a>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Kursun Puanı:</span>
                                                    <a href="#" class="kt-widget__data">★★★★★★</a>
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

                        <div class="col-xl-1 user_card">
                            <!--Begin::Portlet-->
                            <div class="kt-portlet kt-portlet--height-fluid" style="max-width: 220px">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image" width="100%" height="125px">
                                    <img class="kt-widget__img kt-hidden" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image">
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
                                                <a href="#" class="kt-widget__titel kt-hidden-">
                                                    PHP
                                                </a>



                                            </div>
                                        </div>

                                        <div class="kt-widget__body">
                                            <div class="kt-widget__section">Php Array yapısı</div>

                                            <div class="kt-widget__item">
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Dersi veren:</span>
                                                    <a href="#" class="kt-widget__data kt-font-bold kt-font-brand kt-link">Sinan A.</a>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Kursun Puanı:</span>
                                                    <a href="#" class="kt-widget__data">★★★★★★</a>
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

                        <div class="col-xl-1 user_card">
                            <!--Begin::Portlet-->
                            <div class="kt-portlet kt-portlet--height-fluid" style="max-width: 220px">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image" width="100%" height="125px">
                                    <img class="kt-widget__img kt-hidden" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image">
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
                                                <a href="#" class="kt-widget__titel kt-hidden-">
                                                    PHP
                                                </a>



                                            </div>
                                        </div>

                                        <div class="kt-widget__body">
                                            <div class="kt-widget__section">Php Array yapısı</div>

                                            <div class="kt-widget__item">
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Dersi veren:</span>
                                                    <a href="#" class="kt-widget__data kt-font-bold kt-font-brand kt-link">Sinan A.</a>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Kursun Puanı:</span>
                                                    <a href="#" class="kt-widget__data">★★★★★★</a>
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

                        <div class="col-xl-1 user_card">
                            <!--Begin::Portlet-->
                            <div class="kt-portlet kt-portlet--height-fluid" style="max-width: 220px">
                                <div class="kt-widget__media">
                                    <img class="kt-widget__img kt-hidden-" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image" width="100%" height="125px">
                                    <img class="kt-widget__img kt-hidden" src="/aassets/media/misc/yasuo_avatar_880_500px.png" alt="image">
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
                                                <a href="#" class="kt-widget__titel kt-hidden-">
                                                    PHP
                                                </a>



                                            </div>
                                        </div>

                                        <div class="kt-widget__body">
                                            <div class="kt-widget__section">Php Array yapısı</div>

                                            <div class="kt-widget__item">
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Dersi veren:</span>
                                                    <a href="#" class="kt-widget__data kt-font-bold kt-font-brand kt-link">Sinan A.</a>
                                                </div>
                                                <div class="kt-widget__contact">
                                                    <span class="kt-widget__label">Kursun Puanı:</span>
                                                    <a href="#" class="kt-widget__data">★★★★★★</a>
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
                    <!--End::Section-->
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

<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script src="/aassets/js/pages/crud/datatables/search-options/column-search.js" type="text/javascript"></script>
</body>
<!-- end::Body -->
</html>
