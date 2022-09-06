<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_DB_query_builder $db
 * @property CI_Loader $load
 * @property CI_Config config
 * @property CI_Session session
 * @property CI_Lang lang
 * @property CI_Security security
 * @property ion_auth|ion_auth_model $ion_auth
 * @property ion_auth_model ion_auth_model
 */
class Test_model extends CI_Model
{
   

    public function __construct()
    {
        parent::__construct();

    }

  
    
    public function insert_test_questions()
    {
      $raw  =file_get_contents('104.txt');
      $i = 1;
      $re = '/([\S\s\n]+)(?=Doğru Cevap:)Doğru Cevap:\s(\S)/mu';
      $data = explode('•',$raw);
      echo '<pre>';
      //var_dump($data);die;
      unset($data[0]);
      $data = [...$data];
      
      foreach($data as $k => $v){
        if($k%6 !== 0){
          continue;
        }
        $row = new stdClass();
        $question = '<p>'.trim($data[$k]).'</p>';
  
        //$question = str_replace(array('I. ', 'II. ', 'III. ', 'IV. '), array('<br> I. ', '<br> II. ', '<br> III. ', '<br> IV. '), $question);
        $row->question = $question;
        $row->added_by = 95;
        $row->test_id = 11;
        $row->a = '<p>'.trim($data[$k+1]).'</p>';
        $row->b = '<p>'.trim($data[$k+2]).'</p>';
        $row->c = '<p>'.trim($data[$k+3]).'</p>';
        $row->d = '<p>'.trim($data[$k+4]).'</p>';
        $last_row = $data[$k+5];
        echo $i;
        $i++;
        echo $last_row;
        echo '
        ';
        preg_match_all($re, $last_row, $matches, PREG_SET_ORDER, 0);
        $row->e = '<p>'.trim($matches[0][1]).'</p>';
        $row->true_answer = trim($matches[0][2]);
// Print the entire match result
        
        $this->db->insert('___test_questions_sess',$row);
        $this->db->reset_query();
        
       
     //   var_dump($row);
        
        
        
        echo '<br>';
//        echo $data[$k];
        
      }
      
      
      
        
    }
  
  public function replace($table_name='___test_questions'){
    
    
    
    $data = $this->db->from($table_name)->get()->result();
  
    foreach ($data as $k => $v) {
  
      $question = str_replace(array(' '), array(''), $v->question);
      $this->db->set('question',$question)->where('id',$v->id)->update($table_name);
      $this->db->reset_query();
      $this->db->set('a',str_replace(' ','',$v->a))->where('id',$v->id)->update($table_name);
      $this->db->reset_query();
      $this->db->set('b',str_replace(' ','',$v->b))->where('id',$v->id)->update($table_name);
      $this->db->reset_query();
      $this->db->set('c',str_replace(' ','',$v->c))->where('id',$v->id)->update($table_name);
      $this->db->reset_query();
      $this->db->set('d',str_replace(' ','',$v->d))->where('id',$v->id)->update($table_name);
      $this->db->reset_query();
      $this->db->set('e',str_replace(' ','',$v->e))->where('id',$v->id)->update($table_name);
      $this->db->reset_query();
      
    }
    
  
     
    
    }
    
    public function insert_tests_to_courses(){
      echo '<pre>';
      $tests = [
        'Makine Öğrenmesi 101 Bölüm Soruları',
        'Makine Öğrenmesi 201 Bölüm Soruları',
        'Makine Öğrenmesi 301 Bölüm Soruları',
        'Makine Öğrenmesi 401 Bölüm Soruları',
      ];
      $test_ids = [27,28,29,30];
      $courses = [62,63,65,66];
      
      foreach($courses as $k => $course_id){
        
        $row = $this->db->from('___courses')->where('course_id',$course_id)->get()->row();
        
        $sections = json_decode($row->sections, false, 512, JSON_THROW_ON_ERROR);
        $section_id = $sections[0]->id;
        var_dump($section_id);
        $test = new stdClass();
        $test->id = $this->randomPassword();
        $test->section_id = $section_id;
        $test->name = $tests[$k];
        $test->media_type = 'test';
        $test->media_url = $test_ids[$k];
        $test->media_name = $tests[$k];
        $test->cover_url = 'https://traiive.com/aassets/media/misc/article_test_default.png';
        $test->media_duration_seconds = '0';
        $test->media_duration_string = '0';
        $test->description = '';
  
        $sections[0]->lectures[] = $test;
        $sections_json = json_encode($sections, JSON_THROW_ON_ERROR, 512);
        $this->db->set('sections',$sections_json)->where('course_id',$course_id)->update('___courses');
        $this->db->reset_query();
      }
      
      
      
      $template = '{
        "id": "cnhzocypwe",
        "section_id": "sbmjnylphy",
        "name": "Veri Bilimi için İstatistik 101 Bölüm Soruları",
        "media_type": "test",
        "media_url": "25",
        "media_name": "Veri Bilimi için İstatistik 101 Bölüm Soruları",
        "cover_url": "https:\/\/traiive.com\/aassets\/media\/misc\/article_test_default.png",
        "media_duration_seconds": "0",
        "media_duration_string": "0",
        "description": ""
      }';
      
    }
  
  
  public function randomPassword($len=10) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //oluşan rastgele karakterleri dizi olarak topluyoruz
    $alphaLength = strlen($alphabet) - 1; //alfabeden 1 eksik olmalı
    for ($i = 0; $i < $len; $i++) {
      $n = random_int(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }
    return implode($pass); //diziyi son olarak kelime olarak geri birleştiriyoruz
  }
  
}
