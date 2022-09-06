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
   * @property  Mentor_model mentor_model
   * @property  CI_DB_utility dbutil
   */
  class Mentor extends MX_Controller
  {
    private $data;
    
    public function __construct()
    {
      parent::__construct();
      if (!$this->ion_auth->logged_in()) {
        $this->session->set_flashdata('message', 'You must login to view this page');
        $this->session->set_flashdata('message_type', 'danger');
        redirect('login', 'refresh');
      }
      if (!$this->ion_auth->in_group(3)) {
        $this->session->set_flashdata('message', 'You must be an admin to view this page');
        $this->session->set_flashdata('message_type', 'danger');
        redirect('login', 'refresh');
      }
      $this->load->model('mentor_model');
      if (empty($this->data['the_user'])) {
        $this->data['the_user'] = $this->ion_auth->user()->row();
        $this->lang->load('general', $this->data['the_user']->language);
      }
      
      $this->load->driver('cache');
      //$this->output->enable_profiler(TRUE);
      // $this->settings_model->clean_cache();
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
      $this->data['courses'] = $this->mentor_model->get_courses();
      $this->load->view('users_score', $this->data);
    }
    
    public function test()
    {
//     echo $this->db
//       ->where('user_id','108')
//       ->where('tid','13')
//       ->delete('___user_test_answers');
//    echo url_title('Awaken (ft. Valerie Broussard) ¦ Season 2019 Cinematic - League of Legends.mp4','_');
//    echo '<br>';
      // echo $this->security->sanitize_filename();
      //echo preg_replace('/[^A-Za-z0-9\-\_\.]/', '', '../../Awaken (ft. Valerie Broussard) ¦ Season 2019 Cinematic - League of Legends.mp4');
//
//    for ($i=0;$i<100;$i++) {
//
//       file_put_contents(FCPATH.'sample/'.uniqid().'.jpg', file_get_contents('https://thispersondoesnotexist.com/image'));
//
//    }
    }
    
    public function signout()
    {
      $logout = $this->ion_auth->logout();
      redirect('', 'refresh');
    }
  }

