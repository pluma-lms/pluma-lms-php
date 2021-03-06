<?php
/**
 * Pluma
 * Login
*/
if ( empty ( $user_settings['language'] ) ) {
    require_once ( "includes/languages/language_eng.php" );
} else {
    require_once ( "includes/languages/language_" . $user_settings['language'] . ".php" ); 
}
require_once ( './includes/backend/user_login.php' );
session_start();
if ( isset ( $_SESSION['plumauser'] ) ) {
	echo '<meta http-equiv="refresh" content="0; url=' . ($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['SERVER_NAME'] . substr ( $_SERVER['REQUEST_URI'], 0, -10 ) . '/index.php">';
}
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$action = new user_login( $username, $password );
$login_returned = $action->login();
if ( $login_returned[0] === 0 ) {
  $login_proceed_1 = true;
} elseif ( $login_returned[0] == 2 ) { 
  $login_proceed_1 = false;
  $login_message = $login_returned[1];
}
if ( $login_proceed_1 ) {
  $_SESSION['plumauser'] = $username;
}
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Pluma</title>
        <link rel="stylesheet" type="text/css" href="./includes/resources/main.css">
        <style>
            body {
                animation-name: background;
                animation-duration: 10s;
                animation-iteration-count: infinite;
                animation-direction: alternate;
            }
        </style>
	</head>
	<body>
		<div align="center">
<img src="includes/assets/plumalms-logo.png" width="100px" alt="Pluma LMS" />
<?php
if ( $login_proceed_1 == true ) {
?>
<h2><?php echo $translations['login_success']; ?></p>
<p><?php echo $translations['login_success_description']; ?></p>
<p><a href="index.php"><?php echo $translations['redirecting_notice']; ?></a></p>
<meta http-equiv="refresh" content="2; url='<?php echo $_SERVER['HTTPS'] ? 'https://' : 'http://' . $_SERVER['SERVER_NAME'] . substr ( $_SERVER['REQUEST_URI'], 0, -10 ) . '/index.php'; ?>">
<?php
} else {
?>
<h2><?php echo $translations['login_failed']; ?></p>
<p><?php echo $translations['login_failed_description'] . ": " . $login_message; ?></p>
<meta http-equiv="refresh" content="2; url='<?php echo $_SERVER['HTTPS'] ? 'https://' : 'http://' . $_SERVER['SERVER_NAME'] . substr ( $_SERVER['REQUEST_URI'], 0, -10 ) . '/index.php'; ?>">
<?php
}
?>
		</div>
	</body>
</html>
