/**
 * Pluma-LMS
 * Calculator
*/
require_once ( "Stack.php" );

public class calculator {
	public $str, $answer;
	public $stack;
	
	function __construct( $in_str ) {
		$str = $in_str;
		$stack = new Stack();
	}
	function solve () {
		for ( $i = 0; $i < strlen( $answer ); $i++ ) {
			$char = $answer[$i];
			if ( is_numeric( $char ) ) {
				$stack.push($char);
			} else if ( $char == '+' || $char == '-' || $char == '*' || $char == '/' || $char == '%' ) {
				$two = $stack.pop();
				$one = $stack.pop();
				$stack.push( calc( $char, $one, $two ) );
			}
		}
		$answer = $stack.pop();
	}
	function calc ( $op, $one, $two ) {
		switch ( $op ) {
			case '+':
				$res = $one + $two;
				break;
			case '-':
				$res = $one - $two;
				break;
			case '*':
				$res = $one * $two;
				break;
			case '/':
				$res = $one / $two;
				break;
			case '%':
				$res = $one % $two;
				break;
		}
		return $res;
	}
}
