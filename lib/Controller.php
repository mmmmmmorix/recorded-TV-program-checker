<?php

namespace MyApp;

class Controller {

  private $_errors; // エラー情報の親玉、幹
  private $_values; // value情報の親玉、幹

  public function __construct() {
    if (!isset($_SESSION['token'])) {
      $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));//32桁の文字列作る
    }
    $this->_errors = new \stdClass();
    $this->_values = new \stdClass();
    //standardクラス、PHP デフォルトのクラスで宣言することなくいきなり new して使うことができる特殊なオブジェクト、オブジェクト型（ツリー構造）のデータをさっと作りたい時に便利、初期化
  }

  protected function setValues($key, $value) {
    $this->_values->$key = $value; //代入かこれ
  }

  public function getValues() {
    return $this->_values;
  }

  protected function setErrors($key, $error) {
    $this->_errors->$key = $error; //代入かこれ
  }

  public function getErrors($key) {
    return isset($this->_errors->$key) ? $this->_errors->$key : '';
    // 条件式 ? 真の場合 : 偽の場合; (三項演算子)
  }

  protected function hasError() {
    return !empty(get_object_vars($this->_errors)); // プロパティ(ツリーの枝的な？)の有無、T or F
  }

  protected function isLoggedIn() {
      // $_SESSION['me']
      // セッションに me というキーで情報を保持して、その中身を見てログインしているかを判定
      return isset($_SESSION['me']) && !empty($_SESSION['me']); // TorFで？
  }

  public function me() {
    return $this->isLoggedIn() ? $_SESSION['me'] : null;
    // $_SESSION['me']はログインするときにセットしてる
  }

}
