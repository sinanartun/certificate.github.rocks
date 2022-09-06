<?php
  echo '<pre>';
  $list_link = 'https://www.youtube.com/playlist?list=PL_RVi56-38Lk9DYwep0dyw-SZB6OlOV_U';
  
  $re = '/(?=youtube)youtube.com\/playlist\?list=([a-zA-Z\d\-\_]+)/';
  preg_match_all($re, $list_link, $matches, PREG_SET_ORDER, 0);
  print_r($matches);
  die;
  
echo 'sdfsdf';
$url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2CcontentDetails&maxResults=50&playlistId=PL_RVi56-38Lk9DYwep0dyw-SZB6OlOV_U&key=AIzaSyDXQh9LoKPjMzXHnqsNmk03c2qjhqYDT_s';

  $response = file_get_contents($url);
 // $decoded = json_decode($response, );

  echo $response;
//https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2CcontentDetails&maxResults=25&playlistId=PL_RVi56-38Lk9DYwep0dyw-SZB6OlOV_U&key=[YOUR_API_KEY] HTTP/1.1
//
//Authorization: Bearer [YOUR_ACCESS_TOKEN]
//Accept: application/json
//$video_id = 'PL_RVi56-38Lk9DYwep0dyw-SZB6OlOV_U';
//
//$api_key = 'AIzaSyDXQh9LoKPjMzXHnqsNmk03c2qjhqYDT_s';
//      $html = 'https://www.googleapis.com/youtube/v3/playlistItems?playlistId=' . $video_id . '&key=' . $api_key . '&part=snippet,contentDetails&maxResults=25';
//      $response = file_get_contents($html);
//      $decoded = json_decode($response, false);
//    echo '<pre>';
//    echo $decoded;