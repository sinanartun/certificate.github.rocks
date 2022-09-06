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
  class Admin_model extends CI_Model
  {
    private $data;
    
    public function __construct()
    {
      parent::__construct();
    }
    
    public function get_course_sections()
    {
      $course_code = $this->input->post('cc');
      
      $row = $this->db
        ->select('sections')
        ->from('___courses')
        ->where('course_code', $course_code)
        ->get()->row();
      
      if (!isset($row->sections) || empty($row->sections)) {
        return $this->re('e', '');
      }
      
      
      $sections = json_decode($row->sections, false);
      
      if (!is_array($sections) || empty($sections)) {
        return $this->re('s', '');
      }
      
      $total_media_length = 0;
      foreach ($sections as $k => $section) {
        if (empty($section->lectures)) {
          $sections[$k]->tmls = '00:00:00';
          continue;
        }
        $section_duration = 0;
        foreach ($section->lectures as $kk => $lecture) {
          $total_media_length += $lecture->media_duration_seconds;
          $section_duration += $lecture->media_duration_seconds;
        }
        $sections[$k]->total_media_length = $total_media_length;
        $sections[$k]->tmls = $this->convert_seconds_to_string_time($section_duration);
      }
      
      
      return $this->re('s', '', $sections);
      
      
    }
    
    
    public function heartbeat()
    {
      $new_message_count = $this->get_all_unread_msg_count($this->ion_auth->get_user_id());
      if ($new_message_count > 0) {
        return $this->re('s', NULL, NULL, NULL, 'new_message');
      }
      return $this->re('s', '');
    }
    
    public function remove_course()
    {
      $id = (int)$this->input->post('id');
      $this->add_system_log("User deleted Course with Course id: $id.");
      if (empty($id)) {
        return $this->re();
      }
      $res = $this->db->where('course_id', $id)->delete('___courses');
      if ($res) {
        return $this->re('s', 'Course successfully deleted');
      }
      return $this->re('e', '');
    }
    
    public function submit_new_course()
    {
      $this->db->cache_delete_all();
      $user_id = $this->ion_auth->get_user_id();
      $draft = $this->db->from('___add_new_course_sess')->where('user_id', $user_id)->get()->row();
      if (strlen($draft->title) < 5) {
        return $this->re('e', 'Course Title must be at least 5 characters Length');
      }
      if (strlen($draft->sub_title) < 15) {
        return $this->re('e', 'Course Subtitle must be at least 15 characters Length');
      }
      if (strlen($draft->description) < 10) {
        return $this->re('e', 'Course Description must be at least 10 characters Length');
      }
      if (strlen($draft->course_img) < 20) {
        return $this->re('e', 'Course Image must be uploaded. Please upload a course image');
      }
      if (strlen($draft->sections) < 3) {
        return $this->re('e', 'Sections part can not be empty. Please add sections & Lectures to your course');
      }
      $sections = json_decode($draft->sections,false);
      $course_total_seconds = 0;
      foreach ($sections as $i => $section) {
        if (empty($section->lectures)) {
          return $this->re('e', 'Section "' . $section->name . '" has no Lectures. Please add some lectures or delete this section');
        }
        $section_total_seconds = 0;
        foreach ($section->lectures as $k => $lecture) {
          if (!empty($lecture->media_duration_seconds)) {
            $section_total_seconds += (int)$lecture->media_duration_seconds;
            $sections[$i]->lectures[$k]->media_duration = $this->secondsToHumanReadable($lecture->media_duration_seconds);
          }
        }
        
        $sections[$i]->media_duration_seconds = $section_total_seconds;
        $sections[$i]->media_duration = $this->secondsToHumanReadable($section_total_seconds);
        $course_total_seconds += $section_total_seconds;
      }
      if (strlen($draft->sub_category) < 1) {
        return $this->re('e', 'Please select a sub category for your course');
      }
      if (strlen($draft->main_category) < 1) {
        return $this->re('e', 'Please select a main category for your course');
      }
      
      $order = $this->db->select_max('order')->from('___courses')->get()->row();
      $draft->sections = json_encode($sections);
      $draft->active = 1;
      $draft->date_added = time();
      $draft->url_title = url_title($draft->title, '_', TRUE);
      $draft->course_code = md5(time());
      $draft->course_duration = $this->secondsToHumanReadable($course_total_seconds);
      $draft->course_duration_seconds = $course_total_seconds;
      $draft->order = $order->order + 1;
      $nor = $this->db->from('___courses')->where('url_title', $draft->url_title)->get()->num_rows();
      if ($nor > 0) {
        return $this->re('e', 'There is already another course with same title, Please enter a different title');
      }
      $res = $this->db->insert('___courses', $draft);
      if (!$res) {
        return $this->re('e', $this->db->display_error());
      }
      return $this->re('s', 'Your Course Has been successfully Completed.');
    }
    
    private function update_test_questions_order(){
      $res =  $this->db->select('id')->from('___tests')->get()->result_array();
      $ids = array_column($res,'id');
      foreach($ids as $tid){
        $test_questions = $this->db->from('___test_questions')
          ->where('test_id',$tid)->get()->result();
        foreach($test_questions as $k => $question){
      
          $this->db->set('order',$k+1)->where('id',$question->id)->update('___test_questions');
          $this->db->reset_query();
      
        }
    
    
      }
    }
    
    public function save_sess_add_new_course()
    {
      $user_id = $this->ion_auth->get_user_id();
      $title = $this->input->post('title');
      $sub_title = $this->input->post('sub_title');
      $description = $this->input->post('description');
      $sections = json_encode($this->input->post('sections'));
      $main_category = $this->input->post('main_category');
      $sub_category = $this->input->post('sub_category');
      $data = [
        'user_id' => $user_id,
        'title' => $title,
        'sub_title' => $sub_title,
        'description' => $description,
        'sections' => $sections,
        'main_category' => $main_category,
        'sub_category' => $sub_category
      ];
      $nor = $this->db->from('___add_new_course_sess')->where('user_id', $user_id)->get()->num_rows();
      if ($nor > 0) {
        $res = $this->db->where('user_id', $user_id)->update('___add_new_course_sess', $data);
        $this->db->reset_query();
      } else {
        $res = $this->db->insert('___add_new_course_sess', $data);
      }
      if ($res) {
        return $this->re('s', 'successfully saved');
      }
      return $this->re('e', '');
    }
    
    public function save_course()
    {
      
      $course_code = $this->input->post('course_code');
      if (empty($course_code) || strlen($course_code) !== 32) {
        return $this->re('e', '');
        
      }
      
      $course_exist = $this->is_course_exist($course_code);
      if (!$course_exist) {
        return $this->re('e', '');
      }
      
      
      $title = $this->input->post('title');
      $sub_title = $this->input->post('sub_title');
      $description = $this->input->post('description');
      $sections = json_encode($this->input->post('sections'));
      $main_category = $this->input->post('main_category');
      $sub_category = $this->input->post('sub_category');
      $data = [
        'title' => $title,
        'sub_title' => $sub_title,
        'description' => $description,
        'sections' => $sections,
        'main_category' => $main_category,
        'sub_category' => $sub_category
      ];
      
      
      $res = $this->db->where('course_code', $course_code)->update('___courses', $data);
      
      if (!$res) {
        
        return $this->re('e', '');
      }
      
      return $this->re('s', '');
      
    }
    
    public function get_sess_add_new_course()
    {
      $user_id = $this->ion_auth->get_user_id();
      $res = $this->db->from('___add_new_course_sess')
        ->where('user_id', $user_id)
        ->get()->row();
      if ($res) {
        return $res;
      }
      return NULL;
    }
    
    public function is_course_exist($course_code = NULL): bool
    {
      if (NULL === $course_code || strlen($course_code) !== 32) {
        return FALSE;
      }
      $nor = $this->db->from('___courses')->where('course_code', $course_code)->get()->num_rows();
      return $nor > 0;
    }
    
    public function is_test_exist($tid = NULL): bool
    {
      if (NULL === $tid) {
        return FALSE;
      }
      $nor = $this->db->from('___tests')->where('id', $tid)->get()->num_rows();
      return $nor > 0;
    }
    
    public function get_sess_sections()
    {
      $user_id = $this->ion_auth->get_user_id();
      $res = $this->db->select('sections')
        ->from('___add_new_course_sess')
        ->where('user_id', $user_id)
        ->get()->row();
      if (!$res) {
        return $this->re('e', '');
      }
      $sections = json_decode($res->sections);
      $total_media_length = 0;
      foreach ($sections as $k => $section) {
        if (empty($section->lectures)) {
          $sections[$k]->tmls = '00:00:00';
          continue;
        }
        foreach ($section->lectures as $kk => $lecture) {
          $total_media_length += $lecture->media_duration_seconds;
        }
        
        $sections[$k]->total_media_length = $total_media_length;
        $sections[$k]->tmls = $this->convert_seconds_to_string_time($total_media_length);
      }
      return $this->re('s', '', $sections);
    }
    
    public function get_all_unread_msg_count($to_user_id = NULL): int
    {
      if (NULL === $to_user_id) {
        return 0;
      }
      return $this->db->from('___inbox_messages')
        ->where('to', $to_user_id)
        ->where('date_read', 0)
        ->get()->num_rows();
    }
    
    public function add_system_log($log = null, $severity = 1, $type = 'general'): bool
    {
      if ($log === null) {
        return false;
      }
      $ip = $this->get_ip();
      $log .= ' | User_id=' . $this->ion_auth->get_user_id();
      return $this->db->set('time_unix', time())
        ->set('type', $type)
        ->set('log', $log)
        ->set('IP', $ip)
        ->set('severity', $severity)
        ->insert($this->ion_auth_model->tables['system_logs']);
    }
    
    public function del_group()
    {
      $id = $this->input->post('id');
      if (empty($id)) {
        log_message('error', __FILE__ . '_' . __LINE__ . ':' . 'no group id');
        return $this->re();
      }
      $cd = (array)$this->config->item('cannot_be_deleted_group_ids', 'ion_auth');
      if (in_array($id, $cd)) {
        return $this->re('e', 'This group can not be deleted');
      }
//      $group_users = $this->db->from('___users_groups')->where('group_id',$id)->get()->result_array();
//      $group_users = array_column($group_users,'group_id');
      $this->db->set('group_id', $this->config->item('default_group_id', 'ion_auth'))->where_in('group_id', $id)->update('___users_groups');
      log_message('error', $this->db->last_query());
      $result = $this->ion_auth->delete_group($id);
      if ($result) {
        return $this->re('s', 'Group deleted successfully');
      }
      return $this->re('e', '');
    }
    
    
    public function secondsToHumanReadable(int $seconds, int $requiredParts = null): string
    {
      $from = new DateTime('@0');
      $to = new DateTime("@$seconds");
      $interval = $from->diff($to);
      $str = '';
      $parts = [
        'y' => 'year',
        'm' => 'month',
        'd' => 'day',
        'h' => 'hr',
        'i' => 'min',
        's' => 'sec',
      ];
      $includedParts = 0;
      foreach ($parts as $key => $text) {
        if ($requiredParts && $includedParts >= $requiredParts) {
          break;
        }
        $currentPart = $interval->{$key};
        if (empty($currentPart)) {
          continue;
        }
        if (!empty($str)) {
          $str .= ' ';
        }
        $str .= sprintf('%d %s', $currentPart, $text);
//      if ($currentPart > 1) {
//        // handle plural
//        $str .= 's';
//      }
        $includedParts++;
      }
      return $str;
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
    
    
    private function get_encoded_text($text): string
    {
      $this->load->helper('text');
      $text = convert_accented_characters($text);
      return url_title($text, 'underscore', true);
    }
    
    public function get_stats(): \stdClass
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
        foreach ($status as $s) {
          if (!in_array($s, $system_status, true)) {
            $sneaky++;
          }
        }
        if ($sneaky > 0) {
          log_message('error', __LINE__);
          show_404();
        }
        foreach ($status as $s) {
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
      foreach ($res as $k => $r) {
        $res[$k]->ago = $this->time_diff_string(date('Y-m-d H:i:s', $r->date_added), null);
        $res[$k]->tags = implode(', ', array_merge(json_decode($r->category), json_decode($r->tags)));
      }
      return $res;
    }
    
    public function get_products_count($category = null, $my_products = FALSE): int
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
        foreach ($status as $s) {
          if (!in_array($s, $system_status, true)) {
            $sneaky++;
          }
        }
        if ($sneaky > 0) {
          log_message('error', __LINE__);
          show_404();
        }
        foreach ($status as $s) {
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
      return $this->db->count_all_results();
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
      //        if (empty($this->input->get('q', true))) {
//            $this->db->cache_off();
//        }
      return $this->db->count_all_results();
    }
    
    public function render_pagination($total_rows, $url_suffix = ''): string
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
    
    public function get_requests_count($category = null): int
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
        foreach (json_decode($res->location) as $loc) {
          $locations[] = $this->get_country_name($loc);
        }
        $res->location_tags = implode(', ', $locations);
      }
      return $res;
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
      return $row->name ?? null;
    }
    
    public function get_product_view_count($sku): int
    {
      return $this->db->from('___products_view')->like('sku_ip', $sku . '_', 'after', false)->count_all_results();
    }
    
    public function add_product_view($sku): bool
    {
      $ip = $this->get_ip();
      $sku_ip = $sku . '_' . $ip;
      $nor = $this->db->from('___products_view')->where('sku_ip', $sku_ip)->get()->num_rows();
      if ($nor < 1) {
        $res = $this->db->insert('___products_view', ['sku_ip' => $sku_ip, 'time' => time()]);
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
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $identity = $first_name . ' ' . $last_name;
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
      $msg = '';
      if (validation_errors()) {
        $msg .= validation_errors();
      }
      
      if ($this->ion_auth->errors()) {
        $msg .= $this->ion_auth->errors();
      }
      
      if ($this->session->flashdata('message')) {
        $msg .= $this->session->flashdata('message');
      }
      
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
      $this->db->from($this->config->item('tables', 'ion_auth')['users']);
      $nor = $this->db->where('email', $email)->get()->num_rows();
      if ($nor < 1) {
        $msg = 'There is no account with this email !!!';
      }
      return $this->re('e', $msg);
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
      $cleanup = filter_var($this->input->post('cleanup'), FILTER_VALIDATE_BOOLEAN);
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
      }
      
      if ($diff === 0) {
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
        foreach ($status as $s) {
          if (!in_array($s, $system_status, true)) {
            $sneaky++;
          }
        }
        if ($sneaky > 0) {
          log_message('error', __LINE__);
          return $this->re();
        }
        foreach ($status as $s) {
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
      foreach ($res as $k => $r) {
        $res[$k]->ago = $this->time_diff_string(date('Y-m-d H:i:s', $r->date_added), null);
        $res[$k]->tags = implode(', ', array_merge(json_decode($r->category), json_decode($r->tags)));
        $res[$k]->location_tags = '';
        if (!empty($r->location)) {
          $locations = [];
          foreach (json_decode($r->location) as $loc) {
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
    
    public function add_user()
    {
      $tables = $this->ion_auth_model->tables;
      $identity_column = $this->config->item('identity', 'ion_auth');
      // validate form input
      $this->form_validation->set_rules('first_name', 'First Name', 'required');
      $this->form_validation->set_rules('last_name', 'Last Name', 'required');
      if ($identity_column !== 'email') {
        $this->form_validation->set_rules("$identity_column", 'Username', 'required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
      } else {
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
      }
      $this->form_validation->set_rules('password', 'password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
      $this->form_validation->set_rules('password_confirm', 'password confirm', 'required|matches[password]');
      if ($this->form_validation->run() == true) {
        $email = strtolower($this->input->post('email'));
        $identity = ($identity_column === 'email') ? $email : $this->input->post($identity_column);
        $password = $this->input->post('password');
        $additional_data = array(
          'first_name' => $this->input->post('first_name'),
          'last_name' => $this->input->post('last_name'),
        );
        if ($this->session->has_userdata('last_upload_profile_image')) {
          $additional_data['profile_img'] = $this->session->userdata('last_upload_profile_image');
        }
        $additional_data = array_filter($additional_data);
        $group = (array)$this->input->post('group');
        $new_user_id = $this->ion_auth->register($identity, $password, $email, $additional_data, $group);
        if ((int)$new_user_id > 0) {
          $user_active = $this->input->post('user_active');
          if (isset($user_active) && ($user_active === 'on')) {
            $this->activate_user($new_user_id);
          } else {
            $this->deactivate_user($new_user_id);
          }
          $this->session->unset_userdata('last_upload_profile_image');
          return $this->re('s', 'User Added Successfully');
        }
        $msg = '';
        if (validation_errors()) {
          $msg .= validation_errors();
        }
        
        if ($this->ion_auth->errors()) {
          $msg .= $this->ion_auth->errors();
        }
        
        if ($this->session->flashdata('message')) {
          $msg .= $this->session->flashdata('message');
        }
        
        return $this->re('e', $msg);
      }
      
      $msg = '';
      if (validation_errors()) {
        $msg .= validation_errors();
      }
      
      if ($this->ion_auth->errors()) {
        $msg .= $this->ion_auth->errors();
      }
      
      if ($this->session->flashdata('message')) {
        $msg .= $this->session->flashdata('message');
      }
      
      return $this->re('e', $msg);
    }
    
    public function add_group()
    {
      
      
      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('description', 'Description', 'required|max_length[100]|min_length[3]');
      $this->form_validation->set_rules('group_level', 'Group Level', 'required|greater_than[0]|less_than[99]');
      if ($this->form_validation->run() === TRUE) {
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $group_level = (int)$this->input->post('group_level');
        $new_group_id = $this->ion_auth->create_group($name, $description, ['group_level' => $group_level]);
        if (!$new_group_id) {
          return $this->re('e', $this->ion_auth->messages());
        }
        
        return $this->re('s', 'Group added successfully');
      }
      
      $msg = '';
      
      if (validation_errors()) {
        $msg .= validation_errors();
      }
      
      if ($this->ion_auth->errors()) {
        $msg .= $this->ion_auth->errors();
      }
      
      if ($this->session->flashdata('message')) {
        $msg .= $this->session->flashdata('message');
      }
      
      return $this->re('e', $msg);
    }
    
    
    public function search_yt_list()
    {
      $list_link = $this->input->post('list_link');
  
      $re = '/(?=youtube)youtube.com\/playlist\?list=([a-zA-Z\d\-\_]+)/';
      preg_match_all($re, $list_link, $matches, PREG_SET_ORDER, 0);
      if(!isset($matches[0][1])){
        return $this->re('e','105');
        
      }
      $list_id = $matches[0][1];
      
      $api_key = 'AIzaSyDXQh9LoKPjMzXHnqsNmk03c2qjhqYDT_s';
      $url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2CcontentDetails&maxResults=50&key='.$api_key.'&playlistId='.$list_id;
      
      
  
      $json = file_get_contents($url);
      $res = json_decode($json, false);
      
      if(empty($res)){
        return $this->re('e','101');
        
      }
      
      if(!isset($res->pageInfo->totalResults) ){
         return $this->re('e','102');
         
      }
      if(!isset($res->items) ){
        return $this->re('e','103');
      }
      
      if(empty($res->items)){
        return $this->re('e','104');
        
      }
      
      
      foreach($res->items as $k => $item){
        
        
        $html = 'https://www.googleapis.com/youtube/v3/videos?id=' . $item->snippet->resourceId->videoId . '&key=' . $api_key . '&part=snippet,contentDetails';
        $response = file_get_contents($html);
        if(empty($response)){
          return $this->re('e','one of video details could get from youtube api');
          
        }
        $decoded = json_decode($response, false);
        $contentDetails = $decoded->items[0]->contentDetails;
        $res->items[$k]->duration_seconds = $this->convert_yt_time_to_seconds($contentDetails->duration);
        $res->items[$k]->duration_string = $this->secondsToHumanReadable($res->items[$k]->duration_seconds);
      }
      
      
      
      return $this->re('s','',$res->items);
      
      
    }
  
    private function convert_yt_time_to_seconds($time)
    {
      preg_match_all("/PT(\d+H)?(\d+M)?(\d+S)?/", $time, $matches);
    
      $hours = $matches[1][0] === '' ? 0 : substr($matches[1][0], 0, -1);
      $minutes = $matches[2][0] === '' ? 0 : substr($matches[2][0], 0, -1);
      $seconds = $matches[3][0] === '' ? 0 : substr($matches[3][0], 0, -1);
    
      return 3600 * $hours + 60 * $minutes + $seconds;
    }
  
    public function update_user($user_id = NULL)
    {
      if (NULL === $user_id) {
        $user_id = $this->input->post('id');
        if (empty($user_id)) {
          return $this->re();
        }
      }
      $return = new stdClass();
      $user = $this->ion_auth->user($user_id)->row();
      if (empty($user)) {
        $return->status = 'error';
        $return->msg = 'Unable to edit user !!!';
        return $return;
      }
      if (isset($_POST) && !empty($_POST)) {
        // validate form input
        $this->form_validation->set_rules('first_name', 'first name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'last name', 'required|trim');
        // update the password if it was posted
        if ($this->input->post('password')) {
          $this->form_validation->set_rules('password', 'password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
          $this->form_validation->set_rules('password_confirm', 'password_confirm', 'required');
        }
        if ($this->form_validation->run() === TRUE) {
          $data = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
          ];
          // update the password if it was posted
          if ($this->input->post('password')) {
            $data['password'] = $this->input->post('password');
          }
          // Only allow updating groups if user is admin
          if ($this->ion_auth->is_admin()) {
            //Update the groups user belongs to
            $group_id = $this->input->post('group');
            if (isset($group_id) && !empty($group_id)) {
              $this->ion_auth->remove_from_group(NULL, $user_id);
              $this->ion_auth->add_to_group($group_id, $user_id);
            }
          }
          // check to see if we are updating the user
          if ($this->ion_auth->update($user->id, $data)) {
            $user_active = $this->input->post('user_active');
            if (isset($user_active) && ($user_active === 'on')) {
              $this->activate_user($user_id);
            } else {
              $this->deactivate_user($user_id);
            }
            $return->status = 'success';
            $return->msg = 'User Updated Successfully ';
          } else {
            $return->status = 'error';
            $return->msg = 'Unable to update user ' . $this->ion_auth->errors();
          }
        } else {
          $return->status = 'error';
          $msg = '';
          if (validation_errors()) {
            $msg .= validation_errors();
          }
          
          if ($this->ion_auth->errors()) {
            $msg .= $this->ion_auth->errors();
          }
          
          if ($this->session->flashdata('message')) {
            $msg .= $this->session->flashdata('message');
          }
          
          $return->msg = 'Unable to update user ' . $msg;
        }
      } else {
        // not a valid $_POST
        $return->status = 'error';
        $return->msg = 'Unable to update user ';
      }
      return $return;
    }
    
    public function convert_seconds_to_string_time($ts = 0): string
    {
      // echo '$total_media_length='.$total_media_length;
      $res = '';
      $s = $ts % 60;
      $m = floor(($ts % 3600) / 60);
      $h = floor(($ts % 86400) / 3600);
      $d = floor(($ts % 2592000) / 86400);
      $M = floor($ts / 2592000);
      
      //return "$M months, $d days, $h hours, $m minutes, $s seconds";
      
      if (strlen($d) < 2) {
        $d = '0' . $d;
      }
      
      if (strlen($h) < 2) {
        $h = '0' . $h;
      }
      if (strlen($m) < 2) {
        $m = '0' . $m;
      }
      if (strlen($s) < 2) {
        $s = '0' . $s;
      }
      
      
      $res .= $h . ':' . $m . ':' . $s;
      if ((int)$d > 0) {
        $res = $d . ':' . $res;
      }
      
      return $res;
    }
    
    public function add_question_to_test($sess = FALSE)
    {
      $user_id = $this->ion_auth->get_user_id();
      if ($sess) {
        $test_table = '___tests_sess';
        $question_table = '___test_questions_sess';
      } else {
        $test_table = '___tests';
        $question_table = '___test_questions';
      }
      
      
      $row = $this->db->select('id')->from($test_table)->where('added_by', $user_id)->get()->row();
      if (!isset($row->id)) {
        return $this->re('e', 'Please write a test name and click add.');
        
      }
      
      $test_id = $row->id;
      
      
      $question = $this->input->post('question');
      $question = trim($question);
      if ($question === '') {
        return $this->re('e', 'Question can not be empty');
        
      }
      
      $a = $this->input->post('a');
      if ($a === '') {
        return $this->re('e', 'Choose A can not be empty');
        
      }
      
      $b = $this->input->post('b');
      if ($b === '') {
        return $this->re('e', 'Choose B can not be empty');
        
      }
      
      $c = $this->input->post('c');
      if ($c === '') {
        return $this->re('e', 'Choose C can not be empty');
        
      }
      
      $d = $this->input->post('d');
      if ($d === '') {
        return $this->re('e', 'Choose D can not be empty');
        
      }
      
      $e = $this->input->post('e');
      if ($e === '') {
        return $this->re('e', 'Choose E can not be empty');
        
      }
      
      $true_answer = $this->input->post('true_answer');
      if (empty($true_answer)) {
        return $this->re('e', 'Please Select True Answer');
        
      }
      
      
      $question_exist = $this->db->from($question_table)
        ->where('question', $question)
        ->where('test_id', $test_id)
        ->get()->num_rows();
      if ($question_exist > 0) {
        return $this->re('e', 'This question already exist in this test. Please add a different question !!!');
        
      }
      
      
      $data = new stdClass();
      $data->question = $question;
      $data->a = $a;
      $data->b = $b;
      $data->c = $c;
      $data->d = $d;
      $data->e = $e;
      $data->test_id = $test_id;
      $data->true_answer = $true_answer;
      if ($sess) {
        $data->added_by = $user_id;
      }
      
      
      $res = $this->db->insert($question_table, $data);
      
      if ($res) {
        return $this->re('s', 'Success');
        
      }
      return $this->re('e', 'database insert error');
      
    }
    
    public function add_question_to_edit_test()
    {
      $user_id = $this->ion_auth->get_user_id();
      
      $test_table = '___tests';
      $question_table = '___test_questions';
      $tid = $this->input->post('tid');
      
      $test_exist = $this->is_test_exist($tid);
      if(!$test_exist){
        return $this->re('e');
        
      }
      
      
     
      
      
      $question = $this->input->post('question');
      $question = trim($question);
      if ($question === '') {
        return $this->re('e', 'Question can not be empty');
        
      }
      
      $a = $this->input->post('a');
      if ($a === '') {
        return $this->re('e', 'Choose A can not be empty');
        
      }
      
      $b = $this->input->post('b');
      if ($b === '') {
        return $this->re('e', 'Choose B can not be empty');
        
      }
      
      $c = $this->input->post('c');
      if ($c === '') {
        return $this->re('e', 'Choose C can not be empty');
        
      }
      
      $d = $this->input->post('d');
      if ($d === '') {
        return $this->re('e', 'Choose D can not be empty');
        
      }
      
      $e = $this->input->post('e');
      if ($e === '') {
        return $this->re('e', 'Choose E can not be empty');
        
      }
      
      $true_answer = $this->input->post('true_answer');
      if (empty($true_answer)) {
        return $this->re('e', 'Please Select True Answer');
        
      }
      
      
      $question_exist = $this->db->from('___test_questions')
        ->where('question', $question)
        ->where('test_id', $tid)
        ->get()->num_rows();
      if ($question_exist > 0) {
        return $this->re('e', 'This question already exist in this test. Please add a different question !!!');
        
      }
      
      $total_question = $this->db->from('___test_questions')->where('test_id',$tid)->get()->num_rows();
      
      
      
      $data = new stdClass();
      $data->question = $question;
      $data->a = $a;
      $data->b = $b;
      $data->c = $c;
      $data->d = $d;
      $data->e = $e;
      $data->test_id = $tid;
      $data->true_answer = $true_answer;
      $data->order = $total_question+1;
      
      
      
      $res = $this->db->insert($question_table, $data);
      
      if ($res) {
        $this->update_test_question_orders($tid);
        return $this->re('s', 'Success');
        
      }
      return $this->re('e', 'database insert error');
      
    }
    
    private function update_test_question_orders($tid = NULL): bool
    {
      if(NULL===$tid){
        return FALSE;
      }
  
      $test_questions = $this->db->from('___test_questions')
        ->where('test_id',$tid)->get()->result();
      foreach($test_questions as $k => $question){
    
        $this->db->set('order',$k+1)->where('id',$question->id)->update('___test_questions');
        $this->db->reset_query();
    
      }
      return TRUE;
      
    }
    
    
    private function check_test_exist($test_id = NULL, $sess = FALSE): bool
    {
      if (NULL === $test_id) {
        return FALSE;
      }
      
      $res = $this->db->from('___tests')->where('id', $test_id)->get()->num_rows();
      
      return $res > 0;
      
      
    }
    
    public function del_sess_question()
    {
      $qid = $this->input->post('qid');
      if (empty($qid)) {
        return $this->re('e');
        
      }
      
      $user_id = $this->ion_auth->get_user_id();
      
      $question_exist = $this->db->from('___test_questions_sess')->where('added_by', $user_id)->where('id', $qid)->get()->num_rows();
      
      if ($question_exist < 1) {
        return $this->re('e');
      }
      
      $res = $this->db->where('id', $qid)->delete('___test_questions_sess');
      if ($res) {
        return $this->re('s', 'Successfully deleted');
        
      }
      
      return $this->re('e');
      
    }
    
    public function del_question()
    {
      $qid = $this->input->post('qid');
      if (empty($qid)) {
        return $this->re('e');
        
      }
      
      
      $question_exist = $this->db->from('___test_questions')->where('id', $qid)->get()->num_rows();
      
      if ($question_exist < 1) {
        return $this->re('e');
      }
      
      $res = $this->db->where('id', $qid)->delete('___test_questions');
      if ($res) {
        return $this->re('s', 'Successfully deleted');
        
      }
      
      return $this->re('e');
      
    }
    
    public function get_edit_sess_question()
    {
      $qid = $this->input->post('qid');
      if (empty($qid)) {
        return $this->re('e');
      }
      $user_id = $this->ion_auth->get_user_id();
      
      $res = $this->db->from('___test_questions_sess')
        ->where('id', $qid)
        ->where('added_by', $user_id)->get()->row();
      
      if (empty($res)) {
        return $this->re('e');
        
      }
      
      return $this->re('s', '', $res);
      
      
    }
    
    public function get_edit_question()
    {
      $qid = $this->input->post('qid');
      if (empty($qid)) {
        return $this->re('e');
      }
      $user_id = $this->ion_auth->get_user_id();
      
      $res = $this->db->from('___test_questions')
        ->where('id', $qid)->get()->row();
      
      if (empty($res)) {
        return $this->re('e');
        
      }
      
      return $this->re('s', '', $res);
      
      
    }
    
    public function get_sess_questions()
    {
      $user_id = $this->ion_auth->get_user_id();
      $test = $this->db->from('___tests_sess')->where('added_by', $user_id)->get()->row();
      if (empty($test)) {
        return NULL;
      }
      $data = new stdClass();
      $data->test_name = $test->test_name;
      $data->questions = $this->db->from('___test_questions_sess')->where('test_id', $test->id)->get()->result();
      
      return $this->re('s', '', $data);
      
      
    }
    
    
    public function add_test()
    {
      $test_name = $this->input->post('test_name');
      $user_id = $this->ion_auth->get_user_id();
      
      if (strlen($test_name) < 1) {
        return $this->re('e', 'Test Name can not be empty');
        
      }
      
      
      $name_exist = $this->check_test_name_exist($test_name);
      
      if ($name_exist) {
        return $this->re('e', 'There is already another Test with same name !!!');
        
      }
      
      $sess_exist = $this->db->from('___tests_sess')->where('added_by', $user_id)->get()->num_rows();
      if ($sess_exist < 1) {
        $row = new stdClass();
        $row->test_name = $test_name;
        $row->date_added = time();
        $row->added_by = $user_id;
        
        $res = $this->db->insert('___tests_sess', $row);
        if ($res) {
          return $this->re('s', 'Test added successfully');
        }
        return $this->re();
        
      }
      
      
      $data = new stdClass();
      $data->test_name = $test_name;
      $data->date_added = time();
      
      $res = $this->db->where('added_by', $user_id)->update('___tests_sess', $data);
      
      
      if ($res) {
        return $this->re('s', 'Test added successfully');
      }
      return $this->re();
      
      
    }
    
    private function check_test_name_exist($test_name = NULL): bool
    {
      if (NULL === $test_name) {
        return FALSE;
      }
      
      $res = $this->db->from('___tests')
        ->where('test_name', $test_name)
        ->get()->num_rows();
      
      return $res > 0;
      
    }
    
    
    public function upload_profile_image()
    {
      $this->load->helper('file');
      $config['upload_path'] = FCPATH . 'uploads/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['max_size'] = 4096;
      $config['encrypt_name'] = true;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('file')) {
        //$error = ['error' => $this->upload->display_errors('','')];
        return $this->re('e', $this->upload->display_errors('', ''));
      }
      $data = $this->upload->data();
      $file_name = $this->security->sanitize_filename($data['file_name']);
      $conf_img['image_library'] = 'ImageMagick';
      $conf_img['library_path'] = '/usr/bin/convert';
      $conf_img['source_image'] = FCPATH . 'uploads/' . $file_name;
      $conf_img['new_image'] = FCPATH . 'uploads/' . 'thumb_' . $file_name;
      $conf_img['create_thumb'] = false;
      $conf_img['maintain_ratio'] = TRUE;
      $conf_img['height'] = 100;
      $conf_img['width'] = 100;
      $this->load->library('image_lib', $conf_img);
      //$this->image_lib->resize();
      if ($this->image_lib->resize()) {
        $this->session->set_userdata('last_upload_profile_image', $file_name);
//        $this->db->set('profile_img', $file_name)
//            ->where('id', $user_id)
//            ->update('___users');
//        $this->db->cache_delete_all();
        $rdata = new stdClass();
        $rdata->url = base_url('uploads/thumb_' . $file_name);
        return $this->re('s', 'Profile Picture Updated Successfully', $rdata);
      }
      log_message('error', __LINE__);
      return $this->re('', $this->image_lib->display_errors());
    }
    
    
    public function update_profile_image()
    {
      $this->load->helper('file');
      $config['upload_path'] = FCPATH . 'uploads/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['max_size'] = 4096;
      $config['encrypt_name'] = true;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('file')) {
        //$error = ['error' => $this->upload->display_errors('','')];
        return $this->re('e', $this->upload->display_errors('', ''));
      }
      $data = $this->upload->data();
      $file_name = $this->security->sanitize_filename($data['file_name']);
      $conf_img['image_library'] = 'ImageMagick';
      $conf_img['library_path'] = '/usr/bin/convert';
      $conf_img['source_image'] = FCPATH . 'uploads/' . $file_name;
      $conf_img['new_image'] = FCPATH . 'uploads/' . 'thumb_' . $file_name;
      $conf_img['create_thumb'] = false;
      $conf_img['maintain_ratio'] = TRUE;
      $conf_img['height'] = 100;
      $conf_img['width'] = 100;
      $this->load->library('image_lib', $conf_img);
      //$this->image_lib->resize();
      if ($this->image_lib->resize()) {
        $user_id = $this->input->post('id');
        $this->db->set('profile_img', $file_name)
          ->where('id', $user_id)
          ->update('___users');
//        $this->db->cache_delete_all();
        $rdata = new stdClass();
        $rdata->url = base_url('uploads/thumb_' . $file_name);
        return $this->re('s', 'Profile Picture Updated Successfully', $rdata);
      }
      log_message('error', __LINE__);
      return $this->re('', $this->image_lib->display_errors());
    }
    
    public function update_course_image($edit_course = FALSE)
    {
      $this->load->helper('file');
      $config['upload_path'] = FCPATH . 'media/course_cover_img/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['max_size'] = 8192;
      $config['encrypt_name'] = true;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('file')) {
        //$error = ['error' => $this->upload->display_errors('','')];
        log_message('error', __LINE__ . json_encode($this->upload->display_errors('', '')));
        return $this->re('e', $this->upload->display_errors('', ''));
      }
      $data = $this->upload->data();
      $file_name = $this->security->sanitize_filename($data['file_name']);
      $user_id = (int)$this->ion_auth->get_user_id();
      $conf_img['image_library'] = 'ImageMagick';
      $conf_img['library_path'] = '/usr/bin/convert';
      $conf_img['source_image'] = FCPATH . 'media/course_cover_img/' . $file_name;
      $conf_img['new_image'] = FCPATH . 'media/course_cover_img/' . 'thumb_' . $file_name;
      $conf_img['create_thumb'] = FALSE;
//      $conf_img['maintain_ratio'] = TRUE;
//      $conf_img['height'] = 125;
//      $conf_img['width'] = 220;
      $this->load->library('image_lib', $conf_img);
      //$this->image_lib->resize();
      if ($this->image_lib->resize()) {
        $rdata = new stdClass();
        $rdata->url = base_url('media/course_cover_img/thumb_' . $file_name);
        
        $this->db->reset_query();
        if ($edit_course) {
          $course_code = $this->input->post('cc');
          $res = $this->db->where('course_code', $course_code)->set('course_img', '/media/course_cover_img/thumb_' . $file_name)->update('___courses');
        } else {
          $res = $this->db->where('user_id', $user_id)->set('course_img', '/media/course_cover_img/thumb_' . $file_name)->update('___add_new_course_sess');
        }
        
        if (!$res) {
          return $this->db->error();
        }
        //$this->db->reset_query();
        return $this->re('s', 'Course Picture Updated Successfully', $rdata);
      }
      log_message('error', __LINE__ . json_encode($this->image_lib->display_errors()));
      return $this->re('', $this->image_lib->display_errors());
    }
    
    public function get_test_questions()
    {
      //$user_id = $this->ion_auth->get_user_id();
      $tid = (int)$this->input->post('tid');
      $test_exists = $this->check_test_exist($tid);
      if (!$test_exists) {
        return $this->re('e');
      }
      
      $test = $this->db->from('___tests')->where('id', $tid)->get()->row();
      if (empty($test)) {
        return $this->re('e');
      }
      
      $data = new stdClass();
      $data->test_name = $test->test_name;
      
      $questions = $this->db->from('___test_questions')->where('test_id', $tid)->get()->result();
      if (empty($questions)) {
        return $this->re('e');
        
      }
      
      $data->questions = $questions;
      
      return $this->re('s', '', $data);
      
      
    }
    
    
    public function update_question()
    {
      $user_id = $this->ion_auth->get_user_id();
      $question = $this->input->post('question');
      $a = $this->input->post('a');
      $b = $this->input->post('b');
      $c = $this->input->post('c');
      $d = $this->input->post('d');
      $e = $this->input->post('e');
      $true_answer = $this->input->post('true_answer');
      $qid = $this->input->post('qid');
      
      if (empty($qid)) {
        return $this->re('e');
      }
      
      $question_exist = $this->db->from('___test_questions')->where('id', $qid)->get()->num_rows();
      if ($question_exist < 1) {
        return $this->re('e');
      }
      
      
      if (empty($question)) {
        return $this->re('e', 'Question can not be empty');
        
      }
      
      
      if (empty($a)) {
        return $this->re('e', 'Choose A can not be empty');
        
      }
      
      
      if (empty($b)) {
        return $this->re('e', 'Choose B can not be empty');
        
      }
      
      
      if (empty($c)) {
        return $this->re('e', 'Choose C can not be empty');
        
      }
      
      
      if (empty($d)) {
        return $this->re('e', 'Choose D can not be empty');
        
      }
      
      
      if (empty($e)) {
        return $this->re('e', 'Choose E can not be empty');
        
      }
      
      
      if (empty($true_answer)) {
        return $this->re('e', 'Please Select True Answer');
        
      }
      
      
      $data = new stdClass();
      $data->question = $question;
      $data->a = $a;
      $data->b = $b;
      $data->c = $c;
      $data->d = $d;
      $data->e = $e;
      $data->true_answer = $true_answer;
      
      
      $res = $this->db->where('id', $qid)->update('___test_questions', $data);
      
      if ($res) {
        return $this->re('s', 'Successfully updated');
        
      }
      
      return $this->re('e');
      
      
    }
    
    public function update_sess_question()
    {
      $user_id = $this->ion_auth->get_user_id();
      $question = $this->input->post('question');
      $a = $this->input->post('a');
      $b = $this->input->post('b');
      $c = $this->input->post('c');
      $d = $this->input->post('d');
      $e = $this->input->post('e');
      $true_answer = $this->input->post('true_answer');
      $qid = $this->input->post('qid');
      
      if (empty($qid)) {
        return $this->re('e');
      }
      
      $question_exist = $this->db->from('___test_questions_sess')->where('added_by', $user_id)->where('id', $qid)->get()->num_rows();
      if ($question_exist < 1) {
        return $this->re('e');
      }
      
      
      if (empty($question)) {
        return $this->re('e', 'Question can not be empty');
        
      }
      
      
      if (empty($a)) {
        return $this->re('e', 'Choose A can not be empty');
        
      }
      
      
      if (empty($b)) {
        return $this->re('e', 'Choose B can not be empty');
        
      }
      
      
      if (empty($c)) {
        return $this->re('e', 'Choose C can not be empty');
        
      }
      
      
      if (empty($d)) {
        return $this->re('e', 'Choose D can not be empty');
        
      }
      
      
      if (empty($e)) {
        return $this->re('e', 'Choose E can not be empty');
        
      }
      
      
      if (empty($true_answer)) {
        return $this->re('e', 'Please Select True Answer');
        
      }
      
      
      $data = new stdClass();
      $data->question = $question;
      $data->a = $a;
      $data->b = $b;
      $data->c = $c;
      $data->d = $d;
      $data->e = $e;
      $data->true_answer = $true_answer;
      
      
      $res = $this->db->where('id', $qid)
        ->update('___test_questions_sess', $data);
      
      if ($res) {
        return $this->re('s', 'Successfully updated');
        
      }
      
      return $this->re('e', 'database insert error', $this->db->error());
      
      
    }
    
    public function publish_test()
    {
      $user_id = $this->ion_auth->get_user_id();
      $row = $this->db->from('___tests_sess')->where('added_by', $user_id)->get()->row();
      if (!isset($row->id)) {
        return $this->re('e');
        
      }
      
      $test_id = $row->id;
      unset($row->id);
      $row->date_added = time();
      
      
      $questions = $this->db->from('___test_questions_sess')
        ->where('added_by', $user_id)
        ->where('test_id', $test_id)->get()->result();
      if (empty($questions)) {
        return $this->re('e', 'Please add questions to test');
        
      }
      
      $test_name_exist = $this->db->from('___tests')->where('test_name', $row->test_name)->get()->num_rows();
      if ($test_name_exist > 0) {
        return $this->re('e', 'There is already another test with same name. Please choose a different test name');
        
      }
      
      $res = $this->db->insert('___tests', $row);
      if (!$res) {
        return $this->re('e');
      }
      
      $new_test = $this->db->from('___tests')->where('added_by', $user_id)->order_by('id', 'DESC')->get()->row();
      
      
      foreach ($questions as $k => $q) {
        unset($q->added_by, $q->id);
        $q->test_id = $new_test->id;
        $this->db->insert('___test_questions', $q);
        $this->db->reset_query();
        
      }
      
      $this->db->where('added_by', $user_id)->where('id', $test_id)->delete('___tests_sess');
      $this->db->reset_query();
      $this->db->where('test_id', $test_id)->where('added_by', $user_id)->delete('___test_questions_sess');
      $this->db->reset_query();
      
      $this->update_test_questions_order();
      
      return $this->re('s', 'Test published successfully');
      
      
    }
    
    
    public function crop_course_img()
    {
      
      $img = $this->input->post('img');
      $img_name = basename($img);
      $height = $this->input->post('height');
      $width = $this->input->post('width');
      $x = $this->input->post('x');
      $y = $this->input->post('y');
      $conf_img['image_library'] = 'ImageMagick';
      $conf_img['library_path'] = '/usr/bin/convert';
      $conf_img['source_image'] = FCPATH . 'media/course_cover_img/' . $img_name;
      $conf_img['new_image'] = FCPATH . 'media/course_cover_img/' . $img_name;
      $conf_img['create_thumb'] = FALSE;
      $conf_img['maintain_ratio'] = FALSE;
      $conf_img['height'] = $height;
      $conf_img['width'] = $width;
      $conf_img['x_axis'] = $x;
      $conf_img['y_axis'] = $y;
      $conf_img['quality'] = 100;
      $this->load->library('image_lib', $conf_img);
      //$this->image_lib->resize();
      if ($this->image_lib->crop()) {
        $rdata = new stdClass();
        $rdata->url = base_url('media/course_cover_img/' . $img_name);
        return $this->re('s', 'Course Picture Updated Successfully', $rdata);
      }
      log_message('error', __LINE__ . json_encode($this->image_lib->display_errors()));
      return $this->re('', $this->image_lib->display_errors());
    }
    
    public function update_lang()
    {
      $lang = strtolower($this->input->post('lang'));
      if (!in_array($lang, (array)$this->config->item('available_langs'))) {
        return $this->re();
      }
      $user_id = $this->ion_auth->get_user_id();
      $res = $this->db->set('language', $lang)->where('id', $user_id)->update($this->config->item('tables', 'ion_auth')['users']);
      if ($res) {
        return $this->re('s', 'User language Successfully updated');
      }
      return $this->re();
    }
    
    public function get_user_info($user_id): \stdClass
    {
      $result = $this->get_user($user_id);
      $return = new stdClass();
      $return->user_id = $user_id;
      $return->username = $result->username;
      $return->first_name = $result->first_name;
      $return->last_name = $result->last_name;
      $return->email = $result->email;
      $return->phone = $result->phone;
      $return->company = $result->company;
      $return->date_added = ($result->created_on ? date('Y-m-d H:i:s', $result->created_on) : '');
      $return->website = $result->website;
      $return->last_login = ($result->last_login ? date('Y-m-d H:i:s', $result->last_login) : '');
      $return->last_login_ip = $result->ip_address;
      $return->note = $result->note;
      $return->active = $result->active;
      $return->smtp_server = $result->smtp_server;
      $return->smtp_username = $result->smtp_username;
      $return->smtp_password = $result->smtp_password;
      $return->smtp_port = $result->smtp_port;
      $return->groups = $this->get_user_groups_id_name($user_id);
      if ($this->session->userdata['user_id'] == $user_id) {
        $return->my_profile = true;
      } else {
        $return->my_profile = false;
      }
      return $return;
    }
    
    public function set_user_level(): void
    {
      $user = $this->ion_auth->user()->row();
      $_SESSION['user_level'] = abs($user->user_level);
    }
    
    public function active_user(): \stdClass
    {
      $user_id = abs($this->input->post('id'));
      $status = abs($this->input->post('status'));
      if ($status === 0) {
        $active = 0;
      } else {
        $active = 1;
      }
      $return = new stdClass();
      if ($user_id == 1) {
        $return->status = 'error';
        $return->msg = 'Admin Account can not be disabled!!!';
        return $return;
      }
      $result = $this->db->set('active', $active)->where('id', $user_id)->update($this->ion_auth_model->tables['users']);
      if ($result) {
        $return->status = 'success';
        $return->msg = 'User Successfully updated.';
      } else {
        $return->status = 'error';
        $return->msg = 'Unable to complete request  !!!';
      }
      return $return;
    }
    
    public function activate_user($user_id = NULL)
    {
      if ($user_id == NULL) {
        return false;
      }
      $result = $this->db->set('active', 1)->where('id', $user_id)->update($this->ion_auth_model->tables['users']);
      $return = new stdClass();
      if ($result) {
        $return->status = 'success';
        $return->msg = 'User Successfully updated.';
      } else {
        $return->status = 'error';
        $return->msg = 'Unable to complete request  !!!';
      }
      return $return;
    }
    
    public function deactivate_user($user_id = NULL): \stdClass
    {
      $user_id = abs($user_id);
      $return = new stdClass();
      if ($user_id == 1) {
        $return->status = 'error';
        $return->msg = 'Unable to complete request  !!!';
        return $return;
      }
      $result = $this->db->set('active', 0)->where('id', $user_id)->update($this->ion_auth_model->tables['users']);
      if ($result) {
        $return->status = 'success';
        $return->msg = 'User Successfully updated.';
      } else {
        $return->status = 'error';
        $return->msg = 'Unable to complete request  !!!';
      }
      return $return;
    }
    
    public function check_login($data): void
    {
      $login = $this->ion_auth->login($data['identity'], $data['password'], $data['remember']);
      if ($login) {
        $this->user_glevel = $this->session->group->level;
        if (is_int($this->user_glevel) && $this->user_glevel === 99 && $this->ion_auth->is_admin()) {
          redirect('/admin', 'refresh');
        } else {
          redirect('/user', 'refresh');
        }
      }
    }
    
    public function get_inbox_users()
    {
      $users = $this->get_all_users(TRUE, FALSE);
      foreach ($users as $k => $user) {
        $users[$k]->unread_count = $this->get_unread_msg_count($user->user_id);
      }
      return $users;
    }
    
    public function add_article_get_draft()
    {
      $user_id = $this->ion_auth->get_user_id();
      $row = $this->db->select('code, name')->from('___add_new_article_sess')->where('user_id', $user_id)->get()->row();
      if (!empty($row)) {
        return $this->re('s', '', $row);
      }
      return $this->re('s', '');
    }
    
    public function add_article_save_draft()
    {
      $code = $this->input->post('code');
      $name = $this->input->post('name');
      $user_id = $this->ion_auth->get_user_id();
      $nor = $this->db->from('___add_new_article_sess')->where('user_id', $user_id)->get()->num_rows();
      if ($nor > 0) {
        $this->db->reset_query();
        $res = $this->db
          ->set('code', $code)
          ->set('name', $name)
          ->where('user_id', $user_id)->update('___add_new_article_sess');
        if ($res) {
          return $this->re('s', 'Draft Successfully saved');
        }
      } else {
        $res = $this->db
          ->set('code', $code)
          ->set('name', $name)
          ->set('user_id', $user_id)
          ->insert('___add_new_article_sess');
        if ($res) {
          return $this->re('s', 'Draft Successfully saved');
        }
      }
      $this->add_system_log('unable to save draft | ' . json_encode($this->db->error()), 5, 'system');
      return $this->re('e', '');
    }
    
    public function edit_article_update()
    {
      $code = $this->input->post('code');
      $name = $this->input->post('name');
      $name_url = url_title($name, '_');
      $old_name = $this->input->post('old_name');
      $user_id = $this->ion_auth->get_user_id();
      $old_file_path = FCPATH . 'media/' . $user_id . '/' . $old_name . '.html';
      $new_file_path = FCPATH . 'media/' . $user_id . '/' . $name_url . '.html';
      if (!file_exists($old_file_path)) {
        $this->add_system_log('unable to update article  html file. $old_file_path ' . $old_file_path, 5, 'system');
        return $this->re('e', '');
      }
      if (unlink($old_file_path)) {
        if (file_put_contents($new_file_path, $code)) {
          return $this->re('s', 'successfully saved');
        }
      } else {
        return $this->re('e', 'unable to delete old');
      }
      
      return $this->re('e', '');
      
    }
    
    public function get_html_file()
    {
      $user_id = $this->ion_auth->get_user_id();
      $file_name = $this->input->post('file_name');
      if (file_exists(FCPATH . 'media/' . $user_id . '/' . $file_name)) {
        $data = new stdClass();
        $data->html = file_get_contents(FCPATH . 'media/' . $user_id . '/' . $file_name);
        $path_parts = pathinfo(FCPATH . 'media/' . $user_id . '/' . $file_name);
        $data->name = $path_parts['filename'];
        return $this->re('s', '', $data);
      }
      $this->add_system_log('unable to load html file. file name ' . $file_name, 5, 'system');
      return $this->re('e', 'unable to get file info');
    }
    
    public function get_user_articles(): array
    {
      $user_id = $this->ion_auth->get_user_id();
      $this->load->helper('directory');
      $media_dir = FCPATH . 'media/' . $user_id . '/';
      $map_raw = directory_map($media_dir, 1);
      $map = [];
      if (empty($map_raw)) {
        return [];
      }
      foreach ($map_raw as $file) {
        if (pathinfo($media_dir . $file, PATHINFO_EXTENSION) === 'html') {
          $map[] = $file;
        }
      }
      return $map;
    }
    
    public function add_article_save()
    {
      $code = $this->input->post('code');
      $name = $this->input->post('name');
      $name_url_title = url_title($name, '_');
      $user_id = $this->ion_auth->get_user_id();
      $nor = $this->db
        ->from('___articles')
        ->where('name_url_title', $name_url_title)
        ->where('user_id', $user_id)
        ->get()->num_rows();
      if ($nor > 0) {
        return $this->re('e', 'you have already an article with same name . Please enter a different name');
      }
      $this->db->reset_query();
      $res = $this->db
        ->set('code', $code)
        ->set('name', $name)
        ->set('name_url_title', $name_url_title)
        ->set('user_id', $user_id)
        ->insert('___articles');
      if ($res) {
        $file_name = FCPATH . 'media/' . $user_id . '/' . $name_url_title . '.html';
        file_put_contents($file_name, $code);
        return $this->re('s', 'Article published Successfully. You can find your article in library now');
      }
      $this->add_system_log('unable to save article|' . json_encode($this->db->error()), 5, 'system');
      return $this->re('e', '');
    }
    
    public function remove_media()
    {
      $this->load->helper('directory');
      $file_name_raw = $this->input->post('file_name');
      $file_name = preg_replace('/[^A-Za-z0-9\-_.]/', '_', $file_name_raw);
      $user_id = $this->ion_auth->get_user_id();
      $dir_file = FCPATH . 'media/' . $user_id . '/';
      $dir_webp = FCPATH . 'media/' . $user_id . '_webp/';
      $map = directory_map($dir_file, 1);
      if (empty($map)) {
        return $this->re('e', 'Error');
      }
      $found = FALSE;
      foreach ($map as $file) {
        if (strcasecmp($file, $file_name) === 0) {
          $found = TRUE;
        }
      }
      if ($found) {
        if (mime_content_type($dir_file . $file_name) === 'video/mp4') {
          unlink($dir_webp . $file_name . '.webp');
        }
        unlink($dir_file . $file_name);
        return $this->re('s', 'file deleted successfully');
      }
      $rdata = new stdClass();
      $rdata->search = $file_name;
      return $this->re('e', 'Error', $rdata);
    }
    
    public function upload_media()
    {
      $this->load->helper('file');
      $this->load->library('upload');
      $user_id = $this->ion_auth->get_user_id();
      $upload_path = FCPATH . 'media/' . $user_id;
      if (!is_dir($upload_path)) {
        if (!mkdir($upload_path, 0777, TRUE) && !is_dir($upload_path)) {
          throw new RuntimeException(sprintf('Directory "%s" was not created', $upload_path));
        }
        chmod($upload_path, 0777);
      }
      $new_file_name = NULL;
      if (!empty($_FILES['file']['name'])) {
        $new_file_name = preg_replace('/[^A-Za-z0-9\-_.]/', '_', $_FILES['file']['name']);
//        echo  $new_file_name;die;
      }
      $config_up['upload_path'] = $upload_path . '/';
      $config_up['allowed_types'] = 'jpg|jpeg|png|mp4';
      $config_up['encrypt_name'] = false;
      if ($new_file_name) {
        $config_up['file_name'] = $new_file_name;
      }
      $this->upload->initialize($config_up);
      if (!$this->upload->do_upload('file')) {
        //$error = ['error' => $this->upload->display_errors('','')];
        return $this->re('e', $this->upload->display_errors('', ''));
      }
      $data = $this->upload->data();
      chmod($data['full_path'], 0777);
      if ($data['file_type'] === 'video/mp4') {
        $this->make_webp($user_id, $data['file_name']);
      }
      //$file_name = $this->security->sanitize_filename($data['file_name']);
      return $this->re('s', 'successfully uploaded', $data);
    }
    
    public function get_courses(): array
    {
      $this->db->select('c.*, u.first_name, u.last_name');
      $this->db->from('___courses c');
      $this->db->join('___users u', 'c.user_id=u.id', 'left');
      return $this->db->get()->result();
    }
    
    public function get_test_sess($sess = FALSE, $tid = NULL)
    {
      $user_id = $this->ion_auth->get_user_id();
      
      $test_table = '___tests_sess';
      $question_table = '___test_questions_sess';
      
      
      $test = $this->db->from($test_table)->where('added_by', $user_id)->order_by('id', 'DESC')->get()->row();
      if (empty($test)) {
        return NULL;
      }
      
      $test_id = $test->id;
      
      $data = new stdClass();
      
      $questions = $this->db->from($question_table)->where('test_id', $test_id)->get()->result();
      
      $data->test = $test;
      $data->questions = $questions;
      
      return $data;
      
    }
    
    public function get_test($tid = NULL)
    {
      
      
      $test_exist = $this->is_test_exist($tid);
      if (!$test_exist) {
        return NULL;
      }
      
      
      $test = $this->db->from('___tests')->where('id', $tid)->get()->row();
      if (empty($test)) {
        return NULL;
      }
      
      $data = new stdClass();
      
      $questions = $this->db->from('___test_questions')->where('test_id', $tid)->get()->result();
      
      $data->test = $test;
      $data->questions = $questions;
      
      return $data;
      
    }
    
    
    public function get_course($course_code = NULL)
    {
      if (NULL === $course_code || strlen($course_code) !== 32) {
        return NULL;
      }
      $res = $this->db->select('c.*, u.first_name, u.last_name')
        ->from('___courses c')
        ->join('___users u', 'c.user_id=u.id', 'left')
        ->where('c.course_code', $course_code)->get()->row();
      return $res;
    }
    
    public function make_gif($user_id = NULL, $file_name = NULL)
    {
      if (NULL === $user_id || NULL === $file_name) {
        return FALSE;
      }
      if (!is_dir(FCPATH . 'media/' . $user_id . '_gif/')) {
        if (!mkdir($concurrentDirectory = FCPATH . 'media/' . $user_id . '_gif/', 0777, TRUE) && !is_dir($concurrentDirectory)) {
          throw new RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }
        chmod(FCPATH . 'media/' . $user_id . '_gif/', 0777);
      }
      $from_file = FCPATH . 'media/' . $user_id . '/' . $file_name;
      $gif_file = FCPATH . 'media/' . $user_id . '_gif/' . $file_name . '.gif';
      $code = 'bash ' . FCPATH . 'scripts/make_gif.sh ' . $from_file . ' ' . $gif_file;
      return exec($code);
//       file_put_contents('last_code.txt',$code);
    }
    
    public function make_webp($user_id = NULL, $file_name = NULL)
    {
      if (NULL === $user_id || NULL === $file_name) {
        return FALSE;
      }
      if (!is_dir(FCPATH . 'media/' . $user_id . '_webp/')) {
        if (!mkdir($concurrentDirectory = FCPATH . 'media/' . $user_id . '_webp/', 0777, TRUE) && !is_dir($concurrentDirectory)) {
          throw new RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }
        chmod(FCPATH . 'media/' . $user_id . '_webp/', 0777);
      }
      $from_file = FCPATH . 'media/' . $user_id . '/' . $file_name;
      $gif_file = FCPATH . 'media/' . $user_id . '_webp/' . $file_name . '.webp';
      $code = 'bash ' . FCPATH . 'scripts/make_gif.sh ' . $from_file . ' ' . $gif_file;
      return exec($code);
    }
    
    public function get_unread_msg_count($from_user_id = NULL): int
    {
      if (NULL === $from_user_id) {
        return 0;
      }
      return $this->db->from('___inbox_messages')
        ->where('from', $from_user_id)
        ->where('to', $this->ion_auth->get_user_id())
        ->where('date_read', 0)
        ->get()->num_rows();
    }
    
    public function get_all_users($include_admins = FALSE, $include_me = TRUE): array
    {
      $this->db->select('*');
      $this->db->from($this->ion_auth_model->tables['users'] . ' a');
      $this->db->join($this->ion_auth_model->tables['users_groups'] . ' b', 'b.user_id=a.id', 'left');
      $this->db->join($this->ion_auth_model->tables['groups'] . ' c', 'c.id=b.group_id', 'left');
      if (!$include_admins) {
        $this->db->where('c.group_level !=', '99');
      }
      if (!$include_me) {
        $this->db->where('a.id !=', $this->ion_auth->get_user_id());
      }
      $this->db->order_by('a.id', 'asc');
      return $this->db->get()->result();
    }
    
    public function get_user($user_id = NULL)
    {
      if ($user_id === NULL) {
        return false;
      }
      $user_id = abs($user_id);
      $this->db->select('*');
      $this->db->from($this->ion_auth_model->tables['users'] . ' a');
      $this->db->join($this->ion_auth_model->tables['users_groups'] . ' b', 'b.user_id=a.id', 'left');
      $this->db->join($this->ion_auth_model->tables['groups'] . ' c', 'c.id=b.group_id', 'left');
      $this->db->where('a.id', $user_id);
      $res = $this->db->get();
      if ($res->num_rows() > 0) {
        return $res->row();
      }
      return NULL;
    }
    
    public function get_username($user_id = NULL)
    {
      if ($user_id === NULL) {
        return false;
      }
      $user_id = abs($user_id);
      $this->db->select('username');
      $this->db->from($this->ion_auth_model->tables['users']);
      $this->db->where('id', $user_id);
      $q = $this->db->get();
      if ($q) {
        return $q->row();
      }
      return false;
    }
    
    public function get_user_groups_id_name($user_id): array
    {
      $result = $this->ion_auth->get_users_groups($user_id)->result();
      $return = array();
      foreach ($result as $k => $v) {
        $g_id = $v->id;
        $g_name = $v->name;
        $return[$g_id] = $g_name;
      }
      return $return;
    }
    
    public function get_user_all($user_id)
    {
      $user_all = $this->ion_auth->user($user_id)->row();
      $user_group = $this->ion_auth->get_users_groups($user_id)->row();
      foreach ($user_group as $key => $val) {
        if ($key === 'id') {
          $key = 'group_id';
        }
        $user_all->$key = $val;
      }
      $this->user_all = $user_all;
      return $user_all;
    }
    
    public function update_profile($user_id): bool
    {
      $data['username'] = $this->input->post('username');
      $data['email'] = $this->input->post('email');
      $data['first_name'] = $this->input->post('first_name');
      $data['last_name'] = $this->input->post('last_name');
      $data['about'] = $this->input->post('about');
      $data['mobile_number'] = $this->input->post('mobile_number');
      $data['website'] = $this->input->post('website');
      $this->db->where('id', $user_id);
      return $this->db->update($this->ion_auth_model->tables['users'], $data);
    }
    
    public function update_profile_pass($user_id)
    {
      $data['password'] = $this->input->post('pass');
      return $this->ion_auth->update($user_id, $data);
    }
    
    public function get_user_logs($user_id): array
    {
      $this->db->select('id,time,user_id,what,ip,flag,level');
      $this->db->from('logs');
      $this->db->where('user_id', $user_id);
      return $this->db->get()->result();
    }
    
    public function get_all_admins(): array
    {
      $this->db->select('*');
      $this->db->from($this->ion_auth_model->tables['users'] . ' a');
      $this->db->join($this->ion_auth_model->tables['users_groups'] . ' b', 'b.user_id=a.id', 'left');
      $this->db->join($this->ion_auth_model->tables['groups'] . ' c', 'c.id=b.group_id', 'left');
      $this->db->where('c.group_level', '99');
      $this->db->order_by('a.id', 'asc');
      return $this->db->get()->result();
    }
    
    public function delete_user($user_id)
    {
      $result = $this->ion_auth->delete_user($user_id);
      $this->update_group_total_user();
      return $result;
    }
    
    public function del_user()
    {
      $id = $this->input->post('id');
      if (empty($id)) {
        log_message('error', __FILE__ . '_' . __LINE__ . ':' . 'no user id');
        return $this->re();
      }
      $cd = (array)$this->config->item('cannot_be_deleted_user_ids', 'ion_auth');
      if (in_array($id, $cd)) {
        return $this->re('e', 'This user can not be Deleted');
      }
      $result = $this->ion_auth->delete_user($id);
      if ($result) {
        return $this->re('s', 'User deleted successfully');
      }
      return $this->re('e', '');
    }
    
    public function get_inbox_from_user_msg()
    {
      $to_user_id = $this->input->post('id');
      if (empty($to_user_id)) {
        return $this->re('e', '');
      }
      $the_user_id = $this->ion_auth->get_user_id();
      $users_arr = [$to_user_id, $the_user_id];
      $this->db->from('___inbox_messages');
      $this->db->where_in('from', $users_arr);
      $this->db->where_in('to', $users_arr);
      $this->db->order_by('id')->limit(2000);
      $res = $this->db->get()->result();
      foreach ($res as $k => $row) {
        $res[$k]->ago = $this->time_diff_string(date('Y-m-d H:i:s', $row->date_sent), NULL, FALSE, FALSE);
      }
      $this->db->set('date_read', time())
        ->where('date_read', 0);
      $this->db->where('from', $to_user_id);
      $this->db->where('to', $the_user_id);
      $this->db->update('___inbox_messages');
      return $this->re('s', '', $res);
    }
    
    public function get_sections_tt()
    {
      $user_id = $this->ion_auth->get_user_id();
      $res = $this->db->from('___add_new_course_sess')
        ->where('user_id', $user_id)
        ->get()->row();
      if (empty($res->sections)) {
        return $this->re('s', '22222');
      }
      $sections = json_decode($res->sections);
      if (empty($sections)) {
        return $this->re('s', '111');
      }
      $data = [];
      foreach ($sections as $k => $section) {
        $row = new stdClass();
        $row->section_id = $section->id;
        $row->media_duration_seconds = 0;
        if (empty($section->lectures)) {
          $row->tmls = '00:00:00';
          $data[] = $row;
          continue;
        }
        foreach ($section->lectures as $kk => $lecture) {
          if (empty($lecture->media_duration_seconds)) {
            continue;
          }
          $row->media_duration_seconds += $lecture->media_duration_seconds;
        }
        $row->tmls = $this->convert_seconds_to_string_time($row->media_duration_seconds);
        $data[] = $row;
      }
      return $this->re('s', '444', $data);
    }
    
    public function get_used_group_levels(): array
    {
      $groups = $this->db->select('group_level')->from('___groups')->group_by('group_level')->get()->result_array();
      return array_column($groups, 'group_level');
    }
    
    public function get_all_groups(): array
    {
      $this->db->select('*');
      $this->db->from('___groups');
      $this->db->order_by('group_level', 'ASC');
      return $this->db->get()->result();
    }
    
    public function inbox_search_user()
    {
      $q = $this->input->post('q');
      $this->db
        ->select('id, first_name, last_name, email, profile_img')
        ->from('___users');
      if (!empty($q)) {
        $this->db->group_start();
        $this->db->or_like('first_name', $q)
          ->or_like('last_name', $q)
          ->or_like('email', $q);
        $this->db->group_end();
      }
      $users = $this->db->where('id !=', $this->ion_auth->get_user_id())
        ->get()->result();
      if (empty($users)) {
        return $this->re('s', 'No Result !!!');
      }
      foreach ($users as $k => $user) {
        $users[$k]->unread_count = $this->get_unread_msg_count($user->id);
      }
      return $this->re('s', '', $users);
    }
    
    public function sent_msg()
    {
      $to = (int)$this->input->post('to');
      $from = $this->ion_auth->get_user_id();
      $msg = $this->input->post('msg');
      $the_user = $this->ion_auth->user()->row();
      $to_user = $this->ion_auth->user($to)->row();
      $from_username = $the_user->first_name . ' ' . $the_user->last_name;
      $to_username = $to_user->first_name . ' ' . $to_user->last_name;
      $data = [
        'message' => $msg,
        'to' => $to,
        'from' => $from,
        'date_sent' => time(),
        'from_username' => $from_username,
        'to_username' => $to_username
      ];
      $res = $this->db->insert('___inbox_messages', $data);
      if ($res) {
        return $this->re('s', 'message sent successfully');
      }
      return $this->re('e', '');
    }
    
    public function update_group_total_user(): void
    {
      $group_users = $this->db->select('user_id,group_id')->from($this->ion_auth_model->tables['users_groups'])->get()->result();
      $all_groups = [];
      $all_group_users = [];
      foreach ($group_users as $k => $v) {
        if (!in_array($v->group_id, $all_groups)) {
          $all_groups[] = $v->group_id;
        }
      }
      foreach ($all_groups as $k => $group_id) {
        $total_user_count = 0;
        foreach ($group_users as $ki => $user) {
          if ($user->group_id == $group_id) {
            $total_user_count++;
            $all_group_users[$k] = ['id' => $group_id, 'total_users' => $total_user_count];
          }
        }
      }
      $this->db->update_batch($this->ion_auth_model->tables['groups'], $all_group_users, 'id');
    }
    
    public function change_lang(): \stdClass
    {
      $return = new stdClass();
      $this->form_validation->set_rules('lang', 'Language', 'trim|required');
      if ($this->form_validation->run() == true) {
        $lang = $this->input->post('lang');
        $user_id = $this->ion_auth->user()->row()->id;
        $data = ['language' => $lang];
        $this->db->where('id', $user_id);
        $result = $this->db->update($this->ion_auth_model->tables['users'], $data);
        if ($result) {
          $return->status = 'success';
          $return->msg = 'Language Updated';
          $this->session->language = $lang;
        }
      } else {
        $return->status = 'error';
        $return->msg = validation_errors();
      }
      return $return;
    }
    
    public function check_username(): \stdClass
    {
      $username = trim($this->input->post('username'));
      $result = $this->ion_auth->username_check($username);
      $return = new stdClass();
      if ($result == 1) {
        $return->status = 'error';
        $return->msg = 'There is already another user with same username !!!';
      } else {
        $return->status = 'success';
      }
      return $return;
    }
    
    public function del_test()
    {
      $test_id = $this->input->post('id');
      if (empty($test_id)) {
        return $this->re();
      }
      $test_exist = $this->check_test_exist((int)$test_id);
      if (!$test_exist) {
        return $this->re('e');
      }
      
      $res = $this->db->where('id', $test_id)->delete('___tests');
      if ($res) {
        $this->db->reset_query();
        $this->db->where('test_id', $test_id)->delete('___test_questions');
        return $this->re('s', 'Successfully Deleted');
        
      }
      
      return $this->re('e');
      
      
    }
    
    public function preview_test()
    {
      $test_id = $this->input->post('id');
      if (empty($test_id)) {
        return $this->re();
      }
      $test_exist = $this->check_test_exist((int)$test_id);
      if (!$test_exist) {
        return $this->re('e');
      }
      
      $test = $this->db->from('___tests')->where('id', $test_id)->get()->row();
      if (empty($test)) {
        return $this->re('e');
      }
      
      
      $question = $this->db->from('___test_questions')->where('test_id', $test_id)->get()->result();
      
      
      $data = new stdClass();
      $data->test_name = $test->test_name;
      $data->questions = $question;
      
      return $this->re('s', '', $data);
      
      
    }
    
    public function preview_test2()
    {
      $test_name = $this->input->post('name');
      if (empty($test_name)) {
        return $this->re();
      }
      $test_exist = $this->check_test_name_exist($test_name);
      if (!$test_exist) {
        return $this->re('e');
      }
      
      $test = $this->db->from('___tests')->where('test_name', $test_name)->get()->row();
      if (empty($test)) {
        return $this->re('e');
      }
      
      
      $question = $this->db->from('___test_questions')->where('test_id', $test->id)->get()->result();
      
      
      $data = new stdClass();
      $data->test_name = $test->test_name;
      $data->questions = $question;
      
      return $this->re('s', '', $data);
      
      
    }
    
    public function time_diff_string($from, $to = NULL, $full = FALSE, $ago = TRUE): string
    {
      if ($to == NULL) {
        $to = 'now';
      }
      try {
        $from = new DateTime($from);
      } catch (Exception $e) {
      }
      try {
        $to = new DateTime($to);
      } catch (Exception $e) {
      }
      $diff = $to->diff($from);
      $diff->w = floor($diff->d / 7);
      $diff->d -= $diff->w * 7;
      $string = ['y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',];
      foreach ($string as $k => &$v) {
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
    
    private function re($status = NULL, $msg = NULL, $data = NULL, $pulsate = NULL, $action = NULL): \stdClass
    {
      $return = new stdClass();
      if ($status === 's') {
        $return->status = 'success';
      } else {
        $return->status = 'error';
      }
      if (NULL !== $msg) {
        $return->msg = $msg;
      } else if ($status !== 's') {
        $return->msg = 'Unable to Complete Request !!!';
      }
      if (NULL !== $data) {
        $return->data = $data;
      }
      if (NULL !== $pulsate) {
        $return->pulsate = $pulsate;
      }
      if (NULL !== $action) {
        $return->action = $action;
      }
      return $return;
    }
  }
