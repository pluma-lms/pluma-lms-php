<?php
/**
 * Pluma
 * Main page
 * @authors CJ Duffee, Jeffrey Wang
*/
?>

<!DOCTYPE html lang=en.US>
<?php
// Import settings
//require_once ( "settings.php" );
// Get user settings and preferences here
// Get language
if ( empty ( $user_settings['language'] ) ) {
    require_once ( "includes/languages/language_eng.php" );
} else {
    require_once ( "includes/languages/language_" . $user_settings['language'] . ".php" ); 
}
//if ( empty ( $_REQUEST['page'] ) ) {
//  $page = 'home';
//} else {
//  $page = $_REQUEST['page'];
//}
?>
<html>
    <head>
        <style>
            #leftbar
            {
                float: left;
                width: 49%;
            }
            #rightbar
            {
                float: right;
                width: 49%;
            }
            h1
            {
                font-style: italic;
            }
        </style>
        <title><?php //echo $organization_settings['name']; ?>Pluma</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="./javascript.js"></script>
        <script>
            function notificationsTab()
            {
                var iframe = document.getElementById('leftFrame');
                iframe.src = './notifications.php';
            }
            function gradeTab()
            {
                var iframe = document.getElementById('leftFrame');
                iframe.src = './grades.php';
            }
            function vitalsTab()
            {
                var iframe = document.getElementById('leftFrame');
                iframe.src = './vitals.php';
            }
            function attendanceTab()
            {
                var iframe = document.getElementById('leftFrame');
                iframe.src = './attendance.php';
            }
        </script>
    </head>
    <body>
        <div class="container">
            <h1>Pluma</h1>
            <br />
            <?php //echo "<img src=\"" . $organization_settings['image_url'] . "\" alt=\"" . $organization_settings['name'] . " />"; 
		?>
            <br />
            <ul class="nav nav-pills">
                <li role="presentation" class="active"><a onclick="notificationsTab()" href="javascript:void(0)"><?php echo $translations['notifications']; ?></a></li>
                <li role="presentation"><a onclick="gradeTab()" href="javascript:void(0)"><?php echo $translations['grades']; ?></a></li>
                <li role="presentation"><a onclick="vitalsTab()" href="javascript:void(0)"><?php echo $translations['vitals']; ?></a></li>
                <li role="presentation"><a onclick="attendanceTab()" href="javascript:void(0)"><?php echo $translations['attendance']; ?></a></li>
            </ul>
            <!--<iframe src="/includes/pages/<?php //echo $page; ?>.php">
                Your browser doesn't seem to support iframes. Pluma requires iframes.
            </iframe>-->
            <div id="leftbar">
                <iframe id="leftFrame" src="./notifications.php" width="100%"></iframe>
            </div>
            <div id="rightbar">
                <iframe src="./calendar.php" width="100%"></iframe>
            </div>
        </div> 
    </body>
</html>
