<?php
/**
 * Pluma
 * Vitals
*/

require_once ( 'vitals_connect' );

class vitals {
  private $vc, $name, $birth, $gender, $ethnicity, $parent1, $parent2, $school_id, $address, $grade;
  
  public function __construct( $name, $birth, $gender, $ethnicity, $parent1, $parent2, $school_id, $address, $grade ) {
    $this->name = $name;
    $this->birth = $birth;
    $this->gender = $gender;
    $this->ethnicity = $ethnicity;
    $this->parent1 = $parent1;
    $this->parent2 = $parent2;
    $this->school_id = $school_id;
    $this->address = $address;
    $this->grade = $grade;
    $this->vc = new vitals_connect();
    $this->set_vitals( 'name', $name );
    $this->set_vitals( 'birth', $birth );
    $this->set_vitals( 'gender', $gender );
    $this->set_vitals( 'ethnicity', $ethnicity );
    $this->set_vitals( 'parent1', $parent1 );
    $this->set_vitals( 'parent2', $parent2 );
    $this->set_vitals( 'school_id', $school_id );
    $this->set_vitals( 'address', $address );
    $this->set_vitals( 'grade', $grade );
  }
  public function __construct( $name ) {
    $this->name = $name;
    $user_info = $this->get_user_info();
    $this->birth = $user_info['birth'];
    $this->gender = $user_info['gender'];
    $this->ethnicity = $user_info['ethnicity'];
    $this->parent1 = $user_info['parent1'];
    $this->parent2 = $user_info['parent2'];
    $this->school_id = $user_info['school_id'];
    $this->address = $user_info['address'];
    $this->grade = $user_info['grade'];
  }
  public function get_user_info() {
    return $vc->get_user_info();
  }
}
