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
  public function get_user_info ( $name ) {
    $name = $this->db->escape_string ( $name );
    $get_query = "SELECT * FROM vitals WHERE name='" . $name . "'";
  	$get_result = $this->db->query( $get_query );
  	$get_result_arr = $get_result->fetch_assoc();
  	$get_result_count = $get_result->num_rows;
    if ( $get_result_count != 1 ) {
    	return array ( 2, 'Name not found' );
    } else {
    	return array ( 0, $get_result_assoc );
    }
  }
  public function set_vitals( $name, $setting_name, $setting_value ) {
    $name = $this->db->escape_string ( $name );
    $setting_value = $this->db->escape_string ( $setting_value );
    $get_query = "UPDATE vitals
      SET " . $setting_name . " = '". $setting_value ."'
      WHERE name='" . $name . "'";
  	$get_result = $this->db->query( $get_query );
    if ( !$get_result ) {
    	return array ( 2, 'Unsuccessful' );
    } else {
    	return array ( 0, 'Success' );
    }
  }
}
