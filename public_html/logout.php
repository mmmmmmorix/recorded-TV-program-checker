<?php

// ログアウト

require_once(__DIR__ . '/../config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // トークン関係
  if (!isset($_SESSION['token']) || $_POST['token'] !== $_SESSION['token']) { // トークンが合わない
    echo 'Invalid Token!';
    exit;
  }

  // session関係
  $_SESSION = []; // セッションを空に
  if (isset($_COOKIE[session_name()])) { // sessionを管理するクッキーがセットされてたら
    setcookie(session_name(), '', time() - 86400, '/'); // 削除
  }
  session_destroy();

  // // auto_login関係
  // $autocontroller = new \MyApp\Controller\Auto_login();
  // if (!empty($_COOKIE['auto_login'])) {
  // 	$autocontroller->delete_auto_login($_COOKIE['auto_login']);
  // }

}

header('Location: ' . SITE_URL);
