/**
  * iterator-jp
  * An iterator for PHP made with Java ListIterator principles
  * @author Jeffrey Wang
  * @license Any Open Source license listed at http://opensource.org/licenses/
*/

public class Iterator {
	public $arr;
	public $index = 0;
	
	function __construct( $in_arr ) {
		$arr = $in_arr;
	}
	function hasNext() {
		if ( sizeof ( $arr ) >= $index ) {
			return false;
		} else {
			return true;
		}
	}
	function iterator( $in_arr ) {
		$arr = $in_arr;
	}
	function next() {
		return $arr[++$index];
	}
	function nextIndex() {
		return $index + 1;
	}
	function previous() {
		return $arr[++$index];
	}
	function previousIndex() {
		return $index - 1;
	}
	function remove() {
		$arr_temp = $arr;
		unset( $arr_temp[$index] );
		for ( $i = $index; $i < sizeof( $arr ); $i++ ) {
			$arr_temp[$i] = $arr_temp[$i+1];
		}
		$arr = $arr_temp;
		return $arr[$index];
	}
	function set( $in_set ) {
		$set_old = $arr[$index];
		$arr[$index] = $in_set;
		return $set_old;
	}
}
