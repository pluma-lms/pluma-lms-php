<?php
/**
 * Pluma
 * User
*/

interface user {
  public function set_username ( $username );
  public function set_password ( $password );
  public function set_fullname ( $firstname, $middlename, $lastname );
  public function set_group ( $groupname );
  public function get_username ();
  public function get_password ();
  public function get_fullname ();
  public function get_group ();
}
