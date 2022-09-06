<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('shared/head_start'); ?>
<!--<link href="/node_modules/video.js/dist/video-js.min.css" rel="stylesheet">-->
<!--<script src="/node_modules/video.js/dist/video.min.js"></script>-->

<?php $this->load->view('shared/css_all'); ?>
<link href="/assets/plugins/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css"/>
<link href="/assets/css/play.css" rel="stylesheet" type="text/css"/>
<!--<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">-->
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


            <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">

            </div>
          </div>

          <!-- end: Header Menu -->

          <!-- begin:: Brand -->
          <div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
            <a class="kt-header__brand-logo" href="<?=base_url()?>">
              <img style="height: 38px" alt="Logo" src="/assets/media/logos/logo_sol_sag_2.png"/>
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
            <div class="kt-header__topbar-item dropdown kt-hidden">
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
<!--                            <img src="/assets/media/products/product9.jpg" title="">-->
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
            <div class="kt-header__topbar-item kt-header__topbar-item--langs kt-hidden">
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

        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

          <!-- begin:: Subheader -->


          <!-- end:: Subheader -->

          <!-- begin:: Content -->
          <div class="kt-grid__item kt-grid__item--fluid">


              <!--Begin::Dashboard 1-->

              <!--Begin::Row-->
              <div class="row" style="width: 100%; margin-right: 0px; margin-left: 0px;">
                  <div class="kt-portlet kt-portlet--height-fluid" style="width: 100%;">
                      <div class="kt-portlet__body kt-portlet__body--fit">
                          <!--begin::Widget -->
                          <div class="kt-widget kt-widget--project-1">



                              <div id="video_player_div" class="kt-widget__body p-0">
                                  <div class="play_course_title"><span><?= $course->title; ?></span></div>


<!--                                  <div class="media_title"></div>-->
<!--                                      <ul class="kt-sticky-toolbar">-->
<!--                                        <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--success" id="kt_demo_panel_toggle">-->
<!--                                          <a href="#" class="">-->
<!--                                              <i class="flaticon2-left-arrow ">-->
<!--                                                  <span> Kurs İçeriği</span>-->
<!--                                              </i>-->
<!--                                          </a>-->
<!--                                        </li>-->
<!--                                      </ul>-->




                                  <button class="button_toolbar" type="button" id="kt_demo_panel_toggle">
                                <span>
                                   <i class="flaticon2-left-arrow ">
                                   </i>
                                </span>
                                      <span> Kurs İçeriği</span>

                                  </button>



                                      <video
                                              id="lecture_video_player"
                                              class="video-js vjs-paused vjs-controls-enabled vjs-big-play-centered vjs-user-active row-full kt-hidden"
                                              controls
                                              preload="auto"
                                              data-setup="{}"
                                      >
                                          <p class="vjs-no-js">
                                              To view this video please enable JavaScript, and consider upgrading to a
                                              web browser that
                                              <a href="https://videojs.com/html5-video-support/" target="_blank"
                                              >supports HTML5 video</a
                                              >
                                          </p>
                                      </video>



                                      <div id="youtube_player" class="row-full">

                                          <iframe id="youtube_player" class="row-full "
                                                  frameborder="0" allowfullscreen="1"
                                                  allow="autoplay; encrypted-media; gyroscope; picture-in-picture "
                                                  title="YouTube video player" width="1548" height="1188"
                                                  src="">
                                          </iframe>

                                      </div>

                              </div>



