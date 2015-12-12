<?php
  session_start();
  unset( $_SESSION['plumauser'] );
  session_destroy();
  header("Location: index.php");
?>
