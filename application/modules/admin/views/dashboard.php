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





                    <div class="row">
                        <div class="col-xl-6">

                                    <!--begin:: Widgets/Daily Sales-->
                                    <div class="kt-portlet kt-portlet--height-fluid">
                                        <div class="kt-widget14">
                                            <div class="kt-widget14__header kt-margin-b-50">
                                                <h3 class="kt-widget14__title">
                                                    Siteye giriş oranları
                                                </h3>
                                                <span class="kt-widget14__desc">
															Günlük siteye giriş  detayları
														</span>
                                            </div>
                                            <div class="kt-widget14__chart" style="height:120px;">
                                                <canvas id="kt_chart_daily_sales"></canvas>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end:: Widgets/Daily Sales-->
                                </div>
                        <div class="col-xl-6">

                                    <!--begin:: Widgets/Support Cases-->
                                    <div class="kt-portlet kt-portlet--height-fluid">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-label">
                                                <h3 class="kt-portlet__head-title">
                                                    Günlük kurs izlenme oranları <small>ortalaması</small>
                                                </h3>
                                            </div>
                                            <div class="kt-portlet__head-toolbar kt-hidden">
                                                <a href="#" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    Show All
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">

                                                    <!--begin::Nav-->
                                                    <ul class="kt-nav">
                                                        <li class="kt-nav__head">
                                                            Export Options
                                                            <span data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand kt-svg-icon--md1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
																		<rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
																	</g>
																</svg> </span>
                                                        </li>
                                                        <li class="kt-nav__separator"></li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-drop"></i>
                                                                <span class="kt-nav__link-text">Activity</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                                                <span class="kt-nav__link-text">FAQ</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
                                                                <span class="kt-nav__link-text">Settings</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                                                <span class="kt-nav__link-text">Support</span>
                                                                <span class="kt-nav__link-badge">
																	<span class="kt-badge kt-badge--success kt-badge--rounded">5</span>
																</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__separator"></li>
                                                        <li class="kt-nav__foot">
                                                            <a class="btn btn-label-danger btn-bold btn-sm" href="#">Upgrade plan</a>
                                                            <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                                        </li>
                                                    </ul>

                                                    <!--end::Nav-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body">
                                            <div class="kt-widget16">
                                                <div class="kt-widget16__items">
                                                    <div class="kt-widget16__item">
														<span class="kt-widget16__sceduled">
															Kurs
														</span>
                                                        <span class="kt-widget16__amount">
															İzlenme
														</span>
                                                    </div>



                                                    <div class="kt-widget16__item">
														<span class="kt-widget16__date">
															Veri Bilimi ve Yapay Zekaya Giriş
														</span>
                                                        <span class="kt-widget16__price  kt-font-brand">
															248
														</span>
                                                    </div>
                                                    <div class="kt-widget16__item">
														<span class="kt-widget16__date">
															Veri Okuryazarlığı
														</span>
                                                        <span class="kt-widget16__price  kt-font-success">
															167
														</span>
                                                    </div>
                                                    <div class="kt-widget16__item">
														<span class="kt-widget16__date">
															Python Programlama 101
														</span>
                                                        <span class="kt-widget16__price  kt-font-danger">
															98
														</span>
                                                    </div>
                                                    <div class="kt-widget16__item">
														<span class="kt-widget16__date">
															Python Programlama 201
														</span>
                                                        <span class="kt-widget16__price  kt-font-brand">
															76
														</span>
                                                    </div>
                                                    <div class="kt-widget16__item">
														<span class="kt-widget16__date">
															Python Programlama 301
														</span>
                                                        <span class="kt-widget16__price  kt-font-warning">
															55
														</span>
                                                    </div>



                                                </div>
                                                <div class="kt-widget16__stats">
                                                    <div class="kt-widget16__visual">
                                                        <div id="kt_chart_support_tickets" style="height: 160px; width: 160px;">
                                                        </div>
                                                    </div>
                                                    <div class="kt-widget16__legends">
                                                        <div class="kt-widget16__legend">
                                                            <span class="kt-widget16__bullet kt-bg-success"></span>
                                                            <span class="kt-widget16__stat">70% takipli</span>
                                                        </div>
                                                        <div class="kt-widget16__legend">
                                                            <span class="kt-widget16__bullet kt-bg-info"></span>
                                                            <span class="kt-widget16__stat">20% gir/çık</span>
                                                        </div>
                                                        <div class="kt-widget16__legend">
                                                            <span class="kt-widget16__bullet kt-bg-danger"></span>
                                                            <span class="kt-widget16__stat">10% anlık</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end:: Widgets/Support Stats-->
                                </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6">

                            <!--begin:: Widgets/Order Statistics-->
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                           Diğer İstatiskikler
                                        </h3>
                                    </div>
                                    <div class="kt-portlet__head-toolbar kt-hidden">
                                        <a href="#" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
                                            Export
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">

                                            <!--begin::Nav-->
                                            <ul class="kt-nav">
                                                <li class="kt-nav__head">
                                                    Export Options
                                                    <span data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand kt-svg-icon--md1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																		<rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
																		<rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
																	</g>
																</svg> </span>
                                                </li>
                                                <li class="kt-nav__separator"></li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-drop"></i>
                                                        <span class="kt-nav__link-text">Activity</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                                        <span class="kt-nav__link-text">FAQ</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
                                                        <span class="kt-nav__link-text">Settings</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                                        <span class="kt-nav__link-text">Support</span>
                                                        <span class="kt-nav__link-badge">
																	<span class="kt-badge kt-badge--success kt-badge--rounded">5</span>
																</span>
                                                    </a>
                                                </li>
                                                <li class="kt-nav__separator"></li>
                                                <li class="kt-nav__foot">
                                                    <a class="btn btn-label-danger btn-bold btn-sm" href="#">Upgrade plan</a>
                                                    <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                                </li>
                                            </ul>

                                            <!--end::Nav-->
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-portlet__body kt-portlet__body--fluid">
                                    <div class="kt-widget12">
                                        <div class="kt-widget12__content">
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">Haftalık Kurs izleme</span>
                                                    <span class="kt-widget12__value">289</span>
                                                </div>
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">Şu tarihten sonrası için</span>
                                                    <span class="kt-widget12__value">Şubat 12, 2020</span>
                                                </div>
                                            </div>
                                            <div class="kt-widget12__item">
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">Günlük ortalama Kurs izleme</span>
                                                    <span class="kt-widget12__value">41</span>
                                                </div>
                                                <div class="kt-widget12__info">
                                                    <span class="kt-widget12__desc">Haftalık büyüme</span>
                                                    <div class="kt-widget12__progress">
                                                        <div class="progress kt-progress--sm">
                                                            <div class="progress-bar kt-bg-brand" role="progressbar" style="width: 40%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="kt-widget12__stat">
																	40%
																</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-widget12__chart" style="height:250px;">
                                            <canvas id="kt_chart_order_statistics"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end:: Widgets/Order Statistics-->
                        </div>
                        <div class="col-xl-6">

                            <!--begin:: Widgets/Top Locations-->
                            <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            Yüksek giriş lokasyonları
                                        </h3>
                                    </div>
                                    <div class="kt-portlet__head-toolbar kt-hidden">
                                        <div class="dropdown dropdown-inline">
                                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="flaticon-more-1"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="kt-nav">
                                                    <li class="kt-nav__section kt-nav__section--first">
                                                        <span class="kt-nav__section-text">Finance</span>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-graph-1"></i>
                                                            <span class="kt-nav__link-text">Statistics</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                                            <span class="kt-nav__link-text">Events</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-layers-1"></i>
                                                            <span class="kt-nav__link-text">Reports</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__section">
                                                        <span class="kt-nav__section-text">Customers</span>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                                            <span class="kt-nav__link-text">Notifications</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-file-1"></i>
                                                            <span class="kt-nav__link-text">Files</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">
                                    <div class="kt-widget15">
                                        <div class="kt-widget15__map">
                                            <div id="kt_chart_latest_trends_map" style="height:320px;"></div>
                                        </div>
                                        <div class="kt-widget15__items kt-margin-t-30">
                                            <div class="row">
                                                <div class="col">

                                                    <!--begin::widget item-->
                                                    <div class="kt-widget15__item">
																<span class="kt-widget15__stats">
																	63%
																</span>
                                                        <span class="kt-widget15__text">
																	America
																</span>
                                                        <div class="kt-space-10"></div>
                                                        <div class="progress m-progress--sm">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>

                                                    <!--end::widget item-->
                                                </div>
                                                <div class="col">

                                                    <!--begin::widget item-->
                                                    <div class="kt-widget15__item">
																<span class="kt-widget15__stats">
																	54%
																</span>
                                                        <span class="kt-widget15__text">
																	Germany
																</span>
                                                        <div class="kt-space-10"></div>
                                                        <div class="progress m-progress--sm">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>

                                                    <!--end::widget item-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">

                                                    <!--begin::widget item-->
                                                    <div class="kt-widget15__item">
																<span class="kt-widget15__stats">
																	41%
																</span>
                                                        <span class="kt-widget15__text">
																	Sweden
																</span>
                                                        <div class="kt-space-10"></div>
                                                        <div class="progress m-progress--sm">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 55%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>

                                                    <!--end::widget item-->
                                                </div>
                                                <div class="col">

                                                    <!--begin::widget item-->
                                                    <div class="kt-widget15__item">
																<span class="kt-widget15__stats">
																	79%
																</span>
                                                        <span class="kt-widget15__text">
																	Turkey
																</span>
                                                        <div class="kt-space-10"></div>
                                                        <div class="progress m-progress--sm">
                                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 60%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>

                                                        <!--end::widget item-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end:: Widgets/Top Locations-->
                        </div>
                    </div>





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




<script src="https://maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
<script src="assets/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>
<script src="aassets/js/admin/dashboard.js" type="text/javascript"></script>

</body>
<!-- end::Body -->
</html>
