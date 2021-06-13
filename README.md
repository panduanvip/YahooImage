# Yahoo Image Extractor

Web extractor for Yahoo Image website

## Installation:

```bash
composer require panduanvip/yahoo-image
```

### Usage:

```php
<?php

include 'vendor/autoload.php';

use PanduanVIP\WebExtractor\YahooImage;

$keyword = 'sepatu roda';
$results = json_decode(YahooImage::get($keyword));

echo '<pre>';
print_r($results);
```

**Result:** 
```
Array
(
    [0] => stdClass Object
        (
            [alt] => Jual Sepatu Roda Power Line HB22 PINK di lapak Toko Inline tokoinline
            [image] => https://s4.bukalapak.com/img/482217591/w-1000/Sepatu%20Roda%20Power%20Line%20HB22%20PINK.jpg
            [thumbnail] => https://tse1.mm.bing.net/th/id/OIP.INMs7HeJfux-F6t0TwSASQHaHa?w=230
            [source] => https://www.bukalapak.com/p/olahraga/roller-skate/w0vig-jual-sepatu-roda-power-line-hb22-pink
        )

    [1] => stdClass Object
        (
            [alt] => Jual Sepatu Roda Braman B600 Merah di lapak My Kevin Sports mykevinsports
            [image] => https://s3.bukalapak.com/img/346611164/w-1000/Sepatu_Roda_Braman_B600_Merah.jpg
            [thumbnail] => https://tse2.mm.bing.net/th/id/OIP.o2fvABV6NO20nts5LBm7GQHaHa?w=230
            [source] => https://www.bukalapak.com/p/olahraga/roller-skate/3bbm1r-jual-sepatu-roda-braman-b600-merah
        )

    .........
```
