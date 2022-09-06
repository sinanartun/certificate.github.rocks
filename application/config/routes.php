<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	https://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
  */
  $route['default_controller'] = 'home';
  $route['404_override'] = '';
  $route['translate_uri_dashes'] = FALSE;
$route['login'] = 'home/home/login';
// admin start
  $route['aajax/users_table'] = 'admin/aajax/users_table';
  $route['aajax/groups_table'] = 'admin/aajax/groups_table';
  $route['aajax/mini_users_table'] = 'admin/aajax/mini_users_table';
  $route['aajax/add_user'] = 'admin/aajax/add_user';
  $route['aajax/add_group'] = 'admin/aajax/add_group';
  $route['aajax/update_user'] = 'admin/aajax/update_user';
  $route['aajax/update_lang'] = 'admin/aajax/update_lang';
  $route['aajax/upload_profile_image'] = 'admin/aajax/upload_profile_image';
  $route['aajax/update_profile_image'] = 'admin/aajax/update_profile_image';
  $route['aajax/update_course_image'] = 'admin/aajax/update_course_image';
  $route['aajax/del_user'] = 'admin/aajax/del_user';
  $route['aajax/del_group'] = 'admin/aajax/del_group';
  $route['aajax/get_inbox_from_user_msg'] = 'admin/aajax/get_inbox_from_user_msg';
  $route['aajax/sent_msg'] = 'admin/aajax/sent_msg';
  $route['aajax/inbox_search_user'] = 'admin/aajax/inbox_search_user';
  $route['aajax/heartbeat'] = 'admin/aajax/heartbeat';
  $route['aajax/upload_media'] = 'admin/aajax/upload_media';
  $route['aajax/remove_media'] = 'admin/aajax/remove_media';
  $route['aajax/library_table'] = 'admin/aajax/library_table';
  $route['aajax/search_library'] = 'admin/aajax/search_library';
  $route['aajax/search_library_article/(:any)'] = 'admin/aajax/search_library_article/$1';
  $route['aajax/save_sess_add_new_course'] = 'admin/aajax/save_sess_add_new_course';
  $route['aajax/get_sess_sections'] = 'admin/aajax/get_sess_sections';
  $route['aajax/submit_new_course'] = 'admin/aajax/submit_new_course';
  $route['aajax/courses_table'] = 'admin/aajax/courses_table';
  $route['aajax/system_log_table'] = 'admin/aajax/system_log_table';
  $route['aajax/error_log_table'] = 'admin/aajax/error_log_table';
  $route['aajax/remove_course'] = 'admin/aajax/remove_course';
  $route['aajax/add_article_save_draft'] = 'admin/aajax/add_article_save_draft';
  $route['aajax/add_article_get_draft'] = 'admin/aajax/add_article_get_draft';
  $route['aajax/add_article_save'] = 'admin/aajax/add_article_save';
  $route['aajax/get_html_file'] = 'admin/aajax/get_html_file';
  $route['aajax/edit_article_update'] = 'admin/aajax/edit_article_update';
  $route['aajax/crop_course_img'] = 'admin/aajax/crop_course_img';
  $route['aajax/get_sections_tt'] = 'admin/aajax/get_sections_tt';
  $route['aajax/get_course_sections'] = 'admin/aajax/get_course_sections';
  $route['aajax/save_course'] = 'admin/aajax/save_course';
  $route['aajax/upload_course_image'] = 'admin/aajax/upload_course_image';
  $route['aajax/add_test'] = 'admin/aajax/add_test';
  $route['aajax/add_question_to_test'] = 'admin/aajax/add_question_to_test';
  $route['aajax/get_sess_questions'] = 'admin/aajax/get_sess_questions';
  $route['aajax/del_sess_question'] = 'admin/aajax/del_sess_question';
  $route['aajax/del_question'] = 'admin/aajax/del_question';
  $route['aajax/get_edit_sess_question'] = 'admin/aajax/get_edit_sess_question';
  $route['aajax/update_question'] = 'admin/aajax/update_question';
  $route['aajax/update_sess_question'] = 'admin/aajax/update_sess_question';
  $route['aajax/publish_test'] = 'admin/aajax/publish_test';
  $route['aajax/test_table'] = 'admin/aajax/test_table';
  $route['aajax/del_test'] = 'admin/aajax/del_test';
  $route['aajax/preview_test'] = 'admin/aajax/preview_test';
  $route['aajax/get_test_questions'] = 'admin/aajax/get_test_questions';
  $route['aajax/add_question_to_edit_test'] = 'admin/aajax/add_question_to_edit_test';
  $route['aajax/get_edit_question'] = 'admin/aajax/get_edit_question';
  $route['aajax/search_test/(:any)'] = 'admin/aajax/search_test/$1';
  $route['aajax/preview_test2'] = 'admin/aajax/preview_test2';
  $route['aajax/users_score_table'] = 'admin/aajax/users_score_table';
  $route['aajax/search_yt_list'] = 'admin/aajax/search_yt_list';
  
  
  $route['admin/dashboard'] = 'admin/admin/dashboard';
  $route['admin/test'] = 'admin/admin/test';
  $route['admin/users_table'] = 'admin/admin/users_table';
  $route['admin/groups_table'] = 'admin/admin/groups_table';
  $route['admin/signout'] = 'admin/admin/signout';
  $route['admin/add_user'] = 'admin/admin/add_user';
  $route['admin/edit_user/(:num)'] = 'admin/admin/edit_user/$1';
  $route['admin/edit_user'] = 'admin/admin/edit_user';
  $route['admin/inbox'] = 'admin/admin/inbox';
  $route['admin/add_new_course'] = 'admin/admin/add_new_course';
  $route['admin/upload'] = 'admin/admin/upload';
  $route['admin/library'] = 'admin/admin/library';
  $route['admin/courses_table'] = 'admin/admin/courses_table';
  $route['admin/edit_course'] = 'admin/admin/edit_course';
  $route['admin/edit_course/(:any)'] = 'admin/admin/edit_course2/$1';
  $route['admin/system_log'] = 'admin/admin/system_log';
  $route['admin/add_article'] = 'admin/admin/add_article';
  $route['admin/edit_article'] = 'admin/admin/edit_article';
  $route['admin/error_log'] = 'admin/admin/error_log';
  $route['admin/add_test'] = 'admin/admin/add_test';
  $route['admin/edit_test/(:num)'] = 'admin/admin/edit_test/$1';
  $route['admin/test_table'] = 'admin/admin/test_table';
  $route['admin/users_score'] = 'admin/admin/users_score';

  
  $route['admin'] = 'admin/admin/dashboard';
