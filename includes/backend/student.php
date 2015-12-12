<?php
/**
 * Pluma
 * Student
*/
require_once ( 'user_backbone.php' );
require_once ( 'vitals.php' );

class student implements user_backbone {
  private $username, $firstname, $middlename, $lastname, $groupname, $vitals;
  
  public function __construct( $username, $firstname, $middlename, $lastname, $groupname ) {
    $this->username = $username;
    $this->firstname = $firstname;
    $this->middlename = $middlename;
    $this->lastname = $lastname;
    $this->groupname = $groupname;
	if ( $middlename == null || empty ( $middlename ) || !isset ( $middlename ) || !$middlename ) {
		$this->vitals = new vitals ( $firstname + " " + $lastname, false, null, null, null, null, null, null, null, null );
	} else {
		$this->vitals = new vitals ( $firstname + " " + $middlename + " " + $lastname, false, null, null, null, null, null, null, null, null );
	}
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
  public function set_vitals ( $vitals ) {
    $this->vitals = $vitals;
  }
  public function get_username ( $username ) {
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
    return array ( $this->firstname, $this->middlename, $this->lastname );
  }
  public function get_vitals() {
    return $this->vitals;
  }
}
