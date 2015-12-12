<?php
/**
 * Pluma
 * Vitals
*/

require_once ( 'vitals_connect.php' );

class vitals {
  public $vc, $name, $birth, $gender, $ethnicity, $parent1, $parent2, $school_id, $address, $grade;
  
  public function __construct( $name, $nouveau, $birth, $gender, $ethnicity, $parent1, $parent2, $school_id, $address, $grade ) {
	if ( $nouveau == true ) {
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
	} else {
	$this->name = $name;
	$this->vc = new vitals_connect();
	$user_info = $this->vc->get_user_info( $this->name );
	$user_info = $user_info[1];
	$this->birth = $user_info['birth'];
	$this->gender = $this->genderize ( $user_info['gender'] );
	$this->ethnicity = $user_info['ethnicity'];
	$this->parent1 = $user_info['parent1'];
	$this->parent2 = $user_info['parent2'];
	$this->school_id = $user_info['school_id'];
	$this->address = $user_info['address'];
	$this->grade = $user_info['grade'];
	}
  }
  public function set_birth ( $birth ) {
	$this->birth = $birth;
  }
  public function set_gender ( $gender ) {
	$this->gender = $gender;
  }
  public function set_ethnicity ( $ethnicity ) {
	$this->ethnicity = $ethnicity;
  }
  public function set_parent1 ( $parent1 ) {
	$this->parent1 = $parent1;
  }
  public function set_parent2 ( $parent2 ) {
	$this->parent2 = $parent2;
  }
  public function set_school_id ( $school_id ) {
	$this->school_id = $school_id;
  }
  public function set_address ( $address ) {
	$this->address = $address;
  }
  public function set_grade ( $grade ) {
	$this->grade = $grade;
  }
  public function get_birth ( $birth ) {
	return $this->birth;
  }
  public function get_gender ( $gender ) {
	return $this->gender;
  }
  public function get_ethnicity ( $ethnicity ) {
	return $this->ethnicity;
  }
  public function get_parent1 ( $parent1 ) {
	return $this->parent1;
  }
  public function get_parent2 ( $parent2 ) {
	return $this->parent2;
  }
  public function get_school_id ( $school_id ) {
	return $this->school_id;
  }
  public function get_address ( $address ) {
	return $this->address;
  }
  public function get_grade ( $grade ) {
	return $this->grade;
  }
  public function genderize ( $gender_int ) {
    if ( $gender_int == 0 ) {
		return "male";
	} else if ( $gender_int == 1 ) {
		return "female";
	} else if ( $gender_int == 2 ) {
		return "bot";
	} else if ( $gender_int == 3 ) {
		return "prefernottosay";
	}
  }
  public function ungenderize ( $gender_name ) {
	  if ( $gender_name == 'male' ) {
		  return 0;
	  } else if ( $gender_name == 'female' ) {
		  return 1;
	  } else if ( $gender_name == 'bot' ) {
		  return 2;
	  } else if ( $gender_name == 'prefernottosay' ) {
		  return 3;
	  }
  }
  public function get_user_info() {
    return array(
		'birth' => $this->birth,
		'gender' => $this->gender,
		'ethnicity' => $this->ethnicity,
		'parent1' => $this->parent1,
		'parent2' => $this->parent2,
		'school_id' => $this->school_id,
		'address' => $this->address,
		'grade' => $this->grade,
	);
  }
}