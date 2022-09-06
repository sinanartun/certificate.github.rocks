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
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper  kt-pt65" id="kt_wrapper">
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

                    <div class="row">
                        <div class="col-md-6">
                            <!--begin::Portlet-->
                            <div class="kt-portlet">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon-user-add"></i>
										</span>
                                        <h3 class="kt-portlet__head-title">
                                            <?=lang('add_user')?>
                                        </h3>
                                    </div>
                                </div>



                                <!--begin::Form-->
                                <form id="add_user_form" class="kt-form kt-form--label-right">
                                    <div class="kt-portlet__body">


                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-2 col-form-label"><?=lang('add_user_profile_picture')?></label>
                                            <div class="col-10">
                                                <img id="add_user_img" src="/uploads/thumb_default.jpg">
                                            </div>
                                        </div>

                                        <div class="form-group form-group-last row">
                                            <label class="col-lg-2 col-form-label"><?=lang('add_user_upload_files:')?></label>
                                            <div class="col-lg-10">
                                                <div class="dropzone dropzone-multi" id="kt_dropzone_5">
                                                    <div class="dropzone-panel">
                                                        <a class="dropzone-select btn btn-label-brand btn-bold btn-sm"><?=lang('add_user_button_attach_files')?></a>
                                                        <a class="dropzone-upload btn btn-label-brand btn-bold btn-sm"><?=lang('add_user_button_upload_all')?></a>
                                                        <a class="dropzone-remove-all btn btn-label-brand btn-bold btn-sm"><?=lang('add_user_button_remove_all')?></a>
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
                                                <span class="form-text text-muted"><?=lang('add_user_file_comment')?></span>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-2 col-form-label"><?=lang('add_user_first_name')?></label>
                                            <div class="col-10">
                                                <input name="first_name" class="form-control" type="text" value="" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-2 col-form-label"><?=lang('add_user_last_name')?></label>
                                            <div class="col-10">
                                                <input name="last_name" class="form-control" type="search" value="" id="example-search-input">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"><?=lang('add_user_email')?></label>
                                            <div class="col-10">
                                                <input readonly onfocus="if (this.hasAttribute('readonly')) {this.removeAttribute('readonly'); this.blur(); this.focus(); }" name="email" class="form-control" type="email" value=""
                                                       id="example-email-input">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-2 col-form-label"><?=lang('add_user_password')?></label>
                                            <div class="col-10">
                                                <input name="password" class="form-control" type="password" value="" id="example-password-input">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-2 col-form-label"><?=lang('add_user_password_confirm')?></label>
                                            <div class="col-10">
                                                <input name="password_confirm" class="form-control" type="password" value="" id="example-password-input">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password_confirm" class="col-2 col-form-label"><?=lang('add_user__user_active')?></label>
                                            <div class="col-10">
                                                <label class="kt-checkbox">
                                                    <input name="user_active" type="checkbox">
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="exampleSelect1" class="col-2 col-form-label"><?=lang('add_user_group')?></label>
                                            <div class="col-10">
                                                <select name="group" class="form-control" id="exampleSelect1">
                                                    <? foreach ($groups as $group): ?>
                                                        <option value="<?= $group->id ?>"><?= $group->name ?></option>
                                                    <? endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot">
                                        <div class="kt-form__actions">
                                            <div class="row">
                                                <div class="col-12">
                                                    <button id="add_user_submit" type="reset" class="btn btn-success pull-right"><?=lang('add_user_button_submit')?></button>
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
<script src="/aassets/js/admin/add_user.js" type="text/javascript"></script>

</body>
<!-- end::Body -->
</html>
