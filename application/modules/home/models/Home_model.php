<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_DB_query_builder $db
 * @property CI_Loader $load
 * @property CI_Config config
 * @property null|string tables
 * @property CI_Cache cache
 * @property  ion_auth|ion_auth_model ion_auth
 * @property  ion_auth_model ion_auth_model
 * @property  CI_Session $session
 * @property  CI_Lang lang
 * @property  CI_Upload upload
 * @property  CI_Image_lib image_lib
 * @property  CI_Pagination pagination
 * @property  CI_Security security
 *
 */
class Home_model extends CI_Model
{

  private $data;

  public function __construct()
  {
    parent::__construct();
  }
  
  
  public function get_courses(): array
  {
   
    $this->db->cache_on();
    $this->db->select('c.*, u.first_name, u.last_name');
    $this->db->from(  '___courses c');
    $this->db->join( '___users u', 'c.user_id=u.id', 'left');
  
//    $res = $this->db->limit(20)->where('c.active',1)
//      ->order_by('order')
//      ->get()->result();
    $res = $this->db->limit(20)->where('c.active',1)->get()->result();
    $this->db->cache_off();
    return $res;
  }
  
  public function login()
  {
    $return = new stdClass();
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');


    if ($this->form_validation->run() !== true) {


      $identity = $this->input->post('email');
      $log = 'Authentication Failed !!!';
      $log .= ' ERROR: ' . (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
      $log .= ' Username: ' . $identity;
      $this->add_system_log($log, 7);
      $msg = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
      return $this->re('e',$msg);
    }


    $return->status = 'success';
    $identity = $this->input->post('email');
    $password = $this->input->post('password');
    $remember = true;//(bool)$this->input->post('remember');
    $login = $this->ion_auth->login($identity, $password, $remember);
    $identity_column = $this->config->item('identity', 'ion_auth');
    if ($login) {
      

      $this->update_user_ip($identity_column, $identity);
      $msg = 'Logged in Successfully';
      $log = 'User Logged in Successfully ';
      $log .= ' Username: ' . $identity;
      $this->add_system_log($log, 1);
      $data = [
          'redirect' => base_url('')
      ];

      return $this->re('s',$msg,$data);

    }
    // if the login was un-successful
    // check if user is disabled by admin
    $identity = $this->get_encoded_text($identity);
    $q = $this->db->from($this->ion_auth_model->tables['users'])->where($identity_column, $identity)->get();

    if (!$q || $q->num_rows() < 0) {

      return $this->re();
    }

    $user = $q->row();


    if (isset($user->active) && abs($user->active) === 0) {
      $return->status = 'error';
      $msg = 'This User account has been disabled.';

      $log = 'Authentication Failed !!!';
      $log .= ' ERROR: This User account has been disabled.' .
      $log .= ' Username: ' . $identity;
      $this->add_system_log($log, 9);

      return $this->re('e',$msg);
    }


    $log = 'Authentication Failed !!!';
    $log .= ' ERROR: ' . (validation_errors()) ? validation_errors() : 'Username or password is incorrect !!!';
    $log .= ' Username: ' . $identity;
    $this->add_system_log($log, 8);
    
    $msg = (validation_errors()) ? validation_errors() : 'Username or password is incorrect !!!';

    return $this->re('e',$msg);


  }

  public function add_system_log($log = null, $severity = 1)
  {
    if ($log === null) {
      return false;
    }
    $ip = $this->get_ip();
    $log .= ' IP:' . $ip;

    return $this->db->set('time_unix', time())->set('type', 'logon')->set('log', $log)->set('severity', $severity)->insert($this->ion_auth_model->tables['system_logs']);

  }


  private function clean_chat_users_cache()
  {


//        $keys = (array) $this->cache->redis->keys('chat_users_*');
//         $this->cache->redis->del_keys($keys);

  }

  private function get_ip()
  {

    if (function_exists('apache_request_headers')) {
      $headers = apache_request_headers();
    } else {
      $headers = $_SERVER;
    }
    if (array_key_exists('X-Forwarded-For', $headers) && filter_var($headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
      $the_ip = $headers['X-Forwarded-For'];
    } elseif (array_key_exists('HTTP_X_FORWARDED_FOR', $headers) && filter_var($headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
      $the_ip = $headers['HTTP_X_FORWARDED_FOR'];
    } else {

      $the_ip = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }
    if (!empty($the_ip)) {
      return $the_ip;
    }

    return '0.0.0.1';
  }

  private function update_user_ip($identity_column, $identity)
  {
    $ip = $this->get_ip();
    $this->db->set('ip_address', $ip)->where($identity_column, $identity)->update($this->ion_auth_model->tables['users']);
    $this->db->reset_query();
  }

  private function get_encoded_text($text)
  {
    $this->load->helper('text');
    $text = convert_accented_characters($text);
    $text_encoded = url_title($text, 'underscore', true);

    return $text_encoded;
  }

  private function re($status = null, $msg = null, $data = null, $pulsate = null)
  {
    $return = new stdClass();

    if ($status === 's') {
      $return->status = 'success';
    } else {
      $return->status = 'error';
    }

    if (null !== $msg) {
      $return->msg = $msg;
    } else {
      if ($status !== 's') {

        $return->msg = 'Unable to Complete Request !!!';
      }

    }

    if (null !== $data) {
      $return->data = $data;
    }
    if (null !== $pulsate) {
      $return->pulsate = $pulsate;
    }

    return $return;

  }

  public function get_stats()
  {
    //$this->db->cache_delete_all();
    $res = new stdClass();
    $this->db->cache_on();


    $res->all = $this->db->count_all('___products');
    $res->tools = $this->db->from('___products')->like('category', 'tools')->count_all_results();
    $res->furniture = $this->db->from('___products')->like('category', 'furniture')->count_all_results();
    $res->household = $this->db->from('___products')->like('category', 'household')->count_all_results();
    $res->garden = $this->db->from('___products')->like('category', 'garden')->count_all_results();
    $res->appliances = $this->db->from('___products')->like('category', 'appliances')->count_all_results();
    $res->electronics = $this->db->from('___products')->like('category', 'electronics')->count_all_results();
    $res->computers = $this->db->from('___products')->like('category', 'computers')->count_all_results();
    $res->bicycles = $this->db->from('___products')->like('category', 'bicycles')->count_all_results();
    $res->art_crafts = $this->db->from('___products')->like('category', 'art_crafts')->count_all_results();
    $res->sports_outdoors = $this->db->from('___products')->like('category', 'sports_outdoors')->count_all_results();
    $res->musicalinstruments = $this->db->from('___products')->like('category', 'musicalinstruments')->count_all_results();
    $res->antiques_collectibles = $this->db->from('___products')->like('category', 'antiques_collectibles')->count_all_results();
    $res->bags_luggage = $this->db->from('___products')->like('category', 'bags_luggage')->count_all_results();
    $res->womensclothing_shoes = $this->db->from('___products')->like('category', 'womensclothing_shoes')->count_all_results();
    $res->mensclothing_shoes = $this->db->from('___products')->like('category', 'mensclothing_shoes')->count_all_results();
    $res->jewelry_accessories = $this->db->from('___products')->like('category', 'jewelry_accessories')->count_all_results();
    $res->videogames = $this->db->from('___products')->like('category', 'videogames')->count_all_results();
    $res->booksmoviesmusic = $this->db->from('___products')->like('category', 'booksmoviesmusic')->count_all_results();
    $res->health_beauty = $this->db->from('___products')->like('category', 'health_beauty')->count_all_results();
    $res->petsupplies = $this->db->from('___products')->like('category', 'petsupplies')->count_all_results();
    $res->baby_kids = $this->db->from('___products')->like('category', 'baby_kids')->count_all_results();
    $res->toys_games = $this->db->from('___products')->like('category', 'toys_games')->count_all_results();

    $this->db->cache_off();

    return $res;

  }


  public function get_products($page = NULL, $cat = NULL)
  {

    $product_per_page = $this->config->item('products_per_page');



    $this->db->select('u.first_name, u.last_name, u.username, u.user_rate, u.hash, u.profile_pic, p.*');
    //$this->db->select('*');
    $this->db->from('___products p');
    $this->db->join('___users u', 'u.id=p.added_by', 'left');
    if (null !== $cat) {
      $this->db->like('p.category', $cat);
    }




    if (!empty($this->input->get('sort_by'))) {
      $sort_by = (string)$this->input->get('sort_by', true);

      if (strcmp($sort_by, 'latest') === 0) {
        $this->db->order_by('p.pid', 'DESC');
      } elseif (strcmp($sort_by, 'oldest') === 0) {
        $this->db->order_by('p.pid', 'ASC');
      } elseif (strcmp($sort_by, 'low_price') === 0) {
        $this->db->order_by('p.price', 'ASC');
      } elseif (strcmp($sort_by, 'high_price') === 0) {
        $this->db->order_by('p.price', 'DESC');
      } elseif (strcmp($sort_by, 'most_bids') === 0) {
        $this->db->order_by('p.bid_count', 'DESC');
      } elseif (strcmp($sort_by, 'fewest_bids') === 0) {
        $this->db->order_by('p.bid_count', 'ASC');
      }


    } else {
      $this->db->order_by('p.pid', 'DESC');
    }

    $status = (array)$this->input->get('status', true);
    if (!empty($status)) {
      $sneaky = 0;

      $system_status = ['waiting_for_shelf', 'on_shelf', 'sold'];

      foreach ( $status as $s ) {
        if (!in_array($s, $system_status, true)) {
          $sneaky++;
        }

      }

      if ($sneaky > 0) {
        log_message('error', __LINE__);
        show_404();

      }


      foreach ( $status as $s ) {
        if (strcmp($s, 'waiting_for_shelf') === 0) {
          $this->db->or_where('p.status', 20);
        } elseif (strcmp($s, 'on_shelf') === 0) {
          $this->db->or_where('p.status', 30);
        } elseif (strcmp($s, 'sold') === 0) {
          $this->db->or_where('p.status', 40);
        }

      }


    } else {
      $this->db->where_in('status', [20, 30, 40]);
    }


    if (!empty($this->input->get('q'))) {


      $search_in = 0;

      $q = $this->input->get('q', true);
      $this->db->group_start();
      if (!empty($this->input->get('title'))) {
        $search_in++;
        $this->db->or_like('p.title', $q);
      }

      if (!empty($this->input->get('tags'))) {
        $search_in++;
        $this->db->or_like('p.tags', $q);
      }
      if (!empty($this->input->get('desc'))) {
        $search_in++;
        $this->db->or_like('p.description', $q);
      }

      if ($search_in === 0) {
        $this->db->or_like('title', $q);
        $this->db->or_like('description', $q);
        $this->db->or_like('tags', $q);
      }

      $this->db->group_end();


    }


    if ($page !== null) {
      $page = (int)$page;
      $offset = 0;

      if ($page > 1) {
        $offset = $page - 1;
      }


      $this->db->limit($product_per_page, $offset * $product_per_page);

    }


    $q = $this->db->get();

    if (!$q || $q->num_rows() < 1) {
      return null;

    }

    $res = $q->result();


    foreach ( $res as $k => $r ) {
      $res[$k]->ago = $this->time_diff_string(date('Y-m-d H:i:s', $r->date_added), null);
      $res[$k]->tags = implode(', ', array_merge(json_decode($r->category), json_decode($r->tags)));


    }

    return $res;


  }

  public function get_products_count($category = null, $my_products = FALSE)
  {


    $this->db->reset_query();

    $this->db->from('___products');
    if ($category !== null) {
      $this->db->like('category', $category);
    }

    if ($my_products) {
      $this->db->where('added_by', $this->ion_auth->get_user_id());
    }


    if (!empty($this->input->get('q'))) {

      $search_in = 0;

      $q = $this->input->get('q', true);
      $this->db->group_start();
      if (!empty($this->input->get('title'))) {
        $search_in++;
        $this->db->or_like('title', $q);
      }

      if (!empty($this->input->get('tags'))) {
        $search_in++;
        $this->db->or_like('tags', $q);
      }
      if (!empty($this->input->get('desc'))) {
        $search_in++;
        $this->db->or_like('description', $q);
      }

      if ($search_in === 0) {
        $this->db->or_like('title', $q);
        $this->db->or_like('description', $q);
        $this->db->or_like('tags', $q);
      }

      $this->db->group_end();

    }

    $status = (array)$this->input->get('status', true);
    if (!empty($status)) {
      $sneaky = 0;

      $system_status = ['waiting_for_shelf', 'on_shelf', 'sold'];

      foreach ( $status as $s ) {
        if (!in_array($s, $system_status, true)) {
          $sneaky++;
        }

      }

      if ($sneaky > 0) {
        log_message('error', __LINE__);
        show_404();

      }


      foreach ( $status as $s ) {
        if (strcmp($s, 'waiting_for_shelf') === 0) {
          $this->db->or_where('status', 20);
        } elseif (strcmp($s, 'on_shelf') === 0) {
          $this->db->or_where('status', 30);
        } elseif (strcmp($s, 'sold') === 0) {
          $this->db->or_where('status', 40);
        }

      }


    } else {
      $this->db->where_in('status', [20, 30, 40]);
    }


    $res = $this->db->count_all_results();


    return $res;


  }

  public function get_user_products_count($username = NULL)
  {
    if (NULL === $username) {
      return false;
    }

    $user = $this->get_user($username);
    if (empty($user)) {
      return false;
    }

    if (!isset($user->id)) {
      return false;
    }


    $this->db->from('___products')
      ->where('added_by', $user->id);


    if (!empty($this->input->get('q'))) {

      $search_in = 0;

      $q = $this->input->get('q', true);
      $this->db->group_start();
      if (!empty($this->input->get('title'))) {
        $search_in++;
        $this->db->or_like('title', $q);
      }

      if (!empty($this->input->get('tags'))) {
        $search_in++;
        $this->db->or_like('tags', $q);
      }
      if (!empty($this->input->get('desc'))) {
        $search_in++;
        $this->db->or_like('description', $q);
      }

      if ($search_in === 0) {
        $this->db->or_like('title', $q);
        $this->db->or_like('description', $q);
        $this->db->or_like('tags', $q);
      }

      $this->db->group_end();

    }


    $res = $this->db->count_all_results();
//        if (empty($this->input->get('q', true))) {
//            $this->db->cache_off();
//        }


    return $res;


  }

  public function render_pagination($total_rows, $url_suffix = '')
  {
    $config['next_link'] = 'Next';
    $config['last_link'] = 'Last';
    $config['prev_link'] = 'Previous';
    $config['first_link'] = 'First';
    $config['num_links'] = 5;


    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';


    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';

    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';

    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';


    $config['cur_tag_open'] = '<li class="page-active"><a href="javascript:;" class="disabled">';
    $config['cur_tag_close'] = '</a></li>';
    $config['base_url'] = base_url($url_suffix);
    $config['total_rows'] = $total_rows;
    $config['per_page'] = 10;
    $config['use_page_numbers'] = true;
    $config['reuse_query_string'] = true;
    $this->pagination->initialize($config);

    return $this->pagination->create_links();
  }

  public function get_general_config()
  {
    $this->db->cache_on();
    $result = $this->db->from($this->ion_auth_model->tables['site_settings'])->get()->row();
    $this->db->cache_off();

    return $result;
  }

  public function get_requests_count($category = null)
  {
    if (empty($this->input->get('q', true))) {
      $this->db->cache_on();
    }

    $this->db->from('___products');
    if ($category !== null) {
      $this->db->like('category', $category);
    }

    if (!empty($this->input->get('q'))) {

      $q = $this->input->get('q', true);
      $this->db->group_start();

      $this->db->or_like('title', $q);
      $this->db->or_like('category', $q);
      $this->db->or_like('tags', $q);
      $this->db->or_like('description', $q);
      $this->db->group_end();

    }

    $res = $this->db->count_all_results();
    if (empty($this->input->get('q', true))) {
      $this->db->cache_off();
    }


    return $res;


  }

  public function get_product($sku = NULL)
  {

    if (NULL === $sku) {
      return false;
    }


    $this->db->select('u.first_name, u.last_name, u.username, u.user_rate, u.hash, u.profile_pic, p.*');
    $this->db->from('___products p');
    $this->db->join('___users u', 'u.id=p.added_by', 'left');
    $this->db->where('p.sku', $sku);


    $q = $this->db->get();

    if (!$q || $q->num_rows() < 1) {
      return null;

    }

    $res = $q->row();


    $res->ago = $this->time_diff_string(date('Y-m-d H:i:s', $res->date_added), null);
    $res->tags = implode(', ', array_merge(json_decode($res->category), json_decode($res->tags)));
    $res->location_tags = '';
    if (!empty($res->location)) {
      $locations = [];
      foreach ( json_decode($res->location) as $loc ) {
        $locations[] = $this->get_country_name($loc);
      }
      $res->location_tags = implode(', ', $locations);
    }

    return $res;
  }


  public function time_diff_string($from, $to = null, $full = false, $ago = true)
  {
    if ($to == null) {
      $to = 'now';
    }
    $from = new DateTime($from);
    $to = new DateTime($to);
    $diff = $to->diff($from);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = [
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
    ];
    foreach ( $string as $k => &$v ) {
      if (!empty($k)) {
        if ($diff->$k) {
          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
          unset($string[$k]);
        }
      }
    }

    if (!$full) {
      $string = array_slice($string, 0, 1);
    }

    return $string ? implode(', ', $string) . ($diff->invert === 1 ? ($ago ? ' ago' : '') : ' later') : 'just now';
  }

  private function get_country_name($code = null)
  {

    if (null === $code) {
      return null;
    }


    $this->db->cache_on();
    $this->db->from('___country_list_EN');

    $this->db->where('code', $code)->limit(1);


    $row = $this->db->get()->row();

    $this->db->cache_off();

    return isset($row->name) ? $row->name : null;


  }

  public function get_product_view_count($sku)
  {
    return $this->db->from('___products_view')->like('sku_ip', $sku . '_', 'after', false)->count_all_results();

  }


  public function add_product_view($sku)
  {
    $ip = $this->get_ip();
    $sku_ip = $sku . '_' . $ip;

    $nor = $this->db->from('___products_view')->where('sku_ip',$sku_ip)->get()->num_rows();
    if ($nor < 1) {
      $res = $this->db->insert('___products_view',['sku_ip'=>$sku_ip,'time'=>time()]);
      $this->db->reset_query();
      return $res;
    }


    return TRUE;


  }

  public function get_bids($rid = null)
  {

    if (null === $rid || mb_strlen($rid) !== 32) {
      return null;
    }


    $this->db->from('___bids b');
    $this->db->join('___users u', 'b.user_id=u.id', 'left');
    $this->db->where('b.rid', $rid);


    $q = $this->db->get();

    if ($q && $q->num_rows() > 0) {
      return $q->result();


    }

    return null;
  }

  public function register()
  {


    $tables = $this->config->item('tables', 'ion_auth');
    $identity_column = $this->config->item('identity', 'ion_auth');


    // validate form input
    $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
    $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
    if ($identity_column !== 'email') {
      $this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
      $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
    } else {
      $this->form_validation->set_rules('email',
        $this->lang->line('create_user_validation_email_label'),
        'required|valid_email|is_unique[' . $tables['users'] . '.email]',
        [
          'required' => 'You have not provided %s.',
          'is_unique' => 'This Email %s already exists.'
        ]);
    }
//    $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
//    $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
    $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'),
      'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
    $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_confirm_label'), 'required|matches[password]');

//    $this->form_validation->set_rules('account_type', 'Account Type', 'trim');
//    $this->form_validation->set_rules('address', 'Address', 'trim');

//    $account_type = $this->input->post('account_type');
//    $account_type = 'client';
//    if ($account_type !== 'business') {
//      $account_type = 'client';
//    }


    if ($this->form_validation->run() == true) {
      $email = strtolower($this->input->post('email'));
      //$identity = $this->input->post('identity');
      $first_name =  $this->input->post('first_name');
      $last_name =  $this->input->post('last_name');
      $identity = $first_name. ' ' . $last_name;
      
      $password = $this->input->post('password');

      $additional_data = [
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
      
        'hash' => md5($email),
        'profile_pic' => 'blank_profile.png'
      ];


      if ($this->form_validation->run() === true && $this->ion_auth->register($identity, $password, $email, $additional_data)) {
        return $this->re('s', 'New User Registered Successfully. Please Check Your email and Click Activation Code');

      }
    }


    // display the create user form
    // set the flash data error message if there is one
    $msg = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

    //$msg = $this->email->print_debugger();

    return $this->re('e', $msg);


  }

  public function forgot_password()
  {
    $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
    if ($this->form_validation->run() !== true) {
      //setup the input

      //set any errors and display the form
      $msg = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

      return $this->re('e', $msg);

    }

    //run the forgotten password method to email an activation code to the user
    $forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

    if ($forgotten) { //if there were no errors
      $msg = $this->ion_auth->messages();

      return $this->re('s', $msg);

    }
  
    $msg = $this->ion_auth->messages();
    $email = $this->input->post('email');
    
    $this->db->from($this->config->item('tables','ion_auth')['users']);
    $nor = $this->db->where('email',$email)->get()->num_rows();
    if($nor < 1){
      $msg = 'There is no account with this email !!!';
    }

    

    return $this->re('e', $msg);
  }
  
  public function register_course()
  {
    $user_id = $this->ion_auth->get_user_id();
    if(empty($user_id)){
      return $this->re('e','Please Login');
    }
    
    $course_code = $this->input->post('course_code');
    if (empty($course_code) || strlen($course_code) !== 32) {
      return $this->re('e','');
    }
    
    
    $course_exist = $this->db->from('___courses')->where('course_code',$course_code)->get()->num_rows();
    if(!$course_exist){
      
      return $this->re('e','11');
    }
    
    $already_registered = $this->db
        ->from('___courses')
        ->where('user_id',$user_id)
        ->where('course_code',$course_code)
        ->get()->num_rows();
    
    if($already_registered > 0){
      return $this->re('e','You have already registered this course');
    }
    
    
    $data = [
        'user_id' => $user_id,
        'course_code' => $course_code,
        'date_start' => time()
        
    ];
    
    $this->db->insert('___user_courses',$data);
    $this->db->reset_query();
    
    
    return $this->re('s','Course Registered Successfully');
    
  }
  
  
  public function updateCart()
  {
    /***********************************/

    $cleanupPrice = 100;
    $emptyPrice = 150;
    $priceTagPrice = 0.2;
    $rentPriceDaily = 100;
    $rentPriceWeekly = 500;

    /***********************************/


    $startDate = $this->input->post('startDate');
    $endDate = $this->input->post('endDate');
    $cleanup = filter_var($this->input->post('cleanup'), FILTER_VALIDATE_BOOLEAN);;
    $empty = filter_var($this->input->post('empty'), FILTER_VALIDATE_BOOLEAN);
    $priceTags = (int)$this->input->post('priceTags');


    $startDateTime = NULL;
    $endDateTime = NULL;


    try {
      $startDateTime = new DateTime($startDate);
    } catch (Exception $e) {

    }
    try {
      $endDateTime = new DateTime($endDate);
    } catch (Exception $e) {

    }


    if (!is_object($startDateTime) || !is_object($endDateTime)) {

      return $this->re('e', 'Invalid date time !!!', $startDate);
    }

    $interval = $startDateTime->diff($endDateTime);
    $diff = $interval->format('%R%a');


    if ($diff < 0) {
      return $this->re('e', 'Start date can not be earlier than end date !!!');
    } elseif ($diff == 0) {
      return $this->re('e', 'Start date and end date can not be same day !!!');

    }


    $rentCost = 0;
    $totalCost = 0;

    $totalWeek = floor($diff / 7);
    $modc = $diff % 7;


    $rentPeriod = '';

    if ($totalWeek > 0) {
      $rentPeriod .= $totalWeek . '&nbsp;week&nbsp;';
    }
    if ($modc > 0) {
      $rentPeriod .= $modc . '&nbsp;day';
    }


    if ($diff < 7) {
      $rentCost += (int)$diff * $rentPriceDaily;


    } elseif ($diff <= 55) {
      // week 500
      $rentCost += $totalWeek * $rentPriceWeekly;
      if ($modc > 0) {
        $rentCost += $modc * $rentPriceDaily;
      }

    } elseif ($diff <= 111) {
      //week 450
      $rentCost += $totalWeek * 450;
      if ($modc > 0) {
        $rentCost += $modc * $rentPriceDaily;
      }


    } else {
      //week 400
      $rentCost += $totalWeek * 400;
      if ($modc > 0) {
        $rentCost += $modc * $rentPriceDaily;
      }


    }

    $totalCost += $rentCost;


    $cleanupCost = 0;

    if ($cleanup === TRUE) {


      $cleanupCost += $totalWeek * $cleanupPrice;
      if ($modc > 0) {
        $cleanupCost += $modc * ceil($cleanupPrice / 7);

      }

      $totalCost += $cleanupCost;

    }

    $emptyCost = 0;

    if ($empty === TRUE) {
      $emptyCost = $emptyPrice;
      $totalCost += $emptyCost;

    }

    $priceTagsCost = 0;

    if ($priceTags > 0) {

      $priceTagsCost = $priceTagPrice * $priceTags;
      $totalCost += $priceTagsCost;


    }

    $data = new stdClass();
    $_SESSION['rentPreFilled'] = 1;
    $_SESSION['filledAgain'] = 1;
    $data->totalCost = $_SESSION['totalCost'] = $totalCost;
    $data->startDate = $_SESSION['startDate'] = $startDate;
    $data->endDate = $_SESSION['endDate'] = $endDate;
    $data->cleanup = $_SESSION['cleanup'] = $cleanup;
    $data->cleanupCost = $_SESSION['cleanupCost'] = $cleanupCost;
    $data->rentPeriod = $_SESSION['rentPeriod'] = $rentPeriod;
    $data->rentCost = $_SESSION['rentCost'] = $rentCost;
    $data->empty = $_SESSION['empty'] = $empty;
    $data->emptyCost = $_SESSION['emptyCost'] = $emptyCost;
    $data->priceTagsCost = $_SESSION['priceTagsCost'] = $priceTagsCost;
    $data->priceTagsCount = $_SESSION['priceTagsCount'] = $priceTags;


    return $this->re('s', 'sss', $data);


  }


  public function get_user_products($username = NULL, $page = NULL)
  {
    if ($username === NULL) {
      show_404();
    }

    if (NULL === $page) {
      $page = 1;
    }


    $username = $this->filter_username($username);

    $user = $this->get_user($username);

    if (empty($user)) {
      show_404();
    }

    if (!isset($user->id)) {
      show_404();
    }


//        if (empty($this->input->get('q'))) {
//            //$this->db->cache_on();
//        }

    $this->db->from('___products')
      ->where('added_by', $user->id);


    if (!empty($this->input->get('sort_by'))) {
      $sort_by = (string)$this->input->get('sort_by', true);

      if (strcmp($sort_by, 'latest') === 0) {
        $this->db->order_by('id', 'DESC');
      } elseif (strcmp($sort_by, 'oldest') === 0) {
        $this->db->order_by('id', 'ASC');
      } elseif (strcmp($sort_by, 'low_price') === 0) {
        $this->db->order_by('price', 'ASC');
      } elseif (strcmp($sort_by, 'high_price') === 0) {
        $this->db->order_by('price', 'DESC');
      } elseif (strcmp($sort_by, 'most_bids') === 0) {
        $this->db->order_by('bid_count', 'DESC');
      } elseif (strcmp($sort_by, 'fewest_bids') === 0) {
        $this->db->order_by('bid_count', 'ASC');
      }


    } else {
      $this->db->order_by('id', 'DESC');
    }

    $status = (array)$this->input->get('status', true);
    if (!empty($status)) {
      $sneaky = 0;

      $system_status = ['open', 'closed', 'in_progress', 'waiting_acceptance'];

      foreach ( $status as $s ) {
        if (!in_array($s, $system_status, true)) {
          $sneaky++;
        }

      }

      if ($sneaky > 0) {
        log_message('error', __LINE__);
        return $this->re();

      }

      foreach ( $status as $s ) {
        if (strcmp($s, 'open') === 0) {
          $this->db->where('status', 0);
        } elseif (strcmp($s, 'closed') === 0) {
          $this->db->where('status', 20);
        } elseif (strcmp($s, 'waiting_acceptance') === 0) {
          $this->db->where('status', 5);
        } elseif (strcmp($s, 'in_progress') === 0) {
          $this->db->where('status <', 20);
          $this->db->where('status >', 5);
        }

      }


    }


    if (!empty($this->input->get('q'))) {


      $search_in = 0;

      $q = $this->input->get('q', true);
      $this->db->group_start();
      if (!empty($this->input->get('title'))) {
        $search_in++;
        $this->db->or_like('title', $q);
      }

      if (!empty($this->input->get('tags'))) {
        $search_in++;
        $this->db->or_like('tags', $q);
      }
      if (!empty($this->input->get('desc'))) {
        $search_in++;
        $this->db->or_like('description', $q);
      }

      if ($search_in === 0) {
        $this->db->or_like('title', $q);
        $this->db->or_like('description', $q);
        $this->db->or_like('tags', $q);
      }

      $this->db->group_end();


    }


    if ($page !== null) {
      $page = (int)$page;
      $offset = 0;

      if ($page > 1) {
        $offset = $page - 1;
      }


      $this->db->limit($this->config->item('products_per_page'), $offset * $this->config->item('products_per_page'));

    }


    $q = $this->db->get();

    if (!$q || $q->num_rows() < 1) {
      return null;

    }

    $res = $q->result();
    if (empty($this->input->get('q'))) {
      $this->db->cache_off();
    }


    foreach ( $res as $k => $r ) {
      $res[$k]->ago = $this->time_diff_string(date('Y-m-d H:i:s', $r->date_added), null);
      $res[$k]->tags = implode(', ', array_merge(json_decode($r->category), json_decode($r->tags)));
      $res[$k]->location_tags = '';
      if (!empty($r->location)) {
        $locations = [];
        foreach ( json_decode($r->location) as $loc ) {
          $locations[] = $this->get_country_name($loc);
        }
        $res[$k]->location_tags = implode(', ', $locations);


      }


    }

    return $res;


  }

  public function filter_username($username = NULL)
  {
    if (NULL === $username) {
      return false;
    }


    return preg_replace('/[^a-zA-Z1-9.-]/m', '', xss_clean($username));


  }

  private function get_user($username = NULL)
  {
    $user = $this->db->from('___users')->where('username', $username)->get()->row();
    if (!empty($user)) {
      return $user;
    }

    return FALSE;
  }


}
