<?php
/**
 * Pluma
 * vitals_connect
*/

require_once ( 'database.php' );

class vitals_connect {
  
  private $dbconnector;
  private $db;
  
  public function __construct() {
    $this->dbconnector = new database();
    if ( $this->dbconnector->connect() ) {
      $db = $this->database_connect();
    }
  }
  public function database_connect() {
    $database = new database();
    $db_arr = $database->connect();
    if ( $db_arr[0] == 1 ) {
      return array ( 1, $db_arr[1] );
    }
	$this->db = $db_arr[1];
  }
  public function get_user_info ( $name ) {
	if ( $name == null ) {
	return array ( 2, 'Null name' );
	} else {
    $name = $this->db->escape_string ( $name );
    $get_query = "SELECT * FROM vitals WHERE name='" . $name . "'";
  	$get_result = $this->db->query( $get_query );
  	$get_result_arr = $get_result->fetch_assoc();
  	$get_result_count = $get_result->num_rows;
    if ( $get_result_count != 1 ) {
    	return array ( 2, 'Name not found' );
    } else {
    	return array ( 0, $get_result_arr );
    }
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