<?php
  $path = '../../';
  require_once $path.'class/connectDB.php';

  $dbc = new Dbc();
  $id = $_POST['id'];

  $result = $dbc->userInfoDelete($id);

  
  $title = 'Lesson Sample Site';
  $description = '説明(完了ページ)';
  include $path . 'inc/head.php';
  ?>
  </head>
  <body>
  <?php   include $path . 'inc/nav.php'; ?>
  <?php   include $path . 'inc/modal.php'; ?>
<p><a href="../contact.php">戻る</a></p>
