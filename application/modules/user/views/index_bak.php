<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('shared/head_start'); ?>
<?php $this->load->view('shared/css_all'); ?>
<?php $this->load->view('shared/head_end'); ?>


<!-- begin::Body -->
<body class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">

<!-- begin::Page loader -->

<!-- end::Page Loader -->

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<?php $this->load->view('shared/header_mobile'); ?>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

            <!--        <div class="kt-container" style="background-image: url(/assets/media/bg/0_5Ul2ftgASKuwiG_z.jpeg); margin-top:15px; height: 2666px; width: 1408px;">fdsfsd</div>-->

            <!-- begin:: Header -->
            <div id="kt_header" class="kt-header  kt-header--fixed " data-ktheader-minimize="on">
                <div class="kt-container  kt-container--fluid ">

                    <!-- begin: Header Menu -->
                    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                    <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">

                        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile kt-hidden">
                            <ul class="kt-menu__nav ">
                                <li class="kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here kt-hidden" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Dashboard</span><i
                                                class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                                        <ul class="kt-menu__subnav">
                                            <li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true"><a href="index.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Default Dashboard</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/fluid.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Fluid Dashboard</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Aside Dashboard</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="kt-menu__item kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open-dropdown" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Category</span><i
                                                class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                                        <ul class="kt-menu__subnav">
                                            <li class="kt-menu__item  kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true"><a href="javascript:" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-ui"></i><span class="kt-menu__link-text">Yazılım Geliştirme</span><i
                                                            class="kt-menu__hor-arrow la la-angle-right"></i><i
                                                            class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                                <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                                                    <ul class="kt-menu__subnav">
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/colors.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Web Geliştirme</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/typography.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Monil Uygulamalar</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/buttons.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Programlama Dilleri</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/button-group.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Veri Tabanları</span></a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="kt-menu__item  kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true"><a href="javascript:" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-analytics"></i><span class="kt-menu__link-text">Data Bilimi</span><i
                                                            class="kt-menu__hor-arrow la la-angle-right"></i><i
                                                            class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                                <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                                                    <ul class="kt-menu__subnav">
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/custom/badge.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Yapay Zeka</span></a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="kt-menu__item  kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true"><a href="javascript:" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-layers-2"></i><span class="kt-menu__link-text">Veri Tabanı</span><i
                                                            class="kt-menu__hor-arrow la la-angle-right"></i><i
                                                            class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                                <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                                                    <ul class="kt-menu__subnav">
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/extended/sticky-panels.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Hadoop</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/extended/blockui.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Spark</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/extended/perfect-scrollbar.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Elasticsearch</span></a></li>
                                                        <
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel kt-hidden" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Pages</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="kt-menu__submenu  kt-menu__submenu--fixed kt-menu__submenu--center" style="width:1000px">
                                        <div class="kt-menu__subnav">
                                            <ul class="kt-menu__content">
                                                <li class="kt-menu__item ">
                                                    <h3 class="kt-menu__heading kt-menu__toggle"><span class="kt-menu__link-text">Pricing Tables</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                                    <ul class="kt-menu__inner">
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/pricing/pricing-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Pricing Tables 1</span></a></li>

                                                    </ul>
                                                </li>
                                                <li class="kt-menu__item ">
                                                    <h3 class="kt-menu__heading kt-menu__toggle"><span class="kt-menu__link-text">Wizards</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                                    <ul class="kt-menu__inner">
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/wizard/wizard-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Wizard 1</span></a></li>
                                                    </ul>
                                                </li>
                                                <li class="kt-menu__item ">
                                                    <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Invoices & FAQ</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                                    <ul class="kt-menu__inner">
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/invoices/invoice-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Invoice 1</span></a></li>
                                                    </ul>
                                                </li>
                                                <li class="kt-menu__item ">
                                                    <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">User Pages</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                                    <ul class="kt-menu__inner">
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/user/login-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Login 1</span></a></li>
                                                    </ul>
                                                </li>
                                                <li class="kt-menu__item ">
                                                    <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error Pages</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                                    <ul class="kt-menu__inner">
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/error/error-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Error 1</span></a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- end: Header Menu -->

                    <!-- begin:: Brand -->
                    <div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
                        <a class="kt-header__brand-logo" href="<?= base_url('/u/index') ?>">
                            <img alt="Logo" src="/assets/media/logos/logo-9.png"/>
                        </a>
                    </div>

                    <!-- end:: Brand -->

                    <!-- begin:: Header Topbar -->
                    <div class="kt-header__topbar kt-grid__item">

                        <!--begin: Search -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--search dropdown kt-hidden" id="kt_quick_search_toggle">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                <span class="kt-header__topbar-icon"><i class="flaticon2-search-1"></i></span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
                                <div class="kt-quick-search kt-quick-search--dropdown kt-quick-search--result-compact" id="kt_quick_search_dropdown">
                                    <form method="get" class="kt-quick-search__form">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
                                            <input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
                                            <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                        </div>
                                    </form>
                                    <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="325" data-mobile-height="200">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end: Search -->

                        <!--begin: Notifications -->
                        <div class="kt-header__topbar-item dropdown">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                <span class="kt-header__topbar-icon"><i class="flaticon2-bell-alarm-symbol"></i></span>
                                <span class="kt-badge kt-badge--danger"></span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                                <form>

                                    <!--begin: Head -->
                                    <div class="kt-head kt-head--skin-light kt-head--fit-x kt-head--fit-b user_notifications">
                                        <h3 class="kt-head__title kt-font-light">
                                            User Notifications
                                            &nbsp;
                                            <span class="btn btn-success btn-sm btn-bold btn-font-md">23 new</span>
                                        </h3>
                                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show kt-font-light" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">Alerts</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link kt-font-light" data-toggle="tab" href="#topbar_notifications_events" role="tab" aria-selected="false">Events</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link kt-font-light" data-toggle="tab" href="#topbar_notifications_logs" role="tab" aria-selected="false">Logs</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!--end: Head -->
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
                                            <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-line-chart kt-font-success"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New order has been received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            2 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item kt-notification__item--read">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-safe kt-font-primary"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Company meeting canceled
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            19 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                            <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-psd kt-font-success"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New report has been received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            23 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item kt-notification__item--read">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-safe kt-font-primary"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Company meeting canceled
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            19 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                            <div class="kt-grid kt-grid--ver" style="min-height: 200px;">
                                                <div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
                                                    <div class="kt-grid__item kt-grid__item--middle kt-align-center">
                                                        All caught up!
                                                        <br>No new notifications.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!--end: Notifications -->

                        <!--begin: Quick actions -->
                        <div class="kt-header__topbar-item dropdown kt-hidden">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                <span class="kt-header__topbar-icon"><i class="flaticon2-gear"></i></span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                                <form>

                                    <!--begin: Head -->
                                    <div class="kt-head kt-head--skin-light user_quick_actions">
                                        <h3 class="kt-head__title kt-font-light">
                                            User Quick Actions
                                            <span class="kt-space-15"></span>
                                            <span class="btn btn-success btn-sm btn-bold btn-font-md">23 tasks pending</span>
                                        </h3>
                                    </div>

                                    <!--end: Head -->

                                    <!--begin: Grid Nav -->
                                    <div class="kt-grid-nav kt-grid-nav--skin-light">
                                        <div class="kt-grid-nav__row">
                                            <a href="#" class="kt-grid-nav__item">
														<span class="kt-grid-nav__icon">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"/>
																	<path
                                                                            d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z"
                                                                            fill="#000000" opacity="0.3"/>
																	<path
                                                                            d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z"
                                                                            fill="#000000"/>
																</g>
															</svg> </span>
                                                <span class="kt-grid-nav__title">Accounting</span>
                                                <span class="kt-grid-nav__desc">eCommerce</span>
                                            </a>
                                            <a href="#" class="kt-grid-nav__item">
														<span class="kt-grid-nav__icon">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"/>
																	<path
                                                                            d="M14.8571499,13 C14.9499122,12.7223297 15,12.4263059 15,12.1190476 L15,6.88095238 C15,5.28984632 13.6568542,4 12,4 L11.7272727,4 C10.2210416,4 9,5.17258756 9,6.61904762 L10.0909091,6.61904762 C10.0909091,5.75117158 10.823534,5.04761905 11.7272727,5.04761905 L12,5.04761905 C13.0543618,5.04761905 13.9090909,5.86843034 13.9090909,6.88095238 L13.9090909,12.1190476 C13.9090909,12.4383379 13.8240964,12.7385644 13.6746497,13 L10.3253503,13 C10.1759036,12.7385644 10.0909091,12.4383379 10.0909091,12.1190476 L10.0909091,9.5 C10.0909091,9.06606198 10.4572216,8.71428571 10.9090909,8.71428571 C11.3609602,8.71428571 11.7272727,9.06606198 11.7272727,9.5 L11.7272727,11.3333333 L12.8181818,11.3333333 L12.8181818,9.5 C12.8181818,8.48747796 11.9634527,7.66666667 10.9090909,7.66666667 C9.85472911,7.66666667 9,8.48747796 9,9.5 L9,12.1190476 C9,12.4263059 9.0500878,12.7223297 9.14285008,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L14.8571499,13 Z"
                                                                            fill="#000000" opacity="0.3"/>
																	<path
                                                                            d="M9,10.3333333 L9,12.1190476 C9,13.7101537 10.3431458,15 12,15 C13.6568542,15 15,13.7101537 15,12.1190476 L15,10.3333333 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9,10.3333333 Z M10.0909091,11.1212121 L12,12.5 L13.9090909,11.1212121 L13.9090909,12.1190476 C13.9090909,13.1315697 13.0543618,13.952381 12,13.952381 C10.9456382,13.952381 10.0909091,13.1315697 10.0909091,12.1190476 L10.0909091,11.1212121 Z"
                                                                            fill="#000000"/>
																</g>
															</svg> </span>
                                                <span class="kt-grid-nav__title">Administration</span>
                                                <span class="kt-grid-nav__desc">Console</span>
                                            </a>
                                        </div>
                                    </div>

                                    <!--end: Grid Nav -->
                                </form>
                            </div>
                        </div>

                        <!--end: Quick actions -->

                        <!--begin: Cart -->
                        <div class="kt-header__topbar-item dropdown kt-hidden">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="true">
                                <span class="kt-header__topbar-icon"><i class="flaticon2-shopping-cart-1"></i></span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                                <form>

                                    <!-- begin:: Mycart -->
                                    <div class="kt-mycart">
                                        <div class="kt-mycart__head kt-head my_cart">
                                            <div class="kt-mycart__info">
                                                <span class="kt-mycart__icon"><i class="flaticon2-shopping-cart-1 kt-font-success"></i></span>
                                                <h3 class="kt-mycart__title">My Cart</h3>
                                            </div>
                                            <div class="kt-mycart__button">
                                                <button type="button" class="btn btn-success btn-sm">2 Items</button>
                                            </div>
                                        </div>
                                        <div class="kt-mycart__body kt-scroll" data-scroll="true" data-height="245" data-mobile-height="200">
                                            <div class="kt-mycart__item">
                                                <div class="kt-mycart__container">
                                                    <div class="kt-mycart__info">
                                                        <a href="#" class="kt-mycart__title">
                                                            Samsung
                                                        </a>
                                                        <span class="kt-mycart__desc">
																	Profile info, Timeline etc
																</span>
                                                        <div class="kt-mycart__action">
                                                            <span class="kt-mycart__price">$ 450</span>
                                                            <span class="kt-mycart__text">for</span>
                                                            <span class="kt-mycart__quantity">7</span>
                                                            <a href="#" class="btn btn-label-success btn-icon">&minus;</a>
                                                            <a href="#" class="btn btn-label-success btn-icon">&plus;</a>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="kt-mycart__pic">
                                                        <img src="/assets/media/products/product9.jpg" title="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-mycart__footer">
                                            <div class="kt-mycart__section">
                                                <div class="kt-mycart__subtitel">
                                                    <span>Sub Total</span>
                                                    <span>Taxes</span>
                                                    <span>Total</span>
                                                </div>
                                                <div class="kt-mycart__prices">
                                                    <span>$ 840.00</span>
                                                    <span>$ 72.00</span>
                                                    <span class="kt-font-brand">$ 912.00</span>
                                                </div>
                                            </div>
                                            <div class="kt-mycart__button kt-align-right">
                                                <button type="button" class="btn btn-primary btn-sm">Place Order</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- end:: Mycart -->
                                </form>
                            </div>
                        </div>

                        <!--end: Cart -->

                        <!--begin: Language bar -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--langs">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										<span class="kt-header__topbar-icon">
											<img class="" src="/assets/media/flags/020-flag.svg" alt=""/>
										</span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim">
                                <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                                    <li class="kt-nav__item kt-nav__item--active">
                                        <a href="#" class="kt-nav__link">
                                            <span class="kt-nav__link-icon"><img src="/assets/media/flags/020-flag.svg" alt=""/></span>
                                            <span class="kt-nav__link-text">English</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <span class="kt-nav__link-icon"><img src="/assets/media/flags/006-turkey.svg" alt=""/></span>
                                            <span class="kt-nav__link-text">Turkish</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--end: Language bar -->

                        <!--begin: User bar -->
                      <?php $this->load->view('shared/user_bar'); ?>

                        <!--end: User bar -->

                        <!--begin: Quick panel toggler -->
                        <div class="kt-header__topbar-item kt-hidden" data-toggle="kt-tooltip" title="Quick panel" data-placement="top">
                            <div class="kt-header__topbar-wrapper">
                                <span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn"><i class="flaticon2-cube-1"></i></span>
                            </div>
                        </div>

                        <!--end: Quick panel toggler -->
                    </div>

                    <!-- end:: Header Topbar -->
                </div>
            </div>

            <!-- end:: Header -->


            <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch kt-pt0" id="kt_body">
                <div class="kt-content user_welcome_business_picture">
                </div>
                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor course_content_table" id="kt_content">

                    <!-- begin:: Subheader -->


                    <!-- end:: Subheader -->

                    <!-- begin:: Content -->
                    <div class="kt-container  kt-grid__item kt-grid__item--fluid">


                        <!--Begin::Dashboard 1-->
                        <div class="row <? empty($courses) ? 'kt-hidden' : '' ?>">
                          <? if (!empty($courses)) foreach ($courses as $course): ?>

                              <div class="col-xl-1 user_card" data-container="body" data-toggle="kt-popover" data-placement="right" data-html="true" data-original-title="<?= $course->title ?>"
                                   data-content="<div class='pull-left pl-0'><i class='flaticon2-arrow kt-font-brand'></i>&nbsp;Ders: 11 </div><div class='pull-left ml-2'><i class='flaticon2-crisp-icons-1 kt-font-brand'></i>&nbsp;Süre: 49dk </div><br><br><?= character_limiter($course->sub_title, 163); ?>">

                                  <!--Begin::Portlet-->
                                  <div class="kt-portlet kt-portlet--height-fluid">
                                      <div class="kt-widget__media mt-card-avatar mt-overlay-1 kt-ribbon  kt-ribbon--clip kt-ribbon--right kt-ribbon--info">
                                          <div class="kt-ribbon__target">
                                              <span class="kt-ribbon__inner"></span>Yeni
                                          </div>
                                          <img id="card_course_img" class="kt-widget__img kt-hidden-" src="<?= $course->course_img; ?>" alt="image" width="100%" height="125px">
                                          <div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden"></div>
                                      </div>
                                      <div class="kt-portlet__head--noborder">
                                          <div class="kt-portlet__head-label">

                                          </div>
                                      </div>
                                      <div class="kt-portlet__body pb-3">
                                          <!--begin::Widget -->
                                          <div class="kt-widget kt-widget--user-profile-2">
                                              <div class="kt-widget__head">


                                                  <div class="kt-widget__info pl-0">
                                                      <a href="#" class="card_title"><font><?= character_limiter($course->title, 30); ?></font></a>


                                                  </div>
                                              </div>

                                              <div class="kt-widget__body">
                                                  <div id="card_subtitle" class="kt-widget__section"></div>
                                                  <div class="kt-widget__item">
                                                      <div class="kt-widget__contact">
                              <span class="kt-widget__label"><font><?= $course->first_name
                                  . ' '
                                  . $course->last_name;
                                  ?></font></span>
                                                      </div>
                                                  </div>
                                                  <div class="kt-widget__item">
                                                      <div class="kt-widget__contact">
                                                          <div class="rating-holder">
                                                              <div class="c-rating c-rating--small" data-rating-value="<?= 0.25 * (floor($course->score / (0.25))); ?>">
                                                                  <button>1</button>
                                                                  <button>2</button>
                                                                  <button>3</button>
                                                                  <button>4</button>
                                                                  <button>5</button>
                                                                  <span class="kt-widget__label pl-2"><?= $course->score; ?></span>
                                                              </div>
                                                          </div>

                                                      </div>
                                                  </div>
                                              </div>

                                              <div class="kt-widget__footer">

                                                  <a data-course_code="<?= $course->course_code; ?>" href="<?= base_url('u/play/' . $course->course_code) ?>" type="button"
                                                     class="btn btn-label btn-label-info btn-md btn-bold register_course_get <?= !in_array($course->course_code, $my_courses_codes, true) ? 'kt-hidden' : '' ?>">Kursa Git</a>

                                                  <button data-course_code="<?= $course->course_code; ?>" type="button"
                                                          class="btn btn-label btn-label-brand btn-md btn-bold register_course <?= in_array($course->course_code, $my_courses_codes, true) ? 'kt-hidden' : '' ?>">Kayıt Ol
                                                  </button>

                                              </div>
                                          </div>
                                          <!--end::Widget -->
                                      </div>
                                  </div>
                                  <!--End::Portlet-->
                              </div>
                          
                          
                          <? endforeach; ?>


                        </div>
                        <!--Begin::Row-->
                        <div class="row">
                            <div class="col-xl-12">

                                <!--begin:: Widgets/Best Sellers-->
                                <div class="kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                My Courses
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar">
                                            <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#kt_widget5_tab1_content" role="tab" aria-selected="true">
                                                        Latest
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab2_content" role="tab" aria-selected="false">
                                                        Month
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab3_content" role="tab" aria-selected="false">
                                                        All time
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                                                <div class="kt-widget5">
                                                  <? if (empty($my_courses)): ?>
                                                      <div class="row my_courses_empty_content"><i class="fa fa-ghost"></i>Burası boş. Haydi bir kursa kayıt ol.</div>
                                                  <? endif; ?>
                                                  <? if (!empty($my_courses)): ?>
                                                    <? foreach ($my_courses as $i => $my_course): ?>

                                                          <div class="kt-widget5__item">
                                                              <div class="kt-widget5__content">
                                                                  <div class="kt-widget5__pic">
                                                                      <img class="kt-widget7__img" src="<?= base_url($my_course->course_img) ?>" alt="">
                                                                  </div>
                                                                  <div class="kt-widget5__section">
                                                                      <a href="#" class="kt-widget5__title">
                                                                        <?= $my_course->title ?>
                                                                      </a>
                                                                      <p class="kt-widget5__desc">
                                                                        <?= $my_course->sub_title ?>
                                                                      </p>
                                                                      <div class="kt-widget5__info">
                                                                          <span>Author:</span>
                                                                          <span class="kt-font-info"><?= $my_course->first_name . '&nbsp;' . $my_course->last_name; ?></span>
                                                                          <span>Released:</span>
                                                                          <span class="kt-font-info">23.08.17</span>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="kt-widget5__content">
                                                                  <div class="kt-widget5__stats">
                                                                      <a href="<?= base_url('u/play/' . $my_course->course_code) ?>" class="btn btn-success">Start</a>

                                                                  </div>

                                                              </div>
                                                          </div>
                                                    <? endforeach; ?>
                                                  <? endif; ?>


                                                </div>
                                            </div>
                                            <div class="tab-pane" id="kt_widget5_tab2_content">
                                                <div class="kt-widget5">
                                                    <div class="kt-widget5__item">
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__pic">
                                                                <img class="kt-widget7__img" src="assets/media/products/product10.jpg" alt="">
                                                            </div>
                                                            <div class="kt-widget5__section">
                                                                <a href="#" class="kt-widget5__title">
                                                                    Branding Mockup
                                                                </a>
                                                                <p class="kt-widget5__desc">
                                                                    Metronic bootstrap themes.
                                                                </p>
                                                                <div class="kt-widget5__info">
                                                                    <span>Author:</span>
                                                                    <span class="kt-font-info">Fly themes</span>
                                                                    <span>Released:</span>
                                                                    <span class="kt-font-info">23.08.17</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">24,583</span>
                                                                <span class="kt-widget5__sales">sales</span>
                                                            </div>
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">3809</span>
                                                                <span class="kt-widget5__votes">votes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kt-widget5__item">
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__pic">
                                                                <img class="kt-widget7__img" src="assets/media/products/product11.jpg" alt="">
                                                            </div>
                                                            <div class="kt-widget5__section">
                                                                <a href="#" class="kt-widget5__title">
                                                                    Awesome Mobile App
                                                                </a>
                                                                <p class="kt-widget5__desc">
                                                                    Metronic admin themes.Lorem Ipsum Amet
                                                                </p>
                                                                <div class="kt-widget5__info">
                                                                    <span>Author:</span>
                                                                    <span class="kt-font-info">Fly themes</span>
                                                                    <span>Released:</span>
                                                                    <span class="kt-font-info">23.08.17</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">210,054</span>
                                                                <span class="kt-widget5__sales">sales</span>
                                                            </div>
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">1103</span>
                                                                <span class="kt-widget5__votes">votes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kt-widget5__item">
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__pic">
                                                                <img class="kt-widget7__img" src="assets/media/products/product6.jpg" alt="">
                                                            </div>
                                                            <div class="kt-widget5__section">
                                                                <a href="#" class="kt-widget5__title">
                                                                    Great Logo Designn
                                                                </a>
                                                                <p class="kt-widget5__desc">
                                                                    Metronic admin themes.
                                                                </p>
                                                                <div class="kt-widget5__info">
                                                                    <span>Author:</span>
                                                                    <span class="kt-font-info">Keenthemes</span>
                                                                    <span>Released:</span>
                                                                    <span class="kt-font-info">23.08.17</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">19,200</span>
                                                                <span class="kt-widget5__sales">sales</span>
                                                            </div>
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">1046</span>
                                                                <span class="kt-widget5__votes">votes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="kt_widget5_tab3_content">
                                                <div class="kt-widget5">
                                                    <div class="kt-widget5__item">
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__pic">
                                                                <img class="kt-widget7__img" src="assets/media/products/product11.jpg" alt="">
                                                            </div>
                                                            <div class="kt-widget5__section">
                                                                <a href="#" class="kt-widget5__title">
                                                                    Awesome Mobile App
                                                                </a>
                                                                <p class="kt-widget5__desc">
                                                                    Metronic admin themes.Lorem Ipsum Amet
                                                                </p>
                                                                <div class="kt-widget5__info">
                                                                    <span>Author:</span>
                                                                    <span class="kt-font-info">Fly themes</span>
                                                                    <span>Released:</span>
                                                                    <span class="kt-font-info">23.08.17</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">210,054</span>
                                                                <span class="kt-widget5__sales">sales</span>
                                                            </div>
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">1103</span>
                                                                <span class="kt-widget5__votes">votes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kt-widget5__item">
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__pic">
                                                                <img class="kt-widget7__img" src="assets/media/products/product6.jpg" alt="">
                                                            </div>
                                                            <div class="kt-widget5__section">
                                                                <a href="#" class="kt-widget5__title">
                                                                    Great Logo Designn
                                                                </a>
                                                                <p class="kt-widget5__desc">
                                                                    Metronic admin themes.
                                                                </p>
                                                                <div class="kt-widget5__info">
                                                                    <span>Author:</span>
                                                                    <span class="kt-font-info">Keenthemes</span>
                                                                    <span>Released:</span>
                                                                    <span class="kt-font-info">23.08.17</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">19,200</span>
                                                                <span class="kt-widget5__sales">sales</span>
                                                            </div>
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">1046</span>
                                                                <span class="kt-widget5__votes">votes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kt-widget5__item">
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__pic">
                                                                <img class="kt-widget7__img" src="assets/media/products/product10.jpg" alt="">
                                                            </div>
                                                            <div class="kt-widget5__section">
                                                                <a href="#" class="kt-widget5__title">
                                                                    Branding Mockup
                                                                </a>
                                                                <p class="kt-widget5__desc">
                                                                    Metronic bootstrap themes.
                                                                </p>
                                                                <div class="kt-widget5__info">
                                                                    <span>Author:</span>
                                                                    <span class="kt-font-info">Fly themes</span>
                                                                    <span>Released:</span>
                                                                    <span class="kt-font-info">23.08.17</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">24,583</span>
                                                                <span class="kt-widget5__sales">sales</span>
                                                            </div>
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">3809</span>
                                                                <span class="kt-widget5__votes">votes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end:: Widgets/Best Sellers-->
                            </div>
                            <div class="col-xl-6 col-lg-12 order-lg-3 order-xl-1 kt-hidden">

                                <!--begin:: Widgets/Best Sellers-->
                                <div class="kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                Best Sellers
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar">
                                            <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#kt_widget5_tab4_content" role="tab">
                                                        Latest
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab5_content" role="tab">
                                                        Month
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab6_content" role="tab">
                                                        All time
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="kt_widget5_tab4_content" aria-expanded="true">
                                                <div class="kt-widget5">
                                                    <div class="kt-widget5__item">
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__pic">
                                                                <img class="kt-widget7__img" src="/aassets/media/misc/garen_avatar_880_500px.png" alt="">
                                                            </div>
                                                            <div class="kt-widget5__section">
                                                                <a href="#" class="kt-widget5__title">
                                                                    Great Logo Designn
                                                                </a>
                                                                <p class="kt-widget5__desc">
                                                                    Metronic admin themes.
                                                                </p>
                                                                <div class="kt-widget5__info">
                                                                    <span>Author:</span>
                                                                    <span class="kt-font-info">Keenthemes</span>
                                                                    <span>Released:</span>
                                                                    <span class="kt-font-info">23.08.17</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">19,200</span>
                                                                <span class="kt-widget5__sales">sales</span>
                                                            </div>
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">1046</span>
                                                                <span class="kt-widget5__votes">votes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kt-widget5__item">
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__pic">
                                                                <img class="kt-widget7__img" src="/aassets/media/misc/garen_avatar_880_500px.png" alt="">
                                                            </div>
                                                            <div class="kt-widget5__section">
                                                                <a href="#" class="kt-widget5__title">
                                                                    Branding Mockup
                                                                </a>
                                                                <p class="kt-widget5__desc">
                                                                    Metronic bootstrap themes.
                                                                </p>
                                                                <div class="kt-widget5__info">
                                                                    <span>Author:</span>
                                                                    <span class="kt-font-info">Fly themes</span>
                                                                    <span>Released:</span>
                                                                    <span class="kt-font-info">23.08.17</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">24,583</span>
                                                                <span class="kt-widget5__sales">sales</span>
                                                            </div>
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">3809</span>
                                                                <span class="kt-widget5__votes">votes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kt-widget5__item">
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__pic">
                                                                <img class="kt-widget7__img" src="/aassets/media/misc/garen_avatar_880_500px.png" alt="">
                                                            </div>
                                                            <div class="kt-widget5__section">
                                                                <a href="#" class="kt-widget5__title">
                                                                    Awesome Mobile App
                                                                </a>
                                                                <p class="kt-widget5__desc">
                                                                    Metronic admin themes.Lorem Ipsum Amet
                                                                </p>
                                                                <div class="kt-widget5__info">
                                                                    <span>Author:</span>
                                                                    <span class="kt-font-info">Fly themes</span>
                                                                    <span>Released:</span>
                                                                    <span class="kt-font-info">23.08.17</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">210,054</span>
                                                                <span class="kt-widget5__sales">sales</span>
                                                            </div>
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">1103</span>
                                                                <span class="kt-widget5__votes">votes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="kt_widget5_tab5_content">
                                                <div class="kt-widget5">
                                                    <div class="kt-widget5__item">
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__pic">
                                                                <img class="kt-widget7__img" src="/assets/media/products/product10.jpg" alt="">
                                                            </div>
                                                            <div class="kt-widget5__section">
                                                                <a href="#" class="kt-widget5__title">
                                                                    Branding Mockup
                                                                </a>
                                                                <p class="kt-widget5__desc">
                                                                    Metronic bootstrap themes.
                                                                </p>
                                                                <div class="kt-widget5__info">
                                                                    <span>Author:</span>
                                                                    <span class="kt-font-info">Fly themes</span>
                                                                    <span>Released:</span>
                                                                    <span class="kt-font-info">23.08.17</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">24,583</span>
                                                                <span class="kt-widget5__sales">sales</span>
                                                            </div>
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">3809</span>
                                                                <span class="kt-widget5__votes">votes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kt-widget5__item">
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__pic">
                                                                <img class="kt-widget7__img" src="/assets/media/products/product11.jpg" alt="">
                                                            </div>
                                                            <div class="kt-widget5__section">
                                                                <a href="#" class="kt-widget5__title">
                                                                    Awesome Mobile App
                                                                </a>
                                                                <p class="kt-widget5__desc">
                                                                    Metronic admin themes.Lorem Ipsum Amet
                                                                </p>
                                                                <div class="kt-widget5__info">
                                                                    <span>Author:</span>
                                                                    <span class="kt-font-info">Fly themes</span>
                                                                    <span>Released:</span>
                                                                    <span class="kt-font-info">23.08.17</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">210,054</span>
                                                                <span class="kt-widget5__sales">sales</span>
                                                            </div>
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">1103</span>
                                                                <span class="kt-widget5__votes">votes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kt-widget5__item">
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__pic">
                                                                <img class="kt-widget7__img" src="/assets/media/products/product6.jpg" alt="">
                                                            </div>
                                                            <div class="kt-widget5__section">
                                                                <a href="#" class="kt-widget5__title">
                                                                    Great Logo Designn
                                                                </a>
                                                                <p class="kt-widget5__desc">
                                                                    Metronic admin themes.
                                                                </p>
                                                                <div class="kt-widget5__info">
                                                                    <span>Author:</span>
                                                                    <span class="kt-font-info">Keenthemes</span>
                                                                    <span>Released:</span>
                                                                    <span class="kt-font-info">23.08.17</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">19,200</span>
                                                                <span class="kt-widget5__sales">sales</span>
                                                            </div>
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">1046</span>
                                                                <span class="kt-widget5__votes">votes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="kt_widget5_tab6_content">
                                                <div class="kt-widget5">
                                                    <div class="kt-widget5__item">
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__pic">
                                                                <img class="kt-widget7__img" src="/assets/media/products/product11.jpg" alt="">
                                                            </div>
                                                            <div class="kt-widget5__section">
                                                                <a href="#" class="kt-widget5__title">
                                                                    Awesome Mobile App
                                                                </a>
                                                                <p class="kt-widget5__desc">
                                                                    Metronic admin themes.Lorem Ipsum Amet
                                                                </p>
                                                                <div class="kt-widget5__info">
                                                                    <span>Author:</span>
                                                                    <span class="kt-font-info">Fly themes</span>
                                                                    <span>Released:</span>
                                                                    <span class="kt-font-info">23.08.17</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">210,054</span>
                                                                <span class="kt-widget5__sales">sales</span>
                                                            </div>
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">1103</span>
                                                                <span class="kt-widget5__votes">votes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kt-widget5__item">
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__pic">
                                                                <img class="kt-widget7__img" src="/assets/media/products/product6.jpg" alt="">
                                                            </div>
                                                            <div class="kt-widget5__section">
                                                                <a href="#" class="kt-widget5__title">
                                                                    Great Logo Designn
                                                                </a>
                                                                <p class="kt-widget5__desc">
                                                                    Metronic admin themes.
                                                                </p>
                                                                <div class="kt-widget5__info">
                                                                    <span>Author:</span>
                                                                    <span class="kt-font-info">Keenthemes</span>
                                                                    <span>Released:</span>
                                                                    <span class="kt-font-info">23.08.17</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">19,200</span>
                                                                <span class="kt-widget5__sales">sales</span>
                                                            </div>
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">1046</span>
                                                                <span class="kt-widget5__votes">votes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kt-widget5__item">
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__pic">
                                                                <img class="kt-widget7__img" src="/assets/media/products/product10.jpg" alt="">
                                                            </div>
                                                            <div class="kt-widget5__section">
                                                                <a href="#" class="kt-widget5__title">
                                                                    Branding Mockup
                                                                </a>
                                                                <p class="kt-widget5__desc">
                                                                    Metronic bootstrap themes.
                                                                </p>
                                                                <div class="kt-widget5__info">
                                                                    <span>Author:</span>
                                                                    <span class="kt-font-info">Fly themes</span>
                                                                    <span>Released:</span>
                                                                    <span class="kt-font-info">23.08.17</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget5__content">
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">24,583</span>
                                                                <span class="kt-widget5__sales">sales</span>
                                                            </div>
                                                            <div class="kt-widget5__stats">
                                                                <span class="kt-widget5__number">3809</span>
                                                                <span class="kt-widget5__votes">votes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end:: Widgets/Best Sellers-->
                            </div>

                        </div>

                        <!--End::Row-->


                        <!--End::Dashboard 1-->
                    </div>

                    <!-- end:: Content -->
                </div>
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

