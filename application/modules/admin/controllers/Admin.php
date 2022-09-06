<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  /**
   * @property  CI_Security security
   * @property  CI_Form_validation $form_validation
   * @property  ion_auth|ion_auth_model $ion_auth
   * @property  CI_Config config
   * @property  CI_Email email
   * @property  CI_Session session
   * @property  CI_Input input
   * @property  CI_URI uri
   * @property  CI_Output output
   * @property  CI_DB_query_builder db
   * @property  CI_Lang lang
   * @property  Admin_model admin_model
   * @property  CI_DB_utility dbutil
   * @property  Test_model test_model
   */
  class Admin extends MX_Controller {
    private $data;
    
    public function __construct()
    {
      parent::__construct();
      if (!$this->ion_auth->logged_in()) {
        $this->session->set_flashdata('message', 'You must login to view this page');
        $this->session->set_flashdata('message_type', 'danger');
        redirect('login', 'refresh');
      }
      if (!$this->ion_auth->is_admin()) {
        $this->session->set_flashdata('message', 'You must be an admin to view this page');
        $this->session->set_flashdata('message_type', 'danger');
        redirect('login', 'refresh');
      }
      $this->load->model('admin_model');
      $this->load->model('test_model');
      if (empty($this->data['the_user'])) {
        $this->data['the_user'] = $this->ion_auth->user()->row();
        $this->lang->load('general', $this->data['the_user']->language);
      }
      $this->self_cron();
      $this->load->driver('cache');
      //$this->output->enable_profiler(TRUE);
      // $this->settings_model->clean_cache();
    }
    
    public function add_new_course()
    {
      $this->data['m1'] = 'courses';
      $this->data['m2'] = 'add_new_course';
      $this->data['draft'] = $this->admin_model->get_sess_add_new_course();
      $this->load->view('add_new_course', $this->data);
    }
    
    public function courses_table()
    {
      $this->data['m1'] = 'courses';
      $this->data['m2'] = 'courses_table';
      $this->load->view('courses_table', $this->data);
    }
    
    public function system_log()
    {
      $this->data['m1'] = 'log';
      $this->data['m2'] = 'system_log';
      $this->load->view('system_log', $this->data);
    }
    
    public function user_log()
    {
      $this->data['m1'] = 'log';
      $this->data['m2'] = 'user_log';
      $this->load->view('user_log', $this->data);
    }
    
    public function dashboard()
    {
      $this->data['m1'] = 'dashboard';
      $this->load->view('dashboard', $this->data);
    }
  
    public function users_table()
    {
      $this->data['m1'] = 'users';
      $this->data['m2'] = 'users_table';
      $this->load->view('users_table', $this->data);
    }
  
    public function test_table()
    {
      $this->data['m1'] = 'tests';
      $this->data['m2'] = 'test_table';
      $this->load->view('test_table', $this->data);
    }

      public function users_score()

      {
          $this->data['m1'] = 'users';
          $this->data['m2'] = 'users_score';
          $this->data['courses'] = $this->admin_model->get_courses();
          $this->load->view('users_score', $this->data);
      }
  
    public function groups_table()
    {
      $this->data['used_group_levels'] = $this->admin_model->get_used_group_levels();
      $this->data['m1'] = 'users';
      $this->data['m2'] = 'groups_table';
      $this->load->view('groups_table', $this->data);
    }
  
    public function add_user()
    {
//   $groups  =  $this->admin_model->get_all_groups();
//   echo '<pre>';
//   var_dump($groups);
//   die;
//
      $this->data['m1'] = 'users';
      $this->data['m2'] = 'add_user';
      $this->data['groups'] = $this->admin_model->get_all_groups();
      $this->load->view('add_user', $this->data);
    }
    
    public function inbox()
    {
      $this->data['users'] = $this->admin_model->get_inbox_users();
      $this->data['m1'] = 'message';
      $this->data['m2'] = 'inbox';
      $this->load->view('inbox', $this->data);
    }
    
    public function upload()
    {
      $this->data['m1'] = 'media';
      $this->data['m2'] = 'upload';
      $this->load->view('upload', $this->data);
    }
    
    public function add_article()
    {
      $this->data['m1'] = 'media';
      $this->data['m2'] = 'add_article';
      $this->load->view('add_article', $this->data);
    }
    
    public function edit_article()
    {
      $this->data['m1'] = 'media';
      $this->data['m2'] = 'edit_article';
      $this->data['articles'] = $this->admin_model->get_user_articles();
      $this->load->view('edit_article', $this->data);
    }
    
    public function library()
    {
      $this->data['m1'] = 'media';
      $this->data['m2'] = 'library';
      $this->load->view('library', $this->data);
    }
    
    public function error_log()
    {
      $this->data['m1'] = 'log';
      $this->data['m2'] = 'error_log';
      $this->load->view('error_log', $this->data);
    }
    
    public function edit_user($user_id = NULL)
    {
      $user = NULL;
      if (NULL !== $user_id) {
        $user = $this->admin_model->get_user($user_id);
        if (empty($user)) {
          redirect('admin/edit_user', 'refresh');
        }
      }
      $this->data['groups'] = $this->admin_model->get_all_groups();
      $this->data['user'] = $user;
      $this->data['m1'] = 'users';
      $this->data['m2'] = 'edit_user';
      $this->load->view('edit_user', $this->data);
    }
    
    public function edit_course()
    {
      $this->data['m1'] = 'courses';
      $this->data['m2'] = 'edit_course';
      $this->data['courses'] = $this->admin_model->get_courses();
      $this->load->helper('text');
      $this->load->view('edit_course', $this->data);
    }
    
    public function edit_course2($course_code = NULL)
    {
      $this->load->helper('text');
      if (NULL === $course_code || strlen($course_code) !== 32) {
        show_404();
      }
      $course_exist = $this->admin_model->is_course_exist($course_code);
      if (!$course_exist) {
        show_404();
      }
      $this->data['m1'] = 'courses';
      $this->data['m2'] = 'edit_course';
      $this->data['course'] = $this->admin_model->get_course($course_code);
      
      //echo '<pre>';var_dump($this->data['course']);die;
      
      $this->load->view('edit_course2', $this->data);
    }
    
    public function test()
    {
      //$this->test_model->insert_test_questions();
      //$this->test_model->replace();
      
      //$this->test_model->insert_tests_to_courses();
      //$this->db->cache_delete_all();
      
//      $this->load->library('encrypt');
//      $this->load->library('email');
//
//      $this->email->from('no-reply@traiive.com', 'traiive.com');
//      $this->email->to('sinanartun@gmail.com');
//
//      $this->email->subject('Sorunuza yeni bir cevap geldi');
//      $msg = 'Merhaba  <br> asagida linki bulunan kursda bir sorunuz vardi ve simdi yeni bir cevap geldi <br>';
//
//      $this->email->message($msg);
//      $this->email->send(FALSE);
//      echo $this->email->print_debugger(array('headers'));
//      $this->db->cache_delete_all();
//      die;
//      echo '<pre>';
//
//
//      $courses = $this->db->from('___courses')->where('active',1)->get()->result();
//
//      foreach($courses as $k => $course){
//        $sections = json_decode($course->sections);
//        foreach($sections as $kk => $section){
//          $lectures = $section->lectures;
//          foreach($lectures as $kkk => $lecture){
//            $data = new stdClass();
//            $data->sid =  $section->id;
//            $data->lid =  $lecture->id;
//            $data->cover_url =  $lecture->cover_url;
//            $data->description =  $lecture->description;
//            $data->media_duration =  $lecture->media_duration;
//            $data->media_duration_seconds =  $lecture->media_duration_seconds;
//            $data->media_duration_string =  $lecture->media_duration_string;
//            $data->media_name =  $lecture->media_name;
//            $data->media_type =  $lecture->media_type;
//            $data->media_url =  $lecture->media_url;
//            $data->name =  $lecture->name;
//
//            $this->db->reset_query();
//            $this->db->insert('___lectures',$data);
//
//          }
//
//
//
//
//
//        }
//
//
//      }
//
//
//
//      die;
//
//      $courses = $this->db->from('___courses')->where('active',1)->get()->result();
//
//      foreach($courses as $k => $course){
//        $sections = json_decode($course->sections);
//        foreach($sections as $kk => $section){
//          $data = new stdClass();
//          $data->sid =  $section->id;
//          $data->name =  $section->name;
//          $data->order =  $section->order;
//          $data->media_duration_seconds =  $section->media_duration_seconds;
//          $data->media_duration =  $section->media_duration;
//          $data->course_code = $course->course_code;
//
//          $this->db->reset_query();
//          $this->db->insert('___sections',$data);
//
//        }
//
//
//      }
//
//
//    // print_r($courses);
//
//
//      die;
//      $this->db->cache_delete_all();
      
//      $res = $this->db->from('___test_questions')->like('question','8232')->get()->num_rows();
//      print_r($res);die;
      
     //echo 'test';die;
//     $res =  $this->db->select('id')->from('___tests')->get()->result_array();
//     echo '<pre>';
//     print_r($res);
//     $ids = array_column($res,'id');
//     // print_r($ids);
//
//      foreach($ids as $tid){
//
//        $test_questions = $this->db->from('___test_questions')
//          ->where('test_id',$tid)->get()->result();
//        foreach($test_questions as $k => $question){
//
//          $this->db->set('order',$k+1)->where('id',$question->id)->update('___test_questions');
//          $this->db->reset_query();
//
//        }
//
//
//      }
      
     
     
    }
  
    public function add_test()
    {
      $this->data['m1'] = 'tests';
      $this->data['m2'] = 'add_test';
      $this->data['sess_test'] = $this->admin_model->get_test(TRUE);
    
      $this->load->view('add_test', $this->data);
    }
  
    public function edit_test($tid=NULL)
    {
      if(NULL===$tid){
        show_404();
      }
      $this->data['m1'] = 'tests';
      $this->data['m2'] = 'edit_test';
      $this->data['test'] = $this->admin_model->get_test($tid);
    
      $this->load->view('edit_test', $this->data);
    }
  
    private function self_cron()
    {
      if (mt_rand(0, 1000) > 990) {
        $this->load->dbutil();
// Backup your entire database and assign it to a variable
        $prefs = [
          'tables' => [],   // Array of tables to backup.
          'ignore' => [],                     // List of tables to omit from the backup
          'format' => 'zip',                       // gzip, zip, txt
          'filename' => 'mybackup.sql',              // File name - NEEDED ONLY WITH ZIP FILES
          'add_drop' => TRUE,                        // Whether to add DROP TABLE statements to backup file
          'add_insert' => TRUE,                        // Whether to add INSERT data to backup file
          'newline' => "\n"                         // Newline character used in backup file
        ];
        $backup = $this->dbutil->backup($prefs);
// Load the file helper and write the file to your server
        $this->load->helper('file');
        $date = date('Y_m_d__h_i_s', time());
        write_file(FCPATH . 'backup/backup_' . $date . '.sql.zip', $backup);
        $this->email->from('sinanartun@gmail.com', 'Sinan ARTUN');
        $this->email->to('sinanartun@gmail.com');
        $this->email->subject('traiive.com Database backup');
        $this->email->message('traiive.com Database backup ');
        $this->email->attach(FCPATH . 'backup/backup_' . $date . '.sql.zip');
        $this->email->send();
//// Load the download helper and send the file to your desktop
//      $this->load->helper('download');
//      force_download('mybackup.gz', $backup);
      }
    }
    
    public function signout()
    {
      $logout = $this->ion_auth->logout();
      redirect('', 'refresh');
    }
  }

