/**
  * staqueue-jp
  * A stack and queue system for PHP made with Java stack and queue principles
  * @author Jeffrey Wang
  * @license MIT License
*/
public class Queue {
	public $arr;
	
	function __construct( $in_arr ) {
		if ( !empty( $in_arr ) && isset ( $in_arr ) ) {
			$arr = $in_arr;
		} else {
			$arr = array();
		}
	}
	function isEmpty() {
		return sizeof ( $arr ) > 0 ? true : false;
	}
	function push( $obj ) {
		$arr[sizeof($arr)] = $obj;
	}
	function pop() {
		$obj = $arr[0];
		for ( $i = 0; $i < sizeof($arr) - 2; $i++ ) {
			$arr[$i] = $arr[$i+1];
		}
		return $obj;
	}
	function peek() {
		return $arr[0];
	}
}
