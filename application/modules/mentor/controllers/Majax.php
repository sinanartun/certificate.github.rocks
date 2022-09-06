<?php defined('BASEPATH') OR exit('No direct script access allowed');
  
  /**
   * @property  ion_auth|ion_auth_model $ion_auth
   * @property  CI_Form_validation $form_validation
   * @property  CI_Input input
   * @property  CI_Config config
   * @property  CI_Lang lang
   * @property  CI_Session session
   * @property  table_model table_model
   * @property  Mentor_model admin_model
   */
  class Majax extends MX_Controller
  {
    
    public function __construct()
    {
      
      parent::__construct();
      
      
      if (!$this->ion_auth->in_group(3)) {
        echo 'no mentor';
        return;
        
      }
      
      
      $this->load->model([
        'Mentor_model',
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
  
  
    public function users_score_table()
    {
      $return = $this->table_model->users_score_table();
      echo json_encode($return);
    }
    
    public function heartbeat()
    {
      $return = $this->admin_model->heartbeat();
      echo json_encode($return);
    }
  }
