<?php
/**
 * Library Requirements
 * 1. Install composer (https://getcomposer.org)
 * 2. On the command line, change to this directory (api-samples/php)
 * 3. Require the google/apiclient library
 *    $ composer require google/apiclient:~2.0
 */
if (!file_exists(__DIR__ . '/../../../vendor/autoload.php')) {
    throw new \Exception('please run "composer require google/apiclient:~2.0" in "' . __DIR__ .'"');
}

require_once __DIR__ . '/../../../vendor/autoload.php';
$htmlBody = '';

if (isset($_GET['q'])&& isset($_GET['search'])) {
    $DEVELOPER_KEY = 'AIzaSyBhtr3gzMAlSXN97AX8NpNCU6HpvEQ1dVI';
    $client = new Google_Client();
    $client->setDeveloperKey($DEVELOPER_KEY);
    $youtube = new Google_Service_YouTube($client);
    try {
        $searchResponse = $youtube->search->listSearch('id,snippet', array(
            'q' => $_GET['q'],
            'maxResults' => 10,
            'type' => 'video',
            'videoCategoryId' => 10
        ));
        $videos = '';
        // Add each result to the appropriate list, and then display the lists of
        // matching videos, channels, and playlists.
        /*
                foreach ($searchResponse['items'] as $searchResult) {
                    switch ($searchResult['id']['kind']) {
                        case 'youtube#video':
                            $videos .= sprintf('<li>%s '.'https://www.youtube.com/watch?v='.'%s </li>',
                                $searchResult['snippet']['title'], $searchResult['id']['videoId']);
                            break;
                        case 'youtube#channel':
                            $channels .= sprintf('<li>%s (%s)</li>',
                                $searchResult['snippet']['title'], $searchResult['id']['channelId']);
                            break;
                        case 'youtube#playlist':
                            $playlists .= sprintf('<li>%s (%s)</li>',
                                $searchResult['snippet']['title'], $searchResult['id']['playlistId']);
                            break;
                    }
                }
                */
        foreach ($searchResponse['items'] as $searchResult) {
            $videos .= sprintf('<iframe width="210" height="170" src="https://www.youtube.com/embed/%s"> </iframe>
                                        %s <a href="https://youtube7.download//mini.php?id=%s" target="_blank"> Download MP3 </a><br>',
                $searchResult['id']['videoId'], $searchResult['snippet']['title'], $searchResult['id']['videoId']);
//            $videos .= sprintf('<li>%s (%s)</li>',
//                $searchResult['snippet']['title'], $searchResult['id']['videoId']);
//                    break;
//                case 'youtube#channel':
//                    $channels .= sprintf('<li>%s (%s)</li>',
//                        $searchResult['snippet']['title'], $searchResult['id']['channelId']);
//                    break;
//                case 'youtube#playlist':
//                    $playlists .= sprintf('<li>%s (%s)</li>',
//                        $searchResult['snippet']['title'], $searchResult['id']['playlistId']);
//                    break;
//            }
        }


//        $html = utf8_encode(file_get_contents("https://youtube7.download//mini.php?id=$id"));
//        echo $id;
//        $dom = new DOMDocument('1.0', 'UTF-8');
//        $internalErrors = libxml_use_internal_errors(true);
//        $dom->loadHTML($html);
//        libxml_use_internal_errors($internalErrors);
//        $p = $dom->getElementsByTagName('a')->item(0);
//        if ($p->hasAttributes()) {
//            foreach ($p->attributes as $attr) {
//                $name = $attr->nodeName;
//                $value = $attr->nodeValue;
//                echo "Attribute '$name' :: '$value'<br />";
//            }
//        }

//
//        $doc = DOMDocument::getAttribute($html);
//        $xpath = new DOMXPath($doc);
//        $query = "//div[@id='btn-loc']";
//        $entries = $xpath->query($query);
//        foreach ($entries as $entry) {
//            echo "Found: " . $entry->getAttribute("attrloc");
//        }
        //echo $html;
        //echo $jsonData;
//        $links = json_decode($jsonData,TRUE);
//        if(isset($links['data']['html'])) {
//            echo $links['data']['html'];
//        }
        $htmlBody .= <<<END
    $videos
END;
    } catch (Google_Service_Exception $e) {
        $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    } catch (Google_Exception $e) {
        $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    }
}
?>

<!doctype html>
<html>
<head>
    <title>YouTube Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body, nav{
            max-width: 1500px;
            margin: auto;
            min-width: 1000px;
        }
        main{
            margin-bottom:40px;
            margin-top: 60px;
        }
        .footer{
            height: 40px;
            max-width: 1500px;
            margin: auto;
            min-width: 1000px;
            background-color: #2a88bd;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">This is logo</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input class="form-control" style="margin-right:5px;width: 500px;" type="search" id="q" name="q" placeholder="Search">
                    <input class="btn btn-primary" style="width: 100px;" type="submit" name="search" value="Search">
                </div>

            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Login</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<main>
    <div class="row">
        <div class="col-lg-2" style="background-color: #8a6d3b">
            I don't know what should be displayed here
        </div>
        <div class="col-lg-7">
            <?=$htmlBody?>
            <!--
            <iframe width="210" height="170" src="https://www.youtube.com/embed/%s"> </iframe><br>
            <iframe width="210" height="170" src="https://www.youtube.com/embed/%s"> </iframe><br>
            <iframe width="210" height="170" src="https://www.youtube.com/embed/%s"> </iframe><br>
            <iframe width="210" height="170" src="https://www.youtube.com/embed/%s"> </iframe><br>
            <iframe width="210" height="170" src="https://www.youtube.com/embed/%s"> </iframe><br>
            <iframe width="210" height="170" src="https://www.youtube.com/embed/%s"> </iframe><br>
            <iframe width="210" height="170" src="https://www.youtube.com/embed/%s"> </iframe><br>
            <iframe width="210" height="170" src="https://www.youtube.com/embed/%s"> </iframe><br>
            <iframe width="210" height="170" src="https://www.youtube.com/embed/%s"> </iframe><br>
            <iframe width="210" height="170" src="https://www.youtube.com/embed/%s"> </iframe><br>
            <iframe width="210" height="170" src="https://www.youtube.com/embed/%s"> </iframe><br>
            -->
        </div>
        <div class="col-lg-3" style="background-color: #2a88bd">
            <div class="list-group">
                <a href="#" class="list-group-item">First item</a>
                <a href="#" class="list-group-item">Second item</a>
                <a href="#" class="list-group-item">Third item</a>
            </div>
        </div>
    </div>
</main>
<div class="footer navbar-fixed-bottom">
    <audio controls>
        <source src="horse.ogg" type="audio/ogg">
        <source src="horse.mp3" type="audio/mpeg">
    </audio>
</div>
</body>
</html>
