
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Downloading... | Youtube7</title>
<link rel="dns-prefetch" href="https://youtube7.download">
<link rel="dns-prefetch" href="http://www.hitcpm.com">
<meta content="NOINDEX,NOFOLLOW,NOARCHIVE,NOODP,NOYDIR" name="robots" />
<meta name="referrer" content="none" />
<meta name="referrer" content="no-referrer" />
<meta name="referrer" content="unsafe-url" />
<meta name="referrer" content="origin" />
<meta name="referrer" content="no-referrer-when-downgrade" />
<meta name="referrer" content="origin-when-cross-origin" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
  function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*21600000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var user=getCookie("username");
    if (user != "") {
       // alert("Welcome again " + user);
       //user = "hide";
       ReportIt();
    } else {
       //user = prompt("Please enter your name:","");
           ReportIt();
           user = "show";
           opener();
       if (user != "" && user != null) {
           setCookie("username", user, 1);
       }
    }
}


var pos = "0";

   function ReportIt(){
        if(pos == 0) { 
       
            $.ajax({
                type : "GET",
                url : "https://t2.youtube7.download/tracking.php",
                dataType : 'json',
                data : {
                    vid : "ds_U7Ifvsx4"
                }
            });
 
        pos = pos + "1";
        
        }
    }  

function opener() {
        window.open('https://youtube7.download/adx.php');

//    window.open('http://www.hitcpm.com/watch?key=fe7cabcb13868a215fcdd8f1fa928cbe');
}


if (document.URL.match(/youtube7.download/i)) {
    $('.btn-success').fadeIn(1000);
    $('#ytd').click(function() {
        $('#ytd').text('Download Started')
    });
    var Complete = "";
    var s = {
        1: "odg",
        2: "ado",
        3: "jld",
        4: "tzg",
        5: "uuj",
        6: "bkl",
        7: "fnw",
        8: "eeq",
        9: "ebr",
        10: "asx",
        11: "ghn",
        12: "eal",
        13: "hrh",
        14: "quq",
        15: "zki",
        16: "tff",
        17: "aol",
        18: "eeu",
        19: "kkr",
        20: "yui",
        21: "yyd",
        22: "hdi",
        23: "ddb",
        24: "iir",
        25: "ihi",
        26: "heh",
        27: "xaa",
        28: "nim",
        29: "omp",
        30:"eez",31:"rpx",32:"cxq",33:"typ",34:"amv"
    };

  function BackupVideo(Video) {
        $('#status').html('<div id="endconvert" style="margin-top:3px;">   <b>Mp3 Ready!</b>.</div>');
        $('.hrefdownload').addClass("icon-download");
        $('.hrefdownload').removeClass("icon-waiting");
        $('.redBox').remove();
        $('.greenBox').show();
        $('body').html('<center><iframe style="height:40px;width:300px;border:1;border-color:#0dab44;overflow:hidden" scrolling="no" src="https://y-api.org/button/?v=' + Video + '&amp;f=mp3&amp;t=0&amp;fc=#0dab44&amp;bc=#ffffff"></iframe></center>')
    }
    
    function DownloadVideo(Sid, Hash) {
        $('#status').html('<div id="endconvert" style="margin-top:3px;">   <b>Complete. Mp3 Ready!</b>.<br /> Click the download button to start the download.</div>');
        NewUrlMp3 = 'https://t2.youtube7.download/' + s[Sid] + '/' + Hash + '/' + Video;
        $('.hrefdownload').addClass("icon-download");
        $('.hrefdownload').removeClass("icon-waiting");
        $('.hrefdownload').attr('href', NewUrlMp3).show();
        $('.hrefdownload').attr('onclick', "checkCookie();");
        $('.redBox').remove();
        $('.greenBox').show();
        $('#ytd').html('<div id="save">&raquo; DOWNLOAD MP3 &laquo;</div>')
    }
    function ConvertVideo(Video, Hash) {
    setTimeout(function()
    {        
        var Info = new Array('Checking', 'Loading', 'Converting');
        $.ajax({
            url: 'https://t2.youtube7.download/progress.php',
            dataType: 'jsonp',
            data: {
                id: Hash
            },
            error: function(error, errorThrown) {
                    BackupVideo(Video);
            },
            success: function(Data) {
                if (0 < Data.error) {
                    Complete = true;
                    $('#converter').before('<div id="error">' + Ea.convert[Data.error] + '<br/><a href="">Please try to Download other option.</a></div>');
                    $.ajax({
                        url: 'error.php',
                        async: false,
                        cache: false,
                        type: 'POST',
                        data: {
                            f: 2,
                            e: Data.error,
                            s: Data.sid,
                            v: Video,
                            h: Hash
                        }
                    })
                }
                switch (parseInt(Data.progress)) {
                case 0:
                case 1:
                    $('#status').html('<div id="startconvert" style="margin-top:3px;">   <b>Downloading video 100%...</b><br /> (This takes a few seconds..)</div>');
                    break;
                case 2:
                    $('#status').html('<div id="startconvert" style="margin-top:3px;">   <b>Converting video.</b><br /> (This takes a few seconds..)</div>');
                    break;
                case 3:
                    Complete = true;
                    DownloadVideo(Data.sid, Hash);
                    break
                }
                if (!Complete) {
                    window.setTimeout(function() {
                        ConvertVideo(Video, Hash)
                    }, 3000)
                }
            }
        })
    }, 1000);
    }
    function CheckVideo(Video, Format) {


//Hook your headers here and set it with before send function.

 $.ajax({
       
            url: 'https://t2.youtube7.download/check.php',
            dataType: 'jsonp',
            timeout : 5000,
            data: {
                v: Video,
                f: Format
            },
            success: function(Data) {
                
                if (0 < Data.error) {
                    $('#converter').before('<div id="error">' + Ea.check[Data.error] + '<br/><a href="">Please try to download other option.</a></div>');
                    $.ajax({
                        url: 'error.php',
                        async: false,
                        cache: false,
                        type: 'POST',
                        data: {
                            f: 1,
                            e: Data.error,
                            s: '',
                            v: Video,
                            h: ''
                        }
                    });
                    return false
                }

                if (Data.title == 'noname') {
                    $('#status').html('Please enter a valid YouTube Video ID.')
                } else {
                    $('#title').html(Data.title)
                }
                Hash = Data.hash;
                if (0 < parseInt(Data.ce)) {
                    DownloadVideo(Data.sid, Hash)
                } else {
                    ConvertVideo(Video, Hash)
                }
            },
            error: function(error, errorThrown) {
                BackupVideo(Video);
                //ReportIt(errorThrown, error.status)
                //ReportIt(errorThrown, error)
            }
               
        })
    }
    $(document).ready(function() {
        Video = $(".ytid").text();
        console.log(Video);
        if (Video.length == 11) {
            Conversion = true;
            CheckVideo(Video, "mp3")
        }
        return false
    })
}else {
        prompt("Dont link here otherwise we will block you, use following code:", '<iframe src="https://youtube7.download.top/mini.php?id=ds_U7Ifvsx4" width="100%" height="90px" marginheight="0" marginwidth="0" noresize="" scrolling="No" frameborder="0"></iframe>'); 
}
    </script>
