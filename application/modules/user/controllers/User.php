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
   * @property  User_model user_model
   */
class User extends MX_Controller {
  private $data;

  public function __construct()
  {
    parent::__construct();

    if (!$this->ion_auth->logged_in()) {
      $_SESSION['last_url'] = $this->uri->uri_string();

      redirect('login', 'refresh');
    }



    if (empty($this->data['the_user'])) {
      $this->data['the_user'] = $this->ion_auth->user()->row();
      //echo '<pre>';var_dump($this->data['the_user']);die;
      $this->data['the_user']->is_admin = $this->ion_auth->is_admin();
      $this->lang->load('general', $this->data['the_user']->language);
    }

    $this->load->model('user_model');
    $this->load->helper('text');

  }

	public function index()
	{
    $this->data['courses'] = $this->user_model->get_courses();
    $my_courses = $this->user_model->get_user_courses();
    $this->data['my_courses_codes'] = $this->user_model->get_user_courses_codes($my_courses);
    $this->data['my_courses'] = $this->user_model->get_user_complete_rates($my_courses);


//	  echo '<pre>';
//	  print_r($my_courses);
//	  die;
    
    $this->load->view('index', $this->data);
  }

  public function play($course_code = NULL)
  {
    
    if(NULL === $course_code || strlen($course_code) !== 32 ){
      show_404();
    }
    $course = $this->user_model->get_course($course_code);
    if(empty($course)){
      show_404();
    }
    
    $user_have_course = $this->user_model->is_user_have_course($course_code);
    if(!$user_have_course){
      show_404();
    }
    

    


    $this->data['course'] = $course;
    $this->data['course_qa'] = $this->user_model->get_course_qa($course_code);
  
    $this->data['last_pbeat'] =  $this->user_model->get_last_pbeat($course_code);

   // echo '<pre>';var_dump( $this->data['course_qa']); die;
    $this->load->view('play', $this->data);
  }

  public function test()
  {
   $this->db->where('profile_img',NULL)->set('profile_img','default.jpg')->update('___users');
  
  
  }
  
  public function profile()
  {
  
    $my_courses =  $this->user_model->get_user_courses();
    //$this->data['my_courses_codes'] = $this->user_model->get_user_courses_codes($my_courses);
    $this->data['my_courses'] = $this->user_model->get_user_complete_rates($my_courses);
    
    //echo '<pre>';var_dump($this->data['my_courses']);die;
    $this->load->view('profile', $this->data);
  }
  
  public function edit_profile()
  {
  
  
//    $my_courses =  $this->user_model->get_user_courses();
//    //$this->data['my_courses_codes'] = $this->user_model->get_user_courses_codes($my_courses);
//    $this->data['my_courses'] = $this->user_model->get_user_complete_rates($my_courses);
    
    //echo '<pre>';var_dump($this->data['my_courses']);die;
    $this->load->view('edit_profile', $this->data);
  }
  
  public function signout()
  {
    $logout = $this->ion_auth->logout();
    redirect('', 'refresh');
  }
  
  public function s404()
  {
    show_404();
  }




}

