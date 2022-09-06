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
        
  
  
  
          <!--begin::Portlet-->
          <div class="kt-portlet">
            <div class="kt-portlet__head">
              <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                  Upload File
                </h3>
              </div>
            </div>
    
            <!--begin::Form-->
            <form class="kt-form kt-form--label-right">
              <div class="kt-portlet__body">
                
                <div class="form-group row">
                  
                  
                  <div class="col-12" >
                    <div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3" style="min-height:300px">
                      <div class="dropzone-msg dz-message needsclick" style="">
                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                        <span class="dropzone-msg-desc">Only image and .mp4 files are allowed for upload</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </form>
    
            <!--end::Form-->
          </div>
  
          <!--end::Portlet-->
        
        
        
        
        
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

<script src="/aassets/js/admin/upload.js" type="text/javascript"></script>
</body>
<!-- end::Body -->
</html>
