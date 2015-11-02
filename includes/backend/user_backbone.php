<?php
/**
 * Pluma
 * User_Backbone
*/

interface user_backbone {
  public function set_username ( $username );
  public function set_group ( $groupname );
  public function get_username ();
  public function get_group ();
}
