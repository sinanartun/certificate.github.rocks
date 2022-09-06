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

                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-group"></i>
										</span>
                                <h3 class="kt-portlet__head-title">
                                    Groups Table
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <div class="kt-portlet__head-actions">
                                        <div class="dropdown dropdown-inline">
                                            <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="la la-download"></i> Export
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="kt-nav">
                                                    <li class="kt-nav__section kt-nav__section--first">
                                                        <span class="kt-nav__section-text">Choose an option</span>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon la la-print"></i>
                                                            <span class="kt-nav__link-text">Print</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon la la-copy"></i>
                                                            <span class="kt-nav__link-text">Copy</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                                            <span class="kt-nav__link-text">Excel</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon la la-file-text-o"></i>
                                                            <span class="kt-nav__link-text">CSV</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                            <span class="kt-nav__link-text">PDF</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>


                                        <button type="button" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_6">Add Group</button>
                                        <div class="modal fade" id="kt_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Add Group Account</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="add_group_form" class="kt-form kt-form--label-right">
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-3 col-form-label">Name</label>
                                                                <div class="col-8">
                                                                    <input name="name" class="form-control" type="text" value=""
                                                                           id="example-text-input">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-3 col-form-label">Description</label>
                                                                <div class="col-8">
                                                                    <input name="description" class="form-control" type="text" value=""
                                                                           id="example-text-input">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="exampleSelect1" class="col-3 col-form-label">Group Level</label>
                                                                <div class="col-8">
                                                                    <select name="group_level" class="form-control" id="exampleSelect1">
                                                                        <? for ($i = 1; $i < 100; $i++): ?>
                                                                            <option value="<?= $i ?>" <?= in_array($i, $used_group_levels) ? 'disabled' : '' ?>><?= $i ?><?= in_array($i, $used_group_levels) ? ': used' : '' ?></option>
                                                                        <? endfor; ?>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button id="add_group_btn" type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">

                            <!--begin: Datatable -->
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Level</th>
                                    <th>Total Users</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                            </table>

                            <!--end: Datatable -->
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
<script src="/aassets/js/admin/dt_groups_table.js" type="text/javascript"></script>
<script src="/aassets/js/admin/groups_table.js" type="text/javascript"></script>
</body>
<!-- end::Body -->
</html>
