<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><div class="kt-header__topbar-item kt-header__topbar-item--user">
  <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
    <span class="kt-header__topbar-welcome kt-visible-desktop"><?=lang('hello')?></span>
    <span class="kt-header__topbar-username kt-visible-desktop"><?=$the_user->first_name?></span>
    <img id="profile_img_top" alt="Pic" src="<?=!empty($the_user->profile_img)?'/uploads/'.$the_user->profile_img:'/assets/media/users/default.jpg';?>" />
    
    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
    <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
  </div>
  <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
    
    <!--begin: Head -->
    <div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x user_avatar_card_bg">
      <div class="kt-user-card__avatar">
        <img class="profile_img" alt="Pic" id="profile_img_top" src="<?=!empty($the_user->profile_img)?'/uploads/'.$the_user->profile_img:'/assets/media/users/default.jpg';?>" />
        
        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
        <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
      </div>
      <div class="kt-user-card__name kt-font-light">
          <?php echo $the_user->first_name;?>&nbsp;<?php echo $the_user->last_name;?>
      </div>
        <div class="kt-user-card__badge kt-hidden">
            <span class="btn btn-success btn-sm">23 messages</span>
        </div>
    </div>

      <!--end: Head -->

      <!--begin: Navigation -->
      <div class="kt-notification">
        <a href="<?= base_url('u/profile') ?>" class="kt-notification__item">
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
        <?if($the_user->is_admin):?>
        <a href="<?= base_url('admin') ?>" class="kt-notification__item">
          <div class="kt-notification__item-icon">
            <i class="flaticon2-calendar-3 kt-font-success"></i>
          </div>
          <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
              Admin
            </div>
            <div class="kt-notification__item-time">
              Go to admin Dashboard
            </div>
          </div>
        </a>
        <?endif;?>
      
      <div class="kt-notification__custom kt-space-between">
        
        <? echo (!isset ($the_user)) ? '<a href="login" alt="Giriş yap veya kaydol" target="_self" class="btn btn-label btn-label-brand btn-sm btn-bold">Login</a>' : '<a href="'.base_url('u/signout').'" target="_self" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>'; ?>
      </div>
    </div>
    
    <!--end: Navigation -->
  </div>
</div>
