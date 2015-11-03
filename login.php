<?php
/**
 * Pluma
 * Login
*/
require_once ( './includes/backend/user_login.php' );
session_start();
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$action = new user_login( $username, $password );
$login_returned = $action->login();
if ( $login_returned[1] == true ) {
  $login_proceed_1 = true;
} elseif ( $login_returned[0] == 2 ) {
  $login_proceed_1 = false;
  $login_message = $login_returned[1];
}
if ( $login_proceed_1 ) {
  $_SESSION['plumauser'] = $username;
}
?>
<h1><?php echo $translations['pluma']; ?></h1>
<?php
if ( $login_returned[1] == true ) {
?>
<h2><?php echo $translations['login_success']; ?></p>
<p><?php echo $translations['login_success_description']; ?></p>
<?php
} else {
?>
<h2><?php echo $translations['login_failed']; ?></p>
<p><?php echo $translations['login_failed_description'] . ": " . $login_message; ?></p>
<?php
}
?>
