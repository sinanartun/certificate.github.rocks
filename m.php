<?php
$raw  =file_get_contents('101.txt');

$data = explode('•',$raw);

echo '<pre>';
var_dump($data);
//echo count($data);
