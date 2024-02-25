<?php
require_once '../conf/env.php';
require_once 'AdministerInfo.php';
//管理者情報を持つテーブルに対する操作を行うクラス
Class ConnectAdministerTable {
  private $tableName = 'administer';
  
  private function dbConnect() {
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

  public function getAdministerInfoByPassWordAndEmail($email, $passWord) {
    $sql = "SELECT * FROM $this->tableName WHERE email = :email AND pass_word = :pass_word;";


    $dbh = $this->dbConnect();

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email'    , $email, PDO::PARAM_STR) ;
    $stmt->bindValue(':pass_word', $passWord, PDO::PARAM_STR) ;
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $administerInfo = new AdministerInfo($result[0]['administer_id'],
                                         $result[0]['email'],
                                         $result[0]['pass_word']);


    return $administerInfo;
  }

  public function getAdministerInfo() {
    $sql = "select * from $this->tableName;";
    $dbh = $this->dbConnect();

    $stmt = $dbh->query($sql);
    $result = $stmt->fetchAll();

    $administerInfo = new AdministerInfo($result[0]['administer_id'],
                                         $result[0]['email'],
                                         $result[0]['pass_word']);


    return $administerInfo;
  }

}
?>