<?php
/**
 * Pluma
 * Generic user
*/
require_once ( 'user_backbone.php' );
require_once ( __DIR__ . '/vitals.php' );
require_once ( 'database.php' );

class user implements user_backbone {
  public $id, $username, $firstname, $middlename, $lastname, $email, $groupname, $vitals, $db;
  
  public function __construct( $username ) {
    $this->username = $username;
	$this->get_db();
	$this->init_vitals();
  }
  public function get_db () {
    $database = new database();
    $db_arr = $database->connect();
    if ( $db_arr[0] == 1 ) {
      return array ( 1, $db_arr[1] );
    }
    $this->db = $db_arr[1];
    $get_query = "SELECT * FROM user WHERE user_name='" . $this->username . "'";
	$get_result = $this->db->query( $get_query );
  	$get_result_arr = $get_result->fetch_assoc();
  	$get_result_count = $get_result->num_rows;
    if ( $get_result_count != 1 ) {
    	return array ( 2, 'Name not found' );
    }
	$this->id = $get_result_arr['user_id'];
	$this->username = $get_result_arr['user_name'];
	$this->email = $get_result_arr['user_email'];
	$this->groupname = $this->group_id_to_name ( $get_result_arr['user_group'] );
	$this->firstname = $get_result_arr['first_name'];
	$this->middlename = $get_result_arr['middle_name'];
	$this->lastname = $get_result_arr['last_name'];
  }
  public function set_db () {
    set_db_each ( 'user_name', $this->username );
	set_db_each ( 'user_email', $this->email );
	set_db_each ( 'user_group', group_name_to_id ( $this->groupname ) );
	set_db_each ( 'first_name', $this->firstname );
	set_db_each ( 'middle_name', $this->middlename );
	set_db_each ( 'last_name', $this->lastname );
  }
  public function set_db_each ( $setting_name, $setting_value ) {
    $name = $this->db->escape_string ( $this->username );
    $setting_value = $this->db->escape_string ( $setting_value );
    $get_query = "UPDATE user
      SET " . $setting_name . " = '". $setting_value ."'
      WHERE user_name='" . $name . "'";
  	$get_result = $this->db->query( $get_query );
    if ( !$get_result ) {
    	return array ( 2, 'Unsuccessful' );
    } else {
    	return array ( 0, 'Success' );
    }
  }
  public function group_id_to_name ( $id ) {
    if ( $id == 0 ) {
		return 'student';
	} elseif ( $id == 1 ) {
		return 'teacher';
	} elseif ( $id == 2 ) {
		return 'tech';
	} else {
		return 'invalid';
	}
  }
  public function group_name_to_id ( $name ) {
    if ( $name == 'student' ) {
		return 0;
	} elseif ( $name == 'teacher' ) {
		return 1;
	} elseif ( $name == 'tech' ) {
		return 2;
	} else {
		return 0;
	}
  }
  public function init_vitals () {
	if ( $this->middlename == null || empty ( $this->middlename ) || !isset ( $this->middlename ) || !$this->middlename ) {
	  $this->vitals = new vitals ( $this->firstname . " " . $this->lastname, false, null, null, null, null, null, null, null, null );
	} else {
	  $this->vitals = new vitals ( $this->get_fullname(), false, null, null, null, null, null, null, null, null );
	}
  }
  public function get_vitals ( $setting_name ) {
    return $this->vitals->get_user_info()[$setting_name];
  }
  public function set_username ( $username ) {
    $this->username = $username;
  }
  public function set_group ( $groupname ) {
    $this->groupname = $groupname;
  }
  public function set_firstname ( $firstname ) {
    $this->firstname = $firstname;
  }
  public function set_middlename ( $middlename ) {
    $this->middlename = $middlename;
  }
  public function set_lastname ( $lastname ) {
    $this->lastname = $lastname;
  }
  public function set_fullname ( $firstname, $middlename, $lastname ) {
    $this->set_firstname ( $firstname );
    $this->set_middlename ( $middlename );
    $this->set_lastname ( $lastname );
  }
  public function get_username () {
    return $this->username;
  }
  public function get_group () {
    return $this->groupname;
  }
  public function get_firstname () {
    return $this->firstname;
  }
  public function get_middlename () {
    return $this->middlename;
  }
  public function get_lastname () {
    return $this->lastname;
  }
  public function get_fullname () {
	  return $this->get_firstname() . " " .  $this->get_middlename() . " " . $this->get_lastname();
  }
  public function get_fullname_arr () {
    return array ( $this->firstname, $this->middlename, $this->lastname );
  }
}