<!-- begin::Sticky Toolbar -->
<ul class="kt-sticky-toolbar kt-hidden" style="margin-top: 30px;">
    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--success" id="kt_demo_panel_toggle" data-toggle="kt-tooltip" title="Check out more demos" data-placement="right">
        <a href="#" class=""><i class="flaticon2-drop"></i></a>
    </li>
    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--brand" data-toggle="kt-tooltip" title="Layout Builder" data-placement="left">
        <a href="https://keenthemes.com/metronic/preview/demo9/builder.html" target="_blank"><i class="flaticon2-gear"></i></a>
    </li>
    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--warning" data-toggle="kt-tooltip" title="Documentation" data-placement="left">
        <a href="https://keenthemes.com/metronic/?page=docs" target="_blank"><i class="flaticon2-telegram-logo"></i></a>
    </li>
    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--danger" id="kt_sticky_toolbar_chat_toggler" data-toggle="kt-tooltip" title="Chat Example" data-placement="left">
        <a href="#" data-toggle="modal" data-target="#kt_chat_modal"><i class="flaticon2-chat-1"></i></a>
    </li>
</ul>

<!-- end::Sticky Toolbar -->

<!-- begin::Demo Panel -->
<div id="kt_demo_panel" class="kt-demo-panel">
    <div class="kt-demo-panel__head">
        <h3 class="kt-demo-panel__title">
            Select A Demo

            <!--<small>5</small>-->
        </h3>
        <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
    </div>
    <div class="kt-demo-panel__body">
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 1
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="/assets/media//demos/preview/demo1.jpg" alt=""/>
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo1/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo1/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 2
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="/assets/media//demos/preview/demo2.jpg" alt=""/>
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo2/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo2/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 3
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="/assets/media//demos/preview/demo3.jpg" alt=""/>
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo3/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo3/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 4
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="/assets/media//demos/preview/demo4.jpg" alt=""/>
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo4/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo4/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 5
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="/assets/media//demos/preview/demo5.jpg" alt=""/>
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo5/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo5/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 6
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="/assets/media//demos/preview/demo6.jpg" alt=""/>
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo6/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo6/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 7
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="/assets/media//demos/preview/demo7.jpg" alt=""/>
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo7/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo7/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 8
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="/assets/media//demos/preview/demo8.jpg" alt=""/>
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo8/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo8/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item kt-demo-panel__item--active">
            <div class="kt-demo-panel__item-title">
                Demo 9
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="/assets/media//demos/preview/demo9.jpg" alt=""/>
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo9/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo9/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 10
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="/assets/media//demos/preview/demo10.jpg" alt=""/>
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo10/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo10/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 11
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="/assets/media//demos/preview/demo11.jpg" alt=""/>
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo11/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo11/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 12
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="/assets/media//demos/preview/demo12.jpg" alt=""/>
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo12/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo12/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 13
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="/assets/media//demos/preview/demo13.jpg" alt=""/>
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 14
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="/assets/media//demos/preview/demo14.jpg" alt=""/>
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                </div>
            </div>
        </div>
        <a href="https://1.envato.market/EA4JP" target="_blank" class="kt-demo-panel__purchase btn btn-brand btn-elevate btn-bold btn-upper">
            Buy Metronic Now!
        </a>
    </div>
