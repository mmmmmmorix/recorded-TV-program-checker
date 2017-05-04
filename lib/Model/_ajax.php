<?php

// prog.js より。
// ここでは、post()メソッドによりjson形式のprogsデータを吐く。また、その過程でエラーがあればエラーを吐く。

ini_set('display_errors',1); // エラー表示

require_once(__DIR__ . '/../../config/config.php');
// require_once(__DIR__ . '/Recprog.php');

$progApp = new \MyApp\Controller\Post();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $res = $progApp->post(); // $resは配列でくる
    header('Content-Type: application/json');
    echo json_encode($res);
    exit;
  } catch (Exception $e) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500); // HTTP/1.0 や HTTP/1.1 を返しつつエラーを表示
    echo $e->getMessage();
    exit;
  }
}
