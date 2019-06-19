# Mobile Legends API

This is an inofficial PHP API wrapper for the mobile game 
"Mobile Legends". Currently it supports fetching Heroes, Hero Details 
and Images.

## Requirements

This package requires >= PHP 7.1. Version below PHP 7.1 will never 
be supported.

## Installation

`composer require mobaguides/mobile-legends-api`

## Usage

### 1. Factory

Use the Factory to create `ApiFetcher` objects. 

````php
use MobaGuides\MobileLegendsApi\Fetchers\Hero;
use MobaGuides\MobileLegendsApi\Fetchers\Image;

MobileLegends::make(Hero::class);
````

### 2. Hero API Fetcher

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

### 3. Image Fetcher

#### Find Image

````php
use MobaGuides\MobileLegendsApi\MobileLegends;
use MobaGuides\MobileLegendsApi\Fetchers\Image;

$image = MobileLegends::make(Image::class);
var_dump($image->find('HeroHead001.png'));
````

### 4. FAQ

#### 1. How can I get the Profile Image of an Hero?

To get the Profile Image you can use the `heroAvatar()` method on the
Image API Fetcher. 

````php
use MobaGuides\MobileLegendsApi\MobileLegends;
use MobaGuides\MobileLegendsApi\Fetchers\Image;

$image = MobileLegends::make(Image::class);
var_dump($image->heroAvatar(1)); // Hero Avatar of Miya
````

#### 2. How do I know the keys for the Image Fetcher?

Mobile Legends maps weird keys to the actual image URLs. You can 
get the map here: https://mapi.mobilelegends.com/api/icon

#### 3. How can I fetch Equipment data?

Currently this is not supported as we could not find out the endpoint 
for equip details.

#### 4. What about Emblems, Map Data etc.?

See above.

#### 5. Okay, and User data?

We are currently working on this one and it should be released soon.

