<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  ion_auth|ion_auth_model $ion_auth
 * @property  CI_Form_validation      $form_validation
 * @property  CI_Input                input
 * @property  CI_Config               config
 * @property  CI_Lang                 lang
 * @property  home_model             home_model
 */
class Hajax extends MX_Controller
{

  public function __construct()
  {

    parent::__construct();
    $this->load->model('home_model');
    //$this->load->model('key_model');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
    $this->lang->load('auth');
    header('Content-Type: application/json');

  }


  public function login()
  {
    $return = $this->home_model->login();
    echo json_encode($return);
  }


  public function register()
  {
    $return = $this->home_model->register();
    echo json_encode($return);
  }

  public function forgot_password()
  {
    $return = $this->home_model->forgot_password();
    echo json_encode($return);

  }
  
  public function register_course()
  {
    $return = $this->home_model->register_course();
    echo json_encode($return);

  }



}
