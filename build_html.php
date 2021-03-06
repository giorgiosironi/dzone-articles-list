<?php
$input = $argv[1];
$fp = fopen($input, 'r');
$buckets = [];
while ($row = fgetcsv($fp)) {
    $type = $row[0];
    $href = "http://css.dzone.com{$row[1]}";
    $title = $row[2];
    $buckets[$type][$href] = $title;
}
fclose($fp);

foreach ($buckets as $bucketName => $bucket) {
    echo "<h2>$bucketName</h2>", PHP_EOL;
    $bucket = array_reverse($bucket, $preserve_keys = true);
    foreach ($bucket as $href => $title) {
        echo "<a href=\"$href\">$title</a><br />", PHP_EOL;
    }
}
