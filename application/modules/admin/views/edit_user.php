<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><?php $this->load->view('shared/head_start'); ?>
<?php $this->load->view('shared/css_all'); ?>
<link href="/aassets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
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
                  

                    <div class="row">
                        <div class="col-md-6">

                            <!--begin::Portlet-->
                            <div class="kt-portlet">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon-edit-1"></i>
										</span>
                                        <h3 class="kt-portlet__head-title">
                                            <?=lang('edit_user')?>
                                        </h3>
                                    </div>
                                </div>


                                <!--begin::Form-->
                                <form id="add_user_form" class="kt-form kt-form--label-right" autocomplete="off">
                                    <input id="user_id" name="id" type="hidden" value="<?php echo empty($user) ? '' : $user->user_id; ?>">
                                    <div class="kt-portlet__body">


                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-2 col-form-label"><?=lang('edit_user_profile_picture')?></label>
                                            <div class="col-10">
                                                <img id="add_user_img" src="/uploads/thumb_<?= !empty($user->profile_img) ? $user->profile_img : 'default.jpg' ?>">
                                            </div>
                                        </div>

                                        <div class="form-group form-group-last row <?= empty($user) ? 'kt-hidden' : '' ?>">
                                            <label class="col-lg-2 col-form-label"><?=lang('edit_user_upload_files:')?></label>
                                            <div class="col-lg-10">
                                                <div class="dropzone dropzone-multi" id="kt_dropzone_5">
                                                    <div class="dropzone-panel">
                                                        <a class="dropzone-select btn btn-label-brand btn-bold btn-sm"><?=lang('edit_user_button_attach_files')?></a>
                                                        <a class="dropzone-upload btn btn-label-brand btn-bold btn-sm"><?=lang('edit_user_button_upload_all')?></a>
                                                        <a class="dropzone-remove-all btn btn-label-brand btn-bold btn-sm"><?=lang('edit_user_button_remove_all')?></a>
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
                                                <span class="form-text text-muted"><?=lang('edit_user_file_comment')?></span>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-2 col-form-label"><?=lang('edit_user_first_name')?></label>
                                            <div class="col-10">
                                                <input name="first_name" class="form-control" type="text" value="<?php echo empty($user) ? '' : $user->first_name; ?>" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-2 col-form-label"><?=lang('edit_user_last_name')?></label>
                                            <div class="col-10">
                                                <input readonly onfocus="if (this.hasAttribute('readonly')) {this.removeAttribute('readonly'); this.blur(); this.focus(); }" name="last_name" class="form-control" type="search" value="<?php echo empty($user) ? '' : $user->last_name; ?>" id="example-search-input">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-2 col-form-label"><?=lang('edit_user_email')?></label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" placeholder="<?php echo empty($user) ? '' : $user->email; ?>" id="email" disabled="disabled">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-2 col-form-label"><?=lang('edit_user_password')?></label>
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

                                        <div class="form-group row">
                                            <label for="password_confirm" class="col-2 col-form-label"><?= lang('edit_user__user_active') ?></label>
                                            <div class="col-10">
                                                <label class="kt-checkbox">
                                                    <input name="user_active" type="checkbox" <?php
                                                      if (!empty($user) && (int)$user->active === 1) {
                                                        echo 'checked';
                                                      }
                
                                                    ?>>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="exampleSelect1" class="col-2 col-form-label"><?= lang('edit_user_group') ?></label>
                                            <div class="col-10">
                                                <select name="group" class="form-control" id="exampleSelect1">
                                                  <? foreach ($groups as $group): ?>
                                                        <option value="<?= $group->id ?>" <?= !empty($user)?(((int)$user->group_id === (int)$group->id) ? 'selected' : ''):'' ?>><?= $group->name ?></option>
                                                    <? endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="kt-portlet__foot">
                                        <div class="kt-form__actions">
                                            <div class="row">
                                                <div class="col-12">
                                                    <button id="delete_user_btn" type="reset" class="btn btn-danger pull-left"><?=lang('edit_user_button_delete')?></button>
                                                    <button id="add_user_submit" type="reset" class="btn btn-success pull-right"><?=lang('edit_user_button_submit')?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>



                            </div>

                            <!--end::Portlet-->
                        </div>
                        <div class="col-md-6">

                            <!--begin::Portlet-->
                            <div class="kt-portlet kt-portlet--mobile">
                                <div class="kt-portlet__head kt-portlet__head--lg">
                                    <div class="kt-portlet__head-label">
										    <span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon-users-1"></i>
										    </span>
                                        <h3 class="kt-portlet__head-title">
                                            <?=lang('edit_user_users_table')?>
                                        </h3>
                                    </div>

                                    <div class="kt-portlet__head-toolbar">
                                        <div class="kt-portlet__head-wrapper">
                                            <div class="kt-portlet__head-actions">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">

                                    <!--begin: Datatable -->
                                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                                        <thead>
                                        <tr>
                                            <th><?=lang('edit_user_id')?></th>
                                            <th><?=lang('edit_user_fullname')?></th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th><?=lang('edit_user_id')?></th>
                                            <th><?=lang('edit_user_fullname')?></th>
                                            <th><?=lang('edit_user_actions')?></th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <!--end: Datatable -->
                                </div>
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
<script src="/aassets/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="/aassets/js/admin/dt_mini_users_table.js" type="text/javascript"></script>
<script src="/aassets/js/admin/edit_user.js" type="text/javascript"></script>
</body>
<!-- end::Body -->
</html>
