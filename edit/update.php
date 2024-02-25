<?php
  $path = '../../';

  require $path.'libs/function.php';
  require_once $path.'class/connectDB.php';

  $userInfo = $_POST;

  dataValidate($userInfo);
  $dbc = new Dbc();
  $dbc->userInfoUpdate($userInfo);

  $title = 'Lesson Sample Site';
  $description = '説明(完了ページ)';
  include $path . 'inc/head.php';
  ?>
  </head>
  <body>
  <?php   include $path . 'inc/nav.php'; ?>
  <?php   include $path . 'inc/modal.php'; ?>
<p><a href="../contact.php">戻る</a></p>