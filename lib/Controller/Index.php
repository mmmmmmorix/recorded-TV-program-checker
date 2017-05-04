<?php

namespace MyApp\Controller;

class Index extends \MyApp\Controller {

  public function run_index() {

    // if (!empty($_COOKIE['auto_login'])) {
    // 	$auto_login_key = $_COOKIE['auto_login'];
    // 
    //   $automodel = new \MyApp\Model\Auto_login();
    //   $is_auto_login = $automodel->autoLoginFetch($auto_login_key);
    //
    //   $autocontroller = new \MyApp\Controller\Auto_login();
    // 	if ( $is_auto_login !== false ) {
    // 		if (!empty( $auto_login_key)) {
    // 			$autocontroller->delete_auto_login( $auto_login_key );
    // 		}
    // 		$autocontroller->setup_auto_login( $is_auto_login['user_name'] );
    //
    // 	}
    // }


    if (!$this->isLoggedIn()) {
      // login
      header('Location: ' . SITE_URL . '/login.php');
      exit;
    }

    // //  get users info
    // $userModel = new \MyApp\Model\User();
    // $this->setValues('users', $userModel->findAll());

    // get recprogs & numOfCheckbox
    $progModel = new \MyApp\Model\Recprog();
    // $progs = $progModel->getAll();
    // $numOfCheckbox = $progModel->_getNumOfCheckbox();
    $this->setValues('progs', $progModel->getAll());
    $this->setValues('numOfCheckbox', $progModel->_getNumOfCheckbox());

    // get group_members
    $userModel = new \MyApp\Model\User();
    $groupid = $this->me()->groupid;
    $res = $userModel->getGroupMembers($groupid); // 配列
    $this->setValues('group_members', $res);

  }

}
