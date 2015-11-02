<?php
/**
 * Pluma
 * User_Login
*/

class user_login {
  private $username, $password, $db, $authstatus;
  
  public function __construct ( $username, $password ) {
    $this->username = $username;
    $this->password = $password;
  }
  public function login () {
    $database = new database();
    $db_arr = $database->connect();
    if ( $db_arr[0] == 1 ) {
      return array ( 1, $db_arr[1] );
    }
    $this->db = $db_arr[1];
    // continue implementing login check
    $this->username = mysqli_real_escape_string ( $this->db, stripslashes ( $this->username ) );
    $this->password = mysqli_real_escape_string ( $this->db, stripslashes ( $this->password ) );
    $getuserquery = "SELECT * FROM user WHERE user_name='" . $this->username . "' AND user_password='" . $this->password . "'";
    $getuserresult = mysqli_query ( $this->db, $getuserquery );
    $getuserresult_count = mysqli_num_rows ( $getuserresult );
    if ( $this->getuserresult_count != 1 ) {
    	$this->authstatus = false;
    	return array ( 2, 'Username and password incorrect.' );
    } else {
    	$this->authstatus = true;
    	return array ( 0, $this->authstatus );
    	
    }
  }
  public function get_authstatus() {
    return $this->authstatus;
  }
}
