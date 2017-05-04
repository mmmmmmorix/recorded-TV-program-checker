<?php

// ログイン

require_once(__DIR__ . '/../config/config.php');

$app = new MyApp\Controller\Login();

$app->run();

?>
<!DOCTYPE html>

<html lang="ja">
<head>
  <?php require_once(__DIR__ . '/config_html.php'); ?>
  <title>ログイン - 録画番組チェッカー</title>
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

    <form action="" method="post" id="login">
      <div class="text-center">
        <p>
          <input type="text" name="username" placeholder="username"  value="<?= isset($app->getValues()->username) ? h($app->getValues()->username) : ''; ?>">
        </p>
        <p>
          <input type="password" name="password" placeholder="password">
        </p>
        <p class="fs12">
          <input type="checkbox" name="auto_login" value="auto_on"> 次回から自動ログイン(実装中✋)
        </p>

        <p class="err"><?= h($app->getErrors('login')); ?></p>
        <button class="btn btn-info">ログイン</button>
        <p class="fs12"><a href="<?= h(SITE_URL); ?>/create_user.php">アカウントを新規作成</a></p>
        <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
      </div>
    </form>


  </div>

</body>
</html>
