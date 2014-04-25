<?php
use PHPHtmlParser\Dom;
require_once 'vendor/autoload.php';

$page = $argv[1];
$interestingAuthor = $argv[2];

$dom = new Dom();
$dom->load(file_get_contents($page));
foreach ($dom->find('div#tracker tbody tr') as $tr) {
    $type = $tr->firstChild();
    $post = $type->nextSibling();
    $author = $post->nextSibling();
    $a = $post->find('a');
    $href = $a->getAttribute('href');
    $title = $a->text;
    if ($author->text === $interestingAuthor) {
        fputcsv(STDOUT, [$type->text, $href, $title]);
    }
}
