# Mobile Legends API

This is an inofficial PHP API wrapper for the mobile game 
"Mobile Legends". Currently it supports fetching Heroes, Hero Details 
and Images.

## Requirements

This package requires >= PHP 7.2. PHP 7.1 is supported in older versions of the
package.

## Installation

`composer require mobaguides/mobile-legends-api`

## Usage

### Factory

Use the Factory to create `ApiFetcher` objects. 

````php
use MobaGuides\MobileLegendsApi\Fetchers\Hero;
use MobaGuides\MobileLegendsApi\Fetchers\Image;

MobileLegends::make(Hero::class);
````

### Fetchers

Fetchers are Classes that extend `MobaGuides\MobileLegendsApi\Fetchers\ApiFetcher`.
You can also create your own Fetchers and instantiate them through the factory. Just let them 
inherit from this class.

#### Fetch All Heroes

````php
use MobaGuides\MobileLegendsApi\MobileLegends;
use MobaGuides\MobileLegendsApi\Fetchers\Hero;

$hero = MobileLegends::make(Hero::class);
var_dump($hero->all());
````

#### Fetch Hero Details

````php
use MobaGuides\MobileLegendsApi\MobileLegends;
use MobaGuides\MobileLegendsApi\Fetchers\Hero;

$hero = MobileLegends::make(Hero::class);
var_dump($hero->detail(1));
````

#### Find Image

The Image map is fetched one time only and calls on the same
Image Fetcher instance will only make one HHTP request. Subsequent
method calls on the same instance will use the cached image map. 

````php
use MobaGuides\MobileLegendsApi\MobileLegends;
use MobaGuides\MobileLegendsApi\Fetchers\Image;

$image = MobileLegends::make(Image::class);
var_dump($image->find('HeroHead001.png'));
````

#### Find Hero Profile Image

````php
use MobaGuides\MobileLegendsApi\MobileLegends;
use MobaGuides\MobileLegendsApi\Fetchers\Image;

$image = MobileLegends::make(Image::class);
var_dump($image->heroAvatar(1)); // Hero Avatar of Miya
````

## FAQ

#### 1. How do I know the keys for the Image Fetcher?

Mobile Legends maps weird keys to the actual image URLs. You can 
get the map here: https://mapi.mobilelegends.com/api/icon

#### 2. How can I fetch Equipment data?

Currently this is not supported as we could not find out the endpoint 
for equip details.

#### 3. What about Emblems, Map Data etc.?

See above.

#### 4. Okay, and User data?

We are currently working on this one and it should be released soon.