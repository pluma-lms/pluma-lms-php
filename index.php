<?php
if ( empty ( $user_settings['language'] ) ) {
    require_once ( "includes/languages/language_eng.php" );
} else {
    require_once ( "includes/languages/language_" . $user_settings['language'] . ".php" ); 
}
session_start ();
require_once ( 'version.php' );
?>
<!DOCTYPE html lang="en.US">
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
        <script>
            var pages=['./includes/pages/notifications.php', './includes/pages/grades.php', './includes/pages/vitalspg.php','./includes/pages/attendance.php'];
            var pageIndex=0;
            document.onkeydown = function(e) 
            {
                switch (e.keyCode) {
                    case 39:
                        pageIndex=pageIndex+1;
                        if(pageIndex>=pages.length)
                        {
                            pageIndex=0;
                        }
                        break;
                    case 37:
                        pageIndex=pageIndex-1;
                        if(pageIndex<0)
                        {
                            pageIndex=pages.length-1;
                        }
                        break;
                }
                setLeftTab(pageIndex);
	    };
            function setLeftTab(location)
            {
                pageIndex=location;
                var iframe = document.getElementById('leftFrame');
                iframe.src = pages[location];
                for(i=0;i<pages.length;i++)
                {
                    document.getElementById(i).className="butt";
                }
                document.getElementById(location).className="butt selectedButt";

            }
        </script>
    </head>
    <body>
		<?php if ( $_SESSION['plumauser'] ) { ?><div id="username" align="right"><?php echo $_SESSION['plumauser']; ?> &bull; <a href="./logout.php">Logout</a></div><?php } ?>
        <img src="includes/assets/plumalms-logo.png" width="100px" alt="Pluma LMS" />
		<h1><?php echo $translations['pluma']; ?></h1>
        <?php
        if ( !$_SESSION['plumauser'] ) {
        ?>
        <div>
        	<h2><?php echo $translations['login']; ?></h2>
        	<form method="post" action="login.php">
        		<p><label for="username"><?php echo $translations['username']; ?>: </label><input type="text" name="username" /></p>
        		<p><label for="password"><?php echo $translations['password']; ?>: </label><input type="password" name="password" /></p>
        		<button type="submit" class="butt"><?php echo $translations['login']; ?></button>
        	</form>
        </div>
        <?php
        } else {
        ?>
        <div>
            <button type="button" class="butt selectedButt" onclick="setLeftTab(0)" id="0"><?php echo $translations['notifications']; ?></button>
            <button type="button" class="butt" onclick="setLeftTab(1)" id="1"><?php echo $translations['grades']; ?></button>
            <button type="button" class="butt" onclick="setLeftTab(2)" id="2"><?php echo $translations['vitals']; ?></button>
            <button type="button" class="butt" onclick="setLeftTab(3)" id="3"><?php echo $translations['attendance']; ?></button>
        </div>
		<div id="leftbar">  
			<iframe style="border-style: none;" id="leftFrame" src="./includes/pages/notifications.php" width="100%" height="550"></iframe>
		</div>
		<div id="rightbar">
			<iframe style="border-style: none;" src="./includes/pages/calendar.php" width="100%" height="550"></iframe>
		</div>
		<br clear="all" />
		<p>&copy; 2015 Pluma LMS Development Team. All rights reserved.</p>
		<?php
		if ( $_REQUEST['diagnostics'] == true ) {
		  ?>
		  <p>Pluma LMS (PHP)</p>
		  <p><?php echo $version; ?> &mdash; <?php echo $codename; ?></p>
		  <p>Lead developer: Jeffrey Wang</p>
		  <p>Other contributors: CJ Duffee, Sammy Shin</p>
		  <?php
		}
        }
        ?>
    </body>
</html>
