<?php

namespace MyApp\Model;

class User extends \MyApp\Model {

  public function create($values) { // $valuesは配列でくる

    // GroupIDが存在するものか否か(Create_groupからでなければ)判定
    if ($values['createFrom'] !== 'create_group') {
      $stmt = $this->_db->prepare("select * from groups where groupid = :postgroupid"); // 文字列だけど''は不要でした！
      $stmt->execute([
        ':postgroupid' => $values['groupid']
      ]);
      $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass'); // FetchModeをFETCH_CLASSにして、
      $res = $stmt->fetchAll(); // fetch()。
        // 以下４行はテスト用
      // echo 'hello1-'.$values['groupid'].'-hello';
      // var_dump($res);
      // echo 'hello2-'.$values['groupid'].'-hello';
      // exit;
      if (empty($res)) {
        throw new \MyApp\Exception\NotExistGroupid();
        exit;
      }
    }

    // 登録作業
    $stmt = $this->_db->prepare("insert into users (groupid, username, password) values (:groupid, :username, :password)");
    try {
       $stmt->execute([
        ':groupid' => $values['groupid'],
        ':username' => $values['username'],
        ':password' => password_hash($values['password'], PASSWORD_DEFAULT)
      ]);
    } catch (\PDOException $e) {
      throw new \MyApp\Exception\DuplicateUsername();
    }

    // numOfCheckbox++する
    $stmt = $this->_db->prepare("update groups set numOfCheckbox = numOfCheckbox + 1 where groupid = :groupid");
    $stmt->execute([
     ':groupid' => $values['groupid']
    ]);

  }

  public function login($values) { // $valuesは配列でくる
    $stmt = $this->_db->prepare("select * from users where username = :username");
    $stmt->execute([
      ':username' => $values['username']
    ]);
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    $user = $stmt->fetch(); // selectで返った情報を$userに格納

    if (empty($user)) { // $userが空の場合 === 入力されたgroupid-usernameのペアが登録されてなかった場合
      throw new \MyApp\Exception\UnmatchUsernameOrPassword();
    }

    if (!password_verify($values['password'], $user->password)) {
      // 入力したパスワードと、入力したemailに対して返った(password_hashで作った)パスワードを、一致してるか検証
      throw new \MyApp\Exception\UnmatchUsernameOrPassword();
    }

    return $user;
  }


  public function getGroupMembers($groupid) {
    $stmt = $this->_db->prepare("select username from users where groupid = :groupid order by id");
    $stmt->execute([
      ':groupid' => $groupid
    ]);
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll(); // selectで返った情報を返す(配列で)
  }

}
