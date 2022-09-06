<?php
  
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  echo shell_exec('whoami');
  
  
  exec("/usr/bin/python /var/www/html/temp/test.py 2>&1", $output);
  print_r($output);
