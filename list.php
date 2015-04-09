<?php

function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}

function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}


$files = scandir('.', 1);

foreach($files as $filename) {
    if ($filename == ".") continue;
    if ($filename == "..") continue;
    if (startsWith($filename, ".")) continue;
    if (startsWith($filename, "sha1")) continue;
    if (endsWith($filename, ".php")) continue;
    if (!endsWith($filename, ".txt")) continue;
    $link = "<a href='./$filename'> $filename </a><br />";
    echo $link;
}

?>