// admin end






// user start
  $route['uajax/ask_question'] = 'user/uajax/ask_question';
  $route['uajax/get_answers'] = 'user/uajax/get_answers';
  $route['uajax/get_qa'] = 'user/uajax/get_qa';
  $route['uajax/answer_q'] = 'user/uajax/answer_q';
  $route['uajax/like_q'] = 'user/uajax/like_q';
  $route['uajax/del_q'] = 'user/uajax/del_q';
  $route['uajax/update_q'] = 'user/uajax/update_q';
  $route['uajax/search_qa'] = 'user/uajax/search_qa';
  $route['uajax/pbeat'] = 'user/uajax/pbeat';
  $route['uajax/register_course'] = 'user/uajax/register_course';
  $route['uajax/start_video_play'] = 'user/uajax/start_video_play';
  $route['uajax/end_video_play'] = 'user/uajax/end_video_play';
  $route['uajax/gfl'] = 'user/uajax/get_finished_lectures';
  $route['uajax/get_lecture_desc'] = 'user/uajax/get_lecture_desc';
  $route['uajax/start_test'] = 'user/uajax/start_test';
  $route['uajax/answer_test_question'] = 'user/uajax/answer_test_question';
  $route['uajax/get_test_result'] = 'user/uajax/get_test_result';
  $route['uajax/test_next_question'] = 'user/uajax/test_next_question';
  $route['uajax/test_previous_question'] = 'user/uajax/test_previous_question';
  $route['uajax/update_profile_image'] = 'user/uajax/update_profile_image';
  $route['uajax/update_profile'] = 'user/uajax/update_profile';
  $route['uajax/reset_test'] = 'user/uajax/reset_test';
  
  $route['u/index'] = 'user/user/index';
  $route['u/play/(:any)'] = 'user/user/play/$1';
  $route['u/signout'] = 'user/user/signout';
  $route['u/test'] = 'user/user/test';
  $route['u/profile'] = 'user/user/profile';
  $route['u/edit_profile'] = 'user/user/edit_profile';


// user end

// mentor start
  $route['majax/users_table'] = 'mentor/majax/users_table';
  $route['majax/users_score_table'] = 'mentor/majax/users_score_table';
  
  
  
  
 
  $route['m/users_table'] = 'mentor/mentor/users_table';
  $route['m/users_score'] = 'mentor/mentor/users_score';
  $route['m/signout'] = 'mentor/mentor/signout';
  $route['m/index'] = 'mentor/mentor/dashboard';
// mentor end
  
  
  $route['index'] = 'home/home/index';
  //$route['/index'] = 'home/home/index';

  
  $route['ajax/login'] = 'home/hajax/login';
  
  $route['ajax/register'] = 'home/hajax/register';
  
  $route['ajax/forgot_password'] = 'home/hajax/forgot_password';
  $route['activate/(:num)/(:any)'] = 'home/activate/$1/$2';
  $route['reset_password/(:any)'] = 'home/home/reset_password/$1';
  
  
//  $route['(:any)/(:any)/(:any)/(:any)/(:any)/'] = 'home/home/s404';
//  $route['(:any)/(:any)/(:any)/(:any)/(:any)'] = 'home/home/s404';
//  $route['(:any)/(:any)/(:any)/(:any)/'] = 'home/home/s404';
//  $route['(:any)/(:any)/(:any)/(:any)'] = 'home/home/s404';
//  $route['(:any)/(:any)/(:any)'] = 'home/home/s404';
//  $route['(:any)/(:any)/(:any)/'] = 'home/home/s404';
//  $route['(:any)/(:any)'] = 'home/home/s404';
//  $route['(:any)/'] = 'home/home/s404';
//  $route['(:any)'] = 'home/home/s404';
