<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><?php $this->load->view('shared/head_start'); ?>
<?php $this->load->view('shared/css_all'); ?>
<link href="/aassets/plugins/custom/kanban/kanban.bundle.css" rel="stylesheet" type="text/css"/>
<link href="/assets/css/pages/wizard/wizard-1.css" rel="stylesheet" type="text/css" />
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
          
          
          <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            
            
            <div class="row" data-sticky-container="">
              <div class="col-md-4">
                <div class="kt-portlet sticky kt-sticky add_new_course_css" data-sticky="true" data-margin-top="100px" data-sticky-for="1023" data-sticky-class="kt-sticky">
                  <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="col-md-12">
                      
                      <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                          <h3 class="kt-portlet__head-title">
                            Kurs Ekleme Tablosu
                          </h3>
                        </div>
                      </div>
                      <div class="kt-portlet__body">
                        <div id="kanban3"></div>
                        <div class="kanban-toolbar">
                          
                          
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="kanban-toolbar__title">
                                Add New Section
                              </div>
                              <form id="add_new_section_form" action="">
                                <div class="form-group row">
                                  <div class="col-12">
                                    <input name="section_name" id="section_name" class="form-control" type="text" placeholder="Section Name"/>
                                    
                                    <br/>
                                    <button type="submit" class="btn btn-success pull-right" id="add_section">Add Section</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <div class="col-lg-12">
                              <div class="kanban-toolbar__title">
                                Add New Lecture
                              </div>
                              <form action="" id="add_new_lecture_form">
                                <div class="form-group">
                                  <input name="lecture_name" id="lecture_name" class="form-control" type="text" placeholder="Lecture Name"/><br/>
                                  <select id="section_selector" name="section_selector" class="form-control">
                                    <option value="">Select a Board</option>
                                    <option value="_board1">Board 1</option>
                                    
                                  </select>
                                  <br/>
    
                                  <button class="btn btn-primary pull-right" id="add_lecture">Add Lecture</button>
                                </div>
                              </form>
                              
                            </div>


                          


                          </div>
                        
                        
                        </div>
                      </div>
                    
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="kt-portlet">
                  <div class="kt-portlet__body">
                    <div class="col-lg-12">
                      <div class="kt-portlet">
                        <div class="kt-portlet__head">
                          <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                              Kurs İçeriği Tablosu
                            </h3>
                          </div>
                        </div>
                        <div class="kt-portlet__body">
                          <div class="row">
                            <div id="section_div" class="col-md-12"></div>
                          </div>
                        
                        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
          
          </div>
          
          
          <!--          <div class="row sticky-container">-->
          <!--            <div class="col-lg-6">-->
          <!--                  <div class="kt-portlet sticky" data-sticky="true" >-->
          <!--                      <div class="kt-portlet__head">-->
          <!--                          <div class="kt-portlet__head-label">-->
          <!--                              <h3 class="kt-portlet__head-title">-->
          <!--                                  Dynamic Board & Task Demo-->
          <!--                              </h3>-->
          <!--                          </div>-->
          <!--                      </div>-->
          <!--                      <div class="kt-portlet__body">-->
          <!--                          <div id="kanban3"></div>-->
          <!--                          <div class="kanban-toolbar">-->
          <!--                              <div class="row">-->
          <!--                                  <div class="col-lg-4">-->
          <!--                                      <div class="kanban-toolbar__title">-->
          <!--                                          Add New Board-->
          <!--                                      </div>-->
          <!--                                      <div class="form-group row">-->
          <!--                                          <div class="col-12">-->
          <!--                                              <input id="kanban-add-board" class="form-control" type="text" placeholder="Board Name" /><br />-->
          <!--                                              <select id="kanban-add-board-color" class="form-control">-->
          <!--                                                  <option value="">Select a Board Color</option>-->
          <!--                                                  <option value="brand">Brand</option>-->
          <!--                                                  <option value="brand-light">Brand Light</option>-->
          <!--                                                  <option value="primary">Primary</option>-->
          <!--                                                  <option value="primary-light">Primary Light</option>-->
          <!--                                                  <option value="success">Success</option>-->
          <!--                                                  <option value="success-light">Success Light</option>-->
          <!--                                                  <option value="info">Info</option>-->
          <!--                                                  <option value="info-light">Info Light</option>-->
          <!--                                                  <option value="warning">Warning</option>-->
          <!--                                                  <option value="warning-light">Warning Light</option>-->
          <!--                                                  <option value="danger">Danger</option>-->
          <!--                                                  <option value="danger-light">Danger Light</option>-->
          <!--                                              </select>-->
          <!--                                              <br />-->
          <!--                                              <button class="btn btn-success" id="addBoard">Add board</button>-->
          <!--                                          </div>-->
          <!--                                      </div>-->
          <!--                                  </div>-->
          <!--                                  <div class="col-lg-4">-->
          <!--                                      <div class="kanban-toolbar__title">-->
          <!--                                          Add New Task-->
          <!--                                      </div>-->
          <!--                                      <div class="form-group">-->
          <!--                                          <input id="kanban-add-task" class="form-control" type="text" placeholder="Task Name" /><br />-->
          <!--                                          <select id="kanban-select-task" class="form-control">-->
          <!--                                              <option value="">Select a Board</option>-->
          <!--                                              <option value="_board1">Board 1</option>-->
          <!--                                              <option value="_board2">Board 2</option>-->
          <!--                                              <option value="_board3">Board 3</option>-->
          <!--                                          </select>-->
          <!--                                          <br />-->
          <!--                                          <select id="kanban-add-task-color" class="form-control">-->
          <!--                                              <option value="">Select a Task Color</option>-->
          <!--                                              <option value="brand">Brand</option>-->
          <!--                                              <option value="primary">Primary</option>-->
          <!--                                              <option value="success">Success</option>-->
          <!--                                              <option value="info">Info</option>-->
          <!--                                              <option value="warning">Warning</option>-->
          <!--                                              <option value="danger">Danger</option>-->
          <!--                                          </select>-->
          <!--                                          <br />-->
          <!--                                          <button class="btn btn-primary" id="addTask">Add Task</button>-->
          <!--                                      </div>-->
          <!--                                  </div>-->
          <!--                                  <div class="col-lg-4">-->
          <!--                                      <div class="kanban-toolbar__title">-->
          <!--                                          Remove Board-->
          <!--                                      </div>-->
          <!--                                      <div class="form-group row">-->
          <!--                                          <div class="col-12">-->
          <!--                                              <select id="kanban-select-board" class="form-control">-->
          <!--                                                  <option value="">Select a Board</option>-->
          <!--                                                  <option value="_board1">Board 1</option>-->
          <!--                                                  <option value="_board2">Board 2</option>-->
          <!--                                                  <option value="_board3">Board 3</option>-->
          <!--                                              </select>-->
          <!--                                              <br />-->
          <!--                                              <button class="btn btn-danger" id="removeBoard2">Remove Board</button>-->
          <!--                                          </div>-->
          <!--                                      </div>-->
          <!--                                  </div>-->
          <!--                              </div>-->
          <!--                          </div>-->
          <!--                      </div>-->
          <!--                  </div>-->
          <!--              </div>-->
          <!--            <div class="col-lg-6">-->
          <!--              <div class="kt-portlet">-->
          <!--                <div class="kt-portlet__head">-->
          <!--                  <div class="kt-portlet__head-label">-->
          <!--                    <h3 class="kt-portlet__head-title">-->
          <!--                      Kanban Interactivity Demo-->
          <!--                    </h3>-->
          <!--                  </div>-->
          <!--                </div>-->
          <!--                <div class="kt-portlet__body">-->
          <!--                  <div class="row">-->
          <!--                    <div id="kanban4" class=" col-md-12"></div>-->
          <!--                  </div>-->
          <!---->
          <!--                  <div class="kanban-toolbar">-->
          <!--                    <button class="btn btn-brand" id="addDefault">Add "Default" board</button>-->
          <!--                    <button class="btn btn-danger" id="addToDo">Add element in "To Do" Board</button>-->
          <!--                    <button class="btn btn-success" id="removeBoard">Remove "Done" Board</button>-->
          <!--                  </div>-->
          <!--                </div>-->
          <!--              </div>-->
          <!--            </div>-->
          <!--          </div>-->
        
        
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
<script src="/aassets/plugins/custom/kanban/kanban.bundle.js" type="text/javascript"></script>
<script src="/assets/js/pages/components/extended/sticky-panels.js" type="text/javascript"></script>
<script src="/assets/js/pages/custom/wizard/wizard-1.js" type="text/javascript"></script>
<script src="/aassets/js/admin/add_new_course.js" type="text/javascript"></script>


</body>
<!-- end::Body -->
</html>
