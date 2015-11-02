<?php
/**
 * Pluma
 * User_Login
*/

class user_login {
  private $username, $password, $db;
  public function __construct ( $username, $password ) {
    $this->username = $username;
    $this->password = $password;
  }
  public function connect () {
    $database = new database();
    $db_arr = $database->connect();
    if ( $db_arr[0] == 1 ) {
      return array ( 1, $db_arr[1] );
    }
    $this->db = $db_arr[1];
    // continue implementing login check
  }
}
