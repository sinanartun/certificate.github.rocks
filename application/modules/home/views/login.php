<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157271540-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-157271540-1');
  </script>
<base href="../../../">
<meta charset="utf-8"/>
<title>traiive.com | Login</title>
<meta name="description" content="Login page ">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--begin::Fonts -->
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

<!--end::Fonts -->

<!--begin::Page Custom Styles(used by this page) -->
<link href="/aassets/css/pages/login/login-2.css" rel="stylesheet" type="text/css"/>
<link href="/aassets/css/dp.css" rel="stylesheet" type="text/css"/>

<!--end::Page Custom Styles -->

<!--begin::Global Theme Styles(used by all pages) -->
<link href="/aassets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
<link href="/aassets/css/style.bundle.css" rel="stylesheet" type="text/css"/>

<!--end::Global Theme Styles -->

<!--begin::Layout Skins(used by all pages) -->
<link href="/aassets/css/skins/header/base/light.css" rel="stylesheet" type="text/css"/>
<link href="/aassets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css"/>
<link href="/aassets/css/skins/brand/dark.css" rel="stylesheet" type="text/css"/>
<link href="/aassets/css/skins/aside/dark.css" rel="stylesheet" type="text/css"/>

<!--end::Layout Skins -->
<link rel="shortcut icon" href="/aassets/media/logos/favicon.ico"/>
<style>
    body {
        background-color: #377aad !important;
    }

    }
</style>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed
kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading ">


<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
  <div class="kt-grid kt-grid--hor kt-grid--root kt-login kt-login--v2 kt-login--signin" id="kt_login">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
         style="background-image: url(/aassets/media/bg/login-bg-min.png); background-repeat: no-repeat">
      <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
        <div class="kt-login__container">
          <div class="kt-login__logo">
            <a href="#">
              <img src="/aassets/media/logos/logo_sol_sag_2.png">
            </a>
          </div>
          <div class="kt-login__signin">
            <div class="kt-login__head">
              <h3 class="kt-login__title">Login</h3>
            </div>
            <form class="kt-form" action="">
              <div class="input-group">
                <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
              </div>
              <div class="input-group">
                <input class="form-control" type="password" placeholder="Password" name="password">
              </div>
              <div class="row kt-login__extra">
                <div class="col">
                  <label class="kt-checkbox">
                    <input type="checkbox" name="remember"> Remember me
                    <span></span>
                  </label>
                </div>
                <!--                  <div class="col kt-align-left">-->
                <!--                      <a href="javascript:;" id="kt-login__reset_password" class="kt-link kt-login__link">Reset Password</a>-->
                <!--                  </div>-->
                <div class="col kt-align-right">
                  <a href="javascript:" id="kt_login_forgot" class="kt-link kt-login__link">Forget Password ?</a>
                </div>
              </div>
              <div class="kt-login__actions">
                <button id="kt_login_signin_submit" class="btn btn-pill kt-login__btn-primary">Login</button>
              </div>
            </form>
          </div>
          <div class="kt-login__signup">
            <div class="kt-login__head">
              <h3 class="kt-login__title">Sign Up</h3>
              <div class="kt-login__desc">Enter your details to create your account:</div>
            </div>
            <form class="kt-login__form kt-form" action="">
              <div class="input-group">
                <input class="form-control" type="text" placeholder="first name" name="first_name">
              </div>
              <div class="input-group">
                <input class="form-control" type="text" placeholder="last name" name="last_name">
              </div>
              <div class="input-group">
                <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
              </div>
              <div class="input-group">
                <input class="form-control" type="password" placeholder="Password" name="password">
              </div>
              <div class="input-group">
                <input class="form-control" type="password" placeholder="Confirm Password" name="rpassword">
              </div>
              <div class="row kt-login__extra">
                <div class="col kt-align-left">
                  <label class="kt-checkbox">
                    <input type="checkbox" name="agree">I Agree the terms and conditions.
                    <span></span>
                  </label>
                  <span class="form-text text-muted"></span>
                </div>
              </div>
              <div class="kt-login__actions">
                  <button id="kt_login_signup_cancel" class="btn btn-pill kt-login__btn-secondary">Cancel</button>
                <button id="kt_login_signup_submit" class="btn btn-pill kt-login__btn-primary">Sign Up</button>&nbsp;&nbsp;

              </div>
            </form>
          </div>
          <div class="kt-login__forgot">
            <div class="kt-login__head">
              <h3 class="kt-login__title">Forgotten Password ?</h3>
              <div class="kt-login__desc">Enter your email to reset your password:</div>
            </div>
            <form class="kt-form" action="">
              <div class="input-group">
                <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email"
                       autocomplete="off">
              </div>
              <div class="kt-login__actions">
                <button id="kt_login_forgot_cancel" class="btn btn-pill kt-login__btn-secondary">Cancel</button>
                <button id="kt_login_forgot_submit" class="btn btn-pill kt-login__btn-primary">Request</button>&nbsp;&nbsp;

              </div>
            </form>
          </div>
          <div class="kt-login__account">
								<span class="kt-login__account-msg">
									Don't have an account yet ?
								</span>&nbsp;&nbsp;
            <a href="javascript:" id="kt_login_signup" class="kt-link kt-link--light kt-login__account-link">Sign
              Up</a>
          </div>
          <div class="kt-login__reset_password">
            <div class="kt-login__head">
              <h3 class="kt-login__title">Reset Password</h3>
              <div class="kt-login__desc">Enter your new password:</div>
            </div>
            <form class="kt-login__form kt-form" action="">
          
          
              <div class="input-group">
                <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
              </div>
              <div class="input-group">
                <input class="form-control" type="password" placeholder="Password" name="password">
              </div>
              <div class="input-group">
                <input class="form-control" type="password" placeholder="Confirm Password" name="rpassword">
              </div>

              <div class="kt-login__actions">
                <button id="kt_login_reset_password_cancel" class="btn btn-pill kt-login__btn-secondary">Cancel</button>
                <button id="kt_login_reset_password_submit" class="btn btn-pill kt-login__btn-primary">Update</button>&nbsp;&nbsp;

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<!-- end:: Page -->
  <!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
    <?php if(!empty($this->session->flashdata('message'))):?>
const flashdata = {'message':'<?php echo $this->session->flashdata('message')?>',
'message_type':'<?php echo $this->session->flashdata('message_type')?>'};
        <?php endif;?>
</script>
  <!-- end::Global Config -->
  
  <!--begin::Global Theme Bundle(used by all pages) -->
<script src="/aassets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
<script src="/aassets/js/scripts.bundle.js" type="text/javascript"></script>
  
  <!--end::Global Theme Bundle -->
  
  <!--begin::Page Scripts(used by this page) -->
<script src="/aassets/js/home/login.js" type="text/javascript"></script>

  <!--end::Page Scripts -->

</body>

<!-- end::Body -->
</html>
