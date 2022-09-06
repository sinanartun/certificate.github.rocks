<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  ion_auth|ion_auth_model $ion_auth
 * @property  CI_Form_validation      $form_validation
 * @property  CI_Input                input
 * @property  CI_Config               config
 * @property  CI_Lang                 lang
 * @property  user_model             user_model
 */
class Uajax extends MX_Controller
{

  public function __construct()
  {

    parent::__construct();
    $this->load->model('user_model');
    //$this->load->model('key_model');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
    $this->lang->load('auth');
    if (!$this->ion_auth->logged_in()) {
      $res = new stdClass();
      $res->status = 'error';
      $res->msg = 'logout';

      echo json_encode($res);
    }
    header('Content-Type: application/json');

  }
 



  public function register_course()
  {
    $return = $this->user_model->register_course();
    echo json_encode($return);

  }

public function answer_test_question()
  {
    $return = $this->user_model->answer_test_question();
    echo json_encode($return);

  }

  public function ask_question()
  {
    $res = $this->user_model->ask_question();
    echo json_encode($res);
  }

  public function get_answers()
  {
    $res = $this->user_model->get_answers();
    echo json_encode($res);
  }

  public function get_qa()
  {
    $res = $this->user_model->get_qa();
    echo json_encode($res);
  }
  public function del_q()
  {
    $res = $this->user_model->del_q();
    echo json_encode($res);
  }
  public function answer_q()
  {
    $res = $this->user_model->answer_q();
    echo json_encode($res);
  }
  public function like_q()
  {
    $res = $this->user_model->like_q();
    echo json_encode($res);
  }
  public function update_q()
  {
    $res = $this->user_model->update_q();
    echo json_encode($res);
  }
   public function search_qa(): void
   {
    $res = $this->user_model->search_qa();
    echo json_encode($res);
  }
  
  public function start_video_play(): void
  {
    $res = $this->user_model->start_video_play();
    echo json_encode($res);
  }
  public function end_video_play(): void
  {
    $res = $this->user_model->end_video_play();
    echo json_encode($res);
  }
   public function get_finished_lectures(): void
  {
    $res = $this->user_model->get_finished_lectures();
    echo json_encode($res);
  }
  
  public function pbeat()
  {
    $res = $this->user_model->pbeat();
    echo json_encode($res);
    
  }
   public function get_test_result()
  {
    $res = $this->user_model->get_test_result();
    echo json_encode($res);
    
  }
  public function test_next_question()
  {
    $res = $this->user_model->test_next_question();
    echo json_encode($res);
    
  }
   public function test_previous_question()
  {
    $res = $this->user_model->test_previous_question();
    echo json_encode($res);
    
  }
  
  public function start_test()
  {
    $return = $this->user_model->start_test();
    echo json_encode($return);
    
  }
  
 public function get_lecture_desc()
  {
    $res = $this->user_model->get_lecture_desc();
    echo json_encode($res);
    
  }
  
  public function update_profile_image()
  {
    $res = $this->user_model->update_profile_image();
    echo json_encode($res);
    
  }
  public function reset_test()
  {
    $res = $this->user_model->reset_test();
    echo json_encode($res);
    
  }
  public function update_profile()
  {
    $res = $this->user_model->update_profile();
    echo json_encode($res);
    
  }




//  function __destruct() {
//   sleep(1);
//  }
  
  
  }
