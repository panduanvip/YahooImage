# Yahoo Image Extractor

Web extractor for Yahoo Image website

## Installation:

composer require panduanvip/yahoo-image

### Usage:

```php
<?php

include 'vendor/autoload.php';

use PanduanVIP\WebExtractor\YahooImage;

$url = 'https://id.images.search.yahoo.com/search/images?p=sepatu+roda&fr2=piv-web&fr=yfp-t';
$html = file_get_contents($url);

$results = json_decode(YahooImage::extractor($html));

echo '<pre>';
print_r($results);
```

**Result:** 
```
Array
(
    [0] => stdClass Object
        (
            [alt] => Jual Sepatu Roda POWER KING 111 PU Hitam di lapak My Kevin ...
            [image] => https://s2.bukalapak.com/img/212365895/w-1000/Sepatu_Roda_POWER_KING_111_PU_Hitam.jpg
            [thumbnail] => https://tse3.mm.bing.net/th/id/OIP._cSoSkmK_-tDfKTIPwj13QHaHa?w=230
            [source] => https://www.bukalapak.com/p/olahraga/roller-skate/4c024n-jual-sepatu-roda-power-king-111-pu-hitam
        )

    [1] => stdClass Object
        (
            [alt] => Jual Sepatu Roda Anak Murah Terjamin Berkualitas Barang ...
            [image] => http://sumbercenel.com/wp-content/uploads/2017/07/cougar-mzs835l-sepatu-roda-inline-skate-black-silver-5703-2996306-1.jpg
            [thumbnail] => https://tse1.mm.bing.net/th/id/OIP.k5hjhwdUOUjVf08nZzyz4AHaHa?w=230
            [source] => https://sumbercenel.com/jual-sepatu-roda-anak/
        )

    .........
```
