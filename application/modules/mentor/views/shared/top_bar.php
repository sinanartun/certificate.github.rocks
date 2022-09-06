<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><div class="kt-header__topbar">
  
  <!--begin: Search -->
  
  <!--begin: Search -->

  
  <!--end: Search -->
  
  <!--end: Search -->
  
  <!--begin: Notifications -->
  <div class="kt-header__topbar-item dropdown">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
									<span id="top_info_icon" class="kt-header__topbar-icon kt-pulse kt-pulse--brand">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
												<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
											</g>
										</svg> <span class="kt-pulse__ring"></span>
									</span>


      <!--
    Use dot badge instead of animated pulse effect:
    <span class="kt-badge kt-badge--dot kt-badge--notify kt-badge--sm kt-badge--brand"></span>
-->
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">
      <form>
        
        <!--begin: Head -->
        <div class="kt-head kt-head--skin-dark kt-head--fit-x kt-head--fit-b" style="background-image: url(/./aassets/media/misc/bg-1.jpg)">
          <h3 class="kt-head__title">
            User Notifications
            &nbsp;
            <span class="btn btn-success btn-sm btn-bold btn-font-md">23 new</span>
          </h3>
          <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success kt-notification-item-padding-x" role="tablist">
            <li class="nav-item">
              <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">Alerts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#topbar_notifications_events" role="tab" aria-selected="false">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs" role="tab" aria-selected="false">Logs</a>
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
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon2-box-1 kt-font-brand"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    New customer is registered
                  </div>
                  <div class="kt-notification__item-time">
                    3 hrs ago
                  </div>
                </div>
              </a>
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon2-chart2 kt-font-danger"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    Application has been approved
                  </div>
                  <div class="kt-notification__item-time">
                    3 hrs ago
                  </div>
                </div>
              </a>
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon2-image-file kt-font-warning"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    New file has been uploaded
                  </div>
                  <div class="kt-notification__item-time">
                    5 hrs ago
                  </div>
                </div>
              </a>
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon2-drop kt-font-info"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    New user feedback received
                  </div>
                  <div class="kt-notification__item-time">
                    8 hrs ago
                  </div>
                </div>
              </a>
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    System reboot has been successfully completed
                  </div>
                  <div class="kt-notification__item-time">
                    12 hrs ago
                  </div>
                </div>
              </a>
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon2-favourite kt-font-danger"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    New order has been placed
                  </div>
                  <div class="kt-notification__item-time">
                    15 hrs ago
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
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon-download-1 kt-font-danger"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    Finance report has been generated
                  </div>
                  <div class="kt-notification__item-time">
                    25 hrs ago
                  </div>
                </div>
              </a>
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon-security kt-font-warning"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    New customer comment recieved
                  </div>
                  <div class="kt-notification__item-time">
                    2 days ago
                  </div>
                </div>
              </a>
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon2-pie-chart kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    New customer is registered
                  </div>
                  <div class="kt-notification__item-time">
                    3 days ago
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
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon-download-1 kt-font-danger"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    Finance report has been generated
                  </div>
                  <div class="kt-notification__item-time">
                    25 hrs ago
                  </div>
                </div>
              </a>
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
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon2-box-1 kt-font-brand"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    New customer is registered
                  </div>
                  <div class="kt-notification__item-time">
                    3 hrs ago
                  </div>
                </div>
              </a>
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon2-chart2 kt-font-danger"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    Application has been approved
                  </div>
                  <div class="kt-notification__item-time">
                    3 hrs ago
                  </div>
                </div>
              </a>
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon2-image-file kt-font-warning"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    New file has been uploaded
                  </div>
                  <div class="kt-notification__item-time">
                    5 hrs ago
                  </div>
                </div>
              </a>
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon2-drop kt-font-info"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    New user feedback received
                  </div>
                  <div class="kt-notification__item-time">
                    8 hrs ago
                  </div>
                </div>
              </a>
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    System reboot has been successfully completed
                  </div>
                  <div class="kt-notification__item-time">
                    12 hrs ago
                  </div>
                </div>
              </a>
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon2-favourite kt-font-brand"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    New order has been placed
                  </div>
                  <div class="kt-notification__item-time">
                    15 hrs ago
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
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon-download-1 kt-font-danger"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    Finance report has been generated
                  </div>
                  <div class="kt-notification__item-time">
                    25 hrs ago
                  </div>
                </div>
              </a>
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon-security kt-font-warning"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    New customer comment recieved
                  </div>
                  <div class="kt-notification__item-time">
                    2 days ago
                  </div>
                </div>
              </a>
              <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                  <i class="flaticon2-pie-chart kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                  <div class="kt-notification__item-title">
                    New customer is registered
                  </div>
                  <div class="kt-notification__item-time">
                    3 days ago
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
  
  <!--begin: Quick Actions -->

  
  <!--end: Quick Actions -->
  
  <!--begin: My Cart -->
  <div class="kt-header__topbar-item dropdown kt-hidden">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
									<span class="kt-header__topbar-icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
											</g>
										</svg> </span>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
      <form>
        
        <!-- begin:: Mycart -->
        <div class="kt-mycart">
          <div class="kt-mycart__head kt-head" style="background-image: url(<?php echo base_url('aassets/media/misc/bg-1.jpg')?>);">
            <div class="kt-mycart__info">
              <span class="kt-mycart__icon"><i class="flaticon2-shopping-cart-1 kt-font-success"></i></span>
              <h3 class="kt-mycart__title">My Cart</h3>
            </div>
            <div class="kt-mycart__button">
              <button type="button" class="btn btn-success btn-sm" style=" ">2 Items</button>
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
                  <img src="/aassets/media/products/product9.jpg" title="">
                </a>
              </div>
            </div>
            <div class="kt-mycart__item">
              <div class="kt-mycart__container">
                <div class="kt-mycart__info">
                  <a href="#" class="kt-mycart__title">
                    Panasonic
                  </a>
                  <span class="kt-mycart__desc">
																For PHoto & Others
															</span>
                  <div class="kt-mycart__action">
                    <span class="kt-mycart__price">$ 329</span>
                    <span class="kt-mycart__text">for</span>
                    <span class="kt-mycart__quantity">1</span>
                    <a href="#" class="btn btn-label-success btn-icon">&minus;</a>
                    <a href="#" class="btn btn-label-success btn-icon">&plus;</a>
                  </div>
                </div>
                <a href="#" class="kt-mycart__pic">
                  <img src="/aassets/media/products/product13.jpg" title="">
                </a>
              </div>
            </div>
            <div class="kt-mycart__item">
              <div class="kt-mycart__container">
                <div class="kt-mycart__info">
                  <a href="#" class="kt-mycart__title">
                    Fujifilm
                  </a>
                  <span class="kt-mycart__desc">
																Profile info, Timeline etc
															</span>
                  <div class="kt-mycart__action">
                    <span class="kt-mycart__price">$ 520</span>
                    <span class="kt-mycart__text">for</span>
                    <span class="kt-mycart__quantity">6</span>
                    <a href="#" class="btn btn-label-success btn-icon">&minus;</a>
                    <a href="#" class="btn btn-label-success btn-icon">&plus;</a>
                  </div>
                </div>
                <a href="#" class="kt-mycart__pic">
                  <img src="/aassets/media/products/product16.jpg" title="">
                </a>
              </div>
            </div>
            <div class="kt-mycart__item">
              <div class="kt-mycart__container">
                <div class="kt-mycart__info">
                  <a href="#" class="kt-mycart__title">
                    Candy Machine
                  </a>
                  <span class="kt-mycart__desc">
																For PHoto & Others
															</span>
                  <div class="kt-mycart__action">
                    <span class="kt-mycart__price">$ 784</span>
                    <span class="kt-mycart__text">for</span>
                    <span class="kt-mycart__quantity">4</span>
                    <a href="#" class="btn btn-label-success btn-icon">&minus;</a>
                    <a href="#" class="btn btn-label-success btn-icon">&plus;</a>
                  </div>
                </div>
                <a href="#" class="kt-mycart__pic">
                  <img src="/aassets/media/products/product15.jpg" title="" alt="">
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
  
  <!--end: My Cart -->
  
  <!--begin: Quick panel toggler -->
  <div class="kt-header__topbar-item kt-header__topbar-item--quick-panel" data-toggle="kt-tooltip" title="Quick panel" data-placement="right">
								<span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
											<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
										</g>
									</svg> </span>
  </div>
  
  <!--end: Quick panel toggler -->

    <!--begin: user panel toggler -->

    <div class="kt-header__topbar-item ">
        <a href="<?=base_url('/u/index')?>" class="kt-header__topbar-wrapper" data-offset="10px,0px">
									<span class="kt-header__topbar-icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                     <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                             </g>
                                        </svg>
                                    </span>
        </a>
    </div>

    <!--end: user panel toggler -->



  <!--begin: Language bar -->

  
  <!--end: Language bar -->
  
  <!--begin: User Bar -->
  <div class="kt-header__topbar-item kt-header__topbar-item--user">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
      <div class="kt-header__topbar-user">
        <span class="kt-header__topbar-welcome kt-hidden-mobile"><?=lang('hello')?>,</span>
        <span class="kt-header__topbar-username kt-hidden-mobile"><?php echo $the_user->first_name;?></span>
        <img class="kt-hidden" alt="Pic" src="/uploads/thumb_<?=!empty($the_user->profile_img)?$the_user->profile_img:'default.jpg'?>" />
        
        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
        <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded
        kt-badge--bold"><?php echo $the_user->first_name[0];?></span>
      </div>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

      <!--begin: Head -->

      <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(<?php
      if ($the_user->first_name === "Sinan") {
          echo base_url('aassets/media/misc/yasuo-bg-1.png');
      } elseif ($the_user->first_name === "Dinçer") {
          echo base_url('aassets/media/misc/garen-bg-1.png');
      } else {
          echo base_url('aassets/media/misc/bg-1.jpg');
      }
      ?>)">
        <div class="kt-user-card__avatar">
          <img id="profile_img"  class="" alt="Pic" src="/uploads/thumb_<?=!empty($the_user->profile_img)?$the_user->profile_img:'default.jpg'?>" />
          
          <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
          <span class="kt-hidden kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success"><?php echo
              $the_user->first_name[0];?></span>
        </div>
        <div class="kt-user-card__name">
            <?php echo $the_user->first_name;?>&nbsp;<?php echo $the_user->last_name;?>
        </div>
        <div class="kt-user-card__badge">
          <span class="btn btn-success btn-sm btn-bold btn-font-md">99</span>
        </div>
      </div>
      
      <!--end: Head -->
      
      <!--begin: Navigation -->
      <div class="kt-notification">
        <a href="custom/apps/user/profile-1/personal-information.html" class="kt-notification__item">
          <div class="kt-notification__item-icon">
            <i class="flaticon2-calendar-3 kt-font-success"></i>
          </div>
          <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
              My Profile
            </div>
            <div class="kt-notification__item-time">
              Account settings and more
            </div>
          </div>
        </a>
        <a href="custom/apps/user/profile-3.html" class="kt-notification__item">
          <div class="kt-notification__item-icon">
            <i class="flaticon2-mail kt-font-warning"></i>
          </div>
          <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
              My Messages
            </div>
            <div class="kt-notification__item-time">
              Inbox and tasks
            </div>
          </div>
        </a>
        <a href="custom/apps/user/profile-2.html" class="kt-notification__item">
          <div class="kt-notification__item-icon">
            <i class="flaticon2-rocket-1 kt-font-danger"></i>
          </div>
          <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
              My Activities
            </div>
            <div class="kt-notification__item-time">
              Logs and notifications
            </div>
          </div>
        </a>
        <a href="custom/apps/user/profile-3.html" class="kt-notification__item">
          <div class="kt-notification__item-icon">
            <i class="flaticon2-hourglass kt-font-brand"></i>
          </div>
          <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
              My Tasks
            </div>
            <div class="kt-notification__item-time">
              latest tasks and projects
            </div>
          </div>
        </a>
        <a href="custom/apps/user/profile-1/overview.html" class="kt-notification__item">
          <div class="kt-notification__item-icon">
            <i class="flaticon2-cardiogram kt-font-warning"></i>
          </div>
          <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
              Billing
            </div>
            <div class="kt-notification__item-time">
              billing & statements <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">2 pending</span>
            </div>
          </div>
        </a>
        <div class="kt-notification__custom kt-space-between">
          <a href="<?php echo base_url('m/signout')?>" target="_self" class="btn btn-label btn-label-brand btn-sm
          btn-bold">Sign Out</a>
          <a href="custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a>
        </div>
      </div>
      
      <!--end: Navigation -->
    </div>
  </div>
  
  <!--end: User Bar -->
</div>
