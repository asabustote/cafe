<?php
  session_start();
  session_regenerate_id(true);
  $path = '../';

  require $path.'libs/function.php';

  //セッション変数を初期化
  $name    = $_SESSION['name'] ?? NULL;
  $kana    = $_SESSION['kana'] ??  NULL;
  $email   = $_SESSION['email'] ?? NULL;
  $tel     = $_SESSION['tel'] ??  NULL;
  $inquiry = $_SESSION['inquiry'] ??  NULL;
  $error   = $_SESSION['error'] ?? NULL;

  //個々のエラーを初期化
  $error_name    = $error['name'] ?? "";
  $error_kana    = $error['kana'] ?? "";
  $error_email   = $error['email'] ?? "";
  $error_tel     = $error['tel'] ?? "";
  $error_inquiry = $error['inquiry'] ?? "";

  //CSRF対策のトークンを生成
  if(!isset($_SESSION['tiket'])) {
    $_SESSION[ 'ticket' ] = bin2hex(random_bytes(32));
  }
  $ticket = $_SESSION[ 'ticket'];

  //select user data from db
  require $path.'class/connectDB.php';
  $dbc = new Dbc();
  $userData = $dbc->getAllData();


  $title = 'Lesson Sample Site';
  $description = '説明(お問い合せページ)';
  include $path . 'inc/head.php';
?>
</head>
<body>
<?php   include $path . 'inc/nav.php'; ?>
<?php   include $path . 'inc/modal.php'; ?>
  <main class="contents">
    <secton class="content contact contact_2">
      <h5 class="level5-heading heading-contact">
        お問い合わせ
      </h5>
      <form name="myForm" class="validationForm contact__form" action="confirm.php" method="post" novalidate>
        <h3 class="level3-heading">
          下記の項目をご記入の上送信ボタンを押してください
        </h3>
        <p class="form__text">
          送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。
        </p>
        <p class="form__text">
          なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。
        </p>
        <p class="form__text">
          <span class="warning">*</span>は必須項目となります。
        </p>
        <div class="form__data-list">
           <div class="form__data">
              <label for="name">名前
                <span class="warning error-php">*<?php echo h( $error_name );?></span>
              </label>
              <input class="name required maxlength form__user-data" data-maxlength="10" type="text" name="name" id="name" maxlength="10" placeholder="山田太郎" data-error-required="お名前は必須です。" value="<?php echo h($name); ?>">
            </div>
            <!-- /.form__data -->
          <div class="form__data">
            <lavel for="kana">フリガナ
              <span class="warning error-php">*<?php echo h( $error_kana ); ?></span>
            </lavel>
            <input class="kana required maxlength form__user-data" data-maxlength="10" type="text" name="kana" id="kana" maxlength="10" required placeholder="ヤマダタロウ" data-error-required="フリガナは必須です。" value="<?php echo h($kana); ?>">
          </div>
          <!-- /.form__data -->
          <div class="form__data">
            <label for="tel">
              電話番号
              <span class="warning error-php">*<?php echo h( $error_tel ); ?></span>
            </label>
            <input class="tel form__user-data" type="tel" name="tel" id="tel" placeholder="09012345678" data-pattern="tel" data-error-pattern="電話番号の形式が正しくないようですのでご確認ください"  value="<?php echo h($tel); ?>">
            </div>
            <!-- /.form__data -->
            <div class="form__data">
              <label for="email">メールアドレス
                <span class="warning">*<?php echo h( $error_email ); ?></span>
              </label>
              <input class="required email form__user-data" type="email" id="email" name="email" placeholder="test@test.co.jp" data-error-required="Email アドレスは必須です。"  data-error-pattern="Email の形式が正しくないようですのでご確認ください" value="<?php echo h($email); ?>">
            </div>
            <!-- /.form__data -->
            <div class="form__data level3-heading">
              <label for="inquiry">お問い合わせ内容をご記入ください
                <span class="warning error-php">*<?php echo h($error_inquiry); ?></span>
              </label>
              <!-- maxlength data-maxlength="100" -->
              <textarea class="required  form__user-data"  name="inquiry" id="inquiry" rows="5" cols="50"><?php echo h( $inquiry ); ?></textarea>
            </div>
            <!-- /.form__data -->
            <input type="hidden" name="ticket" value="<?php echo h($ticket); ?>">
          <button id="submit" name="send" class="button-submit">送信</button>
        </div>
        <!-- /.form__data-list -->
      </form>
    </secton>
    <section class="contents">
    <div class="vertical-table">
      <table class="vertical-table__inner">
        <thead class="vertical-table__headers">
          <tr class="vertical-table__header-row">
          <th class="vertical-table__header">ID</th>
            <th class="vertical-table__header">名前</th>
            <th class="vertical-table__header">カナ</th>
            <th class="vertical-table__header">TEL</th>
            <th class="vertical-table__header">E-mail</th>
            <th class="vertical-table__header">問い合わせ内容</th>
            <th class="vertical-table__header"></th>
            <th class="vertical-table__header"></th>
          </tr>
        </thead>
        <tbody class="vertical-table__body">
          <?php foreach($userData as $value): ?>
          <tr class="vertical-table__body-row">
            <td class="vertical-table__text"><?php echo h($value['id']) ?></td>
            <td class="vertical-table__text"><?php echo h($value['name']) ?></td>
            <td class="vertical-table__text"><?php echo h($value['kana']) ?></td>
            <td class="vertical-table__text"><?php echo h($value['tel']) ?></td>
            <td class="vertical-table__text"><?php echo h($value['email']) ?></td>
            <td class="vertical-table__text"><?php echo h($value['body']) ?></td>
            <td  class="vertical-table__text"><a href="./edit/user_edit.php?id=<?php echo h($value['id']) ?>">編集</a></td>
            <td><form action='./edit/delete.php' onsubmit="return confirm('削除してもよろしいですか？')" method="POST"><input type="hidden" name="id" value="<?php echo h($value['id']) ?>"><input type="submit" value="削除"></form></td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <!-- /.vertical-table -->
    </section>
  </main>

  <?php   include $path . 'inc/footer.php'; ?>
  <script src="<?php echo $path;?>js/varidation.js"></script>
  <script src="<?php echo $path;?>js/varidation-alert.js"></script>
  <script src="<?php echo $path;?>js/delete.js"></script>
</body>
</html>