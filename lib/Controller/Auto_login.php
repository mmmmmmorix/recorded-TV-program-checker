<?php

// namespace MyApp\Controller;
//
// class Auto_login extends \MyApp\Controller {
//
//   public function setup_auto_login($username) {
//     $cookieName = 'auto_login';
//     $auto_login_key = sha1(uniqid() . mt_rand(1,999999999) . '_auto_login');
//     $cookieExpire = time() + 60 * 60 * 24 * 7; // 7日間
//
//     $automodel = new \MyApp\Model\Auto_login();
//     $automodel->autoLoginSet($username, $auto_login_key);
//
//     setcookie($cookieName, $auto_login_key, $cookieExpire);
//   }
//
//   public function delete_auto_login($auto_login_key = '') {
//     $automodel = new \MyApp\Model\Auto_login();
//     $automodel->autoLoginDelete($_SESSION['me']->username);
//
//     $cookieName = 'auto_login';
//     $cookieExpire = time() - 1800; // 過去、つまり削除
//
//     setcookie($cookieName, $auto_login_key, $cookieExpire);
//   }
//
// 
// }
