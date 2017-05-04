<?php

namespace MyApp\Model;

class Recprog extends \MyApp\Model {

  public function update() {
    if (!isset($_POST['id'])) {
      throw new \Exception('[update] id not set!');
    }
    if (!isset($_POST['stateNum'])) {
      throw new \Exception('[update] stateNum not set!');
    }

    $this->_db->beginTransaction();

    $sql = sprintf("update recprogs set state_%d = (state_%d + 1) %% 2 where id = %d", $_POST['stateNum'], $_POST['stateNum'], $_POST['id']);
    $stmt = $this->_db->prepare($sql); // prepare()=値部分にパラメータを付けて実行待ち
    $stmt->execute(); // execute()=準備したprepareに入っているSQL文を実行

    $sql = sprintf("select state_%d from recprogs where id = %d", $_POST['stateNum'], $_POST['id']);
    $stmt = $this->_db->query($sql); // query()=prepareを使わずにSQL文を実行
    $state = $stmt->fetchColumn(); // selectでoutputされたstate_pフィールドから単一カラムをとって来る

    $this->_db->commit();

    switch ($_POST['stateNum']) {
      case 1:
        return [
          'state_1' => $state
        ];
        break;
      case 2:
        return [
          'state_2' => $state
        ];
        break;
      case 3:
        return [
          'state_3' => $state
        ];
        break;
      case 4:
        return [
          'state_4' => $state
        ];
        break;
      case 5:
        return [
          'state_5' => $state
        ];
        break;
      case 6:
        return [
          'state_6' => $state
        ];
        break;
      case 7:
        return [
          'state_7' => $state
        ];
        break;
      case 8:
        return [
          'state_8' => $state
        ];
        break;
      case 9:
        return [
          'state_9' => $state
        ];
        break;
      case 10:
        return [
          'state_10' => $state
        ];
        break;
    }

  }

  public function create() {
    if (!isset($_POST['title']) || $_POST['title'] === '') {
      throw new Exception('[create] title not set!');
    }

    $sql = "insert into recprogs (title, groupid) value (:title, :groupid)";
    $stmt = $this->_db->prepare($sql);
    $stmt->execute([
      ':title' => $_POST['title'],
      ':groupid' => $_POST['groupid']
    ]);

    return [
      'id' => $this->_db->lastInsertId() // 最後に挿入された行のidの値を返す
    ];
  }

  public function delete() {
    if (!isset($_POST['id'])) {
      throw new Exception('[delete] id not set!');
    }

    $sql = sprintf("delete from recprogs where id = %d", $_POST['id']);
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();

    return [];
  }


  public function getAll() {
    $stmt = $this->_db->prepare("select * from recprogs where groupid = :groupid order by id desc"); // stmt =statement 常に新しいものが上に来るようにして引っ張ってくる
    $stmt -> execute([
      ':groupid' => $_SESSION['me']->groupid
    ]);
    return $stmt->fetchAll(\PDO::FETCH_OBJ); //オブジェクト形式(階層)で返るようにする
  }


  public function _getNumOfCheckbox() {
    $stmt = $this->_db->prepare("select numOfCheckbox from groups where groupid = :groupid");
    $stmt -> execute([
      ':groupid' => $_SESSION['me']->groupid
    ]);
    return $stmt->fetch();
  }


}
