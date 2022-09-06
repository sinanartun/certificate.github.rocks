<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
//  $config['protocol'] = 'smtp';
//  $config['smtp_host'] = 'smtp.sendgrid.net';
//  $config['smtp_user'] = 'apikey';
//  $config['smtp_pass'] = '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';
//  $config['smtp_port'] = '587';
//  $config['smtp_timeout'] = '10';
//  $config['smtp_crypto'] = 'tls';
////$config['smtp_keepalive'] = FALSE;
//  $config['wordwrap'] = FALSE;
//  $config['mailtype'] = 'html';
  
  
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'smtp.yandex.com';
    $config['smtp_user'] = 'no-reply@traiive.com';
    $config['smtp_pass'] = 'sa123654';
    $config['smtp_port'] = '465';
    $config['smtp_timeout'] = '10';
    $config['smtp_crypto'] = 'ssl';
  //$config['smtp_keepalive'] = FALSE;
    $config['wordwrap'] = FALSE;
    $config['mailtype'] = 'html';
