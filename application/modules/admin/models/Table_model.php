<?php defined('BASEPATH') OR exit('No direct script access allowed');
  
  /**
   * Class Table_model
   * @property CI_Input input
   * @property CI_Loader load
   * @property CI_Config config
   * @property CI_DB_query_builder $db
   * @property CI_Session $session
   * @property CI_Image_lib image_lib
   * @property group_model group_model
   * @property Mentor_model admin_model
   * @property ion_auth|ion_auth_model $ion_auth
   * @property ion_auth_model $ion_auth_model
   */
  class Table_model extends CI_Model
  {
    
    /**
     * Table_model constructor.
     */
    public function __construct()
    {
      
      parent::__construct();
      $this->load->model('group_model');
      $this->load->helper('text');
      $this->load->helper('security');
      
    }



// --Commented out by Inspection START (2019-12-26, 13:33):
//    /**
//     * @return mixed
//     */
//    public function array_order_by()
//    {
//      $args = func_get_args();
//      $data = array_shift($args);
//      foreach ($args as $n => $field) {
//        if (is_string($field)) {
//          $tmp = [];
//          foreach ($data as $key => $row) {
//            $tmp[$key] = $row[$field];
//          }
//          $args[$n] = $tmp;
//        }
//      }
//      $args[] = &$data;
//      array_multisort(...$args);
//
//      return array_pop($args);
//    }
// --Commented out by Inspection STOP (2019-12-26, 13:33)


// --Commented out by Inspection START (2019-12-26, 13:33):
//    /**
//     * @param $q
//     * @param $multi_arr
//     *
//     * @return array
//     */
//    public function search_array($q, $multi_arr): array
//    {
//      $found_in = [];
//      foreach ($multi_arr as $k => $arr) {
//        foreach ($arr as $key => $val) {
//          if (strpos($val, $q) !== FALSE) {
//            $found_in[] = $k;
//          }
//        }
//      }
//      $found_in = array_unique($found_in);
//
//      return $found_in;
//    }
// --Commented out by Inspection STOP (2019-12-26, 13:33)


// --Commented out by Inspection START (2019-12-26, 13:33):
//    public function search_array_in_key($q, $multi_arr, $key): array
//    {
//      $found_in = [];
//      foreach ($multi_arr as $k => $arr) {
//        foreach ($arr as $kk => $val) {
//          if (strpos($val, $q) !== FALSE) {
//            $found_in[] = $k;
//          }
//        }
//      }
//      $found_in = array_unique($found_in);
//
//      return $found_in;
//    }
// --Commented out by Inspection STOP (2019-12-26, 13:33)


// --Commented out by Inspection START (2019-12-26, 13:33):
//    /**
//     * @return array
//     */
//    public function system_logs_table(): array
//    {
//
//      $result_count = 0;
//      $records = [];
//
//      if ($this->input->post('customActionType') === 'group_action') {
//        $customActionName = $this->input->post('customActionName');
//        $all_ids = $this->input->post('id');
//        $count_of_rows = count($all_ids);
//        if ($customActionName === 'delete') {
//          $total_deleted = 0;
//          foreach ($all_ids as $k => $v) {
//
//            $res_del = $this->system_logs_model->del_log($v);
//            if ($res_del) {
//              $total_deleted++;
//            }
//          }
//
//          if ($total_deleted === 0) {
//            $records['customActionStatus'] = 'ERROR';
//            $records['customActionMessage'] = 'ERROR !!! Unable to delete Log(s) ';
//          } elseif ($count_of_rows === $total_deleted) {
//            $records['customActionStatus'] = 'OK';
//            $records['customActionMessage'] = " \"$count_of_rows\" Log(s) have been deleted Successfully";
//          } else {
//            $records['customActionStatus'] = 'ERROR';
//            $records['customActionMessage'] = 'ERROR !!! Action Could not completed for all selected ogs. ';
//          }
//        }
//      }
//      $order = $this->input->post('order');
//      $order_way = $order[0]['dir'];
//      $order_column = (abs($order[0]['column']) - 1);
//
//      $column_array = ['id',
//          'severity',
//          'type',
//          'time_unix',
//          'log'];
//      $column_search_array = ['id',
//          'severity',
//          'type',
//          'time_unix',
//          'log',
//          'from_date',
//          'to_date'];
//
//
//      $order_by = '';
//      if ($order_column < count($column_array)) {
//        $order_by = $column_array[$order_column];
//      }
//
//      $search_val = $this->input->post('search');
//      $action = $this->input->post('action');
//
//
//      if (isset($search_val['value']) && !empty($search_val['value'])) {
//        $search = 1;
//      } elseif (isset($action) && ($action === 'filter')) {
//        $scr_count = 0;
//        foreach ($column_search_array as $sc) {
//
//          $scr = $this->input->post($sc);
//          if (!is_array($scr) && $scr !== '') {
//            $scr_count++;
//          }
//
//        }
//        if ($scr_count > 0) {
//          $search = 1;
//        } else {
//          $search = 0;
//        }
//
//      } else {
//        $search = 0;
//      }
//
//
//      $this->db->from($this->ion_auth_model->tables['system_logs']);
//      //$this->db->where('type', 'system');
//
//
//      if ($search === 1) {
//        $this->db->group_start();
//
//        $id = $this->input->post('id');
//        if ($id !== '') {
//          $id = abs($id);
//          $this->db->like('id', $id);
//        }
//
//        $severity = $this->input->post('severity');
//        if ($severity !== '') {
//          $this->db->where('severity', $severity);
//        }
//
//        $type = $this->input->post('type');
//        if ($type !== '') {
//          $this->db->like('type', $type);
//        }
//
//        $log = $this->input->post('log');
//        if ($log !== '') {
//          $this->db->like('log', $log);
//        }
//
//
//        $from_date = $this->input->post('from_date');
//
//        if ($from_date !== '') {
//          $from_date = strtotime($from_date);
//          $this->db->where('time_unix >=', $from_date);
//
//        }
//
//        $to_date = $this->input->post('to_date');
//        if ($to_date !== '') {
//          $to_date = strtotime($to_date);
//          $this->db->where('time_unix <=', $to_date);
//
//        }
//
//        $this->db->group_end();
//
//      }
//
//
//      if (!empty($order_way)) {
//        $this->db->order_by($order_by, $order_way);
//      } else {
//        $this->db->order_by('id', 'asc');
//      }
//
//      $iDisplayStart = (int)$this->input->post('start');
//      $iDisplayLength = (int)$this->input->post('length');
//
//
//      $result_get = $this->db->get();
//      if (!empty($result_get->result_id->num_rows)) {
//        $result_count = $result_get->result_id->num_rows;
//      }
//      $result = array_slice($result_get->result(), $iDisplayStart, $iDisplayLength);
//
//
//      $iTotalRecords = $result_count;
//
//
//      $sEcho = (int)$this->input->post('draw');
//
//      $records['data'] = [];
//
//
//      foreach ($result as $k => $v) {
//
//
//        if ($v->severity > 0 && $v->severity <= 3) {
//          $severity = '<div class="label label-md label-info"> ' . $v->severity . '</div>';
//        } elseif ($v->severity > 3 && $v->severity <= 6) {
//          $severity = '<div class="label label-md label-warning"> ' . $v->severity . '</div>';
//        } else {
//          $severity = '<div class="label label-sm label-danger"> ' . $v->severity . '</div>';
//        }
//        $view_row = '<button class="btn btn-xs btn-primary p2 view_row" data-toggle="tooltip" data-placement="right" data-original-title="View" data-id="' . $v->id . '"><i class="fa fa-search"></i></button>';
//
//        if ($v->time_unix) {
//          $time_unix = '<span class="label label-primary t10 p3" data-toggle="tooltip" data-placement="right" title="' . $this->time_diff_string(date('Y-m-d H:i:s', $v->time_unix)) . '">' . date('Y-m-d H:i:s', $v->time_unix) . '</span>';
//        } else {
//          $time_unix = 'NULL';
//        }
//        $check_box = '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="' . $v->id . '"/><span></span></label>';
//
//
//        $log = word_limiter(strip_tags($v->log), 20);
//        //$log = $v->log;
//
//        $actions = '<span class="act_buttons">' . $view_row . '</span>';
//
//        $records['data'][] = [$check_box,
//            $v->id,
//            $severity,
//            $v->type,
//            $time_unix,
//            $log,
//            $actions];
//
//      }
//
//
//      $records['draw'] = $sEcho;
//      $records['recordsTotal'] = $iTotalRecords;
//      $records['recordsFiltered'] = $iTotalRecords;
//
//
//      return $records;
//
//    }
// --Commented out by Inspection STOP (2019-12-26, 13:33)
    
    
    /**
     * @param bool $mini
     * @return array
     */
    public function users_table($mini = FALSE): array
    {
      $result_count = 0;
      $records = [];
      $result = [];
      
      $order = $this->input->post('order');
      $order_way = $order[0]['dir'];
      $order_column = (abs($order[0]['column']));
      
      $column_array = ['user_id',
        'username',
        'email',
        'first_name',
        'last_name',
        'c.name',
        'a.active',

      ];
      $column_search_array = [
        'user_id',
        'username',
        'email',
        'first_name',
        'last_name',
        'name',
        'active',


      ];
      
      
      $order_by = '';
      if ($order_column < count($column_array)) {
        $order_by = $column_array[$order_column];
      }
      
      $search_val = $this->input->post('search');
      
      
      $this->db->select('a.id, a.email, a.first_name, a.last_name, a.active, b.group_id, c.group_level, a.created_on, a.last_login, a.ip_address, a.profile_img');
      $this->db->from($this->ion_auth_model->tables['users'] . ' a');
      $this->db->join($this->ion_auth_model->tables['users_groups'] . ' b', 'b.user_id=a.id', 'left');
      $this->db->join($this->ion_auth_model->tables['groups'] . ' c', 'c.id=b.group_id', 'left');
      $this->db->group_start();
      $this->db->where('c.group_level <', '100');
      
      $this->db->group_end();
      $search = FALSE;
      
      $basic_search = FALSE;
      if (isset($search_val['value']) && !empty($search_val['value'])) {
        $basic_search = TRUE;
        $search = TRUE;
      }
      
      
      if ($basic_search) {
        $this->db->group_start();
        
        $field_arr = ['a.id', 'a.email', 'a.first_name', 'a.last_name', 'a.active', 'b.group_id', 'c.group_level', 'a.created_on', 'a.last_login', 'a.ip_address'];
        
        foreach ($field_arr as $field) {
          $this->db->or_like($field, $search_val['value']);
        }
        
        $this->db->group_end();
        
      }
      
      $column_search = FALSE;
      
      $columns = $this->input->post('columns');
      foreach ($columns as $k => $column) {
        if (!empty($column['search']['value'])) {
          $column_search = TRUE;
        }
        
      }
      
      
      if ($column_search) {
        $this->db->group_start();
        
        foreach ($columns as $k => $column) {
          if (!empty($column['search']['value'])) {
            
            
            switch ($column['data']) {
              case 'ID':
                $this->db->like('a.id', $column['search']['value']);
                break;
              case 'FullName':
                $this->db->or_like('a.first_name', $column['search']['value']);
                $this->db->or_like('a.last_name', $column['search']['value']);
                $this->db->or_like('a.email', $column['search']['value']);
                break;
              case 'Active':
                $this->db->like('a.active', $column['search']['value']);
                break;
              case 'Group':
                $this->db->like('b.group_id', $column['search']['value']);
                break;
              case 'LastLogin':
  
  
                if (strpos($column['search']['value'], '|') === FALSE) {
                  // to value
                  $to = DateTime::createFromFormat('m/d/Y', $column['search']['value']);
                  $to_unix = $to->format('U');
                  $this->db->where('a.last_login <=', $to_unix);
                } else {
                  $parts = explode('|', $column['search']['value']);
                  $from = $parts[0];
                  $to = $parts[1];
    
                  if ($from !== '') {
                    $from = DateTime::createFromFormat('m/d/Y', $from);
                    $from_unix = $from->format('U');
                    $this->db->where('a.last_login >=', $from_unix);
                  }
    
                  if ($to !== '') {
                    $to = DateTime::createFromFormat('m/d/Y', $to);
                    $to_unix = $to->format('U');
                    $this->db->where('a.last_login <=', $to_unix);
                  }
    
    
                }
                
                break;
              case 'IP':
                $this->db->like('a.ip_address', $column['search']['value']);
                break;
              case 'JoinDate':
                if (strpos($column['search']['value'], '|') === FALSE) {
                  // to value
                  $to = DateTime::createFromFormat('m/d/Y', $column['search']['value']);
                  $to_unix = $to->format('U');
                  $this->db->where('a.created_on <=', $to_unix);
                } else {
                  $parts = explode('|', $column['search']['value']);
                  $from = $parts[0];
                  $to = $parts[1];
  
                  if ($from !== '') {
                    $from = DateTime::createFromFormat('m/d/Y', $from);
                    $from_unix = $from->format('U');
                    $this->db->where('a.created_on >=', $from_unix);
                  }
  
                  if ($to !== '') {
                    $to = DateTime::createFromFormat('m/d/Y', $to);
                    $to_unix = $to->format('U');
                    $this->db->where('a.created_on <=', $to_unix);
                  }
                }
                break;
            }
            
          }
          
        }
        
        
        $this->db->group_end();
      }
      
      
      if (!empty($order_way)) {
        $this->db->order_by($order_by, $order_way);
      } else {
        $this->db->order_by('user_id', 'asc');
      }
      
      $iDisplayStart = (int)$this->input->post('start');
      $iDisplayLength = (int)$this->input->post('length');
      $last_query = '';
      if ($iDisplayStart == 0 && $iDisplayLength > 0 && $search == 0) {
        $result = $this->db->get()->result();
        $result_count = count($result);
        $last_query = $this->db->last_query();
        $limited_query = "$last_query LIMIT $iDisplayLength";
        $result = $this->db->query($limited_query)->result();
        
      } elseif ($iDisplayStart > 0 && $iDisplayLength > 0 && $search == 0) {
        
        $result = $this->db->get()->result();
        $result_count = count($result);
        $last_query = $this->db->last_query();
        $limited_query = "$last_query LIMIT $iDisplayStart, $iDisplayLength";
        $result = $this->db->query($limited_query)->result();
        
      } elseif ($iDisplayStart == 0 && $iDisplayLength > 0 && $search == 1) {
        
        $result = $this->db->get()->result();
        $last_query = $this->db->last_query();
        $result_count = count($result);
        $last_query_limit = "$last_query LIMIT $iDisplayLength";
        $result = $this->db->query($last_query_limit)->result();
      } elseif ($iDisplayStart > 0 && $iDisplayLength > 0 && $search == 1) {
        $result = $this->db->get()->result();
        $last_query = $this->db->last_query();
        $result_count = count($result);
        $last_query_limit = "$last_query LIMIT $iDisplayLength, $iDisplayStart";
        $result = $this->db->query($last_query_limit)->result();
      } elseif ($search == 0) {
        $this->db->limit(500);
      }
      
      
      $iTotalRecords = $result_count;
      
      
      $sEcho = (int)$this->input->post('draw');
      $records['aaData'] = [];
      
      foreach ($result as $k => $v) {
        
        
        if ($v->active == 1) {
          $status = '<input data-id="' . $v->id . '" type="checkbox" class="form-control form-filter input-sm js-switch" name="status" checked>';
        } else {
          $status = '<input data-id="' . $v->id . '" type="checkbox" class="form-control form-filter input-sm js-switch" name="status">';
        }
        
        
        $del_button = '<button class="btn btn-xs btn-danger p2 del_user" data-user_id="' . $v->id . '"><i class="icon-trash"></i></button>';
        $edit_button = '<a href="' . site_url("admin/edit_user/$v->id") . '" class="btn btn-xs yellow-gold p2"><i class="icon-note"></i></a>';
        if ($v->last_login) {
          $last_login =
            '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="'
            . $this->time_diff_string(date('Y-m-d H:i:s', $v->last_login)) . '">' . date('Y-m-d H:i:s', $v->last_login) . '</a>';
          
        } else {
          $last_login = '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="NULL">NULL</a>';
          
        }
        
        if ($v->created_on) {
          $join_date = '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="' . $this->time_diff_string(date('Y-m-d H:i:s', $v->created_on)) . '">' . date('Y-m-d H:i:s', $v->created_on) . '</a>';
          
        } else {
          $join_date = '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="NULL">NULL</a>';
          
        }
        
        if (!empty($v->email)) {
          $email = '<a href="mailto:' . $v->email . '" target="_top">' . $v->email . '</a>';
        } else {
          $email = '';
        }
        $ip_address = 'NULL';
        if (isset($v->ip_address) && !empty($v->ip_address)) {
          $ip_address = $v->ip_address;
        }

//        $full_name = '<span class="kt-media kt-media--sm kt-margin-r-5 kt-margin-t-5">
//														<img src="/assets/media/users/100_9.jpg" alt="image">
//													</span>'.$v->first_name . '&nbsp;' . $v->last_name;;
  
        $full_name = '<div class="kt-user-card-v2">' .
          '<div class="kt-user-card-v2__pic">' .
          '<img alt="photo" src="/uploads/thumb_' . (!empty($v->profile_img) ? $v->profile_img : 'default.jpg') . '">' .
          '</div>' .
          '<div class="kt-user-card-v2__details">' .
          '<span class="kt-user-card-v2__name">' . $v->first_name . '&nbsp;' . $v->last_name . '</span>' .
          '<a class="kt-user-card-v2__email kt-link" href="mailto:' . $v->email . '">' . $v->email . '</a>' .
          '</div></div>';
        
        $row = new stdClass();
        
        if ($mini) {
          $row->ID = $v->id;
          $row->Email = $email;
          $row->FullName = $full_name;
          
        } else {
          $row->Actions = NULL;
          $row->ID = $v->id;
          $row->FullName = $full_name;
          $row->Active = $v->active;
          $row->Group = $v->group_id;
          $row->LastLogin = $last_login;
          $row->IP = $v->ip_address;
          $row->JoinDate = $join_date;
          
        }
        
        $records['aaData'][] = $row;
  
  
      }
  
  
      $records['sEcho'] = $sEcho;
      $records['sColumns'] = '';
      $records['iTotalRecords'] = $iTotalRecords;
      $records['iTotalDisplayRecords'] = $iTotalRecords;
  
  
      return $records;
  
    }
    
    /**
     * @param bool $mini
     * @return array
     */
    public function users_score_table($mini = FALSE): array
    {
      $result_count = 0;
      $records = [];
      $result = [];
      
      $order = $this->input->post('order');
      $order_way = $order[0]['dir'];
      $order_column = (abs($order[0]['column']));
      
      $column_array = [
        'user_id',
        'username',
        'email',
        'first_name',
        'last_name',
        'c.name',
        'a.active',
      
      ];
      $column_search_array = [
        'user_id',
        'username',
        'email',
        'first_name',
        'last_name',
        'name',
        'active',
      
      
      ];
      
      
      $order_by = '';
      if ($order_column < count($column_array)) {
        $order_by = $column_array[$order_column];
      }
      
      $search_val = $this->input->post('search');
      
      
      $this->db->select('a.id, a.email, a.first_name, a.last_name, a.active, b.group_id, c.group_level, a.created_on, a.last_login, a.ip_address, a.profile_img');
      $this->db->from($this->ion_auth_model->tables['users'] . ' a');
      $this->db->join($this->ion_auth_model->tables['users_groups'] . ' b', 'b.user_id=a.id', 'left');
      $this->db->join($this->ion_auth_model->tables['groups'] . ' c', 'c.id=b.group_id', 'left');
      $this->db->group_start();
      $this->db->where('c.group_level <', '100');
      
      $this->db->group_end();
      $search = FALSE;
      
      $basic_search = FALSE;
      if (isset($search_val['value']) && !empty($search_val['value'])) {
        $basic_search = TRUE;
        $search = TRUE;
      }
      
      
      if ($basic_search) {
        $this->db->group_start();
        
        $field_arr = ['a.id', 'a.email', 'a.first_name', 'a.last_name', 'a.active', 'b.group_id', 'c.group_level', 'a.created_on', 'a.last_login', 'a.ip_address'];
        
        foreach ($field_arr as $field) {
          $this->db->or_like($field, $search_val['value']);
        }
        
        $this->db->group_end();
        
      }
      
      $column_search = FALSE;
      
      $columns = $this->input->post('columns');
      foreach ($columns as $k => $column) {
        if (!empty($column['search']['value'])) {
          $column_search = TRUE;
        }
        
      }
      
      
      if ($column_search) {
        $this->db->group_start();
        
        foreach ($columns as $k => $column) {
          if (!empty($column['search']['value'])) {
            
            
            switch ($column['data']) {
              case 'ID':
                $this->db->like('a.id', $column['search']['value']);
                break;
              case 'FullName':
                $this->db->or_like('a.first_name', $column['search']['value']);
                $this->db->or_like('a.last_name', $column['search']['value']);
                $this->db->or_like('a.email', $column['search']['value']);
                break;
              case 'Active':
                $this->db->like('a.active', $column['search']['value']);
                break;
              case 'Group':
                $this->db->like('b.group_id', $column['search']['value']);
                break;
              case 'LastLogin':
                
                
                if (strpos($column['search']['value'], '|') === FALSE) {
                  // to value
                  $to = DateTime::createFromFormat('m/d/Y', $column['search']['value']);
                  $to_unix = $to->format('U');
                  $this->db->where('a.last_login <=', $to_unix);
                } else {
                  $parts = explode('|', $column['search']['value']);
                  $from = $parts[0];
                  $to = $parts[1];
                  
                  if ($from !== '') {
                    $from = DateTime::createFromFormat('m/d/Y', $from);
                    $from_unix = $from->format('U');
                    $this->db->where('a.last_login >=', $from_unix);
                  }
                  
                  if ($to !== '') {
                    $to = DateTime::createFromFormat('m/d/Y', $to);
                    $to_unix = $to->format('U');
                    $this->db->where('a.last_login <=', $to_unix);
                  }
                  
                  
                }
                
                break;
              case 'IP':
                $this->db->like('a.ip_address', $column['search']['value']);
                break;
              case 'JoinDate':
                if (strpos($column['search']['value'], '|') === FALSE) {
                  // to value
                  $to = DateTime::createFromFormat('m/d/Y', $column['search']['value']);
                  $to_unix = $to->format('U');
                  $this->db->where('a.created_on <=', $to_unix);
                } else {
                  $parts = explode('|', $column['search']['value']);
                  $from = $parts[0];
                  $to = $parts[1];
                  
                  if ($from !== '') {
                    $from = DateTime::createFromFormat('m/d/Y', $from);
                    $from_unix = $from->format('U');
                    $this->db->where('a.created_on >=', $from_unix);
                  }
                  
                  if ($to !== '') {
                    $to = DateTime::createFromFormat('m/d/Y', $to);
                    $to_unix = $to->format('U');
                    $this->db->where('a.created_on <=', $to_unix);
                  }
                }
                break;
            }
            
          }
          
        }
        
        
        $this->db->group_end();
      }
      
      
      if (!empty($order_way)) {
        $this->db->order_by($order_by, $order_way);
      } else {
        $this->db->order_by('user_id', 'asc');
      }
      
      $iDisplayStart = (int)$this->input->post('start');
      $iDisplayLength = (int)$this->input->post('length');
      $last_query = '';
      if ($iDisplayStart == 0 && $iDisplayLength > 0 && $search == 0) {
        $result = $this->db->get()->result();
        $result_count = count($result);
        $last_query = $this->db->last_query();
        $limited_query = "$last_query LIMIT $iDisplayLength";
        $result = $this->db->query($limited_query)->result();
        
      } elseif ($iDisplayStart > 0 && $iDisplayLength > 0 && $search == 0) {
        
        $result = $this->db->get()->result();
        $result_count = count($result);
        $last_query = $this->db->last_query();
        $limited_query = "$last_query LIMIT $iDisplayLength,$iDisplayStart";
        $result = $this->db->query($limited_query)->result();
        
      } elseif ($iDisplayStart == 0 && $iDisplayLength > 0 && $search == 1) {
        
        $result = $this->db->get()->result();
        $last_query = $this->db->last_query();
        $result_count = count($result);
        $last_query_limit = "$last_query LIMIT $iDisplayLength";
        $result = $this->db->query($last_query_limit)->result();
      } elseif ($iDisplayStart > 0 && $iDisplayLength > 0 && $search == 1) {
        $result = $this->db->get()->result();
        $last_query = $this->db->last_query();
        $result_count = count($result);
        $last_query_limit = "$last_query LIMIT $iDisplayStart, $iDisplayLength";
        $result = $this->db->query($last_query_limit)->result();
      } elseif ($search == 0) {
        $this->db->limit(500);
      }
      
      
      $iTotalRecords = $result_count;
      
      
      $sEcho = (int)$this->input->post('draw');
      $records['aaData'] = [];
      
      foreach ($result as $k => $v) {
        
        
        if ($v->active == 1) {
          $status = '<input data-id="' . $v->id . '" type="checkbox" class="form-control form-filter input-sm js-switch" name="status" checked>';
        } else {
          $status = '<input data-id="' . $v->id . '" type="checkbox" class="form-control form-filter input-sm js-switch" name="status">';
        }
        
        
        $del_button = '<button class="btn btn-xs btn-danger p2 del_user" data-user_id="' . $v->id . '"><i class="icon-trash"></i></button>';
        $edit_button = '<a href="' . site_url("admin/edit_user/$v->id") . '" class="btn btn-xs yellow-gold p2"><i class="icon-note"></i></a>';
        if ($v->last_login) {
          $last_login =
            '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="'
            . $this->time_diff_string(date('Y-m-d H:i:s', $v->last_login)) . '">' . date('Y-m-d H:i:s', $v->last_login) . '</a>';
          
        } else {
          $last_login = '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="NULL">NULL</a>';
          
        }
        
        if ($v->created_on) {
          $join_date = '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="' . $this->time_diff_string(date('Y-m-d H:i:s', $v->created_on)) . '">' . date('Y-m-d H:i:s', $v->created_on) . '</a>';
          
        } else {
          $join_date = '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="NULL">NULL</a>';
          
        }
        
        if (!empty($v->email)) {
          $email = '<a href="mailto:' . $v->email . '" target="_top">' . $v->email . '</a>';
        } else {
          $email = '';
        }
        $ip_address = 'NULL';
        if (isset($v->ip_address) && !empty($v->ip_address)) {
          $ip_address = $v->ip_address;
        }

//        $full_name = '<span class="kt-media kt-media--sm kt-margin-r-5 kt-margin-t-5">
//														<img src="/assets/media/users/100_9.jpg" alt="image">
//													</span>'.$v->first_name . '&nbsp;' . $v->last_name;;
        
        $full_name = '<div class="kt-user-card-v2">' .
          '<div class="kt-user-card-v2__pic">' .
          '<img alt="photo" src="/uploads/thumb_' . (!empty($v->profile_img) ? $v->profile_img : 'default.jpg') . '">' .
          '</div>' .
          '<div class="kt-user-card-v2__details">' .
          '<span class="kt-user-card-v2__name">' . $v->first_name . '&nbsp;' . $v->last_name . '</span>' .
          '<a class="kt-user-card-v2__email kt-link" href="mailto:' . $v->email . '">' . $v->email . '</a>' .
          '</div></div>';
        
        $row = [];
  
        $row[] = NULL;
        $row[] = $v->id;
        $row[] = $v->id;
        $row[] = $v->id;
        $row[] = $v->id;
        $row[] = $v->id;
        $row[] = $v->id;
        $row[] = $v->id;
//          $row->Actions = NULL;
//          $row->ID = $v->id;
//          $row->FullName = $full_name;
//          $row->Active = $v->active;
//          $row->Group = $v->group_id;
//          $row->LastLogin = $last_login;
//          $row->IP = $v->ip_address;
//          $row->JoinDate = $join_date;
          
        
        
        $records['aaData'][] = $row;
        
        
      }
      
      
      $records['sEcho'] = $sEcho;
      $records['sColumns'] = '';
      $records['iTotalRecords'] = $iTotalRecords;
      $records['iTotalDisplayRecords'] = $iTotalRecords;
      
      
      return $records;
      
    }
    
    /**
     * @param bool $mini
     * @return array
     */
    public function test_table($mini = FALSE): array
    {
      $result_count = 0;
      $records = [];
      $result = [];
      
      $order = $this->input->post('order');
      $order_way = $order[0]['dir'];
      $order_column = (abs($order[0]['column']));
      
      $column_array = [
        'id',
        'test_name',
        'added_by',
        'date_added',
      
      ];
      $column_search_array = [
        'id',
        'test_name',
        'added_by',
        'date_added',
      
      ];
      
      
      $order_by = '';
      if ($order_column < count($column_array)) {
        $order_by = $column_array[$order_column];
      }
      
      $search_val = $this->input->post('search');
      
      
      $this->db->select('t.id, t.test_name, t.added_by, t.date_added, u.first_name, u.last_name');
      $this->db->from('___tests t');
      $this->db->join('___users u', 't.added_by=u.id', 'left');
      
      $search = FALSE;
      
      $basic_search = FALSE;
      if (isset($search_val['value']) && !empty($search_val['value'])) {
        $basic_search = TRUE;
        $search = TRUE;
      }
      
      
      if ($basic_search) {
        $this->db->group_start();
        
        $field_arr = ['t.id', 't.test_name', 't.added_by', 't.date_added', 'u.first_name', 'u.last_name'];
        
        foreach ($field_arr as $field) {
          $this->db->or_like($field, $search_val['value']);
        }
        
        $this->db->group_end();
        
      }
      
      $column_search = FALSE;
      
      $columns = $this->input->post('columns');
      foreach ($columns as $k => $column) {
        if (!empty($column['search']['value'])) {
          $column_search = TRUE;
        }
        
      }
      
      
      if ($column_search) {
  
  
        foreach ($columns as $k => $column) {
          if (!empty($column['search']['value'])) {
  
  
            switch ($column['data']) {
              case 'ID':
                $this->db->group_start();
                $this->db->like('t.id', $column['search']['value']);
                $this->db->group_end();
                break;
              case 'added_by':
                $this->db->or_group_start();
                $keys = explode(' ', $column['search']['value']);
                foreach ($keys as $key) {
                  $this->db->or_like('u.first_name', $key);
                  $this->db->or_like('u.last_name', $key);
                }
  
                $this->db->group_end();
                break;
    
              case 'TestName':
                $this->db->group_start();
                $this->db->like('t.test_name', $column['search']['value']);
                $this->db->group_end();
                break;
              case 'date_added':
                $this->db->group_start();
  
                if (strpos($column['search']['value'], '|') === FALSE) {
                  // to value
                  $to = DateTime::createFromFormat('m/d/Y', $column['search']['value']);
                  $to_unix = $to->format('U');
                  $this->db->where('t.date_added <=', $to_unix);
                } else {
                  $parts = explode('|', $column['search']['value']);
                  $from = $parts[0];
                  $to = $parts[1];
                  
                  if ($from !== '') {
                    $from = DateTime::createFromFormat('m/d/Y', $from);
                    $from_unix = $from->format('U');
                    $this->db->where('t.date_added >=', $from_unix);
                  }
                  
                  if ($to !== '') {
                    $to = DateTime::createFromFormat('m/d/Y', $to);
                    $to_unix = $to->format('U');
                    $this->db->where('t.date_added <=', $to_unix);
                  }
                  
                  
                }
                $this->db->group_end();
                break;
    
            }
            
          }
          
        }
  
  
        //$this->db->group_end();
      }
      
      
      if (!empty($order_way)) {
        $this->db->order_by($order_by, $order_way);
      } else {
        $this->db->order_by('id', 'asc');
      }
      
      $iDisplayStart = (int)$this->input->post('start');
      $iDisplayLength = (int)$this->input->post('length');
      $last_query = '';
      if ($iDisplayStart == 0 && $iDisplayLength > 0 && $search == 0) {
        $result = $this->db->get()->result();
        $result_count = count($result);
        $last_query = $this->db->last_query();
        $limited_query = "$last_query LIMIT $iDisplayLength";
        $result = $this->db->query($limited_query)->result();
        
      } elseif ($iDisplayStart > 0 && $iDisplayLength > 0 && $search == 0) {
        
        $result = $this->db->get()->result();
        $result_count = count($result);
        $last_query = $this->db->last_query();
        $limited_query = "$last_query LIMIT $iDisplayLength,$iDisplayStart";
        $result = $this->db->query($limited_query)->result();
        
      } elseif ($iDisplayStart == 0 && $iDisplayLength > 0 && $search == 1) {
        
        $result = $this->db->get()->result();
        $last_query = $this->db->last_query();
        $result_count = count($result);
        $last_query_limit = "$last_query LIMIT $iDisplayLength";
        $result = $this->db->query($last_query_limit)->result();
      } elseif ($iDisplayStart > 0 && $iDisplayLength > 0 && $search == 1) {
        $result = $this->db->get()->result();
        $last_query = $this->db->last_query();
        $result_count = count($result);
        $last_query_limit = "$last_query LIMIT $iDisplayStart, $iDisplayLength";
        $result = $this->db->query($last_query_limit)->result();
      } elseif ($search == 0) {
        $this->db->limit(500);
      }
      
      
      $iTotalRecords = $result_count;
      
      
      $sEcho = (int)$this->input->post('draw');
      $records['aaData'] = [];
      
      foreach ($result as $k => $v) {
        
        
        $del_button = '<button class="btn btn-xs btn-danger p2 del_user" data-user_id="' . $v->id . '"><i class="icon-trash"></i></button>';
        $edit_button = '<a href="' . site_url("admin/edit_user/$v->id") . '" class="btn btn-xs yellow-gold p2"><i class="icon-note"></i></a>';
//        if ($v->last_login) {
//          $last_login =
//            '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="'
//            . $this->time_diff_string(date('Y-m-d H:i:s', $v->last_login)) . '">' . date('Y-m-d H:i:s', $v->last_login) . '</a>';
//
//        } else {
//          $last_login = '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="NULL">NULL</a>';
//
//        }
        
        if ($v->date_added) {
          $date_added = '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="' . $this->time_diff_string(date('Y-m-d H:i:s', $v->date_added)) . '">' . date('Y-m-d H:i:s', $v->date_added) . '</a>';
          
        } else {
          $date_added = '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="NULL">NULL</a>';
          
        }

//        if (!empty($v->email)) {
//          $email = '<a href="mailto:' . $v->email . '" target="_top">' . $v->email . '</a>';
//        } else {
//          $email = '';
//        }
        $ip_address = 'NULL';
//        if (isset($v->ip_address) && !empty($v->ip_address)) {
//          $ip_address = $v->ip_address;
//        }

//        $full_name = '<span class="kt-media kt-media--sm kt-margin-r-5 kt-margin-t-5">
//														<img src="/assets/media/users/100_9.jpg" alt="image">
//													</span>'.$v->first_name . '&nbsp;' . $v->last_name;;

//        $full_name = '<div class="kt-user-card-v2">' .
//          '<div class="kt-user-card-v2__pic">' .
//          '<img alt="photo" src="/uploads/thumb_' . (!empty($v->profile_img) ? $v->profile_img : 'default.jpg') . '">' .
//          '</div>' .
//          '<div class="kt-user-card-v2__details">' .
//          '<span class="kt-user-card-v2__name">' . $v->first_name . '&nbsp;' . $v->last_name . '</span>' .
//          '<a class="kt-user-card-v2__email kt-link" href="mailto:' . $v->email . '">' . $v->email . '</a>' .
//          '</div></div>';
        
        $row = new stdClass();
        
        if ($mini) {
//          $row->ID = $v->id;
//          $row->Email = $email;
//          $row->FullName = $full_name;
          
        } else {
          $row->Actions = NULL;
          $row->ID = $v->id;
          $row->TestName = $v->test_name;
          $row->added_by = $v->first_name . ' ' . $v->last_name;
          $row->date_added = $date_added;
          
        }
        
        $records['aaData'][] = $row;
        
        
      }
      
      
      $records['sEcho'] = $sEcho;
      $records['sColumns'] = '';
      $records['iTotalRecords'] = $iTotalRecords;
      $records['iTotalDisplayRecords'] = $iTotalRecords;
      
      
      return $records;
      
    }
    
    public function courses_table(): array
    {
      $result_count = 0;
      $records = [];
      $result = [];
  
      $order = $this->input->post('order');
      $order_way = $order[0]['dir'];
      $order_column = (abs($order[0]['column']));
  
      $column_array = [
        'course_id',
        'course_img',
        'title',
        'sub_title',
        'description',
        'date_added',
        'sub_category',
        'main_category',
        'user_id',
        'active',
  
      ];
      $column_search_array = [
        'user_id',
        'username',
        'email',
        'first_name',
        'last_name',
        'name',
        'active',


      ];
  
  
      $order_by = '';
      if ($order_column < count($column_array)) {
        $order_by = $column_array[$order_column];
      }
  
      $search_val = $this->input->post('search');
  
  
      $this->db->select('*');
      $this->db->from('___courses');
  
      $search = FALSE;
  
      $basic_search = FALSE;
      if (isset($search_val['value']) && !empty($search_val['value'])) {
        $basic_search = TRUE;
        $search = TRUE;
      }
  
  
      $column_search = FALSE;
  
      $columns = $this->input->post('columns');
      foreach ($columns as $k => $column) {
        if (!empty($column['search']['value'])) {
          $column_search = TRUE;
        }
  
      }
  
  
      if ($column_search) {
        $this->db->group_start();
    
        foreach ($columns as $k => $column) {
          if (!empty($column['search']['value'])) {
  
  
            switch ($column['data']) {
              case 'ID':
                $this->db->like('course_id', $column['search']['value']);
                break;
              case 'title':
                $this->db->or_like('title', $column['search']['value']);
  
                break;
              case 'sub_title':
                $this->db->or_like('sub_title', $column['search']['value']);
                break;
              case 'description':
                $this->db->or_like('description', $column['search']['value']);
                break;
              case 'active':
                $this->db->like('active', $column['search']['value']);
                break;
    
              case 'date_added':
      
      
                if (strpos($column['search']['value'], '|') === FALSE) {
                  // to value
                  $to = DateTime::createFromFormat('m/d/Y H:i:s', $column['search']['value'] . ' 23:59:59');
                  $to_unix = $to->format('U');
                  $this->db->where('date_added <=', $to_unix);
                } else {
                  $parts = explode('|', $column['search']['value']);
                  $from = $parts[0];
                  $to = $parts[1];
        
                  if ($from !== '') {
                    $from = DateTime::createFromFormat('m/d/Y H:i:s', $from . ' 00:00:00');
                    $from_unix = $from->format('U');
                    $this->db->where('date_added >=', $from_unix);
                  }
        
                  if ($to !== '') {
                    $to = DateTime::createFromFormat('m/d/Y H:i:s', $to . ' 23:59:59');
                    $to_unix = $to->format('U');
                    $this->db->where('date_added <=', $to_unix);
                  }
                }
                break;
            }
  
          }
      
        }
    
    
        $this->db->group_end();
      }
  
  
      if (!empty($order_way)) {
        $this->db->order_by($order_by, $order_way);
      } else {
        $this->db->order_by('course_id', 'asc');
      }
  
      $iDisplayStart = (int)$this->input->post('start');
      $iDisplayLength = (int)$this->input->post('length');
      $last_query = '';
      if ($iDisplayStart == 0 && $iDisplayLength > 0 && $search == 0) {
        $result = $this->db->get()->result();
        $result_count = count($result);
        $last_query = $this->db->last_query();
        $limited_query = "$last_query LIMIT $iDisplayLength";
        $result = $this->db->query($limited_query)->result();
  
      } elseif ($iDisplayStart > 0 && $iDisplayLength > 0 && $search == 0) {
  
        $result = $this->db->get()->result();
        $result_count = count($result);
        $last_query = $this->db->last_query();
        $limited_query = "$last_query LIMIT $iDisplayLength,$iDisplayStart";
        $result = $this->db->query($limited_query)->result();
  
      } elseif ($iDisplayStart == 0 && $iDisplayLength > 0 && $search == 1) {
  
        $result = $this->db->get()->result();
        $last_query = $this->db->last_query();
        $result_count = count($result);
        $last_query_limit = "$last_query LIMIT $iDisplayLength";
        $result = $this->db->query($last_query_limit)->result();
      } elseif ($iDisplayStart > 0 && $iDisplayLength > 0 && $search == 1) {
        $result = $this->db->get()->result();
        $last_query = $this->db->last_query();
        $result_count = count($result);
        $last_query_limit = "$last_query LIMIT $iDisplayStart, $iDisplayLength";
        $result = $this->db->query($last_query_limit)->result();
      } elseif ($search == 0) {
        $this->db->limit(500);
      }
  
  
      $iTotalRecords = $result_count;
  
  
      $sEcho = (int)$this->input->post('draw');
      $records['aaData'] = [];
  
      foreach ($result as $k => $v) {
    
    
        if ($v->active == 1) {
          $status = '<input data-id="' . $v->course_id . '" type="checkbox" class="form-control form-filter input-sm js-switch" name="status" checked>';
        } else {
          $status = '<input data-id="' . $v->course_id . '" type="checkbox" class="form-control form-filter input-sm js-switch" name="status">';
        }
    
    
        $del_button = '<button class="btn btn-xs btn-danger p2 del_user" data-user_id="' . $v->course_id . '"><i class="icon-trash"></i></button>';
        $edit_button = '<a href="' . site_url("admin/edit_user/$v->course_id") . '" class="btn btn-xs yellow-gold p2"><i class="icon-note"></i></a>';
        if ($v->date_added) {
          $date_added =
            '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="'
            . $this->time_diff_string(date('Y-m-d H:i:s', $v->date_added)) . '">' . date('Y-m-d H:i:s', $v->date_added) . '</a>';
  
        } else {
          $date_added = '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="NULL">NULL</a>';
  
        }
    
    
        $course_img = '<a href="#" class="table_img" data-toggle="modal" data-target="#kt_modal_6"><img width="110" src="' . base_url($v->course_img) . '" alt="image" ></a>';
    
    
        $row = new stdClass();
    
    
        $row->course_id = $v->course_id;
        $row->course_img = $course_img;
        $row->title = $v->title;
        $row->sub_title = $v->sub_title;
        $row->description = $v->description;
        $row->active = $v->active;
        $row->date_added = $date_added;
        $row->Actions = NULL;
    
    
        $records['aaData'][] = $row;
    
    
      }
  
  
      $records['sEcho'] = $sEcho;
      $records['sColumns'] = '';
      $records['iTotalRecords'] = $iTotalRecords;
      $records['iTotalDisplayRecords'] = $iTotalRecords;
  
  
      return $records;
  
    }
    
    public function system_log_table(): array
    {
      $result_count = 0;
      $records = [];
      $result = [];
  
      $order = $this->input->post('order');
      $order_way = $order[0]['dir'];
      $order_column = (abs($order[0]['column']));
  
      $column_array = [
        'id',
        'type',
        'severity',
        'log',
        'IP',
        'time_unix',
  
      ];
  
  
      $order_by = '';
      if ($order_column < count($column_array)) {
        $order_by = $column_array[$order_column];
      }
  
  
      $this->db->select('id, type, log, severity, time_unix, IP');
      $this->db->from('___system_logs');
  
  
      $search = FALSE;
  
      $columns = $this->input->post('columns');
      foreach ($columns as $k => $column) {
        if (!empty($column['search']['value'])) {
          $search = TRUE;
        }
  
      }
  
  
      if ($search) {
        $this->db->group_start();
    
        foreach ($columns as $k => $column) {
          if (!empty($column['search']['value'])) {
  
  
            switch ($column['data']) {
              case 'id':
                $this->db->like('id', $column['search']['value']);
                break;
              case 'type':
                $this->db->or_like('type', $column['search']['value']);
  
                break;
              case 'log':
                $this->db->or_like('log', $column['search']['value']);
                break;
              case 'IP':
                $this->db->or_like('IP', $column['search']['value']);
                break;
              case 'severity':
                $this->db->or_where('severity', $column['search']['value']);
                break;
    
    
              case 'time_unix':
      
      
                if (strpos($column['search']['value'], '|') === FALSE) {
                  // to value
                  $to = DateTime::createFromFormat('m/d/Y H:i:s', $column['search']['value'] . ' 23:59:59');
                  $to_unix = $to->format('U');
                  $this->db->where('time_unix <=', $to_unix);
                } else {
                  $parts = explode('|', $column['search']['value']);
                  $from = $parts[0];
                  $to = $parts[1];
        
                  if ($from !== '') {
                    $from = DateTime::createFromFormat('m/d/Y H:i:s', $from . ' 00:00:00');
                    $from_unix = $from->format('U');
                    $this->db->where('time_unix >=', $from_unix);
                  }
        
                  if ($to !== '') {
                    $to = DateTime::createFromFormat('m/d/Y H:i:s', $to . ' 23:59:59');
                    $to_unix = $to->format('U');
                    $this->db->where('time_unix <=', $to_unix);
                  }
                }
                break;
            }
  
          }
      
        }
    
    
        $this->db->group_end();
      }
  
  
      if (!empty($order_way)) {
        $this->db->order_by($order_by, $order_way);
      } else {
        $this->db->order_by('course_id', 'asc');
      }
  
      $iDisplayStart = (int)$this->input->post('start');
      $iDisplayLength = (int)$this->input->post('length');
      $last_query = '';
      if ($iDisplayStart == 0 && $iDisplayLength > 0 && $search == 0) {
        $result = $this->db->get()->result();
        $result_count = count($result);
        $last_query = $this->db->last_query();
        $limited_query = "$last_query LIMIT $iDisplayLength";
        $result = $this->db->query($limited_query)->result();
  
      } elseif ($iDisplayStart > 0 && $iDisplayLength > 0 && $search == 0) {
  
        $result = $this->db->get()->result();
        $result_count = count($result);
        $last_query = $this->db->last_query();
        $limited_query = "$last_query LIMIT $iDisplayLength,$iDisplayStart";
        $result = $this->db->query($limited_query)->result();
  
      } elseif ($iDisplayStart == 0 && $iDisplayLength > 0 && $search == 1) {
  
        $result = $this->db->get()->result();
        $last_query = $this->db->last_query();
        $result_count = count($result);
        $last_query_limit = "$last_query LIMIT $iDisplayLength";
        $result = $this->db->query($last_query_limit)->result();
      } elseif ($iDisplayStart > 0 && $iDisplayLength > 0 && $search == 1) {
        $result = $this->db->get()->result();
        $last_query = $this->db->last_query();
        $result_count = count($result);
        $last_query_limit = "$last_query LIMIT $iDisplayStart, $iDisplayLength";
        $result = $this->db->query($last_query_limit)->result();
      } elseif ($search == 0) {
        $this->db->limit(500);
      }
  
  
      $iTotalRecords = $result_count;
  
  
      $sEcho = (int)$this->input->post('draw');
      $records['aaData'] = [];
  
      foreach ($result as $k => $v) {
    
    
        if ($v->time_unix) {
          $time_unix =
            '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="'
            . $this->time_diff_string(date('Y-m-d H:i:s', $v->time_unix)) . '">' . date('Y-m-d H:i:s', $v->time_unix) . '</a>';
      
        } else {
          $time_unix = '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="NULL">NULL</a>';
      
        }
    
    
        $row = new stdClass();
    
    
        $row->id = $v->id;
        $row->type = $v->type;
        $row->log = $v->log;
        $row->IP = $v->IP;
        $row->severity = $v->severity;
        $row->time_unix = $time_unix;
        $row->Actions = NULL;
    
    
        $records['aaData'][] = $row;
    
    
      }
  
  
      $records['sEcho'] = $sEcho;
      $records['sColumns'] = '';
      $records['iTotalRecords'] = $iTotalRecords;
      $records['iTotalDisplayRecords'] = $iTotalRecords;
  
  
      return $records;
  
    }
    
    
    public function error_log_table()
    {
      $result_count = 0;
      $records = [];
      $result = [];
  
      $order = $this->input->post('order');
      $order_way = $order[0]['dir'];
      $order_column = (abs($order[0]['column']));
  
      $column_array = [
        'id',
        'type',
        'severity',
        'log',
        'IP',
        'time_unix',
  
      ];
  
  
      $order_by = '';
      if ($order_column < count($column_array)) {
        $order_by = $column_array[$order_column];
      }
  
  
      $this->load->helper('directory');
      $this->load->helper('number');
  
      $log_dir = FCPATH . 'application/logs/';
  
  
      $map = directory_map($log_dir, 1);
  
      if (empty($map)) {
        return $this->empty_result();
    
      }
  
      foreach ($map as $k => $file) {
        if ($file === 'index.html') {
          unset($map[$k]);
  
        }
    
      }
  
  
      sort($map);
  
  
      $records['aaData'] = [];
      $iTotalRecords = count($result);
      $id = 0;
      $re = '/(\d{4}-\d{2}-\d{2}\s\d{2}\:\d{2}\:\d{2})\s-->\s([\s\S]+)/';
      
      $rows = [];
  
      foreach ($map as $k => $file) {
    
    
        $data = file_get_contents($log_dir . $file);
    
        $lines = explode('ERROR - ', $data);
    
        foreach ($lines as $ii => $line) {
      
      
          preg_match($re, $line, $matches);
      
      
          $row = new stdClass();
      
          if (empty($matches)) {
            continue;
          }
      
          $id++;
      
          $row->id = $id;
      
          $row->time = '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="'
            . $this->time_diff_string($matches[1]) . '">' . $matches[1] . '</a>';
          
          
          $row->log = $matches[2];
          $row->type = 'ERROR';
          $row->Actions = NULL;
      
          $rows[] = $row;
          
          
        }
    
    
        $start = $this->input->post('start');
        $length = $this->input->post('length');
    
    
        $order = $this->input->post('order');
        $order_way = $order[0]['dir'];
        $order_column = (abs($order[0]['column']));
    
        $column_array = [
          'id',
          'type',
          'time',
          'log'
        ];
        $order_by = '';
        if ($order_column < count($column_array)) {
          $order_by = $column_array[$order_column];
        }
    
        if ($order_by !== '' && $order_way === 'desc') {
          if ($order_by === 'id') {
            krsort($rows);
          } elseif ($order_by === 'time') {
            krsort($rows);
          }
      
        }
    
    
        $data = array_slice($rows, $start, $length);
    
    
        $records['aaData'] = $data;


//        if ($v->time_unix) {
//          $time_unix =
//              '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="'
//              . $this->time_diff_string(date('Y-m-d H:i:s', $v->time_unix)) . '">' . date('Y-m-d H:i:s', $v->time_unix) . '</a>';
//
//        } else {
//          $time_unix = '<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="NULL">NULL</a>';
//
//        }
//
      
      
      }
  
      $sEcho = (int)$this->input->post('draw');
      $records['sEcho'] = $sEcho;
      $records['sColumns'] = '';
      $records['iTotalRecords'] = $iTotalRecords;
      $records['iTotalDisplayRecords'] = $iTotalRecords;
  
  
      return $records;
  
    }
    
    /**
     * @param bool $mini
     * @return array
     */
    public function groups_table($mini = FALSE): array
    {
      $result_count = 0;
      $records = [];
      $result = [];
      
      $order = $this->input->post('order');
      $order_way = $order[0]['dir'];
      $order_column = (abs($order[0]['column']));
      
      $column_array = [
        'id',
        'name',
        'description',
        'group_level',
        'total_users',

      ];
      $column_search_array = [
        'id',
        'name',
        'description',
        'group_level',


      ];
      
      
      $order_by = '';
      if ($order_column < count($column_array)) {
        $order_by = $column_array[$order_column];
      }
      
      $search_val = $this->input->post('search');
      $action = $this->input->post('action');
      
      $search = FALSE;
      if (isset($search_val['value']) && !empty($search_val['value'])) {
        $search = TRUE;
      }
      
      
      $this->db->select('id, name, description, group_level');
      $this->db->from('___groups');
      
      
      if ($search) {
        $this->db->group_start();
        
        $field_arr = ['id', 'name', 'description', 'group_level'];
        
        foreach ($field_arr as $field) {
          $this->db->or_like($field, $search_val['value']);
        }
        
        $this->db->group_end();
        
      }
      
      
      if (!empty($order_way)) {
        $this->db->order_by($order_by, $order_way);
      } else {
        $this->db->order_by('id', 'asc');
      }
      
      $iDisplayStart = (int)$this->input->post('start');
      $iDisplayLength = (int)$this->input->post('length');
      $last_query = '';
      if ($iDisplayStart == 0 && $iDisplayLength > 0 && $search == 0) {
        $result = $this->db->get()->result();
        $result_count = count($result);
        $last_query = $this->db->last_query();
        $limited_query = "$last_query LIMIT $iDisplayLength";
        $result = $this->db->query($limited_query)->result();
        
      } elseif ($iDisplayStart > 0 && $iDisplayLength > 0 && $search == 0) {
        
        $result = $this->db->get()->result();
        $result_count = count($result);
        $last_query = $this->db->last_query();
        $limited_query = "$last_query LIMIT $iDisplayLength,$iDisplayStart";
        $result = $this->db->query($limited_query)->result();
        
      } elseif ($iDisplayStart == 0 && $iDisplayLength > 0 && $search == 1) {
        
        $result = $this->db->get()->result();
        $last_query = $this->db->last_query();
        $result_count = count($result);
        $last_query_limit = "$last_query LIMIT $iDisplayLength";
        $result = $this->db->query($last_query_limit)->result();
      } elseif ($iDisplayStart > 0 && $iDisplayLength > 0 && $search == 1) {
        $result = $this->db->get()->result();
        $last_query = $this->db->last_query();
        $result_count = count($result);
        $last_query_limit = "$last_query LIMIT $iDisplayStart, $iDisplayLength";
        $result = $this->db->query($last_query_limit)->result();
      } elseif ($search == 0) {
        $this->db->limit(500);
      }
      
      
      $iTotalRecords = $result_count;
      
      
      $sEcho = (int)$this->input->post('draw');
      $records['aaData'] = [];
      
      foreach ($result as $k => $v) {


//
//        {data: 'ID'},
//        {data: 'Name'},
//        {data: 'Description'},
//        {data: 'Level'},
//        {data: 'total_users'},
        
        
        $row = new stdClass();
        
        
        $row->Actions = NULL;
        $row->ID = $v->id;
        $row->Name = $v->name;
        $row->Description = $v->description;
        $row->Level = $v->group_level;
        $row->total_users = $this->get_group_users_count($v->id);
        
        
        $records['aaData'][] = $row;
        
        
      }
      
      
      $records['sEcho'] = $sEcho;
      $records['iTotalRecords'] = $iTotalRecords;
      $records['iTotalDisplayRecords'] = $iTotalRecords;
      
      
      return $records;
      
    }
    
    
    public function get_group_users_count($group_id): int
    {
      
      return $this->db->from('___users_groups')->where('group_id', $group_id)->get()->num_rows();
      
    }





// --Commented out by Inspection START (2019-12-26, 13:33):
//    public function search_tables(): stdClass
//    {
//      $search = $this->input->post('search');
//      $return = new stdClass();
//      $result = [];
//      $tables = $this->db->list_tables();
//      $search_type = gettype($search);
//      foreach ($tables as $k => $table) {
//        if ($table === 'firewallrecords_1485330825841') {
//          continue;
//        }
//
//        $fields = $this->db->field_data($table);
//        foreach ($fields as $ki => $field) {
//          if ($search_type === 'string') {
//            if ($field->type === 'varchar' || $field->type === 'text' || $field->type === 'mediumtext') {
//              //$this->db->select('*')->from('`'.$table.'`');
//              $sql = 'SELECT * FROM `' . $table . '` WHERE `' . $field->name . "` LIKE '%" . $this->db->escape_like_str($search) . "%' ESCAPE '!'";
//              $row = $this->db->query($sql)->result();
//
//              if (!empty($row)) {
//                $result[] = ['table_name' => $table,
//                    'row' => json_encode($row)];
//              }
//            }
//
//          }
//        }
//      }
//
//
//      $return->status = 'success';
//      $return->msg = 'success';
//      $return->data = $result;
//
//      return $return;
//
//    }
// --Commented out by Inspection STOP (2019-12-26, 13:33)
    
    
    public function media_table()
    {
      $this->load->library('image_lib');
      $this->load->helper('directory');
      $this->load->helper('number');
      $user_id = $this->ion_auth->get_user_id();
      $media_dir = FCPATH . 'media/' . $user_id . '/';
      
      
      $map = directory_map($media_dir, 1);
      
      
      if (empty($map)) {
        $sEcho = (int)$this->input->post('draw');
        $records['aaData'] = [];
        $records['sEcho'] = $sEcho;
        $records['iTotalRecords'] = 0;
        $records['iTotalDisplayRecords'] = 0;
        return $records;
      }
      
      // var_dump($map);die;
      
      $column_search = FALSE;
      
      $columns = $this->input->post('columns');
      foreach ($columns as $k => $column) {
        if (!empty($column['search']['value'])) {
          $column_search = TRUE;
        }
        
      }
      
      if ($column_search) {
        
        foreach ($columns as $k => $column) {
          if (!empty($column['search']['value'])) {
            
            
            switch ($column['data']) {
              case 'file_name':
                foreach ($map as $kk => $f) {
                  if (strpos($f, $column['search']['value']) === false) {
                    unset($map[$kk]);
                  }
                  
                }
                
                break;
              case 'type':
                
                foreach ($map as $kk => $f) {
                  
                  if (strcasecmp($column['search']['value'], mime_content_type($media_dir . $f)) !== 0) {
                    unset($map[$kk]);
                  }
                  
                }
                break;
              
              
              case 'upload_date':
                
                
                if (strpos($column['search']['value'], '|') === FALSE) {
                  // to value
                  $to = DateTime::createFromFormat('m/d/Y H:i:s', $column['search']['value'] . ' 24:00:00');
                  $to_unix = $to->format('U');
                  
                  foreach ($map as $kk => $f) {
                    if ($to_unix <= stat($media_dir . $f)['ctime']) {
                      unset($map[$kk]);
                    }
                  }
                  
                  
                  //$map[$kk]
                } else {
                  $parts = explode('|', $column['search']['value']);
                  $from = $parts[0];
                  $to = $parts[1];
                  
                  if ($from !== '') {
                    $from = DateTime::createFromFormat('m/d/Y H:i:s', $from . ' 00:00:00');
                    $from_unix = $from->format('U');
                    
                    
                    foreach ($map as $kk => $f) {
                      if ($from_unix >= stat($media_dir . $f)['ctime']) {
                        
                        
                        unset($map[$kk]);
                      }
                    }
                    
                  }
                  
                  if ($to !== '') {
                    $to = DateTime::createFromFormat('m/d/Y H:i:s', $to . ' 24:00:00');
                    $to_unix = $to->format('U');
                    foreach ($map as $kk => $f) {
                      if ($to_unix <= stat($media_dir . $f)['ctime']) {
                        unset($map[$kk]);
                      }
                    }
                  }
                  
                  
                }
                
                break;
              
            }
            
          }
          
        }
        
        
      }
      
      
      if (empty($map)) {
        $sEcho = (int)$this->input->post('draw');
        $records['aaData'] = [];
        $records['sEcho'] = $sEcho;
        $records['iTotalRecords'] = 0;
        $records['iTotalDisplayRecords'] = 0;
        return $records;
      }
      
      $start = $this->input->post('start');
      $length = $this->input->post('length');
      
      
      $iTotalRecords = count($map);
      
      
      $sEcho = (int)$this->input->post('draw');
      $records['aaData'] = [];
      
      
      $map = array_slice($map, $start, $length);
      
      
      foreach ($map as $k => $file) {
        
        
        $stats = stat($media_dir . $file);
        
        $row = new stdClass();
        
        $upload_date = date('Y-m-d H:i:s', $stats['ctime']);
        $upload_date .= '<br>(' . $this->time_diff_string(date('Y-m-d H:i:s', $stats['ctime'])) . ')';
        
        $type = mime_content_type($media_dir . $file);
        
        $preview = '';
        switch ($type) {
          case 'image/jpeg':
            
            if (!is_dir(FCPATH . 'temp/' . $user_id . '/') && !mkdir($concurrentDirectory = FCPATH . 'temp/' . $user_id . '/', 0777, TRUE) && !is_dir($concurrentDirectory)) {
              throw new RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
            }
            
            if (!file_exists(FCPATH . 'temp/' . $user_id . '/' . $file)) {
              $conf_img['image_library'] = 'ImageMagick';
              $conf_img['library_path'] = '/usr/bin/convert';
              $conf_img['source_image'] = FCPATH . 'media/' . $user_id . '/' . $file;
              $conf_img['new_image'] = FCPATH . 'temp/' . $user_id . '/' . $file;
              $conf_img['create_thumb'] = false;
              $conf_img['maintain_ratio'] = TRUE;
              $conf_img['height'] = 100;
              $conf_img['width'] = 100;
              $this->image_lib->initialize($conf_img);
              
              $this->image_lib->resize();
              $this->image_lib->clear();
            }
            
            
            $preview = '<a href="#" class="kt-media img_info"  data-toggle="modal" data-target="#kt_modal_7" data-url="' . base_url('media/' . $user_id . '/' . $file) . '">
                            <img width="100" src="' . base_url('temp/' . $user_id . '/' . $file) . '" alt="image" >
                        </a>';
            break;
          case 'video/mp4':
            
            
            $preview = '<a href="#" class="kt-media media_info" data-toggle="modal" data-target="#kt_modal_6" data-video_url="' . base_url('media/' . $user_id . '/' . $file) . '">
                            <img src="' . base_url('media/' . $user_id . '_webp/' . $file . '.webp') . '" alt="image" style="max-width: 80px;min-width: 80px">
                        </a>';
            
            if (!file_exists('media/' . $user_id . '_webp/' . $file . '.webp')) {
              $this->admin_model->make_webp($user_id, $file);
              
            }
            
            
            break;
          case 'text/plain':
            $preview = '<a href="#" class="kt-media html_info" data-toggle="modal" data-target="#kt_modal_8" data-file_name="' . $file . '">
                            <img src="' . base_url('aassets/media/misc/article_html_default.png') . '" alt="image" style="max-width: 80px;min-width: 80px">
                        </a>';
            break;
          
        }
        
        $row->Actions = NULL;
        $row->preview = $preview;
        $row->type = $type;
        
        $row->file_name = $file;
        $row->size = byte_format($stats['size']);
        $row->upload_date = $upload_date;
        
        $records['aaData'][] = $row;
        
        
      }
      
      
      $records['sEcho'] = $sEcho;
      $records['iTotalRecords'] = $iTotalRecords;
      $records['iTotalDisplayRecords'] = $iTotalRecords;
      
      
      return $records;
      
      
    }
    
    
    private function search_youtube($matches)
    {
      if (!isset($matches[0][1])) {
        return [];
      }
      
      $video_id = $matches[0][1];
      $api_key = 'AIzaSyDXQh9LoKPjMzXHnqsNmk03c2qjhqYDT_s';
      $html = 'https://www.googleapis.com/youtube/v3/videos?id=' . $video_id . '&key=' . $api_key . '&part=snippet,contentDetails';
      $response = file_get_contents($html);
      $decoded = json_decode($response, false);
      
      if (!isset($decoded->items) || empty($decoded->items)) {
        return [];
      }
      
      if (!isset($decoded->items[0]) || empty($decoded->items[0])) {
        return [];
      }
      if (!isset($decoded->items[0]->snippet) || empty($decoded->items[0]->snippet)) {
        return [];
      }
      if (!isset($decoded->items[0]->contentDetails) || empty($decoded->items[0]->contentDetails)) {
        return [];
      }
      $snippet = $decoded->items[0]->snippet;
      $contentDetails = $decoded->items[0]->contentDetails;
      if (!isset($snippet->title) || empty($snippet->title)) {
        return ['sss'];
      }
      
      if (!isset($contentDetails->duration) || empty($contentDetails->duration)) {
        return ['dddf'];
      }
      
      if (!isset($snippet->thumbnails) || empty($snippet->thumbnails)) {
        return [];
      }
      
      if (!isset($snippet->thumbnails->medium) || empty($snippet->thumbnails->medium)) {
        return [];
      }
      
      if (!isset($snippet->thumbnails->medium->url) || empty($snippet->thumbnails->medium->url)) {
        return [];
      }
      
      
      $row = new stdClass();
  
      //value: "VB_YZ_01_GIRIS.mp4"
      //img: "https://ebigdata.shop/media/1_webp/VB_YZ_01_GIRIS.mp4.webp"
      //media_url: "https://ebigdata.shop/media/1/VB_YZ_01_GIRIS.mp4"
      //type: "video/mp4"
      //duration_seconds: 94
      //duration_string: "1 min 34 sec"
      //.+([\d]+)H|([\d]+)M|([\d]+)S
      $row->value = $snippet->title;
      $row->img = $snippet->thumbnails->medium->url;
      $row->media_url = $video_id;
      $row->type = 'video/youtube';
      $row->duration_seconds = $this->convert_yt_time_to_seconds($contentDetails->duration);
      $row->duration_string = $this->admin_model->secondsToHumanReadable($row->duration_seconds);
      return [$row];
  
    }
    
    private function convert_yt_time_to_seconds($time)
    {
      preg_match_all("/PT(\d+H)?(\d+M)?(\d+S)?/", $time, $matches);
      
      $hours = $matches[1][0] === '' ? 0 : substr($matches[1][0], 0, -1);
      $minutes = $matches[2][0] === '' ? 0 : substr($matches[2][0], 0, -1);
      $seconds = $matches[3][0] === '' ? 0 : substr($matches[3][0], 0, -1);
      
      return 3600 * $hours + 60 * $minutes + $seconds;
    }
    
    public function search_library(): array
    {
      // echo 'hll';die;
      $q = $this->input->get('q');
      $re = '/(?=youtube)youtube.com\/watch\?v=([a-zA-Z\d\-\_]+)/';
      //$str = 'https://www.youtube.com/watch?v=RgAm3IONRBw&t=1039s';
  
      preg_match_all($re, $q, $matches, PREG_SET_ORDER, 0);
      if (!empty($matches)) {
        return $this->search_youtube($matches);
      }
  
      $re = '/(?=youtu.be)youtu.be\/([a-zA-Z\d\-\_]+)/';
      //$str = 'https://www.youtube.com/watch?v=RgAm3IONRBw&t=1039s';
  
      preg_match_all($re, $q, $matches, PREG_SET_ORDER, 0);
      if (!empty($matches)) {
        return $this->search_youtube($matches);
      }

// Print the entire match result
      
      
      if (strlen($q) < 2) {
        return [];
      }
      
      require FCPATH . 'vendor/autoload.php';
      
      $this->load->library('image_lib');
      $this->load->helper('directory');
      $this->load->helper('number');
      $user_id = $this->ion_auth->get_user_id();
      $media_dir = FCPATH . 'media/' . $user_id . '/';
      
      
      $map_raw = directory_map($media_dir, 1);
      $map = [];
      foreach ($map_raw as $file) {
        if (pathinfo($media_dir . $file, PATHINFO_EXTENSION) !== 'html') {
          $map[] = $file;
        }
      }
      
      
      $data = [];
      $total_data = 0;
      foreach ($map as $k => $file) {
        
        if (stripos($file, $q) !== FALSE) {
          
          $row = new stdClass();
          $row->value = $file;
          $type = mime_content_type('media/' . $user_id . '/' . $file);
          if (strpos($type, 'image') !== FALSE) {
            $row->img = base_url('media/' . $user_id . '/' . $file);
            $row->type = $type;
          } elseif (strpos($type, 'video') !== FALSE) {
            $row->img = base_url('media/' . $user_id . '_webp/' . $file . '.webp');
            $row->media_url = base_url('media/' . $user_id . '/' . $file);
            $row->type = $type;
            $ffprobe = FFMpeg\FFProbe::create();
            $ffmpeg = FFMpeg\FFMpeg::create();
            //$video = $ffmpeg->open(FCPATH.'media/'.$user_id.'/'.$file);
            //print_r($video);
            $row->duration_seconds = (int)$ffprobe
              ->streams(FCPATH . 'media/' . $user_id . '/' . $file)
              ->videos()
              ->first()
              ->get('duration');
            $row->duration_string = $this->admin_model->secondsToHumanReadable($row->duration_seconds);

//           $getID3 = new getID3;
//           $video_file = $getID3->analyze(FCPATH.'media/'.$user_id.'/'.$file);
//           $row->duration_seconds =ceil($video_file['playtime_seconds']);
//           $row->duration_string = $video_file['playtime_string'];
          }
          
          if ($total_data > 5) {
            return $data;
          }
          
          $data[] = $row;
          $total_data++;
        }
        
        
      }
      
      return $data;
      
      
      // var_dump($map);die;
      
      $column_search = FALSE;
      
      $columns = $this->input->post('columns');
      foreach ($columns as $k => $column) {
        if (!empty($column['search']['value'])) {
          $column_search = TRUE;
        }
        
      }
      
      if ($column_search) {
        
        foreach ($columns as $k => $column) {
          if (!empty($column['search']['value'])) {
            
            
            switch ($column['data']) {
              case 'file_name':
                foreach ($map as $kk => $f) {
                  if (strpos($f, $column['search']['value']) === false) {
                    unset($map[$kk]);
                  }
                  
                }
                
                break;
              case 'type':
                
                foreach ($map as $kk => $f) {
                  
                  if (strcasecmp($column['search']['value'], mime_content_type($media_dir . $f)) !== 0) {
                    unset($map[$kk]);
                  }
                  
                }
                break;
              
              
              case 'upload_date':
                
                
                if (strpos($column['search']['value'], '|') === FALSE) {
                  // to value
                  $to = DateTime::createFromFormat('m/d/Y H:i:s', $column['search']['value'] . ' 24:00:00');
                  $to_unix = $to->format('U');
                  
                  foreach ($map as $kk => $f) {
                    if ($to_unix <= stat($media_dir . $f)['ctime']) {
                      unset($map[$kk]);
                    }
                  }
                  
                  
                  //$map[$kk]
                } else {
                  $parts = explode('|', $column['search']['value']);
                  $from = $parts[0];
                  $to = $parts[1];
                  
                  if ($from !== '') {
                    $from = DateTime::createFromFormat('m/d/Y H:i:s', $from . ' 00:00:00');
                    $from_unix = $from->format('U');
                    
                    
                    foreach ($map as $kk => $f) {
                      if ($from_unix >= stat($media_dir . $f)['ctime']) {
                        
                        
                        unset($map[$kk]);
                      }
                    }
                    
                  }
                  
                  if ($to !== '') {
                    $to = DateTime::createFromFormat('m/d/Y H:i:s', $to . ' 24:00:00');
                    $to_unix = $to->format('U');
                    foreach ($map as $kk => $f) {
                      if ($to_unix <= stat($media_dir . $f)['ctime']) {
                        unset($map[$kk]);
                      }
                    }
                  }
                  
                  
                }
                
                break;
              
            }
            
          }
          
        }
        
        
      }
      
      
      if (empty($map)) {
        $sEcho = (int)$this->input->post('draw');
        $records['aaData'] = [];
        $records['sEcho'] = $sEcho;
        $records['iTotalRecords'] = 0;
        $records['iTotalDisplayRecords'] = 0;
        return $records;
      }
      
      $start = $this->input->post('start');
      $length = $this->input->post('length');
      
      
      $iTotalRecords = count($map);
      
      
      $sEcho = (int)$this->input->post('draw');
      $records['aaData'] = [];
      
      
      $map = array_slice($map, $start, $length);
      
      
      foreach ($map as $k => $file) {
        
        
        $stats = stat($media_dir . $file);
        
        $row = new stdClass();
        
        $upload_date = date('Y-m-d H:i:s', $stats['ctime']);
        $upload_date .= '<br>(' . $this->time_diff_string(date('Y-m-d H:i:s', $stats['ctime'])) . ')';
        
        $type = mime_content_type($media_dir . $file);
        
        $preview = '';
        switch ($type) {
          case 'image/jpeg':
            
            if (!is_dir(FCPATH . 'temp/' . $user_id . '/') && !mkdir($concurrentDirectory = FCPATH . 'temp/' . $user_id . '/', 0777, TRUE) && !is_dir($concurrentDirectory)) {
              throw new RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
            }
            
            if (!file_exists(FCPATH . 'temp/' . $user_id . '/' . $file)) {
              $conf_img['image_library'] = 'ImageMagick';
              $conf_img['library_path'] = '/usr/bin/convert';
              $conf_img['source_image'] = FCPATH . 'media/' . $user_id . '/' . $file;
              $conf_img['new_image'] = FCPATH . 'temp/' . $user_id . '/' . $file;
              $conf_img['create_thumb'] = false;
              $conf_img['maintain_ratio'] = TRUE;
              $conf_img['height'] = 100;
              $conf_img['width'] = 100;
              $this->image_lib->initialize($conf_img);
              
              $this->image_lib->resize();
              $this->image_lib->clear();
            }
            
            
            $preview = '<a href="#" class="kt-media">
                            <img src="' . base_url('temp/' . $user_id . '/' . $file) . '" alt="image" >
                        </a>';
            break;
          case 'video/mp4':
            $preview = '<a href="#" class="kt-media">
                            <img width="100" src="' . base_url('media/' . $user_id . '_webp/' . $file . '.webp') . '" alt="image" style="max-width: 80px;min-width: 80px">
                        </a>';
            break;
          
          
        }
        
        $row->Actions = NULL;
        $row->preview = $preview;
        $row->type = $type;
        
        $row->file_name = $file;
        $row->size = byte_format($stats['size']);
        $row->upload_date = $upload_date;
        
        $records['aaData'][] = $row;
        
        
      }
  
  
      $records['sEcho'] = $sEcho;
      $records['iTotalRecords'] = $iTotalRecords;
      $records['iTotalDisplayRecords'] = $iTotalRecords;
  
  
      return $records;
  
  
    }
    
    public function search_test($q = NULL)
    {
      if (NULL === $q) {
        return [];
      }
      
      $res = $this->db->from('___tests')->like('test_name', $q)->get()->result();
      if (empty($res)) {
        return [];
      }
      
      $data = [];
      foreach ($res as $k => $v) {
        $row = new stdClass();
        $row->value = $res[$k]->test_name;
        $row->type = 'test';
        $row->img = base_url('aassets/media/misc/article_test_default.png');
        $row->tid = $res[$k]->id;
        $data[] = $row;
        
      }
      
      return $data;
      
    }
    
    public function search_library_article($q): array
    {
      
      if (strlen($q) < 2) {
        return [];
      }
      
      $this->load->helper('directory');
      $user_id = $this->ion_auth->get_user_id();
      $media_dir = FCPATH . 'media/' . $user_id . '/';
      
      
      $map_raw = directory_map($media_dir, 1);
      $map = [];
      foreach ($map_raw as $file) {
        if (pathinfo($media_dir . $file, PATHINFO_EXTENSION) === 'html') {
          $map[] = $file;
        }
      }
      
      
      $data = [];
      $total_data = 0;
      foreach ($map as $k => $file) {
        
        if (stripos($file, $q) !== FALSE) {
          
          $row = new stdClass();
          $type = mime_content_type('media/' . $user_id . '/' . $file);
          $row->value = $file;
          $row->type = $type;
          $row->img = base_url('aassets/media/misc/article_html_default.png');
          $row->media_url = base_url('media/' . $user_id . '/' . $file);
          
          if ($total_data > 5) {
            return $data;
          }
          
          $data[] = $row;
          $total_data++;
        }
        
        
      }
      
      return $data;
      
      
      // var_dump($map);die;
      
      $column_search = FALSE;
      
      $columns = $this->input->post('columns');
      foreach ($columns as $k => $column) {
        if (!empty($column['search']['value'])) {
          $column_search = TRUE;
        }
        
      }
      
      if ($column_search) {
        
        foreach ($columns as $k => $column) {
          if (!empty($column['search']['value'])) {
            
            
            switch ($column['data']) {
              case 'file_name':
                foreach ($map as $kk => $f) {
                  if (strpos($f, $column['search']['value']) === false) {
                    unset($map[$kk]);
                  }
                  
                }
                
                break;
              case 'type':
                
                foreach ($map as $kk => $f) {
                  
                  if (strcasecmp($column['search']['value'], mime_content_type($media_dir . $f)) !== 0) {
                    unset($map[$kk]);
                  }
                  
                }
                break;
              
              
              case 'upload_date':
                
                
                if (strpos($column['search']['value'], '|') === FALSE) {
                  // to value
                  $to = DateTime::createFromFormat('m/d/Y H:i:s', $column['search']['value'] . ' 24:00:00');
                  $to_unix = $to->format('U');
                  
                  foreach ($map as $kk => $f) {
                    if ($to_unix <= stat($media_dir . $f)['ctime']) {
                      unset($map[$kk]);
                    }
                  }
                  
                  
                  //$map[$kk]
                } else {
                  $parts = explode('|', $column['search']['value']);
                  $from = $parts[0];
                  $to = $parts[1];
                  
                  if ($from !== '') {
                    $from = DateTime::createFromFormat('m/d/Y H:i:s', $from . ' 00:00:00');
                    $from_unix = $from->format('U');
                    
                    
                    foreach ($map as $kk => $f) {
                      if ($from_unix >= stat($media_dir . $f)['ctime']) {
                        
                        
                        unset($map[$kk]);
                      }
                    }
                    
                  }
                  
                  if ($to !== '') {
                    $to = DateTime::createFromFormat('m/d/Y H:i:s', $to . ' 24:00:00');
                    $to_unix = $to->format('U');
                    foreach ($map as $kk => $f) {
                      if ($to_unix <= stat($media_dir . $f)['ctime']) {
                        unset($map[$kk]);
                      }
                    }
                  }
                  
                  
                }
                
                break;
              
            }
            
          }
          
        }
        
        
      }
      
      
      if (empty($map)) {
        $sEcho = (int)$this->input->post('draw');
        $records['aaData'] = [];
        $records['sEcho'] = $sEcho;
        $records['iTotalRecords'] = 0;
        $records['iTotalDisplayRecords'] = 0;
        return $records;
      }
      
      $start = $this->input->post('start');
      $length = $this->input->post('length');
      
      
      $iTotalRecords = count($map);
      
      
      $sEcho = (int)$this->input->post('draw');
      $records['aaData'] = [];
      
      
      $map = array_slice($map, $start, $length);
      
      
      foreach ($map as $k => $file) {
        
        
        $stats = stat($media_dir . $file);
        
        $row = new stdClass();
        
        $upload_date = date('Y-m-d H:i:s', $stats['ctime']);
        $upload_date .= '<br>(' . $this->time_diff_string(date('Y-m-d H:i:s', $stats['ctime'])) . ')';
        
        $type = mime_content_type($media_dir . $file);
        
        $preview = '';
        switch ($type) {
          case 'image/jpeg':
            
            if (!is_dir(FCPATH . 'temp/' . $user_id . '/')) {
              if (!mkdir($concurrentDirectory = FCPATH . 'temp/' . $user_id . '/', 0777, TRUE) && !is_dir($concurrentDirectory)) {
                throw new RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
              }
              
            }
            
            if (!file_exists(FCPATH . 'temp/' . $user_id . '/' . $file)) {
              $conf_img['image_library'] = 'ImageMagick';
              $conf_img['library_path'] = '/usr/bin/convert';
              $conf_img['source_image'] = FCPATH . 'media/' . $user_id . '/' . $file;
              $conf_img['new_image'] = FCPATH . 'temp/' . $user_id . '/' . $file;
              $conf_img['create_thumb'] = false;
              $conf_img['maintain_ratio'] = TRUE;
              $conf_img['height'] = 100;
              $conf_img['width'] = 100;
              $this->image_lib->initialize($conf_img);
              
              $this->image_lib->resize();
              $this->image_lib->clear();
            }
            
            
            $preview = '<a href="#" class="kt-media">
                            <img src="' . base_url('temp/' . $user_id . '/' . $file) . '" alt="image" >
                        </a>';
            break;
          case 'video/mp4':
            $preview = '<a href="#" class="kt-media">
                            <img width="100" src="' . base_url('media/' . $user_id . '_webp/' . $file . '.webp') . '" alt="image" style="max-width: 80px;min-width: 80px">
                        </a>';
            break;
          
          
        }
        
        $row->Actions = NULL;
        $row->preview = $preview;
        $row->type = $type;
        
        $row->file_name = $file;
        $row->size = byte_format($stats['size']);
        $row->upload_date = $upload_date;
        
        $records['aaData'][] = $row;
        
        
      }
      
      
      $records['sEcho'] = $sEcho;
      $records['iTotalRecords'] = $iTotalRecords;
      $records['iTotalDisplayRecords'] = $iTotalRecords;
      
      
      return $records;
      
      
    }
    
    public function time_diff_string($from, $to = NULL, $full = FALSE): string
    {
      if ($to === NULL) {
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
  
      return $string ? implode(', ', $string) . ($diff->invert === 1 ? ' ago' : ' later') : 'just now';
    }
    
    
    private function empty_result()
    {
      
      $sEcho = (int)$this->input->post('draw');
      $records['aaData'] = [];
      $records['sEcho'] = $sEcho;
      $records['iTotalRecords'] = 0;
      $records['iTotalDisplayRecords'] = 0;
      
      
      return $records;
      
    }
    
    
  }
