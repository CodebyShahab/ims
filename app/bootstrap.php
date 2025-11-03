<?php
  // Load Config
  require_once '../config/database.php';

  // APPROOT
  define('APPROOT', dirname(dirname(__FILE__)));
  // URLROOT
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  $host = $_SERVER['HTTP_HOST'];
  $script_name = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
  $url_root = $protocol . $host . rtrim(dirname(dirname($script_name)), '/\\');
  define('URLROOT', $url_root);


  // Autoload Core Libraries
  spl_autoload_register(function($className){
    require_once 'core/' . $className . '.php';
  });