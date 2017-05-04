<?php

namespace MyApp\Model;

class Group extends \MyApp\Model {

  public function create($values) { // $valuesは配列でくる
    $stmt = $this->_db->prepare("insert into groups (groupid) values (:groupid)");

    try {
       $stmt->execute([
        ':groupid' => $values['groupid']
        // ':numOfCheckbox' => $values['numOfCheckbox']
      ]);
    } catch (\PDOException $e) {
      throw new \MyApp\Exception\DuplicateGroupid();
      return;
    }

    $stmt = $this->_db->prepare("insert into recprogs (title, groupid) value ('Sample Program 1', :groupid1), ('Sample Program 2', :groupid2)");
    $res = $stmt->execute([
      ':groupid1' => $values['groupid'],
      ':groupid2' => $values['groupid']
    ]);

  }

}
