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
   * @property  home_model home_model
   */
class Home extends MX_Controller {
  private $data;
  
  public function __construct()
  {
    parent::__construct();
    
    $logged_in =  $this->ion_auth->logged_in();
   
    
    if ($logged_in) {
  
      
      
      if(isset($_SESSION['last_url'])){
        $last_url = $_SESSION['last_url'];
        unset($_SESSION['last_url']);
        redirect($last_url, 'refresh');
        
      }
  
      if($this->ion_auth->in_group(3)){
        redirect('m/index', 'refresh');
      }
  
      redirect('u/index', 'refresh');

    
    }
  
    
    
    
    $this->load->model('home_model');
    $this->load->helper('text');
  
  }
  
  public function index(): void
  {
    $this->data['courses'] = $this->home_model->get_courses();
    
    $this->load->view('index', $this->data);
  }
  
  public function reset_password($code = NULL): void
  {
    if (!$code) {
      show_404();
    }
    $this->load->helper('form');
    $this->load->library('form_validation');
    $user = $this->ion_auth->forgotten_password_check($code);
    
    if ($user) {
      // if the code is valid then display the password reset form
      
      $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
      $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');
      
      if ($this->form_validation->run() == false) {
        // display the form
        
        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        
        $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
        $this->data['new_password'] = array(
          'name' => 'new',
          'id' => 'new',
          'type' => 'password',
          'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
        );
        $this->data['new_password_confirm'] = array(
          'name' => 'new_confirm',
          'id' => 'new_confirm',
          'type' => 'password',
          'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
        );
        $this->data['user_id'] = array(
          'name' => 'user_id',
          'id' => 'user_id',
          'type' => 'hidden',
          'value' => $user->id,
        );
        $this->data['csrf'] = $this->_get_csrf_nonce();
        $this->data['code'] = $code;
        
        // render
        $this->_render_page('auth/reset_password', $this->data);
      } else {
        // do we have a valid request?
        if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {
          
          // something fishy might be up
          $this->ion_auth->clear_forgotten_password_code($code);
          
          show_error($this->lang->line('error_csrf'));
          
        } else {
          // finally change the password
          $identity = $user->{$this->config->item('identity', 'ion_auth')};
          
          $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));
          
          if ($change) {
            // if the password was successfully changed
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth/login", 'refresh');
          } else {
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect('auth/reset_password/' . $code, 'refresh');
          }
        }
      }
    } else {
      // if the code is invalid then send them back to the forgot password page
      $this->session->set_flashdata('message', $this->ion_auth->errors());
      redirect("auth/forgot_password", 'refresh');
    }
  }
  
  private function _get_csrf_nonce()
  {
    $this->load->helper('string');
    $key = random_string('alnum', 8);
    $value = random_string('alnum', 20);
    $this->session->set_flashdata('csrfkey', $key);
    $this->session->set_flashdata('csrfvalue', $value);
    
    return array($key => $value);
  }
  
  public function test()
  {
    echo 'heloo i am test';
  }
  
  public function login()
  {
    //$this->output->enable_profiler();
    //$this->session->set_flashdata('flash_activated', TRUE);
    //$this->session->set_flashdata('message', 'email activated');
    //$this->session->set_flashdata('message', 'value');
    
    $this->load->view('login');
  }
  public function s404()
  {
    show_404();
  }
  
  
  public function activate($id = NULL, $code = FALSE)
  {
    
    $activation = FALSE;
    if ($code !== FALSE) {
      $activation = $this->ion_auth->activate($id, $code);
    } else if ($this->ion_auth->is_admin()) {
      $activation = $this->ion_auth->activate($id);
    }
    
    if ($activation) {
      // redirect them to the auth page
      $this->session->set_flashdata('message', $this->ion_auth->messages());
      $this->session->set_flashdata('message_type', 'success');
      
      redirect("login", 'refresh');
    }
    
    
    $this->session->set_flashdata('message', $this->ion_auth->errors());
    $this->session->set_flashdata('message_type', 'danger');
    redirect("login", 'refresh');
    
  }
  
  
}