<!--                              <div class="kt-widget__footer ask_and_question_footer" style="min-width: 483px">-->
                              <div class="kt-widget__footer ask_and_question_footer">
                                  <div class="kt-widget__wrapper col-xl-8">


                                      <div class="col-xl-12">
                                          <!--begin:: Widgets/Support Tickets -->


                          <div class="kt-portlet kt-portlet--tabs">
                            <div class="kt-portlet__head">
                              <div class="kt-portlet__head-toolbar">
                                <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-info nav-tabs-line-2x nav-tabs-line-right" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_portlet_base_demo_2_2_tab_content" role="tab" aria-selected="true">
                                      <i class="" aria-hidden="true"></i>Questoins and Answers
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_1_tab_content" role="tab" aria-selected="false">
                                      <i class="" aria-hidden="true"></i>Overview
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_3_3_tab_content" role="tab" aria-selected="false">
                                      <i class="" aria-hidden="true"></i>Açıklama
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            <div class="kt-portlet__body">
                              <div class="tab-content">
                                <div class="tab-pane" id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                                  <div class="kt-portlet__body">
                                    <div class="kt-widget3">
                                      <div class="row kt-widget3__item kt-pb-20">
                                        <div class="col-md-12">
                                          <div class="kt-widget3__info">
                                            <span class="kt-widget3__time">Bu Kurs Hakkında</span>
                                            <p><?= $course->description?></p>
                                            <span class="kt-widget3__time"></span>
                                          </div>
                                        </div>

                                      </div>
                                      <div class="row kt-widget3__item kt-pb-20 kt-pt20">
                                        <div class="col-md-2">
                                          <div class="kt-widget3__info">
                                            <span class="kt-widget3__time">Sayıya göre</span>
                                          </div>
                                        </div>
                                        <div class="col-md-10">
                                          <div class="kt-widget3__text row kt-pb-5 kt-pl10">Yetkinlik düzeyi: Başlangıç Düzeyi</div>
                                          <div class="kt-widget3__text row kt-pb-5 kt-pl10">Diller: Türkçe</div>
                                          <div class="kt-widget3__text row kt-pb-5 kt-pl10">Altyazılar: Hayır</div>
                                          <div class="kt-widget3__text row kt-pb-5 kt-pl10">Dersler: <?= $course->total_lectures?></div>
                                          <div class="kt-widget3__text row kt-pb-5 kt-pl10">Süre: <?= $course->course_duration ?></div>
                                        </div>
                                      </div>
                                      <div class="row kt-widget3__item kt-pb-20 kt-pt20 kt-hidden">
                                        <div class="col-md-2">
                                          <div class="kt-widget3__info">
                                            <span class="kt-widget3__time">Özellikler</span>
                                          </div>
                                        </div>
                                        <div class="row col-md-10">

                                          <div class="kt-widget3__text kt-pb-5 kt-pl10 col-md-6">iOS ve Android uygulamalarında mevcuttur</div>
                                          <div class="kt-widget3__text kt-pb-5 kt-pl10 col-md-6">Bitirme sertifikası</div>

                                        </div>
                                      </div>
                                      <div class="row kt-widget3__item kt-pb-20 kt-pt20 kt-hidden">
                                        <div class="col-md-2">
                                          <div class="kt-widget3__info">
                                            <span class="kt-widget3__time">Açıklama</span>
                                          </div>
                                        </div>
                                        <div class="col-md-10 kt-pl0">
                                          <p class="kt-widget3__text col-md-8">Sıfırdan ReactJS ve Context Api kursuna hoşgeldiniz!

                                            Bu kursta Javascriptin React kütüphanesini ve State Management için kullanılan Context Api Mimarisi öğrenerek ilk uygulamanızı oluşturacaksınız.

                                            Bu kurs Yazılım Bilimi kanalında yayınlanan React serisinin Udemy üzerindeki halidir ve tamamen ücretsizdir. React öğrenmek isteyen arkadaşlarınız varsa kursu onlarla da paylaşıp aramıza davet
                                            edebilirsiniz.

                                            Kurs'a Başlamak İçin Bilmen Gerekenler

                                            1. İyi bir javascript ve ES6+ bilgisi

                                            2. Temel HTML Bilgisi (CSS ve Bootstrap Bilgisi de Tavsiye Edilir)

                                            3. Güçlü Öğrenme Arzusu</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                </div>
                                <div class="tab-pane active" id="kt_portlet_base_demo_2_2_tab_content" role="tabpanel">

                                  <div class="kt-portlet__body">


                                    <div class="input-group col-xl-12 kt-pb-10 kt-pt-0 kt-pl0" style="padding-right: 1px">
                                      <input type="text" id="search_input"  class="form-control" placeholder="Seach question">
                                      <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" id="search_btn">Search</button>
                                      </div>
                                    </div>


                                    <div class="row kt-pl0 kt-pb-50">


                                      <div class="col-md-4">
                                          <div class="form-group row">
                                              <div class=" col-lg-12 col-md-12 col-sm-12">
                                                  <select class="form-control kt-select2" id="question_lecture_selector" name="qls">
                                                      <option value="all" selected>Tum dersler</option>
                                                      <option value="current_lecture">Gecerli Ders </option>
                                                    <? foreach ($course->sections as $section): ?>
                                                      <optgroup label="<?= $section->name; ?>">
                                                        <? foreach ($section->lectures as $lecture): ?>
                                                            <option value="<?= $lecture->id; ?>"><?= $lecture->name ?></option>
                                                        <? endforeach; ?>
                                                      </optgroup>
                                                    <?endforeach;?>
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                            <div class="form-group row">
                                                <div class=" col-lg-12 col-md-12 col-sm-12">
                                                    <select class="form-control kt-select2" id="order_by" name="qls">
                                                        <option value="oldest">En eski </option>
                                                        <option value="newest">En Yeni</option>
                                                        <option value="most_like">Cok begenilen</option>
                                                        <option value="less_like">Az Begenilen</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                      <div class="col-md-4">
                                          <div class="form-group row">
                                              <div class=" col-lg-12 col-md-12 col-sm-12">
                                                  <select class="form-control kt-select2" id="filter_by" name="param" multiple="multiple" name="qls">
                                                          <option value="my_questions">Sorduğum sorular</option>
                                                          <option value="unanswered_questions">Cevaplanmamış sorular</option>
                                                  </select>
                                              </div>
                                          </div>
                                        </div>


                                    </div>


                                    <div class="row kt-pl10 kt-pb-50">


                                      <div class="col-md-12">
                                        <div class="pull-left kt-pl0 kt-pt9 ask_and_question_count">
                                            <span>
                                                <span id="this_course_media_title"></span>
                                                <span class="ask_and_question_count_comment">
                                                     kursunda <span id="question_count">0</span> soru mevcut
                                                </span>
                                            </span>
                                        </div>


                                        <button class="pull-right kt-mr-0" id="ask_question_btn">
                                          <span>Yeni bir soru sorun</span><i class="flaticon2-chat-2 kt-pl5"></i>
                                        </button>
                                      </div>


                                    </div>


                                    <div class="row kt-pb-30 kt-pl0 kt-pr0 kt-hidden" data-course_code="<?= $course->course_code ?>" id="yasuo_div">
                                      <div class="col-md-12">
                                        <div id="summernote_div"></div>
                                      </div>

                                      <div class="col-md-12">
                                        <div class="kt-section__content kt-section__content--solid kt-align-right kt-pt15 kt-pb30">

                                          <button id="send_question_close_btn" type="button" class="btn btn-warning">Iptal</button>

                                          <button data-course_code="<?= $course->course_code; ?>" data-type="0" id="send_question_btn" type="button" class="btn btn-success">Gonder</button>

                                        </div>
                                      </div>


                                    </div>
  
  
                                    <div class="kt-widget3" id="qa_div">
  
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane" id="kt_portlet_base_demo_3_3_tab_content" role="tabpanel">
                                  <div class="kt-portlet__body">
                                    <div class="kt-widget3">
                                      <div class="row kt-widget3__item kt-pb-20">
                                        <div class="col-md-12">
                                          <div class="kt-widget3__info">
                                            <span class="kt-widget3__time">Açıklama</span>
                                            <p></p>
                                            <span class="kt-widget3__time" id="lecture_desc"></span>
                                          </div>
                                        </div>
            
                                      </div>
                                    </div>
                                  </div>
                                  <!--                                  <div class="kt-portlet__body">-->
                                  <!--                                    <div class="kt-widget3">-->
                                  <!--                                      <div class="kt-widget3__item">-->
                                  <!--                                        <div class="kt-widget3__header">-->
                                  <!--                                          <div class="kt-widget3__user-img">-->
                                  <!--                                            <img class="kt-widget3__img" src="/assets/media/users/user1.jpg" alt="">-->
                                  <!--                                          </div>-->
                                  <!--                                          <div class="kt-widget3__info">-->
                                  <!--                                            <a href="#" class="kt-widget3__username">Sinan Trump</a><br>-->
                                  <!--                                            <span class="kt-widget3__time">2 day ago</span>-->
                                  <!--                                          </div>-->
                                  <!--                                          <span class="kt-widget3__status kt-font-info">Pending</span>-->
                                  <!--                                        </div>-->
                                  <!--                                        <div class="kt-widget3__body">-->
                                  <!--                                          <p class="kt-widget3__text">Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.</p>-->
                                  <!--                                        </div>-->
                                  <!--                                      </div>-->
                                  <!--                                      <div class="kt-widget3__item">-->
                                  <!--                                        <div class="kt-widget3__header">-->
                                  <!--                                          <div class="kt-widget3__user-img">-->
                                  <!--                                            <img class="kt-widget3__img" src="/assets/media/users/user4.jpg" alt="">-->
                                  <!--                                          </div>-->
                                  <!--                                          <div class="kt-widget3__info">-->
                                  <!--                                            <a href="#" class="kt-widget3__username">Dinçer King James</a><br>-->
                                  <!--                                            <span class="kt-widget3__time">1 day ago</span>-->
                                  <!--                                          </div>-->
                                  <!--                                          <span class="kt-widget3__status kt-font-brand">Open</span>-->
                                  <!--                                        </div>-->
                                  <!--                                        <div class="kt-widget3__body">-->
                                  <!--                                          <p class="kt-widget3__text">Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.Ut wisi enim ad minim veniam,quis-->
                                  <!--                                            nostrud exerci tation ullamcorper.</p>-->
                                  <!--                                        </div>-->
                                  <!--                                      </div>-->
                                  <!--                                      <div class="kt-widget3__item">-->
                                  <!--                                        <div class="kt-widget3__header">-->
                                  <!--                                          <div class="kt-widget3__user-img">-->
                                  <!--                                            <img class="kt-widget3__img" src="/assets/media/users/user5.jpg" alt="">-->
                                  <!--                                          </div>-->
                                  <!--                                          <div class="kt-widget3__info">-->
                                  <!--                                            <a href="#" class="kt-widget3__username">Boşluğa bakan oyuncu</a><br>-->
                                  <!--                                            <span class="kt-widget3__time">3 weeks ago</span>-->
                                  <!--                                          </div>-->
                                  <!--                                          <span class="kt-widget3__status kt-font-success">Closed</span>-->
                                  <!--                                        </div>-->
                                  <!--                                        <div class="kt-widget3__body">-->
                                  <!--                                          <p class="kt-widget3__text">Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.</p>-->
                                  <!--                                        </div>-->
                                  <!--                                      </div>-->
                                  <!--                                    </div>-->
                                  <!--                                  </div>-->
                                </div>
                              </div>
                            </div>
                          </div>
  
  
                          <!--end:: Widgets/Support Tickets -->            </div>


                      </div>
                    </div>


                  </div>
                  <!--end::Widget -->
                </div>
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


