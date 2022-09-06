<?php defined('BASEPATH') OR exit('No direct script access allowed');
  
  /**
   * @property  ion_auth|ion_auth_model $ion_auth
   * @property  CI_Form_validation $form_validation
   * @property  CI_Input input
   * @property  CI_Config config
   * @property  CI_Lang lang
   * @property  CI_Session session
   * @property  table_model table_model
   * @property  admin_model admin_model
   */
  class Aajax extends MX_Controller
  {
    
    public function __construct()
    {
      
      parent::__construct();
      
      
      if (!$this->ion_auth->is_admin()) {
        echo 'no admin';
        return;
        
      }
      
      
      $this->load->model([
        'admin_model',
        'table_model'
      ]);
      $this->load->library('form_validation');
      $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
      $this->lang->load('auth');
      header('Content-Type: application/json');
      
    }
    
    
    public function users_table()
    {
      $return = $this->table_model->users_table();
      echo json_encode($return);
    }
    
    public function save_course()
    {
      $return = $this->admin_model->save_course();
      echo json_encode($return);
    }
    
    public function get_course_sections()
    {
      $return = $this->admin_model->get_course_sections();
      echo json_encode($return);
    }
    
    public function groups_table()
    {
      $return = $this->table_model->groups_table();
      echo json_encode($return);
    }
    
    
    public function mini_users_table()
    {
      $return = $this->table_model->users_table(TRUE);
      echo json_encode($return);
    }
    
    public function add_user()
    {
      $return = $this->admin_model->add_user();
      echo json_encode($return);
    }
    
    public function add_group()
    {
      $return = $this->admin_model->add_group();
      echo json_encode($return);
    }
    
    public function update_user()
    {
      $return = $this->admin_model->update_user();
      echo json_encode($return);
    }
    
    public function update_lang()
    {
      $return = $this->admin_model->update_lang();
      echo json_encode($return);
    }
    
    public function upload_profile_image()
    {
      $return = $this->admin_model->upload_profile_image();
      echo json_encode($return);
    }
    
    public function update_profile_image()
    {
      $return = $this->admin_model->update_profile_image();
      echo json_encode($return);
    }
    
    public function update_course_image()
    {
      $return = $this->admin_model->update_course_image();
      echo json_encode($return);
    }
    
    public function preview_test()
    {
      $return = $this->admin_model->preview_test();
      echo json_encode($return);
    }
    
    public function preview_test2()
    {
      $return = $this->admin_model->preview_test2();
      echo json_encode($return);
    }
    
    public function del_test()
    {
      $return = $this->admin_model->del_test();
      echo json_encode($return);
    }
    
    public function upload_course_image()
    {
      $return = $this->admin_model->update_course_image(TRUE);
      echo json_encode($return);
    }
    
    public function crop_course_img()
    {
      $return = $this->admin_model->crop_course_img();
      echo json_encode($return);
    }
    
    public function publish_test()
    {
      $return = $this->admin_model->publish_test();
      echo json_encode($return);
    }
    
    public function test_table()
    {
      $return = $this->table_model->test_table();
      echo json_encode($return);
    }
    
    public function update_question()
    {
      $return = $this->admin_model->update_question();
      echo json_encode($return);
    }
    
    public function update_sess_question()
    {
      $return = $this->admin_model->update_sess_question();
      echo json_encode($return);
    }
    
    public function add_question_to_edit_test()
    {
      $return = $this->admin_model->add_question_to_edit_test();
      echo json_encode($return);
    }
    
    public function get_test_questions()
    {
      $return = $this->admin_model->get_test_questions();
      echo json_encode($return);
    }
    
    public function add_question_to_test()
    {
      $return = $this->admin_model->add_question_to_test(TRUE);
      echo json_encode($return);
    }
    
    public function del_user()
    {
      $return = $this->admin_model->del_user();
      echo json_encode($return);
    }
    
    public function add_test()
    {
      $return = $this->admin_model->add_test();
      echo json_encode($return);
    }
    
    public function get_sess_questions()
    {
      $return = $this->admin_model->get_sess_questions();
      echo json_encode($return);
      
    }
    
    public function get_edit_sess_question()
    {
      $return = $this->admin_model->get_edit_sess_question();
      echo json_encode($return);
      
    }
    
    public function users_score_table()
    {
      $return = $this->table_model->users_score_table();
      echo json_encode($return);
      
    }
    
    public function get_edit_question()
    {
      $return = $this->admin_model->get_edit_question();
      echo json_encode($return);
      
    }
    
    public function del_sess_question()
    {
      $return = $this->admin_model->del_sess_question();
      echo json_encode($return);
    }
    
    public function del_question()
    {
      $return = $this->admin_model->del_question();
      echo json_encode($return);
    }
    
    public function del_group()
    {
      $return = $this->admin_model->del_group();
      echo json_encode($return);
    }
    
    public function sent_msg()
    {
      $return = $this->admin_model->sent_msg();
      echo json_encode($return);
    }
    
    public function inbox_search_user()
    {
      $return = $this->admin_model->inbox_search_user();
      echo json_encode($return);
    }
    
    public function get_sections_tt()
    {
      $return = $this->admin_model->get_sections_tt();
      echo json_encode($return);
    }
    
    public function search_test($q)
    {
      $return = $this->table_model->search_test($q);
      echo json_encode($return);
    }
    
    public function get_inbox_from_user_msg()
    {
      $return = $this->admin_model->get_inbox_from_user_msg();
      echo json_encode($return);
    }
    
    public function upload_media()
    {
      $return = $this->admin_model->upload_media();
      echo json_encode($return);
    }
    
    public function remove_media()
    {
      $return = $this->admin_model->remove_media();
      echo json_encode($return);
    }
    
    public function library_table()
    {
      $return = $this->table_model->media_table();
      echo json_encode($return);
    }
    
    public function search_library()
    {
      $return = $this->table_model->search_library();
      echo json_encode($return);
    }
    
    public function search_library_article($q)
    {
      $return = $this->table_model->search_library_article($q);
      echo json_encode($return);
    }
    
    public function save_sess_add_new_course()
    {
      $return = $this->admin_model->save_sess_add_new_course();
      echo json_encode($return);
    }
    
    public function get_sess_sections()
    {
      $return = $this->admin_model->get_sess_sections();
      echo json_encode($return);
    }
     public function search_yt_list()
    {
      $return = $this->admin_model->search_yt_list();
      echo json_encode($return);
    }
    
    public function submit_new_course()
    {
      $return = $this->admin_model->submit_new_course();
      echo json_encode($return);
    }
    
    public function courses_table()
    {
      $return = $this->table_model->courses_table();
      echo json_encode($return);
    }
    
    public function system_log_table()
    {
      $return = $this->table_model->system_log_table();
      echo json_encode($return);
    }
    
    public function error_log_table()
    {
      $return = $this->table_model->error_log_table();
      echo json_encode($return);
    }
    
    public function remove_course()
    {
      $return = $this->admin_model->remove_course();
      echo json_encode($return);
    }
    
    public function add_article_save_draft()
    {
      $return = $this->admin_model->add_article_save_draft();
      echo json_encode($return);
    }
    
    public function add_article_save()
    {
      $return = $this->admin_model->add_article_save();
      echo json_encode($return);
    }
    
    public function get_html_file()
    {
      $return = $this->admin_model->get_html_file();
      echo json_encode($return);
    }
    
    public function add_article_get_draft()
    {
      $return = $this->admin_model->add_article_get_draft();
      echo json_encode($return);
    }
    
    public function edit_article_update()
    {
      $return = $this->admin_model->edit_article_update();
      echo json_encode($return);
    }
    
    public function heartbeat()
    {
      $return = $this->admin_model->heartbeat();
      echo json_encode($return);
    }
  }
