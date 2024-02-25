<?php
    $path = '../../';
    require $path.'libs/function.php';
    require_once $path.'class/connectDB.php';
    $dbc = new Dbc();
    $result = $dbc->getById($_GET['id']);
  
    $id = $result['id'];
    $name = $result['name'];
    $kana = $result['kana'];
    $tel = $result['tel'];
    $email = $result['email'];
    $body = $result['body'];

    $title = 'Lesson Sample Site';
    $description = '説明(完了ページ)';
    include $path . 'inc/head.php';
    ?>
    </head>
    <body>
    <?php   include $path . 'inc/nav.php'; ?>
    <?php   include $path . 'inc/modal.php'; ?>
  <h2>ユーザー情報編集フォーム</h2>
  <form class="vertical-table" action="./update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <table class="vertical-table__inner">
      <thead class="vertical-table__headers">
        <tr class="vertical-table__header-row">
        <th class="vertical-table__header">ID</th>
            <th class="vertical-table__header">名前</th>
            <th class="vertical-table__header">カナ</th>
            <th class="vertical-table__header">TEL</th>
            <th class="vertical-table__header">E-mail</th>
            <th class="vertical-table__header">問い合わせ内容</th>
        </tr>
      </thead>
      <tbody class="vertical-table__body">
        <tr class="vertical-table__body-row">
          <td class="vertical-table__text"><?php echo h($id); ?></td>
          <td class="vertical-table__text">
            <input class="name required maxlength form__user-data" data-maxlength="10" type="text" name="name" id="name" maxlength="10" placeholder="山田太郎" data-error-required="お名前は必須です。" value="<?php echo h($name); ?>">
          </td>
          <td class="vertical-table__text">
            <input class="kana required maxlength form__user-data" data-maxlength="10" type="text" name="kana" id="kana" maxlength="10" required placeholder="ヤマダタロウ" data-error-required="フリガナは必須です。" value="<?php echo h($kana); ?>">
          </td>
          <td class="vertical-table__text">
            <input class="tel form__user-data" type="tel" name="tel" id="tel" placeholder="09012345678" data-pattern="tel" data-error-pattern="電話番号の形式が正しくないようですのでご確認ください"  value="<?php echo h($tel); ?>">
          </td>
          <td class="vertical-table__text">
            <input class="required email form__user-data" type="email" id="email" name="email" placeholder="test@test.co.jp" data-error-required="Email アドレスは必須です。"  data-error-pattern="Email の形式が正しくないようですのでご確認ください" value="<?php echo h($email); ?>">
          </td>
          <td class="vertical-table__text">
            <textarea class="required  form__user-data"  name="body" id="body" rows="5" cols="50"><?php echo h($body); ?></textarea>
          </td>
        </tr>
      </tbody>
    </table>
    <button id="submit" name="send" >更新</button>
    <a href="../contact.php">戻る</a>
  </form>
  <!-- /.vertical-table -->
</body>
</html>