</div>

<!-- end::Demo Panel -->

<!--Begin:: Chat-->
<div class="modal fade- modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="kt-chat">
                <div class="kt-portlet kt-portlet--last">
                    <div class="kt-portlet__head">
                        <div class="kt-chat__head ">
                            <div class="kt-chat__left">
                                <div class="kt-chat__label">
                                    <a href="#" class="kt-chat__title">Jason Muller</a>
                                    <span class="kt-chat__status">
												<span class="kt-badge kt-badge--dot kt-badge--success"></span> Active
											</span>
                                </div>
                            </div>
                            <div class="kt-chat__right">
                                <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="flaticon-more-1"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-md">

                                        <!--begin::Nav-->
                                        <ul class="kt-nav">
                                            <li class="kt-nav__head">
                                                Messaging
                                                <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-group"></i>
                                                    <span class="kt-nav__link-text">New Group</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-open-text-book"></i>
                                                    <span class="kt-nav__link-text">Contacts</span>
                                                    <span class="kt-nav__link-badge">
																<span class="kt-badge kt-badge--brand  kt-badge--rounded-">5</span>
															</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-bell-2"></i>
                                                    <span class="kt-nav__link-text">Calls</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-dashboard"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-protected"></i>
                                                    <span class="kt-nav__link-text">Help</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__foot">
                                                <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                                <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                            </li>
                                        </ul>

                                        <!--end::Nav-->
                                    </div>
                                </div>
                                <button type="button" class="btn btn-clean btn-sm btn-icon" data-dismiss="modal">
                                    <i class="flaticon2-cross"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-scroll kt-scroll--pull" data-height="410" data-mobile-height="300">
                            <div class="kt-chat__messages kt-chat__messages--solid">
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="/assets/media/users/100_12.jpg" alt="image">
												</span>
                                        <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                        <span class="kt-chat__datetime">2 Hours</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        How likely are you to recommend our company<br> to your friends and family?
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
													<img src="/assets/media/users/300_21.jpg" alt="image">
												</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Hey there, we’re just writing to let you know that you’ve<br> been subscribed to a repository on GitHub.
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="/assets/media/users/100_12.jpg" alt="image">
												</span>
                                        <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Ok, Understood!
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">Just Now</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
													<img src="/assets/media/users/300_21.jpg" alt="image">
												</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        You’ll receive notifications for all issues, pull requests!
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="/assets/media/users/100_12.jpg" alt="image">
												</span>
                                        <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                        <span class="kt-chat__datetime">2 Hours</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        You were automatically <b class="kt-font-brand">subscribed</b> <br>because you’ve been given access to the repository
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
													<img src="/assets/media/users/300_21.jpg" alt="image">
												</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        You can unwatch this repository immediately <br>by clicking here: <a href="#" class="kt-font-bold kt-link"></a>
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="/assets/media/users/100_12.jpg" alt="image">
												</span>
                                        <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Discover what students who viewed Learn <br>Figma - UI/UX Design Essential Training also viewed
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">Just Now</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
													<img src="/assets/media/users/300_21.jpg" alt="image">
												</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Most purchased Business courses during this sale!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-chat__input">
                            <div class="kt-chat__editor">
                                <textarea placeholder="Type here..." style="height: 50px"></textarea>
                            </div>
                            <div class="kt-chat__toolbar">
                                <div class="kt_chat__tools">
                                    <a href="#"><i class="flaticon2-link"></i></a>
                                    <a href="#"><i class="flaticon2-photograph"></i></a>
                                    <a href="#"><i class="flaticon2-photo-camera"></i></a>
                                </div>
                                <div class="kt_chat__actions">
                                    <button type="button" class="btn btn-brand btn-md  btn-font-sm btn-upper btn-bold kt-chat__reply">reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--ENd:: Chat-->

<!-- begin::Global Config(global config for global JS sciprts) -->
<?php $this->load->view('shared/js_all') ?>
<script src="/assets/js/home.js" type="text/javascript"></script>
<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
