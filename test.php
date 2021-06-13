<?php

include 'vendor/autoload.php';

use PanduanVIP\WebExtractor\YahooImage;

$keyword = 'sepatu roda';
$results = json_decode(YahooImage::get($keyword));

echo '<pre>';
print_r($results);