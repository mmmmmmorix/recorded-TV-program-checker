<?php require_once(__DIR__ . '/../../config/config.php'); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php require_once(__DIR__ . '/../config_html.php'); ?>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="../styles.css" rel="stylesheet">
  <script src="../bootstrap/js/bootstrap.min.js"></script>

  <title>使い方 - 録画番組チェッカー</title>
</head>
<body>
  <div class="container">
    <h1>超使い方!!</h1>

    <br>
    <div class="fs12">その前に</div>

    <div class="container">
      <h2><span class="glyphicon glyphicon-thumbs-up fs18" aria-hidden="true"></span> このアプリの良いところ</h2>
      <ul>
        <li>自分が観たい番組を他の人に勝手に消されることがなくなる</li>
        <li>他の人が観たい番組を自分が勝手に消して怒られることがなくなる</li>
        <li>いつでもどこでもチェックできるから、録画番組を消すときにテレビの前にみんなが集まる必要が無い</li>
        <li>スマホ用アプリではないけど、「ホーム画面に追加」すればそれっぽい</li>
        <li>使い方がシンプルかつデザインがシンプル</li>
      </ul>
    </div>

    <div class="container">
      <h2><span class="glyphicon glyphicon-thumbs-down fs18" aria-hidden="true"></span> このアプリの悪いところ</h2>
      <ul>
        <li><span class="fs12">（番組名の追加・削除などもろもろ）</span>全手動!!!!!</li>
      </ul>
    </div>


    <br><br>
    <img src="<?= h(SITE_URL); ?>/images/checkbox_unchecked.png" alt="" class="center-block">
    <br>
    <img src="<?= h(SITE_URL); ?>/images/smartphone_boy_stand_smile.png" alt="" class="center-block">
    <br>
    <img src="<?= h(SITE_URL); ?>/images/checkbox_checked.png" alt="" class="center-block">
    <br><br>


    <div class="container">
      <h2><span class="glyphicon glyphicon-ice-lolly fs18" aria-hidden="true"></span> はじめかた</h2>
      <!-- <ol>
        <li><a href="../create_group.php">グループの新規作成</a>画面から『グループ』を作りましょう（グループ作成者はここでアカウントも作成済みになります。<a href="../login.php">ログイン</a>してみましょう！）</li>
        <li>登録したgroupIDをもとに、グループの他のメンバーも<a href="../create_user.php">アカウント登録</a>します</li>
        <li>メンバー全員がアカウント登録できたら『録画番組チェッカー』は完成！</li>
        <li>さっそく<a href="../login.php">ログイン</a>して、レコーダーに録れている番組を追加してみましょう！</li>
      </ol> -->

      <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">step 1</h3>
          </div>
          <div class="panel-body">
            <div class="thumbnail">
              <img src="<?= h(SITE_URL); ?>/images/create_group_1.jpg" alt="">
            </div>
            <div class="thumbnail">
              <img src="<?= h(SITE_URL); ?>/images/create_group_2.jpg" alt="">
            </div>
            <p>
              <a href="../create_group.php">グループの新規作成</a>画面から、『録画番組チェッカー』を共用する『グループ』を作りましょう（グループ作成者はここでアカウントも作成済みになります。<a href="../login.php">ログイン</a>してみましょう！）
            </p>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">step 2</h3>
          </div>
          <div class="panel-body">
            <div class="thumbnail">
              <img src="<?= h(SITE_URL); ?>/images/create_user_1.jpg" alt="">
            </div>
            <div class="thumbnail">
              <img src="<?= h(SITE_URL); ?>/images/create_user_2.jpg" alt="">
            </div>
            <p>
              登録したgroupIDをもとに、グループの他のメンバーも<a href="../create_user.php">アカウント登録</a>します。メンバー全員がアカウント登録できたら『録画番組チェッカー』は完成！さっそく<a href="../login.php">ログイン</a>してみましょう！
            </p>
          </div>
        </div>
      </div>
    </div>




    <div class="container">
      <h2><span class="glyphicon glyphicon-ice-lolly-tasted fs18" aria-hidden="true"></span> つかいかた</h2>
      <!-- <ol>
        <li>番組がレコーダーに録画される</li>
        <li>「番組名は？」から録画された番組を登録！</li>
        <li>自分が「レコーダーから削除してもOK」と思った番組を <span class="glyphicon glyphicon-check" aria-hidden="true"></span></li>
        <li>同じグループの全員が <span class="glyphicon glyphicon-check" aria-hidden="true"></span> した番組は、録画番組チェッカーからもレコーダーからも削除してOK！</li>
      </ol> -->

      <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">step 1</h3>
          </div>
          <div class="panel-body">
            <p>
              番組がレコーダーに録画されたら、
            </p>
            <div class="thumbnail">
              <img src="<?= h(SITE_URL); ?>/images/yet.jpg" alt="">
            </div>
            <div class="thumbnail">
              <img src="<?= h(SITE_URL); ?>/images/filled.jpg" alt="">
            </div>
            <div class="thumbnail">
              <img src="<?= h(SITE_URL); ?>/images/added.jpg" alt="">
            </div>
            <p>
              「番組名は？」から録画された番組を追加登録！
            </p>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">step 2</h3>
          </div>
          <div class="panel-body">
            <div class="thumbnail">
              <img src="<?= h(SITE_URL); ?>/images/checked.jpg" alt="">
            </div>
            <p>
              自分が「レコーダーから削除してもOK」と思った番組に <span class="glyphicon glyphicon-check" aria-hidden="true"></span>する
            </p>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">step 3</h3>
          </div>
          <div class="panel-body">
            <div class="thumbnail">
              <img src="<?= h(SITE_URL); ?>/images/all_checked.jpg" alt="">
            </div>
            <p>
              グループの全員が <span class="glyphicon glyphicon-check" aria-hidden="true"></span> した番組は、録画番組チェッカーからもレコーダーからも削除してOK！というルール
            </p>
          </div>
        </div>
      </div>
    </div>



    <br><br>
      <a type="button" class="btn btn-info btn-block center-block" href="<?= h(SITE_URL); ?>">はじめる！</a>
    <br><br>


    <footer></footer>

  </div>
</body>
</html>
