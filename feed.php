<?php
require('php/config/conf.default.php');
?>
<!DOCTYPE html>
<html>
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <script src="js/documentready.js"></script>

    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1692260644332587&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</head>
<body>
    <div class="feed">
        <h2>Tweets by @LoLEUWStatus</h2>
        <a class="twitter-timeline"
           href="https://twitter.com/LoLEUWStatus"
           data-widget-id="518436232469024768"
           data-chrome="nofooter noheader"
           width="40%">
            Tweets by @LoLEUWStatus
        </a>
    </div>
    <?php /*<div class="feed">
        <h2>Tweets by @LoLNAStatus</h2>
        <a class="twitter-timeline"
           href="https://twitter.com/LoLNAStatus"
           data-widget-id="518436491307921409"
           data-chrome="nofooter noheader"
           width="40%">
            Tweets by @LoLNAStatus
        </a>
    </div>*/?>
    <div class="fb-activity"
         data-app-id="1692260644332587"
         data-colorscheme="light"
         data-header="false">

         </div>
    <div id="fb-root"></div>
</body>
</html>