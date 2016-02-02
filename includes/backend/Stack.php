/**
  * staqueue-jp
  * A stack and queue system for PHP made with Java stack and queue principles
  * @author Jeffrey Wang
  * @license MIT License
*/
public class Stack {
	public $arr;
	
	function __construct( $in_arr ) {
		if ( !empty ( $in_arr ) && isset ( $in_arr ) ) {
			$arr = $in_arr;
		}
	}
	function push( $obj ) {
		$arr[sizeof($arr)] = $obj;
	}
	function pop() {
		$obj = $arr[sizeof($arr)-1];
		unset($arr[sizeof($arr)-1]);
		return $obj;
	}
	function peek() {
		return $arr[sizeof($arr)-1];
	}
	function isEmpty() {
		return sizeof($arr) > 0 ? true : false;
	}
}
