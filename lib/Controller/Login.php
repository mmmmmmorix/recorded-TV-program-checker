<?php

namespace MyApp\Controller;

class Login extends \MyApp\Controller {

  public function run() {
    if ($this->isLoggedIn()) {
      header('Location: ' . SITE_URL);
      exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this -> _postProcess();
    }
  }

  protected function _postProcess() {
    try {
      $this->_validate();
    } catch (\MyApp\Exception\EmptyPost $e) { // EmptyPostという例外クラス
      $this->setErrors('login', $e->getMessage());
    }

    $this->setValues('username', $_POST['username']);

    if ($this->hasError()) {
      return;
    } else {
      try {
        $userModel = new \MyApp\Model\User();
        $user = $userModel->login([
          'username' => $_POST['username'],
          'password' => $_POST['password']
        ]);
      } catch (\MyApp\Exception\UnmatchUsernameOrPassword $e) {
        $this->setErrors('login', $e->getMessage());
        return;
      }

      // login処理
      session_regenerate_id(true); // 現在のセッションIDを新しく生成したものと置き換えて、古いセッションIDは消す(true)
      $_SESSION['me'] = $user; // セッションのmeにユーザー情報を入れる→meが存在かつmeが空でない、でログインを確認

      // // auto_login処理
      // $autocontroller = new \MyApp\Controller\Auto_login();
      // if (!empty($_COOKIE['auto_login'])) { // auto_loginクッキーあったら
      // 	$autocontroller->delete_auto_login($_COOKIE['auto_login']); // 一旦それを削除
      // }
      // if ($_POST['auto_login'] === 'auto_on') { // 自動ログインcheckedなら
      // 	$autocontroller->setup_auto_login($_POST['username']); // 新たにauto_loginクッキーをセット
      // }

      // redirect to home
      header('Location: ' . SITE_URL);
      exit;
    }
  }

  private function _validate() {
    if (!isset($_SESSION['token']) || $_POST['token'] !== $_SESSION['token']) { // トークンが合わない
      echo 'Invalid Token!';
      exit;
    }

    if (!isset($_POST['username']) || !isset($_POST['password'])) { // usernameかPasswordがセットされていない（？）
      echo 'Invalid Form!';
      exit;
    }

    if ($_POST['username'] === '' || $_POST['password'] === '') { // usernameかPasswordが未入力
      throw new \MyApp\Exception\EmptyPost();
    }
  }


}
