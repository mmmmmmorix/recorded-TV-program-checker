<?php

namespace MyApp\Controller;

class Create_group extends \MyApp\Controller {

  public function run_g() {
    if ($this->isLoggedIn()) {
      header('Location: ' . SITE_URL);
      exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->postProcess();
    }
  }

  protected function postProcess() {
    // validate
    try {
      $this->_validate();
    } catch (\MyApp\Exception\InvalidGroupid $e) {
      $this->setErrors('groupid', $e->getMessage());
    } catch (\MyApp\Exception\EmptyPost $e) {
      $this->setErrors('create_group', $e->getMessage());
    // } catch (\MyApp\Exception\EmptyNumOfCheckbox $e) {
    //   $this->setErrors('numOfCheckbox', $e->getMessage());
    } catch (\MyApp\Exception\InvalidPassword $e) {
      $this->setErrors('password', $e->getMessage());
      return;
    }

    $this->setValues('groupid', $_POST['groupid']);
    $this->setValues('username', $_POST['username']);
    // if (isset($_POST['numOfCheckbox'])) {
    //   $this->setValues('numOfCheckbox', $_POST['numOfCheckbox']);
    // }

    if ($this->hasError()) {
      return;
    } else {

      // create group
      try {
        $groupModel = new \MyApp\Model\Group();
        $groupModel->create([
          'groupid' => $_POST['groupid']
          // 'numOfCheckbox' => $_POST['numOfCheckbox'],
        ]);
      } catch (\MyApp\Exception\DuplicateGroupid $e) {
        $this->setErrors('groupid', $e->getMessage());
        return;
      }

      // create a user
      try {
        $userModel = new \MyApp\Model\User();
        $userModel->create([
          'createFrom' => 'create_group',
          'groupid' => $_POST['groupid'],
          'username' => $_POST['username'],
          'password' => $_POST['password']
        ]);
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
    if (!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['groupid'])) { // 正規表現(英数字オンリー)
      throw new \MyApp\Exception\InvalidGroupid();
    }
    if ($_POST['groupid'] === '' || $_POST['username'] === '' || $_POST['password'] === '') {
      throw new \MyApp\Exception\EmptyPost();
    }
    // if (!isset($_POST['numOfCheckbox']) || $_POST['numOfCheckbox'] === null) {
    //   throw new \MyApp\Exception\EmptyNumOfCheckbox();
    // }
    if (!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['password'])) { // 正規表現(英数字オンリー)
      throw new \MyApp\Exception\InvalidPassword();
    }


  }

  // public function checkSelected($instance, $num) {
  //   if (isset($instance->getValues()->numOfCheckbox) && $instance->getValues()->numOfCheckbox===$num) {
  //     echo('selected');
  //   }
  // }
}
