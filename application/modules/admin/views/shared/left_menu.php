<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="index.html">
                <img style="height: 38px;" alt="Logo" src="<?php echo base_url(); ?>assets/media/logos/logo_sol_sag_2.png"/>
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
				<span><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                  fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/>
                            <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                  fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/>
                        </g>
                    </svg></span>
                <span><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                  fill="#000000" fill-rule="nonzero"/>
                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                  fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
										</g>
                    </svg></span>
            </button>

            <!--
        <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
        -->
        </div>
    </div>

    <!-- end:: Aside -->

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
             data-ktmenu-dropdown-timeout="100">
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item  <?php echo (isset($m1) && $m1 === 'dashboard') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                    <a href="<?php echo base_url('admin'); ?>" class="kt-menu__link ">
                        <span class="kt-menu__link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                              fill="#000000" fill-rule="nonzero"/>
                                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                          fill="#000000" opacity="0.3"/>
												</g>
                                </svg>
                        </span>
                        <span class="kt-menu__link-text"><?=lang('dashboard')?></span>
                    </a>
                </li>





                <li class="kt-menu__item  kt-menu__item--submenu <?php echo (isset($m1) && $m1 === 'users') ? 'kt-menu__item--active kt-menu__item--open' : ''; ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                          fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                              fill="#000000" fill-rule="nonzero"/>
                                     </g>
                            </svg>
                        </span>
                        <span class="kt-menu__link-text"><?=lang('users')?></span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>

                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                            <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'users_table') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                                <a href="<?php echo base_url('admin/users_table') ?>" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text"><?=lang('users_table')?></span>
                                </a>
                            </li>
                        </ul>







                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                            <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'users_score') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                                <a href="<?php echo base_url('admin/users_score') ?>" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Users Score</span>
                                </a>
                            </li>
                        </ul>






                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                            <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'add_user') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                                <a href="<?php echo base_url('admin/add_user') ?>" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text"><?=lang('add_user')?></span>
                                </a>
                            </li>
                        </ul>

                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                            <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'edit_user') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                                <a href="<?php echo base_url('admin/edit_user') ?>" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text"><?=lang('edit_user')?></span>
                                </a>
                            </li>
                        </ul>

                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                            <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'groups_table') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                                <a href="<?php echo base_url('admin/groups_table') ?>" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text"><?=lang('groups_table')?></span>
                                </a>
                            </li>
                        </ul>

                    </div>
                </li>





                <li class="kt-menu__item  kt-menu__item--submenu <?php echo (isset($m1) && $m1 === 'message') ? 'kt-menu__item--active kt-menu__item--open' : ''; ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M22,15 L22,19 C22,20.1045695 21.1045695,21 20,21 L4,21 C2.8954305,21 2,20.1045695 2,19 L2,15 L6.27924078,15 L6.82339262,16.6324555 C7.09562072,17.4491398 7.8598984,18 8.72075922,18 L15.381966,18 C16.1395101,18 16.8320364,17.5719952 17.1708204,16.8944272 L18.118034,15 L22,15 Z"
                                  fill="#000000"/>
                                <path d="M2.5625,13 L5.92654389,7.01947752 C6.2807805,6.38972356 6.94714834,6 7.66969497,6 L16.330305,6 C17.0528517,6 17.7192195,6.38972356 18.0734561,7.01947752 L21.4375,13 L18.118034,13 C17.3604899,13 16.6679636,13.4280048 16.3291796,14.1055728 L15.381966,16 L8.72075922,16 L8.17660738,14.3675445 C7.90437928,13.5508602 7.1401016,13 6.27924078,13 L2.5625,13 Z"
                                      fill="#000000" opacity="0.3"/>
                                </g>
                         </svg>
                        </span>
                        <span class="kt-menu__link-text"><?=lang('message')?></span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>

                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>

                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                            <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'inbox') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                                <a href="<?php echo base_url('admin/inbox') ?>" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text"><?=lang('inbox')?></span>
                                </a>
                            </li>
                        </ul>

                        

                    </div>
                </li>




                <li class="kt-menu__item  kt-menu__item--submenu <?php echo (isset($m1) && $m1 === 'media') ? 'kt-menu__item--active kt-menu__item--open' : ''; ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M10.782158,17.5100514 L15.1856088,14.5000448 C15.4135806,14.3442132 15.4720618,14.0330791 15.3162302,13.8051073 C15.2814587,13.7542388 15.2375842,13.7102355 15.1868178,13.6753149 L10.783367,10.6463273 C10.5558531,10.489828 10.2445489,10.5473967 10.0880496,10.7749107 C10.0307022,10.8582806 10,10.9570884 10,11.0582777 L10,17.097272 C10,17.3734143 10.2238576,17.597272 10.5,17.597272 C10.6006894,17.597272 10.699033,17.566872 10.782158,17.5100514 Z"
                                          fill="#000000"/>
                                </g>
                            </svg>
                        </span>
                        <span class="kt-menu__link-text"><?=lang('media')?></span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>

                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>

                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                            <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'upload') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                                <a href="<?php echo base_url('admin/upload') ?>" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text"><?=lang('upload')?></span>
                                </a>
                            </li>
                        </ul>

                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                            <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'add_article') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                                <a href="<?php echo base_url('admin/add_article') ?>" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text"><?=lang('add_article')?></span>
                                </a>
                            </li>
                        </ul>
  
                      <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                        <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'edit_article') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                          <a href="<?php echo base_url('admin/edit_article') ?>" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text"><?=lang('edit_article')?></span>
                          </a>
                        </li>
                      </ul>

                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                            <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'library') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                                <a href="<?php echo base_url('admin/library') ?>" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text"><?=lang('library')?></span>
                                </a>
                            </li>
                        </ul>

                    </div>
                </li>




                <li class="kt-menu__item  kt-menu__item--submenu <?php echo (isset($m1) && $m1 === 'courses') ? 'kt-menu__item--active kt-menu__item--open' : ''; ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" x="2" y="6" width="13" height="12" rx="2"/>
                                    <path d="M22,8.4142119 L22,15.5857848 C22,16.1380695 21.5522847,16.5857848 21,16.5857848 C20.7347833,16.5857848 20.4804293,16.4804278 20.2928929,16.2928912 L16.7071064,12.7071013 C16.3165823,12.3165768 16.3165826,11.6834118 16.7071071,11.2928877 L20.2928936,7.70710477 C20.683418,7.31658067 21.316583,7.31658098 21.7071071,7.70710546 C21.8946433,7.89464181 22,8.14899558 22,8.4142119 Z"
                                          fill="#000000" opacity="0.3"/>
                                </g>
                            </svg>
                         </span>
                        <span class="kt-menu__link-text"><?=lang('courses')?></span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>


                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>

                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                            <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'courses_table') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                                <a href="<?php echo base_url('admin/courses_table') ?>" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text"><?=lang('courses_table')?></span>
                                </a>
                            </li>
                        </ul>
                      <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                        <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'add_new_course') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                          <a href="<?php echo base_url('admin/add_new_course') ?>" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text"><?=lang('add_new_course')?></span>
                          </a>
                        </li>
                      </ul>
                      <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                        <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'edit_course') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                          <a href="<?php echo base_url('admin/edit_course') ?>" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text"><?=lang('edit_course')?></span>
                          </a>
                        </li>
                      </ul>

                    </div>


                </li>


                <li class="kt-menu__item  kt-menu__item--submenu <?php echo (isset($m1) && $m1 === 'tests') ? 'kt-menu__item--active kt-menu__item--open' : ''; ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                     <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                           fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                     <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                </g>
                            </svg>
                         </span>
                        <span class="kt-menu__link-text"><?= lang('tests') ?></span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>


                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>

                      <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                        <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'add_test') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                          <a href="<?php echo base_url('admin/add_test') ?>" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text"><?= lang('add_test') ?></span>
                          </a>
                        </li>
                      </ul>
                      <ul class="kt-menu__subnav <?php echo (!isset($m2) || (isset($m2) && $m2 !== 'edit_test')) ? 'kt-hidden' : ''; ?>">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                        <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'edit_test') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                          <a href="<?php echo base_url('admin/edit_test') ?>" class="kt-menu__link ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                            <span class="kt-menu__link-text"><?= lang('edit_test') ?></span>
                          </a>
                        </li>
                      </ul>
                      <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                            <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'test_table') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                                <a href="<?php echo base_url('admin/test_table') ?>" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text"><?=lang('test_table')?></span>
                                </a>
                            </li>
                        </ul>

                    </div>


                </li>









                <li class="kt-menu__item  kt-menu__item--submenu <?php echo (isset($m1) && $m1 === 'log') ? 'kt-menu__item--active kt-menu__item--open' : ''; ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                              fill="#000000"/>
                         <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/></g>
                        </svg>
                         </span>
                        <span class="kt-menu__link-text">Log</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>

                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>

                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                            <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'system_log') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                                <a href="<?php echo base_url('admin/system_log') ?>" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text"><?=lang('system_log')?></span>
                                </a>
                            </li>
                        </ul>

                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
                            <li class="kt-menu__item <?php echo (isset($m2) && $m2 === 'error_log') ? 'kt-menu__item--active' : ''; ?>" aria-haspopup="true">
                                <a href="<?php echo base_url('admin/error_log') ?>" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text"><?=lang('error_log')?></span>
                                </a>
                            </li>
                        </ul>









                    </div>
                </li>




<!---->
<!--                <li class="kt-menu__section ">-->
<!--                    <h4 class="kt-menu__section-text">Other</h4>-->
<!--                    <i class="kt-menu__section-icon flaticon-more-v2"></i>-->
<!--                </li>-->






            </ul>
        </div>
    </div>

    <!-- end:: Aside Menu -->
</div>
