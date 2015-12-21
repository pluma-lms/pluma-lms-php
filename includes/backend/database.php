<?php
/**
 * Pluma
 * Database
*/

require_once ( dirname ( __FILE__ ) . "/../../settings.php" );


class database {
  private $settings;
  private $dbsettings;
  private $db;
  private $dbtype;
  
  // constructor
  // takes settings from settings.php (root dir) and makes a DB object "$db"
  public function __construct() {
	$settings = new settings();
    $dbsettings = $settings->database_settings;
    if ( $dbsettings['type'] == 'mysql' ) {
	  $this->dbtype = 'mysql';
      $this->db = new mysqli( $dbsettings['host'], $dbsettings['username'], $dbsettings['password'], $dbsettings['database_name'] );
    } elseif ( $dbsettings['type'] == 'sqlite' ) {
	  $this->dbtype = 'sqlite';
	  $this->db = new SQLite3( $dbsettings['database_name'] );
	}
  }
  
  // connect method
  // returns array: {0, $db} for success, {1, errorinfo} for errors
  public function connect() {
    if ($this->db->connect_errno) {
      return array ( 1, $this->db->connect_error );
    }
    return array ( 0, $this->db );
  }
  
  public function connect_sqlite() {
	return $this->db;
  }
  
  public function get_type() {
    return $this->dbtype;
  }
  
}