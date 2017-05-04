<?php

// IndexとPostのW役割 じゃないかももう

namespace MyApp\Controller;

class Post extends \MyApp\Controller {
  public $progs;
  public $numOfCheckbox;

  public function __construct() {
    $this->_createToken();

    // $username = $this->me()->username;
    $groupid = $this->me()->groupid;

    parent::__construct();
  }

  public function run() {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      try {
        $res = $this->post();
        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
      } catch (Exception $e) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500); // HTTP/1.0 や HTTP/1.1 を返しつつエラーを表示
        echo $e->getMessage();
        exit;
      }
    }

  }

  public function post() { // 配列で返す
    $progModel = new \MyApp\Model\Recprog();

    $this->_validateToken();

    if (!isset($_POST['mode'])) {
      throw new Exception('mode not set!');
    }

    switch ($_POST['mode']) {
      case 'update':
        return $progModel->update();
      case 'create':
        return $progModel->create();
      case 'delete':
        return $progModel->delete();
    }
  }

  private function _createToken() {
    if (!isset($_SESSION['token'])) {
      $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
    }
  }

  private function _validateToken() {
    if (
      !isset($_SESSION['token']) ||
      !isset($_POST['token']) ||
      $_SESSION['token'] !== $_POST['token']
    ) {
      throw new \Exception('invalid token!');
    }
  }

}