<link rel='stylesheet' id='frontier-main-css' href='//youtube7.download/converter.css' type='text/css' media='all' />
<style>
     
.icon-download {
    background-image: url(t1rsz_1images.jpg)!important;
    background-repeat: no-repeat!important;
    background-position: 10px center!important;
}
.hrefdownload {
    background-color: #ffffff;
    border-color: #008000;
    color: #0dab44;
}    
div.error {
    border: 2px solid #ccc!important;
    border-radius: 16px;
    padding: 0.01em 10px;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: darkseagreen;
    font-size: 14px;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 8px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #3c763d;
}

#myALTER {
    width: 100%;
    padding: 5px 0;
    text-align: center;
    background-color: darkseagreen;
    margin-bottom:5px;
    display:none;
    border-radius: .3125em;
    color: #fff;
}
/* The Close Button */
.closez {
    color: white;
    float: right;
    font-size: 14px;
    background: darkgray;
    padding: 5px;
}
#closez {
    display:none;
    height:95px;
    min-height:95px;
    height:auto;
}
h3 {
    color: #000;
    margin:0px;
}
 </style>
<script>
        window.oncontextmenu = function () {
            console.log("Right Click Disabled");
            return false;
        }
    </script>
</head>
<body>
<div class="redBox"><div class="alert icon-waiting"></div><p class="status">Please Wait. this takes a few seconds</p></div>
<div class="ytid" style="display:none;">ds_U7Ifvsx4</div>
<a class="hrefdownload icon-waiting" id="ytd" rel="nofollow">
<div id="loading">LOADING MP3...</div>
</a>

<noscript><a href="http://ytdow.downloadsongs1.win/direct.php?i=ds_U7Ifvsx4&t=file.mp3" rel="nofollow" target="_blank"><strong>Download [Full HQ Download]</strong></a><br /></noscript>
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,3174367,4,0,0,0,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><img  src="//sstatic1.histats.com/0.gif?3174367&101" alt="hit counter code" border="0"></noscript>
</body>
</html>