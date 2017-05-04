<?php

// config.phpより

/*
MyApp
index.php controller
MyApp\Controller\index
-> lib/Controller/Index.php
*/

spl_autoload_register(function($class) { // autoload登録
  $prefix = 'MyApp\\'; // エスケープした＼
  if (strpos($class, $prefix) === 0) { // strpos=文字列($class)内の部分文字列($prefix)が最初に現れる場所を見つける -> 0番目ならば〜
    $className = substr($class, strlen($prefix)); // substr(#1,#2)=文字列(#1)の一部分(#2で指定された位置からの)を返す -> 「Controller\index」部分
    $classFIlePath = __DIR__ . '/../lib/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($classFIlePath)) {
      require $classFIlePath;
    }
  }
});
