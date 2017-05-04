<?php

// サインアップ(group)

require_once(__DIR__ . '/../config/config.php');

$appg = new MyApp\Controller\Create_group();

$appg->run_g();


?>
<!DOCTYPE html>

<html lang="ja">
<head>
  <?php require_once(__DIR__ . '/config_html.php'); ?>
  <title>グループ新規作成 - 録画番組チェッカー</title>
</head>
<body>


  <?php require_once(__DIR__ . '/config_header.php'); ?>


  <!-- header -->
  <!-- <div id="header">
    <a href="index.php"><button type="submit" class="btn btn-info btn-xs headerBtn pull-right">HOME</button></a>
  </div> -->

  <!-- container -->
  <div class="container col-lg-offset-3 col-lg-6 col-lg-offset-3">

    <h1 class="text-center">
      録画番組チェッカー
    </h1>

    <form action="" method="post" id="create_group">
      <div class="text-center">
        <p>
          <input type="text" name="groupid" placeholder="groupID(ex.Morimori)" value="<?= isset($appg->getValues()->groupid) ? h($appg->getValues()->groupid) : ''; ?>">
        </p>
        <p class="err"><?= h($appg->getErrors('groupid')); ?></p>
        <p>
          <input type="text" name="username" placeholder="your username" value="<?= isset($appg->getValues()->username) ? h($appg->getValues()->username) : ''; ?>">
        </p>
        <p class="err"><?= h($appg->getErrors('username')); ?></p>
        <p>
          <input type="password" name="password" placeholder="your password">
        </p>
        <p class="err"><?= h($appg->getErrors('password')); ?></p>
        <p class="err"><?= h($appg->getErrors('create_group')); ?></p>
        <button class="btn btn-info">グループを新規作成</button>
        <p class="fs12"><a href="<?= h(SITE_URL); ?>/login.php">ログイン</a></p>
        <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
      </div>
    </form>

  </div>
</body>
</html>