<!-- end::Sticky Toolbar -->

<!-- begin::Demo Panel -->
<div id="kt_demo_panel" class="kt-demo-panel">
  <div class="kt-demo-panel__head">
    <h3 class="kt-demo-panel__title kt-pt10 kt-pl10">
      Kurs içeriği

      <!--<small>5</small>-->
    </h3>
    <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
  </div>
  <div class="kt-demo-panel__body kt-pr0 kt-mr-0">


    <div class="kt-demo-panel__item">
      <div class="accordion accordion-light  accordion-toggle-arrow" id="sections_list">
        <? foreach ($course->sections as $section): ?>
          <? if (!isset($section->lectures)) {
            continue;
          } ?>
            <div class="card">
                <div class="card-header" id="_<?= $section->id ?>" data-toggle="collapse" data-target="#s<?= $section->id ?>">
                    <div class="card-title <?= $section->id === $last_pbeat->section_id ? ' ' : 'collapsed' ?> kt-pb-0" data-toggle="collapse" data-target="#s<?= $section->id ?>" aria-expanded="false" aria-controls="s<?= $section->id ?>">
                        <span><?= $section->name ?></span>

                    </div>
                    <span class="pull-left"><small><?= !empty($section->media_duration) ? $section->media_duration : '' ?></small></span>
                </div>
                <div id="s<?= $section->id ?>" class="collapse<?= $section->id === $last_pbeat->section_id ? ' show' : '' ?>" aria-labelledby="_<?= $section->id ?>" data-parent="">

                    <div class="card-body kt-pt10">
                        <div class="kt-notification kt-notification--fit">
                  
                          <? foreach ($section->lectures as $lecture): ?>
                    <? if (!isset($lecture->media_type, $lecture->media_url, $lecture->name, $lecture->id, $lecture->media_duration)) {
                      continue;
                    } ?>
                    <a href="javascript:"
                       data-type="<?= $lecture->media_type ?>"
                       data-media="<?= $lecture->media_url ?>"
                       data-media_title="<?= $lecture->name ?>"
                       data-lid="<?= $lecture->id ?>"
                       class="kt-notification__item lecture_box<?= $lecture->id === $last_pbeat->lid ? ' playNow' : '' ?>">
                      <div class="kt-notification__item-icon">
                        <i class="flaticon2-arrow"></i>
                      </div>
                      <div class="kt-notification__item-details">
                        <div class="kt-notification__item-title">
                          <?= $lecture->name ?>
                          <label class="kt-checkbox pull-right">
                            <input type="checkbox" class="lcb">
                            <span></span>
                          </label>
                        </div>
                        <div class="kt-notification__item-time">
                            <?= $lecture->media_duration ? "<i class='flaticon2-crisp-icons-1'></i>" : '' ?>
                            &nbsp;<?= $lecture->media_duration ?>
                        </div>
                      </div>
                    </a>
                  <? endforeach; ?>
                </div>
              </div>

            </div>
          </div>
        <? endforeach; ?>

        <div class="card"></div>

      </div>

    </div>



  </div>
</div>
<!-- end::Demo Panel -->


<!--begin::modal-->
<div class="modal fade scroller_modal_test" id="test_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="test_modal_title">Test</h5>&nbsp;&nbsp;&nbsp;&nbsp;
        <p id="test_stats"></p>
          <button type="button" class="btn btn-sm btn-info" id="reset_test_btn">Testi sıfırla</button>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
       
      </div>
      <div class="modal-body kt-portlet" style="margin-bottom: 0px">


        <div id="test_div">

        </div>


      </div>
    </div>
  </div>
</div>

<!--end::modal-->


<!-- begin::Global Config(global config for global JS sciprts) -->
<?php $this->load->view('shared/js_all') ?>

<script src="/assets/js/confetti.min.js" type="text/javascript"></script>
<script src="/assets/js/play.3.3.js" type="text/javascript"></script>
<script>

    $('#kt_header_mobile > div.kt-header-mobile__logo > a > img').attr('src','/assets/media/logos/logo_sol_sag_2.png');

</script>
<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
