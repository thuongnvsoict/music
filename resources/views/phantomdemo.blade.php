<?php
     $script = __DIR__ ."../../public/js/content.js";
    $target = "http://www.kincir.com"; // target URL
    $cmd = "phantomjs $script $target";
    echo exec($cmd, $output);
    // echo $output;
    // return implode("", $output);
?>
