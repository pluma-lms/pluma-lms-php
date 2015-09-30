<!DOCTYPE html lang=en.US>
<?php
if ( empty ( $user_settings['language'] ) ) {
    require_once ( "includes/languages/language_eng.php" );
} else {
    require_once ( "includes/languages/language_" . $user_settings['language'] . ".php" ); 
}?>
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
            var pages=['./notifications.php', './grades.php', './vitals.php','./attendance.php'];
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
                    //case 38:
                     //   alert('up');
                        //break;
                    case 37:
                        pageIndex=pageIndex-1;
                        if(pageIndex<0)
                        {
                            pageIndex=pages.length-1;
                        }
                        break;
                   // case 40:
                     //   alert('down');
                     //   break;
                }
                setLeftTab(pageIndex);
	    };
            function setLeftTab(location)
            {
                pageIndex=location;
                var iframe = document.getElementById('leftFrame');
                iframe.src = pages[location];

            }
        </script>
    </head>
    <body>
        <div class="container">
            <h1>Pluma</h1>
            <br />
            <br />
            <ul class="nav nav-pills">
                <li role="presentation" class="active"><a onclick="setLeftTab(0)" href="javascript:void(0)"><?php echo $translations['notifications']; ?></a></li>
                <li role="presentation"><a onclick="setLeftTab(1)" href="javascript:void(0)"><?php echo $translations['grades']; ?></a></li>
                <li role="presentation"><a onclick="setLeftTab(2)" href="javascript:void(0)"><?php echo $translations['vitals']; ?></a></li>
                <li role="presentation"><a onclick="setLeftTab(3)" href="javascript:void(0)"><?php echo $translations['attendance']; ?></a></li>
            </ul>
            <div id="leftbar">
                <iframe id="leftFrame" src="./notifications.php" width="100%"></iframe>
            </div>
            <div id="rightbar">
                <iframe src="./calendar.php" width="100%"></iframe>
            </div>
        </div> 
    </body>
</html>
