<?php
/**
 * Pluma
 * Database
*/

require_once ( "../../settings.php" );


class database {
  private $settings;
  private $dbsettings;
  private $db;
  
  // constructor
  // takes settings from settings.php (root dir) and makes a DB object "$db"
  public function __construct() {
    $dbsettings = $settings->database_settings;
    if ( $dbsettings['type'] == 'mysql' ) {
      $db = new mysqli( $dbsettings['host'], $dbsettings['username'], $dbsettings['password'], $dbsettings['database_name'] );
    }
  }
  
  // connect method
  // returns array: {0, $db} for success, {1, errorinfo} for errors
  public function connect() {
    if ($db->connect_errno) {
      return array ( 1, $db->connect_error );
    }
    return array ( 0, $db );
  }
}
