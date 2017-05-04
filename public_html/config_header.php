<!-- index.php以外のヘッダー -->

<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

        <a href="<?= h(SITE_URL); ?>/index.php">
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
        <li>
          <a href="<?= h(SITE_URL); ?>/login.php">ログイン</a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ヘルプ <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= h(SITE_URL); ?>/helps/howToUse.php">使い方</a></li>
            <li><a href="<?= h(SITE_URL); ?>/helps/autofill.php">ログインが面倒</a></li>
            <li><a href="<?= h(SITE_URL); ?>/helps/forgotPassword.php">パスワードを忘れた</a></li>
            <li><a href="<?= h(SITE_URL); ?>/helps/leaveGroup.php">グループから抜けたい</a></li>
            <li><a href="line://ti/p/@jjm0115n">お問合わせ(LINE@)</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
