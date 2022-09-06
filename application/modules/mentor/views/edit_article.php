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
      <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-pt20" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
          <div class="kt-portlet">
            
    
            <!--begin::Form-->
            <form class="kt-form kt-form--fit kt-form--label-right">
              <div class="kt-portlet__body">
                <div class="form-group row">
                  <label class="col-form-label col-md-1 text-left"><?=lang('edit_article__select_article')?></label>
                  <div class="col-md-4">
                    <select class="form-control kt-select2" id="article_selector" name="article_selector">
                      <option value=""></option>
                      <?php
                      foreach($articles as $article){
                        echo '<option value="'.$article.'">'.$article.'</option>';
                      }
                      ?>
                     
                    </select>
                    <span class="form-text text-muted"><?=lang('edit_article__select_article_comment')?> ( <?=count($articles)?> )</span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="article_name" class="col-1 col-form-label text-left"><?=lang('edit_article__article_name')?></label>
                  <div class="col-4">
                    <input class="form-control" type="text" value="" id="article_name" maxlength="100">
                    <span class="form-text text-muted"><?=lang('edit_article__article_name_comment')?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <div class="summernote" id="summernote_div"></div>
                  </div>
                </div>
              </div>
              <div class="kt-portlet__foot">
                <div class="row">
                  
                  <div class="col-md-12">
                    
                    <button type="button" id="save" class="btn btn-brand pull-right"><?=lang('edit_article_button_update')?></button>
                    <button type="button" id="clear" class="btn btn-secondary pull-right kt-mr-10"><?=lang('edit_article_button_clear')?></button>
                   
                    
                  </div>
                </div>
              </div>
            </form>
    
            <!--end::Form-->
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
<script src="/aassets/js/admin/edit_article.js" type="text/javascript"></script>
</body>
<!-- end::Body -->
</html>
