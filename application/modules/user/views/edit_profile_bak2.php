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

        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor course_content_table" id="kt_content">

          <!-- begin:: Subheader -->


          <!-- end:: Subheader -->

          <!-- begin:: Content -->
          <div class="kt-container  kt-grid__item kt-grid__item--fluid">
            <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

              <!--Begin:: App Aside Mobile Toggle-->
              <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                <i class="la la-close"></i>
              </button>

              <!--End:: App Aside Mobile Toggle-->

              <!--Begin:: App Aside-->
              <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">

                <!--begin:: Widgets/Applications/User/Profile1-->
                <div class="kt-portlet kt-portlet--height-fluid-">
                  <div class="kt-portlet__head  kt-portlet__head--noborder">


                  </div>
                  <div class="kt-portlet__body kt-portlet__body--fit-y">

                    <!--begin::Widget -->
                    <div class="kt-widget kt-widget--user-profile-1">
                      <div class="kt-widget__head">
                        <div class="kt-widget__media">
                          <img src="<?=!empty($the_user->profile_img)?'/uploads/'.$the_user->profile_img:'/assets/media/users/default.jpg';?>" alt="image">
                        </div>
                        <div class="kt-widget__content">
                          <div class="kt-widget__section">
                            <a href="#" class="kt-widget__username">
                              <?= $the_user->first_name . '&nbsp;' . $the_user->last_name; ?>

                            </a>

                          </div>

                        </div>
                      </div>
                      <div class="kt-widget__body">
                        <div class="kt-widget__content">
                          <div class="kt-widget__info">
                            <span class="kt-widget__label">Email:</span>
                            <span href="#" class="kt-widget__data"><?= $the_user->email ?></span>
                          </div>
                          <!--                          <div class="kt-widget__info">-->
                          <!--                            <span class="kt-widget__label">Phone:</span>-->
                          <!--                            <a href="#" class="kt-widget__data">--><? //= $the_user->phone ?><!--</a>-->
                          <!--                          </div>-->
                        </div>
                        <div class="kt-widget__items">
                          <a href="<?= base_url('u/profile') ?>" class="kt-widget__item">
															<span class="kt-widget__section">
																<span class="kt-widget__icon">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"/>
																			<path
                                          d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                          fill="#000000" fill-rule="nonzero"/>
																			<path
                                          d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                          fill="#000000" opacity="0.3"/>
																		</g>
																	</svg> </span>
																<span class="kt-widget__desc">
																	Profile Overview
																</span>
															</span>
                          </a>
                          <a href="<?= base_url('u/edit_profile') ?>" class="kt-widget__item kt-widget__item--active">
															<span class="kt-widget__section">
																<span class="kt-widget__icon">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"/>
																			<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																			<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                            fill="#000000" fill-rule="nonzero"/>
																		</g>
																	</svg> </span>
																<span class="kt-widget__desc">
																	Kullanici bilgileri
																</span>
															</span>
                          </a>
                          <!--                          <a href="custom/apps/user/profile-1/account-information.html" class="kt-widget__item ">-->
                          <!--															<span class="kt-widget__section">-->
                          <!--																<span class="kt-widget__icon">-->
                          <!--																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">-->
                          <!--																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                          <!--																			<rect x="0" y="0" width="24" height="24"/>-->
                          <!--																			<path-->
                          <!--                                          d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"-->
                          <!--                                          fill="#000000" opacity="0.3"/>-->
                          <!--																			<path-->
                          <!--                                          d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"-->
                          <!--                                          fill="#000000"/>-->
                          <!--																		</g>-->
                          <!--																	</svg>-->
                          <!--                                </span>-->
                          <!--																<span class="kt-widget__desc">-->
                          <!--																	Account Information-->
                          <!--																</span>-->
                          <!--                                                                </span>-->
                          <!---->
                          <!--                          </a>-->
                          <!--                          <a href="custom/apps/user/profile-1/change-password.html" class="kt-widget__item ">-->
                          <!--															<span class="kt-widget__section">-->
                          <!--																<span class="kt-widget__icon">-->
                          <!--																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">-->
                          <!--																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                          <!--																			<rect x="0" y="0" width="24" height="24"/>-->
                          <!--																			<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"-->
                          <!--                                            fill="#000000" opacity="0.3"/>-->
                          <!--																			<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"/>-->
                          <!--																			<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"-->
                          <!--                                            fill="#000000" opacity="0.3"/>-->
                          <!--																		</g>-->
                          <!--																	</svg> </span>-->
                          <!--																<span class="kt-widget__desc">-->
                          <!--																	Change Passwort-->
                          <!--																</span>-->
                          <!--															</span>-->
                          <!--                            <span class="kt-badge kt-badge--unified-danger kt-badge--sm kt-badge--rounded kt-badge--bolder">5</span>-->
                          <!--                          </a>-->
                          <!--                          <a href="custom/apps/user/profile-1/email-settings.html" class="kt-widget__item ">-->
                          <!--															<span class="kt-widget__section">-->
                          <!--																<span class="kt-widget__icon">-->
                          <!--																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">-->
                          <!--																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                          <!--																			<rect x="0" y="0" width="24" height="24"/>-->
                          <!--																			<path-->
                          <!--                                          d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z"-->
                          <!--                                          fill="#000000" opacity="0.3"/>-->
                          <!--																			<path-->
                          <!--                                          d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z"-->
                          <!--                                          fill="#000000"/>-->
                          <!--																		</g>-->
                          <!--																	</svg> </span>-->
                          <!--																<span class="kt-widget__desc">-->
                          <!--																	Email settings-->
                          <!--																</span>-->
                          <!--															</span>-->
                          <!--                          </a>-->
                          <!--                          <a href="#" class="kt-widget__item" data-toggle="kt-tooltip" title="Coming soon..." data-placement="right">-->
                          <!--															<span class="kt-widget__section">-->
                          <!--																<span class="kt-widget__icon">-->
                          <!--																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">-->
                          <!--																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                          <!--																			<rect x="0" y="0" width="24" height="24"/>-->
                          <!--																			<rect fill="#000000" x="2" y="5" width="19" height="4" rx="1"/>-->
                          <!--																			<rect fill="#000000" opacity="0.3" x="2" y="11" width="19" height="10" rx="1"/>-->
                          <!--																		</g>-->
                          <!--																	</svg> </span>-->
                          <!--																<span class="kt-widget__desc">-->
                          <!--																	Saved Credit Cards-->
                          <!--																</span>-->
                          <!--															</span>-->
                          <!--                          </a>-->
                          <!--                          <a href="#" class="kt-widget__item" data-toggle="kt-tooltip" title="Coming soon..." data-placement="right">-->
                          <!--															<span class="kt-widget__section">-->
                          <!--																<span class="kt-widget__icon">-->
                          <!--																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">-->
                          <!--																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                          <!--																			<polygon points="0 0 24 0 24 24 0 24"/>-->
                          <!--																			<path-->
                          <!--                                          d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"-->
                          <!--                                          fill="#000000" fill-rule="nonzero" opacity="0.3"/>-->
                          <!--																			<rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>-->
                          <!--																			<rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>-->
                          <!--																		</g>-->
                          <!--																	</svg> </span>-->
                          <!--																<span href="#" class="kt-widget__desc">Tax information</span>-->
                          <!--															</span>-->
                          <!--                            <span class="kt-badge kt-badge--unified-brand kt-badge--inline kt-badge--bolder">new</span>-->
                          <!--                          </a>-->
                          <!--                          <a href="#" class="kt-widget__item" data-toggle="kt-tooltip" title="Coming soon..." data-placement="right">-->
                          <!--															<span class="kt-widget__section">-->
                          <!--																<span class="kt-widget__icon">-->
                          <!--																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">-->
                          <!--																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                          <!--																			<rect x="0" y="0" width="24" height="24"/>-->
                          <!--																			<rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"/>-->
                          <!--																			<path-->
                          <!--                                          d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L12.5,10 C13.3284271,10 14,10.6715729 14,11.5 C14,12.3284271 13.3284271,13 12.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"-->
                          <!--                                          fill="#000000" opacity="0.3"/>-->
                          <!--																		</g>-->
                          <!--																	</svg> </span>-->
                          <!--																<span class="kt-widget__desc">-->
                          <!--																	Statements-->
                          <!--																</span>-->
                          <!--															</span>-->
                          <!--                          </a>-->
                        </div>
                      </div>
                    </div>

                    <!--end::Widget -->
                  </div>
                </div>

                <!--end:: Widgets/Applications/User/Profile1-->
              </div>

              <!--End:: App Aside-->

              <!--Begin:: App Content-->
              <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                <div class="row">
                  <div class="col-md-12">

                    <!--begin:: Widgets/Order Statistics-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                      <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                          <h3 class="kt-portlet__head-title">
                            Kullanici bilgileri
                          </h3>
                        </div>

                      </div>
                      <div class="kt-portlet__body kt-portlet__body--fluid">
                        <div class="kt-widget12">
                          <div class="kt-widget12__content">
                            <div class="row">
                              <div class="col-md-12">

                                <!--begin::Portlet-->
                                <div class="kt-portlet">
                                  <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon-edit-1"></i>
										</span>
                                      <h3 class="kt-portlet__head-title">
                                        <?= lang('edit_user') ?>
                                      </h3>
                                    </div>
                                  </div>


                                  <!--begin::Form-->
                                  <form id="add_user_form" class="kt-form kt-form--label-right" autocomplete="off">
                                    <input id="user_id" name="id" type="hidden" value="<?php echo empty($the_user) ? '' : $the_user->user_id; ?>">
                                    <div class="kt-portlet__body">


                                      <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label"><?= lang('edit_user_profile_picture') ?></label>
                                        <div class="col-10">
                                          <img id="add_user_img" src="/uploads/thumb_<?= !empty($the_user->profile_img) ? $the_user->profile_img : 'default.jpg' ?>">
                                        </div>
                                      </div>

                                      <div class="form-group form-group-last row <?= empty($the_user) ? 'kt-hidden' : '' ?>">
                                        <label class="col-lg-2 col-form-label"><?= lang('edit_user_upload_files:') ?></label>
                                        <div class="col-lg-10">
                                          <div class="dropzone dropzone-multi" id="kt_dropzone_5">
                                            <div class="dropzone-panel">
                                              <a class="dropzone-select btn btn-label-brand btn-bold btn-sm"><?= lang('edit_user_button_attach_files') ?></a>
                                              <a class="dropzone-upload btn btn-label-brand btn-bold btn-sm"><?= lang('edit_user_button_upload_all') ?></a>
                                              <a class="dropzone-remove-all btn btn-label-brand btn-bold btn-sm"><?= lang('edit_user_button_remove_all') ?></a>
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
                                          <span class="form-text text-muted"><?= lang('edit_user_file_comment') ?></span>
                                        </div>
                                      </div>


                                      <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label"><?= lang('edit_user_first_name') ?></label>
                                        <div class="col-10">
                                          <input name="first_name" class="form-control" type="text" value="<?php echo empty($the_user) ? '' : $the_user->first_name; ?>" id="example-text-input">
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label"><?= lang('edit_user_last_name') ?></label>
                                        <div class="col-10">
                                          <input readonly onfocus="if (this.hasAttribute('readonly')) {this.removeAttribute('readonly'); this.blur(); this.focus(); }" name="last_name" class="form-control" type="search" value="<?php echo empty($the_user) ? '' : $the_user->last_name; ?>" id="example-search-input">
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <label for="email" class="col-2 col-form-label"><?= lang('edit_user_email') ?></label>
                                        <div class="col-10">
                                          <input class="form-control" type="text" placeholder="<?php echo empty($the_user) ? '' : $the_user->email; ?>" id="email" disabled="disabled">
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <label for="password" class="col-2 col-form-label"><?= lang('edit_user_password') ?></label>
                                        <div class="col-10">
                                          <input name="password" class="form-control" type="password" value="" id="password">
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <label for="password_confirm" class="col-2 col-form-label"><?= lang('edit_user_password_confirm') ?></label>
                                        <div class="col-10">
                                          <input name="password_confirm" class="form-control" type="password" value="" id="password_confirm">
                                        </div>
                                      </div>

                                     

                                      

                                    </div>
                                    <div class="kt-portlet__foot">
                                      <div class="kt-form__actions">
                                        <div class="row">
                                          <div class="col-12">
                                            <button id="add_user_submit" type="reset" class="btn btn-success pull-right"><?= lang('edit_user_button_submit') ?></button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  </form>


                                </div>

                                <!--end::Portlet-->
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

                </div>

              </div>

              <!--End:: App Content-->
            </div>


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


<div class="modal fade scroller_modal_test" id="test_result_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Test Sonuclari</h5>
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


<!-- begin::Global Config(global config for global JS sciprts) -->
<?php $this->load->view('shared/js_all') ?>
<script src="/assets/js/edit_profile.1.0.js" type="text/javascript"></script>
<script src="/aassets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
<!--end::Global Theme Bundle -->

<!--begin::Page Scripts(used by this page) -->
<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
