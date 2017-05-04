<?php

namespace MyApp\Model;

class Auto_login extends \MyApp\Model {

  public function autoLoginSet($username, $auto_login_key) {
    $stmt = $this->_db->prepare("insert into auto_login (username, auto_login_key) values (:username, :auto_login_key)");

    try {
       $stmt->execute([
        ':username' => $username,
        ':auto_login_key' => $auto_login_key
      ]);
    } catch (\PDOException $e) {
      throw new \MyApp\Exception\DuplicateUsernameAutoLogin();
      return;
    }
  }

  public function autoLoginDelete($username) {
    $stmt = $this->_db->prepare("delete from auto_login where username = :username");

    try {
       $stmt->execute([
        ':username' => $username
      ]);
    } catch (\PDOException $e) {
      throw new \MyApp\Exception\AutoLoginDelete();
      return;
    }
  }

  public function autoLoginFetch($auto_login_key) {
    $stmt = $this->_db->prepare("select * from auto_login where auto_login_key = :auto_login_key");

    try {
       $res = $stmt->execute([
        ':auto_login_key' => $auto_login_key
      ]);
      return $res;
    } catch (\PDOException $e) {
      throw new \MyApp\Exception\AutoLoginFetch();
      return;
    }


  }

}
