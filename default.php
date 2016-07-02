

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Corporate Chambers TV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="script/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="script/css/style.css" rel="stylesheet"/>

    <link rel="apple-touch-icon" sizes="57x57" href="image/apple-icon-57x57.png"/>
    <link rel="apple-touch-icon" sizes="60x60" href="image/apple-icon-60x60.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="image/apple-icon-72x72.png"/>
    <link rel="apple-touch-icon" sizes="76x76" href="image/apple-icon-76x76.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="image/apple-icon-114x114.png"/>
    <link rel="apple-touch-icon" sizes="120x120" href="image/apple-icon-120x120.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="image/apple-icon-144x144.png"/>
    <link rel="apple-touch-icon" sizes="152x152" href="image/apple-icon-152x152.png"/>
    <link rel="apple-touch-icon" sizes="180x180" href="image/apple-icon-180x180.png"/>
    <link rel="icon" type="image/png" sizes="192x192"  href="image/android-icon-192x192.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="image/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="96x96" href="image/favicon-96x96.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="image/favicon-16x16.png"/>
    <link rel="manifest" href="image/manifest.json"/>

    <meta name="msapplication-TileColor" content="#ffffff"/>
    <meta name="msapplication-TileImage" content="image/ms-icon-144x144.png"/>
    <meta name="theme-color" content="#ffffff"/>
</head>
<body>



<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header header-size">
            <button type="button"
                    class="navbar-toggle collapsed"
                    data-toggle="collapse"
                    data-target="#navbar"
                    aria-expanded="false"
                    aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img alt="Corporate Chambers TV" class="img-responsive" src="image/apple-icon-60x60.png"/>
            </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>


                    <?php
                    //https://www.googleapis.com/youtube/v3/playlists?part=snippet&channelId=UCyt1vzfb8DVSq49pySbzWKw&key={YOUR_API_KEY}
                    $json = file_get_contents("https://www.googleapis.com/youtube/v3/playlists?part=snippet&channelId=UCyt1vzfb8DVSq49pySbzWKw&key=AIzaSyD7AILUDSS8N5WVQupOqBmRLOmDtpYth3w");
                    $var=preg_replace('/.+?({.+}).+/','$1',$json);
                    $obj = json_decode($var);

                    foreach($obj->items as $item) {
                        //echo ' '.$item->snippet->title.'</br>';
                        echo ' <li class="dropdown"><a href="#" class="dropdown-toggle"    data-toggle="dropdown"  role="button"  aria-haspopup="true"  aria-expanded="false"> '.$item->snippet->title.'  <span class="caret"></span> </a>';

                        $pid=$item->id;
                        playlistIteam($pid);


                    }

                    function playlistIteam($pid){
                        $json = file_get_contents("https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId={$pid}&key=AIzaSyD7AILUDSS8N5WVQupOqBmRLOmDtpYth3w");
                        $var=preg_replace('/.+?({.+}).+/','$1',$json);
                        $obj = json_decode($var);

                        echo '<ul class="dropdown-menu">';
                        foreach($obj->items as $item) {

                            echo'<li><a href="#" class="vid" vid="'.$item->snippet->resourceId->videoId.'">'.$item->snippet->title.'</a></li>';
                        }
                        echo '</ul>';

                    }
                    echo '</li>';
                    ?>




            </ul>
        </div>


    </div>
</nav>





    <iframe class="embed-responsive-item embend" src="https://www.youtube.com/embed/zglGKHlHJUA"></iframe>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="script/js/bootstrap.min.js"></script>
<script >
    $(document).ready(function(){

        $( ".vid" ).each(function() {
            $( this ).click(function(){
                var vid=$(this).attr('vid');
                var url="https://www.youtube.com/embed/"+vid;


                $('.embend').attr('src',url);
            });
        });

    });
</script>
</body>
</html>
