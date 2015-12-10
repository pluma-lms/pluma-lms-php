/**
 * Pluma
 * vitals_connect
*/

require_once ( 'database.php' );

class vitals_connect {
  
  private $dbconnector;
  private $db;
  
  public function __construct( $database ) {
    $this->db = $database;
  }
  public function database_connect() {
    $this->db = $db->connect()[0];
  }
  public function database_action( $database_action ) {
    $this->username = $this->db->escape_string ( stripslashes ( $this->username ) );
  	$this->password = $this->db->escape_string ( stripslashes ( $this->password ) );
    $getuserquery = "SELECT * FROM vitals WHERE user_name='" . $this->username . "' AND user_password='" . $this->password . "'";
  	$getuserresult = $this->db->query( $getuserquery );
  	$getuserresult_count = $getuserresult->num_rows;
    if ( $getuserresult_count != 1 ) {
    	$this->authstatus = false;
    	return array ( 2, 'Username and password incorrect.' );
    } else {
    	$this->authstatus = true;
    	return array ( 0, $this->authstatus );
    }
  }
  public function set_vitals( $setting_name, $setting_value ) {
    $this->database_action();
  }
  public function 
}
