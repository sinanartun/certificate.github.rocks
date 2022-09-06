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
  class User_model extends CI_Model
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
      $this->db->from('___courses c');
      $this->db->join('___users u', 'c.user_id=u.id', 'left');
      $res = $this->db
        ->limit(20)
        ->order_by('order')
        ->where('c.active',1)
        ->get()->result();
      $this->db->cache_off();
      return $res;
    }
    
    public function get_user_courses_codes($my_courses = NULL)
    {
      if (NULL === $my_courses || empty($my_courses)) {
        return [];
      }
      $res = [];
      foreach ($my_courses as $my_course) {
        $res[] = $my_course->course_code;
        
      }
      
      return $res;
      
    }
    
    public function get_test_result()
    {
      $tid = $this->input->post('tid');
      if(empty($tid)){
        return $this->re('e');
        
      }
      
      $test_exist = $this->is_test_exist($tid);
      if(!$test_exist){
        return $this->re('e');
        
      }
      
      $data = new stdClass();
     
  
      $user_id = $this->ion_auth->get_user_id();
      $test_questions = $this->db->from('___test_questions')->where('test_id',$tid)->get()->result();
      foreach($test_questions as $k => $test_question){
         $q = $this->db->from('___user_test_answers')
           ->where('user_id',$user_id)
           ->where('qid',$test_question->id)
           ->get();
         if($q->num_rows() > 0){
           
           $test_questions[$k]->user_answer = $q->row()->answer;
         }
//         else{
//           unset($test_questions[$k]);
//         }
        
         
      }
  
      $data->questions = $test_questions;
      $data->total_question =  count($test_questions);
      $data->answered =  $this->db->from('___user_test_answers')
        ->where('user_id',$user_id)
        ->where('tid',$tid)
        ->get()->num_rows();
      $data->correct =  $this->db->from('___user_test_answers')
        ->where('user_id',$user_id)
        ->where('tid',$tid)
        ->where('correct',1)
        ->get()->num_rows();
      $data->false =  $this->db->from('___user_test_answers')
        ->where('user_id',$user_id)
        ->where('tid',$tid)
        ->where('correct',0)
        ->get()->num_rows();
      
      
      return $this->re('s','',$data);
      
      
      
      
    }
  
    public function get_user_complete_rates($my_courses=NULL){
      if(NULL === $my_courses){
        return NULL;
      }
      $user_id = $this->ion_auth->get_user_id();
      
      foreach($my_courses as $k => $my_course){
        $sections = json_decode($my_course->sections,false);
        $lecture_count = 0;
        $finished_lecture_count = 0;
        $tests = [];
        foreach($sections as $k1 =>  $section){
          $lectures = $section->lectures;
          foreach($lectures as $k2 => $lecture){
            $lecture_id = $lecture->id;
            $media_type =  $lecture->media_type;
            if($media_type === 'test'){
              $test = new stdClass();
              $test->name = $lecture->media_name;
              $test->id = $lecture->media_url;
              $test->total_question = $this->db->from('___test_questions')->where('test_id',$test->id)->get()->num_rows();
              $test->answered =  $this->db->from('___user_test_answers')
                ->where('user_id',$user_id)
                ->where('tid',$test->id)
                ->get()->num_rows();
  
              $test->correct =  $this->db->from('___user_test_answers')
                ->where('user_id',$user_id)
                ->where('tid',$test->id)
                ->where('correct',1)
                ->get()->num_rows();
              $test->false =  $this->db->from('___user_test_answers')
                ->where('user_id',$user_id)
                ->where('tid',$test->id)
                ->where('correct',0)
                ->get()->num_rows();
              
              
              $tests[] =$test;
            }else{
              $lecture_count++;
            }
            
           
            $q =  $this->db->from('___pbeat')
              ->where('lid',$lecture_id)
              ->where('user_id',$user_id)
              ->get();
            $finished = 0;
            if($q->num_rows() > 0){
              $finished = $q->row()->finished;
            }
            
            $sections[$k1]->lectures[$k2]->finished = $finished;
            if((int) $finished > 0){
              $finished_lecture_count++;
            }
            
            
            
          }
          
        }
        $my_courses[$k]->sections = $sections;
        $my_courses[$k]->finished_lecture_count = $finished_lecture_count;
        $my_courses[$k]->lecture_count = $lecture_count;
        $my_courses[$k]->finished_rate =  round($finished_lecture_count/$lecture_count,2)*100;
        $my_courses[$k]->tests = $tests;
      }
      
    
     return $my_courses;
      
      
    }
    
    
    private function save_user_test_answer($qid,$answer,$tue_answer,$correct,$tid){
      $user_id = $this->ion_auth->get_user_id();
      $already_answered =$this->db->from('___user_test_answers')->where('qid',$qid)->where('user_id',$user_id)->get()->num_rows();
      
      if($already_answered){
         return FALSE;
      }
      
      $row = new stdClass();
      $row->user_id = $user_id;
      $row->time = time();
      $row->qid = $qid;
      $row->answer = $answer;
      $row->true_answer = $tue_answer;
      $row->correct = $correct;
      $row->tid = $tid;
      
     $res =  $this->db->insert('___user_test_answers',$row);
     
     return $res?TRUE:FALSE;
     
      
      
      
  }
    
    
  
    public function get_user_courses()
    {
      $this->db->cache_on();
      $user_id = $this->ion_auth->get_user_id();
      $user_courses_res = $this->db->from('___user_courses')->where('user_id', $user_id)->get()->result();
      if (empty($user_courses_res)) {
        return NULL;
      }
      $course_codes = array_column($user_courses_res, 'course_code');
      $this->db->select('c.*, u.first_name, u.last_name');
      $this->db->from('___courses c');
      $this->db->join('___users u', 'c.user_id=u.id', 'left');
      $this->db->where_in('c.course_code', $course_codes);
      $res = $this->db->order_by('c.order','ASC')->get()->result();
      $this->db->cache_off();
      return $res;
     // return $res;
    }
  
  
    public function reset_test()
    {
  
      $user_id = $this->ion_auth->get_user_id();
      $tid = $this->input->post('tid');
      
      if(!$this->is_test_exist($tid)){
        return $this->re('e','');
        
      }
      
      
      $old_answers = $this->db->from('___user_test_answers')
        ->where('user_id',$user_id)
        ->where('tid',$tid)
        ->get()->result();
      
      if(empty($old_answers)){
        return $this->re('s','Reset Test Successfully completed');
        
      }
      
      foreach($old_answers as $old_answer){
  
        unset($old_answer->id);
        $this->db->insert('___user_test_answers_backup',$old_answer);
        $this->db->reset_query();
        
      }
  
     $res =  $this->db
        ->where('user_id',$user_id)
        ->where('tid',$tid)
        ->delete('___user_test_answers');
      
      if($res){
        return $this->re('s','Reset Test Successfully completed');
      }
      
      return $this->re('e');
      
      
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
        $user_id = $this->ion_auth->get_user_id();
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
  
    public function update_profile()
    {
      $user_id = $this->ion_auth->get_user_id();
      $return = new stdClass();
      $user = $this->ion_auth->user($user_id)->row();
      if (empty($user)) {
        return $this->re('e');
        
      }
  
      if (isset($_POST) && empty($_POST)) {
        return $this->re('e');
      }
      
      
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
          // Only allow updating groups if user is admi
          // check to see if we are updating the user
          if ($this->ion_auth->update($user->id, $data)) {
            return $this->re('s','succesfully updated');
            
          }else{
            return $this->re('e','unable to complete process. please try again later');
            
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
    
    }
    
    public function ask_question()
    {
      $user_id = $this->ion_auth->get_user_id();
      $course_code = $this->input->post('course_code');
      $lid = $this->input->post('lid');
      
      if (empty($lid) || empty($course_code) || strlen($lid) !== 10) {
        return $this->re('e');
        
      }
      
      
      if (!$this->is_course_exist($course_code)) {
        $this->add_system_log('course not exist', 7);
        return $this->re('e', 'course not exist');
      }
      $user_have_course = $this->is_user_have_course($course_code, $user_id);
      if (!$user_have_course) {
        $this->add_system_log('user do not have course', 7);
        return $this->re('e', 'user do not have course');
      }
      $text = $this->input->post('text');
      
      if (strlen($text) < 12) {
        return $this->re('e', 'Question is too short');
      }
      
      
      $type = $this->input->post('type');
      if ($type === '') {
        $this->add_system_log('type empty', 7);
        return $this->re('e', 'type empty');
      }
      $data = new stdClass();
      if ((int)$type !== 0) {
        $to = $this->input->post('to');
        $data->to = $to;
      }
      $data->user_id = $user_id;
      $data->text = $text;
      $data->time = time();
      $data->course_code = $course_code;
      $data->type = $type;
      $data->lid = $lid;
      $res = $this->db->insert('___course_qa', $data);
      if ($res) {
        
        $this->notify_mentors_new_question($course_code,$text,$user_id);
        return $this->re('s', 'Successfully posted');
      }
      return $this->re('e', '');
    }
    
    private function notify_mentors_new_question($course_code,$question, $user_id){
      $asked_user = $this->ion_auth->user($user_id)->row();
      $emails = [
        'btl.eren@hotmail.com',
        'sinanartun@gmail.com',
        'kasimecer@icloud.com',
        'cfrcnby@outlook.com',
        'pidatasmanba@gmail.com',
        'muhammetergenc@gmail.com'
      ];
      
      $this->load->library('email');
  
      $this->email->from('no-reply@traiive.com', 'traiive.com');
      $this->email->to($emails);
  
      $this->email->subject('Yeni bir soru geldi');
      $msg = 'Slm Mentor <br> asagida linki bulunan kursda yeni bir soru soruldu<br>';
      $msg .= base_url('u/play/'.$course_code);
      $msg .= '<br>Soran :'.$asked_user->first_name.'&nbsp;'.$asked_user->last_name;
      $msg .= '<br>Soru :<br>';
      $msg .= $question;
      $this->email->message($msg);
  
      $this->email->send();
    
    }
    
    public function get_course_qa($course_code = NULL, $lid = NULL)
    {
      if (NULL === $course_code || strlen($course_code) !== 32) {
        return NULL;
      }
      $course_exist = $this->is_course_exist($course_code);
      if (!$course_exist) {
        return NULL;
      }
      $this->db->select('cqa.*, u.first_name, u.last_name, u.profile_img')
        ->from('___course_qa cqa')
        ->join('___users u', 'cqa.user_id=u.id', 'left')
        ->where('cqa.course_code', $course_code);
      if (NULL !== $lid && 'all' !== $lid ) {
        $this->db->where('cqa.lid', $lid);
      }
      
      $res = $this->db->where('cqa.type', 0)->get()->result();
      
      if (!empty($res)) {
        foreach ($res as $k => $row) {
          $res[$k]->ago = $this->time_diff_string(date('Y-m-d H:i:s', $row->time));
        }
      } else {
        return NULL;
      }
      
      return $res;
    }
    
    public function get_course_question($qid = NULL)
    {
      if (NULL === $qid) {
        return NULL;
      }
      if (!$this->is_question_exist($qid)) {
        return $this->re('e');
      }
      
      $res = $this->db->select('cqa.*, u.first_name, u.last_name, u.profile_img')
        ->from('___course_qa cqa')
        ->join('___users u', 'cqa.user_id=u.id', 'left')
        ->where('cqa.id', $qid)
        ->get()->row();
      $res->ago = $this->time_diff_string(date('Y-m-d H:i:s', $res->time));
      return $res;
    }
    
    public function is_user_have_course($course_code = NULL, $user_id = NULL): bool
    {
      if (NULL === $course_code) {
        return FALSE;
      }
      
      if (NULL === $user_id) {
        $user_id = $this->ion_auth->get_user_id();
      }
      
      $nor = $this->db->from('___user_courses')
        ->where('user_id', $user_id)
        ->where('course_code', $course_code)
        ->get()->num_rows();
      return $nor > 0;
    }
    
    public function get_course($course_code = NULL)
    {
      if (NULL === $course_code || strlen($course_code) !== 32) {
        return NULL;
      }
      $this->db->select('c.*, u.first_name, u.last_name')
        ->from('___courses c')
        ->join('___users u', 'c.user_id=u.id', 'left')
        ->where('c.course_code', $course_code);
      $course = $this->db->get()->row();
      if (empty($course)) {
        return NULL;
      }
      if (!empty($course->sections)) {
        $course->sections = json_decode($course->sections);
      }
      foreach ($course->sections as $k => $section) {
        if (!isset($section->lectures)) {
          continue;
        }
        foreach ($section->lectures as $i => $lecture) {
          $course->sections[$k]->lectures[$i]->media_duration = $this->secondsToHumanReadable($lecture->media_duration_seconds);
        }
      }
      return $course;
    }
    
    
    public function update_q()
    {
      $user_id = $this->ion_auth->get_user_id();
      $qid = $this->input->post('qid');
      $text = $this->input->post('text');
      
      if (strlen($text) < 10) {
        return $this->re('e', 'message is too short');
      }
      
      
      if (!$this->is_question_exist($qid, $user_id)) {
        return $this->re('e');
      }
      $data = new stdClass();
      $data->text = $text;
      
      $res = $this->db->where('user_id', $user_id)
        ->where('id', $qid)
        ->update('___course_qa', $data);
      $this->db->reset_query();
      
      if ($res) {
        return $this->re('s', 'Successfully updated');
      }
      
      return $this->re('e');
      
    }
    
    
    public function like_q()
    {
      $qid = $this->input->post('qid');
      $user_id = $this->ion_auth->get_user_id();
      
      if (empty($qid)) {
        return $this->re('e', '');
      }
      
      if (!$this->is_question_exist($qid)) {
        return $this->re('e', '');
      }
      
      
      $nor = $this->db->from('___question_likes')
        ->where('user_id', $user_id)
        ->where('qid', $qid)
        ->get()->num_rows();
      
      if ($nor > 0) {
        $this->delete_user_qlike($user_id, $qid);
        
        $total_likes = $this->update_like_count($qid);
        $data = new stdClass();
        $data->total_like = $total_likes;
        
        return $this->re('s', 'successfully updated', $data);
        
        
      }
      
      
      $res = $this->plus_user_qlike($user_id, $qid);
      
      if ($res) {
        
        $total_likes = $this->update_like_count($qid);
        $data = new stdClass();
        $data->total_like = $total_likes;
        
        return $this->re('s', 'successfully updated', $data);
        
      }
      
      return $this->re('e', '');
      
    }
    
    private function delete_user_qlike($user_id, $qid)
    {
      $res = $this->db
        ->where('user_id', $user_id)
        ->where('qid', $qid)
        ->delete('___question_likes');
      $this->db->reset_query();
      return $res;
      
    }
    
    private function plus_user_qlike($user_id, $qid): bool
    {
      
      $res = $this->db
        ->set('user_id', $user_id)
        ->set('qid', $qid)
        ->set('time', time())
        ->insert('___question_likes');
      $this->db->reset_query();
      return $res;
      
    }
    
    
    private function update_like_count($qid = NULL)
    {
      if (NULL === $qid) {
        return FALSE;
      }
      
      
      $nor = $this->db->from('___question_likes')->where('qid', $qid)->get()->num_rows();
      
      $res = $this->db->set('like', $nor)->where('id', $qid)->update('___course_qa');
      $this->db->reset_query();
      
      if ($res) {
        return $nor;
      }
      
      return -1;
      
      
    }
    
    
    private function get_course_code_from_qid($qid = NULL)
    {
      if (NULL === $qid) {
        return FALSE;
      }
      
      $res = $this->db->select('course_code')->from('___course_qa')->where('id', $qid)->get()->row();
      if ($res && isset($res->course_code)) {
        return $res->course_code;
        
      }
      
      return FALSE;
      
      
    }
    
    
    public function del_q()
    {
      $qid = (int)$this->input->post('qid');
      $user_id = $this->ion_auth->get_user_id();
      
      if (!$this->is_question_exist($qid)) {
        return $this->re('e', '');
        
      }
      
      $row = $this->db->from('___course_qa')->where('id', $qid)->get()->row();
      
      
      $res = $this->db
        ->where('id', $qid)
        ->where('user_id', $user_id)
        ->delete('___course_qa');
      $this->db->reset_query();
      $this->db->where('to', $qid)->delete('___course_qa');
      $this->db->reset_query();
      
      
      if ((int)$row->type === 0) {
        $this->update_answer_count($qid);
      } elseif ((int)$row->type === 1) {
        $this->update_answer_count((int)$row->to);
      }
      
      
      if ($res) {
        return $this->re('s', 'Successfully deleted');
      }
      
      return $this->re('e', '');
      
    }
    
    public function answer_q()
    {
      $qid = $this->input->post('qid');
      $answer = $this->input->post('text');
      if (!$this->is_question_exist($qid)) {
        return $this->re('e', '');
      }
      $user = $this->ion_auth->user()->row();
      $user_id = $user->id;
      $data = new stdClass();
      $data->to = $qid;
      $data->text = $answer;
      $data->type = 1;
      $data->user_id = $user_id;
      $data->time = time();
      $res = $this->db->insert('___course_qa', $data);
      $this->db->reset_query();
      
      $answer_count = $this->update_answer_count($qid);
      $data = new stdClass();
      $data->answer_count = $answer_count;
      
      if ($res) {
        $this->notify_user_question_answered($user,$qid,$answer);
        return $this->re('s', 'Successfully sent.', $data);
      }
      
      return $this->re('e', '');
    }
    
    private function get_qa_question($qid = NULL){
      if(NULL === $qid){
        return NULL;
      }
      $q = $this->db->from('___course_qa')->where('id',$qid)->get();
      if($q->num_rows() > 0){
        return $q->row();
      }
      
      return NULL;
      
    }
    
    private function notify_user_question_answered($user,$qid=NULL,$answer=NULL){
      if(NULL === $user || NULL === $qid || NULL === $answer){
        return FALSE;
      }
  
      $question = $this->get_qa_question($qid);
      if(!$question){
        return FALSE;
      }
  
      $this->load->library('email');
  
      $this->email->from('no-reply@traiive.com', 'traiive.com');
      $this->email->to($user->email);
  
      $this->email->subject('Sorunuza yeni bir cevap geldi');
      $msg = 'Merhaba '. $user->first_name.'&nbsp;'.$user->last_name.' <br> asagida linki bulunan kursda bir sorunuz vardi ve simdi yeni bir cevap geldi <br>';
      $msg .= base_url('u/play/'.$question->course_code);
      
      $msg .= '<br>Sizin Sorunuz :<br>';
      $msg .= $question->text;
      
      $msg .= '<br>Cevap :<br>';
      $msg .= $answer;
      $this->email->message($msg);
  
      return $this->email->send();
      
      
    }
    
    
    private function update_answer_count($qid = NULL)
    {
      if (NULL === $qid) {
        return FALSE;
      }
      
      $nor = $this->db->from('___course_qa')->where('to', $qid)->get()->num_rows();
      
      $res = $this->db->set('answer_count', $nor)->where('id', $qid)->update('___course_qa');
      $this->db->reset_query();
      
      if ($res) {
        return $nor;
      }
      
      return -1;
      
      
    }
    
    
    public function get_qa()
    {
      $course_code = $this->input->post('course_code');
      $lid = $this->input->post('lid');
      
      if (empty($course_code) || empty($lid)) {
        return $this->re('e');
        
      }
      
      
      $user_id = $this->ion_auth->get_user_id();
      $res = $this->get_course_qa($course_code, $lid);
      if (empty($res)) {
        return $this->re('s', '');
      }
      foreach ($res as $k => $row) {
        $res[$k]->cd = FALSE;
        if ($user_id === (int)$row->user_id) {
          $res[$k]->edit = TRUE;
        }
        
      }
      
      return $this->re('s', '', $res);
    }
    
    public function start_video_play()
    {
      $user_id = $this->ion_auth->get_user_id();
      $lecture_id = $this->input->post('lid');
      
      if (strlen($lecture_id) !== 10) {
        return $this->re('e', '');
        
      }
      
      $row = $this->db->from('___pbeat')
        ->select('current_time')
        ->where('lid', $lecture_id)
        ->where('user_id', $user_id)->get()->row();
      
      if (!$row) {
        return $this->re('e', '');
      }
      return $this->re('s', '', $row);
    }
    
    public function get_finished_lectures()
    {
      $user_id = $this->ion_auth->get_user_id();
      $course_code = $this->input->post('cc');
      
      if (empty($course_code) || strlen($course_code) !== 32) {
        return $this->re('e', '');
        
      }
      
      $res = $this->db
        ->select('lid')
        ->from('___pbeat')
        ->where('user_id', $user_id)
        ->where('course_code', $course_code)
        ->where('finished', 1)
        ->get()->result_array();
      
      if (empty($res)) {
        
        return $this->re('e', '');
        
      }
      
      
      $lids = array_column($res, 'lid');
      return $this->re('s', '', $lids);
      
      
    }
    
    public function end_video_play()
    {
      $user_id = $this->ion_auth->get_user_id();
      $lecture_id = $this->input->post('lid');
      
      if (strlen($lecture_id) !== 10) {
        return $this->re('e', '');
        
      }
      
      $data = new stdClass();
      $data->finished = 1;
      
      $row = $this->db
        ->where('lid', $lecture_id)
        ->where('user_id', $user_id)
        ->update('___pbeat', $data);
      
      if (!$row) {
        return $this->re('e', '');
      }
      
      
      return $this->re('s', '', $row);
    }
    
    
    public function get_last_pbeat($course_code = NULL)
    {
      
      if (strlen($course_code) !== 32) {
        return NULL;
      }
      
      $user_id = $this->ion_auth->get_user_id();
      
      $row = $this->db->from('___pbeat')
        ->where('user_id', $user_id)
        ->where('course_code', $course_code)
        ->order_by('time', 'DESC')
        ->limit(1)
        ->get()->row();
      
      if (!$row || !is_object($row)) {
        return NULL;
      }
      
      $row->section_id = $this->get_section_id_from_lid($row->lid, $course_code);
      
      
      return $row;
      
    }
    
    
    private function get_section_id_from_lid($lid = NULL, $course_code = NULL)
    {
      if (NULL === $lid || NULL === $course_code || strlen($lid) !== 10 || strlen($course_code) !== 32) {
        return NULL;
      }
      
      $row = $this->db->from('___courses')->where('course_code', $course_code)->limit(1)->get()->row();
      if (!$row) {
        return NULL;
      }
      
      $sections = json_decode($row->sections, FALSE);
      
      if (!is_array($sections)) {
        return NULL;
      }
      
      foreach ($sections as $k => $section) {
        
        if (!is_array($section->lectures)) {
          continue;
        }
        
        foreach ($section->lectures as $kk => $lecture) {
          if ($lecture->id === $lid) {
            return $section->id;
          }
          
        }
        
      }
      
      
      return NULL;
      
    }
    
    
    public function pbeat()
    {
      $user_id = $this->ion_auth->get_user_id();
      $course_code = $this->input->post('cc');
      $lecture_id = $this->input->post('lid');
      $current_time = (int)$this->input->post('ct');
      
      if (strlen($lecture_id) !== 10 || strlen($course_code) !== 32) {
        return $this->re('e', '');
        
      }
      
      
      $old_current_time = (int)$this->session->$lecture_id;
      if ($old_current_time < 0) {
        $old_current_time = 0;
      }
      $this->session->$lecture_id = $current_time;
      
      
      $this->db->set('spent_time', '(spent_time + 5)', FALSE);
      
      if ($current_time !== $old_current_time) {
        $watch_time = ($current_time - $old_current_time);
        if ($watch_time < 0 || $watch_time > 5) {
          $watch_time = 5;
        }
        
        $this->db->set('watch_time', 'watch_time+' . $watch_time, FALSE);
        
      }
      $this->db->set('current_time', $current_time, TRUE);
      $this->db->set('time', time());
      
      $this->db->where('user_id', $user_id);
      $this->db->where('lid', $lecture_id);
      $this->db->where('course_code', $course_code);
      $this->db->update('___pbeat');
      $this->db->reset_query();
      
    }
    
    public function search_qa()
    {
      $user_id = $this->ion_auth->get_user_id();
      $q = $this->input->post('q');
      $course_code = $this->input->post('course_code');
      $lid = $this->input->post('lid');
      $order_by = $this->input->post('order_by');
      $filter_by = (array)$this->input->post('filter_by');
      
      
      if (empty($course_code)) {
        return $this->re('e');
        
      }
      
      
      if (!$this->is_course_exist($course_code)) {
        return $this->re('e');
        
      }
      
      
      $this->db->select('cqa.*, u.first_name, u.last_name, u.profile_img')
        ->from('___course_qa cqa')
        ->join('___users u', 'cqa.user_id=u.id', 'left')
        ->where('cqa.course_code', $course_code);
      
      if ($q !== '') {
        $this->db->like('cqa.text', $q);
      }
      
      if ($lid !== '' && $lid !== 'all') {
        $this->db->like('cqa.lid', $lid);
      }
      
      if ($order_by !== '') {
        if ($order_by === 'newest') {
          $this->db->order_by('cqa.time', 'DESC');
        } elseif ($order_by === 'oldest') {
          $this->db->order_by('cqa.time', 'ASC');
        } elseif ($order_by === 'most_like') {
          $this->db->order_by('cqa.like', 'DESC');
        } elseif ($order_by === 'less_like') {
          $this->db->order_by('cqa.like', 'ASC');
        }
        
      }
      
      
      if (!empty($filter_by)) {
        
        if (in_array('my_questions', $filter_by, true)) {
          $this->db->where('cqa.user_id', $user_id);
        }
        
        if (in_array('unanswered_questions', $filter_by, true)) {
          $this->db->where('cqa.answer_count', 0);
        }
        
        
      }
      
      
      $res = $this->db->get()->result();
      
      if (empty($res)) {
        return $this->re('s', '');
      }
      
      foreach ($res as $k => $row) {
        $res[$k]->ago = $this->time_diff_string(date('Y-m-d H:i:s', $row->time));
        if ($user_id === (int)$row->user_id) {
          $res[$k]->edit = TRUE;
        }
        
      }
      
      
      return $this->re('s', '', $res);
    }
    
    public function get_answers()
    {
      $qid = (int)$this->input->post('qid');
      if (empty($qid)) {
        return $this->re('e', '');
      }
      
      
      $this->db->select('u.first_name, u.last_name, u.profile_img, cqa.*');
      $this->db->from('___course_qa cqa');
      $this->db->join('___users u', 'u.id=cqa.user_id', 'left');
      $res = $this->db->where('to', $qid)->get()->result();
      if (!empty($res)) {
        foreach ($res as $k => $row) {
          $res[$k]->ago = $this->time_diff_string(date('Y-m-d H:i:s', $row->time), null);
        }
      }
      $data = new stdClass();
      $data->question = $this->get_course_question($qid);
      $data->answers = $res;
      $data->the_user_id = (int)$this->ion_auth->get_user_id();
      
      return $this->re('s', '', $data);
    }
    
    private function is_course_exist($course_code = NULL)
    {
      if (NULL === $course_code || strlen($course_code) !== 32) {
        return FALSE;
      }
      $nor = $this->db->from('___courses')->where('course_code', $course_code)->get()->num_rows();
      if ($nor > 0) {
        return TRUE;
      }
      return FALSE;
    }
    
    private function is_question_exist($qid = NULL, $user_id = NULL): bool
    {
      if (NULL === $qid) {
        return FALSE;
      }
      
      $this->db->from('___course_qa');
      if (NULL !== $user_id) {
        $this->db->where('user_id', $user_id);
      }
      
      $nor = $this->db->where('id', $qid)->get()->num_rows();
      
      
      if ($nor > 0) {
        return TRUE;
      }
      return FALSE;
    }
    
    public function get_lecture_desc()
    {
      $course_code = $this->input->post('cc');
      $lid = $this->input->post('lid');
      
      
      if (strlen($lid) !== 10) {
        return $this->re('e', '');
      }
      
      
      $row = $this->db->from('___courses')->select('sections')->where('course_code', $course_code)->get()->row();
      
      if (!isset($row->sections)) {
        return $this->re('e', '');
        
      }
      
      $sections = json_decode($row->sections, false);
      
      if (!is_array($sections)) {
        return $this->re('e', '');
      }
      
      $data = new stdClass();
      $data->description = '';
      
      foreach ($sections as $section) {
        
        if (empty($section->lectures)) {
          continue;
        }
        
        foreach ($section->lectures as $lecture) {
          if ($lecture->id === $lid) {
            if (isset($lecture->description) && !empty($lecture->description)) {
              $data->description = $lecture->description;
            }
            return $this->re('s', '', $data);
            
          }
          
        }
        
      }
      
      
      return $this->re('s', '', $data);
      
      
    }
    
    
    public function secondsToHumanReadable(int $seconds, int $requiredParts = null)
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
    
    public function login()
    {
      $return = new stdClass();
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
      $this->form_validation->set_rules('password', 'Password', 'required|trim');
      if ($this->form_validation->run() !== true) {
        $identity = $this->input->post('email');
        $log = 'Authentication Failed !!!';
        $log .= ' ERROR: ';
        if (validation_errors()) {
          $log .= validation_errors();
        } else {
          $log .= $this->session->flashdata('message');
        }
        $log .= ' Username: ' . $identity;
        $this->add_system_log($log, 7);
        
        $msg = (validation_errors()) ?: $this->session->flashdata('message');
        return $this->re('e', $msg);
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
          'redirect' => base_url('admin')
        ];
        return $this->re('s', $msg, $data);
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
        return $this->re('e', $msg);
      }
      $log = 'Authentication Failed !!!';
      $log .= ' ERROR: ';
      if (validation_errors()) {
        $log .= (string)validation_errors();
      } else {
        $log .= 'Username or password is incorrect !!!';
      }
      
      $log .= ' Username: ' . $identity;
      $this->add_system_log($log, 8);
      $msg = (validation_errors()) ? validation_errors() : 'Username or password is incorrect !!!';
      return $this->re('e', $msg);
    }
    
    private function add_system_log($log = null, $severity = 1, $type = 'general')
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
      $res = $this->db->count_all_results();
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
      $this->db->from($this->config->item('tables', 'ion_auth')['users']);
      $nor = $this->db->where('email', $email)->get()->num_rows();
      if ($nor < 1) {
        $msg = 'There is no account with this email !!!';
      }
      return $this->re('e', $msg);
    }
  
    public function answer_test_question()
    {
      $answer = $this->input->post('answer');
      if(empty($answer)){
        return $this->re('e');
      }
    
      if(!in_array($answer,['a','b','c','d','e'])){
        return $this->re('e');
      }
    
      $qid = $this->input->post('qid');
    
      if(empty($qid)){
        return $this->re('e');
      }
      $question_exist = $this->is_test_question_exist($qid);
      if(!$question_exist){
        return $this->re('e');
      }
  
      $user_id = $this->ion_auth->get_user_id();
      
      
      
    
      $test_question = $this->db->from('___test_questions')->where('id',$qid)->get()->row();
      $tid = $test_question->test_id;
      $data = new stdClass();
      $data->result=FALSE;
      $msg = 'Cevabınız Hatalı';
      if($test_question->true_answer === $answer){
        $data->result=TRUE;
        $msg = 'Cevabınız Doğru';
      }
      $data->true_answer=$test_question->true_answer;
  
      $already_answered =$this->db->from('___user_test_answers')->where('qid',$qid)->where('user_id',$user_id)->get()->num_rows();
      if($already_answered){
        $msg = 'Bu soruyu daha önce cevaplamışsınız';
      }else{
  
        $this->save_user_test_answer($qid,$answer,$test_question->true_answer,$data->result,$tid);
      }
    
  
  
      $test_total_question = $this->db->from('___test_questions')->where('test_id',$tid)->get()->num_rows();
      $user_answered_total = $this->db->from('___user_test_answers')->where('tid',$tid)->where('user_id',$user_id)->get()->num_rows();
      $user_total_correct_answers = $this->db
        ->from('___user_test_answers')
        ->where('tid',$tid)
        ->where('user_id',$user_id)
        ->where('correct',1)->get()->num_rows();
      $user_total_wrong_answers = $this->db
        ->from('___user_test_answers')
        ->where('tid',$tid)
        ->where('user_id',$user_id)
        ->where('correct',0)->get()->num_rows();
      $data->ttq = $test_total_question;
      $data->uaq = $user_answered_total;
      $data->utca = $user_total_correct_answers;
      $data->utwa = $user_total_wrong_answers;
      
    
      return $this->re('s',$msg,$data);
    
    
    
    }
    
    public function start_test()
    {
      $tid = (int) $this->input->post('tid');
      $qid = (int) $this->input->post('qid');
     
      
      $test_exist = $this->is_test_exist($tid);
      if (!$test_exist) {
        return $this->re('e');
      }
      $user_id = $this->ion_auth->get_user_id();
      $msg = '';
      $next_question = $this->get_test_next_question($tid,$user_id);
      //return $next_question;
      $test_total_question = $this->db
        ->from('___test_questions')
        ->where('test_id',$tid)->get()->num_rows();
      $user_answered_total = $this->db
        ->from('___user_test_answers')
        ->where('tid',$tid)
        ->where('user_id',$user_id)->get()->num_rows();
      $user_total_correct_answers = $this->db
        ->from('___user_test_answers')
        ->where('tid',$tid)
        ->where('user_id',$user_id)
        ->where('correct',1)->get()->num_rows();
      $user_total_wrong_answers = $this->db
        ->from('___user_test_answers')
        ->where('tid',$tid)
        ->where('user_id',$user_id)
        ->where('correct',0)->get()->num_rows();
      $test_remain = 'unfinished';
      if($test_total_question === $user_answered_total){
        $test_remain = 'finished';
        $msg = 'Testi basariyla bitirdiniz.';
      }
      
      
      $test  =  $this->get_test($tid);
      $data = new stdClass();
      $data->question = $next_question;
      $data->test_name = $test->test_name;
      $data->ttq = $test_total_question;
      $data->uaq = $user_answered_total;
      $data->utca = $user_total_correct_answers;
      $data->utwa = $user_total_wrong_answers;
      $data->tr = $test_remain;
      $data->msg = $msg;
      $data->order = $next_question->order;
      return $this->re('s','',$data);
      
      
    }
    
    public function test_next_question(){
      $tid = (int) $this->input->post('tid');
      $qid = (int) $this->input->post('qid');
      $user_id = $this->ion_auth->get_user_id();
      $msg = '';
      $test_exist = $this->is_test_exist($tid);
      if (!$test_exist) {
        return $this->re('e');
      }
      $question_exist = $this->db->from('___test_questions')
        ->where('id', $qid)
        ->where('test_id', $tid)
        ->get()->num_rows();
      
      if (!$question_exist) {
        return $this->re('e');
      }
  
  
  
      $next_question_q = $this->db
        ->select('id, question, a, b, c, d, e, test_id, order')
        ->from('___test_questions')
        ->where('test_id',$tid)
        ->where('id >',$qid)
        ->get();
      if($next_question_q->num_rows() < 1){
        $next_question = $this->db
          ->select('id, question, a, b, c, d, e, test_id, order')
          ->from('___test_questions')
          ->where('test_id',$tid)
          ->order_by('id')
          ->get()->row();
      }else{
        $next_question = $next_question_q->row();
      }
      
      
      
      $test_total_question = $this->db
        ->from('___test_questions')
        ->where('test_id',$tid)->get()->num_rows();
      $user_answered_total = $this->db
        ->from('___user_test_answers')
        ->where('tid',$tid)
        ->where('user_id',$user_id)->get()->num_rows();
      $user_total_correct_answers = $this->db
        ->from('___user_test_answers')
        ->where('tid',$tid)
        ->where('user_id',$user_id)
        ->where('correct',1)->get()->num_rows();
      $user_total_wrong_answers = $this->db
        ->from('___user_test_answers')
        ->where('tid',$tid)
        ->where('user_id',$user_id)
        ->where('correct',0)->get()->num_rows();
      $test_remain = 'unfinished';
     
  
  
      $test  =  $this->get_test($tid);
      $data = new stdClass();
      $data->question = $next_question;
      $data->test_name = $test->test_name;
      $data->ttq = $test_total_question;
      $data->uaq = $user_answered_total;
      $data->utca = $user_total_correct_answers;
      $data->utwa = $user_total_wrong_answers;
      $data->tr = $test_remain;
      $data->order = $next_question->order;
      $data->msg = $msg;
      return $this->re('s','',$data);
      
      
    }
  
    public function test_previous_question(){
      $tid = (int) $this->input->post('tid');
      $qid = (int) $this->input->post('qid');
      $user_id = $this->ion_auth->get_user_id();
      $msg = '';
      $test_exist = $this->is_test_exist($tid);
      if (!$test_exist) {
        return $this->re('e');
      }
      $question_exist = $this->db->from('___test_questions')
        ->where('id', $qid)
        ->where('test_id', $tid)
        ->get()->num_rows();
    
      if (!$question_exist) {
        return $this->re('e');
      }
    
    
    
      $next_question_q = $this->db
        ->select('id, question, a, b, c, d, e, test_id, order')
        ->from('___test_questions')
        ->where('test_id',$tid)
        ->where('id <',$qid)
        ->order_by('id','DESC')
        ->get();
      if($next_question_q->num_rows() < 1){
        $next_question = $this->db
          ->select('id, question, a, b, c, d, e, test_id, order')
          ->from('___test_questions')
          ->where('test_id',$tid)
          ->order_by('id','DESC')
          ->get()->row();
      }else{
        $next_question = $next_question_q->row();
      }
    
    
    
      $test_total_question = $this->db
        ->from('___test_questions')
        ->where('test_id',$tid)->get()->num_rows();
      $user_answered_total = $this->db
        ->from('___user_test_answers')
        ->where('tid',$tid)
        ->where('user_id',$user_id)->get()->num_rows();
      $user_total_correct_answers = $this->db
        ->from('___user_test_answers')
        ->where('tid',$tid)
        ->where('user_id',$user_id)
        ->where('correct',1)->get()->num_rows();
      $user_total_wrong_answers = $this->db
        ->from('___user_test_answers')
        ->where('tid',$tid)
        ->where('user_id',$user_id)
        ->where('correct',0)->get()->num_rows();
      $test_remain = 'unfinished';
    
    
    
      $test  =  $this->get_test($tid);
      $data = new stdClass();
      $data->question = $next_question;
      $data->test_name = $test->test_name;
      $data->ttq = $test_total_question;
      $data->uaq = $user_answered_total;
      $data->utca = $user_total_correct_answers;
      $data->utwa = $user_total_wrong_answers;
      $data->tr = $test_remain;
      $data->order = $next_question->order;
      $data->msg = $msg;
      return $this->re('s','',$data);
    
    
    }
    
    private function get_test($tid){
      return $this->db->from('___tests')->where('id',$tid)->get()->row();
    }
    
    private function get_test_first_question($tid = NULL)
    {
      if(NULL === $tid){
        return NULL;
      }
     return $this->db
       ->select('id, question, a, b, c, d, e, test_id, order')
       ->from('___test_questions')
       ->where('test_id',$tid)
       ->order_by('id')
       ->get()->row();
    }
    private function get_test_next_question($tid,$user_id)
    {
      $user_answered_qids = $this->db->select('qid')->from('___user_test_answers')->where('user_id',$user_id)->get()->result_array();
      if(empty($user_answered_qids)){
        return $this->get_test_first_question($tid);
      }
  
      $user_answered_qids_arr = array_column($user_answered_qids, 'qid');
      
      $next_question_exist = $this->db->from('___test_questions')
        ->where('test_id',$tid)
        ->where_not_in('id',$user_answered_qids_arr)
        ->get()->num_rows();
      
      if($next_question_exist > 0){
        $this->db->reset_query();
        return $this->db
          ->select('id, question, a, b, c, d, e, test_id, order')
          ->from('___test_questions')
          ->where('test_id',$tid)
          ->where_not_in('id',$user_answered_qids_arr)
          ->get()->row();
      }
  
      // do not return null
      $this->db->reset_query();
      return $this->db
        ->select('id, question, a, b, c, d, e, test_id, order')
        ->from('___test_questions')
        ->where('test_id',$tid)
        ->get()->row();
      
      
      
//      $this->db->select('qid')->from('___user_test_answers')
//      return $this->db->from('___test_questions')
//        ->where('test_id',$tid)
//        ->where()
//        ->order_by('id')
//        ->get()->row();
    }
    
    
    public function is_test_exist($tid = NULL)
    {
      if (NULL === $tid) {
        return FALSE;
      }
      
      $nor = $this->db->from('___tests')->where('id', $tid)->get()->num_rows();
      return $nor > 0;
      
      
    }
    public function is_test_question_exist($qid = NULL): bool
    {
      if (NULL === $qid) {
        return FALSE;
      }
    
      $nor = $this->db->from('___test_questions')->where('id', $qid)->get()->num_rows();
      return $nor > 0;
    
    
    }
    
    public function register_course()
    {
      $this->db->cache_delete_all();
      $user_id = $this->ion_auth->get_user_id();
      if (empty($user_id)) {
        return $this->re('e', 'Please Login');
      }
      $course_code = $this->input->post('course_code');
      if (empty($course_code) || strlen($course_code) !== 32) {
        return $this->re('e', '');
      }
      
      if (!$this->is_course_exist($course_code)) {
        return $this->re('e', '11');
      }
      
      $already_registered = $this->db
        ->from('___user_courses')
        ->where('user_id', $user_id)
        ->where('course_code', $course_code)
        ->get()->num_rows();
      if ($already_registered > 0) {
        return $this->re('e', 'You have already registered this course');
      }
      $data = [
        'user_id' => $user_id,
        'course_code' => $course_code,
        'date_start' => time()
      ];
      $this->db->insert('___user_courses', $data);
      $this->db->reset_query();
      
      $res = $this->write_user_rows_to_pbeats($user_id, $course_code);
      
      if (!$res) {
        return $this->re('e', '345');
        
      }
      
      
      return $this->re('s', 'Course Registered Successfully');
    }
    
    private function write_user_rows_to_pbeats($user_id = NULL, $course_code = NULL)
    {
      
      $lecture_ids = $this->get_lids_from_course_code($course_code);
      //var_dump($lecture_ids);die;
      if (empty($lecture_ids)) {
        return FALSE;
      }
      
      foreach ($lecture_ids as $lid) {
        $data = new stdClass();
        $data->user_id = $user_id;
        $data->lid = $lid;
        $data->course_code = $course_code;
        $data->spent_time = 0;
        $data->watch_time = 0;
        
        $this->db->insert('___pbeat', $data);
        $this->db->reset_query();
      }
      
      return TRUE;
    }
    
    
    private function get_lids_from_course_code($course_code = NULL)
    {
      
      $course = $this->db->from('___courses')->where('course_code', $course_code)->get()->row();
      if (empty($course)) {
        return NULL;
      }
      
      $sections = json_decode($course->sections, false);
      
      if (empty($sections)) {
        return NULL;
      }
      
      $lecture_ids = [];
      
      foreach ($sections as $k => $section) {
        if (empty($section->lectures)) {
          continue;
        }
        
        foreach ($section->lectures as $kk => $lecture) {
          
          $lecture_ids[] = $lecture->id;
        }
      }
      return $lecture_ids;
      
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
