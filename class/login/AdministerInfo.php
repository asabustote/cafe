<?php
Class AdministerInfo {
  private $administerId = "";
  private $email        = "";
  private $passWord     = "";
  
  public function __construct(String $administerId, String $email, String $passWord) {  
    $this->administerId = $administerId;
    $this->email        = $email;
    $this->passWord     = $passWord;
  }

  public function getAdministerId() {
    return $this->administerId;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getPassWord() {
    return $this->passWord;
  }

}
?>