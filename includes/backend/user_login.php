<?php
/**
 * Pluma
 * user_login
*/

require_once ( 'database.php' );

class user_login {
  private $username, $password, $db, $authstatus;
  
  public function __construct ( $username, $password ) {
    $this->username = $username;
    $this->password = $password;
  }
  public function login () {
    $database = new database();
	if ( $database->get_type() == 'mysql' ) {
		$db_arr = $database->connect();
		if ( $db_arr[0] == 1 ) {
		  return array ( 1, $db_arr[1] );
		}
		$this->db = $db_arr[1];
		// continue implementing login check
		$this->username = $this->db->escape_string ( stripslashes ( $this->username ) );
		$this->password = $this->db->escape_string ( stripslashes ( $this->password ) );
		$getuserquery = "SELECT * FROM user WHERE user_name='" . $this->username . "' AND user_password='" . $this->password . "'";
		$getuserresult = $this->db->query( $getuserquery );
		$getuserresult_count = $getuserresult->num_rows;
		if ( $getuserresult_count == 0 ) {
			$this->authstatus = false;
			return array ( 2, 'Username and password incorrect.' );
		} elseif ( $getuserresult_count == 1 ) {
			$this->authstatus = true;
			return array ( 0, $this->authstatus );
		} else {
			return array ( 2, 'MySQL returning weird things.' );
		}
	} elseif ( $database->get_type() == 'sqlite' ) {
		$db_arr = $database->connect_sqlite();
		$this->db = $db_arr;
		// do things that have yet to be decided
	}
  }
  public function get_authstatus() {
    return $this->authstatus;
  }
}
