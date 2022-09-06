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
  
  
          <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
    
            <!--Begin:: App Aside Mobile Toggle-->
            <button class="kt-app__aside-close" id="kt_chat_aside_close">
              <i class="la la-close"></i>
            </button>
    
            <!--End:: App Aside Mobile Toggle-->
    
            <!--Begin:: App Aside-->
            <div class="kt-grid__item kt-app__toggle kt-app__aside kt-app__aside--lg kt-app__aside--fit" id="kt_chat_aside">
      
              <!--begin::Portlet-->
              <div class="kt-portlet kt-portlet--last">
                <div class="kt-portlet__body">
                  <div class="kt-searchbar">
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24" />
																	<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																	<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
																</g>
															</svg></span></div>
                      <input id="user_search_box" type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon1">
                    </div>
                  </div>
                  <div class="kt-widget kt-widget--users kt-mt-20 ">
                    <div class="kt-scroll kt-scroll--pull" data-scroll="true" style="height:800px">
                      <div id="user_list_div" class="kt-widget__items" >
                          <? foreach ($users as $user):?>
                        <div class="kt-widget__item">
															<span class="kt-media kt-media--circle">
																<img class="to_profile_img" src="/uploads/thumb_<?=($user->profile_img)?$user->profile_img:'default.jpg' ?>" alt="image">
															</span>
                          <div class="kt-widget__info">
                            <div class="kt-widget__section">
                              <a  href="#" class="kt-widget__username inbox_username" data-id="<?=$user->user_id?>"><?=$user->first_name.' '.$user->last_name?></a>
                              <span class="kt-badge kt-badge--success kt-badge--dot"></span>
                            </div>
                            <span class="kt-widget__desc"><?=$user->email?></span>
                          </div>
                          <div class="kt-widget__action">
                            <span class="kt-widget__date">36 Mines</span>
                            <?if($user->unread_count>0):?>
                            <span class="kt-badge kt-badge--success kt-font-bold"><?=$user->unread_count?></span>
                            <?endif;?>
                          </div>
                        </div>
                          <?endforeach;?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      
              <!--end::Portlet-->
            </div>
    
            <!--End:: App Aside-->
    
            <!--Begin:: App Content-->
            <div class="kt-grid__item kt-grid__item--fluid kt-app__content kt-hidden" id="kt_chat_content">
              <div class="kt-chat">
                <div class="kt-portlet kt-portlet--head-lg kt-portlet--last">
                  <div class="kt-portlet__head">
                    <div class="kt-chat__head ">
                      <div class="kt-chat__left">
                
                        <!--begin:: Aside Mobile Toggle -->
                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md kt-hidden-desktop" id="kt_chat_aside_mobile_toggle">
                          <i class="flaticon2-open-text-book"></i>
                        </button>
                
                        <!--end:: Aside Mobile Toggle-->
                        <div class="dropdown dropdown-inline">
                          <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-more-1"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-fit dropdown-menu-left dropdown-menu-md">
                    
                            <!--begin::Nav-->
                            <ul class="kt-nav">
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
                                </a>
                              </li>
                              <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                  <i class="kt-nav__link-icon flaticon2-rocket-1"></i>
                                  <span class="kt-nav__link-text">Groups</span>
                                  <span class="kt-nav__link-badge">
																				<span class="kt-badge kt-badge--brand kt-badge--inline">new</span>
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
                              <li class="kt-nav__separator"></li>
                              <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                  <i class="kt-nav__link-icon flaticon2-protected"></i>
                                  <span class="kt-nav__link-text">Help</span>
                                </a>
                              </li>
                              <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                  <i class="kt-nav__link-icon flaticon2-bell-2"></i>
                                  <span class="kt-nav__link-text">Privacy</span>
                                </a>
                              </li>
                            </ul>
                    
                            <!--end::Nav-->
                          </div>
                        </div>
                      </div>
                      <div class="kt-chat__center">
                        <div class="kt-chat__label">
                          <a href="#" class="kt-chat__title" id="msg_box_username"></a>
                          <span class="kt-chat__status">
																<span class="kt-badge kt-badge--dot kt-badge--success"></span> Active
															</span>
                        </div>
                        <div class="kt-chat__pic kt-hidden">
															<span class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-placement="right" title="Jason Muller" data-original-title="Tooltip title">
																<img src="/assets/media/users/300_12.jpg" alt="image">
															</span>
                          <span class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-placement="right" title="Nick Bold" data-original-title="Tooltip title">
																<img src="/assets/media/users/300_11.jpg" alt="image">
															</span>
                          <span class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-placement="right" title="Milano Esco" data-original-title="Tooltip title">
																<img src="/assets/media/users/100_14.jpg" alt="image">
															</span>
                          <span class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-placement="right" title="Teresa Fox" data-original-title="Tooltip title">
																<img src="/assets/media/users/100_4.jpg" alt="image">
															</span>
                        </div>
                      </div>
                      <div class="kt-chat__right">
                        <div class="dropdown dropdown-inline">
                          <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon2-add-1"></i>
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
                      </div>
                    </div>
                  </div>
                  <div class="kt-portlet__body">
                    <div id="msg_box_div" class="kt-scroll kt-scroll--pull" data-mobile-height="300" data-scroll="true"  style="height: 800px">
                      <div id="msg_box" class="kt-chat__messages">
                      
                      </div>
                    </div>
                  </div>
                  <div class="kt-portlet__foot">
                    <div id="enter_chat" class="kt-chat__input">
                      <div class="kt-chat__editor">
                        <textarea id="msg_text" style="height: 50px" placeholder="Type here..."></textarea>
                      </div>
                      <div class="kt-chat__toolbar">
                        <div class="kt_chat__tools">
                          <a href="#"><i class="flaticon2-link"></i></a>
                          <a href="#"><i class="flaticon2-photograph"></i></a>
                          <a href="#"><i class="flaticon2-photo-camera"></i></a>
                        </div>
                        <div class="kt_chat__actions">
                          <button id="inbox_sent_message" type="button" class="btn btn-brand btn-md btn-bold kt-chat__reply"><?=lang('inbox_button_reply')?></button>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <!--End:: App Content-->
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
<script>
    let input = document.getElementById("enter_chat");
    input.addEventListener("keydowns", function(event) {
        event.preventDefault();
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("inbox_sent_message").click();
        }
    });
</script>
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
<script src="/aassets/js/admin/inbox.js" type="text/javascript"></script>
</body>
<!-- end::Body -->
</html>
