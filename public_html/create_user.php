<?php

// サインアップ(user)

require_once(__DIR__ . '/../config/config.php');

$app = new MyApp\Controller\Create_user();

$app->run_u();

?>
<!DOCTYPE html>

<html lang="ja">
<head>
  <?php require_once(__DIR__ . '/config_html.php'); ?>
  <title>アカウント新規作成 - 録画番組チェッカー</title>
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

    <form action="" method="post" id="create_user">
      <div class="text-center">
        <p>
          <input type="text" name="groupid" placeholder="共通groupID(ex.Morimori)" value="<?= isset($app->getValues()->groupid) ? h($app->getValues()->groupid) : ''; ?>">
        </p>
        <p class="err"><?= h($app->getErrors('groupid')); ?></p>
        <p>
          <input type="text" name="username" placeholder="username" value="<?= isset($app->getValues()->username) ? h($app->getValues()->username) : ''; ?>">
        </p>
        <p class="err"><?= h($app->getErrors('username')); ?></p>
        <p>
          <input type="password" name="password" placeholder="password">
        </p>
        <p class="err"><?= h($app->getErrors('password')); ?></p>
        <p class="err"><?= h($app->getErrors('create_user')); ?></p>
        <button class="btn btn-info">アカウントを新規作成</button>
        <p class="fs12"><a href="<?= h(SITE_URL); ?>/create_group.php">グループを新規作成</a></p>
        <p class="fs12"><a href="<?= h(SITE_URL); ?>/login.php">ログイン</a></p>
        <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
      </div>
    </form>

  </div>
</body>
</html>
