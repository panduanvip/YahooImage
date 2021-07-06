# Panduan.VIP Helpers

 A collection of PHP functions that I often use

## Installation:

```bash
composer require panduanvip/helpers
```

### Usage:

```php
<?php

include 'vendor/autoload.php';
use PanduanVIP\Helpers\Please;
```


### Get web content

```php
echo Please::getWebContent('https://google.com');
```

**Result:** 
```
return html page from google.com
```



### Get multiple web contents

```php
echo Please::getWebContents(['https://google.com', 'https://yahoo.com']);
```

**Result:** 
```
return html pages from google.com dan yahoo.com
```


### Create random string

```php
echo Please::createRandomString();
```

**Result:** 
```
7y2cNs
```


### Pick one item from the array randomly

```php
$array = ['Pen', 'Book', 'Laptop', 'Bus', 'Plane', ''];
$result = Please::pickOneRandom($array);
```

**Result:** 
```
Book
```


### Trim all spaces near separators

```php
$string = "Gunadarma , Jayabaya, Pancasila,,";
$result = Please::trimAllSpaces($string, ',');
```

**Result:** 
```
Gunadarma,Jayabaya,Pancasila
```


### Make a sentence from a spintax

```php
$string = "{green|blue|yellow} bird is sitting {there|over there|on the ground}.";
$result = Please::createSpintax($string);
```

**Result:** 
```
blue bird is sitting on the ground.
```


### Converts string to array based on newlines

```php
$string = <<<test
Example of string
spanning multiple lines
using heredoc syntax.
test;

$result = Please::explodeNewLine($string);
```

**Result:**
```
['Example of string', 'spanning multiple lines', 'using heredoc syntax.']
```


### Create excerpt from a paragraph

```php
$string = "PHP is a general-purpose scripting language especially suited to web development. It was stringly created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.";
$result = Please::createExcerpt($string, 50);
```

**Result:**
```
PHP is a general-purpose scripting language...

```

### Replace double with single space

```php
$string = "Lorem     ipsum dolor sit amet,   consectetur adipiscing elit";
$result = Please::removeDoubleSpace($string);
```

**Result:**
```
Lorem ipsum dolor sit amet, consectetur adipiscing elit
```


### Get a string between two strings

```php
$string = "This is my dog!";
$result = Please::getStringBetween($string, "my", "!");
```

**Result:**
```
dog
```


### Sanitize string for creating url slug

```php
$string = "красивые сакуры";
$result = Please::createSlug($string);
```

**Result**
```
красивые-сакуры
```
