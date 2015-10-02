<?php
/**
 * Pluma
 * Search data
*/

class search_data {
  private $search_type;
  private $search_query;
  private $arr = array();
  function __construct( $in_search_type, $in_search_query, $in_arr ) {
    $this->search_type = $in_search_type;
    $this->search_query = $in_search_query;
    $this->arr = $in_arr;
  }
  function search () {
    if ( $search_type === "users_lastname" ) {
      return search_users_lastname();
    }
  }
  function search_users_lastname() {
    for ( $i = 0; $i < sizeof ( $arr ); $i++ ) {
      if ( $arr[$i] == $search_query ) {
        return 1;
      }
    }
    return 0;
  }
  function get_array() {
    return $arr;
  }
}
  
