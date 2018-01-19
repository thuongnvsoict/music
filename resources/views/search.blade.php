<!DOCUTYPE html>
<html>
<head>
    <title>YouTube Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <style>
    </style>
    <script>

       // $('#iframe').contents().find("html").html();
    </script>
</head>
<body>
<p id="xxx">If you click on me, I will disappear.</p>
<p>Click me away!</p>
<p>Click me too!</p>
<p id="test">Hello</p>
<form action="" method="get">
    <input type="text" name="link" value="window.location.href">
    <input type="submit" value="Submit">
</form>
<audio id="audio" controls="controls">
    <source src="horse.ogg">
</audio>
<iframe id="myIframe" src="https://youtube7.download//mini.php?id=d8dCiTki6-E" width="640" height="480"></iframe>
<button>Show href Value</button>
<script>
    $(window).load(function(){
        $("#xxx").hide();
        $("button").click(function(){
            //alert($("#myIframe").contents().find('a').attr("href"));
            //alert($('#xxx').text());
            //alert($('#myIframe').attr('src'));
            var link = $('a').attr('href');
            alert(link);
            $('source').attr('src', link);
            document.getElementById('audio').load();
            //alert(document.getElementById('myIframe').contentWindow.document.html());
            // var theFrame = document.getElementsByTagName("frame")[0];
            // var theFrameDocument = theFrame.contentDocument || theFrame.contentWindow.document;
            //alert(window.frames["#myIframe"].document.html());
        });
        //alert($("#myIframe").contents().find("progress").html());
        document.getElementById("test").innerHTML = 'Hello World';
//        <?php
//        $id = 'd8dCiTki6-E';
//        $html = utf8_encode(file_get_contents('https://youtube7.download//mini.php?id='.$id));
//        //echo $id;
//        $dom = new DOMDocument('1.0', 'UTF-8');
//        $internalErrors = libxml_use_internal_errors(true);
//        $dom->loadHTML($html);
//        $display='';
//        libxml_use_internal_errors($internalErrors);
//        $p = $dom->getElementsByTagName('a')->item(0);
//        if ($p->hasAttributes()) {
//            foreach ($p->attributes as $attr) {
//                $name = $attr->nodeName;
//                $value = $attr->nodeValue;
//                $display .= "Attribute '$name' :: '$value'<br />";
//            }
//        }
//        $test = '';
//        ?>
        //     {{--echo json_encode($test); ?>;--}}
        // $("#btn1").click(function(){
        //     $("#test").text("Hello world!");
        // });
        //alert(info);
        //alert("Hello");
        //$("#myIframe").contents().find("#progress").html();
        //$(location).attr('href');

    });
</script>
</body>
</html>
