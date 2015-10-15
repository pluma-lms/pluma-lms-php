<?php
/**
 * Pluma
 * user_data.php
*/

class user_data {
  private $database;
  private $amount;
  private $iterator;
  
  function __construct() {
    $amount = 0;
  }
  function __construct( $in_amount ) {
    $amount = $in_amount;
  }
  function __construct( $in_amount, $in_type ) {
    $amount = $in_amount;
  }
  function run () {
    $database = new database_connect();
    // pull user data
    $iterator = new Iterator( $database->userlist );
    if ( $amount == 0 ) {
      $amount = sizeof ( $database->userlist );
    }
    $i = 0;
    $ret_text = "";
    while ( $iterator->hasNext() ) {
      $i++;
      if ( $amount == $i ) {
        break;
      }
      if ( $iterator->previous() == $iterator->next() ) {
        $iterator->previous();
        $iterator->remove();
      }
      $ret_text += $iterator->next() + "\n";
    }
    return $ret_text;
  }
  // in: {userid, lastname, firstname, DOB}
  function add ( $in_user_arr ) {
    $database = new database_connect();
    // pull user data
    $iterator = new Iterator( $database->userlist );
    if ( $amount == 0 ) {
      $amount = sizeof ( $database->userlist );
    }
    $i = 0;
    $ret_text = "";
    while ( $iterator->hasNext() ) {
      $i++;
      if ( $amount == $i ) {
        $iterator->add( $in_user_arr );
        break;
      }
      if ( $iterator->previous() == $iterator->next() ) {
        $iterator->previous();
        $iterator->remove();
      }
      $ret_text += $iterator->next() + "\n";
    }
    return $ret_text;
  }
  // in: {userid, lastname, firstname, DOB}
  function remove ( $in_user_arr ) {
    $database = new database_connect();
    // pull user data
    $iterator = new Iterator( $database->userlist );
    if ( $amount == 0 ) {
      $amount = sizeof ( $database->userlist );
    }
    $i = 0;
    $ret_text = "";
    while ( $iterator->hasNext() ) {
      $i++;
      if ( $amount == $i ) {
        break;
      }
      if ( $in_user_arr == $iterator->next() ) {
        $iterator->remove();
      }
      if ( $iterator->previous() == $iterator->next() ) {
        $iterator->previous();
        $iterator->remove();
      }
      $ret_text += $iterator->next() + "\n";
    }
    return $ret_text;
  }
}
