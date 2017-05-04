<?php

namespace MyApp\Controller;

class Create_user extends \MyApp\Controller {

  public function run_u() {
    if ($this->isLoggedIn()) {
      header('Location: ' . SITE_URL);
      exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this -> _postProcess();
    }
  }

  protected function _postProcess() {
    // validate
    try {
      $this->_validate();
    } catch (\MyApp\Exception\EmptyPost $e) {
      $this->setErrors('create_user', $e->getMessage());
    } catch (\MyApp\Exception\InvalidPassword $e) {
      $this->setErrors('password', $e->getMessage());
    }

    $this->setValues('groupid', $_POST['groupid']);
    $this->setValues('username', $_POST['username']);

    if ($this->hasError()) {
      return;
    } else {

      // create user
      try {
        $userModel = new \MyApp\Model\User();
        $userModel->create([
          'createFrom' => 'create_user',
          'groupid' => $_POST['groupid'],
          'username' => $_POST['username'],
          'password' => $_POST['password']
        ]);
      } catch (\MyApp\Exception\NotExistGroupid $e) {
        $this->setErrors('create_user', $e->getMessage());
        return;
      } catch (\MyApp\Exception\DuplicateUsername $e) {
        $this->setErrors('username', $e->getMessage());
        return;
      }

      // redirect to login
      header('Location: ' . SITE_URL . '/login.php');
      exit;
    }
  }

  private function _validate() {
    if (!isset($_SESSION['token']) || $_POST['token'] !== $_SESSION['token']) {
      echo 'Invalid Token!';
      exit;
    }

    if ($_POST['groupid'] === '' || $_POST['username'] === '' || $_POST['password'] === '') { // groupidかusernameかpasswordが未入力
      throw new \MyApp\Exception\EmptyPost();
    }

    if (!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['password'])) { // 正規表現(英数字オンリー)
      throw new \MyApp\Exception\InvalidPassword();
    }
  }

}
