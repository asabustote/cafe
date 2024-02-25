<div class="modal-back">
    <div class="modal">
      <h5 class="level5-heading heading-contact">
        ログイン
      </h5>
      <form action="inc/login.php" method="post">
        <dl class="singin-list">
          <dd class="form__data">
            <input class="form__user-data" type="text" name="email" placeholder="メールアドレス">
          </dd>
          <dd class="form__data">
            <input class="form__user-data"  type="password" name="password" placeholder="パスワード">
          </dd>
          <dd>
            <button class="button-submit" type="submit">送信</button>
          </dd>
        </dl>
        <dl class="sns">
          <dd class="sns__disc">
            <button class="sns__btton"  name="twitter">
              <img class="sns__img" src="<?php echo $path; ?>images/twitter.png" alt="画像:Twitterのロゴ">
            </button>
          </dd>
          <dd  class="sns__disc">
            <button class="sns__btton" name="facebook">
              <img class="sns__img" src="<?php echo $path; ?>images/fb.png" alt="画像:Facebookのロゴ">
            </button>
          </dd>
          <dd  class="sns__disc">
            <button class="sns__btton"  name="google">
              <img class="sns__img" src="<?php echo $path; ?>images/google.png" alt="画像:Googleのロゴ">
            </button>
          </dd>
          <dd  class="sns__disc">
            <button class="sns__btton"  name="apple">
              <img class="sns__img" src="<?php echo $path; ?>images/apple.png" alt="画像:Appleのロゴ">
            </button>
          </dd>
        </dl>
      </form>
    </div>
    <!-- /.modal -->
  </div>
  <!-- /.modal-back -->