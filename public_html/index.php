<?php

// PDO = PHP Data Object

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/config_html.php');

$indexObj = new \MyApp\Controller\Index();
$progApp = new \MyApp\Controller\Post();
// $progs にDBからのprog情報入れときます。Index()のrun()で。
// $numOfCheckboxもアリ

$indexObj->run_index();
$progApp->run();

$progs = $indexObj->getValues()->progs;
$numOfCheckbox = $indexObj->getValues()->numOfCheckbox['numOfCheckbox'];
$group_members = $indexObj->getValues()->group_members; // 配列

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <title>録画番組チェッカー</title>
</head>
<body>



  <!-- header -->

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">

          <a href="index.php">
            <button type="button" class="refresh-btn btn btn-default navbar-btn">
              <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
            </button>
          </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bootstrap-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">メニュー</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bootstrap-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a><?= h($progApp->me()->username); ?></a></li>
          <li>
            <form name="logout" action="logout.php" method="post">
              <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
            </form>
            <a href="logout.php" onclick="document.logout.submit();return false;">ログアウト</a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ヘルプ <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?= h(SITE_URL); ?>/helps/howToUse.php">使い方</a></li>
              <li><a href="<?= h(SITE_URL); ?>/helps/autoLogin.php">ログインが面倒</a></li>
              <li><a href="<?= h(SITE_URL); ?>/helps/forgotPassword.php">パスワードを忘れた</a></li>
              <li><a href="<?= h(SITE_URL); ?>/helps/leaveGroup.php">グループから抜けたい</a></li>
              <li><a href="line://ti/p/@jjm0115n">お問合わせ(LINE@)</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>


  <!-- container -->
  <div class="container col-lg-offset-3 col-lg-6 col-lg-offset-3">

    <h1 class="text-center">
      <small class="text-center">
        <span id="groupid"><?= h($progApp->me()->groupid); ?></span> 's
      </small><br>
      録画番組チェッカー
    </h1>

    <form action="" id="new_prog_form">
      <input type="text" id="new_prog" class="form-control center-block" placeholder="番組名は？">
    </form>

    <button id="deleteAtOnce" type="button" class="btn btn-default">まとめて削除</button>
    <button id="deleteAtOnce2" type="button" class="btn btn-default" style="display: none;">削除！</button>

    <ul id="progs" class="list-unstyled list-group">
    <?php $cbarr = ['cb1','cb2','cb3','cb4','cb5','cb6','cb7','cb8','cb9','cb10'];
      foreach ((array)$progs as $prog) :
      $state_arr = [$prog->state_1, $prog->state_2, $prog->state_3, $prog->state_4, $prog->state_5, $prog->state_6, $prog->state_7, $prog->state_8, $prog->state_9, $prog->state_10];?>
      <li id="prog_<?= h($prog->id); ?>" data-id="<?= h($prog->id); ?>" class="">
        <?php for ($i=1; $i <= $numOfCheckbox; $i++) :?>
          <label class="<?= h($cbarr[$i-1]); ?> cbs">
            <input type="checkbox" class="update_prog" data-state-num="<?= h($i); ?>" <?php if ($state_arr[$i-1] === 1) {echo 'checked';} if ($group_members[$i-1]->username !== $progApp->me()->username) {echo ' disabled';}?>>
          </label>
        <?php endfor; ?>
        <span class="prog_title"><?= h($prog->title); ?></span><!--done付け問題-->
        <button type="button" class="delete_prog close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <input type="checkbox" class="delete_checkbox" style="display: none;"></input>
      </li>
    <?php endforeach; ?>
    <?php $state_arr=[0,0,0,0,0,0,0,0,0,0]; ?>
      <li id="prog_template" data-id=""> <!--このliはcssで非表示にされてる-->
        <?php for ($i=1; $i <= $numOfCheckbox; $i++) : ?>
          <label class="<?= h($cbarr[$i-1]); ?> cbs">
            <input type="checkbox" class="update_prog" data-state-num="<?= h($i); ?>" <?php if ($state_arr[$i-1] === 1) {echo 'checked'; } if ($group_members[$i-1]->username !== $progApp->me()->username) {echo ' disabled';} ?>>
          </label>
        <?php endfor; ?>
        <span class="prog_title"></span>
        <button type="button" class="delete_prog close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <input type="checkbox" class="delete_checkbox" style="display: none;"></input>
      </li>
    </ul>

    <table class="table-condensed group_members">
      <?php for ($i=1; $i <= $numOfCheckbox; $i++) :?>
        <tr>
          <td><label class="<?= h($cbarr[$i-1]); ?> members_cbs"></label></td>
          <td class="fs12"> - </td>
          <td class="fs12"><?= h($group_members[$i-1]->username); ?></td>
        </tr>
      <?php endfor; ?>
    </table>

  </div>
  <input type="hidden" id="token" value="<?= h($_SESSION['token']); ?>"> <!--トークン送信！-->



</body>
</html>
