<?php
require_once $path.'conf/env.php';
Class Dbc
{
  protected $table_name = 'contacts';

  //connect to db
  public function dbConnect() {
    $host   = DB_HOST;
    $dbname = DB_NAME;
    $user   = DB_USER;
    $pass   = DB_PASS;
    $dsn    = "mysql:dbname=$dbname;host=$host;charset=utf8";

    try {
      $dbh = new PDO($dsn,$user,$pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
      ]);
    } catch(PDOException $e) {
      echo '接続失敗' . $e->getMessage();
      exit();
    }

    return $dbh;
  }


  public function getAllData() {
      $dbh = $this->dbConnect();
      $sql = "SELECT * FROM $this->table_name";
      $stmt = $dbh->query($sql);
      $result = $stmt->fetchAll();
      return $result;
      $dbh = null;
  }

  function getById($id) {
    if(empty($id)) {
      exit('IDが不正です。');
    }
  
    $dbh = $this->dbConnect();
  
    $sql = "SELECT * From $this->table_name Where id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if(!$result) {
      exit('ユーザー情報はありません。');
    }

    return $result;
  }

  public function userInfoUpdate($userInfo) {
    $sql = "UPDATE $this->table_name SET
              name = :name, kana = :kana, tel = :tel, email = :email, body = :body
            WHERE
              id = :id";
  
    $dbh = $this->dbConnect();
    $dbh->beginTransaction();
    try {
  
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $userInfo['name'], PDO::PARAM_STR);
    $stmt->bindValue(':kana', $userInfo['kana'], PDO::PARAM_STR);
    $stmt->bindValue(':tel', $userInfo['tel'], PDO::PARAM_INT);
    $stmt->bindValue(':email', $userInfo['email'], PDO::PARAM_STR);
    $stmt->bindValue(':body', $userInfo['body'], PDO::PARAM_STR);
    $stmt->bindValue(':id', $userInfo['id'], PDO::PARAM_INT);
    $stmt->execute();
    $dbh->commit();
    } catch(PDOException $e) {
    $dbh->rollBack();
    exit($e);
    }
  }

  public function userInfoDelete($id) {
    if(empty($id)) {
      exit('IDが不正です。');
    }

    $dbh = $this->dbConnect();

    $sql = "DELETE FROM $this->table_name WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);

    $stmt->execute();
  }

  public function insertToDB($userData){
    var_dump($userData['tel']);
    $sql = "INSERT INTO 
              $this->table_name (name, kana, tel, email, body)
            VALUES
              (:name, :kana, :tel, :email, :body)";
    
    $dbh = $this->dbConnect();
    $dbh->beginTransaction();

    try {
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(':name',  $userData['name'], PDO::PARAM_STR);
      $stmt->bindValue(':kana',  $userData['kana'], PDO::PARAM_STR);
      $stmt->bindValue(':tel',   $userData['tel'], PDO::PARAM_STR);
      $stmt->bindValue(':email', $userData['email'], PDO::PARAM_STR);
      $stmt->bindValue(':body',  $userData['inquiry'], PDO::PARAM_STR);
      $stmt->execute();
      $dbh->commit();
    }catch(PDOException $e) {
      $dbh->rollBack();
      exit($e);
    }
  }
}
?>