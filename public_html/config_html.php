<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui"><!--これでモバイル対応-->
<!-- minimal-ui 追加しました -->

<!-- ホーム画面のアイコンから開いたとき、フルスクリーンモード -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="styles.css" rel="stylesheet">

<!-- Ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="prog.js"></script>
<!-- bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- ファビコン -->
<link rel="shortcut icon" href="<?= h(SITE_URL); ?>/images/favicon.ico">

<!-- google analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90831414-2', 'auto');
  ga('send', 'pageview');

</script>
